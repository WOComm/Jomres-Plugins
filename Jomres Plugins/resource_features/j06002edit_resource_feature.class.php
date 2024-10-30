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

class j06002edit_resource_feature
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true;

			return;
			}
			
		$ePointFilepath  = get_showtime('ePointFilepath');
		$featureUid      = jomresGetParam( $_REQUEST, 'featureUid', 0 );
		$clone           = intval( jomresGetParam( $_REQUEST, 'clone', false ) );
		$defaultProperty = getDefaultProperty();
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images($defaultProperty, array('room_features'));
		$output[ 'FEATURE_IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];

		if ( $featureUid != "" )
			{
			$query = "SELECT room_features_uid,feature_description FROM #__jomres_room_features WHERE room_features_uid = " . (int) $featureUid . " AND property_uid = " . (int) $defaultProperty . " ";
			$roomFeatureList = doSelectSql( $query );
			foreach ( $roomFeatureList as $roomFeature )
				{
				$output[ 'FEATURE_DESCRIPTION' ] = stripslashes( $roomFeature->feature_description );
				}
			

			
			if (isset($jomres_media_centre_images->images['room_features'][$featureUid][0]['small']))
				$output[ 'FEATURE_IMAGE' ] = $jomres_media_centre_images->images['room_features'][$featureUid][0]['small'];
			}

		if ( $clone )
			$featureUid = false;

		$output[ 'PROPERTYDROPDOWN' ] = "";
		$output[ 'ROOMFEATUREUID' ]   = $featureUid;
		
		if ( $clone ) 
			$output[ 'ROOMFEATUREUID' ] = "";

		$output[ 'HFEATUREDESCRIPTION' ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOMFEATURES_HEADER_INPUT', '_JOMRES_COM_MR_VRCT_ROOMFEATURES_HEADER_INPUT' ,false , false );
		$output[ 'HIMAGE' ] = jr_gettext( '_JOMRES_A_ICON', '_JOMRES_A_ICON',false );

		$cancelText = jr_gettext( '_JOMRES_COM_A_CANCEL', '_JOMRES_COM_A_CANCEL', false );
		$deleteText = jr_gettext( '_JOMRES_COM_MR_ROOM_DELETE', '_JOMRES_COM_MR_ROOM_DELETE', false );
		$saveText   = jr_gettext( '_JOMRES_COM_MR_SAVE', '_JOMRES_COM_MR_SAVE', false );

		$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
		$jrtb   = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem( 'cancel', jomresURL( JOMRES_SITEPAGE_URL . "&task=list_resource_features" ), $cancelText );
		$jrtb .= $jrtbar->toolbarItem( 'save', '', $saveText, true, 'save_resource_feature' );
		//if ( !$clone && $featureUid ) 
			//$jrtb .= $jrtbar->toolbarItem( 'delete', jomresURL( JOMRES_SITEPAGE_URL . "&task=deleteRoomFeature" . "&roomFeatureUid=" . $featureUid . "" ), $deleteText );
		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;

		$output[ 'PAGETITLE' ] = jr_gettext( '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE', '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE' );

		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_resource_feature.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output = array ();

		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_ROOMFEATURES_HEADER_INPUT', '_JOMRES_COM_MR_VRCT_ROOMFEATURES_HEADER_INPUT' );
		$output[ ] = jr_gettext( '_JOMRES_COM_A_CANCEL', '_JOMRES_COM_A_CANCEL' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_ROOM_DELETE', '_JOMRES_COM_MR_ROOM_DELETE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_SAVE', '_JOMRES_COM_MR_SAVE' );
		$output[ ] = jr_gettext( '_JOMRES_COM_MR_VRCT_TAB_ROOMFEATURES', '_JOMRES_COM_MR_VRCT_TAB_ROOMFEATURES' );

		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
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
