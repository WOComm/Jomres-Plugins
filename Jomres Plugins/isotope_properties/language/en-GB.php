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

jr_define( 'JOMRES_SHORTCODES_06000ISOTOPE', "Displays property cards that can be sorted and orders by buttons at the top of the output area. Note, will not be displayed on a page where search results are being shown. " );
jr_define( 'JOMRES_SHORTCODES_06000ISOTOPE_LIMIT', "Option. Default 200 if not set. The number of properties to show." );
jr_define( 'JOMRES_SHORTCODES_0600006000ISOTOPE_PTYPE_IDS', "Optional. A comma seperated list of property type ids." );

jr_define('ISOTOPE_SORTBY',"Sort by");