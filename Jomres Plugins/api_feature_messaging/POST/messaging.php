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
	 * Create a new message, create a group based on that message and create recipients based on both any available property managers plus all property managers
	 *
	 */
	Flight::route('POST /messaging/new_message/', function()
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response = new stdClass();

		$user_id = Flight::get("user_id");

		$subject					= jomresGetParam( $_POST, 'subject', "" );
		$message					= jomresGetParam( $_POST, 'message', "" );
		$property_uid				= jomresGetParam( $_POST, 'property_id', 0 );
		$recipient_id				= jomresGetParam( $_POST, 'recipient_id', 0 );
		$is_read					= jomresGetParam( $_POST, 'is_read', 0 );

		$property_uid = (int)$property_uid;
		$recipient_id = (int)$recipient_id;

		if ($recipient_id == 0 && $property_uid ==0 ) {
			Flight::halt(204, [ 'response' => [ "error_message" => "Recipient not set" , "error_number" => '001' ] ] );
		}

		if ($property_uid > 0) {
			$all_published_properties = get_showtime('published_properties_in_system');

			if (!in_array($property_uid,$all_published_properties)){
				Flight::halt(204, [ 'response' => [ "error_message" => "Unknown property" , "error_number" => '001' ] ] );
			}

			// First we will save the message
			jr_import('messages_model_message');
			$messages_model_message = new messages_model_message();
			$messages_model_message->set_value( 'subject' , $subject );

			$messages_model_message->set_value( 'message_body' , '{property_uid '.$property_uid.'}' );
			$messages_model_message->set_value( 'creator_id' , $user_id );
			$messages_model_message->set_value( 'parent_message_id' , 0 );
			$message_id = $messages_model_message->save_message();
			$response->message_id = $message_id;

			// Next we'll create a group, with the title of the property name and the user's id (maybe later change that to something else, but for now...username)
			jr_import('messages_model_group');
			$messages_model_group = new messages_model_group();
			$messages_model_group->set_value('name', '{property_name ' . $property_uid . '} :: {user_id ' . $user_id . '}');
			$group_id = $messages_model_group->save_group();
			$response->group_id = $group_id;

			$manager_ids = get_property_managers_ids($property_uid);
			$super_manager_ids = get_super_property_manager_ids();
			if (!empty($manager_ids)) {
				$all_manager_ids = array_merge($manager_ids, $super_manager_ids);
				$all_manager_ids = array_unique($all_manager_ids);
			} else {
				$all_manager_ids = $super_manager_ids;
			}

			$recipient_group_ids = array();

			jr_import('messages_model_user_group');
			$messages_model_user_group = new messages_model_user_group();
			$messages_model_user_group->set_value('user_id', $user_id);
			$messages_model_user_group->set_value('group_id', $group_id);
			$messages_model_user_group->set_value('property_uid', $property_uid);
			$recipient_group_ids[$user_id] = $messages_model_user_group->save_user_group();
			foreach ($all_manager_ids as $manager_id) {
				$messages_model_user_group = new messages_model_user_group();
				$messages_model_user_group->set_value('user_id', $manager_id);
				$messages_model_user_group->set_value('group_id', $group_id);
				$messages_model_user_group->set_value('property_uid', $property_uid);
				$recipient_group_ids[$manager_id] = $messages_model_user_group->save_user_group();
			}

			jr_import('messages_model_message_recipient');
			foreach ($recipient_group_ids as $group_user_id => $user_group_record) {
				$messages_model_message_recipient = new messages_model_message_recipient();
				$messages_model_message_recipient->set_value('recipient_id', $group_user_id);
				$messages_model_message_recipient->set_value('recipient_group_id', $group_id);
				$messages_model_message_recipient->set_value('message_id', $message_id);
				if ($group_user_id == $user_id) {
					$messages_model_message_recipient->set_value('is_read', 1 );
				} else {
					$messages_model_message_recipient->set_value('is_read', $is_read );
				}
				$recipient_table_ids[] = $messages_model_message_recipient->save_message_recipient();
			}
		} else {
			// First we will save the message
/*			jr_import('messages_model_message');

			$messages_model_message = new messages_model_message();
			$messages_model_message->set_value( 'subject' , $subject );
			$messages_model_message->set_value( 'message_body' , $message );
			$messages_model_message->set_value( 'creator_id' , $user_id );
			$messages_model_message->set_value( 'parent_message_id' , 0 );
			$message_id = $messages_model_message->save_message();
			$response->message_id = $message_id;

			// Send to the recipient
			jr_import('messages_model_message_recipient');
			$messages_model_message_recipient = new messages_model_message_recipient();

			$messages_model_message_recipient->set_value('recipient_id', $recipient_id );
			$messages_model_message_recipient->set_value('recipient_group_id',0 );
			$messages_model_message_recipient->set_value('message_id', $message_id );
			$messages_model_message_recipient->set_value('is_read', 0 );
			$messages_model_message_recipient->save_message_recipient();

			// Create a recipient row for the sender
			$messages_model_message_recipient = new messages_model_message_recipient();
			$messages_model_message_recipient->set_value('recipient_id', $user_id );
			$messages_model_message_recipient->set_value('recipient_group_id',0 );
			$messages_model_message_recipient->set_value('message_id', $message_id );
			$messages_model_message_recipient->set_value('is_read', 1 );
			$messages_model_message_recipient->save_message_recipient();*/
		}
		Flight::json( "response" , $response );
	});


	/*
	 *
	 * For development, must be deleted later
	 *
	 */
	/*Flight::route('POST /messaging/truncate', function()
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$query = "TRUNCATE `#__jomres_messages_group`";
		doInsertSql($query);

		$query = "TRUNCATE `#__jomres_messages_message`";
		doInsertSql($query);

		$query = "TRUNCATE `#__jomres_messages_message_recipient`";
		doInsertSql($query);

		$query = "TRUNCATE `#__jomres_messages_reminder_frequency`";
		doInsertSql($query);

		$query = "TRUNCATE `#__jomres_messages_user_group`";
		doInsertSql($query);

		Flight::json( "response" , true );
	});*/
