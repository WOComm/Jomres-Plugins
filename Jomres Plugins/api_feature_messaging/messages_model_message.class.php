<?php
// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class messages_model_message
{
	/**
	*
	* Constructor.
	*
	*/

	public function __construct()
	{

		$create_date = date_create()->format('Y-m-d H:i:s');
		$expiry = date('Y-m-d' , (strtotime('+1 week')));

		$expiry_date = date_create()->format($expiry.' H:i:s');

		$this->model = new stdClass();
		$this->model->default = new stdClass();
		$this->model->default->subject = 'Change me';
		$this->model->default->creator_id = 0;
		$this->model->default->message_body = '';
		$this->model->default->attachment_id = 0; // Not used yet, but keeping it in as it could be used in the future
		$this->model->default->create_date = $create_date;
		$this->model->default->expiry_date = $expiry_date;
		$this->model->default->is_reminder = 0;
		$this->model->default->is_active = 1;
		$this->model->values = new stdClass();

		$this->jomres_encryption = new jomres_encryption();

	}

	public function set_value ( $key = '' , $val = '' )
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');

		if ($key == '') {
			throw new Exception('Error, key empty ');
		}

		// Here we'll give showtime the subject and message bodies, and any 08100 script can parse them as necessary before we read them back into $this->model->values and save them to the database

		if ($key == 'subject') {
			set_showtime('jms_message_subject' , $val );
			$MiniComponents->triggerEvent('08100');
			$val = get_showtime('jms_message_subject');
			set_showtime('jms_message_subject' , null );
			$val = 	$this->jomres_encryption->encrypt($val);
		}

		if ($key == 'message_body') {
			set_showtime('jms_message_message_body' , $val );
			$MiniComponents->triggerEvent('08100');
			$val = get_showtime('jms_message_message_body');
			set_showtime('jms_message_message_body' , null );

			$val = 	$this->jomres_encryption->encrypt($val);
		}

		$this->model->values->$key = $val;
	}

	public function save_message()
	{
		$query_str = messaging_build_query($this->model);
		$query = "INSERT INTO #__jomres_messages_message ".$query_str;
		$result = doInsertSql($query);
		if ($result>0) {

			$webhook_notification							   = new stdClass();
			$webhook_notification->webhook_event				= 'message_created';
			$webhook_notification->webhook_event_description	= 'Logs when a message is created';
			$webhook_notification->webhook_event_plugin		 	= 'api';
			$webhook_notification->data						 	= new stdClass();
			$webhook_notification->data->message_id			   = $result;
			add_webhook_notification($webhook_notification);

			return $result;
		} else {
			throw new Exception('Invalid id created');
		}

	}

	public function get_message( $id = 0 )
	{
		if ($id == 0) {
			throw new Exception('Error, id not passed ');
		}

		$query = "SELECT `id`,`subject`, `creator_id`,`message_body`,`attachment_id`,`create_date`,`parent_message_id`,`expiry_date`,`is_reminder`,`is_active` FROM #__jomres_messages_message WHERE id = ".(int)$id." ORDER BY `create_date` ";
		$result = doSelectSql($query,2);
		$result['subject'] = $this->jomres_encryption->decrypt($result['subject']);
		$result['message_body'] = $this->jomres_encryption->decrypt($result['message_body']);

		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		set_showtime('jms_message_subject' , $result['subject'] );
		set_showtime('jms_message_message_body' , $result['message_body'] );
		$MiniComponents->triggerEvent('08200');
		$result['subject'] = get_showtime('jms_message_subject');
		$result['message_body'] = get_showtime('jms_message_message_body');

		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		foreach ($result as $key => $val ) {
			$this->model->values->$key = $val;

			if ( $key == 'subject') {

			}

		//$MiniComponents->triggerEvent('08200' , [ 'subject' => $this->model->values->subject , 'message' => $this->model->values->message_body ]);

		}

		return $result;
	}

	public function get_messages( $message_ids = array() )
	{
		if (empty($message_ids) ) {
			return array();
		}
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');

		$in = ' IN ('.jomres_implode($message_ids).')';

		$query = "SELECT `id`,`subject`, `creator_id`,`message_body`,`attachment_id`,`create_date`,`expiry_date`,`is_reminder`,`is_active` FROM #__jomres_messages_message WHERE id ".$in." ORDER BY `create_date` ";
		$result = doSelectSql($query);

		$messages = array();
		foreach ( $result as $res ) {

			$user_name = $this->get_username_by_id( $res->creator_id );

			$messages[$res->id]['id']					= $res->id;
			$messages[$res->id]['subject']				= $this->jomres_encryption->decrypt($res->subject);
			$messages[$res->id]['creator_id']			= $res->creator_id;
			$messages[$res->id]['creator_name']			= $user_name;
			$messages[$res->id]['message_body']			= $this->jomres_encryption->decrypt($res->message_body);
			$messages[$res->id]['attachment_id']		= $res->attachment_id;
			$messages[$res->id]['create_date']			= $res->create_date;
			$messages[$res->id]['expiry_date']			= $res->expiry_date;
			$messages[$res->id]['is_reminder']			= $res->is_reminder;
			$messages[$res->id]['is_active']			= $res->is_active;

			// 08200 is the trigger for parsing of message subjects and messages before returning to the caller
			set_showtime('jms_message_subject' , $messages[$res->id]['subject'] );
			set_showtime('jms_message_message_body' ,$messages[$res->id]['message_body'] );
			$MiniComponents->triggerEvent('08200');
			$messages[$res->id]['subject'] = get_showtime('jms_message_subject');
			$messages[$res->id]['message_body'] = get_showtime('jms_message_message_body');
			
		}

		return $messages;
	}

	private function get_username_by_id( $user_id )
	{
		if (!isset($this->user_names)) {
			$this->user_names = array();
		}

		if (isset($this->user_names[$user_id])) {
			return $this->user_names[$user_id];
		}

		$query = 'SELECT enc_firstname,enc_surname FROM #__jomres_guest_profile WHERE cms_user_id = '.(int) $user_id.' LIMIT 1';
		$userData = doSelectSql($query);
		if ($userData[0]->enc_firstname == '' && $userData[0]->enc_surname == '' ) {
			$user_name = jomres_cmsspecific_getUsername($user_id);
		} else {
			$this->jomres_encryption = new jomres_encryption();
			$firstname = $this->jomres_encryption->decrypt($userData[0]->enc_firstname);
			$surname = $this->jomres_encryption->decrypt($userData[0]->enc_surname);
			$user_name = $firstname .' '. $surname;
		}
		return $user_name;
	}

}
