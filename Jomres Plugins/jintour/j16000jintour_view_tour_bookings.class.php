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

class j16000jintour_view_tour_bookings
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
			
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');
		$thisJRUser=jomres_getSingleton('jr_user');
		if (!$thisJRUser->userIsManager)
			return;
		$defaultProperty=0;
		$output=array();

		$tour_id = (int)jomresGetParam( $_REQUEST, 'id', 0 );
		$editIcon	='<IMG SRC="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon">';
		
		if ($tour_id > 0)
			{
			$tour = jintour_get_tour($tour_id,$defaultProperty);
			if (!$tour)
				{
				echo "Error, cannot find tour";
				return;
				}
			$tour_info=$tour[$tour_id];

			$output['HPROFILE_TITLE']= jr_gettext('_JINTOUR_TOUR_TITLE','_JINTOUR_TOUR_TITLE',false) ;
			$output['HDESCRIPTION']= jr_gettext('_JINTOUR_PROFILE_DESCRIPTION','_JINTOUR_PROFILE_DESCRIPTION',false) ;
			$output['HDAYS_OF_WEEK']= jr_gettext('_JINTOUR_PROFILE_DAYS_OF_WEEK','_JINTOUR_PROFILE_DAYS_OF_WEEK',false) ;
			$output['HPRICE_ADULTS']= jr_gettext('_JINTOUR_PROFILE_PRICE_ADULTS','_JINTOUR_PROFILE_PRICE_ADULTS',false) ;
			$output['HPRICE_KIDS']= jr_gettext('_JINTOUR_PROFILE_PRICE_KIDS','_JINTOUR_PROFILE_PRICE_KIDS',false) ;
			$output['HADULTSPACES']= jr_gettext('_JINTOUR_PROFILE_SPACES_ADULTS','_JINTOUR_PROFILE_SPACES_ADULTS',false) ;
			$output['HCHILDSPACES']=jr_gettext('_JINTOUR_PROFILE_SPACES_KIDS','_JINTOUR_PROFILE_SPACES_KIDS',false)  ;
			$output['HDATE']= jr_gettext('_JINTOUR_TOUR_DATE','_JINTOUR_TOUR_DATE',false) ;
			$output['HAVLSPACES']= jr_gettext('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE','_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',false) ;
			$output['_JINTOUR_PROFILES_TITLE_LIST']= jr_gettext('_JINTOUR_PROFILES_TITLE_LIST','_JINTOUR_PROFILES_TITLE_LIST',false) ;
			
			
			$output["TITLE"]=$tour_info['title'];
			$output["DESCRIPTION"]=$tour_info['description'];
			$output["PRICE_ADULTS"]=$tour_info['price_adults'];
			$output["PRICE_KIDS"]=$tour_info['price_kids'];
			$output["SPACES_AVAILABLE_ADULTS"]=$tour_info['spaces_available_adults'];
			$output["SPACES_AVAILABLE_KIDS"]=$tour_info['spaces_available_kids'];
			$output["TOURDATE"]=outputDate(str_replace("-","/",$tour_info['tourdate']));


			$query = "SELECT * FROM #__jomres_jintour_tour_bookings WHERE tour_id = ".$tour_id." AND property_id = ".$defaultProperty;
			$tourbookings = doSelectSql($query);
			if (!empty($tourbookings))
				{
				$contract_ids = array();
				foreach ($tourbookings as $booking)
					{
					$contract_ids[]=$booking->contract_id;
					}
				$query = "SELECT contract_uid,guest_uid FROM #__jomres_contracts WHERE contract_uid IN (".implode(',',$contract_ids).") ";
				$contract_info = doSelectSql($query);
				$contract_guest_xref=array();
				$guest_uids = array();
				foreach ($contract_info as $contract)
					{
					$contract_guest_xref[$contract->contract_uid]=$contract->guest_uid;
					$guest_uids[]=$contract->guest_uid;
					}
				$query = "SELECT guests_uid,enc_firstname,enc_surname FROM #__jomres_guests WHERE guests_uid IN (".implode(',',$guest_uids).") ";
				$guest_info = doSelectSql($query);
				$guests = array();
				foreach ($guest_info as $g)
					{
					$guests[$g->guests_uid]=$this->jomres_encryption->decrypt($g->enc_firstname)." ".$this->jomres_encryption->decrypt($g->enc_surname);
					}
					
				$rows=array();
				foreach ($tourbookings as $booking)
					{
					$r=array();
					$r['EDITLINK']=  '<a href="'.JOMRES_SITEPAGE_URL.'&task=edit_booking&contract_uid='.$booking->contract_id.'" target="_BLANK">'.$editIcon.'</a>';
					$r['DESCRIPTION']=$booking->description;
					$guestid = (int)$contract_guest_xref[$booking->contract_id];
					$r['GUEST_NAME'] = $guests[$guestid];
					$rows[]=$r;
					}
				$pageoutput=array();
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'admin_jintours_tour_bookings.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->addRows( 'rows',$rows);
				$tmpl->displayParsedTemplate();
				}
			}
		else
			return;
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
	
