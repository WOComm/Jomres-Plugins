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

class j06053auction_menuoption_seller_ajax_create_auction
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		
		$this->ret_vals = array ('LINK'=>'javascript:void(0);','MENUOPTION'=>jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION','_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',false,false),'JAVASCRIPT'=>'onclick="auction_page(\'auction_seller_ajax_create_auction\')"');
		}

	function touch_template_language()
		{
		$output=array();
		$output[]	=	jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION','_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION');

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
