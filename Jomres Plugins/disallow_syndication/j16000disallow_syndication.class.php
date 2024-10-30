<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.9.4
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################


class j16000disallow_syndication
{
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable = false; return; }
		
		$ePointFilepath=get_showtime('ePointFilepath');

		$output = array();
		
		$output['DISALLOW_SYNDICATION_TITLE'] = jr_gettext('DISALLOW_SYNDICATION_TITLE','DISALLOW_SYNDICATION_TITLE',false);
		$output['DISALLOW_SYNDICATION_DESCRIPTION'] = jr_gettext('DISALLOW_SYNDICATION_DESCRIPTION','DISALLOW_SYNDICATION_DESCRIPTION',false);
		$output['DISALLOW_SYNDICATION_DESCRIPTION_MORE'] = jr_gettext('DISALLOW_SYNDICATION_DESCRIPTION_MORE','DISALLOW_SYNDICATION_DESCRIPTION_MORE',false);
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		$jomres_check_support_key = jomres_singleton_abstract::getInstance('jomres_check_support_key');
		$jomres_check_support_key->check_license_key();
		
		if (trim($jrConfig['licensekey']) != '') {
			if ($jomres_check_support_key->key_valid) {

				$client = new GuzzleHttp\Client();
				$response = $client->request('POST', "http://app.jomres.net/jomres/api/get_sites/confirm/", [
					'form_params' => [
						'api_url' => urlencode(get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/api/')
						
						]
					]);

				$body				= json_decode((string)$response->getBody());

				if ($body->meta->code == "200" && $body->data->response == true ) {
					$output[ 'INSTRUCTIONS' ] = jr_gettext('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', 'DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', false);
					$output[ 'BUTTON_TEXT' ] = jr_gettext('DISALLOW_SYNDICATION_DISALLOW', 'DISALLOW_SYNDICATION_DISALLOW', false);
					$output[ 'BUTTON_LINK' ] = JOMRES_SITEPAGE_URL_ADMIN."&task=disallow_syndication_remove_site&remove=1";
					$output[ 'BUTTON_COLOUR' ]				= "danger";
				} else {
					$output[ 'INSTRUCTIONS' ] = jr_gettext('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', 'DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', false);
					$output[ 'BUTTON_TEXT' ] = jr_gettext('DISALLOW_SYNDICATION_ALLOW', 'DISALLOW_SYNDICATION_ALLOW', false);
					$output[ 'BUTTON_LINK' ] = JOMRES_SITEPAGE_URL_ADMIN."&task=disallow_syndication_remove_site&remove=0";
					$output[ 'BUTTON_COLOUR' ]				= "success";
				}

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'disallow_syndication.html' );
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->displayParsedTemplate();
			} else {
				$output['DISALLOW_SYNDICATION_INVALID_KEY'] = jr_gettext('DISALLOW_SYNDICATION_INVALID_KEY','DISALLOW_SYNDICATION_INVALID_KEY',false);
				
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'disallow_syndication_invalid_key.html' );
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->displayParsedTemplate();
			}
		} else {
			$output['DISALLOW_SYNDICATION_INVALID_KEY'] = jr_gettext('DISALLOW_SYNDICATION_INVALID_KEY','DISALLOW_SYNDICATION_INVALID_KEY',false);
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'disallow_syndication_invalid_key.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->displayParsedTemplate();
		}
	}

	public function getRetVals()
	{
		return null;
	}
}
