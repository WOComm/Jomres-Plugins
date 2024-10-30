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
jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS-hírcsatorna");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS' , "Ez a bővítmény hírcsatornát hoz létre az összes jomres tulajdonságból. Jelenleg az RSS 1.0 és az RSS 2.0 terjesztési formátumok támogatottak.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Hírcsatorna neve");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Hírcsatorna leírása");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feed fájlnév (szóközök nélkül)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Terjesztési formátum");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Gyorsítótár ideje (másodpercben)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "Feed kép URL -je");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Tulajdonság leírásának csonkolása?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Csonkolás a (karakterek) után");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Megjeleníti a hírfolyam képét?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Tulajdonkép megjelenítése?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Az ingatlan városának megjelenítése?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Tulajdonság régiójának megjelenítése?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "Megjeleníti az ingatlan országát?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"A szindikált tulajdonságok számának korlátozása ide:");