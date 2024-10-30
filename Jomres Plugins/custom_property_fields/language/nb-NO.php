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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Egendefinerte eiendomsfelt");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Rediger tilpasset eiendomsfelt");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Bruk denne funksjonen til å opprette egendefinerte informasjonsfelt for eiendommer. Denne informasjonen legges til av en eiendomsforvalter og vises i en ny fane på siden med eiendomsdetaljer.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Annen eiendomsinformasjon");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Disse egendefinerte eiendomsfeltene kan vises i eiendomsdetaljer i en separat fane eller i eiendomslisten. Du må manuelt redigere /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (for eiendomslisten) for å oppnå det oppsettet du trenger. Med feltene som angitt ovenfor, et grunnleggende oppsett vil se omtrent slik ut, som du kan bruke som et eksempel som du kan bygge din egen layout på. ");