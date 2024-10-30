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

class j06062auction_seller_ajax_create_auction_step2
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
		$output=array();
		$pageoutput = array();
		$property_uid = intval(jomresGetParam( $_REQUEST, 'chosen_property', 0 ));
		$include_rooms = jomresGetParam( $_REQUEST, 'include_rooms', 0 );
		
		if ($include_rooms == 0)
			$include_rooms = false;

		$basic_property_details =jomres_getSingleton('basic_property_details');
		$basic_property_details->gather_data($property_uid);

		$auction_title 		= trim(jomresGetParam( $_REQUEST, 'auction_title', 'Change me' ));
		$auction_desc 		= trim(jomresGetParam( $_REQUEST, 'auction_desc', 'Change me' ));
		$auction_value 		= (float)jomresGetParam( $_REQUEST, 'auction_value', 0.00 );
		$auction_reserve 	= (float)jomresGetParam( $_REQUEST, 'auction_reserve', 0.00 );
		$auction_buynow 	= (float)jomresGetParam( $_REQUEST, 'auction_buynow', 0.00 );
		$auction_days_to_run = intval(jomresGetParam( $_REQUEST, 'auction_days_to_run', 20 ));

		$output['AUCTION_TITLE']		=$auction_title;
		$output['AUCTION_DESCRIPTION']	=$auction_desc;
		$output['AUCTION_VALUE']		=$auction_value;
		$output['AUCTION_RESERVE']		=$auction_reserve;
		$output['AUCTION_BUYNOW_PRICE']	=$auction_buynow;

		if (isset($_REQUEST['auction_title']))
			{
			if ($auction_title != "" && $auction_desc != "")
				{
				jr_import('jomres_auction');
				$auction = new jomres_auction();
				$auction->title					= $auction_title;
				$auction->description			= $auction_desc;
				$auction->value					= $auction_value;
				$auction->reserve				= $auction_reserve;
				$auction->end_value				= 0.00;
				$auction->buy_now_value			= $auction_buynow;
				$now = date("Y-m-d H-i-s");
				$enddate = date("Y-m-d H-i-s",strtotime("+".$auction_days_to_run." days") ) ;
				$auction->start_date			= $now;
				$auction->end_date				= $enddate;
				$auction->property_uid			= $property_uid;
				$auction->cms_user_id			= $thisJRUser->id;
				$auction->winner_cms_user_id	= 0;
				$auction->lang					= get_showtime('lang');

				$auction->commitNewAuction();

				$start=JSCalConvertInputDates($_GET['auction_booking_start']);
				$end=JSCalConvertInputDates($_GET['auction_booking_end']);
				
				$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');
				$black_booking_id = $ah_object->insert_auction_blackbooking($auction,$start,$end,$_GET['selected_rooms'],$include_rooms);
				$auction->blackbooking_id = $black_booking_id;
				$auction->commitUpdateAuction();
				
				$ahjavascript = get_showtime('ahjavascript');
				$js_to_run_on_render = 'jomresJquery("#messageBox").hide();';
				set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);
				$this->ret_vals=$MiniComponents->specificEvent('06062','auction_seller_ajax_list_auctions');
				return;
				}
			else
				{
				if ($auction_title == "")
					$output['_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR','_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',false,false);
				if ($auction_desc == "")
					$output['_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR','_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',false,false);
				}
			}

		$output['DAYSTORUNDROPDOWN'] = jomresHTML::integerSelectList( 01, 50, 1, "auction_days_to_run", 'id="auction_days_to_run" ', $auction_days_to_run, "%02d" );

		$output['_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN','_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',false,false);
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_TITLE']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE','_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',false,false);
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION','_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',false,false);
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_VALUE']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE','_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',false,false);
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE','_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',false,false);
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE','_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',false,false);
		
		$room_selection_labels = array();
		$room_selection_labels[1]['_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',false,false);
		$room_selection_labels[2]['_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',false,false);
		$room_selection_labels[3]['_JOMRES_AJAXFORM_AVAILABLEROOMS']=jr_gettext('_JOMRES_AJAXFORM_AVAILABLEROOMS','_JOMRES_AJAXFORM_AVAILABLEROOMS',false,false);
		
		
		$output['_PN_NEXT']=jr_gettext('_PN_NEXT',_PN_NEXT,false,false);

		$output['CHOSENPROPERTY']=$property_uid;
		$output['INCLUDE_ROOMS']=$include_rooms;


		$ahjavascript = get_showtime('ahjavascript');
		if (isset($_REQUEST['auction_title']))
			$js_to_run_on_render = '';
		else
			$js_to_run_on_render = 'jomresJquery("#messageBox").hide();';

		$room_selection = array();

		if ($include_rooms)
			{
			$room_s = array();

			// We can't use the generate date function here, because we need to pass the javascript part back seperately
			$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
			$jrConfig=$siteConfig->get();
			$dateFormat=$jrConfig['cal_input'];
			$dateFormat = strtolower(str_replace("%","",$dateFormat)); // For the new jquery calendar, we'll strip out the % symbols. This should mean that we don't need to force upgraders to reset their settings.
			$dateFormat = str_replace("y","yy",$dateFormat);
			$dateFormat = str_replace("m","mm",$dateFormat);
			$dateFormat = str_replace("d","dd",$dateFormat);


			$js_to_run_on_render .='jomresJquery("#auction_booking_start").datepicker( {
			dateFormat: "'.$dateFormat.'",
			minDate: 0, maxDate: "+5Y",
			buttonImage: "'.JOMRES_IMAGES_RELPATH.'calendar.png",
			buttonImageOnly: true,
			showOn: "both",
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			showOtherMonths: true,
			selectOtherMonths: true,firstDay: 1,	showButtonPanel: true,
			onSelect: function(selectedDate) {
				var nextDayDate = jomresJquery("#auction_booking_start").datepicker("getDate", "+1d");
				nextDayDate.setDate(nextDayDate.getDate() + 1);
				jomresJquery("#auction_booking_end").datepicker("setDate", nextDayDate);
				auction_update_rooms_list();
				}} );';

			$js_to_run_on_render .='jomresJquery("#auction_booking_end").datepicker( {
			dateFormat: "'.$dateFormat.'",
			minDate: 0, maxDate: "+5Y",
			buttonImage: "'.JOMRES_IMAGES_RELPATH.'calendar.png",
			buttonImageOnly: true,
			showOn: "both",
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			showOtherMonths: true,
			selectOtherMonths: true,firstDay: 1,	showButtonPanel: true,
			onSelect: function(selectedDate) {
				auction_update_rooms_list();
				}} );';

			$today = date("Y/m/d");
			$date_elements  = explode("/",$today);
			$unixOneWeek= mktime(0,0,0,$date_elements[1],$date_elements[2]+7,$date_elements[0]);
			$end = date("Y/m/d",$unixOneWeek);
			$start=$today;

			$room_s['ARRIVAL']=JSCalmakeInputDates($start,$siteConfig);
			$room_s['DEPARTURE']=JSCalmakeInputDates($end,$siteConfig);
			$mrConfig=getPropertySpecificSettings($property_uid);
			if ($mrConfig['singleRoomProperty']=="1")
				$room_s['_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP','_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',false,false);
			else
				$room_s['_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP','_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',false,false);

			$room_selection[]=$room_s;
			}


		//$js_to_run_on_render .='jomresJquery(function() { jomresJquery( "#selectable" ).selectable(); });';

		set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);

		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
		$tmpl->readTemplatesFromInput( 'auction_seller_ajax_create_auction_step2.html' );
		$tmpl->addRows( 'pageoutput',$pageoutput );
		
		$tmpl->addRows( 'room_selection_labels1',array($room_selection_labels[1]) );
		$tmpl->addRows( 'room_selection_labels2',array($room_selection_labels[2]) );
		$tmpl->addRows( 'room_selection_labels3',array($room_selection_labels[3]) );
		$tmpl->addRows( 'room_selection',$room_selection );
		$tpl=$tmpl->getParsedTemplate();
		$this->ret_vals=$tpl;

		}

	function insert_blackbooking()
		{

		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE','_JOMRES_AUCTIONHOUSE_AUCTION_TITLE');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION','_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE','_JOMRES_AUCTIONHOUSE_AUCTION_VALUE');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE','_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE','_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR','_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR','_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN','_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP','_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP','_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE','_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE');
		

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
