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


class j06000random_review_inna_module{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			$this->shortcode_data = array (
				"task" => "show_cart",
				"info" => "_JOMRES_SHORTCODES_06000SHOW_CART",
				"arguments" => array ()
				);
			return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$query = "SELECT review_title,item_id,review_description,rating FROM #__jomres_reviews_ratings WHERE published = '1' AND rating > 5 ORDER BY RAND() LIMIT 1";
		$result = doSelectSql($query,2);

		$star = JOMRES_IMAGES_RELPATH.'star.png';
		$quote_open = "<img src='".get_showtime('live_site')."/".JOMRES_ROOT_DIRECTORY."/core-plugins/random_review_inna_module/quote_open.png' />";
		$quote_close =  "<img src='".get_showtime('live_site')."/".JOMRES_ROOT_DIRECTORY."/core-plugins/random_review_inna_module/quote_close.png' />";
		
		$property_name = getPropertyName($result['item_id']);
		
		$stars = "";
		for ($i=1;$i<=$result['rating'];$i++)
			$stars .='<img src = "'.$star.'" />';
		
		$output = array("STARS"=>$stars);
		$output['PROPERTY_NAME']=$property_name;
		$output['_JOMRES_REVIEWS_TITLE']=jr_gettext('_JOMRES_REVIEWS_TITLE','_JOMRES_REVIEWS_TITLE',false,false);
		$output['REVIEW_TITLE']=$result['review_title'];
		$output['_JOMRES_REVIEWS_REVIEWBODY_SAID']=jr_gettext('_JOMRES_REVIEWS_REVIEWBODY_SAID','_JOMRES_REVIEWS_REVIEWBODY_SAID',false);
		$output['QUOTE_OPEN']=$quote_open;
		$output['QUOTE_CLOSE']=$quote_close;
		$output['REVIEW_DESCRIPTION']=$result['review_description'];
		$output['_JOMRES_COM_A_CLICKFORMOREINFORMATION']=jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',$editable=false);
		$output['MOREINFORMATIONLINK']=get_property_details_url($result['item_id']);

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'random_review.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		}

	function getRetVals()
		{
		return null;
		}
	}
