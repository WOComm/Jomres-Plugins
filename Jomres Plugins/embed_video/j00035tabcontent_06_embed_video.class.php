<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00035tabcontent_06_embed_video {
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
		$pluginDir=$ePointFilepath;
		$output = array();
		$this->retVals = '';

		$embed_video = new jrportal_embed_video();
		$embed_video->get_embed_video($property_uid);
		if ($embed_video->embed_videoConfigOptions['enabled']=="1") 
			{
			$url=$embed_video->embed_videoConfigOptions['video'];
			$width=$embed_video->embed_videoConfigOptions['width'];
			$height=$embed_video->embed_videoConfigOptions['height'];
			$URL = str_replace('watch?v=', 'embed/', $url);
			$VIDEOTAB_TITLE=jr_gettext('_JRPORTAL_EMBED_VIDEO_TITLE_TAB','_JRPORTAL_EMBED_VIDEO_TITLE_TAB',FALSE);
			$anchor = jomres_generate_tab_anchor($VIDEOTAB_TITLE);
			$videocontent[]=array('VIDEOTAB_TITLE'=>$VIDEOTAB_TITLE,'URL'=>$URL,'WIDTH'=>$width,'HEIGHT'=>$height,'VIDEOTAB_TITLE_ANCHOR'=>$anchor);
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'videocontent', $videocontent );
			$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'video.html');
			$parsedTemplate = $tmpl->getParsedTemplate();
			$tab = array(
				"TAB_ANCHOR"=>$anchor,
				"TAB_TITLE"=>$VIDEOTAB_TITLE,
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
