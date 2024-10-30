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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


class j16000save_defaultPropertySettings
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		foreach ($_POST as $k=>$v)
			{
			if ($k != 'task' && $k != 'no_html')
				{
				$v=jomresGetParam( $_POST, $k, "" );
				if (substr( $k, 4 ) =="currencyCodes")
					{
					$theArray=$_POST['cfg_currencyCodes'];
					$v=implode(",",$theArray);
					}
				$query="INSERT INTO #__jomres_settings (`property_uid`, `akey`, `value`) VALUES ('0','".substr( $k, 4 )."', '".$v."') ON DUPLICATE KEY UPDATE `value` = '".$v."' ";
				doInsertSql($query);
				}
			}

		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=defaultPropertySettings" ), '');
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}