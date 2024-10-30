<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 9.9.12
	 *
	 * @copyright	2005-2017 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	class j16000upload_plugin
	{
		public function __construct($componentArgs)
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
			if ($MiniComponents->template_touch){
				$this->template_touchable = false;
				return;
			}

			// POST validation will be done serverside on the app server.

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig   = $siteConfig->get();


			if (!isset($jrConfig['license_server_username']) || trim($jrConfig['license_server_username']) == '' || !isset($jrConfig['license_server_password']) || trim($jrConfig['license_server_password']) == '') {
				echo "
					<p class='alert alert-danger'>You must enter a username and password for the license server. Go to Settings > Site Configuration > License Server Details tab and to enter these details. The username and password must be belong to a valid Jomres license server account, which you can get from <a href='https://license-server.jomres.net/'>HERE</a>. You do not need to have a Jomres license to contribute to the community plugins, but you do need to have a license server account.</p>";

				return;
			}

			$compatability = '';
			if (isset($_POST['compatability'])) {
				foreach ($_POST['compatability'] as $bs_version) {
					$compatability .= "'Bootstrap ".$bs_version."',";
				}
				$compatability = "[".rtrim($compatability, ",")."]";
			}

			$plugin_info_file_contents =
				'
<?php
defined("_JOMRES_INITCHECK") or die("");
class plugin_info_' . jomres_sanitise_string($_POST['plugin']) . '
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"' . jomres_sanitise_string($_POST['plugin']) . '",
			"category"=>"Community Plugins",
			"marketing"=>"' . jomres_sanitise_string($_POST['marketing']) . '",
			"version"=>"' . jomres_sanitise_string($_POST['version']) . '",
			"description"=>"' . jomres_sanitise_string($_POST['description']) . '",
			"lastupdate"=>"' . jomres_sanitise_string($_POST['lastupdate']) . '",
			"min_jomres_ver"=>"' . jomres_sanitise_string($_POST['min_jomres_ver']) . '",
			"manual_link"=>"' . jomres_sanitise_string($_POST['manual_link']) . '",
			"change_log"=>"' . jomres_sanitise_string($_POST['change_log']) . '",
			"highlight"=>"' . jomres_sanitise_string($_POST['highlight']) . '",
			"author"=>"' . jomres_sanitise_string($_POST['author']) . '",
			"authoremail"=>"' . jomres_sanitise_string($_POST['authoremail']) . '",
			"authorurl"=>"' . jomres_sanitise_string($_POST['authorurl']) . '",
			"compatability"=>"' . $compatability . '",
			);
		}
	}
';

			file_put_contents(JOMRES_REMOTEPLUGINS_ABSPATH . JRDS . $_POST['plugin'] . JRDS . 'plugin_info.php', $plugin_info_file_contents);

			if (file_exists(JOMRES_TEMP_ABSPATH.$_POST['plugin'].'.zip')) {
				unlink(JOMRES_TEMP_ABSPATH.$_POST['plugin'].'.zip');
			}
			$archive = JOMRES_TEMP_ABSPATH.$_POST['plugin'].'.zip';
			$zip = new ZipArchive;

			$zip->open($archive, ZipArchive::CREATE);

			// create recursive directory iterator
			$files = new RecursiveIteratorIterator (new RecursiveDirectoryIterator(JOMRES_REMOTEPLUGINS_ABSPATH . $_POST['plugin'] ), RecursiveIteratorIterator::LEAVES_ONLY);

			// let's iterate
			foreach ($files as $name => $file) 	{
				if (is_readable($name) && !$file->isDir()) {
					$filePath = $file->getRealPath();
					$relativePath = substr($filePath, strlen(JOMRES_REMOTEPLUGINS_ABSPATH . JRDS . $_POST['plugin'].JRDS ) - 1);

					// Add current file to archive
					$zip->addFile($filePath, $relativePath);
				}
			}

			// close the zip file
			$success = $zip->close() ;
			//echo GetZipErrMessage($success);
			if (!$success) {
				echo 'There was a problem writing the ZIP archive.';
				}
			else {
				$cname       = 'plugin_info_' . $_POST['plugin'];
				require_once JOMRES_REMOTEPLUGINS_ABSPATH . JRDS . $_POST['plugin'] . JRDS . 'plugin_info.php';

				$plugin_info = new $cname;

				$endpoint = 'jomres/api/plugins_hub/upload/';

				$postfields = array('username' => $jrConfig['license_server_username'], 'password' => $jrConfig['license_server_password'], 'plugin_info' => json_encode($plugin_info->data), 'plugin_file' => new CURLFILE($archive));

				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_URL            => APP_SERVER . $endpoint,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING       => '',
					CURLOPT_MAXREDIRS      => 10,
					CURLOPT_TIMEOUT        => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST  => 'POST',
					CURLOPT_POSTFIELDS     => $postfields,
				));

				$response = curl_exec($curl);

				curl_close($curl);
				$response = json_decode($response);
				if (isset($response->error_message)) {
					echo '<p class="alert alert-danger">' . $response->error_message . '</p>';
					}
				else {
					jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL_ADMIN . '&task=your_plugins'));
					}
			}
		}

		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}
