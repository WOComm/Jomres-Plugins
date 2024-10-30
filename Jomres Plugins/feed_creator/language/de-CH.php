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
jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS-Feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Dieses Plugin erstellt einen Feed aus allen jomres-Eigenschaften. Derzeit werden die Syndication-Formate RSS 1.0 und RSS 2.0 unterstützt.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feedname");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Feedbeschreibung");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feeddateiname (keine Leerzeichen)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Syndication-Format");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Cachezeit (in Sekunden)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Feed-Bild-URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Eigenschaftsbeschreibung abschneiden?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Abschneiden nach (Zeichen)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Feedbild anzeigen?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Eigenschaftsbild anzeigen?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Eigenschaftsort anzeigen?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Eigenschaftsbereich anzeigen?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Land der Immobilie anzeigen?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Anzahl der syndizierten Immobilien begrenzen auf");