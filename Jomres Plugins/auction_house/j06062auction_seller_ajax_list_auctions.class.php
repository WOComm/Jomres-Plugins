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

class j06062auction_seller_ajax_list_auctions
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$output=array();
		$pageoutput = array();
		$rows = array();
		
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS','_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',false,false);
		$output['_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS','_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',false,false);
		
		$thisJRUser=jomres_getSingleton('jr_user');
		$this->ret_vals = '';
		$jomres_auctionhouse_auctions =jomres_getSingleton('jomres_auctionhouse_auctions');
		
		$running_auctions = $jomres_auctionhouse_auctions->get_all_running_auctions_for_user($thisJRUser->id);
		$output['ACTIVE_AUCTIONS_OUTPUT'] = $jomres_auctionhouse_auctions->build_auction_list($running_auctions);
		
		$running_auctions = $jomres_auctionhouse_auctions->get_all_finished_auctions_for_user($thisJRUser->id);
		$output['FINISHED_AUCTIONS_OUTPUT'] = $jomres_auctionhouse_auctions->build_auction_list($running_auctions);

		$ahjavascript = get_showtime('ahjavascript');
		set_showtime('ahjavascript',$ahjavascript."");
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
		$tmpl->readTemplatesFromInput( 'auction_seller_ajax_list_auctions.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$this->ret_vals = $tmpl->getParsedTemplate();
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
