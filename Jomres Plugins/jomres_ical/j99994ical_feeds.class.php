<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

//This is a month view chart the occupancy - number of rooms booked by day in the selected month
class j99994ical_feeds
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();

		$webhook_messages = get_showtime('webhook_messages');
		if (is_array($webhook_messages)) {
			$webhook_messages = array_unique( $webhook_messages, SORT_REGULAR ); // Remove duplicate objects
		}
		if (!empty($webhook_messages)) {
			foreach ( $webhook_messages as $message ) {

				$property_uid = 0;

				if ( $message->webhook_event == 'ical_script_files_generate' ) {
					if ( $message->data->property_uid != 0 ) {
						$property_uid = $message->data->property_uid;
					}
				}

				if (
					$message->webhook_event == 'booking_added' ||
					$message->webhook_event == 'booking_cancelled' ||
					$message->webhook_event == 'blackbooking_added' ||
					$message->webhook_event == 'blackbooking_deleted' ||
					$message->webhook_event == 'room_added' ||
					$message->webhook_event == 'room_deleted' ||
					$message->webhook_event == 'rooms_multiple_deleted' ||
					$message->webhook_event == 'rooms_multiple_added'
				) {
					if ( $message->data->property_uid != 0 ) {
						$property_uid = $message->data->property_uid;
					}
				}

				if ( $property_uid > 0 ) {

					$files_location = JOMRES_ICAL_FILES_DIR.JRDS.$property_uid;

					if (!is_dir($files_location)) {
						mkdir($files_location);
						if (!is_dir($files_location)) {
							throw new Exception("Cannot make ".$files_location." directory, cannot continue.");
						}
					}

					emptyDir($files_location );

					$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
					$current_property_details->gather_data($property_uid);

					// We have to do a new query for the room uids, and not use the current property details class, because the rooms may have changed since the singleton was created, and the singleton is fundamentally a caching apparatus
					$query = 'SELECT `room_uid` FROM #__jomres_rooms WHERE `propertys_uid` = ' .(int) $property_uid.' ';
					$result = doSelectSql($query);

					$room_uids = array();
					if (!empty($result)) {
						foreach ($result as $rm ) {
							$room_uids[] = $rm->room_uid;
						}
					}

					$api_key = $current_property_details->apikey;

					if (!empty($room_uids)) {
						foreach ( $room_uids as $room_uid ) {
							$file_name = $this->generate_file_name( $room_uid  , $api_key );
							if (!$file_name === false && $file_name != '' ) {
								$file_contents = $this->build_ics_file( $property_uid , $room_uid );
								if ( $file_contents != '' ) {
									file_put_contents( $files_location . JRDS . $file_name ,  $file_contents );
								}
							}
						}
					}
				}

				// Cleanup if the property has been deleted
				if ( $message->webhook_event == 'property_deleted' ) {
					if ( $message->data->property_uid != 0 ) {
						$property_uid = $message->data->property_uid;
						$files_location = JOMRES_ICAL_FILES_DIR.JRDS.$property_uid;
						if ( is_dir($files_location) ) {
							emptyDir($files_location );
						}
					}
				}

			}
		}
	}


	private function generate_file_name( $room_uid = 0 , $property_api_key = '' )
	{
		if ( $room_uid == 0 || trim($property_api_key) == '' )
			return;

		// Property api key is our salt for the file name
		return $room_uid."_".sha1($room_uid.$property_api_key).'.ics';
	}


	private function build_ics_file( $property_uid = 0 , $room_uid = 0 )
	{

		if ($property_uid == 0 || $room_uid == 0)
			return;

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );

		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data($property_uid);

		$mrConfig = getPropertySpecificSettings($property_uid);

		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 || get_showtime('is_jintour_property'))
			return;

		// Including historic bookings
		$clause = " AND a.approved = 1 ";

		// To get just future bookings
		// $clause = " AND DATE_FORMAT(a.departure, '%Y/%m/%d') >= DATE_FORMAT(NOW(), '%Y/%m/%d') AND a.approved = 1 ";

        $query = SET_GLOBAL_STRING.
            "SELECT 
						a.contract_uid, 
						a.arrival, 
						a.departure, 
						a.contract_total, 
						a.tag,
						a.currency_code,
						a.booked_in, 
						a.bookedout, 
						a.deposit_required, 
						a.deposit_paid, 
						a.special_reqs, 
						a.timestamp, 
						a.cancelled, 
						a.invoice_uid,
						a.property_uid,
						a.approved,
						a.last_changed,
						b.enc_firstname, 
						b.enc_surname, 
						b.enc_tel_landline, 
						b.enc_tel_mobile, 
						b.enc_email,
						c.room_uid,
						c.black_booking 
					FROM #__jomres_contracts a 
						LEFT JOIN #__jomres_guests b ON a.guest_uid = b.guests_uid 
						CROSS JOIN #__jomres_room_bookings c ON a.contract_uid = c.contract_uid 
					WHERE a.property_uid = ".(int)$property_uid."  
						AND a.cancelled = 0  
						AND c.room_uid = " . $room_uid
			. $clause .
			" GROUP BY a.contract_uid , c.black_booking ";
		$jomresContractsList = doSelectSql( $query );

		$event_params = array();

		foreach ($jomresContractsList as $c) {
			if ($c->black_booking == 1) {
					$summary = "Black Booking";
					$description = str_replace(array("\r", "\n", ':'), '', strip_tags($c->special_reqs));
					$url = jomresURL(JOMRES_SITEPAGE_URL_NOSEF.'&task=show_black_booking' . '&contract_uid=' . $c->contract_uid . '&thisProperty=' . $c->property_uid);
				}
			else {
				$summary = $this->jomres_encryption->decrypt($c->enc_firstname).' '.$this->jomres_encryption->decrypt($c->enc_surname);
				$description = $c->tag;
				$url = jomresURL(JOMRES_SITEPAGE_URL_NOSEF.'&task=edit_booking' . '&contract_uid=' . $c->contract_uid . '&thisProperty=' . $c->property_uid);
			}

			$event_params[] = array(
				'uid' => $c->contract_uid,
				'summary' => $summary,
				'description' => $description,
				'start' => new DateTime($c->arrival),
				'end' => new DateTime($c->departure),
				'created' => new DateTime($c->timestamp),
				'modified' => new DateTime($c->last_changed),
				'location' => $current_property_details->property_name,
				'url' => $url
			);
		}

		jr_import( 'jomres_ical' );
		$ical = new jomres_ical();
		$ical->events = $event_params;
		$ical->title  = 'Jomres Calendar';
		$ical->author = 'Jomres.net';
		return $ical->generateString();
	}


	function getRetVals()
		{
		return null;
		}
	}
