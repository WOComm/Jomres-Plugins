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

	class j16000delete_community_plugin
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

			$url = APP_SERVER.'jomres/api/plugins_hub/delete_plugin/'.$jrConfig[ 'license_server_username' ].'/'.$jrConfig[ 'license_server_password' ].'/'.$_GET['plugin_name'];

			try {
				$client = new GuzzleHttp\Client([
					'base_uri' => $url
				]);

				logging::log_message('Starting guzzle call to '.$url.'/', 'Guzzle', 'DEBUG');

				$response = $client->request('DELETE',$url)->getBody()->getContents();
			} catch (Exception $e) {
				echo $e->getMessage();
				return;
			}

			$your_plugins_response = json_decode($response , true );
			jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL_ADMIN . '&task=your_plugins'));
		}



		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}
