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

class j06001all_bookings {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$output=array();
		$pageoutput=array();
		
		$thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
		
		$property_ids=$thisJRUser->authorisedProperties;
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data_multi($property_ids);
		$counter = 0;
		$number = count($current_property_details->multi_query_result);
		
		uasort($current_property_details->multi_query_result, function($a, $b) {
			return strcmp(strtolower( $a['property_name'] ), strtolower( $b['property_name'] ) );
		}); 

		foreach ($current_property_details->multi_query_result as $property)
			{
			$r = array();
			$r['PROPERTYS_UID'] 		= $property['propertys_uid'];
			$r['PROPERTY_NAME'] 		= $property['property_name'];
			if ($counter ==0)
				$r['SHOW_DATE_DROPDOWN']	= '&show_date_dropdown=1';
			else
				$r['SHOW_DATE_DROPDOWN'] 		= '&show_date_dropdown=0';
			$counter++;
			$r['COMMA']="";
			if ($counter < $number)
				$r['COMMA'] = "," ;
			$rows2[]=$r;
			$rows[]=$r;
			}

		$requestedMonth=jomresGetParam( $_REQUEST, 'requestedMonth', 0 );
		if ($requestedMonth==0)
			{
			$requestedMonth=strtotime("now");
			}
		
		$output['AJAXURL']=JOMRES_SITEPAGE_URL_AJAX."&task=super_dashboard_ajax&requestedMonth=".$requestedMonth;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates' );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->addRows( 'rows2',$rows2);
		$tmpl->readTemplatesFromInput( 'super_dashboard.html');
		$tmpl->displayParsedTemplate();
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
