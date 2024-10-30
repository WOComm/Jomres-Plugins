<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2020 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die();
// ################################################################

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Channel Management");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Client can perform Channel Management activities. Note, this gives the client considerable power in the system to modify your accounts and properties.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Cleaning");

jr_define('_CMF_CANCELLED_BOOKING',"Channel manager cancelled booking");

jr_define('_CMF_CLEANING_STRING',"Cleaning");  // Do not change this if you have already imported properties. Properties with cleaning fees have an Extra with this name
jr_define('_CMF_SECURITY_STRING',"Security deposit");  // Do not change this if you have already imported properties. Properties with security deposits have an Extra with this name


jr_define('_CMF_API_PRIVACY',"API Privacy");
jr_define('_CMF_API_PRIVACY_ON',"Privacy on");
jr_define('_CMF_API_PRIVACY_OFF',"Privacy off");

jr_define('_CMF_API_PRIVACY_DESC',"A property's information can only be seen by the channel that created it. For example, if you have given different API key pairs to both Channel A and Channel B, the info of a property created by Channel A cannot be seen by Channel B... unless you turn API Privacy off to allow all channels to see all of the property's information through the API. Set API Privacy to Off if you are sharing this property with another site that wants to list the property. If you are not sharing this property with any other sites, leave API Privacy set to On.");