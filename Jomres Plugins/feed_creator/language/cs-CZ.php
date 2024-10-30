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
jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS zdroj");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Tento plugin vytváří zdroj ze všech vlastností jomres. Aktuálně jsou podporovány syndikační formáty RSS 1.0 a RSS 2.0.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "Název zdroje");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Popis zdroje");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Název souboru zdroje (bez mezer)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Formát syndikace");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Cache time (in seconds)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"URL obrázku zdroje");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Zkrátit popis vlastnosti?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Zkrátit za (znaky)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Zobrazit obrázek zdroje?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Zobrazit obrázek vlastnosti?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Zobrazit město nemovitosti?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Zobrazit oblast vlastnictví?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Zobrazit zemi vlastnictví?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Omezit počet syndikovaných vlastností na");