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

class j06060auction_index
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
		
		$jomres_auctionhouse_auctions =jomres_getSingleton('jomres_auctionhouse_auctions');
		$running_auctions = $jomres_auctionhouse_auctions->get_all_running_auctions();
		$output['ACTIVE_AUCTIONS_OUTPUT'] = $jomres_auctionhouse_auctions->build_auction_list($running_auctions);
		
		
		$ahjavascript = get_showtime('ahjavascript');
		set_showtime('ahjavascript',$ahjavascript."");
		
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($ePointFilepath.JRDS.'templates');
		$tmpl->readTemplatesFromInput( 'auction_index.html' );
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
