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
jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "RSS Feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Denne plugin oppretter en feed fra alle jomres eiendommer. For øyeblikket støttes RSS 1.0 og RSS 2.0 syndikeringsformater.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feednavn");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Feedbeskrivelse");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feedfilnavn (ingen mellomrom)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Syndikeringsformat");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Cachetid (i sekunder)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "Feed image URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Truncate egenskapsbeskrivelse?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Kutt av etter (tegn)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Vis feedbilde?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Vis egenskapsbilde?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Vis eiendomsby?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Vis eiendomsregion?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Vis eiendomsland?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Begrens antall syndikerte eiendommer til");