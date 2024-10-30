<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.21.4
 *
 * @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
     * Creates the booking's invoice
	 * 
	 */

class j03200booking_distancing
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');

		$mrConfig = getPropertySpecificSettings($tmpBookingHandler->tmpbooking['property_uid']);

		if (!isset( $mrConfig[ 'qblock_enabled' ] )) {
			$mrConfig[ 'qblock_enabled' ] = 0;
		}

		if (!isset( $mrConfig[ 'qblock_days' ] )) {
			$mrConfig[ 'qblock_days' ] = 1;
		}

		if ( $mrConfig[ 'qblock_enabled' ] == 0 ) {
			return;
		}

		$bang = explode ("," , $tmpBookingHandler->tmpbooking['dateRangeString'] );

		$first_date = $bang[0];
		$last_date = end($bang);

		$query = "SELECT `room_uid`  FROM #__jomres_room_bookings  WHERE `contract_uid` = ".(int)$componentArgs["contract_uid"] ;
		$rooms_in_booking = doSelectSql($query);

		if (empty($rooms_in_booking)) {
			return;
		}

		$rooms_to_block = array();
		foreach ($rooms_in_booking as $room ) {
			$rooms_to_block[] = $room->room_uid;
		}

		$days_to_block = (int)$mrConfig[ 'qblock_days' ] + 1;

		jr_import('jomres_generic_black_booking_insert');


		$bkg = new jomres_generic_black_booking_insert();
		$bkg->property_uid			= $tmpBookingHandler->tmpbooking['property_uid'];
		$bkg->arrival				= date( "Y/m/d" , strtotime($first_date. " -".$days_to_block." days "));
		$bkg->departure				= date( "Y/m/d" , strtotime($first_date.  " -1 day "));
		$bkg->room_uids				= $rooms_to_block;
		$bkg->special_reqs			= jr_gettext('_JOMRES_QBLOCK_BLACKBOOKING_NOTE','_JOMRES_QBLOCK_BLACKBOOKING_NOTE',FALSE).$tmpBookingHandler->tmpbooking['booking_number'] ;
		$bkg->booking_number		= $tmpBookingHandler->tmpbooking['booking_number'];

		$result = $bkg->create_black_booking();


		$bkg = new jomres_generic_black_booking_insert();
		$bkg->property_uid			= $tmpBookingHandler->tmpbooking['property_uid'];
		$bkg->arrival				= date( "Y/m/d" , strtotime($last_date. " +1 day "));
		$bkg->departure				= date( "Y/m/d" , strtotime($last_date. " +".$days_to_block." days "));
		$bkg->room_uids				= $rooms_to_block;
		$bkg->special_reqs			= jr_gettext('_JOMRES_QBLOCK_BLACKBOOKING_NOTE','_JOMRES_QBLOCK_BLACKBOOKING_NOTE',FALSE).$tmpBookingHandler->tmpbooking['booking_number'] ;
		$bkg->booking_number		= $tmpBookingHandler->tmpbooking['booking_number'];

		$bkg->create_black_booking();
	}

/**
 * Must be included in every mini-component.
 #
 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
 */

	public function getRetVals()
	{
		return null;
	}
}
