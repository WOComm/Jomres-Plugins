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

jr_define('_CLONE_TARIFFS_TITLE',"Clone Tariffs");
jr_define('_CLONE_TARIFFS_INFO',"Here you can clone a tariff from a target property to a source property. Only properties that you have authority to manager will be available to you.");
jr_define('_CLONE_TARIFFS_SOURCE',"Source property");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tariff to clone");
jr_define('_CLONE_TARIFFS_TARGET',"Target property");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Target property room type");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"If the Target property's tariff editing mode is different from the Source property's tariff editing mode then when the cloning takes place, the Target property's original tariffs will be deleted and it's tariff editing mode changed to reflect that of the Source property's setting.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Delete existing tariffs on Target property?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"If the Target property's tariff editing mode is the same as the Source property then the existing tariffs will not be deleted. You can, however choose to override this by setting this option to Yes.");