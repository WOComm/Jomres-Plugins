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

class j06002get_source_tariffs
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		$property_uid = jomresGetParam( $_REQUEST, 'property_uid', 0 ) ;
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		if ($property_uid ==0 || !in_array( $property_uid, $thisJRUser->authorisedProperties ) )
			{
			return;
			}
		
		$mrConfig        = getPropertySpecificSettings($property_uid);
		
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data($property_uid);

		$tariff_result = array();
		if ($mrConfig[ 'tariffmode' ] == "0") // Normal
			{
			$query="SELECT rates_uid, rate_title , roomclass_uid FROM #__jomres_rates WHERE property_uid = '".(int)$property_uid."' ORDER BY rate_title";
			$tariffList =doSelectSql($query);
			if (!empty($tariffList))
				{
				foreach ($tariffList as $t)
					{
					$rt_id = $t->roomclass_uid;
					$room_type = $current_property_details->all_room_types[$rt_id]['room_class_abbv'];
					$tariff_result []=array("title"=>$t->rate_title,"room_type"=>$room_type,"tariff_mode"=>$mrConfig[ 'tariffmode' ],"id"=>$t->rates_uid);
					}
				}
			}
		elseif ($mrConfig[ 'tariffmode' ] == "1") // Advanced
			{
			$query="SELECT rates_uid, rate_title , roomclass_uid FROM #__jomres_rates WHERE property_uid = '".(int)$property_uid."' ORDER BY rate_title";
			$tariffList =doSelectSql($query);
			if (!empty($tariffList))
				{
				foreach ($tariffList as $t)
					{
					$rt_id = $t->roomclass_uid;
					$room_type = $current_property_details->all_room_types[$rt_id]['room_class_abbv'];
					$tariff_result [$t->rates_uid]=array("title"=>$t->rate_title,"room_type"=>$room_type,"tariff_mode"=>$mrConfig[ 'tariffmode' ],"id"=>$t->rates_uid);
					}
				}
			}
		elseif ($mrConfig[ 'tariffmode' ] == "2" || $mrConfig[ 'tariffmode' ] == "5") //Micromanage
			{
			$query="SELECT `id`,`name` FROM #__jomcomp_tarifftypes WHERE property_uid = '".(int)$property_uid."'";
			$tariff_type_xref =doSelectSql($query);
			foreach($tariff_type_xref as $tariff)
				{
				$tariff_type_id = $tariff->id;
				$query="SELECT tariff_id,roomclass_uid FROM #__jomcomp_tarifftype_rate_xref WHERE tarifftype_id = '".(int)$tariff->id."' LIMIT 1";
				$tariffRoomClass =doSelectSql($query,2);
				$rt_id = $tariffRoomClass['roomclass_uid'];
				$query = "SELECT rates_uid FROM #__jomres_rates WHERE rates_uid = ".$tariffRoomClass['tariff_id'];
				$existingTariffs = doSelectSql($query);
				if (isset($current_property_details->all_room_types[$rt_id]['room_class_abbv']) && !empty($existingTariffs) ) {
					$tariff_result []=array(
						"title"=>$tariff->name,
						"room_type"=>$current_property_details->all_room_types[$rt_id]['room_class_abbv'],
						"tariff_mode"=>$mrConfig[ 'tariffmode' ],
						"id"=>$tariff_type_id
						);
					}
				}
			}
		else
			{
			return;
			}

		$options[ ] = jomresHTML::makeOption( '', '');
		foreach ($tariff_result as $tariff)
			{
			$options[ ] = jomresHTML::makeOption( $tariff['id'] , $tariff['title']." ".$tariff['room_type']);
			}
		
		echo jomresHTML::selectList( $options, "source_tariff_id", ' class="inputbox form-select" size="1" ', 'value', 'text', '' , false );
		
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
