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

class j16000editRfeature
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
		$ptype_xref = 0;
		$ePointFilepath 	= get_showtime('ePointFilepath');
		$roomFeatureUid 	= jomresGetParam( $_REQUEST, 'roomFeatureUid', 0 );
		$clone              = intval( jomresGetParam( $_REQUEST, 'clone', false ) );

		if ( $roomFeatureUid > 0 )
			{
			$query        = "SELECT `feature_description`,`ptype_xref`,`image` FROM #__jomres_room_features WHERE `room_features_uid`  = " . (int) $roomFeatureUid . " AND property_uid = 0 ";
			$rFeatureList = doSelectSql( $query );
			foreach ( $rFeatureList as $rFeature )
				{
				$output[ 'FEATURE_DESCRIPTION' ] = stripslashes( $rFeature->feature_description );
				$image = $rFeature->image;
				
				if ($rFeature->ptype_xref)
					$ptype_xref                      = unserialize($rFeature->ptype_xref);
				}
			}
		if ( $clone ) $roomFeatureUid = 0;

		$output[ 'HPROPERTY_TYPE' ] = jr_gettext( '_JOMRES_FRONT_PTYPE', '_JOMRES_FRONT_PTYPE',false );
		
		$query     = "SELECT id, ptype FROM #__jomres_ptypes";
		$ptypeList = doSelectSql( $query );
		
		$all_ptype_rows = array ();
		if ( count( $ptypeList ) > 0 )
			{
			foreach ( $ptypeList as $ptype )
				{
				$row                        = array ();
				$row[ 'propertytype_id' ]   = $ptype->id;
				$row[ 'propertytype_desc' ] = $ptype->ptype;
				$row[ 'checked' ]           = "";
				if (!is_numeric($ptype_xref))
					{
					if ( in_array( $ptype->id, $ptype_xref ) ) 
						$row[ 'checked' ] = " checked ";
					}
				else
					{
					if ( $ptype->id == $ptype_xref ) 
						$row[ 'checked' ] = " checked ";
					}
				$all_ptype_rows[ ] = $row;
				}
			}

		//gather images
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
		$jomres_media_centre_images->get_site_images('rmfeatures');
		
		$rows = array();
		
		foreach ($jomres_media_centre_images->site_images['rmfeatures'] as $i) 
			{
			$r = array();

			$r[ 'IMAGE_FILENAME' ] = substr($i['large'], strrpos($i['large'], '/') + 1);
			$r[ 'IMAGE_SRC' ]  = $i['large'];
			$r[ 'ISCHECKED' ] = "";
			
			if ( isset( $image ) && $r[ 'IMAGE_FILENAME' ] == $image ) 
				$r[ 'ISCHECKED' ] = "checked";

			$rows[] = $r;
			}

		$output[ 'ROOMFEATUREUID' ]  = $roomFeatureUid;

		$output[ 'HLINKTEXT' ]                                = jr_gettext( '_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK', '_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_LINK',false );
		$output[ 'HLINKTEXTCLONE' ]                           = jr_gettext( '_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE', '_JOMRES_COM_MR_LISTTARIFF_LINKTEXTCLONE',false );
		$output[ 'HFEATUREDESCRIPTION' ]                      = jr_gettext( '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE', '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE',false );
		$output[ 'PAGETITLE' ]                                = jr_gettext( '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE', '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE',false );
		$output[ 'BACKLINK' ]                                 = '<a href="javascript:submitbutton(\'cpanel\')">' . jr_gettext( '_JOMRES_COM_MR_BACK', '_JOMRES_COM_MR_BACK',false ) . '</a>';
		$output[ '_JOMRES_PROPERTY_TYPE_ASSIGNMENT' ] 		= jr_gettext( '_JOMRES_PROPERTY_TYPE_ASSIGNMENT', '_JOMRES_PROPERTY_TYPE_ASSIGNMENT',false );
		$output[ 'HIMAGE' ]                    				= jr_gettext( '_JOMRES_A_ICON', '_JOMRES_A_ICON',false );

		$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
		$jrtb   = $jrtbar->startTable();
		$image  = $jrtbar->makeImageValid( JOMRES_IMAGES_RELPATH.'jomresimages/small/Save.png' );
		$link   = JOMRES_SITEPAGE_URL_ADMIN;
		
		$jrtb .= $jrtbar->toolbarItem( 'cancel', JOMRES_SITEPAGE_URL_ADMIN . "&task=listRfeatures", '' );
		$jrtb .= $jrtbar->customToolbarItem( 'saveRfeature', $link, jr_gettext( '_JOMRES_COM_MR_SAVE','_JOMRES_COM_MR_SAVE',false ), $submitOnClick = true, $submitTask = "saveRfeature", $image );
		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;


		$pageoutput    = array ();
		$pageoutput[ ] = $output;
		$tmpl          = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_rfeature.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'all_ptype_rows', $all_ptype_rows );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}