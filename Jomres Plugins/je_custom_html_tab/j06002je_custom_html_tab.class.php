<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002je_custom_html_tab {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');

		$defaultProperty=getDefaultProperty();
		$mrConfig=getPropertySpecificSettings();
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		if (!isset($jrConfig['allowHTMLeditor']) )
			$jrConfig['allowHTMLeditor']="1";

		$description="";
		$output=array();

		$je_custom_html_tab = new jrportal_je_custom_html_tab();
		$je_custom_html_tab->get_je_custom_html_tab($defaultProperty);
		
		$description=jr_gettext('_JOMRES_CUSTOM_HTML_TAB_CONTENT', trim(stripslashes($je_custom_html_tab->je_custom_html_tabConfigOptions['content'])),false,false);
		$output['CONTENT']="";
		
		if ($jrConfig['allowHTMLeditor'] == "1")
			{
			$width="95%";
			$height="350";
			$col="20";
			$row="10";
			$output['CONTENT']=editorAreaText( 'description', $description, 'description', $width, $height, $col, $row );
			}
		else
			$output['CONTENT']='<textarea class="inputbox" cols="60" rows="6" name="description">'.$description.'</textarea>';
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_ENABLED_NO','_JRPORTAL_JE_CUSTOM_HTML_TAB_ENABLED_NO',false ));
		$options[] = jomresHTML::makeOption( '1', jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_ENABLED_YES','_JRPORTAL_JE_CUSTOM_HTML_TAB_ENABLED_YES',false ));
		
		$selected = $je_custom_html_tab->je_custom_html_tabConfigOptions['enabled'];
		$output['ENABLED_YESNO']=jomresHTML::selectList( $options, 'enabled','class="inputbox" size="1"', 'value', 'text', $selected);
		$output['HENABLED_YESNO']=jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_ENABLED_YESNO','_JRPORTAL_JE_CUSTOM_HTML_TAB_ENABLED_YESNO',FALSE);

		$output['PAGETITLE']=jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_TITLE','_JRPORTAL_JE_CUSTOM_HTML_TAB_TITLE',FALSE);
		$output['INSTRUCTIONS']=jr_gettext('_JRPORTAL_JE_CUSTOM_HTML_TAB_INSTRUCTIONS_FRONTEND','_JRPORTAL_JE_CUSTOM_HTML_TAB_INSTRUCTIONS_FRONTEND',FALSE);
		
		$output['LOGO']='<img src="'.get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/remote_plugins/je_custom_html_tab/images/jomresextras.png" alt="Jomres Extras"/>';
		
		$output['JOMRESTOKEN'] ='<input type="hidden" name="no_html" value="1">';
		$output['PUID']=$defaultProperty;

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_je_custom_html_tab');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'je_custom_html_tab_manager.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
