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

jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP', 'When the page is the property details page (task=viewproprety) then show a google map for this property. This allows you to place a map in a sidebar or module/widget position when on the property details page.' );

jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_PROPERTY_UID', 'The property uid.' );
jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_MAPWIDTH', 'Map width' );
jr_define( '_JOMRES_SHORTCODES_06000PROPERTY_DETAILS_STANDALONE_MAP_ARG_MPAHEIGHT', 'Map height' );