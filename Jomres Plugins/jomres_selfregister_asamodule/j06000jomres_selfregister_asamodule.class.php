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


class j06000jomres_selfregister_asamodule
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=true; 
			
			return;
		}
		
		$ePointFilepath=get_showtime('ePointFilepath');
		$output=array();
		
		$output['BEFORELINK']=jr_gettext('_JOMRES_SELFREGISTER_ASAMODULE_BEFORELINK','_JOMRES_SELFREGISTER_ASAMODULE_BEFORELINK',false,false);
		$output['AFTERLINK']=jr_gettext('_JOMRES_SELFREGISTER_ASAMODULE_AFTERLINK','_JOMRES_SELFREGISTER_ASAMODULE_AFTERLINK',false,false);
		$output['HLINK']=jr_gettext('_JOMRES_CLICKTOREGISTER','_JOMRES_CLICKTOREGISTER',false,false);
		$output['LINK']=jomresURL(JOMRES_SITEPAGE_URL."&task=new_property");
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS."templates" );
		$tmpl->readTemplatesFromInput( "jomres_selfregister_asamodule.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}
	
	function touch_template_language()
		{
		$output=array();

		$output[]=jr_gettext('_JOMRES_SELFREGISTER_ASAMODULE_BEFORELINK','_JOMRES_SELFREGISTER_ASAMODULE_BEFORELINK');
		$output[]=jr_gettext('_JOMRES_CLICKTOREGISTER','_JOMRES_CLICKTOREGISTER');
		$output[]=jr_gettext('_JOMRES_SELFREGISTER_ASAMODULE_AFTERLINK','_JOMRES_SELFREGISTER_ASAMODULE_AFTERLINK');

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
