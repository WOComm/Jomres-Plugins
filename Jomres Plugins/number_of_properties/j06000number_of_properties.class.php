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

class j06000number_of_properties
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			
			return;
			}
		$ePointFilepath = get_showtime('ePointFilepath'); // Need to set this here, because the calls further down will reset the path to the called minicomponent's path.
		
		$output = array();
		$pageoutput = array();
		
		if (get_showtime( 'published_properties_in_system'))
			$output['_NUMBER_OF_PROPERTIES'] = count(get_showtime( 'published_properties_in_system'));
		else
			{
			$query = "SELECT count(`propertys_uid`) AS number_of_properties FROM #__jomres_propertys ";
			$result = (int)doSelectSql($query,1);
			$output['_NUMBER_OF_PROPERTIES'] = $result;
			}

		$output['SITENAME'] = get_showtime( 'sitename');
		$output['_NUMBER_OF_PROPERTIES_FOREWORD'] = jr_gettext( '_NUMBER_OF_PROPERTIES_FOREWORD', '_NUMBER_OF_PROPERTIES_FOREWORD' ) ;
		$output['_NUMBER_OF_PROPERTIES_AFTERWORD'] = jr_gettext( '_NUMBER_OF_PROPERTIES_AFTERWORD', '_NUMBER_OF_PROPERTIES_AFTERWORD' ) ;
		$output['_NUMBER_OF_PROPERTIES_BOOK_NOW'] = jr_gettext( '_NUMBER_OF_PROPERTIES_BOOK_NOW', '_NUMBER_OF_PROPERTIES_BOOK_NOW' ) ;
		
		
		$output['JOMRES_URL'] = JOMRES_SITEPAGE_URL . "&task=search";

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'number_of_properties.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
