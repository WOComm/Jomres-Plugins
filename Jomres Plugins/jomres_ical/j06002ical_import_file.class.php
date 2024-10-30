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

class j06002ical_import_file
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$property_uid = getDefaultProperty();
		
		$mrConfig = getPropertySpecificSettings( $property_uid );
		
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 || get_showtime('is_jintour_property')) 
			return;
		
		$room_uid = jomresGetParam($_POST, 'room_uid', 0); 
		
		if ($room_uid == 0)
			{
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL.'&task=ical_import'), 'No room uid selected');
			}

		if ($_FILES['ical_file']['error'] == 4 || !isset($_FILES['ical_file']) )
			{
			jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=ical_import"),jr_gettext('_JOMRES_ICAL_NO_FILE_UPLOADED','_JOMRES_ICAL_NO_FILE_UPLOADED',false));
			}
		else
			{
			//get ical events from ical file
			$ical   = new ICal\ICal($_FILES['ical_file']['tmp_name']);
			$events = $ical->events();
			
			if (empty($events))
				{
				echo jr_gettext('_JOMRES_ICAL_ERROR_NO_EVENTS','_JOMRES_ICAL_ERROR_NO_EVENTS',false);
				
				return false;
				}
			
			jr_import('jomres_generic_black_booking_insert');
			
			$rows = array();
			
			foreach ($events as $event)
				{
				$r = array();
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
				$bkg->property_uid = $property_uid;
				$bkg->arrival = $arrival;
				$bkg->departure = $departure;
				$bkg->room_uids = array($room_uid);
				$bkg->special_reqs = 
									'BOOKING UID: '.$event_uid .' \r\n'.
									'GUEST/EVENT NAME: '. $event_summary .' \r\n'.
									'DESCRIPTION: '. $event_description .' \r\n'.
									'LOCATION: '. $event_location.' \r\n'.
									'URL: '. $event_url.' \r\n';
				$bkg->booking_number = $event_uid;

				if ($bkg->create_black_booking())
					{
					$r['RESULT'] = simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() , 'ical_import_success.html' , jr_gettext('_JOMRES_ICAL_SUCCESS','_JOMRES_ICAL_SUCCESS',false) );
					}
				else
					{
					$r['RESULT'] = simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() , 'ical_import_failure.html' ,jr_gettext('_JOMRES_ICAL_FAILURE','_JOMRES_ICAL_FAILURE',false));
					}
				
				$r['SUMMARY']		= $event_summary;
				$r['DTSTART']		= outputDate($arrival);
				$r['DTEND']			= outputDate($departure);
				$r['DESCRIPTION']	= $event_description;
				
				$rows[]=$r;
				}
			}

 		$pageoutput=array();
		$output=array();

		$output['PAGETITLE']=jr_gettext('_JOMRES_ICAL_IMPORT','_JOMRES_ICAL_IMPORT',false,false);

		$output['_JOMRES_ICAL_RESULT_HEADER_SUMMARY']		=jr_gettext('_JOMRES_ICAL_RESULT_HEADER_SUMMARY','_JOMRES_ICAL_RESULT_HEADER_SUMMARY',false,false);
		$output['_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION']	=jr_gettext('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION','_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION',false,false);
		$output['_JOMRES_ICAL_RESULT_HEADER_START']			=jr_gettext('_JOMRES_ICAL_RESULT_HEADER_START','_JOMRES_ICAL_RESULT_HEADER_START',false,false);
		$output['_JOMRES_ICAL_RESULT_HEADER_END']			=jr_gettext('_JOMRES_ICAL_RESULT_HEADER_END','_JOMRES_ICAL_RESULT_HEADER_END',false,false);
		$output['_JOMRES_ICAL_RESULT_HEADER_RESULT']		=jr_gettext('_JOMRES_ICAL_RESULT_HEADER_RESULT','_JOMRES_ICAL_RESULT_HEADER_RESULT',false,false);

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "ical_import_result.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}

	function getRetVals()
		{
		return null;
		}
	}

/* 			
$date = $events[0]['DTSTART'];
echo 'The ical date: ';
echo $date;
echo "<br />\n";
echo 'The Unix timestamp: ';
echo $ical->iCalDateToUnixTimestamp($date);
echo "<br />\n";
echo 'The number of events: ';
echo $ical->event_count;
echo "<br />\n";
echo 'The number of todos: ';
echo $ical->todo_count;
echo "<br />\n";
echo '<hr/><hr/>';
foreach ($events as $event) {
	echo 'SUMMARY: ' . @$event['SUMMARY'] . "<br />\n";
	echo 'DTSTART: ' . $event['DTSTART'] . ' - UNIX-Time: ' . $ical->iCalDateToUnixTimestamp($event['DTSTART']) . "<br />\n";
	echo 'DTEND: ' . $event['DTEND'] . "<br />\n";
	echo 'DTSTAMP: ' . $event['DTSTAMP'] . "<br />\n";
	echo 'UID: ' . @$event['UID'] . "<br />\n";
	echo 'CREATED: ' . @$event['CREATED'] . "<br />\n";
	echo 'LAST-MODIFIED: ' . @$event['LAST-MODIFIED'] . "<br />\n";
	echo 'DESCRIPTION: ' . @$event['DESCRIPTION'] . "<br />\n";
	echo 'LOCATION: ' . @$event['LOCATION'] . "<br />\n";
	echo 'SEQUENCE: ' . @$event['SEQUENCE'] . "<br />\n";
	echo 'STATUS: ' . @$event['STATUS'] . "<br />\n";
	echo 'TRANSP: ' . @$event['TRANSP'] . "<br />\n";
	echo 'ORGANIZER: ' . @$event['ORGANIZER'] . "<br />\n";
	echo 'ATTENDEE(S): ' . @$event['ATTENDEE'] . "<br />\n";
	echo '<hr/>';
} 
*/
