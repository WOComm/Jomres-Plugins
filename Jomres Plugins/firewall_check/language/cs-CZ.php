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

jr_define( 'FIREWALL_CHECK', 'Kontrola brány firewall' );
jr_define( 'FIREWALL_CHECK_DESC', 'Tento plugin je jednoduchá kontrola, zda se tento server může připojit ke vzdáleným službám. Pokud tomu tak není, může to znamenat, že existují pravidla brány firewall, která brání dvěma počítačům ve vzájemné komunikaci. jsou, pak možná budete muset s hostiteli vašeho webového serveru prodiskutovat úpravu pravidel brány firewall. Odpovědi 404 a 403 lze považovat za v pořádku, protože dostáváte odpověď ze vzdálené služby. ');
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Vzdálená služba');
jr_define ('FIREWALL_CHECK_STATUSCODE', 'stavový kód');
jr_define ('FIREWALL_CHECK_IP_NUMBER', 'IP Number');