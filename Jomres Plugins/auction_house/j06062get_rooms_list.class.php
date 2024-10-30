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

class j06062get_rooms_list
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		$arrival_date = JSCalConvertInputDates($_GET['start_date']);
		$departure_date = JSCalConvertInputDates($_GET['departure_date']);
		$property_uid = (int)$_GET['property_uid'];
		if (!array_key_exists($property_uid,$thisJRUser->authorisedProperties))
			return;
			
		$mrConfig=getPropertySpecificSettings($property_uid);
		
		$available_rooms = array();
		
		$ahjavascript = get_showtime('ahjavascript');
		
		if (using_bootstrap())
			{
			$js_to_run_on_render .='
			jomresJquery(\'#selectable\').multiselect({
				onChange:function(element, checked){
					var id = element.val();
					var tmp = jomresJquery(\'#selected_rooms\').val();
					jomresJquery(\'#selected_rooms\').val(tmp+id+ \',\');
					}
			});';
			}
		else
			{
			$js_to_run_on_render .='
			jomresJquery(function() { jomresJquery( "#selectable" ).selectable(); });
			
			jomresJquery(function() {
				jomresJquery("#selectable").selectable({
					stop: function(){
						jomresJquery("#selected_rooms").val(\'\');
						jomresJquery(".ui-selected", this).each(function(){
							var id = this.id;
							var tmp = jomresJquery(\'#selected_rooms\').val();
							jomresJquery(\'#selected_rooms\').val(tmp+id+ \',\');
							
						});
					}
				});
			});
			';
			}
			
		set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);

		$query="SELECT room_uid,room_number,room_name FROM #__jomres_rooms WHERE propertys_uid = '".(int)$property_uid."'";
		$roomsList = doSelectSql($query);
		if (!empty($roomsList))
			{
			foreach ($roomsList as $room)
				{
				$available_rooms[$room->room_uid] = array("room_number_name"=>trim($room->room_number)." ".trim($room->room_name),"room_uid"=>$room->room_uid);
				}
			foreach ($roomsList as $room)
				{
				$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');
				$dateRangeArray= $ah_object->bb_getDateRange($arrival_date,$departure_date);
				$contractUidArray=array();
				foreach ($dateRangeArray as $theDate)
					{
					$query="SELECT room_bookings_uid,contract_uid FROM #__jomres_room_bookings WHERE room_uid = '".(int)$room->room_uid."' AND date = '$theDate'";
					$bookingsList = doSelectSql($query);
					if (!empty($bookingsList))
						{
						unset($available_rooms[(int)$room->room_uid]);
						}
					}
				}
			}
		if (!empty($available_rooms))
			{
			if ($mrConfig['singleRoomProperty']=="1")
				{
				foreach ($available_rooms as $room_uid=>$room)
					$this->ret_vals .= '<input type="hidden" name="selected" value="'.$room_uid.'" id="selected_rooms">';
				}
			else  // Return the rooms list to select from
				{
				if (using_bootstrap())
					{
					$this->ret_vals = '<select id="selectable" multiple="multiple"';
					foreach ($available_rooms as $room_uid=>$room)
						{
						$this->ret_vals .= '<option value="'.$room_uid.'">'.$room['room_number_name'].'</option>';
						}
					$this->ret_vals .= '<input type="hidden" name="selected" value="" id="selected_rooms">';

					}
				else
					{
					$this->ret_vals = '<ol id="selectable" style="list-style-type: none;">';
					foreach ($available_rooms as $room_uid=>$room)
						{
						$this->ret_vals .= '<li class="ui-widget-content" id="'.$room_uid.'">'.$room['room_number_name'].'</li>';
						}
					$this->ret_vals .= '</ol><input type="hidden" name="selected" value="" id="selected_rooms">';
					}
				}
			}
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
