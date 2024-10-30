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
	 * Get a user's group based on the property id. If the group exists return the group id, else return 0. This allows users to continue conversations with a property, preserving the group conversation. Once this has been returned then the client can call  /messaging/group/messages/@group_id to get the entire thread, and then  /messaging/group/unread/@group_id thereafter to get replies
	 *
	 */
	Flight::route('GET /messaging/property/group/@property_uid/', function($property_uid)
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$user_id = Flight::get("user_id");

		jr_import('messages_model_user_group');
		$messages_model_user_group = new messages_model_user_group();
		$user_groups = $messages_model_user_group->get_groups( (int)$user_id );

		$group_id = 0;
		if (!empty($user_groups)) {
			foreach ($user_groups as $user_group) {
				if ($user_group["property_uid"] == $property_uid) {
					$group_id = $user_group["group_id"];

					$members = array();
					jr_import('messages_model_user_group');
					$messages_model_user_group = new messages_model_user_group();
					$members = $messages_model_user_group->get_group_members($group_id);
				}
			}
		}

		Flight::json( "response" , array( 'group' => ['group_id' => $group_id , 'members' => $members ] ) );
	});

	/*
	 *
	 * Get all groups all messages
	 *
	 */
	Flight::route('GET /messaging/all_groups/', function()
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response_by_groups = array();

		$user_id = Flight::get("user_id");

		jr_import('messages_model_user_group');
		$messages_model_user_group = new messages_model_user_group();
		$user_groups = $messages_model_user_group->get_groups( (int)$user_id );
		$user_group_ids = array();
		if (!empty($user_groups)) {
			foreach ($user_groups as $user_group) {
				$user_group_ids[] = $user_group['group_id'];
			}
		}

		jr_import('messages_model_group');
		$messages_model_group = new messages_model_group();
		$groups = $messages_model_group->get_groups( $user_group_ids );

		foreach ($user_groups as $grp) {
			$group_id = $grp['group_id'];
			$group_name = $groups[$group_id]['name'];
			$user_groups[$grp['id'] ] ['group_name'] = $group_name;
		}

		jr_import('messages_model_message_recipient');
		$messages_model_message_recipient = new messages_model_message_recipient();
		$user_recipient_rows = $messages_model_message_recipient->get_message_ids( (int)$user_id , true);
		$message_ids = array();
		if (!empty($user_recipient_rows)) {
			foreach ( $user_recipient_rows as $key => $val ) {
				$message_ids[]=$val['message_id'];
			}
		}

		jr_import('messages_model_message');
		$messages_model_message = new messages_model_message();
		$messages = $messages_model_message->get_messages($message_ids);

		// I want to group the messages by the groups that the user is a member of
		if (!empty($user_groups) && !empty($user_recipient_rows)) {
			foreach ($user_groups as $user_group) {

				$group_id = $user_group['group_id'];

				foreach ($user_recipient_rows as $recipient_row) {
					if ( $recipient_row["recipient_group_id"] == $group_id) {
						if (!isset($response_by_groups[$group_id]['group'])) {
							$response_by_groups[$group_id] = array();
						}
						if (!isset($response_by_groups[$group_id]['group'])) {
							$response_by_groups[$group_id] = array();

							// Going to create a new array here to clarify who's ids are for which table
							$new_arr = array();
							$new_arr['group_id'] = $user_group['group_id'];
							$new_arr['create_date'] = $user_group['create_date'];
							$new_arr['group_name'] = $user_group['group_name'];
							$new_arr['property_uid'] = $user_group['property_uid'];

							$new_arr['unread_count'] = 0;
							$new_arr['total_messages'] = 0;
							$response_by_groups[$group_id]['group'] = $new_arr;
						}

						$response_by_groups[$group_id]['group']['total_messages']++;

						$message_id = $recipient_row['message_id'];

						$messages[$message_id]['hash'] = md5($user_group['group_id'].'-'.$messages[$message_id]['id'].'-'.$messages[$message_id]['id']); // This message has is to create a simple hash for this message which allows remote systems to identify individual messages and ensure that duplicate messages aren't shown. It does not attempt to provide any kind of security.

						$messages[$message_id]['is_read'] = $recipient_row['is_read'];
						$response_by_groups[$group_id]['messages'][] = $messages[$message_id];



						if (  (int)$recipient_row['is_read'] === 0) {
							$response_by_groups[$group_id]['group']['unread_count']++;
						}
					}
				}
			}
		}

		Flight::json( "response" , array( 'messages_by_group' => $response_by_groups) );
	});

