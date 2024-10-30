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


jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Anpassade fastighetsfält");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Redigera anpassat fastighetsfält");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Använd den här funktionen för att skapa anpassade informationsfält för egenskaper. Denna information läggs till av en fastighetsansvarig och visas på en ny flik på sidan med fastighetsinformation.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Annan fastighetsinformation");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Dessa anpassade fastighetsfält kan visas i egendomsinformation på en separat flik eller i egendomslista. Du måste redigera manuellt /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (för egendomslistan) för att uppnå den layout du behöver. Med fälten enligt ovan, en grundläggande layout skulle se ut ungefär följande, som du kan använda som ett exempel från vilket du kan bygga din egen layout. ");