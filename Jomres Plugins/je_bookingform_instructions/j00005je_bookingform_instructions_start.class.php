<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00005je_bookingform_instructions_start {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		require_once($ePointFilepath."je_bookingform_instructions.class.php");
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}

		$property_uid = getDefaultProperty();
		
		if ($property_uid > 0)
			{
			$mrConfig = getPropertySpecificSettings($property_uid);
			
			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');
			
			$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');

			if ($thisJRUser->accesslevel >= 70 && $mrConfig[ 'is_real_estate_listing' ] != '1') 
				{
				$jomres_menu->add_item(80, jr_gettext('_JE_BOOKINGFORM_INSTRUCTIONS_TITLE', '_JE_BOOKINGFORM_INSTRUCTIONS_TITLE', false), 'je_bookingform_instructions', 'fa-pencil-square-o');
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
