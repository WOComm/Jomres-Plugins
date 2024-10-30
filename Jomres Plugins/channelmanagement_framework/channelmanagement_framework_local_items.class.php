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


class channelmanagement_framework_local_items
{
	
	function __construct()
	{

	}

	function get_local_items( $type = '' )
	{
		if ( $type == '' ) {
			throw new Exception( "item type not passed" );
		}
		
		$type_class = "channelmanagement_framework_local_item_".$type;
		jr_import($type_class);
		if ( class_exists($type_class) ) {
			$this->local_item_type_class = new $type_class;
		} else {
			throw new Exception( "item_type unknown" );
		}
		
		$this->local_items = $this->local_item_type_class->get_local_items();
		return $this->local_items;
	}
}
