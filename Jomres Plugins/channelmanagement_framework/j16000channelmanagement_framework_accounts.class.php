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

class j16000channelmanagement_framework_accounts {
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
			
			
/*			
			// Channels build reports of their existence
			$MiniComponents->triggerEvent('21001');
			$thin_channels = get_showtime("thin_channels");

			// Import any tasks from this framework
			$framework_tasks = $MiniComponents->triggerEvent('21005');
		
			// Import any tasks from channels
			$channel_tasks = $MiniComponents->triggerEvent('21010');
			
			if ( is_array($channel_tasks) ) {
				$tasks = array_merge( $framework_tasks , $channel_tasks );
			} else {
				$tasks = $framework_tasks;
			}

			$output['CHANNELMANAGEMENT_FRAMEWORK_TITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_TITLE','CHANNELMANAGEMENT_FRAMEWORK_TITLE',false);
			$output['CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS','CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',false);
			
			
			
			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $tasks );
			$tmpl->addRows( 'channel_reports', $thin_channels );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_framework_dashboard.html' );
			echo $tmpl->getParsedTemplate();
		 */

		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
