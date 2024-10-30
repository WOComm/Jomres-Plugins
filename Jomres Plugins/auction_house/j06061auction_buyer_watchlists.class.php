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

class j06061auction_buyer_watchlists
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$thisJRUser=jomres_getSingleton('jr_user');
		$output=array();
		$pageoutput = array();
		$rows=array();
		
		$output['_JOMRES_AUCTIONHOUSE_LISTS']=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS','_JOMRES_AUCTIONHOUSE_LISTS',false,false);
		$output['_JOMRES_AUCTIONHOUSE_LISTS_COUNT']=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_COUNT','_JOMRES_AUCTIONHOUSE_LISTS_COUNT',false,false);
		
		$wl_object = jomres_getSingleton('jomres_auctionhouse_watchlists');
		$lists = $wl_object->get_users_watchlists($thisJRUser->id);
		if (!empty($lists))
			{
			foreach ($lists as $list)
				{
				$r=array();
				$r['LISTLINK'] = JOMRES_AUCTIONHOUSE_URL.'&ahtask=auction_buyer_watchlists_watcheditems&watchlist_id='.$list['id'];
				$r['COUNT'] = $wl_object->get_count_for_users_watchlist($list['id']);
				$r['LISTNAME']= $list['listname'];
				$rows[]=$r;
				}

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
			$tmpl->readTemplatesFromInput( 'auctionbuyer_watchlists.html' );
			$tmpl->addRows( 'pageoutput',$pageoutput );
			$tmpl->addRows( 'rows',$rows );
			$tpl=$tmpl->getParsedTemplate();
			$this->ret_vals=$tpl;
			}
		else
			$this->ret_vals = jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS','_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',false,false);
		}

	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS','_JOMRES_AUCTIONHOUSE_LISTS');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS','_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS');
		$output[]=jr_gettext('_JOMRES_AUCTIONHOUSE_LISTS_COUNT','_JOMRES_AUCTIONHOUSE_LISTS_COUNT');
		
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
