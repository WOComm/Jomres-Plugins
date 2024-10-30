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

class j06002save_resource_feature
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

		$roomFeatureUid      = intval( jomresGetParam( $_POST, 'roomFeatureUid', 0 ) );
		$feature_description = getEscaped( jomresGetParam( $_POST, 'feature_description', '' ) );
		$defaultProperty     = getDefaultProperty();

		if ( $roomFeatureUid == 0 )
			{
			$saveMessage      = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOMFEATURES_SAVE_INSERT', '_JOMRES_COM_MR_VRCT_ROOMFEATURES_SAVE_INSERT', false );
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( $saveMessage );
			$query = "INSERT INTO #__jomres_room_features (`feature_description`,`property_uid` )VALUES ('$feature_description','" . (int) $defaultProperty . "')";
			if ( doInsertSql( $query, jr_gettext( '_JOMRES_MR_AUDIT_INSERT_ROOM_FEATURE', '_JOMRES_MR_AUDIT_INSERT_ROOM_FEATURE', false ) ) ) 
				jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=list_resource_features" ), "" );
			trigger_error( "Unable to insert into room features table, mysql db failure", E_USER_ERROR );
			}
		else
			{
			$saveMessage      = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOMFEATURES_SAVE_UPDATE', '_JOMRES_COM_MR_VRCT_ROOMFEATURES_SAVE_UPDATE', false );
			$jomres_messaging = jomres_singleton_abstract::getInstance( 'jomres_messages' );
			$jomres_messaging->set_message( $saveMessage );
			$query = "UPDATE #__jomres_room_features SET `feature_description`='$feature_description' WHERE room_features_uid='" . (int) $roomFeatureUid . "' AND property_uid='" . (int) $defaultProperty . "'";
			if ( doInsertSql( $query, jr_gettext( '_JOMRES_MR_AUDIT_UPDATE_ROOM_FEATURE', '_JOMRES_MR_AUDIT_UPDATE_ROOM_FEATURE', false ) ) ) 
				jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=list_resource_features" ), "" );
			trigger_error( "Unable to update room features table, mysql db failure", E_USER_ERROR );
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
