<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('_JOMRES_DATAWIPE_TITLE',"Data wipe");
jr_define('_JOMRES_DATAWIPE_DESC',"This feature allows you to delete data that's collected when bookings are made. It is intended for use by developers who have created a lot of development data on their installations (such as test bookings, subscriptions) and want to wipe the information from the system, while maintaining property and tariff information.<br/> The plugin will remove ALL cron logs, user favourites, notes, bookings, invoices, subscribers, subscriptions, guests, audit data, click counts and reviews.");
jr_define('_JOMRES_DATAWIPE_WARNING',"This data can only be retrieved from a backup copy of your system, so you need to understand that this is a very damaging script. As a result, it is recommended that once you have used it for it's intended purpose that you uninstall it again afterwards.");
jr_define('_JOMRES_DATAWIPE_GO',"Click to wipe data");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"Emptying ");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"Emptied successfully.");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"Failed to empty the table.");