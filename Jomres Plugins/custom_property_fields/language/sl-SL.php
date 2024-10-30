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



jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Polja lastnosti po meri");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Urejanje polja lastnosti po meri");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Uporabite to funkcijo za ustvarjanje podatkovnih polj po meri za lastnosti. Te podatke doda upravitelj nepremičnine in jih prikaže na novem zavihku na strani s podrobnostmi o lastnostih.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Druge informacije o nepremičninah");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Ta polja lastnosti po meri so lahko prikazana v podrobnostih lastnosti na ločenem zavihku ali na seznamu lastnosti. Ročno boste morali urediti /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (za delček seznama lastnosti), da dosežete želeno postavitev. osnovna postavitev bi izgledala nekako takole, kar lahko uporabite kot primer, iz katerega lahko sestavite svojo postavitev. ");