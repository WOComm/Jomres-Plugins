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

class j06060auction_ajax_place_bid
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$bid	 				= (float)jomresGetParam( $_REQUEST, 'auction_bid', 0.00 );
		$auction_id				= (int)jomresGetParam( $_REQUEST, 'auction_id', 0 );
		$thisJRUser=jomres_getSingleton('jr_user');

		$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');
		$user_can_bid_check = $ah_object->check_user_can_bid_on_auction($auction_id,$bid);

		if ($user_can_bid_check['canbid'])
			{
			$result = $ah_object->insert_bid($auction_id,$bid,$thisJRUser->id);
			if ($result['bidplaced'])
				{
				$ahjavascript = get_showtime('ahjavascript');
				$js_to_run_on_render = "window.location.href='".JOMRES_AUCTIONHOUSE_URL."&ahtask=auction_view_auction&auction_id=".$auction_id."'";
				set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);
				$this->ret_vals = jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED','_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',false,false);
				}
			}
		else
			$this->ret_vals = $user_can_bid_check['reason'];
		}

	function touch_template_language()
		{
		$output=array();
		//$output[]	=	jr_gettext('_JOMRES_FUNKYSEARCH_INSTRUCTIONS',_JOMRES_FUNKYSEARCH_INSTRUCTIONS);

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
