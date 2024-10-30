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



jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Razširjeni zemljevidi");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Širina zemljevida (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Višina zemljevida (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Raven povečave zemljevida");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Preglasi privzeti seznam lastnosti Jomresa?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Ikona označevalnika drugih dogodkov/zanimivosti");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Širina pojavnih oken (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Širina slike (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Višina slike (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Prikaži opis lastnosti? (samo za pojavna okna za najem)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Odreži opis lastnosti? (samo za pojavna okna za najem)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Odreži opis lastnosti za (znaki) (samo za pojavna okna za najem)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Skupinski označevalci");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Prikaže zemljevid z zbirkami nepremičnin in lokalnimi dogodki/zanimivostmi.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Določite vrste lastnosti, ki jih želite prikazati. Vejice ločene.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Prikaži lastnosti? Nastavite na 0, da preprečite njihov prikaz.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Prikaži dogodke? Nastavite na 0, da preprečite njihovo prikazovanje.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Prikaži znamenitosti? Nastavite na 0, da preprečite njihov prikaz.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Koda države ISO. S to možnostjo omejite zemljevid na eno državo.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Nastavite id regije, da omeji rezultate na lastnosti v določeni regiji.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Nastavite ime mesta za omejitev rezultatov na lastnosti v določenem mestu.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
