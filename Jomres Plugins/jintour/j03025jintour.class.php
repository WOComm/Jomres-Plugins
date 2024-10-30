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

class j03025jintour {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
		
		if (isset($componentArgs['contract_uid']))
			{
			$contract_uid=$componentArgs['contract_uid'];
			
			if ($jrConfig['session_handler'] == 'database') {
				$third_party_extras				= $tmpBookingHandler->getBookingFieldVal("third_party_extras");
				$third_party_extras_private_data = $tmpBookingHandler->tmpbooking['third_party_extras_private_data'];
			} else {
				$third_party_extras				= unserialize($tmpBookingHandler->getBookingFieldVal("third_party_extras"));
				$third_party_extras_private_data = unserialize($tmpBookingHandler->tmpbooking['third_party_extras_private_data']);
			}
			
			if (isset($third_party_extras_private_data['jintour'])) {
				$jintour_data = $third_party_extras_private_data['jintour'];
				
				if (is_array($third_party_extras) && !empty($third_party_extras)) {
					foreach ($third_party_extras as $plugin_name=>$plugin)
						{
						if ($plugin_name == "jintour")
							{
							foreach ($plugin as $tpe)
								{
								$id = (int)$tpe['id'];
								$booked = $jintour_data['chosen_options'][$id];
								$property_uid = $jintour_data['chosen_options'][$id]['property_uid'];
								
								if (isset($booked['adults']))
									$number_of_adults = (int)$booked['adults'];
								else
									$number_of_adults = 0;
								
								if (isset($booked['kids']))
									$number_of_kids = (int)$booked['kids'];
								else
									$number_of_kids = 0;
								
								$query = "INSERT INTO #__jomres_jintour_tour_bookings 
								(`description`,`tour_id`,`spaces_adults`,`spaces_kids`,`contract_id`,`property_id`) VALUES 
								('".$tpe['description']."',".$id.",".$number_of_adults.",".$number_of_kids.",".(int)$contract_uid.",".(int)$property_uid.")";
								if (!doInsertSql($query,"") )
									{
									trigger_error ("Failed to insert tour into tour bookings table ", E_USER_ERROR);
									}
								
								$query="SELECT spaces_available_adults,spaces_available_kids FROM #__jomres_jintour_tours WHERE property_uid =".(int)$property_uid." AND id=".$id." LIMIT 1";
								
								$spaces_available = doSelectSql($query,2);
								$total_spaces_booked = $number_of_adults + $number_of_kids;
								$spaces_available_adults = $spaces_available['spaces_available_adults'] - $number_of_adults;
								$spaces_available_kids = $spaces_available['spaces_available_kids'] - $number_of_kids;
								
								$query="UPDATE #__jomres_jintour_tours SET spaces_available_adults=".$spaces_available_adults.",spaces_available_kids=".$spaces_available_kids." WHERE property_uid =".(int)$property_uid." AND id=".(int)$tpe['id']."";
								if (!doInsertSql($query,"") )
									{
									trigger_error ("Failed to update spaces available ".$query, E_USER_ERROR);
									}
								if ($property_uid == 0)  // It's a booking for an admin created tour, let's email admin and tell them
									{
									$subject = jr_gettext('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT','_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',FALSE)."";
									$message = jr_gettext('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE','_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',FALSE).'<a href= "'.JOMRES_SITEPAGE_URL_ADMIN.'&task=jintour_view_tour_bookings&id='.(int)$tpe['id'].'"> Booking information</a>';
									sendAdminEmail($subject,$message);
									}
								addBookingNote((int)$contract_uid,(int)$componentArgs['property_uid'],$tpe['description']);
								}
							}
						}
					}
			}
		}
	}


	function getRetVals()
		{
		return null;
		}
	}
