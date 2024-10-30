<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2013 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000cron_message_reminder
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; return;
			}

		if (jomres_bootstrap_version() != "5") {
			return;
		}

		$use_messaging_system = get_showtime('use_messaging_system') ;
		if ($use_messaging_system == "0" ) {
			return;
		}

		$five_mins_ago = date('Y-m-d H:i:s' , (strtotime('-5 minutes')));
		$one_day_from_now = date('Y-m-d H:i:s' , (strtotime('+1 day')));

		$query = "SELECT `id`, `recipient_id` , `recipient_group_id` , `is_read` FROM #__jomres_messages_message_recipient WHERE next_remind_date < '".$five_mins_ago."' AND is_read = 0";
		$unseenMessages =doSelectSql($query);

		$unseen_messages_by_user_id = array();
		if (!empty($unseenMessages)) {
			foreach ($unseenMessages as $recipient_message) {
				$recipient_id = $recipient_message->recipient_id;
				if ( !isset( $unseen_messages_by_user_id[$recipient_id] ) ){
					$unseen_messages_by_user_id[$recipient_id] = array ( "recipient_id" => $recipient_id , "unread_count" => 0 );
					}
				$unseen_messages_by_user_id[$recipient_id]['unread_count']++;
				}
			}

		if (!empty($unseen_messages_by_user_id)) {
			foreach ($unseen_messages_by_user_id as $user_unseen_messages) {
				$webhook_notification							   = new stdClass();
				$webhook_notification->webhook_event				= 'message_reminder';
				$webhook_notification->webhook_event_description	= 'Unread message reminder triggered';
				$webhook_notification->webhook_event_plugin		 	= 'api';
				$webhook_notification->data						 	= new stdClass();
				$webhook_notification->data->user_id			   	= $user_unseen_messages['recipient_id'];
				$webhook_notification->data->unread_count			= $user_unseen_messages['unread_count'];
				add_webhook_notification($webhook_notification);

				$query = "UPDATE #__jomres_messages_message_recipient SET next_remind_date = '".$one_day_from_now."' WHERE `recipient_id` = ".(int)$user_unseen_messages['recipient_id']." AND is_read = 0";
				//$update_result = doInsertSql($query);
				}
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}		
	}
