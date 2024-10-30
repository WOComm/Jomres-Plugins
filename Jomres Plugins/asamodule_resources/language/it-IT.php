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

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Mostra le stanze/risorse di una proprietà in un widget/modulo ASAModule. Utile per siti web di singole proprietà." );

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Obbligatorio. L'uid della proprietà per cui vuoi mostrare le risorse." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Obbligatorio. Gli ID delle risorse ( es. stanze ) che vuoi mostrare. Elenco di ID separato da virgole." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Facoltativo. Imposta la data di arrivo nel formato che corrisponde a Configurazione sito > Scheda Calendario > Impostazione formato di inserimento calendario. Ad es. 01/02/2018. Ciò consente di mostrare prezzi specifici delle camere in date specifiche in il futuro, supponendo che tu abbia fissato delle tariffe che coprano quelle date." );
