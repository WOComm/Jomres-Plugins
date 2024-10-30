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

class j06061auction_buyer_watchlists_watcheditems
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$watchlist_id = (int)$_REQUEST['watchlist_id'];
		$thisJRUser=jomres_getSingleton('jr_user');
		$output=array();
		$pageoutput = array();
		$rows=array();

		$wl_object = jomres_getSingleton('jomres_auctionhouse_watchlists');
		$jomres_auctionhouse_auctions =jomres_getSingleton('jomres_auctionhouse_auctions');
		
		$lists = $wl_object->get_users_watchlists($thisJRUser->id);
		if (!array_key_exists($watchlist_id,$lists))
			{
			$this->ret_vals = jr_gettext('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST','_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',false,false);
			}
		else
			{
			$auction_ids = $wl_object->get_auctions_for_watchlist_id($watchlist_id);

			
			$auction_details=$jomres_auctionhouse_auctions->get_auction_details_for_auction_ids($auction_ids);
			$output['ACTIVE_AUCTIONS_OUTPUT'] = $jomres_auctionhouse_auctions->build_auction_list($auction_details);

			$ahjavascript = get_showtime('ahjavascript');
			set_showtime('ahjavascript',$ahjavascript."");

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
			$tmpl->readTemplatesFromInput( 'auction_buyer_watchlists_watcheditems.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$this->ret_vals = $tmpl->getParsedTemplate();
			}
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
