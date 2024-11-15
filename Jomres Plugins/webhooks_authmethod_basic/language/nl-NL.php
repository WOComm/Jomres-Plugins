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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################


jr_define('WEBHOOKS_AUTH_METHOD_BASIC', 'Basis');
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_USERNAME', 'Gebruikersnaam');
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_PASSWORD', 'Wachtwoord');
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_NOTES', 'Gebruik deze integratiemethode als de externe service aanmelding via basisverificatie vereist.');