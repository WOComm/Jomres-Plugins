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
class j16000beds24v2_rebuild_keys
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

		
		
		$rebuild = jomresGetParam( $_REQUEST, 'rebuild', 1 );
		if ($rebuild==1 ){
			$jomres_users = jomres_singleton_abstract::getInstance('jomres_users');
			$jomres_users->get_users();
			if (!empty($jomres_users->users)) {
				foreach ($jomres_users->users as $user ) {
					$cms_user_id = $user['cms_user_id'] ;
					if ( $jomres_users->get_user( $cms_user_id ) ) {
						$jomres_users->generate_user_api_key();
					}
				}
			}
		}
		
		touch(JOMRES_TEMP_ABSPATH."beds24_manager_rebuild_key_check.txt");
		
		
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=cpanel" ), jr_gettext( 'BEDS24V2_ERROR_KEYS_DONE', 'BEDS24V2_ERROR_KEYS_DONE' ) );
		
		// JOMRES_TEMP_ABSPATH
		
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
