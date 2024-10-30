<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get bookings for a specific property
	** Description | Get all bookings for a property by property uid
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/@ID
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listbooking": [
      {
        "contract_uid": 93,
        "arrival": "2017/02/25",
        "departure": "2017/03/01",
        "contract_total": 50,
        "tag": "54180147",
        "currency_code": "EUR",
        "booked_in": 0,
        "bookedout": 0,
        "deposit_required": "50",
        "deposit_paid": 0,
        "special_reqs": "",
        "timestamp": "2017-02-21 16:54:34",
        "cancelled": 0,
        "invoice_uid": 48,
        "property_uid": 1,
        "approved": 1,
        "last_changed": "2017-02-21 17:54:34",
        "firstname": "Anon Guest",
        "surname": "Anon Guest",
        "tel_landline": "Anon Guest",
        "tel_mobile": "Anon Guest",
        "email": "test@test.com",
        "imgColor": "grey",
        "TxtStatus": "Arrival Pending"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listbooking/85
	** Notes |

*/

Flight::route('GET /listbooking/@id(/@language)', function( $property_uid, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
	
		$img_pending     = "grey";
		$img_arrivetoday = "orange";
		$img_resident    = "green";
		$img_late        = "red";
		$img_departtoday = "blue";
		$img_stillhere   = "purple";
		$img_bookedout   = "teal";
		$img_cancelled   = "black";

		$txt_unknown     = "unknown";
		$txt_pending     = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_PENDING', '_JOMRES_COM_MR_VIEWBOOKINGS_PENDING', false);
		$txt_arrivetoday = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVETODAY', '_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVETODAY', false);
		$txt_resident    = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_RESIDENT', '_JOMRES_COM_MR_VIEWBOOKINGS_RESIDENT', false);
		$txt_late        = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_LATE', '_JOMRES_COM_MR_VIEWBOOKINGS_LATE', false);
		$txt_departtoday = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTTODAY', '_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTTODAY', false);
		$txt_stillhere   = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_STILLHERE', '_JOMRES_COM_MR_VIEWBOOKINGS_STILLHERE', false);
		$txt_bookedout   = jr_gettext('_JOMRES_STATUS_CHECKEDOUT', '_JOMRES_STATUS_CHECKEDOUT', false);
		$txt_cancelled   = jr_gettext('_JOMRES_STATUS_CANCELLED', '_JOMRES_STATUS_CANCELLED', false);

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT SQL_CALC_FOUND_ROWS a.`contract_uid`, a.`arrival`,  a.`departure`, a.`contract_total`, a.`tag`, a.`currency_code`, a.`booked_in`, a.`bookedout`,
		  a.`deposit_required`, a.`deposit_paid`, a.`special_reqs`, a.`timestamp`, a.`cancelled`, a.`invoice_uid`, a.`property_uid`, a.`approved`, a.last_changed, b.`enc_firstname`, b.`enc_surname`, b.`enc_tel_landline`, b.`enc_tel_mobile`, b.`enc_email`
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE b.`property_uid` =:property_uid AND a.`tag` IS NOT NULL ORDER BY a.`arrival` desc ";


	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$listbooking = array();
	while ($row = $stmt->fetch())
		{
			$imgToShow = $img_pending;
			$TxtToShow = $txt_pending;
			$today     = date( "Y/m/d" );
			$arrival   = $row['arrival'];
			$departure = $row['departure'];
			$bookedIn  = $row['booked_in'];
			$bookedOut  = $row['bookedout'];
			$cancelled  = $row['cancelled'];

			$date_elements = explode( "/", $today );
			$unixToday     = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
			$date_elements = explode( "/", $arrival );
			$unixArrival   = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
			$date_elements = explode( "/", $departure );
			$unixDeparture = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
			if ( $unixArrival == $unixToday && $bookedIn != "1" )
				{ $imgToShow = $img_arrivetoday; $TxtToShow = $txt_arrivetoday;}
			if ( $unixDeparture == $unixToday && $bookedIn == "1" )
				{ $imgToShow = $img_departtoday; $TxtToShow = $txt_departtoday;}
			if ( $unixArrival < $unixToday && $bookedIn != "1" )
				{ $imgToShow = $img_late; $TxtToShow = $txt_late;}
			if ( $unixDeparture > $unixToday && $bookedIn == "1" )
				{ $imgToShow = $img_resident; $TxtToShow = $txt_resident;}
			if ( $unixDeparture < $unixToday && $bookedIn == "1" )
				{ $imgToShow = $img_stillhere; $TxtToShow = $txt_stillhere; }
			if ( $bookedOut == "1" )
				{ $imgToShow = $img_bookedout; $TxtToShow = $txt_bookedout; }
			if ( $cancelled == "1" )
				{ $imgToShow = $img_cancelled; $TxtToShow = $txt_cancelled; }


		$listbooking[] = array (
			"contract_uid"=> 		$row['contract_uid'] ,
			"arrival"=> 			$row['arrival'] ,
			"departure"=> 			$row['departure'] ,
			"contract_total"=> 		$row['contract_total'] ,
			"tag"=> 				$row['tag'] ,
			"currency_code"=> 		$row['currency_code'] ,
			"booked_in"=> 			$row['booked_in'] ,
			"bookedout"=> 			$row['bookedout'] ,
			"deposit_required"=> 	$row['deposit_required'] ,
			"deposit_paid"=> 		$row['deposit_paid'] ,
			"special_reqs"=> 		$row['special_reqs'] ,
			"timestamp"=> 			$row['timestamp'] ,
			"cancelled"=> 			$row['cancelled'] ,
			"invoice_uid"=> 		$row['invoice_uid'],
			"property_uid"=> 		$row['property_uid'] ,
			"approved"=> 			$row['approved'] ,
			"last_changed"=> 		$row['last_changed'] ,
			"firstname"=> 			$jomres_encryption->decrypt($row['enc_firstname']),
			"surname"=> 			$jomres_encryption->decrypt($row['enc_surname']),
			"tel_landline"=> 		$jomres_encryption->decrypt($row['enc_tel_landline']),
			"tel_mobile"=> 			$jomres_encryption->decrypt($row['enc_tel_mobile']),
			"email"=> 				$jomres_encryption->decrypt($row['enc_email']),
			"imgColor"=> 			$imgToShow,
            "TxtStatus"=> 			$TxtToShow
			);
		}

	$conn = null;
	Flight::json( $response_name = "listbooking" ,$listbooking);
	});

/*
	** Title | Get arrival-departure details of a booking 
	** Description | Get's the arrival and departure information about a booking based on it's contract uid
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/:ID/:CONTRACTID/arr-dep
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listbookingarrdep": [
      {
        "BOOKING_ARRIVAL": "Saturday, 25 February 2017",
        "BOOKING_DEPARTURE": "Wednesday, 01 March 2017",
        "NUM_NIGHTS": 4,
        "BOOKINGTYPE": "Reception",
        "BOOKERSUSERNAME": "jomres",
        "SPECIALREQS": ""
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access" , 204 "Contract uid incorrect." ( is the uid for another property? )
	** Sample call |jomres/api/listbooking/85/312/arr-dep
	** Notes |
*/

Flight::route('GET /listbooking/@id/@contractid/arr-dep(/@language)', function( $property_uid, $contract_uid, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

/* 	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data($property_uid); */
	$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
	$current_contract_details->gather_data($contract_uid, $property_uid);
    
    if (empty($current_contract_details->contract)) { // contract doesn't exist
        Flight::halt(204, "Contract uid incorrect.");
        }
    
	if (isset($current_contract_details->contract[$contract_uid]['roomdeets']))
		{
		foreach ($current_contract_details->contract[$contract_uid]['roomdeets'] as $rd)
			{
			$roomBooking_black_booking = $rd['black_booking'];
			$roomBooking_reception_booking = $rd['reception_booking'];
			}

		if ( (int)$roomBooking_black_booking == 1 )
			$bookingType = jr_gettext( '_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_BLACK', '_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_BLACK' );
		elseif ( (int)$roomBooking_reception_booking == 1 )
			$bookingType = jr_gettext( '_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_RECEPTION', '_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_RECEPTION' );
		else
			$bookingType = jr_gettext( '_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_INTERNET', '_JOMRES_COM_MR_EB_ROOM_BOOKINGTYPE_INTERNET' );
		}
	else
		$bookingType = '';

	$listbooking_arrdep[] = array (
		"BOOKING_ARRIVAL"=> 	outputDate( $current_contract_details->contract[$contract_uid]['contractdeets']['arrival'] ),
		"BOOKING_DEPARTURE" => 	outputDate( $current_contract_details->contract[$contract_uid]['contractdeets']['departure'] ),
		"NUM_NIGHTS" => 		count( explode( ",", $current_contract_details->contract[$contract_uid]['contractdeets']['date_range_string'] ) ),
		"BOOKINGTYPE" => 		$bookingType,
		"BOOKERSUSERNAME" => 	$current_contract_details->contract[$contract_uid]['contractdeets']['username'],
		"SPECIALREQS" => 		jomres_decode($current_contract_details->contract[$contract_uid]['contractdeets']['special_reqs'])
		);

	Flight::json( $response_name = "listbookingarrdep" ,$listbooking_arrdep);

	});

/*
	** Title | Get Guest Details for a contract uid
	** Description | Get Guest Details of a booking based on the contract uid
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/:ID/:CONTRACTID/guest
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listbookingguest": [
      {
        "GUEST_FIRSTNAME": "Anon Guest",
        "GUEST_SURNAME": "Anon Guest",
        "GUEST_HOUSE": "Anon Guest",
        "GUEST_STREET": "Anon Guest",
        "GUEST_TOWN": "Anon Guest",
        "GUEST_REGION": "Baden-Wurttemberg",
        "GUEST_COUNTRY": "Germany",
        "GUEST_POSTCODE": "Anon Guest",
        "GUEST_TEL_LANDLINE": "Anon Guest",
        "GUEST_TEL_MOBILE": "Anon Guest",
        "GUEST_VAT_NUMBER": "",
        "EMAIL_LINK": "mailto:test@test.com?subject=Booking number 54180147 @ Fawlty Towers&body=Dear Anon Guest Anon Guest RE Booking number 54180147",
        "EMAIL_ADDRESS": "test@test.com",
        "GUEST_IMAGE": "http://localhost/joomla_portal/jomres/images/noimage.gif"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listbooking/85/312/guest
	** Notes |
*/


Flight::route('GET /listbooking/@id/@contractid/guest(/@language)', function( $property_uid, $contract_uid, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data($property_uid);

	$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
	$current_contract_details->gather_data($contract_uid, $property_uid);

    if (empty($current_contract_details->contract)) { // contract doesn't exist
        Flight::halt(204, "Contract uid incorrect.");
        }
        
		$guest_type_rows = array ();
		if ( get_showtime( 'include_room_booking_functionality' ) )
			{
			foreach ( $current_contract_details->contract[$contract_uid]['guesttype'] as $type )
				{
				$r = array ();
				$r[ 'GUEST_TYPE_TITLE' ] = $type[ 'title' ];
				$r[ 'GUEST_TYPE_QTY' ] = $type[ 'qty' ];
				$guest_type_rows[ ] = $r;
				}
			}

		$listbooking_guest[] = array (

		"GUEST_FIRSTNAME"          => $current_contract_details->contract[$contract_uid]['guestdeets']['firstname'],
		"GUEST_SURNAME"            => $current_contract_details->contract[$contract_uid]['guestdeets']['surname'],
		"GUEST_HOUSE"              => $current_contract_details->contract[$contract_uid]['guestdeets']['house'],
		"GUEST_STREET"             => $current_contract_details->contract[$contract_uid]['guestdeets']['street'],
		"GUEST_TOWN"               => $current_contract_details->contract[$contract_uid]['guestdeets']['town'],
		"GUEST_REGION"             => $current_contract_details->contract[$contract_uid]['guestdeets']['county'],
		"GUEST_COUNTRY"            => $current_contract_details->contract[$contract_uid]['guestdeets']['country'],
		"GUEST_POSTCODE"           => $current_contract_details->contract[$contract_uid]['guestdeets']['postcode'],
		"GUEST_TEL_LANDLINE"       => $current_contract_details->contract[$contract_uid]['guestdeets']['tel_landline'],
		"GUEST_TEL_MOBILE"         => $current_contract_details->contract[$contract_uid]['guestdeets']['tel_mobile'],
		"GUEST_VAT_NUMBER"         => $current_contract_details->contract[$contract_uid]['guestdeets']['vat_number'],
		"EMAIL_LINK"               => 'mailto:'
									. $current_contract_details->contract[$contract_uid]['guestdeets']['email']
									. '?subject=' . jr_gettext( '_JOMRES_BOOKING_NUMBER', '_JOMRES_BOOKING_NUMBER', false )
									. ' '
									. $current_contract_details->contract[$contract_uid]['contractdeets']['tag']
									. ' @ '
									. $current_property_details->property_name
									. '&body=' . jr_gettext( '_JOMRES_COM_CONFIRMATION_DEAR', '_JOMRES_COM_CONFIRMATION_DEAR', false )
									. ucfirst( $current_contract_details->contract[$contract_uid]['guestdeets']['firstname'] )
									. ' '
									. ucfirst( $current_contract_details->contract[$contract_uid]['guestdeets']['surname'] )
									. ' RE '
									. jr_gettext( '_JOMRES_BOOKING_NUMBER', '_JOMRES_BOOKING_NUMBER', false )
									. ' '
									. $current_contract_details->contract[$contract_uid]['contractdeets']['tag'],
		"EMAIL_ADDRESS"           => $current_contract_details->contract[$contract_uid]['guestdeets']['email'],
		"GUEST_IMAGE"             => $current_contract_details->contract[$contract_uid]['guestdeets']['image']
			);

	Flight::json( $response_name = "listbookingguest" ,$listbooking_guest);

	});

/*
	** Title | Get Rooms Details of list booking
	** Description | Get Rooms Details of list booking
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/:ID/:CONTRACTID/rooms
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listbookingrooms": [
      {
        "_JOMRES_COM_MR_EB_ROOM_NAME": "Room name",
        "RINFO_NAME": "",
        "_JOMRES_COM_MR_LISTTARIFF_RATETITLE": "Tariff title",
        "RINFO_TARIFF": "",
        "_JOMRES_COM_MR_EB_ROOM_NUMBER": "Room",
        "RINFO_NUMBER": "05",
        "_JOMRES_COM_MR_EB_ROOM_FLOOR": "Floor",
        "RINFO_ROOM_FLOOR": "",
        "_JOMRES_COM_MR_EB_ROOM_MAXPEOPLE": "Max people",
        "RINFO_MAX_PEOPLE": "2",
        "_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV": "Room/property type",
        "TYPE": "Double Room"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listbooking/85/312/rooms
	** Notes |
*/

Flight::route('GET /listbooking/@id/@contractid/rooms(/@language)', function( $property_uid, $contract_uid, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
	$current_property_details->gather_data($property_uid);

	$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
	$current_contract_details->gather_data($contract_uid, $property_uid);

    if (empty($current_contract_details->contract)) { // contract doesn't exist
        Flight::halt(204, "Contract uid incorrect.");
        }
    $rooms_tab_replacement = get_showtime( 'rooms_tab_replacement' );

		if ( is_null( $rooms_tab_replacement ) )
			{
			$listbooking_rooms = array ();
			foreach ($current_contract_details->contract[$contract_uid]['roomdeets'] as $rd)
				{
				$r = array ();

				$type = $current_property_details->all_room_types[$rd['room_classes_uid']]['room_class_abbv'];

				$r[ '_JOMRES_COM_MR_EB_ROOM_NAME' ]         = jr_gettext( '_JOMRES_COM_MR_EB_ROOM_NAME', '_JOMRES_COM_MR_EB_ROOM_NAME' );
				$r[ 'RINFO_NAME' ]                          = $rd[ 'room_name' ];
				$r[ '_JOMRES_COM_MR_LISTTARIFF_RATETITLE' ] = jr_gettext( '_JOMRES_COM_MR_LISTTARIFF_RATETITLE', '_JOMRES_COM_MR_LISTTARIFF_RATETITLE' );
				$r[ 'RINFO_TARIFF' ]                        = $rd[ 'rate_title' ];
				$r[ '_JOMRES_COM_MR_EB_ROOM_NUMBER' ] 		= jr_gettext( '_JOMRES_COM_MR_EB_ROOM_NUMBER', '_JOMRES_COM_MR_EB_ROOM_NUMBER' );
				$r[ 'RINFO_NUMBER' ]                  		= $rd[ 'room_number' ];
				$r[ '_JOMRES_COM_MR_EB_ROOM_FLOOR' ]  		= jr_gettext( '_JOMRES_COM_MR_EB_ROOM_FLOOR', '_JOMRES_COM_MR_EB_ROOM_FLOOR' );
				$r[ 'RINFO_ROOM_FLOOR' ]              		= $rd[ 'room_floor' ];
				$r[ '_JOMRES_COM_MR_EB_ROOM_MAXPEOPLE' ] 	= jr_gettext( '_JOMRES_COM_MR_EB_ROOM_MAXPEOPLE', '_JOMRES_COM_MR_EB_ROOM_MAXPEOPLE' );
				$r[ 'RINFO_MAX_PEOPLE' ]                 	= $rd[ 'max_people' ];
				$r[ '_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV' ] 	= jr_gettext( '_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV', '_JOMRES_COM_MR_EB_ROOM_CLASS_ABBV' );
				$r[ 'TYPE' ]                              	= $type;
				$listbooking_rooms[ ]						= $r;
				}
			}

	Flight::json( $response_name = "listbookingrooms" ,$listbooking_rooms);

	});

/*
	** Title | Get balance information about a booking
	** Description | Get balance/payment information about a booking, based on the contract uid
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/:ID/:CONTRACTID/payment
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listbookingpayment": [
      {
        "SINGLE_PERSON_SUPPLIMENT": "0.00€",
        "ROOM_TOTAL": "41.67€",
        "DEPOSITPAID": "No",
        "BOOKING_DEPOSIT_REQUIRED": "50.00€",
        "BOOKING_CONTRACT_TOTAL": "50.00€",
        "BOOKING_DEPOSIT_REF": null,
        "TAX": "8.33€",
        "EXTRASOPTIONSVALUE": "0.00€",
        "GRAND_TOTAL": "50.00€",
        "REMAINDER_TO_PAY": "50.00€"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listbooking/85/312/payment
	** Notes |
*/

Flight::route('GET /listbooking/@id/@contractid/payment(/@language)', function( $property_uid, $contract_uid, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
	$current_contract_details->gather_data($contract_uid, $property_uid);

    if (empty($current_contract_details->contract)) { // contract doesn't exist
        Flight::halt(204, "Contract uid incorrect.");
        }
        
	$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );

	if (isset($current_contract_details->contract[$contract_uid]['extradeets']))
		{
		foreach ( $current_contract_details->contract[$contract_uid]['extradeets'] as $extra )
			{
			$r = array ();
			$quantity = $extra['qty'];
			$price    = $extra['price'];
			if ( $mrConfig[ 'prices_inclusive' ] == "0" )
				{
				$tax_rate_id = (int) $extra['tax_rate'];
				$jrportal_taxrate->gather_data($tax_rate_id);
				$taxrate = (float)$jrportal_taxrate->rate;
				$tax = ( $price / 100 ) * $taxrate;
				$inc_price = $price + $tax;
				}
			else
				$inc_price = $price;

			$extra_tax_output = "";
			if ( $taxrate > 0 )
				$extra_tax_output = $taxrate;
			$r[ 'EXTRA_NAME' ]            = $extra['name'];
			$r[ 'EXTRA_INCLUSIVE_PRICE' ] = output_price( $inc_price );
			$r[ 'EXTRA_TAX' ]             = $extra_tax_output;
			$r[ 'EXTRA_QUANTITY' ]        = $quantity;
			$extras_rows[ ]               = $r;
			}
		}

		$other_services_rows = array ();
		$otherServiceTotal   = 0.00;
		if ( isset( $current_contract_details->contract[$contract_uid]['extraservice'] ) )
			{
			foreach ( $current_contract_details->contract[$contract_uid]['extraservice'] as $e )
				{
				$service_value = $e['service_value'] * $e['service_qty'];
				$xs_tax = ( $service_value / 100 ) * (float) $e['tax_rate_val'];
				$otherServiceTotal = $otherServiceTotal + ( $service_value + $xs_tax );

				$r = array ();
				$r[ 'OTHER_SERVICE' ] = $e['service_description'];
				$r[ 'OTHER_SERVICE_VALUE' ] = output_price( $service_value + $xs_tax );
				$other_services_rows[ ] = $r;
				}
			}

		if ( (int)$current_contract_details->contract[$contract_uid]['contractdeets']['invoice_uid'] > 0 )
			{
			jr_import( "jrportal_invoice" );
			$invoice = new jrportal_invoice();
			$invoice->id = $current_contract_details->contract[$contract_uid]['contractdeets']['invoice_uid'];
			$remaindertopay = $invoice->get_line_items_balance();
			}
		else
			{
			if ( (int)$current_contract_details->contract[$contract_uid]['contractdeets']['deposit_paid'] == 1 )
				$remaindertopay = ( $otherServiceTotal + $current_contract_details->contract[$contract_uid]['contractdeets']['contract_total'] ) - $current_contract_details->contract[$contract_uid]['contractdeets']['deposit_required'];
			else
				$remaindertopay = $otherServiceTotal + $current_contract_details->contract[$contract_uid]['contractdeets']['contract_total'];
			}

		if ( (int)$current_contract_details->contract[$contract_uid]['contractdeets']['deposit_paid'] == 1 )
			$depositPaid = jr_gettext( '_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES' );
		else
			$depositPaid = jr_gettext( '_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO' );

		if ( get_showtime( 'include_room_booking_functionality' ) ) // Jintour property bookings will probably not want to show this information, so we won't add it
			{
			$SINGLE_PERSON_SUPPLIMENT = output_price( $current_contract_details->contract[$contract_uid]['contractdeets']['single_person_suppliment'] );
			}

		$listbooking_payment[] = array (
			"SINGLE_PERSON_SUPPLIMENT"  => $SINGLE_PERSON_SUPPLIMENT,
			"ROOM_TOTAL" 				=> output_price( $current_contract_details->contract[$contract_uid]['contractdeets']['room_total'] ),
			"DEPOSITPAID"               => $depositPaid,
			"BOOKING_DEPOSIT_REQUIRED"  => output_price( $current_contract_details->contract[$contract_uid]['contractdeets']['deposit_required'] ),
			"BOOKING_CONTRACT_TOTAL"    => output_price( $current_contract_details->contract[$contract_uid]['contractdeets']['contract_total'] ),
			"BOOKING_DEPOSIT_REF"       => $current_contract_details->contract[$contract_uid]['contractdeets']['deposit_ref'],
			"TAX"                       => output_price( $current_contract_details->contract[$contract_uid]['contractdeets']['tax'] ),
			"EXTRASOPTIONSVALUE"        => output_price( $current_contract_details->contract[$contract_uid]['contractdeets']['extrasvalue'] ),
			"GRAND_TOTAL"               => output_price( $otherServiceTotal + $current_contract_details->contract[$contract_uid]['contractdeets']['contract_total'] ),
			"REMAINDER_TO_PAY"          => output_price( $remaindertopay )
			);

	Flight::json( $response_name = "listbookingpayment" ,$listbooking_payment);
	});

