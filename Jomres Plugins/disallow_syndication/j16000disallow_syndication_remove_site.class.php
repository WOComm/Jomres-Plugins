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

class j16000disallow_syndication_remove_site
{
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable = false; return; }

		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();
		
		$jomres_check_support_key = jomres_singleton_abstract::getInstance('jomres_check_support_key');
		$jomres_check_support_key->check_license_key();
		
		if (trim($jomres_check_support_key->key_hash) != '') {
			if ($jomres_check_support_key->key_valid) {
				
				$remove = (int)jomresGetParam($_REQUEST, 'remove', 1);

				$client = new GuzzleHttp\Client();

				$response = $client->request('POST', "https://app.jomres.net/jomres/api/register_site/remove_site/", [
					'form_params' => [
						'api_url' => urlencode(get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/api/'),
						'license_key' => $jomres_check_support_key->key_hash,
						'remove' => $remove,
						]
					]);
					
			}
		}
		
		jomresRedirect(JOMRES_SITEPAGE_URL_ADMIN.'&task=disallow_syndication');
	}

	public function getRetVals()
	{
		return null;
	}
}
