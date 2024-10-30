<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.9.3
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
#[AllowDynamicProperties]
//This is a month view chart of all paid bookings, excludes cancelled/pending/unpaid ones)
class j13100beds24v2_key_check_warning_generator
{
    public function __construct($componentArgs)
    {
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }


        if (!file_exists(JOMRES_TEMP_ABSPATH."beds24_manager_rebuild_key_check.txt")) {
            $query = "CREATE TABLE IF NOT EXISTS `#__jomres_beds24_property_uid_xref` (
                `id` int(10) NOT NULL auto_increment,
                `property_uid` int(10),
                `beds24_property_uid` int(10),
                `manager_id` int(10),
              PRIMARY KEY  (id)
            )";
            doInsertSql($query,"");

			$query	= "SELECT `id` , `property_uid` , `beds24_property_uid` , `manager_id` FROM #__jomres_beds24_property_uid_xref ";
			$properties = doSelectSql( $query );

			if (empty($properties)) {
				$administrator_warnings = get_showtime('plugin_warnings');

				$output = array();
				$pageoutput = array();
				$ePointFilepath=get_showtime('ePointFilepath');
				
				$output['BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED'] = jr_gettext("BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED" , "BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED" , false );
				$output['BEDS24V2_ERROR_KEYS_REBUILD'] = jr_gettext("BEDS24V2_ERROR_KEYS_REBUILD" , "BEDS24V2_ERROR_KEYS_REBUILD" , false );
				$output['BEDS24V2_ERROR_KEYS_DISMISS'] = jr_gettext("BEDS24V2_ERROR_KEYS_DISMISS" , "BEDS24V2_ERROR_KEYS_DISMISS" , false );
				
				$pageoutput[ ] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.'bootstrap' );
				$tmpl->readTemplatesFromInput('beds24v2_key_check_warning.html');
				$tmpl->addRows('pageoutput', $pageoutput);
				$message[] = $tmpl->getParsedTemplate();

				set_showtime('plugin_warnings', $message);
			}
		}

    }

    public function getRetVals()
    {
        return null;
    }
}
