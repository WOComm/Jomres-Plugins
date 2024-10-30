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
	** Title | Get Property Availability
	** Description | Get the room availabiity of a property. Returns the room uids available on the requested dates.
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/availabilities/:START_DATE/:END_DATE
	** Data Parameters | None
	** Success Response | {"data":{"available_rooms":{"7":{"room_uid":7,"room_name":"","room_number":"01","room_classes_uid":1,"room_features_uid":"","max_people":3}}}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/2/availabilities/2016-05-20/2016-05-22
	** Notes |
*/

Flight::route('GET /properties/@id/availabilities/@arrival_date/@departure_date', function( $property_uid , $arrival_date , $departure_date) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	
	$query = "SELECT room_uid,room_name,room_number,room_classes_uid,room_features_uid,max_people FROM ".Flight::get("dbprefix")."jomres_rooms WHERE propertys_uid = :propertys_uid ORDER BY room_number,room_name";
	$stmt = $conn->prepare( $query );
	
	$stmt->execute([ 'propertys_uid' => $property_uid ]);
	
	$rooms = array();
	while ($row = $stmt->fetch())
		{
		$rooms[ $row['room_uid'] ]= array ( 
			'room_uid'=> $row['room_uid'] , 
			'room_name'=> $row['room_name'] ,
			'room_number'=> $row['room_number'] ,
			'room_classes_uid'=> $row['room_classes_uid'] ,
			'room_features_uid'=> $row['room_features_uid'] ,
			'max_people'=> $row['max_people']
			);
		}

	$room_uids = array_keys($rooms);
	
	$start = new DateTime( $arrival_date );
	$end   = new DateTime( $departure_date );
	$interval = new DateInterval( 'P1D' );
	$period = new DatePeriod( $start, $interval, $end );
	$dates  = array ();
	foreach ( $period as $date )
		{
		$d        = $date->format( 'Y/m/d' );
		$dates[ ] = $d;
		}
	
	$stmt = $conn->query("SELECT 
		`room_uid` 
		FROM ".Flight::get("dbprefix")."jomres_room_bookings 
		WHERE 
		`room_uid` IN ('" . implode('\',\'',$room_uids) ."') 
		AND
		`date` IN ('" . implode('\',\'',$dates) ."')
		");
	$room_bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
 	if (count($room_bookings)>0)
		{
	
		foreach ( $room_bookings as $occupied_room_uid )
			{
			$room_uid = $occupied_room_uid['room_uid'];
			if ( isset ( $rooms [ $room_uid ] ) )
				{
				unset ($rooms [$room_uid] );
				}
			}
		}
	
	$conn = null;

	Flight::json( $response_name = "available_rooms" ,$rooms);
	
	});


/*
	** Title | Get timeline events between certain dates.
	** Description | This function replicates the ajax call that initially builds the timeline data.
	** Plugin | api_feature_properties
	** Scope | properties_get
	** URL | properties
 	** Method | GET
	** URL Parameters | properties/:ID/availabilities/timeline/:START_DATE/:END_DATE
	** Data Parameters | None
	** Success Response | {"data":{"dashboard_availabilities":"[{\"id\":\"76_11\",\"resourceId\":\"11\",\"start\":\"2016-05-20T12:00:00\",\"end\":\"2016-05-21T11:59:59\",\"title\":\"Partner_booking_6 Partner_booking_6\",\"url\":\"http:\\\/\\\/localhost\\\/quickstart\\\/index.php?option=com_jomres&Itemid=103&lang=en&task=editBooking&contract_uid=76&thisProperty=2\",\"className\":\"label label-red\",\"description\":\"Booking number: 18022177From: Friday, 20 May 2016To: Saturday, 21 May 2016\",\"contract_uid\":\"76\",\"room_uid\":\"11\",\"this_contract_room_uids\":[\"11\"]},{\"id\":\"77_12\",\"resourceId\":\"12\",\"start\":\"2016-05-20T12:00:00\",\"end\":\"2016-05-31T11:59:59\",\"title\":\"Partner_booking_6 Partner_booking_6\",\"url\":\"http:\\\/\\\/localhost\\\/quickstart\\\/index.php?option=com_jomres&Itemid=103&lang=en&task=editBooking&contract_uid=77&thisProperty=2\",\"className\":\"label label-red\",\"description\":\"Booking number: 89900542From: Friday, 20 May 2016To: Tuesday, 31 May 2016\",\"contract_uid\":\"77\",\"room_uid\":\"12\",\"this_contract_room_uids\":[\"12\"]}]"},"meta":{"code":200}}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/properties/2/availabilities/timeline/2016-05-20/2016-05-22
	** Notes |
*/

Flight::route('GET /properties/@id/availabilities/timeline/@start/@end', function( $property_uid , $start , $end) 
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");
	
	$_GET['property_uid'] = $property_uid;
	$_GET['start'] = str_replace("-","",$start);
	$_GET['end'] = str_replace("-","",$end);
	$componentArgs = array ("output_now" => false );

	$MiniComponents =jomres_getSingleton('mcHandler');
	$result = $MiniComponents->specificEvent('06001',"dashboard_events_ajax" , $componentArgs);

	$conn = null;

	Flight::json( $response_name = "dashboard_availabilities" ,$result);
	
	});

	//http://localhost/quickstart/index.php?option=com_jomres&no_html=1&jrajax=1&Itemid=103&lang=en&task=dashboard_events_ajax&property_uid=1&start=2016-05-29&end=2016-06-12&_=1464688708740
	
	