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

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Megjelenít egy ingatlanszobát/erőforrást egy ASAModule widgetben/modulban. Hasznos az egyes ingatlan webhelyeken.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Kötelező. A tulajdonság uid, amelyhez forrásokat szeretne megjeleníteni.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Kötelező. A megjeleníteni kívánt erőforrások (pl. szobák) azonosítói. Az azonosítók vesszővel elválasztott listája.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Választható. Állítsa be az érkezési dátumot a Webhelykonfiguráció> Naptár fül> Naptárbeviteli formátum beállításának megfelelő formátumban. Pl. 2018.02.01. Ez lehetővé teszi, hogy meghatározott szobaárakat jelenítsen meg bizonyos dátumokban a a jövőt, feltéve, hogy olyan tarifákat állított be, amelyek lefedik ezeket a dátumokat. ");
