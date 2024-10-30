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


class j06000lucky_dip
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false;

				$this->shortcode_data = array (
					"task" => "lucky_dip",
					"info" => "JOMRES_SHORTCODES_06000LUCKYDIP"
				);
			return;
			}
		
		$this->retVals = '';
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		$currency_codes = jomres_singleton_abstract::getInstance('currency_codes');
		$symbols = $currency_codes->getSymbol($jrConfig['globalCurrencyCode']);
		
		jr_import('jomSearch');

		$output=array();
		
		$cost						= (float)jomresGetParam( $_REQUEST, 'cost', 0.00 );
		$requested_features			= jomresGetParam( $_REQUEST, 'luckydip_features', array() );
		// Because of the way the form's written, we'll need to rejig the features array to have only selected feature ids
		// if (count($requested_features)>0)
			// {
			// $tmp=array();
			// foreach ($requested_features as $id=>$val)
				// {
				// if ($val>0)
					// $tmp[]=$id;
				// }
			// $requested_features=$tmp;
			// }
		
		$output['_JOMRES_TAGS_LUCKY_DIP']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP','_JOMRES_TAGS_LUCKY_DIP',false);
		$output['_JOMRES_TAGS_LUCKY_DIP_INFO']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_INFO','_JOMRES_TAGS_LUCKY_DIP_INFO',false);
		$output['_JOMRES_TAGS_LUCKY_DIP_COST']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_COST','_JOMRES_TAGS_LUCKY_DIP_COST',false);
		$output['_JOMRES_TAGS_LUCKY_DIP_COST_PLACEHOLDER']=jr_gettext('_JOMRES_TAGS_LUCKY_DIP_COST_PLACEHOLDER','_JOMRES_TAGS_LUCKY_DIP_COST_PLACEHOLDER',false);
		$output['CURRENCY_SYMBOL_PRE']=$symbols['pre'];
		$output['CURRENCY_SYMBOL_POST']=$symbols['post'];
		
		if ($cost>0.00)
			$output['COST']=$cost;
		
		$features = prepFeatureSearch();

		array_shift($features); // Gets rid of the "searchAll" option
		$rows=array();
		foreach ($features as $feature)
			{
			$r=array();
			$pid=$feature['id'];
			$ischecked="";
			$active='';
			
			
			if ( !empty($requested_features) )
				{
				if (in_array($pid,$requested_features) )
					{
					$ischecked='checked="checked"';
					$active=' btn-success active ';
					}
				}
			
			$r['NO']=jr_gettext('_JOMRES_COM_MR_NO','_JOMRES_COM_MR_NO',FALSE);
			$r['YES']=jr_gettext('_JOMRES_COM_MR_YES','_JOMRES_COM_MR_YES',FALSE);
			
			$r['ID']=$pid;
			$r['ACTIVE'] = $active;
			$r['CHECKED'] = $ischecked;
			$r['IMAGE'] = get_showtime('live_site').'/'.$feature['image'];
			$r['FEATURE_ABBV'] = jr_gettext('_JOMRES_CUSTOMTEXT_FEATURES_ABBV'.(int)$feature['id'],		jomres_decode($feature['title']),false,false);
			$r['FEATURE_DESC'] = jr_gettext('_JOMRES_CUSTOMTEXT_FEATURES_DESC'.(int)$feature['id'],		jomres_decode($feature['description']),false,false);
			$rows[]=$r;
			}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'lucky_dip.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		if (!isset($componentArgs['return_template']))
			echo $tmpl->getParsedTemplate();
		else
			$this->retVals = $tmpl->getParsedTemplate();
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
