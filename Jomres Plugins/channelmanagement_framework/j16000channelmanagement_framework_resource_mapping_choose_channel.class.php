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

class j16000channelmanagement_framework_resource_mapping_choose_channel{
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
			
		
		// Channels build reports of their existence
		$MiniComponents =jomres_getSingleton('mcHandler');
		$MiniComponents->triggerEvent('21001');
		$thin_channels = get_showtime("thin_channels");

		if (!empty($thin_channels)) {
			
			$channel_options = array();
			foreach ($thin_channels as $channel) {
				if (isset($channel['features']['has_dictionaries']) && $channel['features']['has_dictionaries'] === true ) {
					$channel_options[] = jomresHTML::makeOption($channel['channel_name'], $channel['channel_friendly_name'] );
				}
				
			}

			$output['CHANNEL_DROPDOWN'] = jomresHTML::selectList($channel_options, 'channel_required', 'class="inputbox" size="1"', 'value', 'text', '' , false );
			$output['CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL','CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',false);

			$jrtbar =jomres_getSingleton('jomres_toolbar');
			$jrtb  = $jrtbar->startTable();

			$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=channelmanagement_framework"),"");
			$jrtb .= $jrtbar->customToolbarItem('channelmanagement_framework_resource_mapping_choose_channel_dictionary_types', jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=channelmanagement_framework_resource_mapping_choose_channel_dictionary_types"), jr_gettext('_PN_NEXT', '_PN_NEXT', false), $submitOnClick = true, $submitTask = 'channelmanagement_framework_resource_mapping_choose_channel_dictionary_types', 'Save.png');
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_framework_mapping_choose_channel.html' );
			echo $tmpl->getParsedTemplate();
		} else {
			echo jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED','CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',false);  
		}
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
