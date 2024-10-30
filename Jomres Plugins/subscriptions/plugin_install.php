<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

 
if (!defined('JOMRES_INSTALLER')) exit;

$cron =jomres_getSingleton('jomres_cron');
$cron->addJob("subscriptions","D","");
$cron->addJob("subscriptions_reminder","D","");

$query = 'ALTER TABLE `#__jomresportal_subscriptions` ADD `stripe_cus_id` VARCHAR(3000) DEFAULT NULL AFTER `invoice_id` ';
if (!doInsertSql($query, '')) {
	throw new Exception('Error, unable to add __jomresportal_subscriptions stripe_cus_id column');
}

$query = 'ALTER TABLE `#__jomresportal_subscriptions` ADD `stripe_sub_id` VARCHAR(3000) DEFAULT NULL AFTER `stripe_cus_id` ';
if (!doInsertSql($query, '')) {
	throw new Exception('Error, unable to add __jomresportal_subscriptions stripe_cus_id column');
}

$query = 'ALTER TABLE `#__jomresportal_subscriptions` ADD `payment_intent_id` VARCHAR(3000) DEFAULT NULL AFTER `stripe_sub_id` ';
if (!doInsertSql($query, '')) {
	throw new Exception('Error, unable to add __jomresportal_subscriptions payment_intent_id column');
}

$query = 'ALTER TABLE `#__jomresportal_subscriptions_packages` ADD `stripe_product_id` VARCHAR(3000) DEFAULT NULL AFTER `params` ';
if (!doInsertSql($query, '')) {
	throw new Exception('Error, unable to add __jomresportal_subscriptions stripe_product_id column');
}

$query = 'ALTER TABLE `#__jomresportal_subscriptions_packages` ADD `stripe_price_id` VARCHAR(3000) DEFAULT NULL AFTER `stripe_product_id` ';
if (!doInsertSql($query, '')) {
	throw new Exception('Error, unable to add __jomresportal_subscriptions stripe_price_id column');
}