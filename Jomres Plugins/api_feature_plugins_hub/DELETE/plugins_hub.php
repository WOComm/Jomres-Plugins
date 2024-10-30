<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
Delete a user's plugin
*/

	Flight::route('DELETE /plugins_hub/delete_plugin/@username/@password/@plugin_name', function($username,$password,$plugin_name)
	{
		require_once("../framework.php");

		define('UPLOADS_DIRECTORY', JOMRES_TEMP_ABSPATH.'uploads'.JRDS);
		if (!is_dir(UPLOADS_DIRECTORY)) {
			if (!mkdir(UPLOADS_DIRECTORY)) {
				Flight::halt(204, "Could not create uploads directory");
			}
		}
		define('DELETED_PLUGINS_DIRECTORY', JOMRES_TEMP_ABSPATH.'deleted_plugins'.JRDS);
		if (!is_dir(DELETED_PLUGINS_DIRECTORY)) {
			if (!mkdir(DELETED_PLUGINS_DIRECTORY)) {
				Flight::halt(204, "Could not create deleted_plugins directory");
			}
		}

		if (!isset($username) || trim($username) == '') {
			Flight::halt(204, "Username not set");
		}

		if (!isset($password) || trim($password) == '') {
			Flight::halt(204, "Password not set");
		}

		$url = 'https://license-server.jomres.net/shop/confirm_valid_user.php?username='.jomres_sanitise_string($username).'&password='.jomres_sanitise_string($password);

		try {
			$client = new GuzzleHttp\Client([
				'base_uri' => $url
			]);

			logging::log_message('Starting guzzle call to '.$url.'/', 'Guzzle', 'DEBUG');

			$user_response = json_decode($client->request('GET',$url)->getBody()->getContents());
		} catch (Exception $e) {
			$jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
			$jomres_user_feedback->construct_message(array('message'=>'Could not query the updates server', 'css_class'=>'alert-danger alert-error'));
		}

		if (!$user_response->valid) {
			Flight::halt(204, "Invalid username/password.");
		}

		$user_id = $user_response->details->user_id;

		$manifests = scanAllDir(UPLOADS_DIRECTORY);

		$response = new stdClass();
		$response->success = false;

		if (!empty($manifests)){
			foreach ($manifests as $plugin ) {
				if ($plugin["user"] == $user_id) {
					if ($plugin["name"] == $plugin_name) {

						$plugin_directory = UPLOADS_DIRECTORY . $user_id . JRDS .$plugin["name"];

						$new_location = DELETED_PLUGINS_DIRECTORY . $user_id . JRDS .$plugin["name"] . JRDS . date("Y-m-d_H-i-s");

						if (is_dir($plugin_directory)) {
							if (!is_dir($new_location)) {
								if (!mkdir($new_location,0755,true)) {
									Flight::halt(204, "Could not delete directory");
								}
							}
							//emptyDir($plugin_directory);
							//@rmdir($plugin_directory);
							//$response->directory = $plugin_directory;
							rename($plugin_directory, $new_location);

							$response->success = true;
						}
					}
				}
			}
		} else {
			Flight::halt(204, "No plugins found");
		}


		Flight::json( $response_name = "response" , $response );
	});

	function scanAllDir($dir) {
		$pluginsArray = array();

		if (!is_dir($dir)) return $pluginsArray;

		foreach(scandir($dir) as $username_dir_file) {
			if ($username_dir_file[0] !== '.'){
				foreach (scandir($dir.JRDS.$username_dir_file) as $dirContent){
					foreach(scandir($dir.JRDS.$username_dir_file.JRDS.$dirContent) as $plugin_dir_file){
						if ($plugin_dir_file[0] !== '.'){
							if ($plugin_dir_file == 'plugin_info.php') {
								$filePath = $dir.JRDS.$username_dir_file.JRDS.$dirContent.JRDS.$plugin_dir_file;
								$pos      = 18;
								if ($file = fopen($filePath, "r")){
									while (!feof($file)){
										$line = fgets($file);
										$l    = substr($line, 0, $pos);
										if ($l === 'class plugin_info_'){
											$plugin_name = substr($line, $pos, (strpos($line, PHP_EOL, $pos)) - $pos);

											$cname                      = "plugin_info_" . $plugin_name;
											if (!class_exists($cname)) {
												require_once($filePath);
											}

											$info                       = new $cname();
											$info->data['user']         = $username_dir_file;
											$info->data['community_plugin']         = true;
											$pluginsArray[$plugin_name] = $info->data;
										}
									}
									fclose($file);
								}
							}
						}
					}
				}
			}

		}

		return $pluginsArray;
	}