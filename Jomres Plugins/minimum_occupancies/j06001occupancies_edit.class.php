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

class j06001occupancies_edit {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$output=array();
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$mrConfig=getPropertySpecificSettings();

		$room_type_id		= intval(jomresGetParam( $_REQUEST, 'room_type_id', 0 ));

		$defaultProperty=getDefaultProperty();
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($defaultProperty);
		$current_room_type_data = $current_property_details->this_property_room_classes[$room_type_id];

		$query="SELECT `id`,`type` FROM `#__jomres_customertypes` where property_uid = ".(int)$defaultProperty." AND published = '1' ORDER BY `order`";
		$gtypes =doSelectSql($query);
		$guest_types = array();
		if (!empty($gtypes))
			{
			foreach ($gtypes as $gtype)
				{
				$guest_types[$gtype->id]=$gtype->type;
				}
			}
		
		jr_import('jomres_occupancies');
		$occupancies = new jomres_occupancies();
		$occupancies->property_uid = $defaultProperty;
		if ($room_type_id > 0)
			{
			$occupancies->room_type_id=$room_type_id;
			$result=$occupancies->get();
			}
		
		if (empty($occupancies->guest_type_map))
			{
			foreach ($guest_types as $guest_type_id=>$gtype)
				{
				$occupancies->guest_type_map[$guest_type_id]=0;
				}
			}
		else
			{
			
			foreach ($guest_types as $guest_type_id=>$gtype)
				{
				if (!array_key_exists($guest_type_id,$occupancies->guest_type_map))
					{
					$occupancies->guest_type_map[$guest_type_id]=0;
					}
				}
			}

		$rows=array();
		foreach ($occupancies->guest_type_map as $key=>$map) {
			$r=array();
			if (isset($guest_types[$key])) {
			$r['GUESTTYPE_TITLE']=$guest_types[$key];
			$r['DROPDOWN']= jomresHTML::integerSelectList( 00, 1000, 1, "quantity[".$key."]", 'size="1" class="inputbox"', $map, "%02d" );
			$rows[]=$r;
			}
		}

		$output['PAGETITLE']=jr_gettext('_OCCUPANCIES_DESCRIPTION','_OCCUPANCIES_DESCRIPTION',false,false);
		$output['_OCCUPANCIES_DESCRIPTION_INFO']=jr_gettext('_OCCUPANCIES_DESCRIPTION_INFO','_OCCUPANCIES_DESCRIPTION_INFO');
		$output['_OCCUPANCIES_EDIT']=jr_gettext('_OCCUPANCIES_EDIT','_OCCUPANCIES_EDIT');
		
		
		$output['ROOM_TYPE_ID']=$room_type_id;
		$output['ROOM_TYPE']=$current_room_type_data['abbv']; 
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL."&task=occupancies_list"),'');
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'occupancies_save');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'occupancies_edit.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
