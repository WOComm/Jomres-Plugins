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
#[AllowDynamicProperties]
class j16000beds24v2_listpropertys
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
			
		$ePointFilepath = get_showtime('ePointFilepath');
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();

		$rows     = array ();

		jr_import( 'jrportal_property_functions' );
		$propertyFunctions = new jrportal_property_functions();

		$initial            = strtolower( jomresGetParam( $_REQUEST, 'initial', "" ) );
		$query              = "SELECT propertys_uid,property_street,property_town,property_region,property_country,property_postcode FROM #__jomres_propertys WHERE property_name LIKE '" . $initial . "%'";
		$result             = doSelectSql( $query );
		$jomresPropertyList = array ();
		foreach ( $result as $r )
			{
			if ( is_numeric( $r->property_region ) )
				{
				$jomres_regions  = jomres_singleton_abstract::getInstance( 'jomres_regions' );
				$property_region = jr_gettext( "_JOMRES_CUSTOMTEXT_REGIONS_" . $r->property_region, $jomres_regions->regions[ $r->property_region ][ 'regionname' ], false, false );
				}
			else
				$property_region = jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_REGION' . $r->property_region, $r->property_region, false, false );
			$jomresPropertyList[ $r->propertys_uid ] = array ( "id" => $r->propertys_uid, "property_street" => $r->property_street, "property_town" => $r->property_town, "property_region" => $property_region, "property_country" => $r->property_country, "property_postcode" => $r->property_postcode );
			}

		$output[ 'PAGETITLE' ]          = jr_gettext( "_JRPORTAL_CPANEL_LISTPROPERTIES", '_JRPORTAL_CPANEL_LISTPROPERTIES' );
		$output[ 'HPROPERTYNAME' ]      = jr_gettext( "_JRPORTAL_PROPERTIES_PROPERTYNAME", '_JRPORTAL_PROPERTIES_PROPERTYNAME' );
		$output[ 'HPROPERTYADDRESS' ]   = jr_gettext( "_JRPORTAL_PROPERTIES_PROPERTYADDRESS", '_JRPORTAL_PROPERTIES_PROPERTYADDRESS' );
		$output[ '_BEDS24_ASSIGN_MANAGER' ] = jr_gettext( "BEDS24_ASSIGN_MANAGER", 'BEDS24_ASSIGN_MANAGER' );
		$output[ 'BEDS24_ASSIGN_MANAGER_DESC' ] = jr_gettext( "BEDS24_ASSIGN_MANAGER_DESC", 'BEDS24_ASSIGN_MANAGER_DESC' );
		
		$output[ 'LEGEND' ]             = jr_gettext( "_JRPORTAL_PROPERTIES_LEGEND", '_JRPORTAL_PROPERTIES_LEGEND' );
		$counter                        = 0;
		
		$beds24v2_properties = jomres_singleton_abstract::getInstance('beds24v2_properties');
		$all_linked_properties = $beds24v2_properties->administrator_get_all_linked_properties();

		
		$query         = "SELECT userid FROM #__jomres_managers";
		$managerList   = doSelectSql( $query );
		if ( empty( $managerList) ) {
			echo "Error, no managers created yet";
			return;
		}
		
		$managersArray = array ();
		foreach ( $managerList as $m )
			{
			$managersArray[ $m->userid ] = jomres_cmsspecific_getUsername($m->userid);
			}
		
		$options  = array();
		foreach ( $managersArray as $key=>$val )
			{
			$options[ ] = jomresHTML::makeOption( $key, $val );
			}
		
		foreach ( $jomresPropertyList as $k => $p ) {
			$r = array ();
			$p_id = $p[ 'id' ];
			if (array_key_exists($p_id,$all_linked_properties) ) {
				$r[ 'PROPERTYNAME' ]    = getPropertyName( $p_id );
				$r[ 'PROPERTYADDRESS' ] = jomres_decode( $p[ 'property_street' ] ) . ', ' . jomres_decode( $p[ 'property_town' ] ) . ', ' . jomres_decode( $p[ 'property_region' ] ) . ', ' . jomres_decode( $p[ 'property_country' ] ) . ', ' . $p[ 'property_postcode' ];

				$r[ 'MANAGER_DROPDOWN' ] = jomresHTML::selectList( $options, "properties[".$p_id."]", ' size="1"', 'value', 'text', $all_linked_properties [$p_id]->manager_id, false );

				$rows[ ]               = $r;
			}

		}

		$jrtbar = jomres_singleton_abstract::getInstance( 'jomres_toolbar' );
		$jrtb   = $jrtbar->startTable();
		$image  = $jrtbar->makeImageValid( JOMRES_IMAGES_RELPATH.'jomresimages/small/Save.png' );
		$link   = JOMRES_SITEPAGE_URL_ADMIN;
		$jrtb .= $jrtbar->toolbarItem( 'cancel', JOMRES_SITEPAGE_URL_ADMIN, jr_gettext( "_JRPORTAL_CANCEL", '_JRPORTAL_CANCEL' ) );
		$jrtb .= $jrtbar->customToolbarItem( 'beds24_save_managers', $link, $text = "Save", $submitOnClick = true, $submitTask = "beds24v2_save_managers", $image );
		
		$jrtb .= $jrtbar->spacer();
		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;

		$output[ 'JOMRES_SITEPAGE_URL_ADMIN' ] = JOMRES_SITEPAGE_URL_ADMIN;
		$pageoutput[ ]                         = $output;
		$tmpl                                  = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'admin_list_propertys.html' );
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