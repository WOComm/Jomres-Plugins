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

Return all manifests contents

*/

Flight::route('POST /plugins_hub/upload/', function()
	{
    require_once("../framework.php");

	define('UPLOADS_DIRECTORY', JOMRES_TEMP_ABSPATH.'uploads'.JRDS);
	if (!is_dir(UPLOADS_DIRECTORY)) {
		if (!mkdir(UPLOADS_DIRECTORY)) {
			Flight::halt(204, "Could not create uploads directory");
		}
	}

	$response = new stdClass();
	if (!isset($_POST['username'])) {
		Flight::halt(204, "Username not set");
	}

	if (!isset($_POST['password'])) {
		Flight::halt(204, "Password not set");
	}

		$url = 'https://license-server.jomres.net/shop/confirm_valid_user.php?username='.$_POST['username'].'&password='.$_POST['password'];

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

	if (!isset($_FILES['plugin_file'])) {
		Flight::halt(204, "plugin_file not set");
	}

	if (!isset($_POST['plugin_info'])) {
		Flight::halt(204, "plugin_info not set");
	}

	$plugin_info = json_decode($_POST['plugin_info'],true);

	$plugin_info_pattern=array(
		"name"=>"",
		"category"=>"",
		"marketing"=>"",
		"version"=>"",
		"description"=> "",
		"author"=>"",
		"authoremail"=>"",
		"lastupdate"=>"",
		"min_jomres_ver"=>"",
		"manual_link"=>'',
		'change_log'=>'',
		'highlight'=>'',
		'image'=>'',
		'demo_url'=>'',
		'free'=>true
	);

	$plugin_info_mandatory_fields = ['name', 'version' , 'description' , 'lastupdated' , 'author' , 'authoremail' , 'min_jomres_ver' ];

	$remote_plugins_data = queryUpdateServer('', 'r=dp&format=json&cms=');
	$core_plugins = json_decode($remote_plugins_data,true);

	if (array_key_exists($plugin_info['name'], $core_plugins)) {
		Flight::halt(204, "You cannot name your plugin the same as a Jomres Core plugin.");
	}

	$plugin_info['name'] = strtolower(str_replace( " " , "" ,$plugin_info['name']));

	if (array_key_exists($plugin_info['name'], $core_plugins)) {
		Flight::halt(204, "You cannot give the plugin a name the same as a Core plugin.");
	}

	$plugin_info_file_contents =
'
<?php
defined("_JOMRES_INITCHECK") or die("");
class plugin_info_'.$plugin_info['name'].'
	{
	function __construct()
		{
		$this->data=array(
';
	
	foreach ($plugin_info_pattern as $key => $val) {
		//if (!array_key_exists($key , $plugin_info)) {
		//	Flight::halt(204, "plugin_info ".$key." key not set");
		//}

		if (trim($plugin_info[$key]) == '' && in_array($key,$plugin_info_mandatory_fields)) {
			Flight::halt(204, "plugin_info ".$key." field empty.");
		}

		if ($key == 'lastupdate') {
			if (!validateDate($plugin_info[$key])) {
				Flight::halt(204, "Last update ".$plugin_info[$key]." date is invalid");
			}
		}

		if ($key == 'free') {
			if ($val != 1) {
				Flight::halt(204, "This plugin is not marked as free. Only free plugins can be uploaded to the hub.");
			}
		}

		if ($key == 'version') {
			$val = str_replace('.', '^', $val);
			$val = str_replace(',', '.', $val);
			$val = str_replace('^', '', $val);
			$plugin_info[$key] = (float) $val;
		}


		$plugin_info[$key] = jomres_sanitise_string($plugin_info[$key]);
		$plugin_info_file_contents .='			"'.$key.'"=>"'.$plugin_info[$key].'",'."\n";
	}
	$plugin_info_file_contents .=
'
			);
		}
	}
';

	define('USER_UPLOADS_DIRECTORY', UPLOADS_DIRECTORY.$user_response->details->user_id.JRDS);
	if (!is_dir(USER_UPLOADS_DIRECTORY)) {
		if (!mkdir(USER_UPLOADS_DIRECTORY)) {
			Flight::halt(204, "Could not create USER_UPLOADS_DIRECTORY directory");
		}
	}

	handle_uploaded_file($plugin_info['name']);

	file_put_contents(USER_UPLOADS_DIRECTORY.JRDS.$plugin_info['name'].JRDS.'plugin_info.php' , $plugin_info_file_contents);

	$response = new stdClass();
	$response->message = "Plugin uploaded successfully";
	Flight::json( $response_name = "response" ,$response );
	});


	function mail_me( $message)
	{
		$to = "vince.wooll@gmail.com";
		$subject = "New plugin uploaded to the hub";
		mail($to, $subject, $message, []);
	}

	function handle_uploaded_file( $plugin_name )
	{
		if (!is_dir(USER_UPLOADS_DIRECTORY.JRDS.$plugin_name)) {
			if (!mkdir(USER_UPLOADS_DIRECTORY.JRDS.$plugin_name)) {
				Flight::halt(204, "Could not create USER_UPLOADS_DIRECTORY directory");
			}
		}

		try {

			// Undefined | Multiple Files | $_FILES Corruption Attack
			// If this request falls under any of them, treat it invalid.
			if (
				!isset($_FILES['plugin_file']['error']) ||
				is_array($_FILES['plugin_file']['error'])
			) {
				throw new RuntimeException('Invalid parameters.');
			}

			// Check $_FILES['plugin_file']['error'] value.
			switch ($_FILES['plugin_file']['error']) {
				case UPLOAD_ERR_OK:
					break;
				case UPLOAD_ERR_NO_FILE:
					throw new RuntimeException('No file sent.');
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
					throw new RuntimeException('Exceeded filesize limit.');
				default:
					throw new RuntimeException('Unknown errors.');
			}

			// You should also check filesize here. 
			if ($_FILES['plugin_file']['size'] > 1000000) {
				throw new RuntimeException('Exceeded filesize limit.');
			}

			// DO NOT TRUST $_FILES['plugin_file']['mime'] VALUE !!
			// Check MIME Type by yourself.

			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (false === $ext = array_search(
					$finfo->file($_FILES['plugin_file']['tmp_name']),
					array(
						'zip' => 'application/zip'
					),
					true
				)) {
				throw new RuntimeException('Invalid file format.');
			}

			$zip = new ZipArchive;
			$res = $zip->open($_FILES['plugin_file']['tmp_name']);
			if ($res === TRUE) {
				$zip->close();
			} else {
				$zip->close();
				throw new RuntimeException('Invalid zip file.');
			}

			// You should name it uniquely.
			// DO NOT USE $_FILES['plugin_file']['name'] WITHOUT ANY VALIDATION !!
			// On this example, obtain safe unique name from its binary data.
			if (!move_uploaded_file(
				$_FILES['plugin_file']['tmp_name'],
				USER_UPLOADS_DIRECTORY.JRDS.$plugin_name.JRDS.$plugin_name.'.'.$ext
				)
			) {
				throw new RuntimeException('Failed to move uploaded file.');
			}
			return true;
		} catch (RuntimeException $e) {
			echo $e->getMessage();
		}


	}

	function validateDate($date, $format = 'Y/m/d')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}