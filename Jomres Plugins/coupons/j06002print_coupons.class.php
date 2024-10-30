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

class j06002print_coupons
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$number_of_coupons = 5;
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$defaultProperty=getDefaultProperty();
		
		$id = (int)jomresGetParam( $_REQUEST, "coupon_id", 0 );
		
		if ($id ==0)
			return;
		
		jr_import( 'jrportal_coupons' );
		$jrportal_coupons = new jrportal_coupons();
		$jrportal_coupons->id = $id;
		$jrportal_coupons->property_uid	= $defaultProperty;
		$jrportal_coupons->get_coupon();
		
		$current_property_details =jomres_singleton_abstract::getInstance('basic_property_details');
		$current_property_details->gather_data($defaultProperty);
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images($defaultProperty, array('property'));

		$output['PROPERTY_NAME']	= $current_property_details->property_name;
		$output['PROPERTY_STREET']	= $current_property_details->property_street;
		$output['PROPERTY_TOWN']	= $current_property_details->property_town;
		$output['PROPERTY_REGION']	= $current_property_details->property_region;
		$output['PROPERTY_COUNTRY']	= $current_property_details->property_country;
		$output['PROPERTY_POSTCODE']= $current_property_details->property_postcode;
		$output['PROPERTY_IMAGE']	= $jomres_media_centre_images->images ['property'][0][0]['small'];

		$output['COUPON_CODE']			=$jrportal_coupons->coupon_code;
		$output['VALID_FROM']			=outputDate($jrportal_coupons->valid_from);
		$output['VALID_TO']				=outputDate($jrportal_coupons->valid_to);
		$output['BOOKING_VALID_FROM']	=outputDate($jrportal_coupons->booking_valid_from);
		$output['BOOKING_VALID_TO']		=outputDate($jrportal_coupons->booking_valid_to);
		
		if ($jrportal_coupons->is_percentage == 1)
			{
			$output['DISCOUNT_VALUE'] = $jrportal_coupons->amount.jr_gettext('JOMRES_COUPONS_PERCENT','JOMRES_COUPONS_PERCENT');
			}
		else
			{
			$output['DISCOUNT_VALUE'] = output_price($jrportal_coupons->amount);
			}
		
		$output['JOMRES_COUPONS_PRINTABLE_LIST']	=jr_gettext('JOMRES_COUPONS_PRINTABLE_LIST','JOMRES_COUPONS_PRINTABLE_LIST');
		$output['JOMRES_COUPONS_SCAN']				=jr_gettext('JOMRES_COUPONS_SCAN','JOMRES_COUPONS_SCAN');
		$output['JOMRES_COUPONS_GETADISCOUNT']		=jr_gettext('JOMRES_COUPONS_GETADISCOUNT','JOMRES_COUPONS_GETADISCOUNT');
		$output['JOMRES_COUPONS_PERCENT']			=jr_gettext('JOMRES_COUPONS_PERCENT','JOMRES_COUPONS_PERCENT');
		$output['JOMRES_COUPONS_IFYOUBOOKBETWEEN']	=jr_gettext('JOMRES_COUPONS_IFYOUBOOKBETWEEN','JOMRES_COUPONS_IFYOUBOOKBETWEEN');
		$output['JOMRES_COUPONS_AND']				=jr_gettext('JOMRES_COUPONS_AND','JOMRES_COUPONS_AND');
		$output['JOMRES_COUPONS_FORDATESBETWEEN']	=jr_gettext('JOMRES_COUPONS_FORDATESBETWEEN','JOMRES_COUPONS_FORDATESBETWEEN');
		$output['JOMRES_COUPONS_ALTERNATIVELY']		=jr_gettext('JOMRES_COUPONS_ALTERNATIVELY','JOMRES_COUPONS_ALTERNATIVELY');
		$output['JOMRES_COUPONS_OFFACCOMMODATION']	=jr_gettext('JOMRES_COUPONS_OFFACCOMMODATION','JOMRES_COUPONS_OFFACCOMMODATION');
		
		
		$url = get_booking_url($jrportal_coupons->property_uid,'nosef', "&coupon_code=".$jrportal_coupons->coupon_code);
		$qr_code = jomres_make_qr_code($url);
		$output['QR_CODE'] = $qr_code['relative_path'];
		
		$pageoutput[]=$output;
		
		for ($i=1;$i<=$number_of_coupons;$i++)
			{
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'print_coupons.html' );
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->displayParsedTemplate();
			}
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

	