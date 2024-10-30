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

class j16000channelmanagement_framework_resource_mapping_choose_channel_dictionary_types{
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
			
		$channel_required = jomresGetParam($_POST, 'channel_required', '');
		
		$dictionary_class_name = 'channelmanagement_'.$channel_required.'_dictionaries';
		
		jr_import($dictionary_class_name);
		if ( !class_exists($dictionary_class_name) ) {
			echo jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',false);
			return;
		}
		
		$dictionary_class = new $dictionary_class_name();
		
		$dictionary_items = $dictionary_class->get_mappable_dictionary_items();

		if (!empty($dictionary_items)) {
			$channel_options = array();
			foreach ($dictionary_items as $key=>$val) {
				if (is_array($val)) {
					$channel_options[] = jomresHTML::makeOption($val['jomres_type']."#".$key, $val['friendly_name'] );
				}
			}

			$output['HIDDEN_CHANNEL'] = $channel_required;
			
			$output['CHANNEL_DROPDOWN'] = jomresHTML::selectList($channel_options, 'local_item_type_remote_item_type', 'class="inputbox" size="1"', 'value', 'text', '');
			
			$output['CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE','CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',false);

			$jrtbar =jomres_getSingleton('jomres_toolbar');
			$jrtb  = $jrtbar->startTable();

			$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=channelmanagement_framework"),"");
			$jrtb .= $jrtbar->customToolbarItem('channelmanagement_framework_resource_mapping_map_dictionary_items', jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=channelmanagement_framework_resource_mapping_map_dictionary_items"), jr_gettext('_PN_NEXT', '_PN_NEXT', false), $submitOnClick = true, $submitTask = 'channelmanagement_framework_resource_mapping_map_dictionary_items', 'Save.png');
			$jrtb .= $jrtbar->endTable();
			$output['JOMRESTOOLBAR']=$jrtb;
			
			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_framework_mapping_choose_mapping_type.html' );
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
