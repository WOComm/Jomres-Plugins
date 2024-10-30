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

jr_define ('_COMMON_STRINGS_TITLE', "Variables de plantilla comunes");

jr_define ('_COMMON_STRINGS_INFO', "Eina per a desenvolupadors. Dissenyada per mostrar als desenvolupadors cadenes comunes que estan disponibles per a totes les plantilles sense necessitat d'afegir-les a l'script de trucada de la plantilla. <br/> Per exemple, en aquesta llista hi ha la definició COMMON_NEXT. Un desenvolupador pot afegir-lo a una plantilla Jomres sense haver de definir-lo a l'script de trucada. Afegireu la cadena comuna a la plantilla igual que qualsevol altra cadena, posant &#123;COMMON_NEXT&#125; a la plantilla. <br/> A la llista següent veureu la constant definida al fitxer d'idioma i al costat la sortida que mostrarà (sempre que hi hagi personalitzacions d'idiomes específiques per a propietats). Tingueu en compte, en el cas de la constant \"COMMON_LAST_VIEWED_PROPERTY_UID\", l'UID de la propietat varia i no es mostra en aquesta llista. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constant");
jr_define ('_COMMON_STRINGS_VALUE', "Sortida");