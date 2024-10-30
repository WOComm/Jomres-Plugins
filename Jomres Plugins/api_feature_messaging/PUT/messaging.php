<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


	/*
	 *
	 * Send the message id and the new is_read status. 0 = unread, 1 = has been read
	 *
	 */
	Flight::route('PUT /messaging/leave_group/@group_id', function( $group_id )
	{
		require_once("../framework.php");
		$_PUT = $GLOBALS['PUT'];

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response = new stdClass();

		$user_id = Flight::get("user_id");
		$group_id = (int)$group_id;


		if ( $group_id == 0 ){
			Flight::halt(204, [ 'response' => [ "error_message" => "group_id not passed" , "error_number" => '001' ] ] );
		}

		$query = "SELECT id FROM #__jomres_messages_user_group WHERE user_id = ".(int)$user_id." AND group_id = ".$group_id;
		$result = doSelectSql($query);

		if (empty($result)) {
			Flight::halt(204, [ 'response' => [ "error_message" => "user not in group" , "error_number" => '001' ] ] );
		}

		// We know that the user's in the group, so they have a right to be there, so they have a right to remove themselves from the group
		$query = "DELETE FROM #__jomres_messages_user_group WHERE user_id = ".(int)$user_id." AND group_id = ".$group_id;
		$result = doInsertSql($query);

		Flight::json( "response" , true );
	});


	/*
	 *
	 * Send the message id and the new is_read status. 0 = unread, 1 = has been read
	 *
	 */
	Flight::route('PUT /messaging/is_read/', function()
	{
		require_once("../framework.php");
		$_PUT = $GLOBALS['PUT'];

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response = new stdClass();

		$user_id = Flight::get("user_id");

		$message_id					= jomresGetParam( $_PUT, 'message_id', 0 );
		$is_read					= (bool)jomresGetParam( $_PUT, 'is_read', 0 );

		if ( $message_id == 0 ){
			Flight::halt(204, [ 'response' => [ "error_message" => "Message id not passed" , "error_number" => '001' ] ] );
		}

		$update_result = false;

		jr_import('messages_model_message_recipient');
		$messages_model_message_recipient = new messages_model_message_recipient();
		$user_recipient_rows = $messages_model_message_recipient->get_message_ids( (int)$user_id , true);

		$message_ids = array();
		if (!empty($user_recipient_rows)) {
			foreach ( $user_recipient_rows as $key => $val ) {
				if ( $val['message_id'] == $message_id ) {
					$recipient_group_id = $val['recipient_group_id'];
					$update_result = $messages_model_message_recipient->set_read_state( $recipient_group_id , $is_read , $user_id );
				}
			}
		}

		$response->message_id = $message_id;
		$response->new_state = $is_read;
		$response->success = $update_result;

		Flight::json( "response" , $response );
	});

	/*
	 *
	 * Send the message id and the new is_read status. 0 = unread, 1 = has been read
	 *
	 */
	Flight::route('PUT /messaging/reply/', function()
	{
		require_once("../framework.php");
		$_PUT = $GLOBALS['PUT'];

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response = new stdClass();

		$user_id = Flight::get("user_id");

		$recipient_id						= jomresGetParam( $_PUT, 'recipient_id', 0 ); // For direct messages
		$group_id							= jomresGetParam( $_PUT, 'group_id', 0 ); // For group messages
		$message_body						= jomresGetParam( $_PUT, 'message_body', '' );
		$is_read							= jomresGetParam( $_PUT, 'is_read', 0 );

		if ( $recipient_id == 0 && $group_id == 0 ){
			Flight::halt(204, [ 'response' => [ "error_message" => "No recipients set" , "error_number" => '001' ] ] );
		}

		// First we need to check that the sender is posting into a group that the user is a member of
		$query = "SELECT id FROM #__jomres_messages_user_group WHERE user_id = ".(int)$user_id." AND group_id = ".$group_id;
		$result = doSelectSql($query);

		if (empty($result)) {
			Flight::halt(204, [ 'response' => [ "error_message" => "user not in group" , "error_number" => '001' ] ] );
		}
			if ($group_id != 0 ) {
			// First we need to check that the sender is posting into a group that the user is a member of
			$query = "SELECT id FROM #__jomres_messages_user_group WHERE user_id = ".(int)$user_id." AND group_id = ".$group_id;
			$result = doSelectSql($query);

			if (!empty($result)) { // The user can post to this group that they are a member of, let's now find all group members so that we can add recipient rows
				// First we will save the message
				jr_import('messages_model_message');
				$messages_model_message = new messages_model_message(); // Resets our message object
				$messages_model_message->set_value( 'subject' , '' );

				$messages_model_message->set_value( 'message_body' ,$message_body );
				$messages_model_message->set_value( 'creator_id' , $user_id );

				$reply_message_id = $messages_model_message->save_message();

				$response->message_id = $reply_message_id;

				$query = "SELECT user_id FROM #__jomres_messages_user_group WHERE group_id = ".(int) $group_id;
				$group_members = doSelectSql($query);

				jr_import('messages_model_message_recipient');
				foreach ($group_members as $member) {

					$messages_model_message_recipient = new messages_model_message_recipient();
					$messages_model_message_recipient->set_value('recipient_id', $member->user_id );
					$messages_model_message_recipient->set_value('recipient_group_id',$group_id );
					$messages_model_message_recipient->set_value('message_id', $reply_message_id );
					if ($member->user_id == $user_id) {
						$messages_model_message_recipient->set_value('is_read', 1 );
					} else {
						$messages_model_message_recipient->set_value('is_read', $is_read );
					}
					$recp_id = $messages_model_message_recipient->save_message_recipient();
				}
			}
		} else {
			// Create a recipient row for the DM target
/*			$messages_model_message_recipient = new messages_model_message_recipient();
			$messages_model_message_recipient->set_value('recipient_id', $recipient_id );
			$messages_model_message_recipient->set_value('recipient_group_id',0 );
			$messages_model_message_recipient->set_value('message_id', $reply_message_id );
			$messages_model_message_recipient->set_value('is_read', 0 );
			$messages_model_message_recipient->save_message_recipient();

			// Create a recipient row for the sender
			$messages_model_message_recipient = new messages_model_message_recipient();
			$messages_model_message_recipient->set_value('recipient_id', $user_id );
			$messages_model_message_recipient->set_value('recipient_group_id',0 );
			$messages_model_message_recipient->set_value('message_id', $reply_message_id );
			$messages_model_message_recipient->set_value('is_read', 1 );
			$messages_model_message_recipient->save_message_recipient();*/

		}
		Flight::json( "response" , $response );
	});

