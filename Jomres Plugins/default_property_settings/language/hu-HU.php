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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Alapértelmezett tulajdonságbeállítások");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Általános konfigurációs cím (ha elérhető, egyesek nem biztos, hogy");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Változó neve");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Jelenlegi érték");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Ez egy speciális szolgáltatás, ha nincs konkrét felhasználása, akkor jobb, ha nem használja. Ez a bővítmény lehetővé teszi egy új tulajdonság alapértelmezett értékeinek módosítását. biztos, hogy megérti, mit tesz a változó, mielőtt megváltoztatná, mivel itt történő módosítása messzemenő hatással lehet a Jomres rendszerére. Az üres elemek általában régebbi beállítások, amelyeket már nem használnak, de in situ hagyják visszafelé kompatibilitási okokból, vagy olyan beállítások, amelyek nem módosítható a Tulajdonság konfigurációs területen keresztül. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Új érték");