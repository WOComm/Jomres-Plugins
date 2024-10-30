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


jr_define( 'FIREWALL_CHECK', 'Brandväggskontroll' );
jr_define ('FIREWALL_CHECK_DESC', 'Denna plugin är en enkel kontroll för att se om denna server kan ansluta till fjärrtjänster. Om den inte kan, kan det tyda på att det finns brandväggsregler som hindrar de två maskinerna från att prata med varandra. Om det finns är, då kan du behöva diskutera justering av brandväggsregler med dina webbservervärdar. 404 & 403-svar kan anses vara ok eftersom du får ett svar från fjärrtjänsten.' );
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Fjärrtjänst');
jr_define ('FIREWALL_CHECK_STATUSCODE', 'Status code');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'IP-nummer' );