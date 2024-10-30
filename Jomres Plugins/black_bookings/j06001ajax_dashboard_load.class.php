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

class j06001ajax_dashboard_load {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->property_uid		= getDefaultProperty();
		$this->room_bookings = array();
		$query="SELECT room_uid,contract_uid,black_booking,date FROM #__jomres_room_bookings WHERE property_uid = ".(int)$this->property_uid." ";
		$bookingsList = doSelectSql($query);
		if (!empty($bookingsList))
			{
			foreach ($bookingsList as $c)
				{
				$this->room_bookings[$c->date][]=array("room_uid"=>$c->room_uid,"contract_uid"=>$c->contract_uid,"black_booking"=>$c->black_booking,"date"=>$c->date);
				}
			}
			
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
		$this->numberOfRoomsInProperty = count($roomList);
		
		
		$this->rooms_empty=0;
		$this->rooms_quarter=(($this->numberOfRoomsInProperty/100)*.25)*100;
		$this->rooms_half=(($this->numberOfRoomsInProperty/100)*.5)*100;
		$this->rooms_threequarter=(($this->numberOfRoomsInProperty/100)*.75)*100;
		$this->rooms_full=$this->numberOfRoomsInProperty;
		
		
		$output = ';';

		foreach ($this->room_bookings as $date=>$bookings)
			{
			$count = count($bookings);
			if ($count == $this->rooms_full)
				$status = '50';
			if ($count <= $this->rooms_full-1  && $count >= $this->rooms_threequarter )
				$status = '40';
			if ($count < $this->rooms_threequarter && $count >= $this->rooms_half)
				$status = '30';
			if ($count < $this->rooms_half && $count >= $this->rooms_empty+1)
				$status = '20';
			if ($count == $this->rooms_empty)
				$status = '10';

			$value = '0';
			$output .=''.str_replace("/","-",$date).';;'.$status.';;'.$value.',';
			}
		
		$output = substr($output, 0, strlen($output)-1 ); 
		echo $output;
		
		}
	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
