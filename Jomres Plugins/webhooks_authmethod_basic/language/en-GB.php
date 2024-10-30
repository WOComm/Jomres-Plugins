<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC', 'Basic' );
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_USERNAME', 'Username' );
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_PASSWORD', 'Password' );
jr_define( 'WEBHOOKS_AUTH_METHOD_BASIC_NOTES', 'Use this integration method if the remote service requires login via Basic Authentication.' );
