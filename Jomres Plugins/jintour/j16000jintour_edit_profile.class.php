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

class j16000jintour_edit_profile
	{
	function __construct()
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
		if (!$thisJRUser->userIsManager)
			return;

		$profile_id = (int)jomresGetParam( $_REQUEST, 'id', 0 );
		$defaultProperty=0;
		
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
			
		$output=array();
		$pageoutput=array();
		
		if ($profile_id > 0)
			{
			$profile = jintour_get_tour_profile($profile_id,$defaultProperty);
			if (!$profile)
				{
				echo "Error, cannot find profile";
				return;
				}
			$profile=$profile[$profile_id];
			$output['TAXRATEDROPDOWN'] = $jrportal_taxrate->makeTaxratesDropdown( $profile['tax_rate']);
			}
		else
			{
			$profile['title'] = "Changeme";
			$profile['description'] = "Changeme";
			$profile['days_of_week'] = "1,1,1,1,1,1,1";
			$profile['price_adults'] = "20";
			$profile['price_kids'] = "10";
			$profile['spaces_adults'] = "10";
			$profile['spaces_kids'] = "10";
			$profile['start_date'] = "";
			$profile['end_date'] = "";
			$output['TAXRATEDROPDOWN'] = $jrportal_taxrate->makeTaxratesDropdown( 0 );
			}
		
		$output['PAGETITLE']=jr_gettext('_JINTOUR_PROFILES_TITLE','_JINTOUR_PROFILES_TITLE',false);
		$output['HPROFILE_TITLE']= jr_gettext('_JINTOUR_PROFILE_TITLE','_JINTOUR_PROFILE_TITLE',false) ;
		$output['HDESCRIPTION']= jr_gettext('_JINTOUR_PROFILE_DESCRIPTION','_JINTOUR_PROFILE_DESCRIPTION',false) ;
		$output['HDAYS_OF_WEEK']= jr_gettext('_JINTOUR_PROFILE_DAYS_OF_WEEK','_JINTOUR_PROFILE_DAYS_OF_WEEK',false) ;
		$output['HPRICE_ADULTS']= jr_gettext('_JINTOUR_PROFILE_PRICE_ADULTS','_JINTOUR_PROFILE_PRICE_ADULTS',false) ;
		$output['HPRICE_KIDS']= jr_gettext('_JINTOUR_PROFILE_PRICE_KIDS','_JINTOUR_PROFILE_PRICE_KIDS',false) ;
		$output['HADULTSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_ADULTS','_JINTOUR_PROFILE_SPACES_ADULTS',false) ;
		$output['HCHILDSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_KIDS','_JINTOUR_PROFILE_SPACES_KIDS',false) ;
		$output['HTAXCODE']= jr_gettext('_JRPORTAL_TAXRATES_CODE','_JRPORTAL_TAXRATES_CODE',false) ;
		$output['HSTART_DATE']= jr_gettext('_JINTOUR_PROFILE_START_DATE','_JINTOUR_PROFILE_START_DATE',false) ;
		$output['HEND_DATE']= jr_gettext('_JINTOUR_PROFILE_END_DATE','_JINTOUR_PROFILE_END_DATE',false) ;

		$output['DESCRIPTION_INFO'] = jr_gettext('_JINTOUR_PROFILE_DESCRIPTION_INFO','_JINTOUR_PROFILE_DESCRIPTION_INFO',false);
		$output['KIDS_INFO'] = jr_gettext('_JINTOUR_PROFILE_PRICE_KIDS_INFO','_JINTOUR_PROFILE_PRICE_KIDS_INFO',false);

		$output['ID']=$profile_id ;
		$output['TITLE']=$profile['title'];
		$output['DESCRIPTION']=$profile['description'];

		$validfrom = str_replace("-","/",$profile['start_date']);
		$validto =str_replace("-","/",$profile['end_date']);
		
		$output['VALIDFROM']=generateDateInput("validfrom",$validfrom);
		$output['VALIDTO']=generateDateInput("validto",$validto);
		$output['SPACES_ADULTS']=jomresHTML::integerSelectList( 1,500,1, 'spaces_adults',' ', $profile['spaces_adults']);
		$output['SPACES_KIDS']=jomresHTML::integerSelectList( 1,500,1, 'spaces_kids',' ', $profile['spaces_kids']);
		$output['PRICE_ADULTS']=(float)$profile['price_adults'];
		$output['PRICE_KIDS']=(float)$profile['price_kids'];
		
		
		$output['MONDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_MONDAY','_JOMRES_COM_MR_WEEKDAYS_MONDAY',false);
		$output['TUESDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_TUESDAY','_JOMRES_COM_MR_WEEKDAYS_TUESDAY',false);
		$output['WEDNESDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY','_JOMRES_COM_MR_WEEKDAYS_WEDNESDAY',false);
		$output['THURSDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_THURSDAY','_JOMRES_COM_MR_WEEKDAYS_THURSDAY',false);
		$output['FRIDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_FRIDAY','_JOMRES_COM_MR_WEEKDAYS_FRIDAY',false);
		$output['SATURDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SATURDAY','_JOMRES_COM_MR_WEEKDAYS_SATURDAY',false);
		$output['SUNDAY']=jr_gettext('_JOMRES_COM_MR_WEEKDAYS_SUNDAY','_JOMRES_COM_MR_WEEKDAYS_SUNDAY',false);

		$output['MONDAY_CHECKED']="";
		$output['TUESDAY_CHECKED']="";
		$output['WEDNESDAY_CHECKED']="";
		$output['THURSDAY_CHECKED']="";
		$output['FRIDAY_CHECKED']="";
		$output['SATURDAY_CHECKED']="";
		$output['SUNDAY_CHECKED']="";
		
		$blam = explode (",",$profile['days_of_week']);
		if (!empty($blam))
			{
			
			if ($blam[0] == "1")
				$output['MONDAY_CHECKED']=" checked ";
			if ($blam[1] == "1")
				$output['TUESDAY_CHECKED']=" checked ";
			if ($blam[2] == "1")
				$output['WEDNESDAY_CHECKED']=" checked ";
			if ($blam[3] == "1")
				$output['THURSDAY_CHECKED']=" checked ";
			if ($blam[4] == "1")
				$output['FRIDAY_CHECKED']=" checked ";
			if ($blam[5] == "1")
				$output['SATURDAY_CHECKED']=" checked ";
			if ($blam[6] == "1")
				$output['SUNDAY_CHECKED']=" checked ";
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=jintour"),"");
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'jintour_save_profile');
		if ($profile_id>0)
			$jrtb .= $jrtbar->toolbarItem('delete',jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=delete_jintour_profile&no_html=1&popup=1&id=".$profile_id),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$pageoutput=array();
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'admin_jintours_edit_tourprofile.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
	
