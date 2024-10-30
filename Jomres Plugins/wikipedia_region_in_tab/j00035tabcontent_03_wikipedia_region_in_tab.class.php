<?php
/**
 * Core file
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
* @package Jomres
* @copyright	2005-2010 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00035tabcontent_03_wikipedia_region_in_tab
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid=(int)$componentArgs['property_uid'];  
		$mrConfig=getPropertySpecificSettings($property_uid);

		$shortcode = strstr(  get_showtime("lang") , "-" , true );
		
		$output = "";
		if (isset($componentArgs['currrent_output']))
			$output = $componentArgs['currrent_output'];  
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($property_uid);

		$url=$shortcode.'.m.wikipedia.org/wiki/'.$current_property_details->property_region;

		
		$content = '
		<iframe id="ifm" src="https://'.$url.'"  frameborder="0"  height="1000" width="100%"></iframe>';
		
		$anchor = jomres_generate_tab_anchor($current_property_details->property_region);
		$tab = array(
			"TAB_ANCHOR"=>$anchor,
			"TAB_TITLE"=> jr_gettext('WIKIPEDIA_REGION_IN_TAB_ABOUT','WIKIPEDIA_REGION_IN_TAB_ABOUT' , false) . " ".$current_property_details->property_region,
			"TAB_CONTENT"=>$content
			);
		$this->retVals = $tab;
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}

	}
