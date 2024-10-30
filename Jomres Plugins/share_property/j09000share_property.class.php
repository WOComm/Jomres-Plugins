<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j09000share_property {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$output=array();
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if (!isset($jrConfig[ 'share_prop_enabled' ]) || $jrConfig[ 'share_prop_enabled' ] != '1')
			return;

		$output['SOCIAL_BUTTONS']="";
		
		if (this_cms_is_joomla())
			{
			$document=JFactory::getDocument();
			$link=JURI::getInstance();
			$link=$link->toString();
			$title=$document->getTitle();
			}
		else
			{
			$link="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$title=get_the_title();
			}

		$title = rawurlencode($title);
		$link = rawurlencode($link);
		$style = get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY."/core-plugins/share_property/images/".$jrConfig[ 'share_prop_style' ];
		
		if ($jrConfig[ 'share_prop_shortURL' ] == '1')
			$link = getShortURL($link);
		
		if ($jrConfig[ 'share_prop_Delicious' ] == '1')
			$output['SOCIAL_BUTTONS'].=getDeliciousButton($title, $link, $style);
			
		if ($jrConfig[ 'share_prop_Digg' ] == '1')
			$output['SOCIAL_BUTTONS'].=getDiggButton($title, $link, $style);
		
		if ($jrConfig[ 'share_prop_Facebook' ] == '1')
			$output['SOCIAL_BUTTONS'].=getFacebookButton($title, $link, $style);
		
		if ($jrConfig[ 'share_prop_Google' ] == '1')
			$output['SOCIAL_BUTTONS'].=getGoogleButton($title, $link, $style);
			
		if ($jrConfig[ 'share_prop_StumbleUpon' ] == '1')
			$output['SOCIAL_BUTTONS'].=getStumbleuponButton($title, $link, $style);
			
		/* if ($jrConfig[ 'share_prop_Technorati' ] == '1')
			$output['SOCIAL_BUTTONS'].=getTechnoratiButton($title, $link, $style); */
			
		if ($jrConfig[ 'share_prop_Twitter' ] == '1')
			$output['SOCIAL_BUTTONS'].=getTwitterButton($title, $link, $style);
			
		if ($jrConfig[ 'share_prop_LinkedIn' ] == '1')
			$output['SOCIAL_BUTTONS'].=getLinkedInButton($title, $link, $style);

		//$output['SOCIAL_BUTTONS'].=getGooglePlusButton($title, $link, $style);
		//$output['SOCIAL_BUTTONS'].=getGooglePlusOneButton(get_showtime('lang'));

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'share_property.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
