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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000channelmanagement_framework_resource_sanity_checks{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');

		$output = array();
		$pageoutput = array();
		
		$output['CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE','CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',false);
		
		// Find any issues reported by channel management plugins
		
		$MiniComponents->triggerEvent('21150');
		
		$issues= get_showtime('channel_sanity_checks_errors');
		
		
		if (!empty($issues) ) {
			$rows = array();
			foreach ($issues as $issue) {
				$rows[]= array ("issue" => $issue);
			}
			
			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_sanity_checks_errors.html' );
			echo $tmpl->getParsedTemplate();
			
		} else {
			// Show the whoopee everything is fine template
			
			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_sanity_checks_no_errors.html' );
			echo $tmpl->getParsedTemplate();
		}

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
