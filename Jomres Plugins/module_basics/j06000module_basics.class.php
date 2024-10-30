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

class j06000module_basics
{
    function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
        if ( $MiniComponents->template_touch )
        {
            $this->template_touchable = true;
            $this->shortcode_data = array(
                'task' => 'module_basics',
                'arguments_distinct' => true,
                'info' => 'Basic property information for SRPs',
                'arguments' => array(
                    array(
                        'argument' => 'property_uid',
                        'arg_info' => '',
                        'arg_example' => '1',
                    )
                ),
            );
            return;
        }

        $this->retVals = '';

        $ePointFilepath=get_showtime('ePointFilepath');

        $property_uid = (int)$_REQUEST['property_uid'];

        $mrConfig = getPropertySpecificSettings($property_uid);

		if (!isset($mrConfig['module_basics'])) {
			return;
		}

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
        $output['ACCOMMODATES']			= $accommodates;
        $output['BEDROOMS']			= $bedrooms;
        $output['BATHROOMS']			= $bathrooms;
        $output['SIZE']			= $size;


        $tmpl = new patTemplate();
        $tmpl->addRows( 'pageoutput', [ $output ] );
        $tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
        $tmpl->readTemplatesFromInput( 'module_basics.html' );
        echo $tmpl->getParsedTemplate();

    }



    // This must be included in every Event/Mini-component
    function getRetVals()
    {
        return $this->retVals;
    }
}
