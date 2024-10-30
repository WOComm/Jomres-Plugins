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




jr_define('_BYPASS_CONFIRMATION_TITLE',"Bypass review boekingspagina");
jr_define('_BYPASS_CONFIRMATION_DESC',"Als dit is ingeschakeld, wordt de beoordelingsboekingspagina niet meer getoond en worden gasten in plaats daarvan direct naar de betaling geleid, of als er geen gateways zijn ingeschakeld, wordt de boeking direct ingevoegd.");