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

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Shows a property rooms/resources in an ASAModule widget/module. Useful for single property websites." );

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Required. The property uid you want to show resources for." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Required. The ids of the resources ( e.g. rooms ) you want to show. Comma separated list of ids." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Optional. Set the arrival date in the format that corresponds with the Site Configuration > Calendar tab > Calendar input format setting. E.g. 01/02/2018. This allows you to show specific room prices on specific dates in the future, assuming that you have tariffs set that cover those dates." );
