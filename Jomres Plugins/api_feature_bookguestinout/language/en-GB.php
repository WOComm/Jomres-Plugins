<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die();
// ################################################################

jr_define('_OAUTH_SCOPE_PROPERTY_GET',"Get property");
jr_define('_OAUTH_SCOPE_PROPERTY_GET_DESC',"Client can retrieve information about your property(s).");

jr_define('_OAUTH_SCOPE_PROPERTY_SET',"Set property");
jr_define('_OAUTH_SCOPE_PROPERTY_SET_DESC',"Client can modify your your property(s).");


jr_define('_JOMRES_BOOKGUESTINOUT_API_CHECKIN',"Guest checked in");
jr_define('_JOMRES_BOOKGUESTINOUT_API_UNDO_CHECKIN',"Undone guest checkin");
jr_define('_JOMRES_BOOKGUESTINOUT_API_CHECKOUT',"Guest checked out");
jr_define('_JOMRES_BOOKGUESTINOUT_API_UNDO_CHECKOUT',"Undone guest checkout");