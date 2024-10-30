<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.3.0
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * 
	 */

class j06000site_social_links
{	
	/**
	 *
	 * Constructor
	 * 
	 * Main functionality of the Minicomponent 
	 *
	 * 
	 * 
	 */
	 
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = true;
			$this->shortcode_data = array(
				'task' => 'site_social_links',
				'info' => 'JOMRES_SHORTCODES_06000SITE_SOCIAL_LINKS',
				'arguments' => array(
					0 => array(
						'argument' => 'social_links_colour',
						'arg_info' => 'JOMRES_SHORTCODES_06000SITE_SOCIAL_LINKS_COLOUR',
						'arg_example' => 'primary/secondary/success/danger/warning/info/light/dark',
					)
				)
			);
			return;
		}

		$this->retVals = '';
		$ePointFilepath = get_showtime('ePointFilepath');

		if (isset($componentArgs[ 'output_now' ])) {
			$output_now = $componentArgs[ 'output_now' ];
		} else {
			$output_now = true;
		}

		if (isset($componentArgs[ 'social_links_colour' ])) {
			$social_links_colour = $componentArgs[ 'social_links_colour' ];
		} else {
			if (isset($_REQUEST['social_links_colour'])) {
				$social_links_colour = jomresGetParam($_REQUEST, 'social_links_colour', '');
			} else {
				$social_links_colour = '';
			}
		}

		switch ($social_links_colour) {
			case 'primary' :
				$template_name = 'site_social_links_primary.html';
				break;
			case 'secondary' :
				$template_name = 'site_social_links_secondary.html';
				break;
			case 'success' :
				$template_name = 'site_social_links_success.html';
				break;
			case 'danger' :
				$template_name = 'site_social_links_danger.html';
				break;
			case 'warning' :
				$template_name = 'site_social_links_warning.html';
				break;
			case 'info' :
				$template_name = 'site_social_links_info.html';
				break;
			case 'light' :
				$template_name = 'site_social_links_light.html';
				break;
			case 'dark' :
				$template_name = 'site_social_links_dark.html';
				break;
			case '' :
			default :
				$template_name = 'site_social_links.html';
				break;
		}

		$output = array();
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		$social_media_facebook		= [];
		$social_media_instagram		= [];
		$social_media_pintrest		= [];
		$social_media_linkedin		= [];
		$social_media_twitter		= [];
		$social_media_tiktok		= [];
		$social_media_whatsapp		= [];
		$social_media_youtube		= [];

		$social_meeja_platforms = get_sm_platforms();
		foreach ( $social_meeja_platforms as $key => $val ) {
			if (!isset($jrConfig[$key])) {
				if ($key == 'social_media_whatsapp') {
					$jrConfig[$key] = '1234567890';
				} else {
					$jrConfig[$key] = 'jomres';
				}
			}
		}

		if ( isset($jrConfig['social_media_facebook']) && trim($jrConfig['social_media_facebook']) != '' ) {
			$social_media_facebook		= [ 0 =>
				[
					'SOCIAL_MEDIA_FACEBOOK'	=> $jrConfig['social_media_facebook'] ,
					'URL' => $social_meeja_platforms['social_media_facebook']['url'],
					'NAME' => $social_meeja_platforms['social_media_facebook']['name']
				]];
		}

		if ( isset($jrConfig['social_media_instagram']) && trim($jrConfig['social_media_instagram']) != '' ) {
			$social_media_instagram		= [ 0 =>
				[
					'SOCIAL_MEDIA_INSTAGRAM'	=> $jrConfig['social_media_instagram'] ,
					'URL' => $social_meeja_platforms['social_media_instagram']['url'],
					'NAME' => $social_meeja_platforms['social_media_instagram']['name']
				]];

		}

		if ( isset($jrConfig['social_media_pintrest']) && trim($jrConfig['social_media_pintrest']) != '' ) {
			$social_media_pintrest		= [ 0 =>
				[
					'SOCIAL_MEDIA_PINTREST'	=> $jrConfig['social_media_pintrest'] ,
					'URL' => $social_meeja_platforms['social_media_pintrest']['url'],
					'NAME' => $social_meeja_platforms['social_media_pintrest']['name']
				]];
		}

		if ( isset($jrConfig['social_media_linkedin']) && trim($jrConfig['social_media_linkedin']) != '' ) {
			$social_media_linkedin		= [ 0 =>
				[
					'SOCIAL_MEDIA_LINKEDIN'	=> $jrConfig['social_media_linkedin'] ,
					'URL' => $social_meeja_platforms['social_media_linkedin']['url'],
					'NAME' => $social_meeja_platforms['social_media_linkedin']['name']
				]];
		}

		if ( isset($jrConfig['social_media_twitter']) && trim($jrConfig['social_media_twitter']) != '' ) {
			$social_media_twitter		= [ 0 =>
				[
					'SOCIAL_MEDIA_TWITTER'	=> $jrConfig['social_media_twitter'] ,
					'URL' => $social_meeja_platforms['social_media_twitter']['url'],
					'NAME' => $social_meeja_platforms['social_media_twitter']['name']
				]];
		}

		if ( isset($jrConfig['social_media_tiktok']) && trim($jrConfig['social_media_tiktok']) != '' ) {
			$social_media_tiktok		= [ 0 =>
				[
					'SOCIAL_MEDIA_TIKTOK'	=> $jrConfig['social_media_tiktok'] ,
					'URL' => $social_meeja_platforms['social_media_tiktok']['url'],
					'NAME' => $social_meeja_platforms['social_media_tiktok']['name']
				]];
		}

		if ( isset($jrConfig['social_media_whatsapp']) && trim($jrConfig['social_media_whatsapp']) != '' ) {
			$social_media_whatsapp		= [ 0 =>
				[
					'SOCIAL_MEDIA_WHATSAPP'	=> $jrConfig['social_media_whatsapp'] ,
					'URL' => $social_meeja_platforms['social_media_whatsapp']['url'],
					'NAME' => $social_meeja_platforms['social_media_whatsapp']['name']
				]];
		}

		if ( isset($jrConfig['social_media_youtube']) && trim($jrConfig['social_media_youtube']) != '' ) {
			$social_media_youtube		= [ 0 =>
				[
					'SOCIAL_MEDIA_YOUTUBE'	=> $jrConfig['social_media_youtube'] ,
					'URL' => $social_meeja_platforms['social_media_youtube']['url'],
					'NAME' => $social_meeja_platforms['social_media_youtube']['name']
				]];
		}

		$output['JOMRES_SITE_SIDEBAR_WHY_SOCIAL_MEDIA']		= jr_gettext('JOMRES_SITE_SIDEBAR_WHY_SOCIAL_MEDIA', 'JOMRES_SITE_SIDEBAR_WHY_SOCIAL_MEDIA', false);
		$output['JOMRES_SITE_SIDEBAR_WHY_SOCIAL_MEDIA_LEAD']		= jr_gettext('JOMRES_SITE_SIDEBAR_WHY_SOCIAL_MEDIA_LEAD', 'JOMRES_SITE_SIDEBAR_WHY_SOCIAL_MEDIA_LEAD', false);

		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->addRows('social_media_facebook', $social_media_facebook);
		$tmpl->addRows('social_media_instagram', $social_media_instagram);
		$tmpl->addRows('social_media_pintrest', $social_media_pintrest);
		$tmpl->addRows('social_media_linkedin', $social_media_linkedin);
		$tmpl->addRows('social_media_twitter', $social_media_twitter);
		$tmpl->addRows('social_media_tiktok', $social_media_tiktok);
		$tmpl->addRows('social_media_whatsapp', $social_media_whatsapp);
		$tmpl->addRows('social_media_youtube', $social_media_youtube);

		$tmpl->readTemplatesFromInput($template_name);
		$template = $tmpl->getParsedTemplate();
		if ($output_now) {
			echo $template;
		} else {
			$this->retVals = $template;
		}
	}


	public function getRetVals()
	{
		return $this->retVals;
	}
}
