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

class j02162jintour_cancel {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		if (isset($componentArgs['contract_uid'])) {
			$contract_uid = (int)$componentArgs['contract_uid'];
			$defaultProperty = $componentArgs['property_uid'];
		} else {
			$contract_uid = jomresGetParam($_POST, 'contract_uid', 0);
			$defaultProperty = getDefaultProperty();
		}
		
		if ( isset($_POST['contract_uid']) && $contract_uid > 0 )
			{
			$query = "SELECT tour_id,spaces_adults,spaces_kids FROM #__jomres_jintour_tour_bookings WHERE contract_id =".(int)$contract_uid. " AND property_id = ".$defaultProperty;
			$existing_tours =  doSelectSql($query);
			if (!empty($existing_tours))
				{
				foreach ($existing_tours as $tour)
					{
					if ($tour->tour_id > 0)
						{
						$query = "SELECT spaces_available_adults,spaces_available_kids FROM #__jomres_jintour_tours WHERE id =".(int)$tour->tour_id. " AND property_uid = ".$defaultProperty;
						$this_tour =  doSelectSql($query,2);
						$original_spaces_available_adults = $this_tour['spaces_available_adults'];
						$original_spaces_available_kids = $this_tour['spaces_available_kids'];
						$new_spaces_available_adults = (int)$tour->spaces_adults + $original_spaces_available_adults;
						$new_spaces_available_kids =(int)$tour->spaces_kids + $original_spaces_available_kids;
						$query = "UPDATE #__jomres_jintour_tours SET spaces_available_adults=".$new_spaces_available_adults.",spaces_available_kids=".$new_spaces_available_kids." WHERE id =".(int)$tour->tour_id. " AND property_uid = ".$defaultProperty;
						doInsertSql($query,'');
						}
					}
					
				$query = "DELETE FROM #__jomres_jintour_tour_bookings WHERE contract_id =".(int)$contract_uid. " AND property_id = ".$defaultProperty;
				if (!doInsertSql($query,jr_gettext('_JINTOUR_TOUR_CANCEL_AUDIT','_JINTOUR_TOUR_CANCEL_AUDIT',FALSE)))
					trigger_error ("Unable to cancel tour booking table, mysql db failure", E_USER_ERROR);
				}
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
