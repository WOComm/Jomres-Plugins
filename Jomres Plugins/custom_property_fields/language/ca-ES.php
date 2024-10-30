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
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Camps de propietats personalitzats");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Edita el camp de la propietat personalitzada");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Utilitzeu aquesta funció per crear camps d'informació personalitzats per a les propietats. Aquesta informació l'afegeix un administrador de propietats i es mostra en una nova pestanya a la pàgina de detalls de la propietat.");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Altres dades de propietat");
jr_define ( '_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Aquests camps de propietats personalitzades es poden mostrar en detalls de la propietat en una pestanya separada, o en la llista de propietats. Vostè haurà de editar manualment /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (per al fragment de llista de propietats) per aconseguir el disseny que necessiteu. Amb els camps que s’indiquen a la part superior, un disseny bàsic té un aspecte semblant al següent, que podeu utilitzar com a exemple a partir del qual podeu construir el vostre propi disseny. ");