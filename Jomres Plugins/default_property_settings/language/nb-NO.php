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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Standard eiendomsinnstillinger");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Generell konfigttittel (hvis tilgjengelig, noen er det kanskje ikke)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Variabelnavn");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Gjeldende verdi");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Dette er en avansert funksjon, hvis du ikke har en spesifikk bruk for den, er det bedre at du ikke bruker den. Denne pluginen lar deg endre standardverdiene for en ny eiendom. Lag sikker på at du forstår hva variabelen gjør før du endrer den fordi den endres her kan ha vidtrekkende innvirkning på Jomres -systemet ditt. Blanke elementer er vanligvis eldre innstillinger som ikke brukes lenger, men som blir liggende på stedet av bakoverkompatibilitetshensyn, eller er innstillinger som kan ikke endres via egenskapskonfigurasjonsområdet. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Ny verdi");