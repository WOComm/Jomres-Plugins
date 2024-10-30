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

class j16000listRfeatures
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
		
		$ePointFilepath 	  = get_showtime('ePointFilepath');
		$editIcon             = '<img src="' . JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" />';
		
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->get_all_resource_features( 0 );
		
		$rows                 = array ();

		$output[ 'INDEX' ]          = "index.php";
		$output[ 'PAGETITLE' ]      = jr_gettext( '_JOMRES_HRESOURCE_FEATURES', '_JOMRES_HRESOURCE_FEATURES',false );
		$output[ 'HLINKTEXT' ]      = jr_gettext( '_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV', '_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_ABBV',false );
		$output[ 'HLINKTEXTCLONE' ] = jr_gettext( '_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC', '_JOMRES_COM_MR_VRCT_PROPERTYFEATURES_HEADER_DESC',false );
		$output[ 'HRFEATURETITLE' ] = jr_gettext( '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE', '_JOMRES_COM_MR_EB_HRESOURCE_FEATURE',false );
		$output[ 'HPROPERTY_TYPES' ]= jr_gettext( '_JOMRES_FRONT_PTYPE', '_JOMRES_FRONT_PTYPE',false );
		$output[ 'BACKLINK' ]       = '<a href="javascript:submitbutton(\'cpanel\')">' . jr_gettext( '_JOMRES_COM_MR_BACK', '_JOMRES_COM_MR_BACK',false ) . '</a>';
		$output[ 'HIMAGE' ] 		= jr_gettext( '_JOMRES_A_ICON', '_JOMRES_A_ICON',false );

		$selected_ptype_rows='';
		foreach ( $basic_property_details->all_room_features as $f )
			{
			if ( count($f['ptype_xref']) > 0 )
				{
				$selected_ptype_rows = "";

				foreach ( $f['ptype_xref'] as $ptype )
					{
					$selected_ptype_rows .= $basic_property_details->all_property_type_titles[ $ptype ] . ', ';
					}
				
				$selected_ptype_rows = rtrim($selected_ptype_rows, ', ');
				}

			$r[ 'CHECKBOX' ]            = '<input type="checkbox" id="cb' . count( $rows ) . '" name="idarray[]" value="' . $f['room_features_uid'] . '" onClick="jomres_isChecked(this.checked);">';
			
			$r[ 'RFEATURETITLE' ]       = $f['feature_description'];
			
			$r[ 'PROPERTY_TYPES' ] = $selected_ptype_rows;
			
			$r[ 'IMAGE' ]          = JOMRES_IMAGELOCATION_RELPATH.'rmfeatures/' . $f['image'];
			
			if (!using_bootstrap())
				{
				$r[ 'LINKTEXT' ] = '<a href="' . JOMRES_SITEPAGE_URL_ADMIN . '&task=editRfeature&roomFeatureUid=' . $f['room_features_uid'] . '">' . $editIcon . '</a>';
				}
			else
				{
				$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
				$toolbar->newToolbar();
				$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=editRfeature&roomFeatureUid=' . $f['room_features_uid'] ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
				
				$r['LINKTEXT'] = $toolbar->getToolbar();
				}
			
			$rows[ ]      = $r;
			}
		$output[ 'COUNTER' ]            = count( $rows );
		$output[ 'TOTALINLISTPLUSONE' ] = count( $rows ) + 1;

		$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
		$jrtb   = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem( 'cancel', JOMRES_SITEPAGE_URL_ADMIN, '' );
		$image  = $jrtbar->makeImageValid( JOMRES_IMAGES_RELPATH.'jomresimages/small/AddItem.png' );
		$link   = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->customToolbarItem( 'editRfeature', $link, jr_gettext( '_JOMRES_COM_MR_NEWTARIFF', '_JOMRES_COM_MR_NEWTARIFF',false ), $submitOnClick = true, $submitTask = "editRfeature", $image );
		
		$jrtb .= $jrtbar->spacer();
		$image = $jrtbar->makeImageValid( JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png' );
		$link  = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->customToolbarItem( 'deleteRfeature', $link, jr_gettext( '_JOMRES_COM_MR_ROOM_DELETE', '_JOMRES_COM_MR_ROOM_DELETE',false), $submitOnClick = true, $submitTask = "deleteRfeature", $image );
		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;

		$pageoutput[ ] = $output;

		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_rfeatures.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}