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



jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"Vir RSS");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Ta vtičnik ustvari vir iz vseh lastnosti jomres. Trenutno sta podprta formata RSS 1.0 in RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Ime vira");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Opis vira");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Ime datoteke vira (brez presledkov)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Oblika za objavo");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Čas predpomnilnika (v sekundah)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"URL slike vira");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "Skrajšaj opis nepremičnine?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Okrni po (znaki)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Pokaži sliko vira?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Pokaži sliko lastnosti?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Pokaži mesto lastnine?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Pokaži regijo lastnosti?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Pokaži državo lastnosti?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Omejite število združenih lastnosti na");