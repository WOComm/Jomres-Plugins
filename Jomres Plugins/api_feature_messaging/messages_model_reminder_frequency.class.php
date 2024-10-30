<?php
// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class messages_model_reminder_frequency
{
	/**
	*
	* Constructor.
	*
	*/
	public function __construct()
	{
		$this->model = new stdClass();
		$this->model->default = new stdClass();
		$this->model->default->title = 'Change me';
		$this->model->default->frequency = 0;
		$this->model->default->is_active = 1;
		$this->model->values = new stdClass();
	}

	public function set_value ( $key = '' , $val = '' )
	{
		if ($key == '') {
			throw new Exception('Error, key empty ');
		}
		$this->model->values->$key = $val;
	}

	public function save_message()
	{
		$query_str = messaging_build_query($this->model);
		$query = "INSERT INTO #__jomres_messages_reminder_frequency ".$query_str;
		var_dump($query);exit;
		//$result = doInsertSql($query);
	}
}
