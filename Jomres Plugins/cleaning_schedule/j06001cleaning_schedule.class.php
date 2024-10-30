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


class j06001cleaning_schedule
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		$ePointFilepath=get_showtime('ePointFilepath');

		$requestedMonth	= jomresGetParam( $_REQUEST, 'requestedMonth', 0 );
		if ($requestedMonth==0)
			$thisMonth=date("Y/m");
		else
			$thisMonth=date("Y/m",$requestedMonth);
		
		$query = "SELECT `contract_uid`,`arrival`,`departure`,`property_uid` FROM #__jomres_contracts WHERE `departure` LIKE '".$thisMonth."%' AND property_uid IN (".implode(',',$thisJRUser->authorisedProperties).") ORDER BY `property_uid`,`departure` ";
		$result = doSelectSql($query);
		$output=array();
		if (!empty($result))
			{
			$contracts = array();
			foreach ($result as $c)
				{
				$contracts[$c->contract_uid]=array("contract_uid"=>$c->contract_uid,"departure"=>$c->departure,"arrival"=>$c->arrival,"property_uid"=>$c->property_uid);
				$cids[]=(int)$c->contract_uid;
				}
			$query = "SELECT `room_uid`,`contract_uid`,`date` FROM #__jomres_room_bookings WHERE contract_uid IN (".implode(',',$cids).") ";
			$result = doSelectSql($query);
			$bookedout_rooms=array();
			$rids=array();
			foreach ($result as $r)
				{
				$bookedout_rooms[]=array("room_uid"=>$r->room_uid,"contract_uid"=>$r->contract_uid,"date"=>$r->date);
				$rids[]=(int)$r->room_uid;
				}
			$rid=array_unique($rids);
			sort($rid);
			$query = "SELECT `room_name`,`room_number`,`room_uid` FROM #__jomres_rooms WHERE room_uid IN (".implode(',',$rid).") ";
			$result = doSelectSql($query);
			$property_rooms=array();
			foreach ($result as $r)
				{
				$property_rooms[$r->room_uid]=array("room_name"=>$r->room_name,"room_number"=>$r->room_number);
				}
			// Ok, that's taken care of data collection. Now let's get our data output
			
			$rows=array();
			
			$output['PAGETITLE'] = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE','_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE',false);
			$output['HPROPERTYNAME'] = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_PROPERTYNAME','_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_PROPERTYNAME');
			$output['HROOMNAMENUMBER'] = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_ROOMNAME','_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_ROOMNAME');
			$output['HARRIVAL'] = jr_gettext('_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_ARRIVAL','_JOMRES_CUSTOMTEXT_CLEANINGSCHEDULE_ARRIVAL');

			foreach ($contracts as $contract)
				{
				$r=array();
				foreach ($bookedout_rooms as $room)
					{
					if ($room['contract_uid']==$contract['contract_uid'] && $room['date'] == $contract['arrival'])
						{
						$rm_uid=$room['room_uid'];
						$property_uid=$contract['property_uid'];
						$r['PROPERTYNAME'] = getPropertyName($property_uid);
						
						if (!isset($property_rooms[$rm_uid]['room_name']))
							$property_rooms[$rm_uid]['room_name'] = "";
						if (!isset($property_rooms[$rm_uid]['room_number']))
							$property_rooms[$rm_uid]['room_number'] = "";
						
						$r['ROOMNAMENUMBER']=$property_rooms[$rm_uid]['room_name'].' '.$property_rooms[$rm_uid]['room_number'];
						$r['ARRIVAL']=$contract['arrival'];
						$rows[]=$r;
						}
					}
				}
				
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'cleaning_schedule.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$tmpl->displayParsedTemplate();
			}
		else
			{
			echo jr_gettext('DATATABLES_SEMPTYTABLE','DATATABLES_SEMPTYTABLE',false); 
			}
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}


	}
