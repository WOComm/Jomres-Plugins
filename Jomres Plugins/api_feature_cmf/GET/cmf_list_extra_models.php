<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*

Return the statuses returned by the system

*/

Flight::route('GET /cmf/list/extra/models', function()
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	$response = array(
		"1" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERWEEK',false),
		"2" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYS',false),
		"3" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERBOOKING',false),
		"4" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERBOOKING',false),
		"5" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERDAY',false),
		"6" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERPERSONPERWEEK',false),
		"7" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS',false),
		"8" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSMINDAYS',false),
		"9" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERDAYSPERROOM',false),
		"10" => jr_gettext('_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING','_JOMRES_CUSTOMTEXT_EXTRAMODEL_PERROOMPERBOOKING',false),
		"100" => jr_gettext('_JOMRES_COMMISSION','_JOMRES_COMMISSION',false)
	);
	

	Flight::json( $response_name = "response" , $response ); 
	});
	
	