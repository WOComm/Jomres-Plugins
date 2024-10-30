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


jr_define ('_DEEPL_TITLE', "DeepL -oversættelser");
jr_define ('_DEEPL_DESCRIPTION', "DeepL er en online oversættelsestjeneste til en rimelig pris, som du kan bruge til automatisk at oversætte Jomres-sprogstrenge. Disse oversættelser, når de først er modtaget fra DeepL-tjenesten, gemmes lokalt, og du kan bruge funktionen Etiketoversættelser til at forfine dem. Dette fremskynder betydeligt processen med at få dit websted til at fungere med flere sprog. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Understøttet sprog </a> ");
jr_define ('_DEEPL_API_KEY_SETTING', "DeepL Authentication Key");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Du skal bruge en gyldig API-nøgle fra <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </a > Når du har tilmeldt dig, finder du godkendelsesnøglen i <a href='https://www.deepl.com/da/pro-account/' target='_blank'> din konto. </a> Efter dig har gemt nøglen i Jomres, dit websted kan bremse et stykke tid, da der vil være mange oversættelser, der skal trækkes fra DeepL -tjenesten. Vær tålmodig og genindlæs siden et par gange. Bagefter kan du finjustere tilpasningerne på siden med oversættelser til etiketter. ");