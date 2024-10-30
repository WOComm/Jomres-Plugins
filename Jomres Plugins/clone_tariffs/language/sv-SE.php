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

jr_define('_CLONE_TARIFFS_TITLE',"Klontaxor");
jr_define('_CLONE_TARIFFS_INFO',"Här kan du klona en tariff från en målegenskap till en källegenskap. Endast egenskaper som du har behörighet att förvalta kommer att vara tillgängliga för dig.");
jr_define('_CLONE_TARIFFS_SOURCE',"Källegenskap");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Taxa för att klona");
jr_define('_CLONE_TARIFFS_TARGET',"Målegenskap");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Målfastighet rumstyp");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Om Target-egenskapens tariffredigeringsläge skiljer sig från Source-egenskapens taxeredigeringsläge kommer målegendomens ursprungliga tariffer att tas bort när kloningen äger rum och dess tariffredigeringsläge ändras för att återspegla det för Source egenskapens inställning.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Ta bort befintliga tariffer på målegendom?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Om Target-egenskapens tariffredigeringsläge är detsamma som Source-egenskapen kommer de befintliga tarifferna inte att tas bort. Du kan dock välja att åsidosätta detta genom att sätta detta alternativ till Ja.");
