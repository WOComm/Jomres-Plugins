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

class j16000jintour_manager_list_tours
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
			
		$editIcon	='<IMG SRC="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon">';
		$deleteIcon	='<IMG SRC="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png" border="0" alt="deleteicon">';
		$publishedIcon = '<IMG SRC="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/Tick.png" border="0" alt="publishedicon">';
		$unPublishedIcon = '<IMG SRC="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/Cancel.png" border="0" alt="unpublishedicon">';
		
		$output=array();
		$pageoutput=array();
		$rows = array();
		
		$output['PAGETITLE']=jr_gettext('_JINTOUR_PROFILES_TITLE','_JINTOUR_PROFILES_TITLE',false);
		$output['GENERATEINFO']=jr_gettext('_JINTOUR_PROFILE_GENERATE_INFO','_JINTOUR_PROFILE_GENERATE_INFO',false);
		
		$output['HPROFILE_TITLE']= jr_gettext('_JINTOUR_TOUR_TITLE','_JINTOUR_TOUR_TITLE',false) ;
		$output['HDESCRIPTION']= jr_gettext('_JINTOUR_PROFILE_DESCRIPTION','_JINTOUR_PROFILE_DESCRIPTION',false) ;
		$output['HDAYS_OF_WEEK']= jr_gettext('_JINTOUR_PROFILE_DAYS_OF_WEEK','_JINTOUR_PROFILE_DAYS_OF_WEEK',false) ;
		$output['HPRICE_ADULTS']= jr_gettext('_JINTOUR_PROFILE_PRICE_ADULTS','_JINTOUR_PROFILE_PRICE_ADULTS',false) ;
		$output['HPRICE_KIDS']= jr_gettext('_JINTOUR_PROFILE_PRICE_KIDS','_JINTOUR_PROFILE_PRICE_KIDS',false) ;
		$output['HADULTSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_ADULTS','_JINTOUR_PROFILE_SPACES_ADULTS',false) ;
		$output['HCHILDSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_KIDS','_JINTOUR_PROFILE_SPACES_KIDS',false) ;
		$output['HDATE']= jr_gettext('_JINTOUR_TOUR_DATE','_JINTOUR_TOUR_DATE',false) ;
		$output['HAVLSPACES']= jr_gettext('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE','_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',false) ;
		$output['_JINTOUR_PROFILES_TITLE_LIST']= jr_gettext('_JINTOUR_PROFILES_TITLE_LIST','_JINTOUR_PROFILES_TITLE_LIST',false) ;
		

		$defaultProperty=0;
		$all_tours = jintour_get_all_tours($defaultProperty);
		
		if (!empty($all_tours))
			{
			foreach ($all_tours as $p)
				{
				$r=array();
				$r['DELETELINK']=  '<a href="'.JOMRES_SITEPAGE_URL_ADMIN."&task=jintour_delete_tour&id=".$p['id'].'&no_html=1">'.$deleteIcon.'</a>';
				$r['EDITLINK']=  '<a href="'.JOMRES_SITEPAGE_URL_ADMIN."&task=jintour_view_tour_bookings&id=".$p['id'].'">'.$editIcon.'</a>';
				$r['TITLE']=$p['title'];
				$r['PRICE_ADULTS']	=$p['price_adults'];
				$r['PRICE_KIDS']	=$p['price_kids'];
				$r['SPACES_ADULTS']		=$p['spaces_available_adults'];
				$r['SPACES_KIDS']		=$p['spaces_available_kids'];
				$r['TOURDATE']		=str_replace("-","/",$p['tourdate']);
				$rows[]=$r;
				}
			}
		
		
		$pageoutput=array();
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'admin_jintours_managertour_list.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
	
