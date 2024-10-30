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


jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.net syndikeringsfunktionen är ny funktionalitet som är utformad för att dela egenskaper mellan webbplatser även om bokningar bara kan göras på hemservern.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Syftet med detta är att göra det möjligt för webbplatser att bygga upp förtroende med sökmotorer. Det är en gratis funktion som är tillgänglig för alla Jomres -användare. Aktiva Jomres -licensinnehavare kan, om de vill välja att ta bort sina webbplats från syndikeringsnätverket via den här sidan. Localhost kan inte läggas till i nätverket, och om det av någon anledning finns problem med anslutning kommer du inte att kunna lägga till din webbplats i nätverket. Kontrollera REST API -anslutningstestsidan om du är i tvivel. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Klicka på den här länken för att ta bort din webbplats från nätverket.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Klicka på den här länken för att lägga till din webbplats i nätverket.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Ta bort den här webbplatsen från nätverket");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Lägg till den här webbplatsen i nätverket");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Tyvärr, din supportnyckel är inte giltig eller är inte aktiv, du kan inte ändra syndikeringsstatus för denna installation.");