/*
	** Title | Get Notes Details of a booking
	** Description | Get Notes Details of list booking
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/:ID/:CONTRACTID/notes
	** Data Parameters | None
	** Success Response |{
  "data": {
    "listbookingnotes": [
      {
        "NOTE": "Laundry service required daily.",
        "DATETIME": "2017-02-22 07:48:07",
        "EDITLINK": "http://localhost/joomla_portal/index.php?option=com_jomres&Itemid=103&lang=en&jomreslang=en-GB&task=editnote&note_id=86&contract_uid=93",
        "EDITTEXT": "Edit note",
        "DELETELINK": "http://localhost/joomla_portal/index.php?option=com_jomres&Itemid=103&lang=en&jomreslang=en-GB&task=deletenote&note_id=86&contract_uid=93",
        "DELETETEXT": "Delete note"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listbooking/85/312/notes
	** Notes |
*/

Flight::route('GET /listbooking/@id/@contractid/notes(/@language)', function( $property_uid, $contract_uid, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
	$current_contract_details->gather_data($contract_uid, $property_uid);

    if (empty($current_contract_details->contract)) { // contract doesn't exist
        Flight::halt(204, "Contract uid incorrect.");
        }

		$listbooking_notes = array();
		foreach ( $current_contract_details->contract[$contract_uid]['notedeets'] as $n )
			{
            if (trim($n['note']) != '' ) {
                $r=array();
                $r[ 'NOTE' ]       		= $n['note'];
                $r[ 'DATETIME' ]   		= $n['timestamp'];
                $r[ 'EDITLINK' ]   		= JOMRES_SITEPAGE_URL_NOSEF . "&task=editnote&note_id=" . $n['id'] . "&contract_uid=" . (int) $contract_uid;
                $r[ 'EDITTEXT' ]   		= jr_gettext( '_JOMCOMP_BOOKINGNOTES_EDIT', '_JOMCOMP_BOOKINGNOTES_EDIT', $editable = false, $isLink = true );
                $r[ 'DELETELINK' ] 		= JOMRES_SITEPAGE_URL_NOSEF . '&task=deletenote&note_id=' . $n['id'] . '&contract_uid=' . $contract_uid;
                $r[ 'DELETETEXT' ] 		= jr_gettext( '_JOMCOMP_BOOKINGNOTES_DELETE', '_JOMCOMP_BOOKINGNOTES_DELETE', $editable = false, $isLink = true );
                $listbooking_notes[ ]	= $r;
                }
			}

	Flight::json( $response_name = "listbookingnotes" ,$listbooking_notes);
	});


