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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Upravljanje kanalom");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Klijent može izvoditi aktivnosti upravljanja kanalima. Imajte na umu da to daje klijentu značajnu moć u sustavu za izmjenu vaših računa i svojstava.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Čišćenje");

jr_define ('_CMF_CANCELLED_BOOKING', "Upravitelj kanala otkazao rezervaciju");

jr_define ('_CMF_CLEANING_STRING', "Čišćenje"); // Ne mijenjajte ovo ako ste već uvezli svojstva. Nekretnine s naknadama za čišćenje imaju Extra s ovim imenom
jr_define ('_CMF_SECURITY_STRING', "Sigurnosni polog"); // Ne mijenjajte ovo ako ste već uvezli svojstva. Nekretnine s depozitima imaju Extra s ovim imenom


jr_define ('_CMF_API_PRIVACY', "Privatnost API -ja");
jr_define ('_CMF_API_PRIVACY_ON', "Privatnost uključena");
jr_define ('_CMF_API_PRIVACY_OFF', "Privatnost isključena");

jr_define ('_CMF_API_PRIVACY_DESC', "Podaci o svojstvu mogu vidjeti samo kanali koji su ga stvorili. Na primjer, ako ste kanalu A i kanalu B dali različite parove ključeva API -ja, podaci o svojstvu koje je stvorio kanal A ne mogu biti vidljiv kanalu B ... osim ako isključite API privatnost kako biste omogućili svim kanalima da vide sve podatke o entitetu putem API -ja. Postavite API privatnost na Isključeno ako dijelite ovaj entitet s drugom web lokacijom koja želi popisati svojstvo. Ako ne dijelite ovo svojstvo ni s jednom drugom web lokacijom, ostavite API privatnost postavljenom na Uključeno. ");