<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00011manager_option_06_embed_video {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$this->cpanelButton=jomres_mainmenu_option(JOMRES_SITEPAGE_URL."&task=embed_video", 'images/video_icon.png', jr_gettext('_JRPORTAL_EMBED_VIDEO_TITLE','_JRPORTAL_EMBED_VIDEO_TITLE',false,false),"images/",jr_gettext( "_JOMRES_CUSTOMCODE_JOMRESMAINMENU_RECEPTION_SETTINGS" , "settings" ,false,false));
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->cpanelButton;
		}
	}
