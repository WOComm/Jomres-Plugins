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

class j06002delete_resource_feature
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}

		$roomFeatureUid  = intval( jomresGetParam( $_REQUEST, 'featureUid', '' ) );
		$defaultProperty = getDefaultProperty();
		//Lets delete this room feature
		$saveMessage = jr_gettext( '_JOMRES_COM_MR_ROOMFEATURE_DELETED', '_JOMRES_COM_MR_ROOMFEATURE_DELETED', false );
		// First we need to check that the feature isn't recorded against any rooms. If it is, we can't move forward
		$query            = "SELECT room_features_uid,propertys_uid FROM #__jomres_rooms WHERE propertys_uid = '" . (int) $defaultProperty . "'";
		$roomFeaturesList = doSelectSql( $query );
		$safeToDelete     = true;
		foreach ( $roomFeaturesList as $roomFeature )
			{
			if ($roomFeature->room_features_uid !='')
				{
				$roomFeaturesArray = explode( ",", ( $roomFeature->room_features_uid ) );
				if ( in_array( $roomFeatureUid, $roomFeaturesArray ) ) 
					$safeToDelete = false;
				}
			}
		if ( !$safeToDelete )
			{
			echo _JOMRES_COM_MR_ROOMFEATURE_UNABLETODELETE;

			return;
			}
		else
			{
			$query = "DELETE FROM #__jomres_room_features  WHERE room_features_uid='" . (int) $roomFeatureUid . "' AND property_uid='" . (int) $defaultProperty . "'";
			if ( doInsertSql( $query, jr_gettext( '_JOMRES_MR_AUDIT_DELETE_ROOM_FEATURE', '_JOMRES_MR_AUDIT_DELETE_ROOM_FEATURE', false ) ) ) 
				jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=list_resource_features" ), "" );
			trigger_error( "Unable to delete from room features table, mysql db failure", E_USER_ERROR );
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
