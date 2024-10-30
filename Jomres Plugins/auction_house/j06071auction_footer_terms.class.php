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

class j06071auction_footer_terms
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$this->ret_vals = array ('LINK'=>JOMRES_AUCTIONHOUSE_URL.'&ahtask=auction_terms','LINK_TEXT'=>jr_gettext('_JOMRES_AUCTIONHOUSE_TERMS_LINK','_JOMRES_AUCTIONHOUSE_TERMS_LINK',false,false));
		}

	function touch_template_language()
		{
		$output=array();
		$output[] =jr_gettext('_JOMRES_AUCTIONHOUSE_TERMS_LINK','_JOMRES_AUCTIONHOUSE_TERMS_LINK');

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
