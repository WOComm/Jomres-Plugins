<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Standardegenskapsinställningar");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "General Config title (if available, some may not be)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Variabelnamn");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Aktuellt värde");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Detta är en avancerad funktion, om du inte har en specifik användning för den är det bättre att du inte använder den. Med det här tillägget kan du ändra standardvärdena för en ny egendom. Gör säker på att du förstår vad variabeln gör innan du ändrar den eftersom den ändras här kan ha långtgående effekter på ditt Jomres -system. tomma objekt är i allmänhet äldre inställningar som inte används längre, men lämnas på plats av bakåtkompatibla skäl, eller är inställningar som kan inte ändras via egenskapskonfigurationsområdet. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Nytt värde");