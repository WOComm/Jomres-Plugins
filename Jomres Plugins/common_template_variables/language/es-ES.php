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

jr_define ('_COMMON_STRINGS_TITLE', "Variables de plantilla comunes");

jr_define ('_COMMON_STRINGS_INFO', "Herramienta para desarrolladores. Diseñada para mostrar a los desarrolladores cadenas comunes que están disponibles para todas las plantillas sin necesidad de agregarlas al script de llamada de la plantilla. <br/> Por ejemplo, en esta lista está la definición COMMON_NEXT. Un desarrollador puede agregar esto a una plantilla de Jomres sin tener que definirlo en el script de llamada. Agregaría la cadena común a la plantilla como cualquier otra cadena, poniendo &#123;COMMON_NEXT&#125; en la plantilla. <br/> En la lista a continuación, verá la constante definida en el archivo de idioma, y junto a ella la salida que mostrará (sujeto a que haya personalizaciones de idioma específicas de propiedad). Tenga en cuenta que, en el caso de la constante 'COMMON_LAST_VIEWED_PROPERTY_UID', el uid de la propiedad varía y no se muestra en esta lista. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constante");
jr_define ('_COMMON_STRINGS_VALUE', "Salida");