/*
	** Title | Get bookings between certain dates
	** Description | Provide a list of all bookings within a pair of dates
	** Plugin | api_feature_listbooking
	** Scope | properties_get
	** URL | listbooking
 	** Method | GET
	** URL Parameters | listbooking/@ID/:START_DATE/:END_DATE
	** Data Parameters | None
    ** Success Response |{
  "data": {
    "listbookingdate": [
      {
        "contract_uid": 58,
        "arrival": "2017/02/23",
        "departure": "2017/02/28",
        "contract_total": 50,
        "tag": "73323210",
        "currency_code": "EUR",
        "booked_in": 0,
        "bookedout": 0,
        "deposit_required": "50",
        "deposit_paid": 0,
        "special_reqs": "",
        "timestamp": "2017-02-16 14:06:30",
        "cancelled": 0,
        "invoice_uid": 46,
        "property_uid": 1,
        "approved": 1,
        "last_changed": "2017-02-21 17:37:38",
        "firstname": "webhook test",
        "surname": "webhook test",
        "tel_landline": "webhook test",
        "tel_mobile": "webhook test",
        "email": "notify@jomres.net",
        "imgColor": "grey",
        "TxtStatus": "Arrival Pending"
      },
      {
        "contract_uid": 93,
        "arrival": "2017/02/25",
        "departure": "2017/03/01",
        "contract_total": 50,
        "tag": "54180147",
        "currency_code": "EUR",
        "booked_in": 0,
        "bookedout": 0,
        "deposit_required": "50",
        "deposit_paid": 0,
        "special_reqs": "",
        "timestamp": "2017-02-21 16:54:34",
        "cancelled": 0,
        "invoice_uid": 48,
        "property_uid": 1,
        "approved": 1,
        "last_changed": "2017-02-21 17:54:34",
        "firstname": "Anon Guest",
        "surname": "Anon Guest",
        "tel_landline": "Anon Guest",
        "tel_mobile": "Anon Guest",
        "email": "test@test.com",
        "imgColor": "grey",
        "TxtStatus": "Arrival Pending"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/listbooking/85/2016-05-20/2016-05-22
	** Notes |
*/

