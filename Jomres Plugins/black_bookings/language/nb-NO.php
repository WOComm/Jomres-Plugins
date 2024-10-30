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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Enkel bestilling");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Svarte bestillinger er bestillinger som opptar et rom, rom eller en eiendom, men som ikke har noen fakturerings- eller fakturadata. Vanligvis brukes de til å indikere bestillinger som er gjort via et annet medium (f.eks. telefon). Du vil opprette svarte bestillinger for å sikre at disse ressursene ikke kan bestilles online, verken av eiendomsforvalteren eller en gjest. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Du må velge minst ett rom.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Med hell bestilt.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Kunne ikke bookes da den allerede har en bestilling i løpet av denne tidsrammen.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Rom blokkert av");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Bruk denne kalenderen til å enkelt svarte bokressurser. Velg et eller flere rom, klikk deretter på den første og siste datoen for den svarte bestillingen, og ressursene blir svart booket. Hvis den svarte bestillingen er for bare ett dato, og klikk deretter på datoen to ganger. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Bruk denne kalenderen til å enkelt svarte bokressurser. Klikk på den første og siste datoen for den svarte bestillingen, og ressursene blir svart booket. Hvis den svarte bestillingen er for bare en dato, klikker du den datoen to ganger . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Legg til alle");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Fjern alle");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "elementer valgt");