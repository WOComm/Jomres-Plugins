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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Vlastné polia vlastností");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Upraviť pole vlastnej vlastnosti");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Túto funkciu použite na vytváranie vlastných informačných polí pre vlastnosti. Tieto informácie pridá správca vlastností a zobrazia sa na novej karte na stránke podrobností o majetku.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Ďalšie informácie o majetku");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Tieto polia vlastných vlastností je možné zobraziť v podrobnostiach o vlastnosti na oddelenej karte alebo v zozname vlastností. Budete musieť manuálne upraviť /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (pre úryvok zoznamu vlastností) na dosiahnutie požadovaného rozloženia. S poliami zadanými vyššie, základné rozloženie bude vyzerať asi takto, ktoré môžete použiť ako príklad, z ktorého si môžete vytvoriť vlastné rozloženie. ");