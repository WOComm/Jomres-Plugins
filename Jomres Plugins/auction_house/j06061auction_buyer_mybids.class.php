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

class j06061auction_buyer_mybids
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		$ePointFilepath=get_showtime('ePointFilepath');
		$output=array();
		$pageoutput = array();
		$rows=array();

		$jomres_auctionhouse_auctions = jomres_getSingleton('jomres_auctionhouse_auctions');
		$auction_details=$jomres_auctionhouse_auctions->get_all_auctions_buyer_has_bid_on($thisJRUser->id);
		$output['ACTIVE_AUCTIONS_OUTPUT'] = $jomres_auctionhouse_auctions->build_auction_list($auction_details);
		
		$ahjavascript = get_showtime('ahjavascript');
		set_showtime('ahjavascript',$ahjavascript."");

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates');
		$tmpl->readTemplatesFromInput( 'auction_index.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$this->ret_vals = $tmpl->getParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST','_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST');
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
