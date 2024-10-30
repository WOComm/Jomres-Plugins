<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.5.3
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	


class j08200parse_booking_number
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
	 
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$jms_message_message_body = get_showtime('jms_message_message_body');

		if (is_null($jms_message_message_body) || $jms_message_message_body == '' ) {
			return;
		}

		$possible_booking_number = 0;
		preg_match_all('!\d+!', $jms_message_message_body, $match);
		foreach ($match[0] as $value) {
			if ($value > 9999999) {
				$possible_booking_number = $value;
			}
		}


		if ( $possible_booking_number > 0 ) {
				$user_id = Flight::get("user_id");
				$query = "SELECT `contract_uid` FROM #__jomres_contracts WHERE `tag` = '".(int)$possible_booking_number."' LIMIT 1";
				$contract_uid = doSelectSql($query,1);

				if (empty($contract_uid) || $contract_uid == 0 ) {
					return;
				}

				$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
				$thisJRUser->init_user($user_id);

				if ($thisJRUser->userIsManager) {
					$url = JOMRES_SITEPAGE_URL."&task=edit_booking&contract_uid=".$contract_uid;
				} else {
					$url = JOMRES_SITEPAGE_URL.'&task=muviewbooking&contract_uid='.$contract_uid;
				}

				$link = '<a href="'.$url.'" target="_blank">'.$possible_booking_number.'</a>';

				$jms_message_message_body = str_replace($possible_booking_number, $link ,$jms_message_message_body);
		}

		set_showtime('jms_message_message_body' , $jms_message_message_body );
	}

	public function getRetVals()
	{
		return null;
	}
}
