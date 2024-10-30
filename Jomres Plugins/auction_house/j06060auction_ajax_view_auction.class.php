<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06060auction_ajax_view_auction
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');
		$this->ret_vals = $ah_object->view_auction();
		}

	function touch_template_language()
		{
		$output=array();
		// $output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY);
		// $output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS);
		
		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
