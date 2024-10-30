<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright    2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################
#[AllowDynamicProperties]

class beds24v2_bookings
    {
    /*
    The property's uid
    */
    private $property_uid = 0;
    
    /*
    The property´s manager api key
    */
    private $manager_key = '';
    
    /*
    The property´s own api key
    */
    private $property_key = '';
    
  
    function __construct(){
        }
    
    public static function getInstance()
    {
        if (!self::$configInstance) {
            self::$configInstance = new self();
        }

        return self::$configInstance;
    }

    public function __clone()
    {
        trigger_error('Cloning not allowed on a singleton object', E_USER_ERROR);
    }
    
    public function set_property_uid($property_uid) {
        if ($property_uid == 0 ){
            throw new Exception("beds24v2_rooms property_uid not set");
            }
        $this->property_uid = (int)$property_uid;
        
        $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
        $manager_uid              = $beds24v2_keys->watcher_get_manager_uid_for_property_uid($this->property_uid);
        $this->manager_key        = $beds24v2_keys->get_manager_key($manager_uid);
        $this->property_apikey    = $beds24v2_keys->get_property_key($this->property_uid , $manager_uid );
    }
	
	public function get_beds24_booking_ids_for_property() {
		
		$query = "SELECT contract_uid , property_uid , booking_number , room_id FROM #__jomres_beds24_contract_booking_number_xref WHERE property_uid=".(int)$this->property_uid." ";
		return doSelectSql($query);
			
	}
	
    public function get_all_bookings() 
    {

        if ($this->property_uid == 0 ){
            throw new Exception("beds24v2_bookings property_uid not set");
        }
        if ($this->manager_key == '' ){
            throw new Exception("beds24v2_bookings manager_key not set");
        }
        if ($this->property_apikey == '' ){
            throw new Exception("beds24v2_bookings property_apikey not set");
        }

        logging::log_message("Sending request for bookings to Beds24 " , 'Beds24v2', 'DEBUG' , '' );
        
        jr_import("beds24v2_communication");
        $beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($this->manager_key);
        $beds24v2_communication->set_property_key($this->property_apikey);
        return json_decode($beds24v2_communication->communicate_with_beds24("getBookings" , '' ));
    }
    
    public function get_single_booking( $bookId ) 
    {

        if ($this->property_uid == 0 ){
            throw new Exception("get_single_booking property_uid not set");
        }
        if ($this->manager_key == '' ){
            throw new Exception("get_single_booking manager_key not set");
        }
        if ($this->property_apikey == '' ){
            throw new Exception("get_single_booking property_apikey not set");
        }
        if ($bookId == '' ){
            throw new Exception("get_single_booking bookId not set");
        }
        
        logging::log_message("Sending request for booking $bookId to Beds24 " , 'Beds24v2', 'DEBUG' , '' );
        
        $booking = new stdClass;
        $booking->bookId = $bookId;

        jr_import("beds24v2_communication");
        $beds24v2_communication = new beds24v2_communication();
        $beds24v2_communication->set_manager_key($this->manager_key);
        $beds24v2_communication->set_property_key($this->property_apikey);
        $result = json_decode($beds24v2_communication->communicate_with_beds24("getBookings" , $booking ));
		return $result;
    }
    
    public function get_all_local_bookings() 
    {
		$pastDate=date('Y-m-d', strtotime('-1 year', strtotime(date('Y-m-d'))) );
        $query = "SELECT contract_uid FROM #__jomres_contracts WHERE cancelled != 1 AND bookedout != 1 AND approved = 1 AND property_uid  = ".$this->property_uid." AND DATE(`timestamp`) > '".$pastDate."'  ";

        $result = doSelectSql($query);
        $contract_uids = array();
        if (!empty($result) ) {
            foreach ($result as $booking ) {
                $contract_uids[] = $booking->contract_uid;
            }
        }
        return $contract_uids;
    }
    
    /*
    Bookings already exported to Beds24 will have a corresponding record in the #__jomres_beds24_contract_booking_number_xref table, so when passed an array of contract uids, we will remove any already 
    $contract_uids is a straighforward array
    */
    public function filter_local_bookings_already_exported_to_beds24( $contract_uids ) 
    {
		$pastDate=date('Y-m-d', strtotime('-1 year', strtotime(date('Y-m-d'))) );
        $query = "SELECT `contract_uid` FROM #__jomres_contracts WHERE `cancelled` != 1 AND `bookedout` != 1 AND `approved` = 1 AND `property_uid`  = ".(int)$this->property_uid."  AND DATE(`timestamp`) > '".$pastDate."' AND contract_uid NOT IN (SELECT `contract_uid` FROM #__jomres_beds24_contract_booking_number_xref)";
        $result = doSelectSql($query);
        $bookings_requiring_export = array();
        if (!empty($result)){
            foreach ($result as $r ) {
                $bookings_requiring_export[] = $r->contract_uid;
            }
        
        }
        return $bookings_requiring_export;
    }
    
    public function export_jomres_bookings_to_beds24( $local_bookings ) 
    {
        if (empty($local_bookings)) {
            return false;
        }
        foreach ( $local_bookings as $contract_uid ) {
            $data = new stdClass;
            $data->property_uid = (int)$this->property_uid;
            $data->contract_uid = $contract_uid;
            $data->task = "booking_added";
            $this->update_beds24_with_booking($data);
        }
    }
    
    public function modify_booking($bookId , $property_uid ) 
    {
        $query = "SELECT  contract_uid FROM #__jomres_contracts WHERE tag='BEDS24_".(string)$bookId."'";
		$result = doSelectSql($query);
		$contract_uids = array();
		if (!empty($result))
			{
			foreach ($result as $no)
				{
				if ( $no->contract_uid > 0 ) 
					$contract_uids[]=$no->contract_uid;
				}
			}
			
		if (empty($contract_uids)) { // If the contracts array is empty, it could be a booking that was previously sent to beds24, but then modified in beds24 or upstream of there, we'll check the xref table to see if the booking number exists in there
			$query = "SELECT `contract_uid` FROM #__jomres_beds24_contract_booking_number_xref WHERE `booking_number` = ".(string)$bookId;
			$result = doSelectSql($query);
			if  (!empty($result)) {
			foreach ($result as $no)
				{
				if ( $no->contract_uid > 0 ) 
					$contract_uids[]=$no->contract_uid;
				}
			}
		}
		        

        if (!empty($contract_uids)) {
            foreach ( $contract_uids as $contract_uid ) {
                logging::log_message("Found booking number : ".$contract_uid."  for bookId ".$bookId , 'Beds24v2', 'DEBUG' , '' );
                $query = "SELECT `note` , `timestamp` FROM #__jomcomp_notes WHERE contract_uid = " . (int) $contract_uid ;
                $notes = doSelectSql($query);
                $previous_notes = '';
                if (!empty($notes)) {
                    foreach ($notes as $note) {
                        $previous_notes .= $note->timestamp.' '.$note->note.'
                        <br/>';
                     }
                }
                
				jr_import('jomres_generic_booking_cancel');
				$bkg = new jomres_generic_booking_cancel();

				$bkg->property_uid = $property_uid;
				$bkg->contract_uid = $contract_uid;
				$bkg->reason = "Booking modified in Channel Manager";
				$bkg->note = "";

				$cancellationSuccessful = $bkg->cancel_booking();

                $query = "DELETE FROM #__jomres_contracts WHERE contract_uid = " . (int) $contract_uid ;
                $result = doInsertSql($query);
 
                $query = "DELETE FROM #__jomres_beds24_contract_booking_number_xref WHERE contract_uid=".(string)$contract_uid;
                $result = doInsertSql($query); 
				
				
				
                logging::log_message("Adding new contract " , 'Beds24v2', 'DEBUG' , '' );
                
                $booking = $this->get_single_booking($bookId);
                $new_contract_uid = $this->import_beds24_bookings_into_jomres($booking);
                if ($previous_notes != '') {
                    addBookingNote( $new_contract_uid, $this->property_uid, $previous_notes );
                }
            }
        } else { // We have been asked to modify a booking, but we cannot find a contract uid for that booking, so we'll recreate it in Jomres
		
				$query = "DELETE FROM #__jomres_beds24_contract_booking_number_xref WHERE `booking_number` = '".(int)$bookId."'";
				$result = doInsertSql($query);
				
				$beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
				$beds24v2_bookings->set_property_uid($property_uid);
				$booking = $beds24v2_bookings->get_single_booking($bookId);
				$beds24v2_bookings->import_beds24_bookings_into_jomres($booking);
		}
    }
        
        
    public function import_beds24_bookings_into_jomres($beds24_bookings) 
    {
        jr_import("beds24v2_room_availability");
        $beds24v2_room_availability = new beds24v2_room_availability($this->property_uid);
        $this->current_dates_and_bookings = $beds24v2_room_availability->get_room_availability();

        $query = "SELECT `booking_number` FROM #__jomres_beds24_contract_booking_number_xref WHERE `property_uid` = ".(int)$this->property_uid;
        $current = doSelectSql($query);

        $current_bookings_already_in_jomres = array();
        foreach ($current as $booking ) {
            $current_bookings_already_in_jomres[] = $booking->booking_number;
        }

        foreach ( $beds24_bookings as $beds24_booking ) {
            if (!in_array($beds24_booking->bookId , $current_bookings_already_in_jomres ) ) {
                $this->import_beds24_booking_into_jomres($beds24_booking);
            }
        }
    }
    
    public function import_beds24_booking_into_jomres( $beds24_booking )
    {

        if (
            $this->property_uid == 0 ||
            trim($beds24_booking->firstNight) == "" ||
            trim($beds24_booking->lastNight) == "" ||
            trim($beds24_booking->roomId) == "" ||
            trim($beds24_booking->bookId) == "" ||
            trim($beds24_booking->price) == "" ||
            trim($beds24_booking->tax) == ""
            ) 
            {
            logging::log_message("Failed to insert beds24 booking, incomplete data" , 'Beds24v2', 'ERROR' , serialize($beds24_booking) );
            if ( $this->property_uid == 0 ) error_log("Property uid not set " );
            if ( trim($beds24_booking->firstNight) == "" )       return false;
            if ( trim($beds24_booking->lastNight) == "" )        return false;
            if ( trim($beds24_booking->roomId) == "" )           return false;
            if ( trim($beds24_booking->bookId) == "" )           return false;
            
            if ( trim($beds24_booking->price) == "" )            return false;
            if ( trim($beds24_booking->tax) == "" )              return false;
            }
            	
        if (!isset($beds24_booking->roomQty)) {
            logging::log_message("Tried to import booking, but room quantity not set " , 'Beds24v2', 'ERROR' , '' );
            return false;
        }
        
        if ( (int) $beds24_booking->roomQty == 0 ) {
            logging::log_message("Tried to import booking, but room quantity incorrect " , 'Beds24v2', 'ERROR' , '' );
            return false;
        }
        
        if ( trim($beds24_booking->guestName) == "" ){
            $beds24_booking->guestName = "Unknown"; 
        }
        if ( trim($beds24_booking->guestCountry) == "" ){
            $beds24_booking->guestCountry = "Unknown"; 
        }
		
		if ( isset($beds24_booking->status) && (int)$beds24_booking->status == 0 ) { // Already cancelled bookings
			return true;
		}
		
        $query = "SELECT contract_uid FROM #__jomres_contracts WHERE tag = '"."BEDS24_".filter_var($beds24_booking->bookId, FILTER_SANITIZE_SPECIAL_CHARS )."' LIMIT 1";
        $bklist = doSelectSql($query);
        if (!empty($bklist)) { // The booking has already been imported into the system previously, we'll return true and move on
            return true;
        }
        
        $siteConfig        = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
        $jrConfig          = $siteConfig->get();
                    
        jr_import( 'jomres_generic_booking_insert' );
        $bkg = new jomres_generic_booking_insert();
        
        $current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
        $current_property_details->gather_data($this->property_uid);
        
        $mrConfig = getPropertySpecificSettings( $this->property_uid );
        
        $propertyConfig = jomres_singleton_abstract::getInstance( 'jomres_config_property_singleton' );
        $propertyConfig->property_config['requireApproval'] ="0"; // We need to directly access the singleton to set requireApproval to 0 so that the booking doesn't require approval later. We can't use the approval functionality here as that requires tempbookingdata to allow the customer to complete the payment, which of course doesn't exist as they've not come through the Jomres booking engine.

        if ( isset($propertyConfig->property_config['useGlobalCurrency']) && $propertyConfig->property_config['useGlobalCurrency'] == "1")
            $currency_code = $jrConfig['globalCurrencyCode'];
        else
            $currency_code = $mrConfig['property_currencycode'];
        
        //OK, let`s move on and set the new booking details
        $bkg->booking_details['property_uid']               = $this->property_uid;
		
		if (isset($bkg->booking_details['channel_manager_booking'])) {
			$bkg->booking_details['channel_manager_booking']    = 1;
		}
		
		
        $bkg->booking_details['arrivalDate']                = str_replace("-","/",filter_var( $beds24_booking->firstNight, FILTER_SANITIZE_SPECIAL_CHARS ) );
        $bkg->booking_details['departureDate']              = date("Y/m/d" ,strtotime( filter_var( $beds24_booking->lastNight, FILTER_SANITIZE_SPECIAL_CHARS )." + 1 day " ) );
        $dates                                              = findDateRangeForDates( $bkg->booking_details['arrivalDate'] , $bkg->booking_details['departureDate'] );
        $this->allBarLast                                   = array_slice($dates, 0, count($dates)-1, true);
        $bkg->booking_details['dateRangeString']            = implode(",", $this->allBarLast );
        $bkg->booking_details['currency_code']              = $currency_code;

        $bkg->booking_details['referrer']                   = filter_var( $beds24_booking->refererEditable, FILTER_SANITIZE_SPECIAL_CHARS );
        logging::log_message("Referrer set to ".$bkg->booking_details['referrer'] , 'Beds24v2', 'DEBUG' , '' );
        
        $bkg->booking_details['tax']                        = (float)$beds24_booking->tax;
        if ( $beds24_booking->price == "0.00" ) // Air BNB don't sent the booking price, however the booking will not be inserted without one so we have HAVE to add at least one ( euro, dollar, pound, whatever ) to make sure the booking is inserted.
            {
            $bkg->booking_details['contract_total']         = 1;
            $bkg->booking_details['room_total_nodiscount']  = 1;
            }
        else
            {
            $bkg->booking_details['contract_total']         = (float)$beds24_booking->price;
            $bkg->booking_details['room_total_nodiscount']  = (float)$beds24_booking->price;
            }
        
        $bkg->booking_details['sendGuestEmail']             = false;
        $bkg->booking_details['sendHotelEmail']             = false;
        if (trim($beds24_booking->guestEmail ==""))
            {
            $bkg->booking_details['sendGuestEmail']         = false;
            $beds24_booking->guestEmail = generateJomresRandomString(20)."@example.com";
            }

        if ((float)$beds24_booking->deposit != 0)
            $bkg->booking_details['deposit_required']       = (float)$beds24_booking->deposit;
        else
            $bkg->booking_details['deposit_required']       = $bkg->booking_details['contract_total'];
        
        $jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
        $cfgcode = $mrConfig[ 'accommodation_tax_code' ];
        $accommodation_tax_rate = (float) $jrportal_taxrate->taxrates[ $cfgcode ][ 'rate' ];
        
        logging::log_message("Found Accommodation tax rate of ".$accommodation_tax_rate , 'Beds24v2', 'DEBUG' , '' );
        if ( $mrConfig[ 'prices_inclusive' ] == 1 )
            {
            logging::log_message("Price was ".$bkg->booking_details['deposit_required'] , 'Beds24v2', 'DEBUG' , '' );
            $divisor = ( $accommodation_tax_rate / 100 ) + 1;
            $price   = $bkg->booking_details['room_total_nodiscount'] / $divisor;
            $bkg->booking_details['room_total_nodiscount'] = $price;
            logging::log_message("Adjusted to ".$bkg->booking_details['deposit_required'] , 'Beds24v2', 'DEBUG' , '' );
            }
        else
            {
            logging::log_message( "Prices not stored inclusive. " , 'Beds24v2', 'DEBUG' , '' );
            }
        
        $bkg->booking_details['depositpaidsuccessfully'    ] = false;
        $bkg->booking_details['room_total']                  = $current_property_details->get_nett_accommodation_price((float)$bkg->booking_details['room_total_nodiscount'], $this->property_uid); //has to be without tax
        
        if ( !isset($beds24_booking->apiReference) || trim($beds24_booking->apiReference) =="" )
            $bkg->booking_details['booking_number']          = "BEDS24_".filter_var($beds24_booking->bookId, FILTER_SANITIZE_SPECIAL_CHARS ) ;
        else
            $bkg->booking_details['booking_number']          = filter_var($beds24_booking->apiReference, FILTER_SANITIZE_SPECIAL_CHARS ) ;
        
        $roomQty                                             = (int)$beds24_booking->roomQty;

        $bkg->booking_details['booked_in']                   = false;
        

        if (!isset($this->current_dates_and_bookings)) {
            jr_import("beds24v2_room_availability");
            $beds24v2_room_availability = new beds24v2_room_availability($this->property_uid);
            $this->current_dates_and_bookings = $beds24v2_room_availability->get_room_availability();
        }

        // the $this->current_dates_and_bookings array can be heyoooooje, so we need to loop through it and find just what dates we need
        // Seriously, it´s big. I might need to revisit this, depending on how testing goes with users
        $filtered_room_availability = array();
        if (!empty( $this->current_dates_and_bookings["dates"])) {
            foreach ( $this->current_dates_and_bookings["dates"] as $date=>$rooms_data ) {
                 if (in_array($date , $this->allBarLast) ) {
                    $filtered_room_availability[$date] = $rooms_data;
                    }
                }
            }
        
        $beds24v2_rooms = jomres_singleton_abstract::getInstance('beds24v2_rooms');
        $beds24v2_rooms->set_property_uid($this->property_uid);
        $beds24v2_rooms->get_room_type_xref_data();
        $jomres_room_type = $beds24v2_rooms->xref_data["cm_to_jomres"][$beds24_booking->roomId];

        // This will check that $filtered_room_availability has an entry for this room type for every date. If it doesn´t, then there isn´t a room and we'll report an error and return
        // It will also get all of the available room ids so that we can apply that room to the booking
        $available_rooms_of_type = array();
        foreach ( $filtered_room_availability as $rooms_array ) {
            if (!isset($rooms_array[$jomres_room_type]['rooms_available_this_date'])) {
                logging::log_message("Tried to import booking from Beds24 to Jomres, however cannot find an available ".$rooms_array[$jomres_room_type] ['roomtype']." for the Beds24 booking of roomId ".$beds24_booking->roomId." Booking number ".$beds24_booking->bookId. " It looks like all rooms of this type have already been booked." , 'Beds24v2', 'ERROR' , '' );
                return false;
            }
            $available_rooms_of_type[]=$rooms_array[$jomres_room_type]['rooms_available_this_date'];
        }

        // room_choices will contain the rooms available on these dates
        if ( count ($available_rooms_of_type) == 1 ) {
            $room_choices = $available_rooms_of_type[0];
        } else {
            $room_choices =  call_user_func_array('array_intersect', $available_rooms_of_type);
        }
		
		$room_choices = array_combine(range(1, count($room_choices)), array_values($room_choices)); // The purpose of this line is to shift the indexes of the $room_choices array up by one. This is because next for loop needs to start at 1, not zero ( to correctly set the number of rooms of type required ), therefore in this array we need the index to start at 1, not zero otherwise the first room in the list will never be used.

        if ( (int) $beds24_booking->roomQty > count($room_choices) ) {
            logging::log_message("Tried to import booking, but not enough rooms available" , 'Beds24v2', 'ERROR' , '' );
            return false;
        }

        for ( $i = 1 ; $i <= (int)$beds24_booking->roomQty; $i++) {
            
            $bkg->booking_details['requestedRoom']                 .= $room_choices[$i]."^0,"; //it needs to have the ^tariff_uid too 
        }
 
        if ($bkg->booking_details['requestedRoom'] =="")
            {
            throw new beds24_exception("Requested room variable is empty after apparent successful insertion, likely the Jomres Rooms and Beds24 Room types association is wrong. Check that room type names in the administrator area exactly match that stored on Beds24 and re-associate rooms in Beds24 Display Property.");
            }

        $bkg->booking_details['requestedRoom'] = substr( $bkg->booking_details['requestedRoom'], 0, strlen( $bkg->booking_details['requestedRoom'] ) - 1 );
        logging::log_message("requestedRoom = ".$bkg->booking_details['requestedRoom'] , 'Beds24v2', 'DEBUG' , '' );
        //Now let`s set the new guest details
        
        if ( $beds24_booking->guestFirstName == "")
            {
            $bang = explode(" ",$beds24_booking->guestName);
            if (count($bang)==2)
                {
                $beds24_booking->guestFirstName = $bang[0];
                $beds24_booking->guestName = $bang[1];
                }
            elseif (count($bang)==3)
                {
                $beds24_booking->guestFirstName = $bang[0]." ".$bang[1];
                $beds24_booking->guestName = $bang[2];
                }
            else
                $beds24_booking->guestFirstName = "unknown";
            }
    
        $bkg->guest_details['firstname']         = filter_var( $beds24_booking->guestFirstName, FILTER_SANITIZE_SPECIAL_CHARS );
        $bkg->guest_details['surname']           = filter_var( $beds24_booking->guestName, FILTER_SANITIZE_SPECIAL_CHARS );
        $bkg->guest_details['house']             = "";
        $bkg->guest_details['street']            = filter_var( $beds24_booking->guestAddress, FILTER_SANITIZE_SPECIAL_CHARS );
        $bkg->guest_details['town']              = filter_var( $beds24_booking->guestCity, FILTER_SANITIZE_SPECIAL_CHARS );
        $bkg->guest_details['region']            = "";
        $bkg->guest_details['country']           = filter_var( $beds24_booking->guestCountry, FILTER_SANITIZE_SPECIAL_CHARS );
        $bkg->guest_details['postcode']          = filter_var( $beds24_booking->guestPostcode, FILTER_SANITIZE_SPECIAL_CHARS );
        $bkg->guest_details['tel_landline']      = filter_var( $beds24_booking->guestPhone, FILTER_SANITIZE_SPECIAL_CHARS );;
        $bkg->guest_details['tel_mobile']        = filter_var( $beds24_booking->guestMobile, FILTER_SANITIZE_SPECIAL_CHARS );;
        $bkg->guest_details['email']             = filter_var( $beds24_booking->guestEmail, FILTER_SANITIZE_EMAIL );

        $MiniComponents =jomres_getSingleton('mcHandler');
        
        //Finally let`s insert the new booking
        logging::log_message("Inserting new booking " , 'Beds24v2', 'DEBUG' , json_encode($bkg) );
		try {
			$insert_result = $bkg->create_booking();
			if ($MiniComponents->miniComponentData["03020"]["insertbooking"]["insertSuccessful"] == true ) {
				$contract_uid = $MiniComponents->miniComponentData["03020"]["insertbooking"]["contract_uid"] ;
				$this->update_booking_number_xref($contract_uid , $beds24_booking->bookId , $beds24_booking->roomId );
			
			logging::log_message( "Insertion result = ".serialize($insert_result) , 'Beds24v2', 'DEBUG' , '' );
			logging::log_message("Inserted a new booking for property uid ".$bkg->booking_details['property_uid']." for the guest ".$bkg->guest_details['firstname']." ".$bkg->guest_details['surname'] , 'Beds24v2', 'DEBUG' , '' );
			return $insert_result;
			}
		} catch (Exception $e) {
			logging::log_message( "Failed to insert booking, most likely there are more rooms in the Channel manager than there are in Jomres. ".$e->getMessage() , 'Beds24v2', 'ERROR' , '' );
			return;
		}
    }
    

    
    
    public function update_booking_number_xref($contract_uid , $booking_number , $roomId )
    {
        $booking_number = filter_var( $booking_number, FILTER_SANITIZE_SPECIAL_CHARS );
        $query = "INSERT INTO #__jomres_beds24_contract_booking_number_xref ( `contract_uid` , `property_uid` , `booking_number` , `room_id` ) VALUES ( ".(int)$contract_uid." , ".$this->property_uid." , '".$booking_number."' , ".(int)$roomId.")";
        doInsertSql($query);
    }
    
    public function update_beds24_with_booking($data) 
    {
 
        if (!isset($data->property_uid)) {
            logging::log_message("beds24v2_bookings property_uid not set " , 'Beds24v2', 'DEBUG' , serialize($data) );
            return false;
            }
        if ($data->property_uid == 0 ) {
            logging::log_message("beds24v2_bookings property_uid zero " , 'Beds24v2', 'DEBUG' , serialize($data) );
            return false;
            }
        if (!isset($data->contract_uid)) {
            logging::log_message("beds24v2_bookings contract_uid not set " , 'Beds24v2', 'DEBUG' , serialize($data) );
            return false;
            }
        if ($data->contract_uid == 0 ) {
            logging::log_message("beds24v2_bookings contract_uid zero " , 'Beds24v2', 'DEBUG' , serialize($data) );
            return false;
            }
        
        logging::log_message("beds24v2_bookings Sending booking to Beds24 " , 'Beds24v2', 'DEBUG' , serialize($data) );
        
        $property_uid = $data->property_uid;
        $beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');

        if ( $beds24v2_properties->is_this_a_beds24_property($data->property_uid) )  {
            switch ( $data->task )
                {
                case 'booking_added':
                case 'blackbooking_added';
                case 'booking_modified';
                    $status = "1";
                    break;

                case 'blackbooking_deleted';
                case 'booking_cancelled';
                    $status = "0";
                    break;
                }
            
            if ( (int) $data->contract_uid == 0 )
                return;
            
            $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
            $manager_uid        = $beds24v2_keys->watcher_get_manager_uid_for_property_uid($data->property_uid);
            $manager_key        = $beds24v2_keys->get_manager_key($manager_uid);
            $property_apikey    = $beds24v2_keys->get_property_key($data->property_uid , $manager_uid );
            
            if ($manager_key =='' )
                return;
            
			jr_import("beds24v2_communication");
			$beds24v2_communication = new beds24v2_communication();
			$beds24v2_communication->set_manager_key($manager_key);
			$beds24v2_communication->set_property_key($property_apikey);
			
            $beds24v2_rooms = jomres_singleton_abstract::getInstance('beds24v2_rooms');
            $beds24v2_rooms->set_property_uid($data->property_uid);
            $beds24v2_rooms->prepare_data( $manager_key , $property_apikey );
			
            $is_amendment = false;
            
            $query = "SELECT booking_number , room_id FROM #__jomres_beds24_contract_booking_number_xref WHERE contract_uid=".(int)$data->contract_uid." ";
            $existing = doSelectSql($query);
            $bookIds = array();
            
			
            if (!empty($existing)) {
                    foreach ($existing as $no) {
                    $bookIds[$no->booking_number]= array( "bookId" => $no->booking_number , "roomId" => $no->room_id);
                    }
                $is_amendment = true;
                }

			// If this is an amendment, we have no choice but to cancel the original bookings associated with this contract uid, then remake them in B24
			if ($is_amendment) {
				foreach ($bookIds as $key=>$val ) {
					$booking = array();
					$booking['bookId']                = $key;
					$booking['status']                = "0";
					$booking['notify']                = "none"; // Important. If left out beds24 will call us back to advise that the booking has been cancelled and Jomres will set it accordingly.
					
					$result = $beds24v2_communication->communicate_with_beds24("setBooking" ,  $booking );
					$query = "DELETE FROM #__jomres_beds24_contract_booking_number_xref WHERE booking_number = ".(int)$key;
					doInsertSql($query);
				}
				
			}
			
			
            $current_contract_details = jomres_singleton_abstract::getInstance( 'basic_contract_details' );
            $current_contract_details->gather_data($data->contract_uid, $data->property_uid);

            $property_guest_types = array();
            $query    = "SELECT `id`,`type`,`is_child` FROM `#__jomres_customertypes` where property_uid = ".$data->property_uid." AND published = '1' ORDER BY `order`";
            $guesttypeList   = doSelectSql( $query );
            if (!empty($guesttypeList))
                {
                foreach ($guesttypeList as $guest_type)
                    {
                    $property_guest_types[$guest_type->id] = array ("type" => $guest_type->type , "is_child" => $guest_type->is_child);
                    }
                }
            
            $adults = 0;
            $kids = 0;
			if ( isset($current_contract_details->contract[$data->contract_uid]['guesttype'])) {
				foreach ($current_contract_details->contract[$data->contract_uid]['guesttype'] as $guest_type_id=>$guest_type) {
					if ( $property_guest_types [$guest_type_id] ['is_child'] =="1" )
						$kids = $kids + $guest_type['qty'];
					else
						$adults = $adults + $guest_type['qty'];
					}
			}

            
            $arrivalDate             = $current_contract_details->contract[$data->contract_uid]['contractdeets']['arrival'];
            $departureDate           = $current_contract_details->contract[$data->contract_uid]['contractdeets']['departure'];

            $requested_rooms = array();
			if (isset($current_contract_details->contract[$data->contract_uid]['roomdeets'])) {
				foreach ( $current_contract_details->contract[$data->contract_uid]['roomdeets'] as $room_uid=>$room) {
					$requested_rooms[]=$room_uid;
					}
			}

            // We need to look at the requested_rooms array ( the rooms that were booked ), 
            // Work out how many of each type were booked, then 
            // go through the $beds24v2_rooms->xref_data to assign a count for each room type.

            $requested_room_map = array();
            foreach ( $requested_rooms as $room_uid ) {
                $beds24_room_type = $beds24v2_rooms->xref_data['jomres_room_uids_to_beds24_room_types'][$room_uid];
                if (isset($requested_room_map[$beds24_room_type])) {
                    $requested_room_map[$beds24_room_type]++;
                    }
                else {
                     $requested_room_map[$beds24_room_type]=1;
                    }
                }

			// The booking has been cancelled, we'll inform the channel manager
			if ( $status == "0" ) {
				foreach ( $bookIds as $bookId ) {
					$booking = array();
					$booking['bookId']                = $bookId;
					$booking['status']                = "0";
					$booking['notify']                = "none"; // Important. If left out beds24 will call us back to advise that the booking has been cancelled and Jomres will set it accordingly.
					
					$result = $beds24v2_communication->communicate_with_beds24("setBooking" ,  $booking );
				}
			}
			else {
				$this->beds24_bookings = array();
				$mrConfig = getPropertySpecificSettings( $this->property_uid );
				foreach ($requested_room_map as $roomId=>$beds24_room_type_id_count)
					{
					if ($roomId != "" ) {  // Older bookings might not have a room id if the old room was removed. Without this check the returned error from Beds24 would be about not having access to the room id.
						$new_booking=array();
						
						$new_booking['roomQty']             = $beds24_room_type_id_count;
						$new_booking['firstNight']          = str_replace("/","-",$arrivalDate);
						$new_booking['lastNight']           = date("Y-m-d" ,strtotime( $departureDate ." -1 day" ) );
						$new_booking['roomId']              = $roomId;
						$new_booking['numAdult']            = $adults;
						$new_booking['numChild']            = $kids;

						$new_booking['status']              = $status;
						
						$new_booking['guestTitle']          = '';
						
						if (!isset($mrConfig['beds24_anonymise_guests'])) {
							$mrConfig['beds24_anonymise_guests'] = "1";
						}
						
						if ($mrConfig['beds24_anonymise_guests'] == "1") {
							$new_booking['guestFirstName']      = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);
							$new_booking['guestName']           = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);
							$new_booking['guestAddress']        = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);
							$new_booking['guestCity']           = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);
							$new_booking['guestPostcode']       = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);
							$new_booking['guestCountry']        = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);
							$new_booking['guestEmail']          = jr_gettext('_JOMRES_GDPR_REDACTION_STRING', '_JOMRES_GDPR_REDACTION_STRING', false);

						} else {
							$new_booking['guestFirstName']      = $current_contract_details->contract[$data->contract_uid]['guestdeets']['firstname'];
							$new_booking['guestName']           = $current_contract_details->contract[$data->contract_uid]['guestdeets']['surname'];
							$new_booking['guestAddress']        = $current_contract_details->contract[$data->contract_uid]['guestdeets']['house']." ".$current_contract_details->contract[$data->contract_uid]['guestdeets']['street'];
							$new_booking['guestCity']           = $current_contract_details->contract[$data->contract_uid]['guestdeets']['town']." ".$current_contract_details->contract[$data->contract_uid]['guestdeets']['county'];
							$new_booking['guestPostcode']       = $current_contract_details->contract[$data->contract_uid]['guestdeets']['postcode'];
							$new_booking['guestCountry']        = $current_contract_details->contract[$data->contract_uid]['guestdeets']['country'];
							$new_booking['guestEmail']          = $current_contract_details->contract[$data->contract_uid]['guestdeets']['email'];
						}

						
						
						$new_booking['price']               = $current_contract_details->contract[$data->contract_uid]['contractdeets']['contract_total'];
						$new_booking['deposit']             = $current_contract_details->contract[$data->contract_uid]['contractdeets']['deposit_required'];
						$new_booking['guestComments']       = $current_contract_details->contract[$data->contract_uid]['contractdeets']['special_reqs'];

						$new_booking['notify']              = "none"; // Prevents beds24 from calling Jomres back.
						$new_booking['refererEditable']     = "jomres";

						//logging::log_message("Sending new booking to Beds24 : ".serialize($new_booking), 'Beds24v2', 'DEBUG' , serialize($new_booking) );
						$result = $beds24v2_communication->communicate_with_beds24("setBooking" ,  $new_booking );
						//logging::log_message("Received response : ". serialize($result) , 'Beds24v2', 'DEBUG' , serialize($result) );

						$result = json_decode($result);
						
						if (!isset($result->success)) {
							throw new Exception("Tried to send a booking to Beds24 but this failed for some reason. Error returned from Beds24 :".$result->error);
							}
						else {
							$booking_number = filter_var( $result->bookId, FILTER_SANITIZE_SPECIAL_CHARS );
							$query = "INSERT INTO #__jomres_beds24_contract_booking_number_xref ( `contract_uid` , `property_uid` , `booking_number` , `room_id` ) VALUES ( ".(int)$data->contract_uid." , ".$data->property_uid." , '".$booking_number."' , ".(int)$roomId.")";
							doInsertSql($query);
							}
						$this->beds24_bookings[] = $result;
						}
					}
				}
            }
    }
}
