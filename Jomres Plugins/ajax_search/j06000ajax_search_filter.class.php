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

class j06000ajax_search_filter
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		//require_once('jomres/remote_plugins/alternative_init/alt_init.php');
		
		// We'll use 06009 to include any files that contain functions that might be needed by these scripts. In our default one, we will include a 06009 that imports the jomSearch.class.php because we'll want to use the prep search functions (beats reinventing the wheel). An ajax search minicomponent can have it's own 06009 for it's own search functions, if needed, or it could use the ones in jomSearch.
		$MiniComponents->triggerEvent('06009');
		prep_ajax_search_filter_cache();
		
		$search_form = jomresGetParam( $_REQUEST, 'search_form', "" );

		if ($MiniComponents->eventSpecificlyExistsCheck('06110',$search_form) )
			$result = $MiniComponents->specificEvent('06110',$search_form);
		else // If a specific search isn't declared, we'll fallback to the search filter that comes with this plugin
			$result = $MiniComponents->triggerEvent('06111');
		
		if (isset($result['result_bucket']))
			$this->resultBucket = $result['result_bucket'];
		else
			$this->resultBucket = $result;

		if (!empty($this->resultBucket))
			{
			$MiniComponents->triggerEvent('01004',$componentArgs); // optional
			$MiniComponents->triggerEvent('01005',$componentArgs); // optional
			$MiniComponents->triggerEvent('01006',$componentArgs); // optional
			$MiniComponents->triggerEvent('01007',$componentArgs); // optional
			
			$componentArgs=array();
			$componentArgs['propertys_uid']=$this->resultBucket;
			$componentArgs['live_scrolling_enabled']=true;
			$MiniComponents->specificEvent('01010','listpropertys',$componentArgs); 
			}
		else 
			{
			echo no_search_results() ;
			$alternatives = get_showtime('alternative_search_results');
			if (!empty($alternatives))
				{
				$MiniComponents->triggerEvent('01004',$componentArgs); // optional
				$MiniComponents->triggerEvent('01005',$componentArgs); // optional
				$MiniComponents->triggerEvent('01006',$componentArgs); // optional
				$MiniComponents->triggerEvent('01007',$componentArgs); // optional
			
				$output = array("ALTERNATIVES"=>jr_gettext('_JOMRES_ALTERNATIVE_SEARCH_RESULTS','_JOMRES_ALTERNATIVE_SEARCH_RESULTS',false,false));
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				
				$tmpl->readTemplatesFromInput( 'alternatives.html' );
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->displayParsedTemplate();

				$componentArgs=array();
				$componentArgs['propertys_uid']=$alternatives;
				$componentArgs['live_scrolling_enabled']=true;
				$MiniComponents->specificEvent('01010','listpropertys',$componentArgs);
				}
			}
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
