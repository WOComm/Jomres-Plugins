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
jr_define('_CLONE_TARIFFS_TITLE',"Klontariffer");
jr_define('_CLONE_TARIFFS_INFO',"Her kan du klone en tariff fra en målegenskap til en kildeeiendom. Bare eiendommer som du har autoritet til å administrere vil være tilgjengelige for deg.");
jr_define('_CLONE_TARIFFS_SOURCE',"Kildeegenskap");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tariff for å klone");
jr_define('_CLONE_TARIFFS_TARGET',"Målegenskap");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Måleiendom romtype");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Hvis Target-egenskapens tariffredigeringsmodus er forskjellig fra Source-egenskapens tariffredigeringsmodus, vil målegenskapens opprinnelige tariffer slettes når kloningen finner sted, og dens tariffredigeringsmodus endres for å gjenspeile kilden. eiendommens innstilling.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Slette eksisterende tariffer på måleiendom?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Hvis Target-egenskapens tariffredigeringsmodus er den samme som Source-egenskapen, vil de eksisterende tariffene ikke bli slettet. Du kan imidlertid velge å overstyre dette ved å sette dette alternativet til Ja.");