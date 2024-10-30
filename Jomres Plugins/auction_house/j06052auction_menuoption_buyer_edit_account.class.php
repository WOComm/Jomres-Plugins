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

class j06052auction_menuoption_buyer_edit_account
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$this->ret_vals = array ('LINK'=>JOMRES_SITEPAGE_URL.'&task=edit_my_account','MENUOPTION'=>jr_gettext('_JOMRES_MY_ACCOUNT_EDIT','_JOMRES_MY_ACCOUNT_EDIT',false,false),'JAVASCRIPT'=>'');
		}

	function touch_template_language()
		{
		$output=array();
		$output[]	=	jr_gettext('_JOMRES_MY_ACCOUNT_EDIT','_JOMRES_MY_ACCOUNT_EDIT');

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
