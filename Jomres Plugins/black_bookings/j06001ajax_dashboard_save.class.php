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

class j06001ajax_dashboard_save {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->retVals = null;
		$this->property_uid		= getDefaultProperty();
		
		$dates_string = $_POST['dop_booking_calendar'];
		$rooms_string = $_POST['rooms'];
		$dates_array = explode(",",$dates_string);
		$rooms_array = explode(",",$rooms_string);
		
		// Let's sanitise this stuff
		$new_arr = array();
		foreach ($dates_array as $date)
			{
			$new_arr[]=date("Y/m/d",strtotime($date));
			}
		$this->dates_array = $new_arr;
		
		$new_arr = array();
		foreach ($rooms_array as $room)
			{
			$new_arr[]=(int)$room;
			}
		$this->rooms_array = $new_arr;
		
		// We've been given the start and end dates. If there's more than one day, then we need to fully populate the date range array.
		if (count($this->dates_array)>1)
			{
			$last = count($this->dates_array)-1;

			$days= dateDiff("d", $this->dates_array[0], $this->dates_array[$last]);

			$dateRangeArray=array();
			$date_elements	= explode("/",$this->dates_array[0]);
			$unixCurrentDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
			$secondsInDay = 86400;
			$currentDay=$this->dates_array[0];
			for ($i=0, $n=$days; $i <= $n; $i++)
				{
				$currentDay=date("Y/m/d",$unixCurrentDate);
				$dateRangeArray[]=$currentDay;
				$unixCurrentDate=$unixCurrentDate+$secondsInDay;
				}
			$this->dates_array = $dateRangeArray;
			}

		// Ok, we can get on with things. First we'll check, for each date, that the room can be booked
		
		$rooms_that_can_be_booked = array();
		$rooms_not_booked = array();
		
		foreach ($this->rooms_array as $room_uid)
			{
			$query="SELECT contract_uid FROM #__jomres_room_bookings WHERE property_uid = ".(int)$this->property_uid." AND `room_uid`=".$room_uid." AND `date` IN ('".implode('\',\'',$this->dates_array)."') ";
			$bookingsList = doSelectSql($query);
			if (!empty($bookingsList))
				$rooms_not_booked[]=$room_uid;
			else
				$rooms_that_can_be_booked[]=$room_uid;
			}
		
		// check that we can work on at least 1 room
		if (count($rooms_not_booked) != count($this->rooms_array))
			{
			$contract_uid = $this->create_new_contract();
			$this->black_book_rooms($rooms_that_can_be_booked,$contract_uid);
			}
		
		// Gather some data about the rooms
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
		
		$response = '';
		if (!empty($rooms_that_can_be_booked))
			{
			foreach ($rooms_that_can_be_booked as $room_uid)
				{
				$pageoutput=array();
				$message = $this->rooms[$room_uid]['room_number']. " ".$this->rooms[$room_uid]['room_name']." ".jr_gettext("_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED",'_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED');
				$output = array("MESSAGE"=>$message);
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( get_showtime('ePointFilepath').JRDS.'templates'  );
				if (using_bootstrap())
					$tmpl->readTemplatesFromInput( 'easy_blackbook_booked_bootstrap.html' );
				else
					$tmpl->readTemplatesFromInput( 'easy_blackbook_booked.html' );
				
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$response .= $tmpl->getParsedTemplate();
				}
			}
		
		if (!empty($rooms_not_booked))
			{
			foreach ($rooms_not_booked as $room_uid)
				{
				$pageoutput=array();
				$message = $this->rooms[$room_uid]['room_number']. " ".$this->rooms[$room_uid]['room_name']." ".jr_gettext("_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED",'_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED');
				$output = array("MESSAGE"=>$message);
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( get_showtime('ePointFilepath').JRDS.'templates'  );
				if (using_bootstrap())
					$tmpl->readTemplatesFromInput( 'easy_blackbook_not_booked_bootstrap.html' );
				else
					$tmpl->readTemplatesFromInput( 'easy_blackbook_not_booked.html' );
				
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$response .= $tmpl->getParsedTemplate();
				}
			}
		
		echo $response;
		
		
		}
	
	function create_new_contract()
		{
		$numberOfAdults="0";
		$numberOfChildren="0";
		$arrivalDate=$this->dates_array[0];
		$last = count($this->dates_array)-1;
		$departureDate=date("Y/m/d",strtotime($this->dates_array[$last]."+1 day"));
		$dateRangeString=implode(",",$this->dates_array);
		$guests_uid="0";
		$rates_uid="0";
		$cotRequired="0";
		$rate_rules="";
		$single_person_suppliment="0";
		$deposit_required="0";
		$contract_total="0";
		$thisJRUser=jomres_singleton_abstract::getInstance('jr_user');
		$specialReqs=jr_gettext("_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY",'_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY')." ".$thisJRUser->username;
		$extras="0";
		$extrasValue="0";

		$query="INSERT INTO #__jomres_contracts (
			`arrival`,`departure`,`rates_uid`,
			`guest_uid`,`contract_total`,`special_reqs`,
			`deposit_paid`,`deposit_required`,
			`date_range_string`,`booked_in`,`booked_out`,`rate_rules`,
			`property_uid`,`single_person_suppliment`,`extras`,`extrasvalue`)
			VALUES (
			'$arrivalDate','$departureDate','".(int)$rates_uid."',
			'".(int)$guests_uid."','".(float)$contract_total."','$specialReqs',
			'0','".(float)$deposit_required."',
			'$dateRangeString','0','0','$rate_rules',
			'".(int)$this->property_uid."','".(float)$single_person_suppliment."','$extras','".(float)$extrasValue."')";
    
		$lastID=doInsertSql($query,'');

        $webhook_notification                               = new stdClass();
        $webhook_notification->webhook_event                = 'blackbooking_added';
        $webhook_notification->webhook_event_description    = 'Logs when black bookings are added.';
        $webhook_notification->webhook_event_plugin         = 'black_bookings';
        $webhook_notification->data                         = new stdClass();
        $webhook_notification->data->property_uid           = $this->property_uid;
        $webhook_notification->data->contract_uid           = $lastID;
        add_webhook_notification($webhook_notification);

		return $lastID;
		}
	
	function black_book_rooms($room_uids,$contract_uid)
		{
		$internetBooking=0;
		$receptionBooking=0;
		$blackBooking=1;
		
		foreach ($room_uids as $room_uid)
			{
			$query="INSERT INTO #__jomres_room_bookings
				(`room_uid`,
				`date`,
				`contract_uid`,
				`black_booking`,
				`internet_booking`,
				`reception_booking`,
				`property_uid`)
				VALUES ";
			for ($i=0, $n=count($this->dates_array); $i < $n; $i++)
				{
				$query.= ($i>0) ? ', ':'';
				$query.="(".(int)$room_uid.",'".$this->dates_array[$i]."',".(int)$contract_uid.",1,0,0,".(int)$this->property_uid.")";
				}

			doInsertSql($query,'');
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
