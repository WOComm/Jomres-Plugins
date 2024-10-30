<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2013 Aladar Barthi
**/

if (!defined('JOMRES_INSTALLER')) exit;

$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
$jrConfig = $siteConfig->get();

if (!isset($jrConfig['useful_links_realestate'])) {
	$siteConfig->insert_new_setting('useful_links_realestate', '');
}

if (!isset($jrConfig['useful_links_mrp'])) {
	$siteConfig->insert_new_setting('useful_links_mrp', '');
}

if (!isset($jrConfig['useful_links_srp'])) {
	$siteConfig->insert_new_setting('useful_links_srp', '');
}
