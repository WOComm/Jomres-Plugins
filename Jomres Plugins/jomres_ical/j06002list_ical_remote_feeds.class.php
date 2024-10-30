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
class j06002list_ical_remote_feeds
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
		$pageoutput=array();
		$output=array();
		
		$defaultProperty = getDefaultProperty();

 		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data($defaultProperty);
		
		$basic_room_details = jomres_singleton_abstract::getInstance( 'basic_room_details' );
		$basic_room_details->get_all_rooms($defaultProperty);

		$query = "SELECT `id` , `url` , `room_uid` FROM `#__jomres_ical_remote_feeds` WHERE property_uid = ".$defaultProperty;
		$existing_feeds = doSelectSql($query);

		$rows = array();
		
		foreach ($existing_feeds as $feed)
			{
			$r = array();
			
			$r['ID'] = $feed->id;
			$r['URL'] = $feed->url;
			$r['ROOM_UID'] = $feed->room_uid;
			$r['ROOM_NAME_NUMBER'] = $basic_room_details->rooms[$feed->room_uid] ["room_name"]." ".$basic_room_details->rooms[$feed->room_uid] ["room_number"];
			
			$toolbar = jomres_singleton_abstract::getInstance('jomresItemToolbar');
			$toolbar->newToolbar();
			$toolbar->addItem('fa fa-trash-o', 'btn btn-danger', '', jomresURL(JOMRES_SITEPAGE_URL.'&task=delete_ical_remote_feed&id='.$feed->id), jr_gettext('COMMON_DELETE', 'COMMON_DELETE', false));
			
			$r['DELETE'] = $toolbar->getToolbar();
			
			$r[] = $toolbar->getToolbar();
				
			$rows[] = $r;
			}
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL."&task=dashboard"),"");
		$jrtb .= $jrtbar->toolbarItem('new',jomresURL(JOMRES_SITEPAGE_URL."&task=create_ical_remote_feed"),'');

		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$output['_JOMRES_ICAL_REMOTE_FEED_URL'] = jr_gettext('_JOMRES_ICAL_REMOTE_FEED_URL','_JOMRES_ICAL_REMOTE_FEED_URL',false,false);
		$output['_JOMRES_ICAL_REMOTE_FEED_ROOM_UID'] = jr_gettext('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID','_JOMRES_ICAL_REMOTE_FEED_ROOM_UID',false,false);
		$output['_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME'] = jr_gettext('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME','_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME',false,false);
		
		$output['PAGETITLE'] = jr_gettext('_JOMRES_ICAL_REMOTE_FEED','_JOMRES_ICAL_REMOTE_FEED',false,false);
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "list_ical_remote_feeds.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		
		}

	function getRetVals()
		{
		return null;
		}
	}
