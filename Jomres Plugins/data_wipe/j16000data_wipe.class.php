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

class j16000data_wipe
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$output=array();
		$pageoutput=array();
		
		$output['PAGETITLE'] 				= jr_gettext('_JOMRES_DATAWIPE_TITLE','_JOMRES_DATAWIPE_TITLE',false);
		$output['_JOMRES_DATAWIPE_DESC']	= jr_gettext('_JOMRES_DATAWIPE_DESC','_JOMRES_DATAWIPE_DESC',false);
		$output['_JOMRES_DATAWIPE_WARNING'] = jr_gettext('_JOMRES_DATAWIPE_WARNING','_JOMRES_DATAWIPE_WARNING',false);
		$output['_JOMRES_DATAWIPE_GO'] 		= jr_gettext('_JOMRES_DATAWIPE_GO','_JOMRES_DATAWIPE_GO',false);
		
		
		$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS."templates".JRDS."bootstrap" );
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'data_wipe.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();

		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}