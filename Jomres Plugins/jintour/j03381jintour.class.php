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

class j03381jintour
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
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if (!$thisJRUser->userIsManager)
			{
			return;
			}
		
		$dropdown = '';
		$defaultProperty = getDefaultProperty();

		$query = "SELECT `id`,`title` FROM #__jomres_jintour_profiles WHERE `property_uid` = " . (int) $defaultProperty . " ";
		$tourList = doSelectSql ($query);
		if (!empty($tourList))
			{
			$resource_options = array();
			foreach ( $tourList as $tour )
				{
				$resource_options[ ] = jomresHTML::makeOption( $tour->id, jr_gettext( '_JINTOUR_TOUR_TITLE_CUSTOM_TEXT' . $tour->id, htmlspecialchars( trim( stripslashes( $tour->title ) ), ENT_QUOTES ) ) );
				}
			$use_bootstrap_radios = false;
			$dropdown = jomresHTML::selectList( $resource_options, 'resource_id', ' autocomplete="off" ', 'value', 'text', '' , $use_bootstrap_radios );
			}
		$this->ret_vals = $dropdown;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
