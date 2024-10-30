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

jr_import('dobooking');

class j05000bookingobject {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$bkg=new booking();
		$this->bookingObject=$bkg;
		$bk=$this->bookingObject;
		if (strlen($bk->error_code)>0)
			$this->bookingObject=null;
		else
			unset($bk);
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->bookingObject;
		}
	}

/**
#
 * Inherits from jomres_booking.  Is the class tht's called by handlereq.php via j05000bookingobject
 #
  * This is the main controller for the booking engine. Use this object to override the jomres_booking class methods to customise how the bookings process is managed
 #
* @package Jomres
#
 */
if (!class_exists('booking')){
    class booking extends dobooking
        {
        function getTariffsForRoomUids( $freeRoomsArray )
            {
            $mrConfig = $this->mrConfig;
            $this->build_tariff_to_date_map();
            $roomAndTariffArray          = array ();
            $already_found_tariffs       = array ();
            $this->tariff_types_min_days = array ();
            $dateRangeArray              = explode( ",", $this->dateRangeString );
            $dateRangeArray_count        = count( $dateRangeArray );
            $filtered_out_type_type_ids  = array ();
            $this->setErrorLog( "getTariffsForRoomUids:: tariff map " . serialize( $this->micromanage_tarifftype_to_date_map ) );
            $this->setErrorLog( "--------------------------------------------" );
            
            jr_import('jomres_occupancies');
            $occupancies = new jomres_occupancies();
            $occupancies->property_uid = $this->property_uid;
            $occupancies->get_all_by_property_uid();
            
            $guest_type_variants=$this->getVariantsOfType('guesttype');
            $guest_types_selected = array();
            
            foreach ($guest_type_variants as $g)
                {
                $guest_types_selected[$g['id']] = $g['qty']; 
                }
            
            if ( !empty( $freeRoomsArray ) && is_array( $freeRoomsArray ) )
                {
                $unixArrivalDate   = $this->getMkTime( $this->arrivalDate );
                $unixDepartureDate = $this->getMkTime( $this->departureDate );

                foreach ( $freeRoomsArray as $room_uid )
                    {
                    $rateDeets = $this->getTariffsForRoomUidByClass( $room_uid );
                    foreach ( $rateDeets as $tariff )
                        {
                        $datesValid                = $this->filter_tariffs_on_dates( $tariff, $unixArrivalDate, $unixDepartureDate ); // Does the tariff's from/to dates fall within the booking's dates? There will be some overlap here if we use Advanced or Micromanage mode. That's where the tariff_to_date_map will come into play
                        $stayDaysValid             = $this->filter_tariffs_staydays( $tariff ); // This will also use the map, it'll help to calculate also the minimum interval
                        $roomsAlreadySelectedTests = $this->filter_tariffs_alreadyselectedcheck( $tariff ); // If the tariff can only be selected when N number of rooms have already been selected?
                        $numberPeopleValid         = $this->filter_tariffs_peoplenumbercheck( $tariff ); // If the total number of people in the booking fall within the tariff's min/max people range?
                        $dowCheck                  = $this->filter_tariffs_dowcheck( $tariff ); // Does the tariff allow selections on the arrival date's day of week?

                        $passedOccupancyCheck = true;
                        $room_type = $this->allPropertyRooms[$room_uid]['room_classes_uid'];
                        
                        if (array_key_exists($room_type,$occupancies->all_occupancies))
                            {
                            $map=$occupancies->all_occupancies[$room_type]['guest_type_map'];
                            foreach ($map as $key=>$val)
                                {
								if (isset($guest_types_selected[$key])) {
									$number = $guest_types_selected[$key];
									if ((int)$number < (int)$val)
										$passedOccupancyCheck = false;
									}
								}
                            }
                        
                        $rates_uid = $tariff->rates_uid;
                        $this->setErrorLog( "getTariffsForRoomUids:: Checking tariff id " . $rates_uid . " " );
                        if ( $datesValid && $stayDaysValid && $numberPeopleValid && $dowCheck && $roomsAlreadySelectedTests && $passedOccupancyCheck)
                            {
                            $tariff_type_id = 0;
							if (isset($this->all_tariff_id_to_tariff_type_xref[ $rates_uid ][ 0 ])) {
								$tariff_type_id = $this->all_tariff_id_to_tariff_type_xref[ $rates_uid ][ 0 ];
							}
                            if ( !isset( $already_found_tariffs[ $tariff_type_id . " " . $room_uid ] ) && !in_array( $tariff_type_id, $filtered_out_type_type_ids ) )
                                {
                                $pass_price_check = true;
                                if ( $mrConfig[ 'tariffmode' ] == "2" ) // If tariffmode = 2, we need to finally scan $this->micromanage_tarifftype_to_date_map, to ensure that all dates have a price set
                                    {
                                    if ( empty( $this->micromanage_tarifftype_to_date_map ) ) $pass_price_check = false;
                                    else
                                        {
                                        //$this->setPopupMessage( str_replace(";", " " ,serialize( $this->micromanage_tarifftype_to_date_map[$tariff_type_id] ) ) );
                                        $map_count = count( $this->micromanage_tarifftype_to_date_map[ $tariff_type_id ] );
                                        foreach ( $this->micromanage_tarifftype_to_date_map[ $tariff_type_id ] as $dates )
                                            {
                                            $this->setErrorLog( "getTariffsForRoomUids:: Count dates " . $map_count . " Count daterange array " . $dateRangeArray_count . " " );
                                            if ( $map_count != $dateRangeArray_count ) // There are more dates in the date range array than there are valid tariffs. This means that during the map building phase we passed the date of the last tariff found
                                                {
                                                $this->setErrorLog( "getTariffsForRoomUids:: tariff map count != dates count " );
                                                $pass_price_check = false;
                                                }
                                            else
                                                {
                                                if ( (float) $dates[ 'price' ] == 0 && $dates[ 'tariff_type_id' ] == $tariff_type_id )
                                                    {
                                                    $pass_price_check = false;
                                                    $this->setErrorLog( "getTariffsForRoomUids:: Removing a tariff as at least one other tariff in the series is set to 0. Tariff type id = " . $tariff_type_id );
                                                    $filtered_out_type_type_ids[ ] = $tariff_type_id;
                                                    }
                                                }
                                            }
                                        }
                                    }

                                if ( $pass_price_check )
                                    {
                                    if ( $mrConfig[ 'tariffmode' ] == "2" ) $already_found_tariffs[ $tariff_type_id . " " . $room_uid ] = 1; // Without this there will be duplicates returned to the rooms list in the booking form
                                    $roomAndTariffArray[ ] = array ( $room_uid, $rates_uid );
                                    }

                                }
                            }
                        elseif ( $datesValid && !$stayDaysValid && $numberPeopleValid && $dowCheck && $roomsAlreadySelectedTests && $mrConfig[ 'tariffmode' ] == "1" ) // Everything passed except the number of days in the booking
                            {
                            $mindays = $this->simple_tariff_to_date_map[ $rates_uid ][ 'mindays' ];
                            if ( $mindays < $this->mininterval )
                                {
                                $this->mininterval = $mindays;
                                }
                            }
                        }
                    }
                }
            else
            $this->setErrorLog( "getTariffsForRoomUids::count(freeRoomsArray) = 0" );
            $this->setErrorLog( "--------------------------------------------" );


            if ( empty( $roomAndTariffArray ) && $mrConfig[ 'tariffmode' ] == "2" )
                {
                if ( !empty( $this->tariff_types_min_days ) )
                    {
                    $this->mininterval = 1000; // We MUST reset the minimum interval here, as it's going to be recalculated.
                    foreach ( $this->tariff_types_min_days as $mindays )
                        {
                        if ( $mindays < $this->mininterval ) $this->mininterval = $mindays;
                        }
                    }
                }

            return $roomAndTariffArray;
            }


            function generateDateInput( $fieldName, $dateValue, $myID = false )
                {
                $tmpBookingHandler = jomres_getSingleton( 'jomres_temp_booking_handler' );
                // We need to give the javascript date function a random name because it will be called by both the component and modules
                $uniqueID = "";
                // If this date picker is "arrivalDate" then we need to create a departure date input name too, then set it in showtime. With that we'll be able to tell this set of functionality what the id of the
                // departureDate is so that it can set it's date when this one changes
                if ( $fieldName != "departureDate" )
                    {
                    list( $usec, $sec ) = explode( " ", microtime() );
                    mt_srand( $sec * $usec );
                    $possible = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefhijklmnopqrstuvwxyz';
                    for ( $i = 0; $i < 10; $i++ )
                        {
                        $key = mt_rand( 0, strlen( $possible ) - 1 );
                        $uniqueID .= $possible[ $key ];
                        }
                    set_showtime( 'departure_date_unique_id', $uniqueID . "_XXX" );
                    }
                else
                    {
                    $uniqueID = get_showtime( 'departure_date_unique_id' );
                    }

                if ( $dateValue == "" ) 
                    $dateValue = date( "Y/m/d" );
                $dateValue = JSCalmakeInputDates( $dateValue );

                $dateFormat = $this->cfg_cal_input;
                $dateFormat = strtolower( str_replace( "%", "", $dateFormat ) ); // For the new jquery calendar, we'll strip out the % symbols. This should mean that we don't need to force upgraders to reset their settings.
                $dateFormat = str_replace( "y", "yy", $dateFormat );
                $dateFormat = str_replace( "m", "mm", $dateFormat );
                $dateFormat = str_replace( "d", "dd", $dateFormat );

                if ( !defined( '_JOMRES_CALENDAR_RTL' ) ) define( '_JOMRES_CALENDAR_RTL', 'false' );

                $alt_field_string        = "";
                $depature_date_doc_ready = "";
                if ( $fieldName == "arrivalDate" )
                    {
                    $alt_field_string = '
                        altField: "#' . get_showtime( 'departure_date_unique_id' ) . '",

                        ';
                    }

                $onchange = "";
                $onclose = "";
                if ( $fieldName == "arrivalDate" )
                    {
                    if ( $this->cfg_fixedPeriodBookings == "1" ) 
                        $onchange .= ' getResponse_particulars(\'arrivalDate\',this.value); ';
                    else
                        {
                        $onchange .= ' ajaxADate(this.value,\'' . $this->cfg_cal_input . '\'); getResponse_particulars(\'arrivalDate\',this.value,\'' . $uniqueID . '\'); ';
                        $onchange .= 'jomresJquery("#' . get_showtime( 'departure_date_unique_id' ) . '").datepicker(\'option\', {minDate: jomresJquery(this).datepicker(\'getDate\')})';
                        $onclose .= ' jomresJquery("#' . get_showtime( 'departure_date_unique_id' ) . '").datepicker(\'show\'); ';
                        }
                    }
                else
                    $onchange .= ' getResponse_particulars(\'departureDate\',this.value); ';

                $size        = " size=\"10\" ";
                $input_class = "";
                if ( using_bootstrap() )
                    {
                    $size        = "";
                    $input_class = " input-small ";
                    }

                $amend_contract = $tmpBookingHandler->getBookingFieldVal( "amend_contract" );
                $output = '<script type="text/javascript">
                jomresJquery(function() {
                    jomresJquery("#' . $uniqueID . '").datepicker( {
                        dateFormat: "' . $dateFormat . '",';
                if ( !$amend_contract ) 
                    $output .= 'minDate: 0, ';

                $output .= 'maxDate: "+5Y",';

                if ( (using_bootstrap() && jomres_bootstrap_version() == "2") || !using_bootstrap() )
                    {
                    $output .= 'buttonImage: \'' . JOMRES_IMAGES_RELPATH.'calendar.png\',';
                    $bs3_icon = '';
                    }
                else
                    {
                    $output .= 'buttonText: "",';
                    $bs3_icon = '<span class="input-group-addon" id="dp_trigger_'.$uniqueID.'"><span class="fa fa-calendar"></span></span>';
                    
                    }
                $output .= '
                        autoSize:true,
                        buttonImageOnly: true,
                        showOn: "both",
                        changeMonth: true,
                        changeYear: true,';
                if ( $fieldName == "arrivalDate" && !using_bootstrap() ) 
                    $output .= 'numberOfMonths: 3,';
                else
                    $output .= 'numberOfMonths: 1,';
                    
                $output .= 'showOtherMonths: true,
                        selectOtherMonths: true,
                        showButtonPanel: true,';
                if ( $this->jrConfig[ 'calendarstartofweekday' ] == "1" ) 
                    $output .= 'firstDay: 0,';
                else
                $output .= 'firstDay: 1,';
                $output .= 'onSelect: function() {
                                ' . $onchange . '
                            }';
                
                if ( $fieldName == "arrivalDate" ) 
                    {
                    $output .= ',beforeShowDay: isAvailable';
                    
                    if ($onclose != '')
                        $output .= ', onClose: function() { ' . $onclose . ' }';
                    }

                $output .= '} );

                });';
        
                if (using_bootstrap() && jomres_bootstrap_version() == "3")
                    $output .= '
                    jomresJquery(function() {jomresJquery("#dp_trigger_'.$uniqueID.'").on("click", function() {jomresJquery("#' . $uniqueID . '").datepicker("show");})});
                    ';
                
                $output .= '
                </script>
                <input type="text"  readonly="readonly" ' . $size . ' class="' . $input_class . ' form-control input-group" name="' . $fieldName . '" id="' . $uniqueID . '" value="' . $dateValue . '" autocomplete="off" />'.$bs3_icon.'
                ';

                return $output;
                }
        }
}