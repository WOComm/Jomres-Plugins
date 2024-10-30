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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_api_feature_blackbookings
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_blackbookings",
			"category"=>"REST API",
			"marketing"=>"Functionality that allows view and set of black bookings through the API",
			"version"=>"1.1",
			"description"=> "Functionality that allows view and set of black bookings through the API",
			"author"=>"",
			"authoremail"=>"",
			"lastupdate"=>"2019/10/28",
			"min_jomres_ver"=>"9.19.2",
			"manual_link"=>'',
			'change_log'=>'v0.2 Feature debugged, removed some code that seemed inappropriately placed, improved functionality to check for pre-exising data, removed some older stuff that is irrelevant and improved endpoint syntax for grammer and notification. v0.3 Corrected documentation. v0.4 French language file added v1.0 Improved creation of black bookings, we check to see if the room uid exists before adding the black booking.',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true
			);
		}
	}
