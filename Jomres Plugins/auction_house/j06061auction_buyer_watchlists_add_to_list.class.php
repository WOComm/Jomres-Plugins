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

class j06061auction_buyer_watchlists_add_to_list
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		$wl_object = jomres_getSingleton('jomres_auctionhouse_watchlists');
		$watchlist_id = (int)$_REQUEST['watchlist'];
		$auction_id = (int)$_REQUEST['auction_id'];
			
		$result = $wl_object->add_auction_to_watchlist($auction_id,$watchlist_id,$thisJRUser->id);
		if ($result['auctioninserted'])
			$this->ret_vals = jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST','_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',false,false);
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST','_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST');

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
