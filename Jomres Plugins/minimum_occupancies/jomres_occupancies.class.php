<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class jomres_occupancies
	{
	function __construct()
		{
		$this->id					= 0;
		$this->room_type_id			= 0;
		$this->property_uid			= 0;
		$this->guest_type_map		= array();	// The map should be passed to the class as an array, where the index/key is the guest_type_id and the value is the quantity
		$this->all_occupancies		= array();
		$this->error				= false;
		}

	function get()
		{
		if ($this->room_type_id > 0 )
			{
			$query = "SELECT id,room_type_id,property_uid,guest_type_map FROM #__jomres_minimum_occupancies WHERE `room_type_id`='".(int)$this->room_type_id."' AND property_uid = ".(int)$this->property_uid." LIMIT 1";
			$result=doSelectSql($query);
			if ($result && count($result)==1)
				{
				foreach ($result as $r)
					{
					$this->id							= (int)$r->id;
					$this->room_type_id					= (int)$r->room_type_id;
					$this->property_uid					= (int)$r->property_uid;
					$this->guest_type_map				= unserialize($r->guest_type_map);
					}
				return true;
				}
			else
				{
				if (empty($result))
					{
					$this->error = "No occupancies were found with that id";
					return false;
					}
				elseif (count($result)> 1)
					{
					$this->error = "More than one occupancy was found with that id";
					return false;
					}
				}
			}
		else
			{
			$this->error = "ID of occupancy not available";
			return false;
			}
		}

	function commit()
		{
		if ($this->room_type_id > 0 )
			{
			$map = $this->validate_and_serialize_map($this->guest_type_map);
			if ($map)
				{
				$query="INSERT INTO #__jomres_minimum_occupancies
					(
					`room_type_id`,
					`property_uid`,
					`guest_type_map`
					)
					VALUES
					(
					'".(int)$this->room_type_id."',
					'".(int)$this->property_uid."',
					'".$map."'
					)";
				$result = doInsertSql($query,'');
				if ($result)
					{
					$this->id=$result;
					return true;
					}
				else
					{
					$this->error = "ID of occupancy could not be found after apparent successful insert";
					return false;
					}
				}
			else
				{
				error_logging(  "Could not validate map.");
				return false;
				}
			}
		$this->error = "ID of occupancy already available. Are you sure you are creating a new occupancy?";
		return false;
		}

	function delete()
		{
		if ($this->room_type_id > 0 )
			{
			$query="DELETE FROM #__jomres_minimum_occupancies WHERE `room_type_id` = ".(int)$this->room_type_id." AND property_uid = ".(int)$this->property_uid." LIMIT 1";
			$result=doInsertSql($query,"");
			if ($result)
				{
				return true;
				}
			else
				{
				error_logging(  "Could not delete occupancy.");
				return false;
				}
			}
		error_logging(  "ID of occupancy not available");
		return false;
		}
	
	function validate_and_serialize_map($map)
		{
		if ($this->property_uid == 0)
			{
			error_logging(  "Could not validate occupancy, property_uid not set.");
			return false;
			}
		$query = "SELECT id FROM #__jomres_customertypes WHERE property_uid = ".(int)$this->property_uid;
		$all_property_guesttypes = doSelectSql($query);
		if (!empty($all_property_guesttypes) && !empty($map))
			{
			$ptypes = array();
			$new_map = array();
			foreach ($all_property_guesttypes as $type)
				{
				$ptypes[]=$type->id;
				}
			foreach ($map as $key=>$val)
				{
				if (!in_array($key,$ptypes))
					{
					error_logging(  "Could not find any guest types for this property.");
					return false;
					}
				else
					{
					$new_map[(int)$key]=(int)$val;
					}
				}
			return serialize($new_map);
			}
		else
			{
			error_logging(  "Could not find any guest types for this property, or $map count = 0.");
			return false;
			}
		}
		
	function get_all_by_property_uid()
		{
		if ($this->property_uid == 0)
			{
			error_logging(  "Could not get occupancies, property_uid not set.");
			return false;
			}
		
		$query = "SELECT id,room_type_id,property_uid,guest_type_map FROM #__jomres_minimum_occupancies WHERE `property_uid`=".(int)$this->property_uid;
		$result=doSelectSql($query);
		if (!empty($result))
			{
			foreach ($result as $r)
				{
				$this->all_occupancies[$r->room_type_id]['id']				= (int)$r->id;
				$this->all_occupancies[$r->room_type_id]['room_type_id']	= (int)$r->room_type_id;
				$this->all_occupancies[$r->room_type_id]['property_uid']	= (int)$r->property_uid;
				$this->all_occupancies[$r->room_type_id]['guest_type_map']	= unserialize($r->guest_type_map);
				}
			return true;
			}
		else
			return false;
		}
	}
