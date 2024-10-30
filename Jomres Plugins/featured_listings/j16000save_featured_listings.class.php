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

class j16000save_featured_listings
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$featured=array();
		$orders=array();
		if (isset($_REQUEST['idarray']) )
			{
			foreach ($_POST['idarray'] as $k=>$v)
				{
				$key=(int)$k;
				$value=(int)$v;
				$featured[$key]=$value;
				}
			}
		foreach ($_POST['orderarray'] as $k=>$v)
			{
			$key=(int)trim($k);
			$value=(int)trim($v);
			$orders[$key]=$value;
			}

		$query="DELETE FROM #__jomresportal_featured_properties";
		$result=doInsertSQL($query,"");
		if (!empty($featured))
			{
			foreach ($featured as $f)
				{
				$query="INSERT INTO #__jomresportal_featured_properties (`property_uid`,`order`) VALUES (".(int)$f.",".(int)$orders[$f].")";
				$result=doInsertSQL($query,"");
				}
			}
		
		//update the site settings
		$class = jomresGetParam($_REQUEST,'emphasis','');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$siteConfig->update_setting('featured_listings_emphasis', $class);
		
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN."&task=featured_listings" ), '');
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}