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

class j03381extras
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

		$query = "SELECT `uid`,`name` FROM #__jomres_extras WHERE `property_uid` = " . (int) $defaultProperty . " ";
		$extrasList = doSelectSql ($query);
		if (!empty($extrasList))
			{
			$resource_options = array();
			foreach ( $extrasList as $extra )
				{
				$resource_options[ ] = jomresHTML::makeOption( $extra->uid, jr_gettext( '_JOMRES_CUSTOMTEXT_EXTRANAME' . $extra->uid, htmlspecialchars( trim( stripslashes( $extra->name ) ), ENT_QUOTES ) ) );
				}
			$use_bootstrap_radios = false;
			$dropdown = jomresHTML::selectList( $resource_options, 'resource_id', ' autocomplete="off" class="btn btn-success btn-lg" size="1" ', 'value', 'text', '' , $use_bootstrap_radios );
			}
		$this->ret_vals = $dropdown;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
