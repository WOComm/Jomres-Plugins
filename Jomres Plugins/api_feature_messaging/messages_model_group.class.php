<?php
// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class messages_model_group
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
		$this->model->default->name = 'Change me';
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

	public function save_group()
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		set_showtime('jms_message_group_name' , $this->model->values->name );
		$MiniComponents->triggerEvent('08300');
		$this->model->values->name = get_showtime('jms_message_group_name');

		$query_str = messaging_build_query($this->model);
		$query = "INSERT INTO #__jomres_messages_group ".$query_str;
		return doInsertSql($query);
	}

	public function get_group( $id = 0 )
	{
		if ($id == 0) {
			throw new Exception('Error, id not passed ');
		}

		$query = "SELECT `name`, `create_date`,`is_active` FROM #__jomres_messages_group WHERE id = ".$id;
		$result = doSelectSql($query,2);

		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		set_showtime('jms_message_group_name' , $result['name'] );
		$MiniComponents->triggerEvent('08300');
		$result['name'] = get_showtime('jms_message_group_name');

		return $result;
	}

	/**
	Incomplete
	 **/
	public function get_groups( $group_ids = array()  )
	{
		if (empty($group_ids) ) {
			return array();
		}

		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');

		$in = ' IN ('.jomres_implode($group_ids).')';
				
		$query = "SELECT `id`, `name`, `create_date`,`is_active` FROM #__jomres_messages_group WHERE id ".$in;
		$result = doSelectSql($query);

		$response = array();
		if (!empty($result)) {
			foreach ($result as $res) {
				$response[$res->id]['name'] = $res->name;
				$response[$res->id]['create_date'] = $res->create_date;
				$response[$res->id]['is_active'] = $res->is_active;

				set_showtime('jms_message_group_name' , $response[$res->id]['name'] );
				$MiniComponents->triggerEvent('08400');
				$response[$res->id]['name'] = get_showtime('jms_message_group_name');
			}
		}
		return $response;
	}
}
