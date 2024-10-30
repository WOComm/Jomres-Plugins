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

class j06002channelmanagement_framework {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');

		$JRUser									= jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$channelmanagement_framework_singleton = jomres_singleton_abstract::getInstance('channelmanagement_framework_singleton'); 

		// Channels can run sanity checks and trigger redirects if required
		$user_channels = get_showtime("user_channels");

		if ( empty($user_channels) ) {
			echo '<p class="alert alert-danger">'.jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED','CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',false).'</p>';
			return;
		}

		// Channels can run sanity checks and trigger redirects if required
		$thin_channels = get_showtime("thin_channels");

		foreach ($thin_channels as $channel) {
			$MiniComponents->specificEvent('06002', 'channelmanagement_'.$channel['channel_name'].'_dashboard');
		}

		$basic_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
		$basic_property_details->get_property_name_multi($JRUser->authorisedProperties);
		
		$properties_list = array();
		$rows = array();
		
		$output = array();
		$pageoutput = array();
		
		$already_shown = array(); // A user can have duplicate channels listed if they're a super manager, so we will keep an array of properties already shown to keep the list unique
		foreach ($user_channels as $channel ) {

			$local_properties = channelmanagement_framework_properties::get_local_property_ids_for_channel($channel['id']);

			if (!empty($local_properties)) {
				foreach ($local_properties as $local_property) {
					if ( in_array($local_property['local_property_uid'], $JRUser->authorisedProperties) &&  !in_array($local_property['local_property_uid'], $already_shown)) {
						$r = array();
						$r['CHANNEL'] = $channel['channel_friendly_name'];
						$r['LOCAL_PROPERTY_UID'] = $local_property['local_property_uid'];
						$r['REMOTE_PROPERTY_UID'] = $local_property['remote_property_uid'];
						$r['PROPERTY_NAME'] = $basic_property_details->get_property_name($local_property['local_property_uid'], false);
						$remote_admin_url = '';

						if (isset($local_property['remote_data']->origin_management_url)) {
							$remote_admin_url =$local_property['remote_data']->origin_management_url;
						}

						$r['BADGE_REMOTE_EDIT'] = '';
						if ($remote_admin_url != '') {
							$r['BADGE_REMOTE_EDIT'] = '<a href="' . $remote_admin_url . '" target="_blank"><span class="badge badge-info">' . jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', false) . '</span></a>';
						}

						$r['BADGE_LOCAL_EDIT'] = '<a href="' . get_property_details_url($local_property['local_property_uid']) . '" ><span class="badge badge-info">' . jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', false) . '</span></a>';

						$r['BADGE_LOCAL_DELETE'] = '<a href="' . JOMRES_SITEPAGE_URL . '&task=channelmanagement_framework_delete_property&id=' . $local_property['local_property_uid'] . '&channel_name=' . $channel['channel_name'] . '" ><span class="badge badge-danger">' . jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', 'CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', false) . '</span></a>';

						$rows[] = $r;

						$already_shown[] = $local_property['local_property_uid'];
					}
				}
			}
		}

		$output['CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME','CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME','CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID','CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',false);
		$output['CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID','CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',false);

		$output['CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE','CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',false);
			
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'dashboard_list_properties.html' );
		$properties_list[] = array ( "PROPERTIES_LIST" =>  $tmpl->getParsedTemplate() );
	
		
		
		
		
	
		$output = array();
		$pageoutput = array();
		
		$channel_dashboard_items = get_showtime("cmf_dashboard_items");
		$rows = array();
		if (!empty($channel_dashboard_items)) {
			foreach ($channel_dashboard_items as $item) {
				$r = array();
				$r['DASHBOARD_ITEM'] = $item;
				$rows[]= $r;
			}
		}
		
		$output['PAGETITLE'] = jr_gettext('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE','CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',false);
		
		$output['MAINMENU'] = $MiniComponents->specificEvent('06002', 'channelmanagement_framework_mainmenu', array('output_now' => false));
		
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'properties_list', $properties_list );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'dashboard.html' );
		echo $tmpl->getParsedTemplate();
		
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
