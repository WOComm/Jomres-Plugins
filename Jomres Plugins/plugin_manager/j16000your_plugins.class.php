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

	class j16000your_plugins
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

			$siteConfig         = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig           = $siteConfig->get();

			if (!isset($jrConfig[ 'license_server_username' ]) || trim($jrConfig[ 'license_server_username' ]) == '' || !isset($jrConfig[ 'license_server_password' ]) || trim($jrConfig[ 'license_server_password' ]) == '') {
				echo "<p class='alert alert-danger'>This page shows you the plugins you have uploaded to the Community Plugins hub, and if you want you can delete one or more plugins from here. You haven't saved your username and password so it's not possible to find your plugins yet.</p>
				<p class='alert alert-danger'>You must enter a username and password for the license server. Go to Settings > Site Configuration > License Server Details tab and to enter these details. The username and password must be belong to a valid Jomres license server account, which you can get from <a href='https://license-server.jomres.net/'>HERE</a>. You do not need to have a Jomres license to contribute to the community plugins, but you do need to have a license server account.</p>";
				return;
			}

			$url = APP_SERVER.'jomres/api/plugins_hub/my_plugins/'.$jrConfig[ 'license_server_username' ].'/'.$jrConfig[ 'license_server_password' ];

			try {
				$client = new GuzzleHttp\Client([
					'base_uri' => $url
				]);

				logging::log_message('Starting guzzle call to '.$url.'/', 'Guzzle', 'DEBUG');

				$response = $client->request('GET',$url)->getBody()->getContents();

			} catch (Exception $e) {
				echo $e->getMessage();
				return;
			}

			$your_plugins_response = json_decode($response , true );

			if (isset($your_plugins_response['data']['response']) && !empty($your_plugins_response['data']['response'])) {
				$pageoutput = array();
				$output = array();
				$rows=array();
				foreach ($your_plugins_response['data']['response'] as $plugin) {
					$r=array();

					$jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
					$jrtb = $jrtbar->startTable();
					$jrtb .= $jrtbar->toolbarItem('delete', jomresURL(JOMRES_SITEPAGE_URL_ADMIN."&task=delete_community_plugin&plugin_name=".$plugin['name']), '');
					$jrtb .= $jrtbar->endTable();
					$r[ 'JOMRESTOOLBAR' ] = $jrtb;
					$r['PLUGIN_NAME'] = $plugin['name'];
					$rows[]=$r;
					}

				$pageoutput[ ] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot($ePointFilepath);
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->addRows('rows', $rows);

				if (jomres_bootstrap_version() == 5 ) {
					$tmpl->readTemplatesFromInput('your_plugins_bs5.html');
				} else {
					$tmpl->readTemplatesFromInput('your_plugins.html');
				}

				$tmpl->displayParsedTemplate();
			} else {
				echo "You don't have any plugins listed on the Community Plugins Hub.";
			}

		}



		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}
