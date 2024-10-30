<?php
/**
 * Core file
 *
 * @author
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2016
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Delete guest
	** Description | Delete a guest
	** Plugin | api_feature_guests
	** Scope | properties_get
	** URL | guests
 	** Method | DELETE
	** URL Parameters | guests/@id/delete/@guests_uid
	** Data Parameters |
	** Success Response |{
  "data": {
    "deleteguest": [
      {
        "message": "Deleted guest",
        "property_uid": "1",
        "guests_uid": "25"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response |
	** Sample call |jomres/api/guests/1/delete/25
	** Notes |
*/

Flight::route('DELETE /guests/@id/delete/@guests_uid(/@language)', function($property_uid, $guests_uid, $language)
	{
	validate_scope::validate('properties_set');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");

    $saveMessage = jr_gettext('_JOMRES_FRONT_DELETEGUEST_GUESTDELETED', '_JOMRES_FRONT_DELETEGUEST_GUESTDELETED', false);
    $query = "SELECT guest_uid,contract_uid FROM #__jomres_contracts WHERE guest_uid = '".(int) $guests_uid."' AND property_uid = '".(int) $property_uid."' AND cancelled != 1";
    $bookingCountThisProperty = doSelectSql($query);
    $query = "SELECT guest_uid FROM #__jomres_contracts WHERE guest_uid = '".(int) $guests_uid."' AND cancelled != 1";
    $bookingCountAllPropertys = doSelectSql($query);
    if (count($bookingCountThisProperty) == count($bookingCountAllPropertys)) {
        if (count($bookingCountThisProperty) > 0) {
             foreach ($bookingCountThisProperty as $contract_uid) {
                $query = "DELETE FROM #__jomres_room_bookings WHERE contract_uid = '".(int) $contract_uid->contract_uid."' AND property_uid = '".(int) $property_uid."'";
                if (!doInsertSql($query, '')) {
                    trigger_error('Unable to delete from room bookings table, mysql db failure', E_USER_ERROR);
                    }
                $query = "UPDATE #__jomres_contracts SET `cancelled`='1', `cancelled_timestamp`='".date('Y-m-d H:i:s')."', `cancelled_reason`='Guest deleted' WHERE contract_uid = '".(int) $contract_uid->contract_uid."' AND property_uid = '".(int) $property_uid."'";
                if (!doInsertSql($query, '')) {
                    trigger_error('Unable to update cancellations data for contract'.(int) $contract_uid->contract_uid.', mysql db failure', E_USER_ERROR);
                    }
                }
            }

        $query = "DELETE FROM #__jomres_guests WHERE guests_uid = '".(int) $guests_uid."' AND property_uid = '".(int) $property_uid."'";
        if (!doInsertSql($query, jr_gettext('_JOMRES_MR_AUDIT_DELETE_GUEST', '_JOMRES_MR_AUDIT_DELETE_GUEST', false))) {
            trigger_error(jr_gettext('_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST', '_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST', false), E_USER_ERROR);
            }
        } else {
            Flight::halt(204, jr_gettext('_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST', '_JOMRES_FRONT_DELETEGUEST_UNABLETODELETEGUEST', false));
            }

		$deleteguest = array();
		$deleteguest[] = array (
		        "message"		=> jr_gettext('_JOMRES_MR_AUDIT_DELETE_GUEST', '_JOMRES_MR_AUDIT_DELETE_GUEST', false),
				"property_uid"	=> $property_uid,
				"guests_uid"	=> $guests_uid,
			);

	$conn = null;
	Flight::json( $response_name = "deleteguest" ,$deleteguest);
	});



