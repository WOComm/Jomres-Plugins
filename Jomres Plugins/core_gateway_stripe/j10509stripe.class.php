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


class j10509stripe
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$plugin = "stripe";
		$image = '<img src="'.get_showtime('eLiveSite').'j00510'.$plugin.'.gif" alt="$plugin" />';

		$this->retVals= array ("name" => "stripe" , "friendlyname" => $gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false), "image"=>$image );
		}

	function touch_template_language()
		{
		$plugin="paypal";
		echo jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin));
		}

	function getRetVals()
		{
		return $this->retVals;
		}
	}
