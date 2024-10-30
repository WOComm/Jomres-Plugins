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

class j00035external_form
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		// https://www.rsjoomla.com/support/documentation/view-article/146-content-plugin-plgcontent-display-the-form-in-an-article.html
		// To add a form to a Joomla Article you would add for example {rsform 1} to the article and let the mambots do the work.
		// we will use that functionality to do something similar
		
		$mambot_code = '';
		if ($jrConfig['external_form_shortcode'] != '')
			$mambot_code .= $jrConfig['external_form_shortcode']." ";
		if ($jrConfig['external_form_arg1'] != '')
			$mambot_code .= $jrConfig['external_form_arg1']." ";
		if ($jrConfig['external_form_arg2'] != '')
			$mambot_code .= $jrConfig['external_form_arg2']." ";

		$this->retVals = jomres_cmsspecific_parseByBots( $mambot_code );
		
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
