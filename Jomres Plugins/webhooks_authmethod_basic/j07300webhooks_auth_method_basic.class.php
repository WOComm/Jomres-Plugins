<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.21
 *
 * @copyright    2005-2016 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j07300webhooks_auth_method_basic
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
        
        $auth_method = 'basic';

        $auth_fields = array ();
        
        $auth_fields['basic_username'] = array (
            "default" => "",
            "setting_title" => jr_gettext('WEBHOOKS_AUTH_METHOD_BASIC_USERNAME','WEBHOOKS_AUTH_METHOD_BASIC_USERNAME'),
            "setting_description" => "",
            "format" => "input"
            ) ;
        
        $auth_fields['basic_password'] = array (
            "default" => "",
            "setting_title" => jr_gettext('WEBHOOKS_AUTH_METHOD_BASIC_PASSWORD','WEBHOOKS_AUTH_METHOD_BASIC_PASSWORD'),
            "setting_description" => "",
            "format" => "password"
            ) ;
        
        $authentication_methods = get_showtime('authentication_methods');
        $authentication_methods[$auth_method]  = array ("plugin" => $auth_method , "name" => jr_gettext('WEBHOOKS_AUTH_METHOD_BASIC', 'WEBHOOKS_AUTH_METHOD_BASIC', false) , "fields" => $auth_fields  , "notes" => jr_gettext('WEBHOOKS_AUTH_METHOD_BASIC_NOTES','WEBHOOKS_AUTH_METHOD_BASIC_NOTES' , false) );
        set_showtime('authentication_methods' , $authentication_methods);
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
