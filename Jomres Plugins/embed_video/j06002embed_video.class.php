<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002embed_video {
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
		$embed_video = new jrportal_embed_video();
		$embed_video->get_embed_video($defaultProperty);
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext('_JRPORTAL_EMBED_VIDEO_ENABLED_NO','_JRPORTAL_EMBED_VIDEO_ENABLED_NO',false ));
		$options[] = jomresHTML::makeOption( '1', jr_gettext('_JRPORTAL_EMBED_VIDEO_ENABLED_YES','_JRPORTAL_EMBED_VIDEO_ENABLED_YES',false ));
		$selected = $embed_video->embed_videoConfigOptions['enabled'];
		$output['ENABLED_YESNO']=jomresHTML::selectList( $options, 'enabled','', 'value', 'text', $selected);
		$output['HENABLED_YESNO']=jr_gettext('_JRPORTAL_EMBED_VIDEO_ENABLED_YESNO','_JRPORTAL_EMBED_VIDEO_ENABLED_YESNO',FALSE);

		$output['VIDEO']=$embed_video->embed_videoConfigOptions['video'];
		$output['PAGETITLE']=jr_gettext('_JRPORTAL_EMBED_VIDEO_TITLE','_JRPORTAL_EMBED_VIDEO_TITLE',FALSE);
		$output['INSTRUCTIONS']=jr_gettext('_JRPORTAL_EMBED_VIDEO_INSTRUCTIONS_FRONTEND','_JRPORTAL_EMBED_VIDEO_INSTRUCTIONS_FRONTEND',FALSE);
		$output['_JRPORTAL_EMBED_VIDEO_ADVICE']=jr_gettext('_JRPORTAL_EMBED_VIDEO_ADVICE','_JRPORTAL_EMBED_VIDEO_ADVICE',FALSE);
		
		
		$output['WIDTH']=$embed_video->embed_videoConfigOptions['width'];
		$output['HWIDTH']=jr_gettext('_JRPORTAL_EMBED_VIDEO_WIDTH','_JRPORTAL_EMBED_VIDEO_WIDTH',FALSE);
		$output['HEIGHT']=$embed_video->embed_videoConfigOptions['height'];
		$output['HHEIGHT']=jr_gettext('_JRPORTAL_EMBED_VIDEO_HEIGHT','_JRPORTAL_EMBED_VIDEO_HEIGHT',FALSE);
		
		$output['JOMRESTOKEN'] ='<input type="hidden" name="no_html" value="1">';
		$output['PUID']=$defaultProperty;

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_embed_video');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'embed_video_frontend.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
