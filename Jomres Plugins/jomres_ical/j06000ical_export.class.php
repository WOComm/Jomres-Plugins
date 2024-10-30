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
class j06000ical_export
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
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		$property_uid = jomresGetParam($_REQUEST, 'property_uid', 0);
		$room_uid = jomresGetParam($_REQUEST, 'room_uid', 0);
		$apikey = jomresGetParam($_REQUEST, 'apikey', '');
		
		if ($property_uid == 0 || $room_uid == 0)
			return;
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data($property_uid);
		
		$mrConfig = getPropertySpecificSettings($property_uid);

		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 || get_showtime('is_jintour_property')) 
			return;
		
		if ($apikey != $current_property_details->apikey)
			{
			if (!isset($mrConfig[ 'iCalAnonymousFeed' ]) || (int)$mrConfig[ 'iCalAnonymousFeed' ] != 1)
				return;
			}
		
		$clause = '';

		$clause = " AND DATE_FORMAT(a.departure, '%Y/%m/%d') >= DATE_FORMAT(NOW(), '%Y/%m/%d') ";
		
		if ((int)$mrConfig[ 'iCalIncludeEnquiries' ] != 1)
			{
			$clause .= " AND a.approved = 1 ";
			}
		
		$query = "SELECT 
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
						" GROUP BY a.contract_uid ";
		$jomresContractsList = doSelectSql( $query );
		
		$event_params = array();
		
		foreach ($jomresContractsList as $c)
			{
			if ( 
				($apikey == $current_property_details->apikey) ||
				($thisJRUser->userIsManager && in_array($property_uid, $thisJRUser->authorisedProperties))
				)
				{
				if ($c->black_booking == 1)
					{
					$summary = "Black Booking";
					$description = str_replace(array("\r", "\n", ':'), '', strip_tags($c->special_reqs));
					$url = jomresURL(JOMRES_SITEPAGE_URL_NOSEF.'&task=show_black_booking' . '&contract_uid=' . $c->contract_uid . '&thisProperty=' . $c->property_uid);
					}
				else
					{
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
			elseif ((int)$mrConfig[ 'iCalAnonymousFeed' ] == 1)
				{
				$event_params[] = array(
									   'uid' => $c->contract_uid,
									   'summary' => jr_gettext( '_JOMRES_ICAL_WITHHELD', '_JOMRES_ICAL_WITHHELD', false ),
									   'description' => jr_gettext( '_JOMRES_ICAL_WITHHELD', '_JOMRES_ICAL_WITHHELD', false ),
									   'start' => new DateTime($c->arrival),
									   'end' => new DateTime($c->departure),
									   'created' => new DateTime($c->timestamp),
									   'modified' => new DateTime($c->last_changed),
									   'location' => $current_property_details->property_name,
									   'url' => get_showtime('live_site')
									   );
				}
			else
				return;
			}
		
		jr_import( 'jomres_ical' );
		$ical = new jomres_ical();
		$ical->events = $event_params;
		$ical->title  = 'Jomres Calendar';
		$ical->author = 'Jomres.net';
		$ical->generateDownload();
		}

	function getRetVals()
		{
		return null;
		}
	}
