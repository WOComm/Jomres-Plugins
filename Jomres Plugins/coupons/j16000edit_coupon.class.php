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


class j16000edit_coupon {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');

		$defaultProperty = getDefaultProperty();
		
		$pageoutput = array();
		$output = array();
		$guests_arrray = array();
		
		$id	= (int)jomresGetParam( $_REQUEST, 'coupon_id', 0 );
		
		jr_import( 'jrportal_coupons' );
		$jrportal_coupons = new jrportal_coupons();
		$jrportal_coupons->id = $id;
		$jrportal_coupons->property_uid	= 0;
		
		$yesno = array();
		$yesno[] = jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',FALSE) );
		$yesno[] = jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',FALSE));
		
		if ($id > 0 && $jrportal_coupons->get_coupon()) {
			$output['COUPON_ID'] = $id;
			$output['COUPONCODE'] = $jrportal_coupons->coupon_code;
			$output['VALIDFROM'] = generateDateInput("valid_from",str_replace("-","/",$jrportal_coupons->valid_from) );
			$output['VALIDTO'] = generateDateInput("valid_to",str_replace("-","/",$jrportal_coupons->valid_to));
			$output['AMOUNT'] = $jrportal_coupons->amount;
			$output['ISPERCENTAGE'] = jomresHTML::selectList($yesno, 'is_percentage', '', 'value', 'text', $jrportal_coupons->is_percentage);
			$output['BOOKING_VALIDFROM'] = generateDateInput("booking_valid_from",str_replace("-","/",$jrportal_coupons->booking_valid_from) );
			$output['BOOKING_VALIDTO'] = generateDateInput("booking_valid_to",str_replace("-","/",$jrportal_coupons->booking_valid_to));
			$guest_id = $jrportal_coupons->guest_uid;
		} else {
			$output['COUPON_ID'] = 0;
			$output['COUPONCODE'] = generateJomresRandomString(15);
			$output['VALIDFROM'] = generateDateInput("valid_from",date("Y/m/d") );
			$output['VALIDTO'] = generateDateInput("valid_to",date("Y/m/d") );
			$output['AMOUNT'] = 10.00;
			$output['ISPERCENTAGE'] = jomresHTML::selectList($yesno, 'is_percentage', '', 'value', 'text', 1);
			$output['BOOKING_VALIDFROM'] = generateDateInput("booking_valid_from",date("Y/m/d") );
			$output['BOOKING_VALIDTO'] = generateDateInput("booking_valid_to",date("Y/m/d") );
			$guest_id = 0;
		}
		
		//TODO
		// Also, add encryption/decryption of user details
		
		/* $query = "SELECT `guests_uid`,`firstname`,`surname` FROM #__jomres_guests WHERE `property_uid` = ".(int)$defaultProperty;
		$result = doSelectSql($query);
		
		if (!empty($result))
			{
			foreach ($result as $r)
				{
				$guests_arrray[$r->guests_uid] = array ("surname"=>$r->surname, "firstname"=>$r->firstname);
				}
			}

		$output['GUEST_DROPDOWN']='';
		if (!empty($guests_arrray))
			{
			$guests_options = array();
			$guests_options[]=jomresHTML::makeOption( 0, '' );
			foreach ($guests_arrray as $uid => $guest)
				{
				$guests_options[] = jomresHTML::makeOption( $uid, $guest['firstname']." ". $guest['surname'] );
				}
			
			$output['GUEST_DROPDOWN'] = jomresHTML::selectList($guests_options, 'guest_uid', ' ', 'value', 'text', $guest_id,false);
			} */
		
		//labels
		$output['PAGETITLE']=jr_gettext('_JOMRES_HEDIT_COUPON','_JOMRES_HEDIT_COUPON',false);
		$output['INFO']=jr_gettext('_JRPORTAL_COUPONS_DESC_478','_JRPORTAL_COUPONS_DESC_478',false);
		$output['HCOUPONCODE']=jr_gettext('_JRPORTAL_COUPONS_CODE','_JRPORTAL_COUPONS_CODE',false);
		$output['HVALIDFROM']=jr_gettext('_JRPORTAL_COUPONS_VALIDFROM','_JRPORTAL_COUPONS_VALIDFROM',false);
		$output['HVALIDTO']=jr_gettext('_JRPORTAL_COUPONS_VALIDTO','_JRPORTAL_COUPONS_VALIDTO',false);
		$output['HAMOUNT']=jr_gettext('_JRPORTAL_COUPONS_AMOUNT','_JRPORTAL_COUPONS_AMOUNT',false);
		$output['HISPERCENTAGE']=jr_gettext('_JRPORTAL_COUPONS_ISPERCENTAGE','_JRPORTAL_COUPONS_ISPERCENTAGE',false);
		$output['_JRPORTAL_COUPONS_BOOKING_VALIDFROM']=jr_gettext('_JRPORTAL_COUPONS_BOOKING_VALIDFROM','_JRPORTAL_COUPONS_BOOKING_VALIDFROM',false);
		$output['_JRPORTAL_COUPONS_BOOKING_VALIDTO']=jr_gettext('_JRPORTAL_COUPONS_BOOKING_VALIDTO','_JRPORTAL_COUPONS_BOOKING_VALIDTO',false);
		$output['_JRPORTAL_COUPONS_GUESTNAME']=jr_gettext('_JRPORTAL_COUPONS_GUESTNAME','_JRPORTAL_COUPONS_GUESTNAME',false);
		
		//toolbar
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_coupon');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=list_coupons"),"");
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->readTemplatesFromInput( 'admin_edit_coupon.html' );
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]	=jr_gettext('_JRPORTAL_COUPONS_TITLE','_JRPORTAL_COUPONS_TITLE');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_DESC','_JRPORTAL_COUPONS_DESC');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_CODE','_JRPORTAL_COUPONS_CODE');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_VALIDFROM','_JRPORTAL_COUPONS_VALIDFROM');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_VALIDTO','_JRPORTAL_COUPONS_VALIDTO');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_AMOUNT','_JRPORTAL_COUPONS_AMOUNT');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_ISPERCENTAGE','_JRPORTAL_COUPONS_ISPERCENTAGE');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_BOOKING_VALIDFROM','_JRPORTAL_COUPONS_BOOKING_VALIDFROM');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_BOOKING_VALIDTO','_JRPORTAL_COUPONS_BOOKING_VALIDTO');
		$output[]	=jr_gettext('_JRPORTAL_COUPONS_GUESTNAME','_JRPORTAL_COUPONS_GUESTNAME');

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
