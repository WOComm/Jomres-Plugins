<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

if (!defined('JOMRES_INSTALLER')) exit;

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();
		
if (!isset($jrConfig['idev_affiliates_pathtosalephp'])) {
	$siteConfig->insert_new_setting('idev_affiliates_pathtosalephp', '');
}

if (!isset($jrConfig['idev_affiliates_profile'])) {
	$siteConfig->insert_new_setting('idev_affiliates_profile', '');
}
