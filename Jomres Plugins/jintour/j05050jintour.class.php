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

class j05050jintour {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$bkg = $componentArgs['bkg'];
		$field = $componentArgs['field'];
		$value = $componentArgs['value'];
		
		$last_field = jomresGetParam( $_REQUEST, 'field', '' );
		$update_on_these_fields = array();
		$update_on_these_fields[]= "arrivalDate";
		$update_on_these_fields[]= "arrival_period";
		$update_on_these_fields[]= "departureDate";
		$update_on_these_fields[]= "departure_period";
		$update_on_these_fields[]= "undefined";
		
		if (in_array($last_field,$update_on_these_fields))
			{
			$tourslist = jintour_build_available_tours_list($bkg);
			if ($tourslist)
				{
				//$bkg->reset_choices_for_plugin("jintour");
				$retVal="".$tourslist."";
				// Now to clean up the retVal before it's passed back to jquery in the booking form.
				$retVal=str_replace('"','\"',$retVal);
				$retVal=str_replace("'","\'",$retVal);
				//$retVal="fred";
				}
			else
				$retVal="<td colspan=\"5\">&nbsp;</td>";

			echo 'populateDiv("jintour_third_party_extra_div",\''.$retVal.'\');';
			}
		}

	function getRetVals()
		{
		return null;
		}
	}