Flight::route('GET /listbooking/@id/@start/@end(/@language)', function( $property_uid , $startDate , $endDate, $language)
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);
	require_once("../framework.php");

	jr_import('jomres_encryption');
	$jomres_encryption = new jomres_encryption();
	
	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
    require_once("../framework.php");

	$img_pending     = "grey";
	$img_arrivetoday = "orange";
	$img_resident    = "green";
	$img_late        = "red";
	$img_departtoday = "blue";
	$img_stillhere   = "purple";
	$img_bookedout   = "teal";
	$img_cancelled   = "black";

	$txt_unknown     = "unknown";
	$txt_pending     = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_PENDING', '_JOMRES_COM_MR_VIEWBOOKINGS_PENDING', false);
	$txt_arrivetoday = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVETODAY', '_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVETODAY', false);
	$txt_resident    = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_RESIDENT', '_JOMRES_COM_MR_VIEWBOOKINGS_RESIDENT', false);
	$txt_late        = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_LATE', '_JOMRES_COM_MR_VIEWBOOKINGS_LATE', false);
	$txt_departtoday = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTTODAY', '_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTTODAY', false);
	$txt_stillhere   = jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_STILLHERE', '_JOMRES_COM_MR_VIEWBOOKINGS_STILLHERE', false);
	$txt_bookedout   = jr_gettext('_JOMRES_STATUS_CHECKEDOUT', '_JOMRES_STATUS_CHECKEDOUT', false);
	$txt_cancelled   = jr_gettext('_JOMRES_STATUS_CANCELLED', '_JOMRES_STATUS_CANCELLED', false);

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query 	=  "SELECT SQL_CALC_FOUND_ROWS a.`contract_uid`, a.`arrival`,  a.`departure`, a.`contract_total`, a.`tag`, a.`currency_code`, a.`booked_in`, a.`bookedout`,
		  a.`deposit_required`, a.`deposit_paid`, a.`special_reqs`, a.`timestamp`, a.`cancelled`, a.`invoice_uid`, a.`property_uid`, a.`approved`, a.last_changed, b.`enc_firstname`, b.`enc_surname`, b.`enc_tel_landline`, b.`enc_tel_mobile`, b.`enc_email`
			FROM ".Flight::get("dbprefix")."jomres_contracts `a` LEFT JOIN ".Flight::get("dbprefix")."jomres_guests `b` ON a.`guest_uid` = b.`guests_uid` WHERE b.`property_uid` =:property_uid AND a.`tag` IS NOT NULL AND ( ( DATE_FORMAT(a.`arrival`, '%Y/%m/%d') BETWEEN DATE_FORMAT('" . $startDate . "', '%Y/%m/%d') AND DATE_FORMAT('" . $endDate . "', '%Y/%m/%d') ) OR ( DATE_FORMAT(a.`departure`, '%Y/%m/%d') BETWEEN DATE_FORMAT('" . $startDate . "', '%Y/%m/%d') AND DATE_FORMAT('" . $endDate . "', '%Y/%m/%d') ) ) ORDER BY a.`arrival` ";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);
	$property_uids = array();

	$listbooking = array();
	while ($row = $stmt->fetch())
		{
		$imgToShow = $img_pending;
		$TxtToShow = $txt_pending;
		$today     = date( "Y/m/d" );
		$arrival   = $row['arrival'];
		$departure = $row['departure'];
		$bookedIn  = $row['booked_in'];
		$bookedOut  = $row['bookedout'];
		$cancelled  = $row['cancelled'];

		$date_elements = explode( "/", $today );
		$unixToday     = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
		$date_elements = explode( "/", $arrival );
		$unixArrival   = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
		$date_elements = explode( "/", $departure );
		$unixDeparture = mktime( 0, 0, 0, $date_elements[ 1 ], $date_elements[ 2 ], $date_elements[ 0 ] );
		if ( $unixArrival == $unixToday && $bookedIn != "1" )
			{ $imgToShow = $img_arrivetoday; $TxtToShow = $txt_arrivetoday;}
		if ( $unixDeparture == $unixToday && $bookedIn == "1" )
			{ $imgToShow = $img_departtoday; $TxtToShow = $txt_departtoday;}
		if ( $unixArrival < $unixToday && $bookedIn != "1" )
			{ $imgToShow = $img_late; $TxtToShow = $txt_late;}
		if ( $unixDeparture > $unixToday && $bookedIn == "1" )
			{ $imgToShow = $img_resident; $TxtToShow = $txt_resident;}
		if ( $unixDeparture < $unixToday && $bookedIn == "1" )
			{ $imgToShow = $img_stillhere; $TxtToShow = $txt_stillhere; }
		if ( $bookedOut == "1" )
			{ $imgToShow = $img_bookedout; $TxtToShow = $txt_bookedout; }
		if ( $cancelled == "1" )
			{ $imgToShow = $img_cancelled; $TxtToShow = $txt_cancelled; }

		$listbooking[] = array (
			"contract_uid"=> 		$row['contract_uid'] ,
			"arrival"=> 			$row['arrival'] ,
			"departure"=> 			$row['departure'] ,
			"contract_total"=> 		$row['contract_total'] ,
			"tag"=> 				$row['tag'] ,
			"currency_code"=> 		$row['currency_code'] ,
			"booked_in"=> 			$row['booked_in'] ,
			"bookedout"=> 			$row['bookedout'] ,
			"deposit_required"=> 	$row['deposit_required'] ,
			"deposit_paid"=> 		$row['deposit_paid'] ,
			"special_reqs"=> 		$row['special_reqs'] ,
			"timestamp"=> 			$row['timestamp'] ,
			"cancelled"=> 			$row['cancelled'] ,
			"invoice_uid"=> 		$row['invoice_uid'],
			"property_uid"=> 		$row['property_uid'] ,
			"approved"=> 			$row['approved'] ,
			"last_changed"=> 		$row['last_changed'] ,
			"firstname"=> 			$jomres_encryption->decrypt($row['enc_firstname']) ,
			"surname"=> 			$jomres_encryption->decrypt($row['enc_surname']) ,
			"tel_landline"=> 		$jomres_encryption->decrypt($row['enc_tel_landline']) ,
			"tel_mobile"=> 			$jomres_encryption->decrypt($row['enc_tel_mobile']) ,
			"email"=> 				$jomres_encryption->decrypt($row['enc_email']),
			"imgColor"=> 			$imgToShow,
            "TxtStatus"=> 			$TxtToShow
			);
		}

	$conn = null;
	Flight::json( $response_name = "listbookingdate" ,$listbooking);
	});