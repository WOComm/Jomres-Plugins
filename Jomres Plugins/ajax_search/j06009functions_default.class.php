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

class j06009functions_default
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		jr_import('jomSearch');
		
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		if (isset($this->ret_vals))
			return array("SEARCHFORM"=>$this->ret_vals);
		else
			return true;
		}
	}

function prep_ajax_search_filter_cache()
	{
	$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
	if (!isset($tmpBookingHandler->tmpsearch_data['ajax_search_plugin_filter']))
		$tmpBookingHandler->tmpsearch_data['ajax_search_plugin_filter'] = array();
	
	}

function add_value_to_filter($id,$value)
	{
	$tmpBookingHandler =jomres_getSingleton('jomres_temp_booking_handler');
	$tmpBookingHandler->tmpsearch_data['ajax_search_plugin_filter'][$id]=$value;
	}

function remove_value_from_filter($id)
	{
	unset($tmpBookingHandler->tmpsearch_data['ajax_search_plugin_filter'][$id]);
	}
