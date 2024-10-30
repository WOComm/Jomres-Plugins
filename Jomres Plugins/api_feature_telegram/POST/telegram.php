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


Flight::route('POST /telegram/message', function()
	{
    require_once("../framework.php");

	$response = new stdClass();
	if (!isset($_POST['message'])) {
		Flight::halt(204, "Message not set");
	}

	if (!isset($_POST['public'])) {
		Flight::halt(204, "Public not set");
	}

	$telegram = new Telegram(TELEGRAM_TOKEN);

	$public = (bool)$_POST['public'];

	if ($public) {
		$chat_id = '@jomres_news';
	} else {
		$chat_id = '@jomres_news_private';
	}


	$content = array('chat_id' => $chat_id, 'text' => $_POST['message']);
	$result = $telegram->sendMessage($content);

	Flight::json( $response_name = "response" ,$result );
	});