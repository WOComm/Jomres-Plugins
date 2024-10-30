<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
if (!defined('JOMRES_INSTALLER')) exit;
$cron =jomres_getSingleton('jomres_cron');
$cron->removeJob("payment_reminder");
