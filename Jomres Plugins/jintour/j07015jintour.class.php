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

// Tells listproperties that it can offer lowest pricing information for this property
class j07015jintour {
    function __construct($componentArgs)
    {
        $MiniComponents =jomres_getSingleton('mcHandler');
        if ($MiniComponents->template_touch)
        {
            $this->template_touchable=false; return;
        }
        $this->result=false;

        $curr_jintour_properties = get_showtime('jintour_properties');
        if (!is_array($curr_jintour_properties)) {
            return false;
        }
        if( in_array( (int)$componentArgs['property_uid'],$curr_jintour_properties) )
            $this->result= true;

    }


    function getRetVals()
    {
        return $this->result;
    }
}
