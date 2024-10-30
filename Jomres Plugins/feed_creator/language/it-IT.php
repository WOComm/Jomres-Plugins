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

jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"Feed RSS");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Questo plugin crea un feed da tutte le proprietà di jomres. Attualmente sono supportati i formati di syndication RSS 1.0 e RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Nome feed");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Descrizione del feed");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Nome file feed (senza spazi)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Formato di syndication");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Tempo cache (in secondi)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"URL immagine feed");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Troncare descrizione proprietà?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Tronca dopo (caratteri)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Mostra immagine feed?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Mostra immagine proprietà?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Mostra città proprietà?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Mostra regione proprietà?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Mostra paese proprietà?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Limita il numero di proprietà in syndication a");