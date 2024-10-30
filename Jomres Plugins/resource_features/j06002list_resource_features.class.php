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

class j06002list_resource_features
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$defaultProperty = getDefaultProperty();
		$mrConfig   = getPropertySpecificSettings($defaultProperty);
		$output 	= array();
		
		if ( $mrConfig[ 'singleRoomProperty' ] == '1' )
			return;
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images($defaultProperty, array('room_features'));
		
		$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$current_property_details->gather_data( $defaultProperty );
		$current_property_details->get_all_resource_features( $defaultProperty );
		
		$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );

		$output['JOMRESTOOLBAR'] = "";
		$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
		$jrtb   = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem( 'new', jomresURL( JOMRES_SITEPAGE_URL . "&task=edit_resource_feature" ), '' );
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR'] = $jrtb;

		$roomRowInfo = array ();
		foreach ( $current_property_details->all_room_features as $f )
			{
			$r = array ();

			$r[ 'FEATURE_IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];
			if (isset($jomres_media_centre_images->images['room_features'][ $f['room_features_uid'] ][0]['small']))
				$r[ 'FEATURE_IMAGE' ] = $jomres_media_centre_images->images['room_features'][ $f['room_features_uid'] ][0]['small'];
			
			$r[ 'ROOM_FEATURE_UID' ] = $f['room_features_uid'];

			if (!using_bootstrap())
				{
				$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
				$jrtb   = $jrtbar->startTable();
				$jrtb .= $jrtbar->toolbarItem( 'edit', jomresURL( JOMRES_SITEPAGE_URL . "&task=edit_resource_feature&featureUid=" . $f['room_features_uid'] ), '' );
				$jrtb .= $jrtbar->toolbarItem( 'copy', jomresURL( JOMRES_SITEPAGE_URL . "&task=edit_resource_feature&featureUid=" . $f['room_features_uid'] . "&clone=1" ), '' );
				$jrtb .= $jrtbar->toolbarItem( 'delete', jomresURL( JOMRES_SITEPAGE_URL . "&task=delete_resource_feature&featureUid=" . $f['room_features_uid'] ), '' );
				$jrtb .= $jrtbar->endTable();
				$r[ 'BUTTONS' ]  = $jrtb;
				}
			else
				{
				$toolbar->newToolbar();
				$toolbar->addItem( 'icon-edit', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=edit_resource_feature' . '&featureUid=' . $f['room_features_uid'] ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
				$toolbar->addSecondaryItem( 'icon-copy', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=edit_resource_feature' . '&featureUid=' . $f['room_features_uid'] . '&clone=1' ), jr_gettext( '_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE', '_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE', false ) );
				$toolbar->addSecondaryItem( 'icon-trash', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=delete_resource_feature' . '&featureUid=' . $f['room_features_uid'] ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
				$r['BUTTONS']=$toolbar->getToolbar();
				}

			$r[ 'FEATURE' ]   = $f['feature_description'];

			$roomRowInfo[] = $r;
			}

		$output[ 'PAGETITLE' ] = jr_gettext( '_JOMRES_HRESOURCE_FEATURES', '_JOMRES_HRESOURCE_FEATURES', false );
		$output[ 'HROOM_FEATURE' ] = jr_gettext( '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE', '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE', false );
		$output[ 'HIMAGE' ] = jr_gettext( '_JOMRES_A_ICON', '_JOMRES_A_ICON',false );
		
		$pageoutput = array ();
			
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_resource_features.html' );
		$tmpl->addRows( 'rows', $roomRowInfo );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
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

