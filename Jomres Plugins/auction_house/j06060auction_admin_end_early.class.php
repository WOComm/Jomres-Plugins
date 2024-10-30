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

class j06060auction_admin_end_early
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$auction_id				= (int)jomresGetParam( $_REQUEST, 'auction_id', 0 );
		$thisJRUser=jomres_getSingleton('jr_user');
		if ($thisJRUser->superPropertyManager)
			{
			jr_import('jomres_auction');
			$auction = new jomres_auction();
			$auction->id = $auction_id;
			$auction->getAuction();
			$auction->markAuctionEndedNow();
			$ahjavascript = get_showtime('ahjavascript');
			$js_to_run_on_render = "window.location.href='".JOMRES_AUCTIONHOUSE_URL."&ahtask=auction_view_auction&auction_id=".$auction_id."'";
			set_showtime('ahjavascript',$ahjavascript.$js_to_run_on_render);
			$this->ret_vals = '';
			}
		}

	function touch_template_language()
		{
		$output=array();
		//$output[]	=	jr_gettext('_JOMRES_FUNKYSEARCH_INSTRUCTIONS','_JOMRES_FUNKYSEARCH_INSTRUCTIONS');

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
