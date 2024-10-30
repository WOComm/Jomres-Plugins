<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j00007subscriptions_black_bookings
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{ 
			$this->template_touchable = false; 
			return; 
			}
		
		//check if subscriptions are enabled, otherwise we don`t need to go forward
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		//has to be named subscriptions_*, for example subscriptions_extras. This will be used when saving the edit subscriptions package form to get all subscriptions_* post data
		$feature_name = "subscriptions_black_bookings";
		
		$subscribable_features = get_showtime("subscribable_features");
		
		if ( is_null ("subscribable_features"))
			$subscribable_features = array();
			
		$subscribable_features [ $feature_name ] = array (
			"minicomponents" => array (
				"06001" => array("easy_blackbook", "delete_black_booking", "delete_multiple_blackbookings", "list_black_bookings", "new_black_booking", "save_black_booking", "show_black_booking"),
				"06000" => array("api_documentation")
				),
			"name" => $feature_name,
			"friendlyname" => jr_gettext("_JOMRES_FRONT_BLACKBOOKING", '_JOMRES_FRONT_BLACKBOOKING', false ),
			"friendlydesc" => "",
			"input_type" => "dropdown", //use "dropdown" for a yes/no dropdown, or text for a simple text field
			
			//if the input_type is number, set the min/max values
			"input_min" => "",
			"input_max" => "",
			
			//"subscribe_url" => jomresURL( JOMRES_SITEPAGE_URL . "&task=feature_subscribe&feature_name=".$feature_name ),
			//"not_subscribed_message" => "Sorry, but you are not able to use this feature."
			);

		set_showtime ( "subscribable_features" , $subscribable_features );
		
		//if we`re in the admin area, return here
		if ( jomres_cmsspecific_areweinadminarea() )
			return;

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		$basic_subscription_details = jomres_singleton_abstract::getInstance( 'basic_subscription_details' );
		$basic_subscription_details->gatherData($thisJRUser->id);
		
		if ($thisJRUser->accesslevel >= 1) //this subscription feature is applicable only to manager users. also new subscribers that don`t have any properties created.
			{
				$current_task = get_showtime('task');
				if (isset($basic_subscription_details->package['params'][$subscribable_features[$feature_name]['name']]) && (int) $basic_subscription_details->package['params'][$subscribable_features[$feature_name]['name']] == 0) { //feature is disabled for this subscription package
					foreach ($subscribable_features[$feature_name]['minicomponents'] as $eventDetails) {
						foreach ($eventDetails as $eventName) {
							if ($eventName == $current_task){
								jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL . "&task=list_subscription_packages&requested_task=" . $current_task));
							}
						}
					}
				}

				if (!isset($basic_subscription_details->package['params']) && !defined('API_STARTED') && !AJAXCALL ) {
					foreach ( $subscribable_features[$feature_name]['minicomponents'] as $eventPoint => $eventDetails ){
						foreach ($eventDetails as $eventName){
							unset( $MiniComponents->registeredClasses[$eventPoint][$eventName] );
						}
					}
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
