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
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Vlastní pole vlastností");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Upravit pole vlastní vlastnosti");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Tuto funkci použijte k vytvoření vlastních informačních polí pro vlastnosti. Tyto informace přidá správce vlastností a zobrazí se na nové kartě na stránce podrobností o nemovitosti.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Další informace o majetku");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Tato pole vlastních vlastností lze zobrazit v podrobnostech o vlastnostech na samostatné kartě nebo v seznamu vlastností. Budete muset ručně upravit /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (pro fragment seznamu vlastností) k dosažení požadovaného rozvržení. S poli, jak je uvedeno výše, základní rozložení by vypadalo nějak takto, které můžete použít jako příklad, ze kterého si můžete vytvořit vlastní rozložení. ");