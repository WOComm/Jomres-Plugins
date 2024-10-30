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
#[AllowDynamicProperties]
class j06000beds24v2_notify
	{
	function __construct()
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
	
		$bookId			= jomresGetParam( $_REQUEST, 'bookid', '' );
		$property_uid	= jomresGetParam( $_REQUEST, 'property_uid', 0 );
		$status 		= jomresGetParam( $_REQUEST, 'status', 'new' );

        // booking.com particularly causes Beds24 to send two calls simultaneously. This causes problems because available room counts are wrong and one room ends up with the insertion failing, saying that the room has been double booked. I'm going to try this simple locking mechanism to see if we can work around that.
		$lockfile = JOMRES_TEMP_ABSPATH.JRDS."beds24_lock.txt";
		$lock_file_life_limit = '20'; // in seconds
		$timeout_secs = 10; //number of seconds of timeout
		
		if (is_file($lockfile)) {
			if ( filemtime($lockfile) >= $lock_file_life_limit ) { // If the lock file is older than N ($lock_file_life_limit) seconds, delete it. The previous call to the notification process failed and for some reason the lock file wasn't removed
				unlink($lockfile);
			}
		}

        $lockfile_handle = fopen($lockfile, "c+");
		try {
            $count = 0;
            $got_lock = true;
            while (!flock($lockfile_handle, LOCK_EX | LOCK_NB, $wouldblock)) {
				logging::log_message("Couldn't get lock of beds24_lock.txt so must be handling another request " , 'Beds24v2', 'NOTICE' , '' );
                if ($wouldblock && $count++ < $timeout_secs) {
                    sleep(1);
                } else {
                    $got_lock = false;
					logging::log_message("Got lock of beds24_lock.txt so proceeding as normal." , 'Beds24v2', 'NOTICE' , '' );
                    break;
                }
            }
            if ($got_lock) {
                $this->property_uid = (int)$property_uid;
        
                $beds24v2_keys = jomres_singleton_abstract::getInstance('beds24v2_keys');
                $manager_uid              = $beds24v2_keys->watcher_get_manager_uid_for_property_uid($this->property_uid);
                if (!$manager_uid === false ) {
                    switch ( $status )
                        {
                        case 'new':
                            $beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
                            $beds24v2_bookings->set_property_uid($this->property_uid);
                            $booking = $beds24v2_bookings->get_single_booking($bookId);
                            $beds24v2_bookings->import_beds24_bookings_into_jomres($booking);
                        
                            break;
                            
                         case 'modify':
                            $beds24v2_bookings = jomres_singleton_abstract::getInstance('beds24v2_bookings');
                            $beds24v2_bookings->set_property_uid($this->property_uid);
                            $beds24v2_bookings->modify_booking($bookId , $this->property_uid );
                            break;
                        case 'cancel':
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
                            $query = "SELECT contract_uid FROM #__jomres_beds24_contract_booking_number_xref WHERE `booking_number` = ".$bookId;
                            $rows = doSelectSql($query);
                            if (!empty($rows))
                                {
                                jr_import( 'jomres_generic_booking_cancel' );
                                foreach ($rows as $row)
                                    {
                                    logging::log_message("Attempting to cancel contract uid  : ".$row->contract_uid , 'Beds24v2', 'DEBUG' , '' );
                                    $bkg = new jomres_generic_booking_cancel();
                                    $bkg->property_uid 		= $this->property_uid;
                                    $bkg->contract_uid 		= $row->contract_uid;
                                    $bkg->reason	 		= 'Beds 24 modification';
                                    $bkg->note				= '';
                                    $delete_booking_id = true;
                                    $bkg->cancel_booking($delete_booking_id);

                                    $query = "DELETE FROM #__jomres_beds24_contract_booking_number_xref WHERE contract_uid=".(string)$row->contract_uid;
                                    $result = doInsertSql($query);
                                    }
                                }
                            break;
                        }
                    }
                   
                else {
                    logging::log_message( "Beds24 tried to add a booking for a property that is not currently associated with a manager." , 'Beds24v2', 'ERROR' , '' );
                }
            } else {
				logging::log_message( "Unable to get lock file. Has the previous message stalled?" , 'Beds24v2', 'ERROR' , '' );
			}

        flock($lockfile_handle, LOCK_UN);
        fclose($lockfile_handle);
		}
	catch (Exception $e) {
        flock($lockfile_handle, LOCK_UN);
        fclose($lockfile_handle);
        logging::log_message( $e->getMessage() , 'Beds24v2', 'ERROR' , '' );
        throw new Exception($e->getMessage());
		}
	}
	
/* 	function insert_booking($bookId, $property_uid , $beds24 , $booking_number = '')
		{
		beds24_transaction_log::set_transaction_message( $beds24->transaction_id  ,"Sending request for information about bookId : ".$bookId , $beds24->property_uid );
		$result = $beds24->get_booking($bookId);
		
		//beds24_transaction_log::set_transaction_message( $beds24->transaction_id  ,"Returned by beds24  : ".serialize($result) , $beds24->property_uid );
		
		if ( !isset($result->error) )
			{
			$beds24_booking = $result[0];
			beds24_transaction_log::set_transaction_message( $beds24->transaction_id  ,"Booking information after getting notification from beds24  : ".serialize($beds24_booking) , $beds24->property_uid );
			$result = $beds24->insert_booking($beds24_booking , $property_uid , $booking_number );
			
			if ($result)
				{
				beds24_transaction_log::set_transaction_message( $beds24->transaction_id  ,"Booking inserted successfully " , $beds24->property_uid );
				echo $beds24->get_success_obj( true );
				}
			else
				{
				beds24_transaction_log::set_transaction_message( $beds24->transaction_id  ,"Booking insertion failed " , $beds24->property_uid );
				echo $beds24->get_success_obj( false );
				}
			}
		else
			throw new beds24_exception($result->error);
		
		$MiniComponents		= jomres_singleton_abstract::getInstance( 'mcHandler' );
		$contract_uid		= $MiniComponents->miniComponentData['03020']['insertbooking']['contract_uid'];
		
		$beds24->update_booking_number_xref( $contract_uid,  $bookId );
		
		if ( trim($beds24_booking->guestComments) != '')
			addBookingNote( $contract_uid, $beds24->property_uid, filter_var( $beds24_booking->guestComments, FILTER_SANITIZE_SPECIAL_CHARS ) );
		
		$guest_numbers_note = 
			jr_gettext( "_BEDS24_ADULTS", '_BEDS24_ADULTS', false ). " :" . (int)$beds24_booking->numAdult."<br/>".
			jr_gettext( "_BEDS24_CHILDREN", '_BEDS24_CHILDREN', false ). " :" . (int)$beds24_booking->numChild."<br/>";

		addBookingNote( $contract_uid, $beds24->property_uid, $guest_numbers_note );
		
		
		return $contract_uid;
		} */
		

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
