<?php
// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class messages_model_user_group
{
	/**
	*
	* Constructor.
	*
	*/

	public function __construct()
	{
		$create_date = date_create()->format('Y-m-d H:i:s');

		$this->model = new stdClass();
		$this->model->default = new stdClass();
		$this->model->default->user_id = 0;
		$this->model->default->group_id = 0;
		$this->model->default->property_uid = 0;
		$this->model->default->create_date = $create_date;
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

	public function save_user_group()
	{
		$query_str = messaging_build_query($this->model);
		$query = "INSERT INTO #__jomres_messages_user_group ".$query_str;
		return doInsertSql($query);
	}

	public function get_groups( $user_id = 0 )
	{
		if ($user_id == 0 ) {
			throw new Exception('Error,user id not passed ');
		}

		$query = "SELECT `id`,`user_id`,`group_id`, `property_uid` , `create_date` FROM  #__jomres_messages_user_group WHERE `user_id` = ".(int)$user_id." ORDER BY id DESC ";
		$result = doSelectSql($query);

		$group_ids = array();
		if (!empty($result)) {
			foreach ($result as $res) {
				$group_ids[$res->id] = array ( "id" => $res->id , "user_id" => $res->user_id , "group_id" => $res->group_id , "property_uid" => $res->property_uid , "create_date" => $res->create_date );
			}
		}
		return $group_ids;
	}

	public function get_group_members( $group_id = 0 )
	{
		if ($group_id == 0 ) {
			throw new Exception('Error,griup id not passed ');
		}

		$query = "SELECT `user_id` FROM  #__jomres_messages_user_group WHERE `group_id` = ".(int)$group_id."";
		$result = doSelectSql($query);
		$response = array();
		if (!empty($result)) {
			foreach ($result as $r) {
				$user_name = messaging_get_username($r->user_id);
				$response[] = array ( "user_name" => $user_name , "user_id" => $r->user_id );
			}
		}

		return $response;
	}
}
