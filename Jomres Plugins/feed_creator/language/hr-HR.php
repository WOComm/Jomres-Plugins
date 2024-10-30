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

jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "RSS feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Ovaj dodatak stvara feed iz svih jomres svojstava. Trenutno su podržani RSS 1.0 i RSS 2.0 formati sindikacije.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Naziv feeda");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC', "Opis feeda");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Naziv datoteke feeda (bez razmaka)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Format sindikacije");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Vrijeme predmemorije (u sekundama)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "URL slike feeda");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "Skraćivanje opisa nekretnine?");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "Skraći nakon (znakova)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Prikaži sliku feeda?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', "Prikaži sliku svojstva?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Prikaži grad posjeda?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Prikaži regiju svojstva?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Prikaži zemlju svojstva?");
jr_define ('_JRPORTAL_FEED_CREATOR_HITEMS', "Ograniči broj sindikalnih posjeda na");