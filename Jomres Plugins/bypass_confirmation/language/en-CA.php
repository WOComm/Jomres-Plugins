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

jr_define('_BYPASS_CONFIRMATION_TITLE',"Bypass review booking page");
jr_define('_BYPASS_CONFIRMATION_DESC',"When this is enabled, the review booking page won`t be shown anymore and instead guests will be taken directly to payment, or if no gateways are enabled, the booking will be inserted directly.");