<?php
/**
 * Jomres CMS Agnostic Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 10.7
 * @package Jomres
 * @copyright	2005-2023 Woollyinwales IT
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00005property_faqs
{
    function __construct()
    {
        $MiniComponents = jomres_getSingleton('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }

        if (file_exists(get_showtime('ePointFilepath') . 'language' . JRDS . get_showtime('lang') . '.php')) {
            require_once(get_showtime('ePointFilepath') . 'language' . JRDS . get_showtime('lang') . '.php');
        } else {
            if (file_exists(get_showtime('ePointFilepath') . 'language' . JRDS . 'en-GB.php')) {
                require_once(get_showtime('ePointFilepath') . 'language' . JRDS . 'en-GB.php');
            }
        }

        $thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
        $jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');
        if ($thisJRUser->accesslevel >= 50) {
            $jomres_menu->add_item(80, jr_gettext('PROPERTY_FAQS_TITLE', 'PROPERTY_FAQS_TITLE', false), 'property_faqs_config', 'fa-sitemap');
        }
    }

	function getRetVals(){
		return null;
		}
	}
