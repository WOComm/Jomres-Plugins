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

class j06062auction_seller_ajax_cancel_auction
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');
		$auction_id = $ah_object->get_auction_id_from_request();
		if ($auction_id > 0 )
			{
			$cancellation_check = $ah_object->check_auction_can_be_cancelled($auction_id);
			if ($cancellation_check['cancancel'])
				{
				$result = $ah_object->expire_auction_now($auction_id);
				if ($result)
					{
					$js_to_run_on_render = "window.location.href='".JOMRES_AUCTIONHOUSE_URL."&ahtask=auction_view_auction&auction_id=".$auction_id."'";
					set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);
					$this->ret_vals = '';
					}
				}
			}
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY','_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS','_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS');
		
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
