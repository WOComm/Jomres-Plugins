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


jr_define ('_JOMRES_DATAWIPE_TITLE', "Data rensa");
jr_define ('_JOMRES_DATAWIPE_DESC', "Med den här funktionen kan du radera data som samlas in när bokningar görs. Den är avsedd att användas av utvecklare som har skapat mycket utvecklingsdata på sina installationer (t.ex. testbokningar, prenumerationer) och vill rensa informationen från systemet, samtidigt som fastighets- och taxainformation bibehålls. <br/> Plugin tar bort ALLA cron -loggar, användarfavoriter, anteckningar, bokningar, fakturor, prenumeranter, prenumerationer, gäster, granskningsdata, klickräkningar och recensioner. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Denna data kan bara hämtas från en säkerhetskopia av ditt system, så du måste förstå att detta är ett mycket skadligt skript. Som ett resultat rekommenderas det att när du har använt det för det är avsett syftet att du avinstallerar det igen efteråt. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Klicka för att radera data");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Tömning");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Tömdes framgångsrikt.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Det gick inte att tömma bordet.");