/*
 *
 * Get messages for group, unread : if 1 then return just unread messages
 *
 */
	Flight::route('GET /messaging/group/messages/@group_id/@unread', function($group_id , $unread_only )
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response_by_groups = array();

		$user_id = Flight::get("user_id");
		$group_id = (int)$group_id;
		$token = Flight::get("token");

		// First we need to check that the sender is posting into a group that the user is a member of
		$query = "SELECT id FROM #__jomres_messages_user_group WHERE user_id = ".(int)$user_id." AND group_id = ".$group_id;
		$result = doSelectSql($query);

		if (empty($result)) {
			Flight::halt(204, [ 'response' => [ "error_message" => "user not in group" , "error_number" => '001' ] ] );
		}

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api( $user_id , $token['access_token'] );
		try {
			$response = $jomres_call_api->send_request("GET" , "messaging/all_groups/");

		}
		catch (Exception $e) {
			throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		$messages_by_group = messaging_object_to_array($response->data->response);

		if (!isset($messages_by_group["messages_by_group"][$group_id])){
			Flight::halt(204, [ 'response' => [ "error_message" => "Group not retrieved" , "error_number" => '001' ] ] );
		}

		if ($unread_only) {
			$tmpArr = array();
			foreach ($messages_by_group["messages_by_group"][$group_id]['messages'] as $message) {
				if ($message['is_read'] == 0 ) {
					$tmpArr[] = $message;
				}
			}
			$messages_by_group["messages_by_group"][$group_id]['messages'] = $tmpArr;
		}

		$response_by_groups[$group_id] = $messages_by_group["messages_by_group"][$group_id];

		Flight::json( "response" , array( 'messages' => $response_by_groups[$group_id]) );
	});



	/*
	 *
	 * Get messages for group, unread : if 1 then return just unread messages
	 *
	 */
	Flight::route('GET /messaging/group/members/@group_id', function($group_id )
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$response_by_groups = array();

		$user_id = Flight::get("user_id");
		$group_id = (int)$group_id;

		// A quick test to make sure that this user can query this group
		$query = "SELECT `user_id` FROM #__jomres_messages_user_group WHERE `user_id` = ".(int)$user_id." AND `group_id` = ".(int)$group_id." LIMIT 1";
		$group = doSelectSql($query);
		if (empty($group)) {
			Flight::halt(204, [ 'response' => [ "error_message" => "Incorrect group id for user" , "error_number" => '001' ] ] );
		}

		$query = 'SELECT `userid` FROM #__jomres_managers WHERE access_level = 70 ';
		$managers = doSelectSql($query);
		$propertyManagers = array();
		if (!empty($managers)) {
			foreach ($managers as $x) {
				$propertyManagers[] = $x->userid;
			}
		}

		$query = 'SELECT `userid` FROM #__jomres_managers WHERE access_level = 90 ';
		$managers = doSelectSql($query);
		$superPropertyManagers = array();
		if (!empty($managers)) {
			foreach ($managers as $x) {
				$superPropertyManagers[] = $x->userid;
			}
		}

		$query = "SELECT `user_id` FROM #__jomres_messages_user_group WHERE `group_id` = ".(int)$group_id." ";
		$group_members = doSelectSql($query);
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
		$noimage = $jomres_media_centre_images->multi_query_images["noimage-small"];

		$jomres_media_centre_images->get_site_images('userimages');

		$members = array();
		foreach ($group_members as $member) {
			$is_manager = 0;
			if (in_array($member->user_id , $propertyManagers )) {
				$is_manager = 1;
			}
			if (in_array($member->user_id , $superPropertyManagers )) {
				$is_manager = 2;
			}

			if (isset($jomres_media_centre_images->site_images['userimages'][$member->user_id][0]['small'])) {
				$image = $jomres_media_centre_images->site_images['userimages'][$member->user_id][0]['small'];
			} else {
				$image = $noimage;
			}

			$members[$member->user_id] = array(  "user_id" => $member->user_id , "name" => messaging_get_username($member->user_id) , "image" => $image , "level" => $is_manager );
		}

		Flight::json( "response" , array( 'members' => $members ) );
	});

	/*
	 *
	 * Respond with the number of unread messages
	 *
	 */
	Flight::route('GET /messaging/unread_count', function()
	{
		require_once("../framework.php");

		// Confirm that the token has a scope of messages
		validate_scope::validate('messaging');

		$user_id = Flight::get("user_id");
		$token = Flight::get("token");

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api( $user_id , $token['access_token'] );
		try {
			$response = $jomres_call_api->send_request("GET" , "messaging/all_groups/");
		}
		catch (Exception $e) {
			throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		$messages_by_group = messaging_object_to_array($response->data->response);

		$unread_count = 0;
		if (!empty($messages_by_group)) {
			foreach ( $messages_by_group as $groups ) {
				foreach ($groups as $group) {
					$unread_count = $unread_count + $group["group"]["unread_count"];
				}
			}
		}

		Flight::json( "response" , array( 'unread_count' => $unread_count ) );
	});
