<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00035tabcontent_06_je_custom_html_tab {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid=(int)$componentArgs['property_uid'];  
		$mrConfig=getPropertySpecificSettings($property_uid);
		$ePointFilepath = get_showtime('ePointFilepath');
		$output = array();
		$this->retVals = '';

		$je_custom_html_tab = new jrportal_je_custom_html_tab();
		$je_custom_html_tab->get_je_custom_html_tab($property_uid);
		if ($je_custom_html_tab->je_custom_html_tabConfigOptions['enabled']=="1") 
			{
			$content=jomres_cmsspecific_parseByBots(jomres_decode(jr_gettext('_JOMRES_CUSTOM_HTML_TAB_CONTENT', trim(stripslashes($je_custom_html_tab->je_custom_html_tabConfigOptions['content'])),false,false)));
			if ($content=='')
				return;
			$tab_title=jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_TITLE_TAB','_JRPORTAL_JE_CUSTOM_HTML_TAB_TITLE_TAB',FALSE);
			$anchor = jomres_generate_tab_anchor($tab_title);
			$htmltabcontent[]=array('TAB_TITLE'=>$tab_title,'CONTENT'=>$content);
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'htmltabcontent', $htmltabcontent );
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'je_custom_html_tab.html');
			$parsedTemplate = $tmpl->getParsedTemplate();
			$tab = array(
				"TAB_ANCHOR"=>$anchor,
				"TAB_TITLE"=>$tab_title,
				"TAB_CONTENT"=>$parsedTemplate
				);
			$this->retVals = $tab;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
