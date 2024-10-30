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

jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "Fuente RSS");
jr_define ('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', "Este complemento crea una fuente de todas las propiedades de jomres. Actualmente se admiten los formatos de sindicación RSS 1.0 y RSS 2.0.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "Nombre de la fuente");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC', "Descripción del feed");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "Nombre de archivo del feed (sin espacios)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "Formato de distribución");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Tiempo de caché (en segundos)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "URL de la imagen del feed");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "¿Truncar descripción de propiedad?");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "Truncar después de (caracteres)");
jr_define ('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', "¿Mostrar imagen de feed?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', "¿Mostrar imagen de propiedad?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "¿Mostrar ciudad de propiedad?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', "¿Mostrar región de propiedad?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "¿Mostrar el país de la propiedad?");
jr_define ('_JRPORTAL_FEED_CREATOR_HITEMS', "Limitar el número de propiedades sindicadas a");
