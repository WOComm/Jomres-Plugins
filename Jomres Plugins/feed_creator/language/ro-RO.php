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


jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "Feed RSS");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Acest plugin creează un feed din toate proprietățile jomres. În prezent sunt acceptate formatele de sindicare RSS 1.0 și RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Numele fluxului");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Descrierea fluxului");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Nume fișier feed (fără spații)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "Format de sindicalizare");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Timp cache (în secunde)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Adresa URL a imaginii de feed");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Truncați descrierea proprietății?");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "Trunchie după (caractere)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Afișați imaginea feedului?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Afișați imaginea proprietății?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "Arată orașul proprietății?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Afișați regiunea proprietății?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "Afișați țara proprietății?");
jr_define ('_JRPORTAL_FEED_CREATOR_HITEMS', "Limitați numărul de proprietăți sindicate la");