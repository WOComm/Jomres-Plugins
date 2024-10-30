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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Polja prilagođenih svojstava");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Uređivanje polja prilagođenog svojstva");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Koristite ovu značajku za stvaranje prilagođenih polja s podacima za svojstva. Ove podatke dodaje upravitelj nekretnine i prikazuju ih na novoj kartici na stranici s pojedinostima o svojstvu.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Ostali podaci o nekretnini");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Ova prilagođena polja svojstva mogu se prikazati u detaljima svojstva na zasebnoj kartici ili na popisu svojstava. Morat ćete ručno urediti /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (za isječak popisa svojstava) da biste postigli izgled koji vam je potreban. Uz polja koja ste unijeli gore, osnovni izgled izgledao bi otprilike ovako, što možete koristiti kao primjer iz kojeg možete izgraditi vlastiti izgled. ");