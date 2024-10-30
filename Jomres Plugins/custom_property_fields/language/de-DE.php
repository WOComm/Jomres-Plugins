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

jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"Benutzerdefinierte Eigenschaftsfelder");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"Benutzerdefiniertes Eigenschaftsfeld bearbeiten");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"Verwenden Sie diese Funktion, um benutzerdefinierte Informationsfelder für Immobilien zu erstellen. Diese Informationen werden von einem Immobilienverwalter hinzugefügt und in einer neuen Registerkarte auf der Seite mit den Immobiliendetails angezeigt.");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"Andere Eigenschaftsinformationen");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"Diese benutzerdefinierten Eigenschaftsfelder können in Eigenschaftsdetails in einem separaten Tab oder in der Eigenschaftsliste angezeigt werden. Sie müssen /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (für den Eigenschaftslisten-Schnipsel), um das gewünschte Layout zu erreichen. Mit den Feldern wie oben eingegeben, ein grundlegendes Layout würde in etwa wie folgt aussehen, das Sie als Beispiel verwenden können, aus dem Sie Ihr eigenes Layout erstellen können. ");