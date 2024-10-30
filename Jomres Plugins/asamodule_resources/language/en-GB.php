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


jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Shows a property rooms/resources in an ASAModule widget/module. Useful for single property websites." );

jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Required. The property uid you want to show resources for." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Required. The ids of the resources ( e.g. rooms ) you want to show. Comma separated list of ids." );
jr_define( '_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Optional. Set the arrival date in the format that corresponds with the Site Configuration > Calendar tab > Calendar input format setting. E.g. 01/02/2018. This allows you to show specific room prices on specific dates in the future, assuming that you have tariffs set that cover those dates." );
