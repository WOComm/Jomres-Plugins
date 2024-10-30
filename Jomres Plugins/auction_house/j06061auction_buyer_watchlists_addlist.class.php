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

class j06061auction_buyer_watchlists_addlist
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$pageoutput = array();
		$output = array();
		
		
		$output['_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME']=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME','_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME');
		$output['_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST']=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST','_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST');
		
		
		
		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
		$tmpl->readTemplatesFromInput( 'auction_buyer_watchlists_addlist.html' );
		$tmpl->addRows( 'pageoutput',$pageoutput );
		$tmpl->addRows( 'rows',$rows );
		$tpl=$tmpl->getParsedTemplate();
		$this->ret_vals=$tpl;
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME','_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST','_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST');
		
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
