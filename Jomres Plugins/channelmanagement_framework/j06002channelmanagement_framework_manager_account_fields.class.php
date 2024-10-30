<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.8.29
 *
* @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j06002channelmanagement_framework_manager_account_fields
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

		$ePointFilepath = get_showtime('ePointFilepath');
		
		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$MiniComponents->triggerEvent('21001');
		
		$thin_channels = get_showtime("thin_channels");
		
		jr_import('channelmanagement_framework_user_accounts');
		$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
		$accounts = $channelmanagement_framework_user_accounts->get_accounts_for_user ( $JRUser->id );

		$MiniComponents->triggerEvent('21310');
		$channel_form_fields = get_showtime('channel_administrator_form_fields');

		$channel_input_sets		= array();
		$template_root			= $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
		$template_directory		= $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
		
		foreach ($thin_channels as $channel ) {
			$rows = array();
			$channel_name = $channel['channel_name'];
			$friendly_name = $channel['channel_friendly_name'];
			
			if (isset($channel_form_fields[$channel_name])) {
				$r = array();
				foreach ($channel_form_fields[$channel_name] as $key=>$field) {
					
					
					if (file_exists($template_root.JRDS.'channelmanagement_framework_formfield_'.$field['type'].'.html')) {
						$output = array();
						$pageoutput = array();

						$value = '';
						if (isset($accounts[$channel_name][$key])) {
							$value = $accounts[$channel_name][$key];
						}

						$output['TITLE'] = $field['field_title'];
						$output['INPUTNAME'] = $key;
						$output['VALUE'] = $value;
						$output['HELP'] = $field['field_help'];
						$output['CHANNEL_NAME'] = $channel_name;
						
						$pageoutput[] = $output;
						$tmpl = new patTemplate();
						$tmpl->addRows( 'pageoutput', $pageoutput );
						$tmpl->setRoot( $template_directory );
						$tmpl->readTemplatesFromInput('channelmanagement_framework_formfield_'.$field['type'].'.html');
						
						$r['INPUT'] = $tmpl->getParsedTemplate();
						$rows[] = $r;
					} else {
						throw new Exception('Error: file '.$template_root.JRDS.'channelmanagement_framework_formfield_'.$field['type'].'.html'.' does not exist');
					}
				}
			
			}
			
			$output = array();
			$pageoutput = array();

			$output['TITLE'] = $friendly_name;

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $template_directory );
			$tmpl->readTemplatesFromInput('channelmanagement_framework_formfield_fieldsets.html');
			$result = $tmpl->getParsedTemplate();
			$channel_input_sets[] = array ( 'FIELDSETS' => $result );
		}
		
		$output = array();
		$pageoutput = array();

		$output['TITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', 'CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', false);
		$output['INFO'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', 'CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', false);
			
		$jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
		$jrtb = $jrtbar->startTable();

		$jrtb .= $jrtbar->toolbarItem('cancel', jomresURL(JOMRES_SITEPAGE_URL.'&task=channelmanagement_framework'), '');
		$jrtb .= $jrtbar->toolbarItem('save', '', '', true, 'channelmanagement_framework_user_accounts_save');

		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;
		
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'channel_input_sets', $channel_input_sets );
		$tmpl->setRoot( $template_directory );
		$tmpl->readTemplatesFromInput('channelmanagement_framework_formfield_inputs.html');
	
		echo $tmpl->getParsedTemplate();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
