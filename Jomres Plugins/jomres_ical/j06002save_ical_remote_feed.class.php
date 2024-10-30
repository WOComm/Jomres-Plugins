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

class j06002save_ical_remote_feed
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
		$ical_remote_url = jomresGetParam($_POST, 'ical_remote_url', '');
		
		$query = "INSERT INTO `#__jomres_ical_remote_feeds` 
							(
							`url`,
							`room_uid`,
							`property_uid`
							)
						VALUES
							(
							'".$ical_remote_url."',
							'".$room_uid."',
							'".$property_uid."'
							)";
		doInsertSql($query, jr_gettext('_JOMRES_ICAL_REMOTE_FEED_SAVED', '_JOMRES_ICAL_REMOTE_FEED_SAVED', false));

 		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=list_ical_remote_feeds" ), jr_gettext('_JOMRES_ICAL_REMOTE_FEED_SAVED', '_JOMRES_ICAL_REMOTE_FEED_SAVED', false) );
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
