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

class j06070auction_foot
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
		
		$output['_JOMRES_AUCTIONHOUSE_TERMS_LINK'] = jr_gettext('_JOMRES_AUCTIONHOUSE_TERMS_LINK','_JOMRES_AUCTIONHOUSE_TERMS_LINK',false,false);
		
		$MiniComponents->triggerEvent('06071'); //
		$mcOutput=$MiniComponents->getAllEventPointsData('06071');
		
		if (!empty($mcOutput))
			{
			foreach ($mcOutput as $key=>$val)
				{
				$r=array();
				$r["LINK"]=$val['LINK'];
				$r["LINK_TEXT"]=$val['LINK_TEXT'];
				$rows[]=$r;
				}
			}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
		$tmpl->readTemplatesFromInput( 'auction_foot.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$this->ret_vals = $tmpl->getParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();
		$output[]	=	jr_gettext('_JOMRES_FUNKYSEARCH_INSTRUCTIONS','_JOMRES_FUNKYSEARCH_INSTRUCTIONS');
		
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
