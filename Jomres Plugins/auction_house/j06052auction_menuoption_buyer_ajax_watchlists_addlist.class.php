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

class j06052auction_menuoption_buyer_ajax_watchlists_addlist
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		
		$this->ret_vals = array ('LINK'=>'javascript:void(0);','MENUOPTION'=>jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_ADD','_JOMRES_AUCTIONHOUSE_LISTS_ADD',false,false),false,false,'JAVASCRIPT'=>'onclick="auction_page(\'auction_buyer_watchlists_addlist\')"');
		}

	function touch_template_language()
		{
		$output=array();
		$output[]	=	jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_ADD','_JOMRES_AUCTIONHOUSE_LISTS_ADD');

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
