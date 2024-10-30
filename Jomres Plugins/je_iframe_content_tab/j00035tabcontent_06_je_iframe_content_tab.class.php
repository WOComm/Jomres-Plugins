<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00035tabcontent_06_je_iframe_content_tab {
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

		$je_iframe_content_tab = new jrportal_je_iframe_content_tab();
		$je_iframe_content_tab->get_je_iframe_content_tab($property_uid);
		if ($je_iframe_content_tab->je_iframe_content_tabConfigOptions['enabled']=="1") 
			{
			$tab_id="je_iframeTab";
			$url=$je_iframe_content_tab->je_iframe_content_tabConfigOptions['iframeurl'];
			$width=$je_iframe_content_tab->je_iframe_content_tabConfigOptions['width'];
			$height=$je_iframe_content_tab->je_iframe_content_tabConfigOptions['height'];
			$iframetab_title=jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_TITLE_TAB','_JRPORTAL_JE_IFRAME_CONTENT_TAB_TITLE_TAB',FALSE);
			$anchor = jomres_generate_tab_anchor($iframetab_title);
			$iframecontent[]=array('IFRAMETAB_TITLE'=>$iframetab_title,'URL'=>$url,'WIDTH'=>$width,'HEIGHT'=>$height);
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'iframecontent', $iframecontent );
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'je_iframe_content_tab.html');
			$parsedTemplate = $tmpl->getParsedTemplate();
			$tab = array(
				"TAB_ANCHOR"=>$anchor,
				"TAB_TITLE"=>$iframetab_title,
				"TAB_CONTENT"=>$parsedTemplate,
				"TAB_ID" => $tab_id
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
