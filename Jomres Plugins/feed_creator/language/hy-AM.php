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
jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS Feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Այս փլագինը ստեղծում է թարմացվող բովանդակություն jomres-ի բոլոր հատկություններից: Ներկայումս աջակցվում են RSS 1.0 և RSS 2.0 համակցման ձևաչափերը:");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME' , "Fed name");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC' , "Fed նկարագրություն");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME' , "Fed ֆայլի անունը (առանց բացատների)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT' , "Համախմբման ձևաչափ");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Քեշի ժամանակը (վայրկյաններով)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL' , "Fed image URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC' , "Կտրել սեփականության նկարագրությունը?");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "Կտրել (նշաններից հետո)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE' , "Ցույց տալ թարմացվող բովանդակության պատկերը?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE' , "Ցույց տալ սեփականության պատկերը?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "propertyույց տալ սեփականության քաղաքը?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION' , "Ցույց տալ սեփականության տարածաշրջանը?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY' , "Ցույց տալ սեփականության երկիրը?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Սահմանափակել սինդիկացված սեփականությունների քանակը");