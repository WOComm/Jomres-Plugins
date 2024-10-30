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

class j06000site_business_address
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
				'task' => 'site_business_address',
				'info' => 'JOMRES_SHORTCODES_06000SITE_BUSINESS_ADDRESS'
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

		$output = array();
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig = $siteConfig->get();

		$output[ 'HBUSINESSNAME' ] = jr_gettext('_JOMRES_COM_YOURBUSINESS_NAME', '_JOMRES_COM_YOURBUSINESS_NAME');
		$output[ 'HVATNO' ] = jr_gettext('_JOMRES_COM_YOURBUSINESS_VATNO', '_JOMRES_COM_YOURBUSINESS_VATNO');
		$output[ 'HHOUSENO' ] = jr_gettext('_JOMRES_COM_YOURBUSINESSADDRESS', '_JOMRES_COM_YOURBUSINESSADDRESS');
		$output[ 'HSTREET' ] = jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_STREET');
		$output[ 'HTOWN' ] = jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TOWN');
		$output[ 'HREGION' ] = jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION');
		$output[ 'HCOUNTRY' ] = jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY');
		$output[ 'HPOSTCODE' ] = jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_POSTCODE');
		$output[ 'HTELEPHONE' ] = jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE', '_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_TELEPHONE');
		$output[ 'HEMAIL' ] = jr_gettext('_JOMRES_COM_MR_EB_GUEST_JOMRES_EMAIL_EXPL', '_JOMRES_COM_MR_EB_GUEST_JOMRES_EMAIL_EXPL');
		$output[ '_JOMRES_CUSTOMCODE_MENUCATEGORIES_LANGUAGES' ] = jr_gettext('_JOMRES_CUSTOMCODE_MENUCATEGORIES_LANGUAGES', '_JOMRES_CUSTOMCODE_MENUCATEGORIES_LANGUAGES');

		if ($jrConfig[ 'business_languages' ] != '' ) {
			$business_languages = explode ( "," , $jrConfig[ 'business_languages' ]); // We won't ask admin to add quotes around languages, instead we'll do that ourselves
			$output['BUSINESS_LANGUAGES'] = sprintf("%s", implode(" ", $business_languages ) );;
		}

		$output[ 'BUSINESS_NAME' ] = $jrConfig[ 'business_name' ];
		$output[ 'VATNO' ] = $jrConfig[ 'business_vat_number' ];
		$output[ 'HOUSENO' ] = $jrConfig[ 'business_address' ];
		$output[ 'STREET' ] = $jrConfig[ 'business_street' ];
		$output[ 'TOWN' ] = $jrConfig[ 'business_town' ];
		$output[ 'REGION' ] = find_region_name($jrConfig[ 'business_region' ]);
		$output[ 'COUNTRY' ] = getSimpleCountry($jrConfig[ 'business_country' ]);
		$output[ 'POSTCODE' ] = $jrConfig[ 'business_postcode' ];
		$output[ 'TELEPHONE' ] = $jrConfig[ 'business_telephone' ];
		$output[ 'EMAIL' ] = jomres_hide_email($jrConfig[ 'business_email' ]);

		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->readTemplatesFromInput('site_business_address.html');

		$this->retVals = $tmpl->getParsedTemplate();

		if ($output_now) {
			echo $this->retVals;
		}
	}


	public function getRetVals()
	{
		return $this->retVals;
	}
}
