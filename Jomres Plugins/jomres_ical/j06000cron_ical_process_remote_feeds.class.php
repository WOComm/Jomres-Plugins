<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.13.0
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j06000cron_ical_process_remote_feeds
{
	public function __construct()
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$this->siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $this->siteConfig->get();
		$user_agent = "Jomres ".$jrConfig['version'];
		
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$query = "SELECT `id` , `url` , `room_uid` , `property_uid` FROM `#__jomres_ical_remote_feeds` ";
		$existing_feeds = doSelectSql($query);
		
		$temp_ics_file = JOMRES_TEMP_ABSPATH.'temp_ics.ics';
		jr_import('jomres_generic_black_booking_insert');
		
		if (!empty($existing_feeds)) {
			foreach ( $existing_feeds as $feed ) {
				if (file_exists($temp_ics_file)) {
					unlink($temp_ics_file);
					}

				$feed->url = str_replace("&#61;" , "=" , $feed->url);
				$feed->url = str_replace("&#38;" , "&" , $feed->url);
				$feed->url = str_replace("#38;" , "" , $feed->url);

				$feed_url = parse_url($feed->url);

				$feed_query = '';
				if (isset($feed_url['query'])) {
					$feed_query = $feed_url['query'];
				}
				$uri_query = $feed_url['scheme'].'://'.$feed_url['host'].''.$feed_url['path'].'?'.$feed_query;
				
				/* $feed->url = str_replace("&#61;" , "=" , $feed->url);
				$feed_url = parse_url($feed->url);
				$uri_query = $feed_url['scheme'].'://'.$feed_url['host'].'/'.$feed_url['path'].'?'.$feed_url['query']; */

				logging::log_message("Feed url ".$uri_query, 'ics_importer', 'DEBUG');
				try {
					
/* 					if ($feed_url === false ) {
						throw new Exception('Feed url could not be parsed');
					} */

					
					$resource = fopen($temp_ics_file, 'w');
					
					$client = new GuzzleHttp\Client();
					$client->request('GET', $uri_query, ['sink' => $resource , 'debug' => false , 'verify' => false ,  'User-Agent' => $user_agent, ]);
				}
				catch (Exception $e) {
					logging::log_message("Error trying to read from feed . Message : ".$e->getMessage()." URL : ".$feed->url, 'ICS_Importer', 'WARNING');
				}
				
				if (file_exists($temp_ics_file)) {
					try {
						//get ical events from ical file
						$ical   = new ICal\ICal($temp_ics_file);
						$events = $ical->events();

						if (empty($events)) {
							logging::log_message(jr_gettext('_JOMRES_ICAL_ERROR_NO_EVENTS','_JOMRES_ICAL_ERROR_NO_EVENTS',false).' '.$uri_query, 'ICS_Importer', 'WARNING');
							throw new Exception(jr_gettext('_JOMRES_ICAL_ERROR_NO_EVENTS','_JOMRES_ICAL_ERROR_NO_EVENTS',false));
							}
						
						foreach ($events as $event) {
							try {
								$event_summary = '';
								$event_description = '';
								$event_location = '';
								$event_url = '';

								$arrival = date("Y/m/d", $ical->iCalDateToUnixTimestamp($event->dtstart));
								$departure = date("Y/m/d", $ical->iCalDateToUnixTimestamp($event->dtend));
								
								if (isset($event->summary)) {
									$event_summary = filter_var( $event->summary, FILTER_SANITIZE_SPECIAL_CHARS );
								}
								
								if (isset($event->description)) {
									$event_description = filter_var( $event->description, FILTER_SANITIZE_SPECIAL_CHARS );
								}
								
								if (isset($event->location)) {
									$event_location = filter_var( $event->location, FILTER_SANITIZE_SPECIAL_CHARS );
								}
								
								if (isset($event->url)) {
									$event_url = filter_var( $event->url, FILTER_SANITIZE_SPECIAL_CHARS );
								}

								if (isset($event->uid)) {
									$event_uid = filter_var( $event->uid, FILTER_SANITIZE_SPECIAL_CHARS );
								}
								
								$bkg = new jomres_generic_black_booking_insert();
								$bkg->property_uid = $feed->property_uid;
								$bkg->arrival = $arrival;
								$bkg->departure = $departure;
								$bkg->room_uids = array($feed->room_uid);
								$bkg->special_reqs = 
													'BOOKING UID: '.$event_uid .' \r\n'.
													'GUEST/EVENT NAME: '. $event_summary .' \r\n'.
													'DESCRIPTION: '. $event_description .' \r\n'.
													'LOCATION: '. $event_location.' \r\n'.
													'URL: '. $event_url.' \r\n';
								$bkg->booking_number = $event_uid;

								if ($bkg->create_black_booking())
									{
									$r = simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() , 'ical_import_success.html' , jr_gettext('_JOMRES_ICAL_SUCCESS','_JOMRES_ICAL_SUCCESS',false) );
									logging::log_message($r, 'ics_importer', 'DEBUG');
									}
								else
									{
									$msg = " Booking number ".$bkg->arrival." Arrival/Departure ".$bkg->arrival."/".$bkg->departure;
									$r = simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() , 'ical_import_failure.html' ,jr_gettext('_JOMRES_ICAL_FAILURE','_JOMRES_ICAL_FAILURE',false).$msg);
									logging::log_message($r, 'ics_importer', 'WARNING');
									}

								if (file_exists($temp_ics_file)) {
									unlink($temp_ics_file);
								}
							}
							catch (Exception $e) {
								unlink($temp_ics_file);
								logging::log_message("Unable to import event event ".filter_var(serialize($event) , FILTER_SANITIZE_SPECIAL_CHARS ), 'ics_importer', 'WARNING');
							}
						}
					}
					catch (Exception $e) {
						unlink($temp_ics_file);
						logging::log_message("Unable to import events from ".$uri_query , 'ics_importer', 'WARNING');
					}
				}
			}
		}
	}

	// This must be included in every Event/Mini-component
	public function getRetVals()
	{
		return null;
	}
}
