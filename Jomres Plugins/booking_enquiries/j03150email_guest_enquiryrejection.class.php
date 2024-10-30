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

class j03150email_guest_enquiryrejection
	{
	function __construct( $componentArgs )
		{

		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$default_template = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory().JRDS.'email_guest_enquiryrejection.html';
		
		$this->ret_vals = array ( "type" => "email_guest_enquiryrejection", "name" => jr_gettext('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME','_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',false) , "desc" => jr_gettext('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC','_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',false), "default_template" => $default_template );
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
