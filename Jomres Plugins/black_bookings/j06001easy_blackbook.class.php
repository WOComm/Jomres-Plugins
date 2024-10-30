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

class j06001easy_blackbook 
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->property_uid		= getDefaultProperty();
		$mrConfig=getPropertySpecificSettings($this->property_uid);
		if ($mrConfig['is_real_estate_listing']==1 || get_showtime('is_jintour_property') )
			return;
		$this->collect_data();
		
		jomres_cmsspecific_addheaddata("javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/black_bookings/js/','jquery.dop.BookingCalendar.js');
		
		if (using_bootstrap())
			jomres_cmsspecific_addheaddata("javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/black_bookings/js/','ui.multiselect_bootstrap.js');
		else
			jomres_cmsspecific_addheaddata("javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/black_bookings/js/','ui.multiselect.js');
		
		jomres_cmsspecific_addheaddata("javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/black_bookings/js/','jquery.scrollTo-min.js');
		
		jomres_cmsspecific_addheaddata("css",JOMRES_ROOT_DIRECTORY.'/core-plugins/black_bookings/css/','ui.multiselect.css');
		jomres_cmsspecific_addheaddata("css",JOMRES_ROOT_DIRECTORY.'/core-plugins/black_bookings/css/','jquery.dop.BookingCalendar.css');
		
		$output=array();
		
		$output['_JOMRES_AVLCAL_NOBOOKINGS']	=jr_gettext('_JOMRES_AVLCAL_NOBOOKINGS','_JOMRES_AVLCAL_NOBOOKINGS',false);
		$output['_JOMRES_AVLCAL_FULLYBOOKED']	=jr_gettext('_JOMRES_AVLCAL_FULLYBOOKED','_JOMRES_AVLCAL_FULLYBOOKED',false);
		$output['_JOMRES_AVLCAL_THREEQUARTER']	=jr_gettext('_JOMRES_AVLCAL_THREEQUARTER','_JOMRES_AVLCAL_THREEQUARTER',false);
		$output['_JOMRES_AVLCAL_HALF']			=jr_gettext('_JOMRES_AVLCAL_HALF','_JOMRES_AVLCAL_HALF',false);
		$output['_JOMRES_AVLCAL_QUARTER']		=jr_gettext('_JOMRES_AVLCAL_QUARTER','_JOMRES_AVLCAL_QUARTER',false);
		
		$output['_JRPORTAL_MONTHS_LONG_0']		=jr_gettext('_JRPORTAL_MONTHS_LONG_0','_JRPORTAL_MONTHS_LONG_0',false);
		$output['_JRPORTAL_MONTHS_LONG_1']		=jr_gettext('_JRPORTAL_MONTHS_LONG_1','_JRPORTAL_MONTHS_LONG_1',false);
		$output['_JRPORTAL_MONTHS_LONG_2']		=jr_gettext('_JRPORTAL_MONTHS_LONG_2','_JRPORTAL_MONTHS_LONG_2',false);
		$output['_JRPORTAL_MONTHS_LONG_3']		=jr_gettext('_JRPORTAL_MONTHS_LONG_3','_JRPORTAL_MONTHS_LONG_3',false);
		$output['_JRPORTAL_MONTHS_LONG_4']		=jr_gettext('_JRPORTAL_MONTHS_LONG_4','_JRPORTAL_MONTHS_LONG_4',false);
		$output['_JRPORTAL_MONTHS_LONG_5']		=jr_gettext('_JRPORTAL_MONTHS_LONG_5','_JRPORTAL_MONTHS_LONG_5',false);
		$output['_JRPORTAL_MONTHS_LONG_6']		=jr_gettext('_JRPORTAL_MONTHS_LONG_6','_JRPORTAL_MONTHS_LONG_6',false);
		$output['_JRPORTAL_MONTHS_LONG_7']		=jr_gettext('_JRPORTAL_MONTHS_LONG_7','_JRPORTAL_MONTHS_LONG_7',false);
		$output['_JRPORTAL_MONTHS_LONG_8']		=jr_gettext('_JRPORTAL_MONTHS_LONG_8','_JRPORTAL_MONTHS_LONG_8',false);
		$output['_JRPORTAL_MONTHS_LONG_9']		=jr_gettext('_JRPORTAL_MONTHS_LONG_9','_JRPORTAL_MONTHS_LONG_9',false);
		$output['_JRPORTAL_MONTHS_LONG_10']		=jr_gettext('_JRPORTAL_MONTHS_LONG_10','_JRPORTAL_MONTHS_LONG_10',false);
		$output['_JRPORTAL_MONTHS_LONG_11']		=jr_gettext('_JRPORTAL_MONTHS_LONG_11','_JRPORTAL_MONTHS_LONG_11',false);
		
		$output['_JOMRES_COM_MR_WEEKDAYS_MONDAY']		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_MONDAY','_JOMRES_COM_MR_WEEKDAYS_MONDAY',false);
		$output['_JOMRES_COM_MR_WEEKDAYS_TUESDAY']		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_TUESDAY','_JOMRES_COM_MR_WEEKDAYS_TUESDAY',false);
		$output['_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY']	=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY','_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY',false);
		$output['_JOMRES_COM_MR_WEEKDAYS_THURSDAY']		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_THURSDAY','_JOMRES_COM_MR_WEEKDAYS_THURSDAY',false);
		$output['_JOMRES_COM_MR_WEEKDAYS_FRIDAY']		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_FRIDAY','_JOMRES_COM_MR_WEEKDAYS_FRIDAY',false);
		$output['_JOMRES_COM_MR_WEEKDAYS_SATURDAY']		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SATURDAY','_JOMRES_COM_MR_WEEKDAYS_SATURDAY',false);
		$output['_JOMRES_COM_MR_WEEKDAYS_SUNDAY']		=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SUNDAY','_JOMRES_COM_MR_WEEKDAYS_SUNDAY',false);
		
		$output['_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM','_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM',false);
		$output['_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL','_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL',false);
		$output['_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL','_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL',false);
		$output['_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED','_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED',false);

		if ($mrConfig['singleRoomProperty']=="0")
			$output['_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP','_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP',false);
		else
			$output['_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP','_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP',false);
		
		$output['_JOMRES_BLACKBOOKINGS_IMPROVED_DESC'] = jr_gettext('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC','_JOMRES_BLACKBOOKINGS_IMPROVED_DESC',false);
		
		$rows=array();
		foreach ($this->rooms as $room)
			{
			$r = array();
			$r['ROOM_UID']=$room['room_uid'];
			$r['ROOM_NO']=$room['room_number'];
			$r['ROOM_NAME']=$room['room_name'];
			$rows[]=$r;
			}
		
		$output['ISSRP']="false";
		if ($mrConfig['singleRoomProperty']=="1")
			{
			$output['ISSRP']="true";
			foreach ($this->rooms as $room)
				$output['ROOM_UID']=$room['room_uid'];
			}
			
		$pageoutput=array();
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( get_showtime('ePointFilepath').JRDS.'templates' );
		if ($mrConfig['singleRoomProperty']=="1")
			$tmpl->readTemplatesFromInput( 'easy_blackbook_room_selection_srp.html' );
		else
			$tmpl->readTemplatesFromInput( 'easy_blackbook_room_selection_mrp.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$output['ROOM_SELECTION']= $tmpl->getParsedTemplate();

		$pageoutput=array();
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( get_showtime('ePointFilepath').JRDS.'templates' );
		if (using_bootstrap())
			$tmpl->readTemplatesFromInput( 'easy_blackbook_bootstrap.html' );
		else
			$tmpl->readTemplatesFromInput( 'easy_blackbook.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		echo $tmpl->getParsedTemplate();
		}
	
	function touch_template_language()
		{
		$output=array();
		
		$output[]	= jr_gettext( "_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM" , '_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM' );
		$output[]	= jr_gettext( "_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL" , '_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL' );
		$output[]	= jr_gettext( "_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL" , '_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL' );
		$output[]	= jr_gettext( "_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP" , '_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP' );
		$output[]	= jr_gettext( "_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP" , '_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP' );
		$output[]	= jr_gettext( "_JOMRES_BLACKBOOKINGS_IMPROVED_DESC" , '_JOMRES_BLACKBOOKINGS_IMPROVED_DESC' );


		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	
	function collect_data()
		{
		$this->rooms = array();
		$query = "SELECT room_uid,room_name,room_number FROM #__jomres_rooms WHERE propertys_uid = '".(int)$this->property_uid."' ORDER BY room_number,room_name";
		$roomList =doSelectSql($query);
		if (!empty($roomList))
			{
			foreach ($roomList as $c)
				{
				$this->rooms[$c->room_uid]=array("room_uid"=>$c->room_uid,"room_number"=>$c->room_number,"room_name"=>$c->room_name);
				}
			}
		}
	
	function getRetVals()
		{
		return null;
		}
	}
