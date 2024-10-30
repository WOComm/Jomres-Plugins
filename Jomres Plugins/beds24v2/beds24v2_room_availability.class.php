<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################
#[AllowDynamicProperties]

class beds24v2_room_availability
	{
	function __construct($property_uid){
        if ($property_uid == 0 ){
            throw new Exception("beds24v2_room_availability property_uid not set");
            }
        $this->property_uid = (int)$property_uid;
        $this->url = 'Beds24'; // We don't need to set a url, the Beds24 endpoint will be available to other parts of the plugin. Instead, we'll call it "Beds24"
        
		$this->accommodation_tax_rate = 0.0;
        $this->mrConfig								= getPropertySpecificSettings($this->property_uid);
		if ( isset( $mrConfig[ 'accommodation_tax_code' ] ) && (int) $mrConfig[ 'accommodation_tax_code' ] > 0 )
			{
			$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
			$jrportal_taxrate->gather_data( (int)$mrConfig[ 'accommodation_tax_code' ] );
			$this->accommodation_tax_rate = (float)$jrportal_taxrate->rate;
			}
		}
    
    
    /*
    Sends room numbers to beds24. 
    Designed to be a self-contained method that'll send available room numbers & prices to beds24
    
    // Beds24 requires the data to be delivered as so
    
    {
    "authentication": {
        "apiKey": "apiKeyAsSetInAccountSettings",
        "propKey": "propKeyAsSetForTheProperty"
    },
    "roomId": "12345",
    "dates": {
        "20141015": {
            "p1": "45.00",
            "p2": "55.00",
            "p3": "65.00",
            "p4": "75.00",
            "i": "1"
            },
        "20141016": {
            "i": "0"
            },
        "20141019": {
            "p1": "49.99",
            "m": "2"
            }
        }
    }
    */
    public function update_room_numbers_to_beds24( ) {
       
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_uid        = $beds24v2_keys->watcher_get_manager_uid_for_property_uid($this->property_uid);
        $manager_key        = $beds24v2_keys->get_manager_key($manager_uid);
        $property_apikey    = $beds24v2_keys->get_property_key($this->property_uid , $manager_uid );        
        
        if ($manager_key == '' )
            return false;
        if ($property_apikey == '' )
            return false;
        
        $beds24v2_rooms = jomres_singleton_abstract::getInstance('beds24v2_rooms');
		$beds24v2_rooms->set_property_uid($this->property_uid);
        
        $beds24v2_rooms->prepare_data( $manager_key , $property_apikey );
        
        $tariffs		= $this->find_tariffs( $this->property_uid , $beds24v2_rooms );

        // At this point, the tariff data is structed like so 
        /*
          [68081]=>
          array(2) {
            [1]=>
            array(324) {
              ["2017/02/12"]=>
              array(2) {
                ["rate"]=>
                string(2) "80"
                ["minstay"]=>
                string(1) "1"
              }
              ["2017/02/13"]=>
              array(2) {
                ["rate"]=>
                string(2) "80"
                ["minstay"]=>
                string(1) "1"
              }
        Top is the beds24 room type, next is the tariff type, and finally the dates
        */
        
        $room_availability  = $this->get_room_availability();
        /*
        array(1) {
          ["dates"]=>
          array(1462) {
            ["2016/02/15"]=>
            array(4) {
              [1]=>
              array(3) {
                ["total_number_of_rooms_of_type"]=>
                int(9)
                ["roomtype"]=>
                string(11) "Double Room"
                ["total_number_of_rooms_of_type_available"]=>
                int(9)
              }
              [2]=>
              array(3) {
                ["total_number_of_rooms_of_type"]=>
                int(1)
                ["roomtype"]=>
                string(11) "Family Room"
                ["total_number_of_rooms_of_type_available"]=>
                int(1)
              }
        */
        
        $mrConfig=getPropertySpecificSettings($this->property_uid);

        if (!isset($mrConfig['beds24_update_prices'])) {
			$mrConfig['beds24_update_prices'] = 1;
		}
        // Beds24 will not accept prices/tariffs that go beyond one year from "today", so we need to figure out today then
        $year_from_now=new DateTime();
		$year_from_now->add(new DateInterval('P1Y'));
		
        // Here we'll break the data down into something that Beds24 can use          
        $dates_array = array(); 
        foreach ( $tariffs as $beds24_room_type=>$tariff_type_dates ) {
            $counter = 1;
            foreach ($tariff_type_dates as $tariff_type=>$tariff_dates ) {
                $odo = "p".$counter;
                foreach ( $tariff_dates as $date=>$tariff_details ) {
                    $this_date=date_create(date("Y/m/d" , strtotime($date) ) );
                    $diff=date_diff($year_from_now,$this_date);
                    if ( 
                        (int)$diff->format("%R%a") <= 0 && // Up to one year from today
                        (int)$diff->format("%R%a") > -365 // Not earlier than today
                        ) {
                        $jomres_room_type = $tariff_details['jomres_room_type'];
                        if (isset($room_availability['dates'][$date])) {
                            $qty_avail = $room_availability['dates'][$date][$jomres_room_type]['total_number_of_rooms_of_type_available'];
                            $condensed_date = str_replace ("/" , "" , $date );
                            $rate = $tariff_details['rate'];
                            if ($mrConfig['beds24_update_prices'] == "1" ) {
                                $dates_array[$beds24_room_type][$condensed_date][$odo] = $rate;
								$dates_array[$beds24_room_type][$condensed_date]["m"] = $tariff_details['minstay'];
                            }
                            
                            $dates_array[$beds24_room_type][$condensed_date]["i"] = $qty_avail;
                            
                            $dates_array[$beds24_room_type][$condensed_date]["room_type_desc"] = $room_availability['dates'][$date][$jomres_room_type]['roomtype'];
                        }
                    }

                    
                }
                $counter++;
            }            
        }

        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_uid        = $beds24v2_keys->watcher_get_manager_uid_for_property_uid($this->property_uid);
        $manager_key        = $beds24v2_keys->get_manager_key($manager_uid);
        $property_apikey    = $beds24v2_keys->get_property_key($this->property_uid , $manager_uid );
        
        jr_import("beds24v2_communication");
        $beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($manager_key);
        $beds24v2_communication->set_property_key($property_apikey);
        
        $results =array();
        
        foreach ($dates_array as $roomId=>$data ) {
            $payload = new stdClass;
            $payload->roomId = $roomId;
            $payload->dates = $data;
            
            $result = $beds24v2_communication->communicate_with_beds24("setRoomDates" ,  $payload );
            $results[] = json_decode($result);
            }

        logging::log_message("Sent room availability data to Beds24 for property uid ".getPropertyName($this->property_uid), 'Beds24v2', 'DEBUG' , "Responses : ". serialize($results));

        return;
        }

    // For a given date range, will find tariffs, sort them by dates and beds24 room type id.
	function find_tariffs( $property_uid , $beds24v2_rooms)
		{
        $all_tariff_types_to_tariff_id_xref = $this->get_property_tariff_types(); // Find the tariff types.
        $all_tariffs = $this->get_property_tariffs();
        
        // We need to group all tariffs now by tariff type
        $tariffs_grouped_by_tariff_type = array();
        foreach ( $all_tariff_types_to_tariff_id_xref as $tariff_type_id=>$tariffs_array ) {
            foreach ( $tariffs_array as $tariff_uid ) {
                if (isset($all_tariffs[$tariff_uid])) {
                    $tariff_data = $all_tariffs[$tariff_uid];
                    foreach ($tariff_data['tariff_dates'] as $date ) {
                            if ($tariff_data['roomrateperday'] != "0" ) {
                            $room_type = $tariff_data['roomclass_uid'];
                            $beds24_room_type = $beds24v2_rooms->xref_data['jomres_to_cm'][$room_type];
                            $tariffs_grouped_by_tariff_type[$beds24_room_type][$tariff_type_id][$date] = array ( "rate" => $tariff_data['roomrateperday'] , "minstay" => $tariff_data['mindays'] , "jomres_room_type" => $room_type);
                            }
                        }
                    }
                }
            }
        return $tariffs_grouped_by_tariff_type;
		}
    
    
    private function get_property_tariff_types() {
        $all_tariff_types_to_tariff_id_xref = array();

        $query = "SELECT tarifftype_id,tariff_id FROM #__jomcomp_tarifftype_rate_xref  WHERE property_uid = ".$this->property_uid;
        $tariff_type_list = doSelectSql($query);
        if (!empty($tariff_type_list)) {
            foreach ($tariff_type_list as $type) {
                $all_tariff_types_to_tariff_id_xref[ $type->tarifftype_id ][ ] = $type->tariff_id;
                }
            }
        return $all_tariff_types_to_tariff_id_xref;
        }
    
    private function get_property_tariffs() {
        $all_tariffs = array();
        $today = date('Y/m/d', mktime(0, 0, 0, date('m'), date('d'), date('Y')));
        $query = "SELECT `rates_uid`,`rate_title`,`rate_description`,`validfrom`,`validto`,
			`roomrateperday`,`mindays`,`maxdays`,`minpeople`,`maxpeople`,`roomclass_uid`,
			`ignore_pppn`,`allow_ph`,`allow_we`,`weekendonly`,`dayofweek`,`minrooms_alreadyselected`,`maxrooms_alreadyselected`
			FROM #__jomres_rates WHERE property_uid = $this->property_uid 
			AND DATE_FORMAT(`validto`, '%Y/%m/%d') >= DATE_FORMAT('".$today."', '%Y/%m/%d')
			";

        $tariffs = doSelectSql($query);

        $interval = new DateInterval('P1D');
        foreach ($tariffs as $t) {
            $roomrate = $this->get_nett_price($t->roomrateperday, $this->accommodation_tax_rate);
            $dates = $this->get_periods($t->validfrom, $t->validto.' 23:59:59', $interval);
            $all_tariffs[ $t->rates_uid ] = array(
                'rates_uid' => $t->rates_uid,
                'rate_title' => $t->rate_title,
                'rate_description' => $t->rate_description,
                'validfrom' => $t->validfrom,
                'validto' => $t->validto,
                'roomrateperday' => $roomrate,
                'mindays' => $t->mindays,
                'maxdays' => $t->maxdays,
                'minpeople' => $t->minpeople,
                'maxpeople' => $t->maxpeople,
                'roomclass_uid' => $t->roomclass_uid,
                'ignore_pppn' => $t->ignore_pppn,
                'allow_ph' => $t->allow_ph,
                'allow_we' => $t->allow_we,
                'weekendonly' => $t->weekendonly,
                'dayofweek' => $t->dayofweek,
                'minrooms_alreadyselected' => $t->minrooms_alreadyselected,
                'maxrooms_alreadyselected' => $t->maxrooms_alreadyselected,
                'tariff_dates' => $dates,
                );
        }
        return $all_tariffs;
        }
    
    /*
    Get's the current tax rate, which needs to be known to send prices to Beds24 as part of setRoomDates
    */
    private function get_property_tax_rate ( $property_uid ) {
        $mrConfig								= getPropertySpecificSettings($property_uid);
		$this->mrConfig['prices_inclusive']		= $mrConfig['prices_inclusive'];
	
		if (!isset($mrConfig['beds24_update_prices']))
			$mrConfig['beds24_update_prices'] = "1";
		$this->mrConfig['beds24_update_prices']	= $mrConfig['beds24_update_prices'];
		$this->accommodation_tax_rate = 0.0;
		if ( isset( $mrConfig[ 'accommodation_tax_code' ] ) && (int) $mrConfig[ 'accommodation_tax_code' ] > 0 )
			{
			$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
			$jrportal_taxrate->gather_data( (int)$mrConfig[ 'accommodation_tax_code' ] );
			$this->accommodation_tax_rate = (float)$jrportal_taxrate->rate;
			}
        return $this->accommodation_tax_rate;
        }

    /*
    Send start and end dates, returns all dates in period in Y/m/d format
    */
	private function get_periods( $start, $end, $interval = null )
		{
		$start = new DateTime( $start );
		$end   = new DateTime( $end );
		if ( is_null( $interval ) ) $interval = new DateInterval( 'P1D' );

		$period = new DatePeriod( $start, $interval, $end );
		$dates  = array ();
		foreach ( $period as $date )
			{
			$d        = $date->format( 'Y/m/d' );
			$dates[ ] = $d;
			}

		return $dates;
		}
        
    /*
    Will be passed the price, based on the property's setting it'll either be returned, or the nett value will be figured out before returning the result.
    */
	function get_nett_price( $price, $tax_rate )
		{
        
		if ( $this->mrConfig['prices_inclusive'] == 0 )
			{
			$percentageToAdd = $price * ( $this->accommodation_tax_rate / 100 );
			$price           = $price + $percentageToAdd;
			}
		return $price;
		}
        
    /*
    Expects to be passed an array of dates constructed by get_room_availability
    $start_date example 2017/02/01
    $end_date example 2017/02/14
    */
    
    public function filter_available_rooms_by_date( $availability_array , $start_date , $end_date) {
        $result = array();
        $dates_array = findDateRangeForDates( $start_date, $end_date );
       
        if (!empty( $availability_array['dates'])) {
            foreach ( $availability_array['dates'] as $date=>$rooms_data ) {
                 if (in_array($date , $dates_array) ) {
                    $result[$date] = $rooms_data;
                    }
                }
            }
        return $result;
        }
    
    public function get_room_availability() {
           // $startDate  = date("Y/m/d" , strtotime("-1 year") );
           // $endDate    = date("Y/m/d" , strtotime("3 years") );

            $arrivalDate    = date("Y/m/d", strtotime("-1 year") );
            $departureDate  = date("Y/m/d", strtotime("3 years") );

            $property_rooms = $this->get_rooms($this->property_uid);

            $dates_array = findDateRangeForDates( $arrivalDate, $departureDate );
            $gor = genericOr($dates_array,'date',false);
            $query="SELECT date,room_uid FROM #__jomres_room_bookings WHERE `property_uid` = '".$this->property_uid."' AND  ".$gor."";
            $bookingsList = doSelectSql($query);

            $dates_booked = array();
            $rooms_booked_by_date =array();
            if ( !empty($bookingsList)) {
                foreach ($bookingsList as $booking) {
                    if ( isset($property_rooms[$booking->room_uid]['roomtype_id']) ) { // If it´s not set, then it´s for a room that has since been deleted (?)
                        $room_type = $property_rooms[$booking->room_uid]['roomtype_id'];
                        if (!isset($dates_booked[$booking->date][$room_type]))
                            $dates_booked[$booking->date][$room_type] = 1;
                        else 
                            $dates_booked[$booking->date][$room_type] ++;
                        $rooms_booked_by_date[$booking->date][$room_type][] = $booking->room_uid;
                        
                    
                    }
                }
            }
            
            ksort($rooms_booked_by_date);

            $all_dates = array();
            if (!empty($property_rooms)){
                foreach ($property_rooms as $room_id=>$room) {
                    
                    foreach ($dates_array as $date) {
                        $roomtype_id = $room['roomtype_id'];
                        if (isset($all_dates['dates'][$date][$roomtype_id])) {
                            $all_dates['dates'][$date][$roomtype_id]['total_number_of_rooms_of_type'] ++;
                            $all_dates['dates'][$date][$roomtype_id]['total_number_of_rooms_of_type_available'] ++;
                        }
                        else {
                            $all_dates['dates'][$date][$roomtype_id]['total_number_of_rooms_of_type'] = 1;
                            $all_dates['dates'][$date][$roomtype_id]['roomtype'] = $room['roomtype'];
                            $all_dates['dates'][$date][$roomtype_id]['total_number_of_rooms_of_type_available'] = 1;
                        }
                    }
                }
            }
         
            if (!empty($dates_booked)) {
                foreach ($dates_booked as $date=>$number_of_room_type_booked) {
                    foreach ($number_of_room_type_booked as $roomtype_id=>$quantity) {
                        
                        $all_dates['dates'][$date][$roomtype_id]['total_number_of_rooms_of_type_available'] =$all_dates['dates'][$date][$roomtype_id]['total_number_of_rooms_of_type_available'] - $quantity;
                        if (isset($rooms_booked_by_date[$date][$roomtype_id]) ) {
                            $all_dates['dates'][$date][$roomtype_id]['rooms_booked_this_date'] = $rooms_booked_by_date[$date][$roomtype_id];
                        } else {
                             $all_dates['dates'][$date][$roomtype_id]['rooms_booked_this_date'] = array();
                        }
                            
                    }
                }
            }
        
            // Now to find those rooms (ids) available each of these dates
            foreach ( $all_dates['dates'] as $date=>$all_room_types ) {
                foreach ($property_rooms as $room_id=>$room_info) {
                    $room_type_id = $room_info['roomtype_id'];
                    if (!isset($all_room_types[$room_type_id]['rooms_booked_this_date'] ) ) {
                        $all_dates['dates'][$date][$room_type_id]['rooms_available_this_date'][] = $room_id;
                    } else {
                        if (!in_array( $room_id , $all_room_types[$room_type_id]['rooms_booked_this_date'] ) ) {
                            $all_dates['dates'][$date][$room_type_id]['rooms_available_this_date'][] = $room_id;
                        }
                    }
                }
            }

            return  $all_dates;
        }


    public function get_rooms($property_uid) {
        $current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
        $current_property_details->gather_data($property_uid);

        $jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');

        //get all room details
        $basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
        $basic_room_details->get_all_rooms($property_uid);
        
        $rows = array();
        
        if (!empty($basic_room_details->rooms)) {
            //get room and room feature images
            $jomres_media_centre_images->get_images($property_uid, array('rooms', 'room_features'));
            foreach ($basic_room_details->rooms as $room) {
                $r = array();

                $id = $room['room_uid'];
                $r[ 'ID' ] = $id;
               // room_classes_uid

                $r[ 'roomname' ]    = $room['room_name'];
                $r[ 'roomnumber' ]  = stripslashes($room['room_number']);
                $r[ 'roomfloor' ]   = stripslashes($room['room_floor']);
                $r[ 'maxpeople' ]   = $room['max_people'];
                $r[ 'roomtype_id' ] = $current_property_details->all_room_types[ $room['room_classes_uid'] ]['room_classes_uid'];
                $r[ 'roomtype' ]    = $current_property_details->all_room_types[ $room['room_classes_uid'] ]['room_class_abbv'];

                $rows[$id] = $r;
            }
        }
    return $rows;   
    }
}