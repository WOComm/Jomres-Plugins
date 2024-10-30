<?php
// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class messages_model_message_recipient
{
	/**
	*
	* Constructor.
	*
	*/


	public function __construct()
	{
		$this->reminder = date('Y-m-d H:i:s' , (strtotime('+5 minutes')));

		$this->model = new stdClass();
		$this->model->default = new stdClass();
		$this->model->default->id = '';
		$this->model->default->recipient_id = 0;
		$this->model->default->recipient_group_id = 0;
		$this->model->default->message_id = 0;
		$this->model->default->is_read = 0;
		$this->model->default->next_remind_date = $this->reminder;

		$this->model->values = new stdClass();
	}

	public function update_reminder( $recipient_group_id , $user_id )
	{
		$query = "UPDATE #__jomres_messages_message_recipient SET next_remind_date = ".$this->reminder." WHERE recipient_group_id = ".(int)$recipient_group_id." AND recipient_id = ".(int)$user_id;
		return (bool)doInsertSql($query);
	}

	public function set_value ( $key = '' , $val = '' )
	{
		if ($key == '') {
			throw new Exception('Error, key empty ');
		}
		$this->model->values->$key = $val;
	}

	public function save_message_recipient()
	{
		// Need checking here to catch message id being empty

		$this->model->values->id = $this->model->values->message_id.'-'.$this->model->values->recipient_id.'-'.$this->model->values->recipient_group_id;
		$query_str = messaging_build_query($this->model);
		$query = "INSERT INTO #__jomres_messages_message_recipient ".$query_str;
		$result = doInsertSql($query);
		if ($result) {

			$webhook_notification							   = new stdClass();
			$webhook_notification->webhook_event				= 'message_recipient_created';
			$webhook_notification->webhook_event_description	= 'Logs when a message is created for a given user id';
			$webhook_notification->webhook_event_plugin		 	= 'api';
			$webhook_notification->data						 	= new stdClass();
			$webhook_notification->data->message_id			   = $this->model->values->id;
			$webhook_notification->data->recipient_id		   = $this->model->values->recipient_id;
			add_webhook_notification($webhook_notification);

			return $this->model->values->id;
		} else {
			return false;
		}
	}

	public function get_message_ids($user_id , $all = true )
	{
		$clause = '';
		if ($all == false) {
			$clause = " AND is_read = 0";
		}

		$query = "SELECT `id`,`recipient_id`,`recipient_group_id`,`message_id`,`is_read` FROM #__jomres_messages_message_recipient WHERE recipient_id =".$user_id.$clause." ORDER BY `message_id`";

		$result = doSelectSql($query);
		$response = array();
		if (!empty($result)) {
			foreach ($result as $r) {
				$response[$r->id]['message_id'] = $r->message_id;
				$response[$r->id]['recipient_group_id'] = $r->recipient_group_id;
				$response[$r->id]['is_read'] = $r->is_read;
			}
		}
		return $response;
	}

	public function set_read_state( $recipient_group_id , $is_read , $user_id )
	{
		if ($recipient_group_id == 0) {
			throw new Exception('Error, $recipient_group_id empty ');
		}

		$query = "UPDATE #__jomres_messages_message_recipient SET is_read = ".(int)(bool)$is_read." WHERE recipient_group_id = ".(int)$recipient_group_id." AND recipient_id = ".(int)$user_id;
		return (bool)doInsertSql($query);
	}

}
