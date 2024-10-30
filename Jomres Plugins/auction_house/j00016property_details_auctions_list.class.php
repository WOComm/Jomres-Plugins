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

class j00016property_details_auctions_list {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$jomres_auctionhouse_auctions =jomres_getSingleton('jomres_auctionhouse_auctions');
		$running_auctions = $jomres_auctionhouse_auctions->get_all_running_auctions_for_property_uid($componentArgs['property_uid']);
		if (!empty($running_auctions))
			{

			define("JOMRES_AUCTIONHOUSE_URL", JOMRES_SITEPAGE_URL.'&task=auction_house');
			define("JOMRES_AUCTIONHOUSE_URL_AJAX", JOMRES_SITEPAGE_URL_AJAX.'&no_html=1&popup=1&task=auction_house');
		
			$output = array();
			$output['ACTIVE_AUCTIONS_OUTPUT'] = $jomres_auctionhouse_auctions->build_auction_list($running_auctions);
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates' );
			$tmpl->readTemplatesFromInput( 'auction_index.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$auction_list = $tmpl->getParsedTemplate();
			
			$output = array();
			$pageoutput = array();
			
			$output['HEADER'] = jr_gettext('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO','_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO');
			$output['AUCTIONLIST']=$auction_list;
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
			$tmpl->readTemplatesFromInput( 'property_details_auctions_list.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			echo $tmpl->getParsedTemplate();
			}
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
