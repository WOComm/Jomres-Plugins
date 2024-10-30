<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j03379jintour
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		
        $property_uid = getDefaultProperty();
        $preview_link = '';
        
		$this->ret_vals = array ( 
								"resource_type" => "jintour" , 
								"resource_id_required" => true , 
								"name" => jr_gettext( '_JINTOUR_TITLE', '_JINTOUR_TITLE', false ),
								"upload_root_abs_path" => JOMRES_IMAGELOCATION_ABSPATH.$property_uid.JRDS,
								"upload_root_rel_path" => JOMRES_IMAGELOCATION_RELPATH.$property_uid.'/',
								"notes" => jr_gettext( '_JINTOUR_TITLE', '_JINTOUR_TITLE', false ), 
								"preview_link" => $preview_link
								);
		
		$task = get_showtime('task');
		if (
			$task != '' &&
			strpos($task,"media_centre") === false && 
			$task != "jintour" && 
			$task != "jintour_edit_profile" && 
			$task != "viewproperty" && 
			$task != "dobooking" && 
			$task != "handlereq" 
			)
			return;

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		if ( $thisJRUser->userIsManager )
			{
			$defaultProperty = get_showtime('property_uid');
			$query="SELECT `id` FROM `#__jomres_jintour_profiles` WHERE `property_uid` = ".(int)$defaultProperty." ";
			$exList =doSelectSql($query);
			
			if ( !empty($exList) )
				{
					if (!AJAXCALL && !defined("MEDIACENTRE_ROOMJS") && !defined('API_STARTED')) {
					define ("MEDIACENTRE_ROOMJS",1);
					echo '
					<script>
					jomresJquery(function () {
						jomresJquery("#resource_id_dropdown").change(function () {
							get_existing_images(); 
							});
						});
					</script>
					';
					}
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
