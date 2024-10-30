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


class j06000stepz
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; 
			$this->shortcode_data = array (
				"task" => "stepz",
				"info" => "_JOMRES_SHORTCODES_06000STEPZ",
				"arguments" => array ()
				);
			return;
			}
		
		$output=array();
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$task 				= jomresGetParam( $_REQUEST, 'task', "" );
		$no_html			= (int)jomresGetParam( $_REQUEST, 'no_html', 0 );
		
		if ($task == "handlereq")
			return;
		if ($no_html == 1)
			return;

		if (isset($_REQUEST['menuoff']) && $_REQUEST['menuoff'] == '1' ) {
			return;
		}

		$output['STEP1']	=jr_gettext('_JOMRES_STEPZ_STEP1','_JOMRES_STEPZ_STEP1');
		$output['STEP2']	=jr_gettext('_JOMRES_STEPZ_STEP2','_JOMRES_STEPZ_STEP2');
		$output['STEP3']	=jr_gettext('_JOMRES_STEPZ_STEP3','_JOMRES_STEPZ_STEP3');
		$output['STEP4']	=jr_gettext('_JOMRES_STEPZ_STEP4','_JOMRES_STEPZ_STEP4');
		$output['STEP5']	=jr_gettext('_JOMRES_STEPZ_STEP5','_JOMRES_STEPZ_STEP5');
		$output['STEP6']	=jr_gettext('_JOMRES_STEPZ_STEP6','_JOMRES_STEPZ_STEP6');
		
		$template_file = "";
		if ($task == "" || $task == "search")
			$template_file = "stepz1.html";
		if ($task == "viewproperty")
			$template_file = "stepz2.html";
		if ($task == "dobooking")
			$template_file = "stepz3.html";
		if ($task == "confirmbooking")
			$template_file = "stepz4.html";
		if ($task == "processpayment")
			$template_file = "stepz5.html";
		if ($task == "completebk")
			$template_file = "stepz6.html";
		
		if ($template_file == "")
			return;
		
		if (using_bootstrap())
			{
			jomres_cmsspecific_addheaddata( 'css', JOMRES_ROOT_DIRECTORY.'/core-plugins/stepz/templates/'.find_plugin_template_directory().'/','style.css' );
			}
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( $template_file );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]	=jr_gettext('_JOMRES_STEPZ_STEP1','_JOMRES_STEPZ_STEP1');
		$output[]	=jr_gettext('_JOMRES_STEPZ_STEP2','_JOMRES_STEPZ_STEP2');
		$output[]	=jr_gettext('_JOMRES_STEPZ_STEP3','_JOMRES_STEPZ_STEP3');
		$output[]	=jr_gettext('_JOMRES_STEPZ_STEP4','_JOMRES_STEPZ_STEP4');
		$output[]	=jr_gettext('_JOMRES_STEPZ_STEP5','_JOMRES_STEPZ_STEP5');
		$output[]	=jr_gettext('_JOMRES_STEPZ_STEP6','_JOMRES_STEPZ_STEP6');

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
		

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}


	}
