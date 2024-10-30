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

jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Proširene karte");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Širina karte (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Visina karte (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Razina zumiranja karte");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Nadjačati zadani popis svojstava Jomresa?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Ikona markera ostalih događaja/atrakcija");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Širina skočnih prozora (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Širina slike (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Visina slike (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Prikaži opis svojstva? (samo za skočne prozore za iznajmljivanje)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Obriši opis nekretnine? (samo za skočne prozore za iznajmljivanje)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Odrežite opis svojstva nakon (znakovi) (samo za skočne prozore za iznajmljivanje)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Grupni markeri");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Prikazuje kartu sa zbirkama nekretnina i lokalnim događajima/atrakcijama.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Određene vrste svojstava koje želite prikazati. Odvojene zarezima.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Prikaži svojstva? Postavite na 0 kako biste spriječili njihovo prikazivanje.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Prikaži događaje? Postavite na 0 da biste spriječili njihovo prikazivanje.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Prikaži atrakcije? Postavite na 0 da biste spriječili njihovo prikazivanje.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO kôd zemlje. Koristite ovu opciju da ograničite kartu na jednu državu.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Postavite id regije da ograniči rezultate na svojstva u određenoj regiji.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Postavite naziv grada kako biste ograničili rezultate na svojstva u određenom gradu.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
