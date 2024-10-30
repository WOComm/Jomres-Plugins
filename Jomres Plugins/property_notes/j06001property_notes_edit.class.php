<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9
* @package Jomres
* @copyright	2005-2018 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06001property_notes_edit
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
		$property_uid = getDefaultProperty();
		
		jr_import("property_notes");
		$property_notes = new property_notes();
		
		$notes = $property_notes->get_notes_for_property_by_id($property_uid);
		
		if (is_null($notes)) {
			$notes = array ( "id" => 0 , "property_uid" => $property_uid , "property_note_br" => '' , "property_note_linebreaks" =>'' );
			}
		$pageoutput=array();
		$output=array();
		
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL."&task=dashboard"),"");
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'property_notes_save');
		$jrtb .= $jrtbar->endTable();
		
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$output['JOMRES_SITEPAGE_URL']=JOMRES_SITEPAGE_URL;
		
		$output['PROPERTY_NOTES_TITLE']		= jr_gettext('PROPERTY_NOTES_TITLE', 'PROPERTY_NOTES_TITLE', false);
		$output['PROPERTY_NOTES_DESC']		= jr_gettext('PROPERTY_NOTES_DESC', 'PROPERTY_NOTES_DESC', false);
		if (!isset($notes['property_note_br'])){
			$notes['property_note_br'] = '';
			$notes['property_note_linebreaks'] = '';
		}
		$output['PROPERTY_NOTE_BR']			= $notes['property_note_br'];
		$output['PROPERTY_NOTE_LINEBREAKS']	= $notes['property_note_linebreaks'];
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_property_note.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
	
