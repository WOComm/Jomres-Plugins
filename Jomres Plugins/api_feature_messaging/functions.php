<?php

function messaging_object_to_array($data)
{
	if (is_array($data) || is_object($data))
	{
		$result = [];
		foreach ($data as $key => $value)
		{
			$result[$key] = (is_array($value) || is_object($value)) ? messaging_object_to_array($value) : $value;
		}
		return $result;
	}
	return $data;
}

function messaging_get_username($user_id)
{
	$jomres_encryption = new jomres_encryption();

	$query = 'SELECT enc_firstname,enc_surname FROM #__jomres_guest_profile WHERE cms_user_id = '.(int) $user_id.' LIMIT 1';
	$userData = doSelectSql($query);
	if ( !isset($userData[0]) || $userData[0]->enc_firstname == '' && $userData[0]->enc_surname == '' ) {
		$user_name = jomres_cmsspecific_getUsername($user_id);
	} else {
		$firstname = $jomres_encryption->decrypt($userData[0]->enc_firstname);
		$surname = $jomres_encryption->decrypt($userData[0]->enc_surname);
		$user_name = $firstname .' '. $surname;
	}

	return $user_name;
}


function get_message($id = 0 )
{
	if ($id ==0) {
		Flight::halt(204, [ 'response' => [ "error_message" => "Message id unknown" , "error_number" => '001' ] ] );
	}

	$messages_model_message = new messages_model_message();
	return $messages_model_message->get_message($id);
}


function get_property_managers_ids( $property_uid = 0 )
{
	if ($property_uid == 0 ){
		Flight::halt(204, [ 'response' => [ "error_message" => "Invalid property uid" , "error_number" => '001' ] ] );
	}

	$arr = array();
	$query = 'SELECT `property_uid`, `manager_id` FROM #__jomres_managers_propertys_xref';
	$managersToPropertyList = doSelectSql($query);
	if (!empty($managersToPropertyList)) {
		foreach ($managersToPropertyList as $x) {
			if ($x->property_uid == $property_uid) {
				$arr[] = $x->manager_id;
			}
		}
	}
	return $arr;
}

function get_super_property_manager_ids ()
{
	$arr = array();
	$query = 'SELECT `userid` FROM #__jomres_managers WHERE access_level = 90 ';
	$superPropertyManagers = doSelectSql($query);
	if (!empty($superPropertyManagers)) {
		foreach ($superPropertyManagers as $x) {
			$arr[] = $x->userid;
		}
	}
	return $arr;
}

function messaging_build_query ($model)
{
	$str_1 = '';
	$str_2 = '';

	$vars = get_object_vars($model->default);
	foreach ($vars as $key => $val ){
		if ( isset($model->values->$key) ) {
			$val = $model->values->$key;
		}
		$str_1 .= '`'.$key.'`,';
		$str_2 .= "'".$val."',";
	}

	$str_1 = rtrim($str_1, ",");
	$str_2 = rtrim($str_2, ",");

	return ' ('.$str_1.') VALUES ('.$str_2.') ';
}
