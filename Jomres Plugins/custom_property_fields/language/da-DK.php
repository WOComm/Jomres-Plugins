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


jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Tilpassede ejendomsfelter");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Rediger tilpasset ejendomsfelt");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Brug denne funktion til at oprette brugerdefinerede informationsfelter for ejendomme. Disse oplysninger tilføjes af en ejendomsadministrator og vises i en ny fane på ejendomsoplysningssiden.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Andre ejendomsoplysninger");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Disse tilpassede ejendomsfelter kan vises i ejendomsdetaljer i en adskilt fane eller i egenskabsliste. Du skal manuelt redigere /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (for egenskabslistefragmentet) for at opnå det ønskede layout. Med felterne som angivet ovenfor, et grundlæggende layout ville se sådan ud som følgende, som du kan bruge som et eksempel, hvorfra du kan bygge dit eget layout. ");