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

class j11010rmfeatures
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
		
		$this->ret_vals = array ( 
								"resource_type" => "rmfeatures" , 
								"resource_id_required" => false , 
								"name" => jr_gettext( '_MEDIA_CENTRE_RESOURCE_FEATURES_ICONS', '_MEDIA_CENTRE_RESOURCE_FEATURES_ICONS', false ),
								"upload_root_abs_path" => JOMRES_IMAGELOCATION_ABSPATH,
								"upload_root_rel_path" => JOMRES_IMAGELOCATION_RELPATH,
								"notes" => ''
								);
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
