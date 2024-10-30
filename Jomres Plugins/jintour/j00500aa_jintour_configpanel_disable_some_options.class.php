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

class j00500aa_jintour_configpanel_disable_some_options 
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		if (get_showtime('is_jintour_property'))
			{
			unset($MiniComponents->registeredClasses['00501']['avlcal']);
			unset($MiniComponents->registeredClasses['00501']['bookings1']);
			unset($MiniComponents->registeredClasses['00501']['editingmode']);
			unset($MiniComponents->registeredClasses['00501']['gallery']);
			//unset($MiniComponents->registeredClasses['00501']['gateways']);
			//unset($MiniComponents->registeredClasses['00501']['odds']);
			unset($MiniComponents->registeredClasses['00501']['propertydetailsoptions']);
			unset($MiniComponents->registeredClasses['00501']['sms_clickatell']);
			unset($MiniComponents->registeredClasses['00501']['srps']);
			unset($MiniComponents->registeredClasses['00501']['suppliments']);
			//unset($MiniComponents->registeredClasses['00501']['tariffs']);
			unset($MiniComponents->registeredClasses['00501']['tariff_editing_mode']);
			unset($MiniComponents->registeredClasses['00501']['xlastminute']);
			unset($MiniComponents->registeredClasses['00501']['xtariffsenhanced']);
			unset($MiniComponents->registeredClasses['00501']['xwiseprice']);
			}
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
		return null;
		}
	}
