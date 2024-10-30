<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.x
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06001widget_property_notes
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		
		$ePointFilepath=get_showtime('ePointFilepath');
        $this->retVals = '';
		
		$property_uid = getDefaultProperty();
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		jr_import("property_notes");
		$property_notes = new property_notes();
		
		$output=array();
		$pageoutput=array();
		
		$notes = $property_notes->get_notes_for_property_by_id($property_uid);
		
		if (isset($notes['property_note_br'])) {
			$output['PROPERTY_NOTES_TITLE']		= jr_gettext('PROPERTY_NOTES_TITLE', 'PROPERTY_NOTES_TITLE', false);
			$output['NOTES']					= $notes['property_note_br'];
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->readTemplatesFromInput( 'widget_property_notes.html');
			
			if($output_now)
				$tmpl->displayParsedTemplate();
			else
				$this->retVals = $tmpl->getParsedTemplate();
		}

		
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}