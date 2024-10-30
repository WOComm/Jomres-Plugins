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

class j07300webhooks_auth_method_mailchimp
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }
        
        $auth_method = 'mailchimp';

        $auth_fields = array ();
        
        $auth_fields['mailchimp_apikey'] = array (
            "default" => "",
            "setting_title" => jr_gettext('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY','WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY'),
            "setting_description" => "",
            "format" => "input"
            ) ;
        
        $auth_fields['mailchimp_listid'] = array (
            "default" => "",
            "setting_title" => jr_gettext('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID','WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID'),
            "setting_description" => "",
            "format" => "input"
            ) ;
        
        $authentication_methods = get_showtime('authentication_methods');
        $authentication_methods[$auth_method]  = array ("plugin" => $auth_method , "name" => jr_gettext('WEBHOOKS_AUTH_METHOD_NONE', 'WEBHOOKS_AUTH_METHOD_NONE', false) , "fields" => $auth_fields , "notes" => jr_gettext('WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', false) );
        set_showtime('authentication_methods' , $authentication_methods);
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
