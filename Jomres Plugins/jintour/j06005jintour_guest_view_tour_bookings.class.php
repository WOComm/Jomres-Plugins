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

class j06005jintour_guest_view_tour_bookings
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');
		$thisJRUser=jomres_getSingleton('jr_user');
		if (!$thisJRUser->userIsRegistered)
			return;

		$output=array();

		$tour_id = (int)$componentArgs['id'];
		$property_uid = (int)$componentArgs['property_uid'];
		
		if ($tour_id > 0)
			{
			$tour = jintour_get_tour($tour_id,$property_uid);
			if (!$tour)
				{
				//echo "Error, cannot find tour";
				return;
				}
			$tour_info=$tour[$tour_id];

			$output['HPROFILE_TITLE']= jr_gettext('_JINTOUR_TOUR_TITLE','_JINTOUR_TOUR_TITLE') ;
			$output['HDESCRIPTION']= jr_gettext('_JINTOUR_PROFILE_DESCRIPTION','_JINTOUR_PROFILE_DESCRIPTION') ;
			$output['HDAYS_OF_WEEK']= jr_gettext('_JINTOUR_PROFILE_DAYS_OF_WEEK','_JINTOUR_PROFILE_DAYS_OF_WEEK') ;
			$output['HPRICE_ADULTS']= jr_gettext('_JINTOUR_PROFILE_PRICE_ADULTS','_JINTOUR_PROFILE_PRICE_ADULTS') ;
			$output['HPRICE_KIDS']= jr_gettext('_JINTOUR_PROFILE_PRICE_KIDS','_JINTOUR_PROFILE_PRICE_KIDS') ;
			$output['HADULTSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_ADULTS','_JINTOUR_PROFILE_SPACES_ADULTS') ;
			$output['HCHILDSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_KIDS','_JINTOUR_PROFILE_SPACES_KIDS') ;
			$output['HDATE']= jr_gettext('_JINTOUR_TOUR_DATE','_JINTOUR_TOUR_DATE') ;
			$output['HAVLSPACES']= jr_gettext('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE','_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE') ;
			
			$output["TITLE"]=$tour_info['title'];
			$output["DESCRIPTION"]=$tour_info['description'];
			$output["PRICE_ADULTS"]=$tour_info['price_adults'];
			$output["PRICE_KIDS"]=$tour_info['price_kids'];
			$output["SPACES_AVAILABLE_ADULTS"]=$tour_info['spaces_available_adults'];
			$output["SPACES_AVAILABLE_KIDS"]=$tour_info['spaces_available_kids'];
			$output["TOURDATE"]=outputDate(str_replace("-","/",$tour_info['tourdate']));


			$query = "SELECT description FROM #__jomres_jintour_tour_bookings WHERE tour_id = ".$tour_id." AND contract_id = ".(int)$componentArgs['contract_uid']." AND property_id = ".$property_uid;
			$output["BOOKING_DETAILS"]= doSelectSql($query,1);
			
			$pageoutput=array();
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'jintours_guest_view_tour_bookings.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$result = $tmpl->getParsedTemplate();
			if (!isset($componentArgs['defer_output']))
				echo $result;
			else
				$this->ret_vals = $result;
			}
		else
			return;
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
	
