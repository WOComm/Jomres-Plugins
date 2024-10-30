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


jr_define( 'WEBHOOKS_AUTH_METHOD_OAUTH2', 'Oauth2');
jr_define( 'WEBHOOKS_AUTH_METHOD_OAUTH2_CLIENT_ID', 'Klant-ID');
jr_define( 'WEBHOOKS_AUTH_METHOD_OAUTH2_SECRET', 'Geheim');
jr_define( 'WEBHOOKS_AUTH_METHOD_OAUTH2_NOTES', 'Gebruik deze integratiemethode als de externe service aanmelding via OAuth2-clientreferenties vereist.');