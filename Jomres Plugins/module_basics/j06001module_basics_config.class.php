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

class j06001module_basics_config
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true; return;
			}
		
		$this->retVals = '';

		$ePointFilepath=get_showtime('ePointFilepath');
        $property_uid = getDefaultProperty();

        $mrConfig = getPropertySpecificSettings($property_uid);

        $module_basics = unserialize(base64_decode($mrConfig['module_basics']));

        if (isset($module_basics['accommodates']) && !empty($module_basics['accommodates'])) {
            $accommodates = $module_basics['accommodates'];
        } else {
            $accommodates = 2;
        }

        if (isset($module_basics['bedrooms']) && !empty($module_basics['bedrooms'])) {
            $bedrooms = $module_basics['bedrooms'];
        } else {
            $bedrooms = 1;
        }

        if (isset($module_basics['bathrooms']) && !empty($module_basics['bathrooms'])) {
            $bathrooms = $module_basics['bathrooms'];
        } else {
            $bathrooms = 1;
        }

        if (isset($module_basics['size']) && !empty($module_basics['size'])) {
            $size = $module_basics['size'];
        } else {
            $size = 100;
        }

        $output = array();
        $output['ACCOMMODATES_DROPDOWN']			= jomresHTML::integerSelectList( 01, 50, 1, "accommodates", '', $accommodates, "%02d" );
        $output['BEDROOMS_DROPDOWN']			= jomresHTML::integerSelectList( 01, 50, 1, "bedrooms", '', $bedrooms, "%02d" );
        $output['BATHROOMS_DROPDOWN']			= jomresHTML::integerSelectList( 01, 50, 1, "bathrooms", '', $bathrooms, "%02d" );
        $output['SIZE_DROPDOWN']			= jomresHTML::integerSelectList( 10, 500, 10, "size", '', $size, "%02d" );


        $jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
        $jrtb = $jrtbar->startTable();

        $jrtb .= $jrtbar->toolbarItem('cancel', JOMRES_SITEPAGE_URL.'&task=cpanel', '');
        $jrtb .= $jrtbar->toolbarItem('save', '', '', true, 'module_basics_save');
        $jrtb .= $jrtbar->endTable();
        $output[ 'JOMRESTOOLBAR' ] = $jrtb;

        $tmpl = new patTemplate();
        $tmpl->addRows( 'pageoutput', [ $output ] );
        $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
        $tmpl->readTemplatesFromInput( 'module_basics_config.html' );
        echo $tmpl->getParsedTemplate();

		}


		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
