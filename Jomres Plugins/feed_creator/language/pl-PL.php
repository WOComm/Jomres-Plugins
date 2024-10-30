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
jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"Kanał RSS");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Ta wtyczka tworzy kanał ze wszystkich właściwości jomres. Obecnie obsługiwane są formaty syndykacji RSS 1.0 i RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Nazwa kanału");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Opis kanału");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Nazwa pliku kanału (bez spacji)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Format dystrybucji");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Czas pamięci podręcznej (w sekundach)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"URL obrazu kanału");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Obciąć opis właściwości?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Obetnij po (znaki)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Pokaż obraz kanału?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Pokaż obraz właściwości?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Pokaż miasto nieruchomości?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Pokaż region usługi?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Pokaż kraj własności?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Ogranicz liczbę syndykowanych właściwości do");