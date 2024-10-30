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


jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Standard egenskabsindstillinger");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "General Config title (hvis tilgængelig, nogle er muligvis ikke)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Variabelnavn");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Aktuel værdi");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Dette er en avanceret funktion, hvis du ikke har en bestemt anvendelse til den, er det bedre, at du ikke bruger den. Dette plugin giver dig mulighed for at ændre standardværdierne for en ny ejendom. sikker på, at du forstår, hvad variablen gør, før du ændrer den, da den ændres her, kan have vidtrækkende påvirkninger på dit Jomres -system. Blanke emner er generelt ældre indstillinger, der ikke bruges mere, men efterlades på stedet af bagudkompatible årsager, eller er indstillinger, der kan ikke ændres via egenskabskonfigurationsområdet. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Ny værdi");