<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS-feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Dette plugin opretter et feed fra alle jomres-ejendomme. I øjeblikket understøttes RSS 1.0 og RSS 2.0 syndikeringsformater.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feednavn");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Feedbeskrivelse");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feed filnavn (ingen mellemrum)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Syndikeringsformat");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Cachetid (i sekunder)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Feedbillede URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Trunkere egenskabsbeskrivelse?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Trunker efter (tegn)");
jr_define ('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', "Vis feedbillede?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Vis egenskabsbillede?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "Vis ejendomsby?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Vis egenskabsområde?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Vis ejendomsland?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Begræns antallet af syndikerede ejendomme til");