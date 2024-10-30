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
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Aquest connector crea un feed a partir de totes les propietats jomres. Actualment s'admeten els formats de sindicació RSS 1.0 i RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Nom del canal");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Descripció del canal");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "Nom del fitxer d'alimentació (sense espais)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Format de sindicació");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Temps de memòria cau (en segons)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"URL de la imatge del canal");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Trunar la descripció de la propietat?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Trunca després de (caràcters)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Mostra la imatge del canal?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Mostra la imatge de la propietat?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "Mostrar la ciutat propietat?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Mostrar la regió de propietat?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Mostra el país de la propietat?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Limita el nombre de propietats sindicades a");