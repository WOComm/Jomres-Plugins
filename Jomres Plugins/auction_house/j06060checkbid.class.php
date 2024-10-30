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

class j06060checkbid
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		$auction_id = (int)$_REQUEST['auction_id'];
		$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');

		jr_import('jomres_auction');
		$auction = new jomres_auction();
		$auction->id = $auction_id;
		$result = $auction->getAuction();

 		$status =  $ah_object->get_bid_status($auction->id,$thisJRUser->id);

		if ((int)$status['status'] == 1)
			{
			$ahjavascript = get_showtime('ahjavascript');
			$js_to_run_on_render = '';
			set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);
			$this->ret_vals = "1^";
			}
		else
			$this->ret_vals = "0^";
		$interval_obj = $ah_object->calculate_time_to_finish($auction->end_date);
		$this->ret_vals .=$ah_object->output_time_to_finish($interval_obj);
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
