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

class j10501channelmanagement_framework_administrator_account_fields
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
		
        $siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		$configurationPanel=$componentArgs['configurationPanel'];
		
		$MiniComponents->triggerEvent('21001');
		
		$thin_channels = get_showtime("thin_channels");

		if (empty($thin_channels) || is_null($thin_channels) ) {
			return;
		}

		$configurationPanel->startPanel(jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', 'CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', false));

		$MiniComponents->triggerEvent('21310');
		$channel_form_fields = get_showtime('channel_administrator_form_fields');

		if (empty($thin_channels)) {
			return;
		}
		$formfields=array();
		foreach ($thin_channels as $channel ) {
			$rows = array();
			$channel_name = $channel['channel_name'];
			$friendly_name = $channel['channel_friendly_name'];
			
			if (isset($channel_form_fields[$channel_name])) {
				$r = array();
				foreach ($channel_form_fields[$channel_name] as $key=>$field) {
					
					// channel_manager_framework_user_accounts
					
					$template_root = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();

					if (file_exists($template_root.JRDS.'channelmanagement_framework_administrator_formfield_'.$field['type'].'.html')) {
						$output = array();
						$pageoutput = array();

						$value = '';
						if (isset($jrConfig['channel_manager_framework_user_accounts'][$channel_name][$key])) {
							$value = $jrConfig['channel_manager_framework_user_accounts'][$channel_name][$key];
						}
						
						$output['TITLE'] = $field['field_title'];
						$output['INPUTNAME'] = $key;
						$output['VALUE'] = $value;
						$output['HELP'] = $field['field_help'];
						$output['CHANNEL_NAME'] = $channel_name;
						
						

						$pageoutput[] = $output;
						$tmpl = new patTemplate();
						$tmpl->addRows( 'pageoutput', $pageoutput );
						$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
						$tmpl->readTemplatesFromInput('channelmanagement_framework_administrator_formfield_'.$field['type'].'.html');
						
						$r['FIELD'] = $tmpl->getParsedTemplate();
						$rows[] = $r;
					} else {
						throw new Exception('Error: file '.$template_root.JRDS.'channelmanagement_framework_administrator_formfield_'.$field['type'].'.html'.' does not exist');
					}
				}
				$output = array();
				$pageoutput = array();

				$output['TITLE'] = $friendly_name;

				$pageoutput[] = $output;
				$tmpl = new patTemplate();
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->addRows( 'rows', $rows );
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput('channelmanagement_framework_administrator_formfield_inputs.html');
				
				//$formfields[]['service'] = $tmpl->getParsedTemplate();
				
				$configurationPanel->setleft( );
				$configurationPanel->setmiddle($tmpl->getParsedTemplate());
				$configurationPanel->setright();
				$configurationPanel->insertSetting();
			}
		}



		$configurationPanel->endPanel();
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
