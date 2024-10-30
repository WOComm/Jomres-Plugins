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

class j06002channelmanagement_framework_import_properties {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		jomres_cmsspecific_addheaddata('javascript', JOMRES_NODE_MODULES_RELPATH.'blockui-npm/', 'jquery.blockUI.js');

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		jr_import('channelmanagement_framework_channels');
		$channelmanagement_framework_channels = new channelmanagement_framework_channels();
		$user_channels = $channelmanagement_framework_channels->get_user_channels($JRUser->userid);

		$channel_name	= trim(filter_var($_GET['channel_name'], FILTER_SANITIZE_SPECIAL_CHARS));

		if (!isset($user_channels[$channel_name])) {
			throw new Exception( "Channel id can't be found." );

		}


		$properties_list_class_name = 'channelmanagement_'.$channel_name.'_list_remote_properties';
		jr_import($properties_list_class_name);
		if ( !class_exists($properties_list_class_name) ) {
			throw new Exception( jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST','CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',false, false ) );
		}
		
		
		$local_properties = channelmanagement_framework_properties::get_local_property_ids_for_channel( $user_channels[$channel_name]['id'] );

		$local_property_remote_uids = array();
		if (!empty($local_properties)) {
			foreach ($local_properties as $local_property) {
				$local_property_remote_uids[] = $local_property['remote_property_uid'];
			}
			
		}
		

		$properties_list_class = new $properties_list_class_name();
		$remote_properties = $properties_list_class->get_remote_properties();

		if (empty($remote_properties)) {
			jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=channelmanagement_framework" ) , " No properties to import ");
		}
		
		$output = array();
		$pageoutput = array();
		
		$output['PAGETITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT','CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',false);
		
		$output['PROPERTY_ID_STRING'] = "";

		$output['_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID']			=  jr_gettext('_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID', '_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID', false);
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME']				=  jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_NAME', false);
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN']				=  jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN', false);
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION']			=  jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION', false);
		$output['_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY']			=  jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY', false);
		$output['_JOMRES_FRONT_PTYPE']									=  jr_gettext('_JOMRES_FRONT_PTYPE', '_JOMRES_FRONT_PTYPE', false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED']	=  jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED']	=  jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', false);
        $output['CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT']	=  jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', false);

		$property_names = array();

		foreach ($remote_properties as $remote_property) {
			if ( $remote_property[ "remote_property_id"] > 0 && !in_array ( $remote_property[ "remote_property_id"] , $local_property_remote_uids ) ) {
				$r=array();


				$r["REMOTE_TOWN"] = '';
				$r["REMOTE_REGION"] = '';
				$r["REMOTE_COUNTRY"] = '';
				$r["REMOTE_TYPE"] = '';
                $r["DISABLED"] = '';

				$r["REMOTE_PROPERTY_ID"] = $remote_property[ "remote_property_id"];
				$r["REMOTE_PROPERTY_NAME"] = $remote_property[ "remote_property_name"];

                if (isset( $remote_property[ "remote_property_changelog_item_count"])) {
                    if ((string)$remote_property[ "remote_property_changelog_item_count"] == "0" ) {
                        $r["DISABLED"] = 'disabled';
                    }
                } else {
                    $output['PROPERTY_ID_STRING'] .= $remote_property[ "remote_property_id"].",";
                }

                if (isset( $remote_property[ "remote_property_published"])) {
                    if ((string)$remote_property[ "remote_property_published"] != "1" ) {
                        $r["DISABLED"] = 'disabled';
                    }
                }

				if (isset( $remote_property[ "remote_property_town"])) {
					$r["REMOTE_TOWN"] = $remote_property[ "remote_property_town"];
				}

				if (isset( $remote_property[ "remote_property_region"])) {
					$r["REMOTE_REGION"] = $remote_property[ "remote_property_region"];
				}

				if (isset( $remote_property[ "remote_property_country"])) {
					$r["REMOTE_COUNTRY"] = $remote_property[ "remote_property_country"];
				}

				if (isset( $remote_property[ "remote_property_type_title"])) {
					$r["REMOTE_TYPE"] = $remote_property[ "remote_property_type_title"];
				}

				$r["CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE"] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', 'CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', false);
				$property_names[] = $r;
			}
		}

		if ( !empty($property_names)) {
			$output['PROPERTY_ID_STRING'] = substr( $output['PROPERTY_ID_STRING'], 0, strlen( $output['PROPERTY_ID_STRING'] ) - 1 );
			$output['CHANNEL_NAME'] = $channel_name;

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'property_names', $property_names );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'channelmanagement_framework_import_properties.html' );
			echo $tmpl->getParsedTemplate();
		} else {
			echo '<p class="alert alert-danger">No properties remain to be imported</p>';
		}

		
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
