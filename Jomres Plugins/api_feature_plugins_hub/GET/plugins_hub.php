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
Returns a list of plugins associated with the user's account
*/

	Flight::route('GET /plugins_hub/my_plugins/@username/@password', function($username,$password)
	{
		require_once("../framework.php");

		define('UPLOADS_DIRECTORY', JOMRES_TEMP_ABSPATH.'uploads'.JRDS);
		if (!is_dir(UPLOADS_DIRECTORY)) {
			if (!mkdir(UPLOADS_DIRECTORY)) {
				Flight::halt(204, "Could not create uploads directory");
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

		$my_plugins = array();
		if (!empty($manifests)){
			foreach ($manifests as $plugin ) {
				if ($plugin["user"] == $user_id){
					$my_plugins[] = $plugin;
				}
			}
		} else {
			Flight::halt(204, "No plugins found");
		}


		Flight::json( $response_name = "response" , $my_plugins );
	});

	/*
	Return the plugin zip file
	*/

	Flight::route('GET /plugins_hub/plugin_file/@plugin', function($plugin)
	{
		require_once("../framework.php");

		define('UPLOADS_DIRECTORY', JOMRES_TEMP_ABSPATH.'uploads'.JRDS);
		if (!is_dir(UPLOADS_DIRECTORY)) {
			if (!mkdir(UPLOADS_DIRECTORY)) {
				Flight::halt(204, "Could not create uploads directory");
			}
		}

		$manifests = scanAllDir(UPLOADS_DIRECTORY);

		if (isset($manifests[$plugin])){
			$file = UPLOADS_DIRECTORY.$manifests[$plugin]['user'].JRDS.$plugin.JRDS.$plugin.'.zip';
			if (file_exists($file)){
				ob_clean();
				flush();
				output_file($file, $plugin.'.zip', 'zip');
				exit();
			}
		} else {
			Flight::halt(204, "Plugin $plugin not found");
		}


		Flight::json( $response_name = "response" ,$manifests );
	});


/*

Return all manifests contents

*/

Flight::route('GET /plugins_hub/manifests/', function()
	{
    require_once("../framework.php");

	define('UPLOADS_DIRECTORY', JOMRES_TEMP_ABSPATH.'uploads'.JRDS);
	if (!is_dir(UPLOADS_DIRECTORY)) {
		if (!mkdir(UPLOADS_DIRECTORY)) {
			Flight::halt(204, "Could not create uploads directory");
		}
	}


	$manifests = scanAllDir(UPLOADS_DIRECTORY);

	Flight::json( $response_name = "response" ,$manifests );
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



	function output_file($file, $name, $mime_type='')
	{
		/*
		This function takes a path to a file to output ($file),
		the filename that the browser will see ($name) and
		the MIME type of the file ($mime_type, optional).

		If you want to do something on download abort/finish,
		register_shutdown_function('function_name');
		*/
		if(!is_readable($file)) die('File not found or inaccessible!');

		$size = filesize($file);
		$name = rawurldecode($name);

		/* Figure out the MIME type (if not specified) */
		$known_mime_types=array(
			"pdf" => "application/pdf",
			"txt" => "text/plain",
			"html" => "text/html",
			"htm" => "text/html",
			"exe" => "application/octet-stream",
			"zip" => "application/zip",
			"doc" => "application/msword",
			"xls" => "application/vnd.ms-excel",
			"ppt" => "application/vnd.ms-powerpoint",
			"gif" => "image/gif",
			"png" => "image/png",
			"jpeg"=> "image/jpg",
			"jpg" => "image/jpg",
			"php" => "text/plain"
		);

		if($mime_type==''){
			$file_extension = strtolower(substr(strrchr($file,"."),1));
			if(array_key_exists($file_extension, $known_mime_types)){
				$mime_type=$known_mime_types[$file_extension];
			} else {
				$mime_type="application/force-download";
			};
		};

		@ob_end_clean(); //turn off output buffering to decrease cpu usage

// required for IE, otherwise Content-Disposition may be ignored
		if(ini_get('zlib.output_compression'))
			ini_set('zlib.output_compression', 'Off');

		header('Content-Type: ' . $mime_type);
		header('Content-Disposition: attachment; filename="'.$name.'"');
		header("Content-Transfer-Encoding: binary");
		header('Accept-Ranges: bytes');

		/* The three lines below basically make the
		download non-cacheable */
		header("Cache-control: private");
		header('Pragma: private');
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// multipart-download and download resuming support
		if(isset($_SERVER['HTTP_RANGE']))
		{
			list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
			list($range) = explode(",",$range,2);
			list($range, $range_end) = explode("-", $range);
			$range=intval($range);
			if(!$range_end) {
				$range_end=$size-1;
			} else {
				$range_end=intval($range_end);
			}

			$new_length = $range_end-$range+1;
			header("HTTP/1.1 206 Partial Content");
			header("Content-Length: $new_length");
			header("Content-Range: bytes $range-$range_end/$size");
		} else {
			$new_length=$size;
			header("Content-Length: ".$size);
		}

		/* output the file itself */
		$chunksize = 1*(1024*1024); //you may want to change this
		$bytes_send = 0;
		if ($file = fopen($file, 'r'))
		{
			if(isset($_SERVER['HTTP_RANGE']))
				fseek($file, $range);

			while(!feof($file) &&
				(!connection_aborted()) &&
				($bytes_send<$new_length)
			)
			{
				$buffer = fread($file, $chunksize);
				print($buffer); //echo($buffer); // is also possible
				flush();
				$bytes_send += strlen($buffer);
			}
			fclose($file);
		} else die('Error - can not open file.');

//die();
	}
