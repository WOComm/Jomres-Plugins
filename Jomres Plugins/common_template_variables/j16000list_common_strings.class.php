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

class j16000list_common_strings
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$output=array();
		$output['TITLE'] = jr_gettext('_COMMON_STRINGS_TITLE','_COMMON_STRINGS_TITLE',false);
		$output['_COMMON_STRINGS_INFO'] = jr_gettext('_COMMON_STRINGS_INFO','_COMMON_STRINGS_INFO',false);
		$output['_COMMON_STRINGS_CONSTANT'] = jr_gettext('_COMMON_STRINGS_CONSTANT','_COMMON_STRINGS_CONSTANT',false);
		$output['_COMMON_STRINGS_VALUE'] = jr_gettext('_COMMON_STRINGS_VALUE','_COMMON_STRINGS_VALUE',false);
		
		
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		
		$common_strings = $tmpl->add_common_jomres_strings();
		foreach ($common_strings as $key=>$val)
			{
			$r=array();
			$r['CONSTANT'] = $key;
			$r['VALUE']=$val;
			$rows[]=$r;
			}
		
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_common_strings.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}