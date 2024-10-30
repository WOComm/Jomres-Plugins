<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright    2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
#[AllowDynamicProperties]
class j07300webhooks_auth_method_beds24v2
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
        
        $auth_method = 'beds24v2';

        $auth_fields = array ();
        
        $authentication_methods = get_showtime('authentication_methods');
        $authentication_methods[$auth_method]  = array ("plugin" => $auth_method , "name" => jr_gettext('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'BEDS24V2_WEBHOOKS_AUTH_METHOD', false) , "fields" => $auth_fields ,"notes" => jr_gettext('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', false) );
        set_showtime('authentication_methods' , $authentication_methods);
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
