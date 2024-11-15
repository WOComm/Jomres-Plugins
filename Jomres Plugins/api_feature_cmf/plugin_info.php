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

class plugin_info_api_feature_cmf
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"api_feature_cmf",
			"category"=>"REST API",
			"marketing"=>"Functionality used by the Channel Management Framework",
			"version"=>"2.0",
			"description"=> "Functionality used by the Channel Management Framework, however intended to be used by any application that has a key/secret pair",
            "lastupdate"=>"2023/07/31",
			"min_jomres_ver"=>"10.7.2",
			"manual_link"=>'',
			'change_log'=>' v0.2 Added scores of new endpoints v0.3 Added...Blackbookings, list booking status, get booking, get changeover day, list active bookings, list bookings, publishing, put availability, status review, property children reporting, echo, property booking link, available rooms, easy setting of base price, easy setting of min stays and prices, reservation add and cancel. Various scripts updated in Nightly to support status review where if a property is changed and it no longer passes sanity checks then if (currently secret) settings are enabled then the property is unpublished and possibly set for Re-approval too. v0.4 Standardised response names, added endpoints plugin settings (for gateways) and a variety of admin level endpoints.  v0.5 Various tweaks and updates. v0.6 Various tweaks. v0.7 Modified admin channel list properties endpoint to account for deleted managers. 0.8 Added new endpoints : PUT remote property id and PUT admin channel unassign properties. Modified how the utilities class finds custom header and proxy information because some webservers like to capitalise headers. The little tinkers. v0.8 New endpoints added plus a variety of tweaks v0.9 Proxy header changed to use hyphens. v0.10 Fixed response from admin delete channel, Fixed duplicates appearing in GET properties ids. Fixed property availability blocks to work with base64 encoded remote data introduced in last version. Added checks for empty local_rooms variable, which can happen because a room hasn\'t yet been added to the property. Proxy header changed to use hyphens. Added extra checks for manager id not being set correctly v0.11 improved put property tariffs so that updating works as well as insertion  Modified list active bookings to produce more data, fixed query in changelog endpoint. 0.12 Added invoices and fixed issue with tariff updating max guests. v0.13 PUT property tariffs adjusted so that a bug where multiple tariffs can be created is resolved. v0.14 Added code to uppercase headers in Announce feature. v1.0 Added text input for black bookings that will be added as Black Booking Reason, this will appear on hover in the booking calendar. 1.1 Properties all endpoint also includes Published state. v1.2 Delete property improved to remove data from cmf rooms xref table when a property is removed. v1.3 Removed a limitation where property tariffs could not be removed if bookings existed. v1.4 Language files updated v1.5 Minor tweaks to output v1.6 Fixing an issue with PUT property address setting property name where it should not. 1.7 Fixed a PHP8 related issue. v1.8 Updated PUT Property Availability so that it can handle multiple room types for MRPs v1.9 PHP 8.1 changes v2.0 Remove a check to see if a channel has properties before deleting the channel in delete:admin_channel. Remote id of a property does not need to be an integer in put:remote_property_id.  more than one manager can now be cross referenced with a property, so when unassigning properties we rejig and remove a check. added all_properties flag so that all properties can have their cross reference for that manager removed. put:admin_channel_unassign_properties. more than one manager can now be cross referenced with a property in cmf, so put:admin_channel_assign_properties allows another manager to be assigned (also the remote id does not need to be an integer). ',
			'highlight'=>'',
			'image'=>'',
			'demo_url'=>'',
			'free'=>true,
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
