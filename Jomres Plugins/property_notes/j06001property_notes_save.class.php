<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9
* @package Jomres
* @copyright	2005-2018 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06001property_notes_save
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
			
		jr_import("property_notes");
		$property_notes = new property_notes();
		
		$note = jomresGetParam($_REQUEST, 'property_notes', '');

		$property_uid = getDefaultProperty();
		
		$property_notes->save_note_by_property_uid ( $note , $property_uid );
		
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL."&task=property_notes_edit" ), "" );

		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
	
