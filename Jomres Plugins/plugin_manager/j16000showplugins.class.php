<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 9.9.5
	 *
	 * @copyright	2005-2017 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	class j16000showplugins
	{
		public function __construct()
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;

				return;
			}

			$ePointFilepath = get_showtime('ePointFilepath');
			$eLiveSite = get_showtime('eLiveSite');

			$free_plugin_svg = '<img src="'.$eLiveSite.'no-dollar-icon.svg'.'" style="height: 25px"/>' ;
			$not_free_plugin_svg = '';

			if ( $MiniComponents->eventSpecificlyExistsCheck('16000', 'jomres_patreon_nag') ) {
				$MiniComponents->specificEvent('16000', 'jomres_patreon_nag');
			}

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			$frontend_bootstrap_version = 'Bootstrap 5';
			if (!isset($jrConfig[ 'bootstrap_version' ]) || is_null($jrConfig[ 'bootstrap_version' ]) ) {
				$frontend_bootstrap_version = 'Bootstrap 5';
			} else {
				$bsver =  (int)$jrConfig[ 'bootstrap_version' ];

				if ($bsver == 0) {
					$frontend_bootstrap_version = 'Bootstrap 5';
				} elseif ($bsver == 3) {
					$frontend_bootstrap_version = 'Bootstrap 3';
				}
			}


			jr_import('jomres_check_support_key');
			$key_validation = new jomres_check_support_key(JOMRES_SITEPAGE_URL_ADMIN.'&task=showplugins');

			$this->key_valid = $key_validation->key_valid;

			$registry = jomres_singleton_abstract::getInstance('minicomponent_registry');
			$registry->regenerate_registry(true);

			jomres_cmsspecific_addheaddata('javascript', JOMRES_NODE_MODULES_RELPATH.'blockui-npm/', 'jquery.blockUI.js');

			$this_jomres_version = explode('.', $jrConfig[ 'version' ]);

			$installed_plugins = array();
			$jrePath = JOMRES_REMOTEPLUGINS_ABSPATH;
			$third_party_plugins = array();
			if (!is_dir($jrePath)) {
				if (!@mkdir($jrePath)) {
					echo 'Error, unable to make folder '.$jrePath." automatically therefore cannot install plugins. Please create the folder manually and ensure that it's writable by the web server";
					return;
				}
			}

			$jrcPath = JOMRES_COREPLUGINS_ABSPATH;
			$third_party_plugins = array();
			if (!is_dir($jrcPath)) {
				if (!@mkdir($jrcPath)) {
					echo 'Error, unable to make folder '.$jrcPath." automatically therefore cannot install plugins. Please create the folder manually and ensure that it's writable by the web server";

					return;
				}
			}

			$developer_user = false;

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			$current_licenses = array();

			$remote_plugins_data = queryUpdateServer('', 'r=dp&format=json&cms='._JOMRES_DETECTED_CMS.'&key='.$key_validation->key_hash);

			$rp_array = json_decode($remote_plugins_data);

			$third_party_remote_plugins = array();
			$third_party_remote_plugins_data = json_decode(queryHubServer());

			if (
				isset($third_party_remote_plugins_data->data->response) &&
				!empty($third_party_remote_plugins_data->data->response)
			) {
				foreach ($third_party_remote_plugins_data->data->response as $thirdparty) {

					if (!property_exists($rp_array , $thirdparty->name ) ) {
						$n = $thirdparty->name;
						if (isset($thirdparty->compatability)) {
							$thirdparty->compatability = strtoarray($thirdparty->compatability);

						}

						$rp_array->$n = $thirdparty;
					}
				}
			}

			if (empty($rp_array)) {
				echo "<div class='alert alert-error alert-danger'>Uh oh, Can't get a list of plugins from the plugin server. Is there a firewall preventing your server from talking to https://plugins.jomres.net ?</div>";
				return;
			}

			foreach ($rp_array as $rp) {
				$free = true;
				if (!isset($rp->free) || $rp->free != true) {
					$free = false;
				}

				$compatability = '';
				if (isset($rp->compatability)) {
					$compatability = array();
					if (is_array($rp->compatability)) {
						foreach ($rp->compatability as $c ) {
							$compatability[] = jomres_sanitise_string($c);
						}
					}
				}

				$community_plugin = false;
				if (isset($rp->community_plugin) && $rp->community_plugin == true) {
					$community_plugin = true;
				}

				if ( !isset($rp->author) || trim($rp->author) == '' ) {
					$rp->author = 'Unknown';
				}

				if ( !isset($rp->authoremail) || trim($rp->authoremail) == '' ) {
					$rp->authoremail = 'Unknown';
				}

				if ( !isset($rp->authorurl) || trim($rp->authorurl) == '' ) {
					$rp->authorurl = 'unknown';
				}

				$remote_plugins[trim(jomres_sanitise_string(@$rp->name)) ] = array(
					'name' => (isset($rp->name) ? trim(jomres_sanitise_string($rp->name)) : ''),
					'version' => (isset($rp->version) ? (float)$rp->version : 1),
					'lastupdate' => (isset($rp->lastupdate) ? jomres_sanitise_string($rp->lastupdate) : ''),
					'description' => (isset($rp->description) ? jomres_sanitise_string($rp->description) : ''),
					'type' => (isset($rp->type) ? jomres_sanitise_string($rp->type) : ''),
					'min_jomres_ver' => (isset($rp->min_jomres_ver) ? jomres_sanitise_string($rp->min_jomres_ver) : '1'),
					'manual_link' => (isset($rp->manual_link) ? jomres_sanitise_string($rp->manual_link) : ''),
					'change_log' => (isset($rp->change_log) ? jomres_sanitise_string($rp->change_log) : ''),
					'highlight' => (isset($rp->highlight) ? jomres_sanitise_string($rp->highlight) : ''),
					'image' => (isset($rp->image) ? jomres_sanitise_string($rp->image) : ''),
					'demo_url' => (isset($rp->demo_url) ? addslashes($rp->demo_url) : ''),
					'retired' => (isset($rp->retired) ? (bool)$rp->retired : false),
					'free' => $free,
					'author' => (isset($rp->author) ? jomres_sanitise_string($rp->author) : ''),
					'authoremail' => (isset($rp->authoremail) ? jomres_sanitise_string($rp->authoremail) : ''),
					'authorurl' => (isset($rp->authorurl) ? jomres_sanitise_string($rp->authorurl) : ''),
					'compatability' => $compatability,
					'community_plugin' => $community_plugin,
				);
			}

			$d = @dir($jrePath);
			if ($d) {
				while (false !== ($entry = $d->read())) {
					$filename = $entry;
					if (substr($entry, 0, 1) != '.') {
						if (file_exists($jrePath.$entry.JRDS.'plugin_info.php')) {
							$cname = 'plugin_info_'.$entry;
							if (!class_exists($cname)){
								include_once $jrePath . $entry . JRDS . 'plugin_info.php';
							}
							if (class_exists($cname)) {
								$info = new $cname();
								$installed_plugins[ $info->data[ 'name' ] ] = $info->data;
							}
						}
					}
				}
				foreach ($installed_plugins as $key => $val) {
					if (!array_key_exists($key, $remote_plugins)) {
						$third_party_plugins[ $key ] = $val;
					}
				}
			}


			$d = @dir($jrcPath);
			if ($d) {
				while (false !== ($entry = $d->read())) {
					$filename = $entry;
					if (substr($entry, 0, 1) != '.') {
						if (file_exists($jrcPath.$entry.JRDS.'plugin_info.php')) {

							$cname = 'plugin_info_'.$entry;
							if (!class_exists($cname)){
								include_once $jrcPath.$entry.JRDS.'plugin_info.php';
							}
							if (class_exists($cname)) {
								$info = new $cname();
								// When developing it's easy to incorrectly rename a plugin info.php file. Uncomment the next line and run showplugins again to see which was the last plugin info that was called correctly before the script crashed
								// echo $cname."<br/>";

								$installed_plugins[ $info->data[ 'name' ] ] = $info->data;
							}
						}
					}
				}

				foreach ($installed_plugins as $key => $val) {
					if (!array_key_exists($key, $remote_plugins)) {
						$third_party_plugins[ $key ] = $val;
					}
				}
			}

			$output = array();
			$pageoutput = array();
			//////////////////////////////////////////////////////

			$output[ 'PAGETITLE' ] = 'Jomres Plugin Manager';

			$output[ 'PAGETITLE' ] = 'Jomres Plugin Manager';
			if ($jrConfig[ 'licensekey' ] == '') {
				$output['LICENSE_MESSAGE'] = jr_gettext('NO_LICENSE_MESSAGE', 'NO_LICENSE_MESSAGE', false);
				$output['LICENSE_MESSAGE_CLASS'] = 'danger';
			} elseif (!$this->key_valid) {
				if ($key_validation->license_name == "Developer Subscription" || $key_validation->license_name == "Basic Subscription") {
					$output['LICENSE_MESSAGE'] = jr_gettext('INVALID_LICENSE_MESSAGE', 'INVALID_LICENSE_MESSAGE', false);
					$output['LICENSE_MESSAGE_CLASS'] = 'danger';
				}
			} else {
				$output['LICENSE_MESSAGE'] = jr_gettext('VALID_LICENSE_MESSAGE', 'VALID_LICENSE_MESSAGE', false);
				$output['LICENSE_MESSAGE_CLASS'] = 'success';
			}

			////////////////////////////////////////////////////// Third party plugins
			if ($developer_user) {
				$bronze_users[ 0 ][ 'dummy' ] = ' ';
			}

			$uninstall_text = 'Uninstall';
			$externalPluginTypes = array('component', 'module', 'mambot');
			$this->set_main_plugins();
			$thirdpartyplugins = array();
			foreach ($third_party_plugins as $tpp) {
				if (!isset($tpp[ 'type' ])) {
					$tpp[ 'type' ] = 'Unknown';
				}

				$type = $tpp[ 'type' ];
				$n = $tpp[ 'name' ];
				$row_class = 'availablefordownload';
				$uninstallAction = ' ';
				$already_installed = false;
				$uninstallLink = '';
				if (array_key_exists($n, $installed_plugins)) {
					$already_installed = true;
					$uninstallAction = $uninstall_text;
					$row_class = 'alreadyinstalled';
					$uninstallLink = JOMRES_SITEPAGE_URL_ADMIN.'&task=removeplugin&no_html=1&plugin='.$n;
				}

				$local_version = $installed_plugins[ $n ][ 'version' ];
				if (!array_key_exists($n, $installed_plugins)) {
					$local_version = 'N/A';
				}

				$r = array();
				$r[ 'UNINSTALL' ] = $uninstallAction;
				$r[ 'ROWCLASS' ] = $row_class;
				$r[ 'NAME' ] = $tpp[ 'name' ];
				$r[ 'LOCALVERSION' ] = $local_version;

				if (!isset($tpp[ 'authoremail' ])) {
					$tpp[ 'authoremail' ] = 'Unknown';
				}
				if (!isset($tpp[ 'author' ])) {
					$tpp[ 'author' ] = 'Unknown';
				}
				if (!isset($tpp[ 'description' ])) {
					$tpp[ 'description' ] = 'Unknown';
				}

				$r[ 'DESCRIPTION' ] = stripslashes($tpp[ 'description' ]);
				$r[ 'AUTHOR' ] = stripslashes($tpp[ 'author' ]);
				$r[ 'AUTHOREMAIL' ] = stripslashes($tpp[ 'authoremail' ]);
				$r[ 'UNINSTALLLINK' ] = $uninstallLink;

				$r[ 'THIRD_PARTY_PLUGIN_LATEST_AVAILABLE_VERSION' ] = "Unknown";
				$r[ 'DEVELOPER_PAGE' ] = "";
				$r[ 'LATEST_RELEASE' ] = "";

				if (isset( $tpp[ 'third_party_plugin_latest_available_version' ] )){
					$file_headers = @get_headers($tpp[ 'third_party_plugin_latest_available_version' ]);
					if (isset($file_headers[0])) {
						if($file_headers[0] != 'HTTP/1.0 404 Not Found'){
							$r[ 'MIN_JOMRES_VER' ] = (float)$tpp[ 'min_jomres_ver' ];

							$ctx = stream_context_create(array('http'=>
								array(
									'timeout' => 1,  //1 Second
								)
							));

							$remote_plugin_data = json_decode(@file_get_contents($tpp[ 'third_party_plugin_latest_available_version' ], false, $ctx));
							if ( isset($remote_plugin_data->version)) {
								$r[ 'THIRD_PARTY_PLUGIN_LATEST_AVAILABLE_VERSION' ] = (float) $remote_plugin_data->version;
								$r[ 'LATEST_RELEASE' ] = $remote_plugin_data->releaseDate;
							}
						}
					}
				}


				if (isset( $tpp[ 'developer_page' ] )){
					$r[ 'DEVELOPER_PAGE' ] = '<a href="'.$tpp[ 'developer_page' ].'" target="_blank">Website</a>';
				}




				$thirdpartyplugins[ ] = $r;
			}

			////////////////////////////////////////////////////// Remote plugins
			$span = 12;
			if ($developer_user) {
				$span = 11;
			}
			$output[ 'SPAN' ] = $span;

			$install_text = 'Install';
			$reinstall_text = 'Reinstall';
			$upgrade_text = 'Update';
			$uninstall_text = 'Uninstall';
			$externalPluginTypes = array('component', 'module', 'mambot');

			$jomresdotnet_plugins = array();
			$jomresdotnet_apiplugins = array();
			$jomresdotnet_webhooksplugins = array();

			$plugins_needing_upgrading = array();
			$all_installed_plugins = array();

			$retired_plugins = array();

			$badge_function = 'jomres_badge';
			$incompatible_icon = '<i class="fas fa-skull-crossbones"></i>';
			if (jomres_bootstrap_version() == "3"|| jomres_bootstrap_version() == "2") {
				$badge_function = 'jomres_badge_old';
				$incompatible_icon = '<i class="fa fa-bug" aria-hidden="true"></i>';
			}

			foreach ($remote_plugins as $rp) {
				$r = array();

				$type = $rp[ 'type' ];
				$plugin_name = $rp[ 'name' ];
				if ($developer_user) {
					$n = $rp[ 'name' ];
				} elseif (array_key_exists($plugin_name, $current_licenses)) {
					$n = $plugin_name.'&plugin_key='.$current_licenses[ $plugin_name ];
				} else {
					$n = $rp[ 'name' ];
				}

				$isFreePlugin = $remote_plugins[$plugin_name]['free'];

				$min_jomres_ver = explode('.', $rp[ 'min_jomres_ver' ]);

				$row_class = '';
				$installAction = $install_text;
				$uninstallAction = ' ';

				if ($isFreePlugin) {
					$icon = $free_plugin_svg;
				} else {
					$icon = $not_free_plugin_svg;
				}


				if (array_key_exists($rp[ 'name' ], $installed_plugins)) {
					$uninstallAction = $uninstall_text;
					$installAction = $reinstall_text;
					$row_class = 'ui-state-success';

					$all_installed_plugins[] = $plugin_name;
					if ($rp[ 'version' ] > $installed_plugins[ $plugin_name ][ 'version' ]) {
						$plugins_needing_upgrading[ ] = $plugin_name;
						$installAction = $upgrade_text;
						$row_class = 'ui-state-highlight';
					}
					if ($rp[ 'retired' ]) {
						$row_class = 'ui-state-error';
						$retired_plugins[] = $plugin_name;
					}
				}

				$r[ 'INSTALL_LINK' ] = '';
				$r[ 'INSTALL_TEXT' ] = $installAction;
				if (array_key_exists($plugin_name, $current_licenses) || $developer_user) {
					$r[ 'INSTALL_LINK' ] = JOMRES_SITEPAGE_URL_ADMIN.'&task=addplugin&plugin='.$n;
					$r[ 'INSTALL_TEXT' ] = $installAction;
				}

				$r[ 'UNINSTALL_LINK' ] = '';
				$r[ 'UNINSTALL_TEXT' ] = '';
				$r[ 'UNINSTALL' ] = '';
				if (array_key_exists($rp[ 'name' ], $installed_plugins)) {
					$r[ 'UNINSTALL_LINK' ] = JOMRES_SITEPAGE_URL_ADMIN.'&task=removeplugin&no_html=1&plugin='.$n;
					$r[ 'UNINSTALL_TEXT' ] = $uninstallAction;
					$r[ 'UNINSTALL' ] = '<button type="button"  onclick="uninstall_plugin(\''.$rp[ 'name' ].'\');" class="btn btn-danger" id="uninstall_button_content_'.$rp[ 'name' ].'" >'.$uninstall_text.'</button>';
				}
				if (isset($installed_plugins[ $plugin_name ])) {
					$local_version = $installed_plugins[ $plugin_name ][ 'version' ];
				} else {
					$local_version = '';
				}

				if (!array_key_exists($plugin_name, $installed_plugins)) {
					$local_version = 'N/A';
				}

				$style = '';

				$r[ 'MANUAL_LINK' ] = '';
				$r[ 'MANUAL_TEXT' ] = '';
				$r[ 'MANUAL_CLASS' ] = '';
				if (isset($rp[ 'manual_link' ]) && $rp[ 'manual_link' ] != '') {
					$r[ 'MANUAL_LINK' ] = $rp[ 'manual_link' ];
					$r[ 'MANUAL_TEXT' ] = 'Manual';
					$r[ 'MANUAL_CLASS' ] = 'btn';
				}

				$r[ 'DEMO_LINK' ] = '';
				$r[ 'DEMO_TEXT' ] = '';
				$r[ 'DEMO_CLASS' ] = '';
				if (isset($rp[ 'demo_url' ]) && $rp[ 'demo_url' ] != '') {
					$r[ 'DEMO_LINK' ] = $rp[ 'demo_url' ];
					$r[ 'DEMO_TEXT' ] = 'Demo';
					$r[ 'DEMO_CLASS' ] = 'btn';
				}

				$r[ 'CHANGELOG' ] = '';
				if ($rp[ 'change_log' ] != '') {
					$r[ 'CHANGELOG' ] = $rp[ 'change_log' ];
				}
				$r[ 'HIGHLIGHT' ] = '';
				$r[ 'HIGHLIGHT_CLASS' ] = '';
				if ($rp[ 'highlight' ] != '') {
					$r[ 'HIGHLIGHT' ] = $rp[ 'highlight' ];
					$r[ 'HIGHLIGHT_ICON' ] = $badge_function( 'See More Info' , 'warning');
					$r[ 'HIGHLIGHT_CLASS' ] = 'alert alert-warning';
				}

				$readable_name = ucwords(' '.str_replace('_', ' ', $rp[ 'name' ]));
				$r[ 'READABLE_NAME' ] = $readable_name;

				$primary_button_class = 'btn btn-primary';
				$warning_button_class = 'btn btn-warning';

				$install_button_class =  $primary_button_class;
				$compatability_icon = '';
				$r[ 'COMPATABILITY' ] = '';
				if (isset($rp['compatability'])) {
					$install_button_class = $warning_button_class;
					if (is_array($rp['compatability'])) {
						$compatability_icon =  $incompatible_icon;
						foreach ($rp['compatability'] as $compatability) {

							$badge_class = 'info';
							if ($compatability == 'Bootstrap 2' || $compatability == 'Bootstrap 3' || $compatability == 'Bootstrap 5') {

								if ($frontend_bootstrap_version == $compatability) {
									$badge_class = 'success';
									$compatability_icon = '';
									$install_button_class = $primary_button_class;
								}
								$r[ 'COMPATABILITY' ] .= $badge_function( $compatability , $badge_class).' ';
							} else {
								$r[ 'COMPATABILITY' ] .= $badge_function( $compatability , 'success').' ';
								$compatability_icon = '';
								$install_button_class = $primary_button_class;
							}
						}
					} else {
						$compatability_icon = '';
						$install_button_class = $primary_button_class;
					}
				} else {
					$compatability_icon = '';
					$install_button_class = $primary_button_class;
				}

				$r[ 'IMAGE' ] = $rp[ 'image' ];

				$r[ 'PLUGIN_NAME' ] = $rp[ 'name' ];
				$r[ 'MIN_JOMRES_VER' ] = $rp[ 'min_jomres_ver' ];
				$r[ 'LOCAL_VER' ] = $local_version;
				$r[ 'REMOTE_VER' ] = $rp[ 'version' ];
				$r[ 'PLUGIN_DESC' ] = stripslashes($rp[ 'description' ]);
				$r[ 'LASTUPDATE' ] = $rp[ 'lastupdate' ];

				$r[ 'COMMUNITY_PLUGIN' ] = '';
				if (isset($rp['community_plugin']) && $rp['community_plugin'] == true) {
					$r[ 'COMMUNITY_PLUGIN' ] = $badge_function('Community plugin', 'primary');
				}

				$r[ 'PLUGIN_AUTHOR' ] = $rp[ 'author' ];
				if ($rp[ 'authoremail' ] == 'sales@jomres.net') {
					$r[ 'PLUGIN_AUTHOREMAIL_LINK' ] = 'https://tickets.jomres.net';
				} else {
					$r[ 'PLUGIN_AUTHOREMAIL_LINK' ] = 'mailto:'.$rp[ 'authoremail' ];
				}
				$r[ 'PLUGIN_AUTHOREMAIL' ] = $rp[ 'authoremail' ];
				$r[ 'PLUGIN_AUTHORURL' ] = $rp[ 'authorurl' ];


				if (!isset($min_jomres_ver[ 2 ])) {
					$min_jomres_ver[ 2 ] = 0;
				}

				$min_major_version = $min_jomres_ver[ 0 ];
				$min_minor_version = $min_jomres_ver[ 1 ];
				$min_revis_version = $min_jomres_ver[ 2 ];

				$current_major_version = $this_jomres_version[ 0 ];
				$current_minor_version = $this_jomres_version[ 1 ];
				$current_revis_version = $this_jomres_version[ 2 ];

				$r[ 'LATERVERSION' ] = 'Requires a later version of Jomres';

				if ($current_major_version >= $min_major_version && $current_minor_version >= $min_minor_version && $current_revis_version >= $min_revis_version) {
					$condition = 1;
				} elseif ($current_major_version >= $min_major_version && $current_minor_version > $min_minor_version) {
					$condition = 1;
				} elseif ($current_major_version > $min_major_version) {
					$condition = 1;
				} else {
					$condition = 0;
				}

				if ($condition == 1) {
					$r[ 'LATERVERSION' ] = '';
				}

				$r[ 'INSTALL' ] = '<button type="button"  onclick="install_plugin(\''.$rp[ 'name' ].'\');" class="'. $install_button_class.'"  id="install_button_content_'.$rp[ 'name' ].'" >'.$compatability_icon.$icon.' '.$r[ 'INSTALL_TEXT' ].'</button>';

				if ($rp[ 'retired' ]) {
					$r[ 'INSTALL' ] = '';
				}


				if (!$isFreePlugin && !$this->key_valid ) {
					$r[ 'INSTALL' ] = $badge_function(jr_gettext('PLUGIN_MANAGER_PLUGIN_DOWNLOAD_REQUIRES_VALID_LICENSE', 'PLUGIN_MANAGER_PLUGIN_DOWNLOAD_REQUIRES_VALID_LICENSE', false), 'secondary');
				}

				if (using_bootstrap()) {
					switch ($row_class) {
						case 'ui-state-success':
							$row_class = 'alert alert-success';
							break;
						case 'ui-state-highlight':
							$row_class = 'alert alert-warning';
							break;
						case 'freeplugin':
							$row_class = 'alert alert-info';
							break;
						case 'ui-state-error':
							$row_class = 'alert alert-danger';
							break;
						default:
							$row_class = '';
							break;
					}
				}
				$r[ 'ROWCLASS' ] = $row_class;

				$r[ 'STYLE' ] = $style;

				$r[ 'DOWNLOAD_BUTTON' ] = '';


					if (!$isFreePlugin && !$this->key_valid ) {
					//	if (!array_key_exists($rp[ 'name' ], $installed_plugins)) {
							$r['LIVESITE_BASE64_ENCODED'] = base64_encode(JOMRES_SITEPAGE_URL_ADMIN.'&task=addplugin&plugin='.$rp['name'].'&key=');
							$tmpl = new patTemplate();
							$tmpl->setRoot($ePointFilepath);
							$tmpl->addRows('pageoutput', [$r]);
							$tmpl->readTemplatesFromInput('purchase_button_bs5.html');
							$r[ 'DOWNLOAD_BUTTON' ] = $tmpl->getParsedTemplate();
					//	}

					}  else {
						$tmpl = new patTemplate();
						$tmpl->setRoot($ePointFilepath);
						$tmpl->addRows('pageoutput', [$r]);
						$tmpl->readTemplatesFromInput('download_button_bs5.html');
						$r[ 'DOWNLOAD_BUTTON' ] = $tmpl->getParsedTemplate();
					}




				if (substr($rp[ 'name' ], 0, 4) == 'api_') {
					if ($rp[ 'retired' ] && array_key_exists($rp[ 'name' ], $installed_plugins)) {
						$jomresdotnet_apiplugins[ ] = $r;
					} elseif (!$rp[ 'retired' ]) {
						$jomresdotnet_apiplugins[ ] = $r;
					}
				} elseif (substr($rp[ 'name' ], 0, 9) == 'webhooks_') {
					if ($rp[ 'retired' ] && array_key_exists($rp[ 'name' ], $installed_plugins)) {
						$jomresdotnet_webhooksplugins[ ] = $r;
					} elseif (!$rp[ 'retired' ]) {
						$jomresdotnet_webhooksplugins[ ] = $r;
					}
				} else {
					if ($rp[ 'retired' ] && array_key_exists($rp[ 'name' ], $installed_plugins)) {
						$jomresdotnet_plugins[ ] = $r;
					} elseif (!$rp[ 'retired' ]) {
						$jomresdotnet_plugins[ ] = $r;
					}
				}
			}

			// We'll move retired core plugins to the top of the list
			if (count($retired_plugins) > 0) {
				$count = count($jomresdotnet_plugins);
				for ($i = 0; $i < $count; ++$i) {
					if (in_array($jomresdotnet_plugins[$i]['PLUGIN_NAME'], $retired_plugins)) {
						$move = $jomresdotnet_plugins[$i];
						unset($jomresdotnet_plugins[$i]);
						array_unshift($jomresdotnet_plugins, $move);
					}
				}
			}

			// We'll move retired api plugins to the top of the list
			if (count($retired_plugins) > 0) {
				$count = count($jomresdotnet_apiplugins);
				for ($i = 0; $i < $count; ++$i) {
					if (in_array($jomresdotnet_apiplugins[$i]['PLUGIN_NAME'], $retired_plugins)) {
						$move = $jomresdotnet_apiplugins[$i];
						unset($jomresdotnet_apiplugins[$i]);
						array_unshift($jomresdotnet_apiplugins, $move);
					}
				}
			}

			// We'll move retired webhooks plugins to the top of the list
			if (count($retired_plugins) > 0) {
				$count = count($jomresdotnet_webhooksplugins);
				for ($i = 0; $i < $count; ++$i) {
					if (in_array($jomresdotnet_webhooksplugins[$i]['PLUGIN_NAME'], $retired_plugins)) {
						$move = $jomresdotnet_webhooksplugins[$i];
						unset($jomresdotnet_webhooksplugins[$i]);
						array_unshift($jomresdotnet_webhooksplugins, $move);
					}
				}
			}

			$output[ 'INSTALLED_PLUGINS' ] = implode(',', $all_installed_plugins);
			$output[ 'PLUGINS_TO_UPGRADE' ] = implode(',', $plugins_needing_upgrading);

			if (!empty($plugins_needing_upgrading) && $this->key_valid ) {
				$plugins_require_upgrade[ ][ 'upgrade_text' ] = 'Upgrade all Core plugins. You must upgrade Jomres first before upgrading plugins.';
			}

			if (!isset($plugins_require_upgrade)) {
				$plugins_require_upgrade = array();
			}

			$plugins_reinstall = array();
			if ( $this->key_valid ) {
				$plugins_reinstall[]['REINSTALL_TEXT'] = 'Reinstall all installed plugins';
			}

			$third_party_dev_plugin_tabs = array ();
			$third_party_dev_plugin_tab_content = array ();

			$MiniComponents->triggerEvent('13200'); // TAB_ID should be something like blahblah_blah, not including spaces and non-latin characters as it's used for switching tabs. Tab name can be anything friendly, such as "My tab name", and Tab Contents can be any valid html.

			if (isset($MiniComponents->miniComponentData['13200'])) {
				$third_party_dev_tabs =  $MiniComponents->miniComponentData['13200'];
			}


			if (!empty($third_party_dev_tabs)) {
				$counter = 0;
				foreach ($third_party_dev_tabs as $tab ) {
					$third_party_dev_plugin_tabs[$counter]['THIRD_PARTY_PLUGIN_TAB_NAME'] = $tab['TAB_NAME'];
					$third_party_dev_plugin_tabs[$counter]['THIRD_PARTY_PLUGIN_TAB_ID'] = $tab['TAB_ID'];
					$third_party_dev_plugin_tab_content[$counter]['THIRD_PARTY_PLUGIN_TAB_CONTENT'] = $tab['TAB_CONTENTS'];
					$third_party_dev_plugin_tab_content[$counter]['THIRD_PARTY_PLUGIN_TAB_ID'] = $tab['TAB_ID'];
					$counter++;
				}
			}

			//

			$pageoutput[ ] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot($ePointFilepath);
			$tmpl->addRows('pageoutput', $pageoutput);

			$tmpl->addRows('thirdpartyplugins', $thirdpartyplugins);
			$tmpl->addRows('jomresdotnet_plugins', $jomresdotnet_plugins);
			$tmpl->addRows('jomresdotnet_apiplugins', $jomresdotnet_apiplugins);
			$tmpl->addRows('jomresdotnet_webhooksplugins', $jomresdotnet_webhooksplugins);
			$tmpl->addRows('plugins_require_upgrade', $plugins_require_upgrade);
			$tmpl->addRows('reinstall_plugins', $plugins_reinstall);
			$tmpl->addRows('third_party_dev_plugin_tabs', $third_party_dev_plugin_tabs);
			$tmpl->addRows('third_party_dev_plugin_tab_content', $third_party_dev_plugin_tab_content);

			if (jomres_bootstrap_version() == 5 ) {
				$tmpl->readTemplatesFromInput('plugin_manager_bs5.html');
			} else {
				$tmpl->readTemplatesFromInput('plugin_manager.html');
			}

			$tmpl->displayParsedTemplate();
		}

		public function set_main_plugins()
		{
			$this->main_plugins = array();
			$this->main_plugins[ ] = 'advanced_micromanage_tariff_editing_modes';
			$this->main_plugins[ ] = 'black_bookings';
			$this->main_plugins[ ] = 'book_guest_in_out';
			$this->main_plugins[ ] = 'commission';
			$this->main_plugins[ ] = 'core_gateway_paypal';
			$this->main_plugins[ ] = 'coupons';
			$this->main_plugins[ ] = 'custom_fields';
			$this->main_plugins[ ] = 'guest_types';
			$this->main_plugins[ ] = 'lastminute_config_tab';
			$this->main_plugins[ ] = 'optional_extras';
			$this->main_plugins[ ] = 'partners';
			$this->main_plugins[ ] = 'property_creation_plugins';
			$this->main_plugins[ ] = 'sms_clickatell';
			$this->main_plugins[ ] = 'subscriptions';
			$this->main_plugins[ ] = 'template_editing';
			$this->main_plugins[ ] = 'wiseprice_config_tab';
			$this->main_plugins[ ] = 'alternative_init';
			$this->main_plugins[ ] = 'jomres_asamodule';
		}

		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}

	/*
	 * For older versions of Jomres, we need to include the badge function for display in BS2/BS3 based sites. BS5 and upwards use a template file
	 */
	if (!function_exists('jomres_badge_old')) {
		function jomres_badge_old($text = '', $badge_style = 'secondary')
		{
			if ($badge_style == 'info') {
				$badge_style = '';
			}
			$badge_file = JOMRES_TEMPLATEPATH_FRONTEND.JRDS.'badge_'.$badge_style.'.html';
			if (!file_exists($badge_file)) {
				return  '<span class="badge badge-'.$badge_style.'">'.$text.'</span>' ;
			}

			$pageoutput = array(array('TEXT' => $text ));
			$tmpl = new patTemplate();
			$tmpl->setRoot(JOMRES_TEMPLATEPATH_FRONTEND);
			$tmpl->readTemplatesFromInput('badge_'.$badge_style.'.html');
			$tmpl->addRows('pageoutput', $pageoutput);
			return $tmpl->getParsedTemplate();
		}
	}


