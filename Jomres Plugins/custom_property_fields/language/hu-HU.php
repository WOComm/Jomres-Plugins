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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Egyéni tulajdonságmezők");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Egyéni tulajdonságmező szerkesztése");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Ezzel a funkcióval egyéni információmezőket hozhat létre a tulajdonságokhoz. Ezeket az információkat egy ingatlankezelő hozzáteszi, és megjeleníti a tulajdonságok oldal új lapján.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Egyéb ingatlanadatok");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Ezek az egyéni tulajdonságmezők megjeleníthetők a tulajdonságok részleteiben egy külön lapon vagy a tulajdonságlistában. Manuálisan kell szerkesztenie a /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (a tulajdonságlista kódrészlethez) a kívánt elrendezés eléréséhez. A fent megadott mezők segítségével az alapelrendezés valahogy így nézne ki, amelyet példaként használhat, amiből saját elrendezést építhet. ");