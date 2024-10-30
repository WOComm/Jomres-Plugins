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

class j06062auction_seller_ajax_create_auction
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$thisJRUser=jomres_getSingleton('jr_user');
		$basic_property_details =jomres_getSingleton('basic_property_details');
		$currentProperty = getDefaultProperty();
		$output=array();
		$pageoutput = array();
		
		$output['_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY']=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY','_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',false,false);
		
		$output['_PN_NEXT']=jr_gettext('_PN_NEXT','_PN_NEXT',false,false);
		
		
		// Creating the property dropdown
		$tmpArray = array();
		foreach ($thisJRUser->authorisedProperties as $p)
			{
			$obj = new stdClass();
			$obj->propertys_uid=$p;
			$obj->property_name=$basic_property_details->get_property_name($p);
			$tmpArray[]=$obj;
			}
		$propertysList =$tmpArray;
		foreach ($propertysList as $property)
			{
			if ($counter==0)
				$thisProperty=$property->propertys_uid;
			$pname=$property->property_name;
			$propertyOptions[]=jomresHTML::makeOption( $property->propertys_uid, stripslashes($pname) );
			}
		$output['PROPERTYDROPDOWN']= jomresHTML::selectList($propertyOptions, 'chosen_property', ' id="chosen_property" ', 'value', 'text', $currentProperty);
		// Finish the property dropdown
		
		
		// Use rooms dropdown
		if (get_showtime('include_room_booking_functionality'))
			{
			$output['_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS']=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS','_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',false,false);
			$incRoomsOpts[]=jomresHTML::makeOption( '0', jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',FALSE) );
			$incRoomsOpts[]=jomresHTML::makeOption( '1', jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',FALSE));
			$output['INCLUDEROOMS']= jomresHTML::selectList($incRoomsOpts, 'include_rooms', '  id="include_rooms"', 'value', 'text', '1', false);
			}
		// End use rooms dropdown
		
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
		$tmpl->readTemplatesFromInput( 'auction_seller_ajax_create_auction.html' );
		$tmpl->addRows( 'pageoutput',$pageoutput );
		$tpl=$tmpl->getParsedTemplate();
		$this->ret_vals=$tpl;
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY','_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS','_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS');
		
		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
