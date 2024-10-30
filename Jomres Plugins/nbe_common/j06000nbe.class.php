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

/*
 *
 * Essentially this plugin is just a vehicle for delivering the different template files, it's 06000search that actually determines whether or not to use one of this script's template files.
 *
 *
 */

class j06000nbe
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
			jr_import('NBE_BookingEngineException');
			jr_import('jomres_markdown');
			jr_import('new_booking_engine');
			jr_import('apiBookingUtilities');
			jr_import('apiBookingUtilitiesValidation');
			jr_import('NBE_Utilities');

			$session_id = 'ABCXYZ';

			// used for debugging only

			$nbe = new new_booking_engine( $session_id );
			$nbe->context = 'HTML';
			$nbe->property_uid = (int)$_REQUEST['property_uid'];
			$nbe->set_language(get_showtime('lang') );
			$nbe->initialise( $session_id );


		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}


