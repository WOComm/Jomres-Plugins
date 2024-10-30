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


jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS-flöde");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Denna plugin skapar ett flöde från alla jomres-egendomar. För närvarande stöds RSS 1.0 och RSS 2.0 syndikeringsformat.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "Flödesnamn");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Flödesbeskrivning");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Flödesfilnamn (inga mellanslag)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "Syndikeringsformat");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Cachetid (i sekunder)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Flödesbild-URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Trunkera egenskapsbeskrivning?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Trunkera efter (tecken)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Visa flödesbild?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Visa egenskapsbild?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Visa fastighetens stad?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Visa egenskapsregion?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Visa fastighetsland?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Begränsa antalet syndikerade egenskaper till");