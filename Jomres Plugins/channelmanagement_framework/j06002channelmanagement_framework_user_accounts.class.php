<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002channelmanagement_framework_user_accounts {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		$JRUser		= jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$MiniComponents->triggerEvent('21001');
		
		$thin_channels = get_showtime("thin_channels");
		
		$output['CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS','CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC','CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',false);

		jr_import('channelmanagement_framework_user_accounts');
		$channelmanagement_framework_user_accounts = new channelmanagement_framework_user_accounts();
		$accounts = $channelmanagement_framework_user_accounts->get_accounts_for_user ( $JRUser->id );
		
		$MiniComponents->triggerEvent('21300');
		$channel_form_fields = get_showtime('channel_form_fields');
		
		$formfields=array();
		foreach ($thin_channels as $channel ) {
			$rows = array();
			$channel_name = $channel['channel_name'];
			$friendly_name = $channel['channel_friendly_name'];
			
			if (isset($channel_form_fields[$channel_name])) {
				$r = array();
				foreach ($channel_form_fields[$channel_name] as $key=>$field) {

					$value = '';
					if ( isset( $accounts[$channel_name][$key]) ) {
						$value = $accounts[$channel_name][$key];
					}
					
					$template_root = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();

					if (file_exists($template_root.JRDS.'channelmanagement_framework_formfield_'.$field['type'].'.html')) {
						$output = array();
						$pageoutput = array();

						$output['TITLE'] = $field['field_title'];
						$output['INPUTNAME'] = $key;
						$output['VALUE'] = $value	;
						$output['HELP'] = $field['field_help'];
						$output['CHANNEL_NAME'] = $channel_name;
						
						

						$pageoutput[] = $output;
						$tmpl = new patTemplate();
						$tmpl->addRows( 'pageoutput', $pageoutput );
						$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
						$tmpl->readTemplatesFromInput('channelmanagement_framework_formfield_'.$field['type'].'.html');
						
						$r['FIELD'] = $tmpl->getParsedTemplate();
						$rows[] = $r;
					} else {
						throw new Exception('Error: file '.$template_root.JRDS.'channelmanagement_framework_formfield_'.$field['type'].'.html'.' does not exist');
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
				$tmpl->readTemplatesFromInput('channelmanagement_framework_formfield_inputs.html');
				
				$formfields[]['service'] = $tmpl->getParsedTemplate();
			}
		}

		if (empty($rows)) {
			$msg = "No channels require account information";
			jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=channelmanagement_framework'), $msg );
		}
		$output = array();
		$pageoutput = array();

		$output['CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS','CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC','CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',false);
		
		$output['RETURN_URL'] =  jomresURL(JOMRES_SITEPAGE_URL.'&task=channelmanagement_framework');
		if ( isset($_REQUEST['jr_redirect_url'])) {
			$output['RETURN_URL'] = $_REQUEST['jr_redirect_url'];
		}
		
		
		$jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
		$jrtb = $jrtbar->startTable();

		$jrtb .= $jrtbar->toolbarItem('cancel', $output['RETURN_URL']);
		$jrtb .= $jrtbar->toolbarItem('save', '', '', true, 'channelmanagement_framework_user_accounts_save');
		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;
		
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $formfields );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'channelmanagement_framework_user_accounts.html' );
		echo $tmpl->getParsedTemplate();
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
