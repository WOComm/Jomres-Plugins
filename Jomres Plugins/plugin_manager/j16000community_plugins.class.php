<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 10.7
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	class j16000community_plugins
	{
		public function __construct()
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;

				return;
			}
			$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig           = $siteConfig->get();

			if (!isset($jrConfig[ 'license_server_username' ]) || trim($jrConfig[ 'license_server_username' ]) == '' || !isset($jrConfig[ 'license_server_password' ]) || trim($jrConfig[ 'license_server_password' ]) == '') {
				echo "<p class='alert alert-info'>This page allows you to upload plugins from your server to the Community Hub. Users can then download your contributions through the Jomres plugin manager. If you're a developer and you want to drive business to your website to sell plugins then uploading free plugins via this feature is an excellent way of bringing customers to your site.</p>
					<p class='alert alert-danger'>You must enter a username and password for the license server. Go to Settings > Site Configuration > License Server Details tab and to enter these details. The username and password must be belong to a valid Jomres license server account, which you can get from <a href='https://license-server.jomres.net/'>HERE</a>. You do not need to have a Jomres license to contribute to the community plugins, but you do need to have a license server account.</p>";
				return;
			}




			$ePointFilepath = get_showtime('ePointFilepath');
			$output = array();
			$remote_plugins_directory_subdirs = scandir_getdirectories(JOMRES_REMOTEPLUGINS_ABSPATH);
			if (!empty($remote_plugins_directory_subdirs)) {
				$rows = array();
				$counter=0;
				foreach ($remote_plugins_directory_subdirs as $subdir) {
					$r = array();
					if (!file_exists(JOMRES_REMOTEPLUGINS_ABSPATH.$subdir.JRDS.'plugin_info.php')) {
						$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
						$jrConfig = $siteConfig->get();

						$plugin_name = strtolower(str_replace(" " , "_" , $subdir));

						$plugin_info = new stdClass();
						$plugin_info->name = $plugin_name;
						$plugin_info->marketing = "A short description";
						$plugin_info->description = "A longer description, which will appear in the popup modal in the Jomres plugin manager.";
						$plugin_info->author =  get_showtime('fromname');
						$plugin_info->author_url = get_showtime('live_site');
						$plugin_info->authoremail = get_showtime('mailfrom');
						$plugin_info->version = "0.1";
						$plugin_info->lastupdate = date("Y/m/d");
						$plugin_info->min_jomres_ver = $jrConfig[ 'version' ];
						$plugin_info->manual_link = "";
						$plugin_info->change_log = '';
						$plugin_info->compatability = '';

						$plugin_info_file_contents =
							'
<?php
defined("_JOMRES_INITCHECK") or die("");
class plugin_info_'.$plugin_name.'
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"'.$plugin_info->name.'",
			"category"=>"Community Plugins",
			"marketing"=>"'.$plugin_info->marketing.'",
			"version"=>"'.$plugin_info->version.'",
			"description"=>"'.$plugin_info->description.'",
			"lastupdate"=>"'.$plugin_info->lastupdate.'",
			"min_jomres_ver"=>"'.$plugin_info->min_jomres_ver.'",
			"manual_link"=>"'.$plugin_info->manual_link.'",
			"change_log"=>"'.$plugin_info->change_log.'",
			"author"=>"'.$plugin_info->author.'",
			"authoremail"=>"'.$plugin_info->authoremail.'",
			"authorurl"=>"'.$plugin_info->author_url.'",
			"compatability"=>"'.$plugin_info->compatability.'",
		
			);
		}
	}
';

					file_put_contents(JOMRES_REMOTEPLUGINS_ABSPATH.$subdir.JRDS.'plugin_info.php' , $plugin_info_file_contents);
					}

					require_once JOMRES_REMOTEPLUGINS_ABSPATH.$subdir.JRDS.'plugin_info.php';
					$cname = 'plugin_info_'.$subdir;
					$plugin_info = new $cname;

					$r['BS2_CHECKED'] = '';
					$r['BS3_CHECKED'] = '';
					$r['BS5_CHECKED'] = '';

					$compatability_array = strtoarray($plugin_info->data['compatability']);
					if (!empty($compatability_array)) {
						foreach ($compatability_array as $val) {
							if ($val == 'Bootstrap 2') {
								$r['BS2_CHECKED'] = 'checked';
							}
							if ($val == 'Bootstrap 3') {
								$r['BS3_CHECKED'] = 'checked';
							}
							if ($val == 'Bootstrap 5') {
								$r['BS5_CHECKED'] = 'checked';
							}
						}
					}

					$r['PLUGIN_NAME'] = $plugin_info->data['name'];
					$r['MARKETING'] = $plugin_info->data['marketing'];
					$r['VERSION'] = $plugin_info->data['version'];
					$r['DESCRIPTION'] = $plugin_info->data['description'];
					$r['LASTUPDATE'] = $plugin_info->data['lastupdate'];
					$r['MIN_JOMRES_VER'] = $plugin_info->data['min_jomres_ver'];
					$r['MANUAL_LINK'] = $plugin_info->data['manual_link'];
					$r['CHANGE_LOG'] = $plugin_info->data['change_log'];
					$r['AUTHOR'] = $plugin_info->data['author'];
					$r['AUTHOREMAIL'] = $plugin_info->data['authoremail'];
					$r['AUTHORURL'] = $plugin_info->data['authorurl'];
					$r['HIGHLIGHT'] = $plugin_info->data['highlight'];
					$r['LOCATION'] = JOMRES_REMOTEPLUGINS_ABSPATH.$subdir.JRDS;
					$r[ 'RANDOM_IDENTIFIER' ] = generateJomresRandomString();
					if ($counter ==0) {
						$r['ACCORDION_EXPANDED'] = 'true';
					} else {
						$r['ACCORDION_EXPANDED'] = 'false';
					}
					$counter++;
					$rows[]=$r;
				}


				$pageoutput[ ] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot($ePointFilepath);
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->addRows('rows', $rows);


				if (jomres_bootstrap_version() == 5 ) {
					$tmpl->readTemplatesFromInput('community_plugins_bs5.html');
				} else {
					$tmpl->readTemplatesFromInput('community_plugins.html');
				}

				$tmpl->displayParsedTemplate();
			} else {
				echo "<p class='alert alert-info'>You don't yet have any plugins currently in the /jomres/remote_plugins directory. Once you have created your own plugins, you will be able to upload them to the Community Hub and share them with other Jomres users.</a>";
			}


		}



		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}


