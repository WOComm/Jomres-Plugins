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

jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Clone property");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Velg eiendommen du vil klone:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Navn på ny eiendom:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Vær oppmerksom på at klonegenskaper ikke har noen tariffer, du bør bruke klon -tariff -pluginet hvis du ønsker å kopiere tariffer, eller opprette tariffer manuelt. Ingen plugin -innstillinger importeres, hvis tilgjengelig. Egenskapen er ikke referert til kryss. med alle eiendomsforvaltere. <br/> Kloneiendom bør bare brukes til å duplisere en eiendom når den nye eiendommen deretter vil bruke samme eiendomstype og romtype. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Eiendom klonet");