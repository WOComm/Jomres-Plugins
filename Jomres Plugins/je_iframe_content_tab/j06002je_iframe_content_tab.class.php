<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002je_iframe_content_tab {
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
		$je_iframe_content_tab = new jrportal_je_iframe_content_tab();
		$je_iframe_content_tab->get_je_iframe_content_tab($defaultProperty);
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_ENABLED_NO','_JRPORTAL_JE_IFRAME_CONTENT_TAB_ENABLED_NO',false ));
		$options[] = jomresHTML::makeOption( '1', jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_ENABLED_YES','_JRPORTAL_JE_IFRAME_CONTENT_TAB_ENABLED_YES',false ));
		$selected = $je_iframe_content_tab->je_iframe_content_tabConfigOptions['enabled'];
		$output['ENABLED_YESNO']=jomresHTML::selectList( $options, 'enabled','class="inputbox" size="1"', 'value', 'text', $selected);
		$output['HENABLED_YESNO']=jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_ENABLED_YESNO','_JRPORTAL_JE_IFRAME_CONTENT_TAB_ENABLED_YESNO',FALSE);

		$output['IFRAMEURL']=$je_iframe_content_tab->je_iframe_content_tabConfigOptions['iframeurl'];
		$output['PAGETITLE']=jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_TITLE','_JRPORTAL_JE_IFRAME_CONTENT_TAB_TITLE',FALSE);
		$output['INSTRUCTIONS']=jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_INSTRUCTIONS_FRONTEND','_JRPORTAL_JE_IFRAME_CONTENT_TAB_INSTRUCTIONS_FRONTEND',FALSE);
		$output['WIDTH']=$je_iframe_content_tab->je_iframe_content_tabConfigOptions['width'];
		$output['HWIDTH']=jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_WIDTH','_JRPORTAL_JE_IFRAME_CONTENT_TAB_WIDTH',FALSE);
		$output['HEIGHT']=$je_iframe_content_tab->je_iframe_content_tabConfigOptions['height'];
		$output['HHEIGHT']=jr_gettext('_JRPORTAL_JE_IFRAME_CONTENT_TAB_HEIGHT','_JRPORTAL_JE_IFRAME_CONTENT_TAB_HEIGHT',FALSE);
		$output['LOGO']='<img src="'.get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/remote_plugins/je_iframe_content_tab/images/jomresextras.png" alt="Jomres Extras"/>';
		
		$output['JOMRESTOKEN'] ='<input type="hidden" name="no_html" value="1">';
		$output['PUID']=$defaultProperty;

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_je_iframe_content_tab');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'je_iframe_content_tab_manager.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
