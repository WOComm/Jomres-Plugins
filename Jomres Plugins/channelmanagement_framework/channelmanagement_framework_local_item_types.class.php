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


class channelmanagement_framework_local_item_types
{
	
	function __construct()
	{
	$this->local_item_types = array (
		"ptype" => array ( "type" => "Property types", "designation" => "ptype" ),
		"pfeature" => array ( "type" => "Property features", "designation" => "pfeature" ),
		"rmfeature" => array ( "type" => "Room features", "designation" => "rmfeature" ),
		"rmtype" => array ( "type" => "Room types", "designation" => "rmtype" )
		);
	}


}
