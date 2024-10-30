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
jr_define( 'FIREWALL_CHECK', 'Comprovació del tallafoc');
jr_define( 'FIREWALL_CHECK_DESC', 'Aquest connector és una comprovació senzilla per veure si aquest servidor es pot connectar a serveis remots. Si no és possible, pot indicar que hi ha regles de tallafocs que impedeixen que les dues màquines es parlin entre elles. Si hi ha són, llavors és possible que hàgiu de parlar de l\'ajust de les regles del tallafoc amb els amfitrions del vostre servidor web. Les respostes 404 i 403 es poden considerar correctes perquè rebeu una resposta del servei remot.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'Servei remot');
jr_define('FIREWALL_CHECK_STATUSCODE', 'Codi d\'estat');
jr_define( 'FIREWALL_CHECK_IP_NUMBER', 'Número IP');