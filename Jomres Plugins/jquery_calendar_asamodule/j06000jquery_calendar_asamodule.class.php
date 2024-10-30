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

class j06000jquery_calendar_asamodule {
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; 
			
			return;
		}

		$property_uid = intval( jomresGetParam( $_REQUEST, 'property_uid', 0 ) );
		
		$random_identifier = generateJomresRandomString(10);
		$output['INLINE_CALENDAR'] = '
			<script>
			var booking_form_url = "'.get_booking_url($property_uid, '', '&arrivalDate=').'";
			jomresJquery(function() {
				jomresJquery( "#'.$random_identifier.'" ).datepicker({
					"dateFormat" : "dd/mm/yy",
					"minDate": 0,
					onSelect: function(){
						var selected = jomresJquery( this ).val() ;
						window.location = booking_form_url+selected;
						}
					});
				});
			</script>
		<div id="'.$random_identifier.'"></div>
		';
		
		echo $output['INLINE_CALENDAR'];
		
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
