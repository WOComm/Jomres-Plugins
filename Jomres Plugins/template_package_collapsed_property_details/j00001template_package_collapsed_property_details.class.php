<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.29
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j00001template_package_collapsed_property_details
{
    public function __construct()
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }
		
		$this_plugin = "template_package_collapsed_property_details";
		$ePointFilepath=get_showtime('ePointFilepath');
		$eLiveSite=get_showtime('eLiveSite');

		$template_path = str_replace ( JOMRESPATH_BASE , "" , $ePointFilepath );

		// Add information about this/these template files to the template packages singleton array.
		$template_packages = get_showtime('template_packages');
		if (is_null($template_packages))
			$template_packages = array();
			
		$template_packages[$this_plugin][] = array (
			"template_name"=>"composite_property_details_notabs.html",
			"title"=>"Property Details collapsed panels",
			"description"=>"",
			"screenshot"=>"",
			"path"=>$template_path);

		set_showtime('template_packages' , $template_packages );
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
