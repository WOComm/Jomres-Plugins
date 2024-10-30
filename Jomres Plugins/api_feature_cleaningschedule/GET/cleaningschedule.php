<?php
/**
 * Core file
 *
 * @author  
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016 
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get Cleaning Schedule for a specific property
	** Description | Get Cleaning Schedule by property uid
	** Plugin | api_feature_cleaningschedule
	** Scope | properties_get
	** URL | cleaningschedule
 	** Method | GET
	** URL Parameters | cleaningschedule/@id(/:LANGUAGE) LANGUAGE is optional, default to en-GB if not sent
	** Data Parameters | None
	** Success Response |{
  "data": {
    "cleanschedule": [
      {
        "PROPERTYNAME": "Fawlty Towers",
        "ROOMNAMENUMBER": " 15",
        "ARRIVAL": "2017/02/09"
      },
      {
        "PROPERTYNAME": "Fawlty Towers",
        "ROOMNAMENUMBER": " 09",
        "ARRIVAL": "2017/02/09"
      },
      {
        "PROPERTYNAME": "Fawlty Towers",
        "ROOMNAMENUMBER": " 01",
        "ARRIVAL": "2017/02/20"
      },
      {
        "PROPERTYNAME": "Fawlty Towers",
        "ROOMNAMENUMBER": " 02",
        "ARRIVAL": "2017/02/20"
      },
      {
        "PROPERTYNAME": "Fawlty Towers",
        "ROOMNAMENUMBER": " 01",
        "ARRIVAL": "2017/02/22"
      },
      {
        "PROPERTYNAME": "Fawlty Towers",
        "ROOMNAMENUMBER": " 09",
        "ARRIVAL": "2017/02/23"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/cleaningschedule/1
	** Notes |
*/

Flight::route('GET /cleaningschedule/@id(/@year_month)(/@language)', function( $property_uid , $year_month , $language ) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	if (!isset($year_month)) {
		$thisMonth=date("Y/m");
	} else {
		$thisMonth=date("Y/m" , strtotime($year_month) );
	}
	
	$bang = explode("/" ,$thisMonth );

	if (!checkdate ( 01 , $bang[1] , $bang[0] )) {
		Flight::halt(204, "Invalid date passed");
	}
	
	$query = "SELECT `contract_uid`,`arrival`,`departure`,`property_uid` FROM #__jomres_contracts WHERE `departure` LIKE '".$thisMonth."%' AND property_uid = $property_uid ORDER BY `property_uid`,`departure` ";
	$result = doSelectSql($query);

	if (count($result)>0)
		{
		$contracts = array();
		foreach ($result as $c)
			{
			$contracts[$c->contract_uid]=array("contract_uid"=>$c->contract_uid,"departure"=>$c->departure,"arrival"=>$c->arrival,"property_uid"=>$c->property_uid);
			$cids[]=(int)$c->contract_uid;
			}
		$query = "SELECT `room_uid`,`contract_uid`,`date` FROM #__jomres_room_bookings WHERE contract_uid IN (".implode(',',$cids).") ";
		$result = doSelectSql($query);
		$bookedout_rooms=array();
		$rids=array();
		foreach ($result as $r)
			{
			$bookedout_rooms[]=array("room_uid"=>$r->room_uid,"contract_uid"=>$r->contract_uid,"date"=>$r->date);
			$rids[]=(int)$r->room_uid;
			}
		$rid=array_unique($rids);
		sort($rid);
		$query = "SELECT `room_name`,`room_number`,`room_uid` FROM #__jomres_rooms WHERE room_uid IN (".implode(',',$rid).") ";
		$result = doSelectSql($query);
		$property_rooms=array();
		foreach ($result as $r)
			{
			$property_rooms[$r->room_uid]=array("room_name"=>$r->room_name,"room_number"=>$r->room_number);
			}
		
		$rows=array();
		foreach ($contracts as $contract)
			{
			$r=array();
			foreach ($bookedout_rooms as $room)
				{
				if ($room['contract_uid']==$contract['contract_uid'] && $room['date'] == $contract['arrival'])
					{
					$rm_uid=$room['room_uid'];
					$property_uid=$contract['property_uid'];
					$r['PROPERTYNAME'] = getPropertyName($property_uid);
					$r['ROOMNAMENUMBER']=$property_rooms[$rm_uid]['room_name'].' '.$property_rooms[$rm_uid]['room_number'];
					$r['ARRIVAL']=$contract['arrival'];
					$rows[]=$r;
					}
				}
			}
		}
	Flight::json( $response_name = "cleanschedule" ,$rows);
	});