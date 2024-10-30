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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Upravljanje kanala");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Odjemalec lahko izvaja dejavnosti upravljanja kanalov. Upoštevajte, da to daje odjemalcu v sistemu veliko moč za spreminjanje vaših računov in lastnosti.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Čiščenje");

jr_define ('_CMF_CANCELLED_BOOKING', "Upravitelj kanala je preklical rezervacijo");

jr_define ('_CMF_CLEANING_STRING', "Čiščenje"); // Ne spreminjajte tega, če ste že uvozili lastnosti. Nepremičnine s pristojbinami za čiščenje imajo Extra s tem imenom
jr_define ('_CMF_SECURITY_STRING', "Varščina"); // Ne spreminjajte tega, če ste že uvozili lastnosti. Nepremičnine z varščino imajo Extra s tem imenom


jr_define ('_CMF_API_PRIVACY', "Zasebnost API -ja");
jr_define ('_CMF_API_PRIVACY_ON', "Zasebnost vklopljena");
jr_define ('_CMF_API_PRIVACY_OFF', "Zasebnost izklopljena");

jr_define ('_CMF_API_PRIVACY_DESC', "Podatke o lastnostih lahko vidi samo kanal, ki jih je ustvaril. Če ste na primer kanalu A in kanalu B dali različne pare ključev API, podatki o lastnosti, ki jih je ustvaril kanal A, ne morejo lahko vidi kanal B ... razen če izklopite zasebnost API -ja, da vsem kanalom omogočite ogled vseh informacij o lastnostih prek API -ja. Zasebnost API -ja nastavite na Izklopljeno, če delite to znamko z drugim spletnim mestom, ki želi lastnost navesti. Če te lastnosti ne delite z nobenim drugim spletnim mestom, pustite zasebnost API nastavljeno na Vklopljeno. ");