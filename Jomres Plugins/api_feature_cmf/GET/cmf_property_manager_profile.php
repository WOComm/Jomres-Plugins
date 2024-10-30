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

Return the items for a given property type (e.g. property types) that currently exist in the system

*/

Flight::route('GET /cmf/property/manager/profile/@id/@manager_id', function( $property_uid , $manager_id )
	{
    require_once("../framework.php");

	validate_scope::validate('channel_management');
	
	cmf_utilities::validate_channel_for_user();  // If the user and channel name do not correspond, then this channel is incorrect and can go no further, it'll throw a 204 error
	
	cmf_utilities::validate_property_uid_for_user($property_uid);
	
	cmf_utilities::cache_read($property_uid);
	
	jr_import('jomres_markdown');
	$jomres_markdown = new jomres_markdown();
		
	jr_import('jrportal_guest_profile');
	$jrportal_guest_profile = new jrportal_guest_profile();
	$jrportal_guest_profile->cms_user_id = $manager_id;
	$jrportal_guest_profile->get_guest_profile();
	
	$user_profile = array();
	
	$user_profile[ 'firstname' ]	= $jrportal_guest_profile->firstname;
	$user_profile[ 'surname' ]		= $jrportal_guest_profile->surname;
	$user_profile[ 'region' ]		= find_region_name($jrportal_guest_profile->region);
	$user_profile[ 'country' ]		= getSimpleCountry($jrportal_guest_profile->country);
	$user_profile[ 'about_me' ]		= $jomres_markdown->get_markdown($jrportal_guest_profile->about_me);
	$user_profile[ 'image' ]		= $jrportal_guest_profile->image;
	$user_profile[ 'email' ]		= $jrportal_guest_profile->email;
	$user_profile[ 'url' ]			= get_showtime('live_site');
	$user_profile[ 'profile_page' ]	= jomresURL(JOMRES_SITEPAGE_URL_NOSEF.'&task=show_user_profile&id='.$manager_id);
	
	cmf_utilities::cache_write( $property_uid , "response" , $user_profile );
	
	Flight::json( $response_name = "response" , $user_profile ); 
	});
	
	