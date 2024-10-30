<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.11.2
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

/**
*
* Allows us to query the deepL translation service to get translations 
*
*/
class jomres_machine_translations
{
	
	private static $internal_debugging;

    public function __construct()
    {
        self::$internal_debugging = false;

        $this->init_service();
    }

	
	public function init_service(  )
	{
		$jomres_language = jomres_singleton_abstract::getInstance('jomres_language');
		
	}


	public function get_translation( $default_text , $constant , $target_language )
	{
		if (
			$constant == '_JOMRES_CUSTOMTEXT_PROPERTY_NAME' || 
			$constant == '_JOMRES_CUSTOMTEXT_PROPERTY_STREET' || 
			$constant == '_JOMRES_CUSTOMTEXT_PROPERTY_TOWN' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_DESCRIPTION' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_CHECKINTIMES' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_AREAACTIVITIES' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_DIRECTIONS' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_AIRPORTS' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_OTHERTRANSPORT' || 
			$constant == '_JOMRES_CUSTOMTEXT_ROOMTYPE_DISCLAIMERS' || 
			$constant == '_JOMRES_CUSTOMTEXT_PROPERTY_METATITLE' || 
			$constant == '_JOMRES_CUSTOMTEXT_PROPERTY_METADESCRIPTION' || 
			$constant == '_JOMRES_CUSTOMTEXT_PROPERTY_METAKEYWORDS'
			) {
			return $default_text;
		}
		
		if ( get_showtime('task') == "jomres_install" )  {
			return $default_text;
		}
		
		if (defined('AUTO_UPGRADE')) {
			return $default_text;
		}
		
		$deepl = jomres_singleton_abstract::getInstance('deepl');
		$translation = $deepl->get_translation( $default_text ,  $constant , $target_language );
		return $translation;
	}

}
