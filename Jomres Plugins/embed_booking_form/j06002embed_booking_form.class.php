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

class j06002embed_booking_form
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		$ePointFilepath=get_showtime('ePointFilepath');
		$pageoutput=array();
		$output=array();
		$output['_JINTOUR_EMBED_BOOKINGORM_TITLE']			=jr_gettext('_JINTOUR_EMBED_BOOKINGORM_TITLE','_JINTOUR_EMBED_BOOKINGORM_TITLE',false,false);
		$output['_JINTOUR_EMBED_BOOKINGORM_INSTRUCTIONS']	=jr_gettext('_JINTOUR_EMBED_BOOKINGORM_INSTRUCTIONS','_JINTOUR_EMBED_BOOKINGORM_INSTRUCTIONS',false,false);
		$output['PROPERTY_UID']								=get_showtime('property_uid');
		$output['_JINTOUR_EMBED_CODE']						=jr_gettext('_JINTOUR_EMBED_CODE','_JINTOUR_EMBED_CODE',false,false);
		
		$output['BOOKING_FORM_URL']							=get_booking_url(get_showtime('property_uid'),'nosef');
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'embed.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JINTOUR_EMBED_BOOKINGORM_TITLE','_JINTOUR_EMBED_BOOKINGORM_TITLE');
		$output[]=jr_gettext('_JINTOUR_EMBED_BOOKINGORM_INSTRUCTIONS','_JINTOUR_EMBED_BOOKINGORM_INSTRUCTIONS');
		$output[]=jr_gettext('_JINTOUR_EMBED_CODE','_JINTOUR_EMBED_CODE');
		
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