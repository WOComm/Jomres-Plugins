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

class j06050auction_head
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$output=array();
		$pageoutput = array();
		$everybody_rows = array();
		$buyer_rows = array();
		$seller_rows = array();
		$buyer_rows_title = array();
		$seller_rows_title = array();
		$everybody_rows_title = array();

		$output['AJAXURL']=JOMRES_AUCTIONHOUSE_URL_AJAX;
		$output['LIVESITE']=JOMRES_AUCTIONHOUSE_URL;

		
		$MiniComponents->triggerEvent('06051'); //
		$mcOutput=$MiniComponents->getAllEventPointsData('06051');
		
		if (!empty($mcOutput))
			{
			$everybody_rows_title[] = array ('TITLE'=>jr_gettext('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME','_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',false,false),'HOMELINK'=>'#');
			foreach ($mcOutput as $key=>$val)
				{
				$r=array();
				if ($val)
					{
					$r["LINK"]=$val['LINK'];
					$r["MENUOPTION"]=$val['MENUOPTION'];
					$r["JAVASCRIPT"]=$val['JAVASCRIPT'];
					$everybody_rows[]=$r;
					}
				}
			}

		unset($mcOutput);
		
		
		if ( JOMRES_AH_USERCANBID ) // 06051 ahtasks are reserved for registered users
			{
			$MiniComponents->triggerEvent('06052'); //
			$mcOutput=$MiniComponents->getAllEventPointsData('06052');
			}
		
		if (isset($mcOutput) && !empty($mcOutput))
			{
			$buyer_rows_title[] = array ('TITLE'=>jr_gettext('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE','_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',false,false),'HOMELINK'=>'#');
			foreach ($mcOutput as $key=>$val)
				{
				$r=array();
				if ($val)
					{
					$r["LINK"]=$val['LINK'];
					$r["MENUOPTION"]=$val['MENUOPTION'];
					$r["JAVASCRIPT"]=$val['JAVASCRIPT'];
					$buyer_rows[]=$r;
					}
				}
			}

		unset($mcOutput);
		
		if ( JOMRES_AH_USERCANSELL ) // 06053 ahtasks are reserved for property managers
			{
			$MiniComponents->triggerEvent('06053'); //
			$mcOutput=$MiniComponents->getAllEventPointsData('06053');
			}
		
		if (isset($mcOutput) && !empty($mcOutput))
			{
			$seller_rows_title[] = array ('TITLE'=>jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE','_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',false,false),'HOMELINK'=>'#');
			foreach ($mcOutput as $key=>$val)
				{
				$r=array();
				if ($val)
					{
					$r["LINK"]=$val['LINK'];
					$r["MENUOPTION"]=$val['MENUOPTION'];
					$r["JAVASCRIPT"]=$val['JAVASCRIPT'];
					$seller_rows[]=$r;
					}
				}

			}
	
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
		$tmpl->readTemplatesFromInput( 'auction_head.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'buyer_rows_title', $buyer_rows_title );
		$tmpl->addRows( 'seller_rows_title', $seller_rows_title );
		$tmpl->addRows( 'buyer_rows', $buyer_rows );
		$tmpl->addRows( 'seller_rows', $seller_rows );
		$tmpl->addRows( 'everybody_rows', $everybody_rows );
		$tmpl->addRows( 'everybody_rows_title', $everybody_rows_title );
		$this->ret_vals = $tmpl->getParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]	=	jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE','_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE');

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

