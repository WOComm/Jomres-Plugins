<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class plugin_info_je_alternative_properties
	{
	function __construct()
		{
		$this->data=array(
			"name"=>"je_alternative_properties",
			"category"=>"Search",
			"marketing"=>"Displays alternative properties randomly picked from the search results, like \"You may also be interested in...\".",
			"version"=>(float)"3.3",
			"description"=> "Displays alternative properties randomly picked from the search results, like \"You may also be interested in...\". This offers a quick alternative to your visitors to also see other properties from search results without the need to return to the search results page. After successfully installing the plugin, a new button will be created in the Portal Features section of your Jomres admin control panel (admin area). From here you can enable/disable the plugin and set how many alternative properties to show.",
			"lastupdate"=>"2022/07/29",
			"min_jomres_ver"=>"9.25.2",
			"manual_link"=>'',
			'change_log'=>'v1.1 Optimized queries. Updated for Jomres v7.4. Dropped compatibility with older Jomres versions. v1.2 Updated for Jomres 8.1 and dropped compatibility with older Jomres versions. v1.3 Added Bootstrap 3 support. v1.4 Tweaked property type specific language handling. v1.5 Updated constructors for PHP7. v2.1 Modified functionality to use new get_property_details_url function. v2.2 Settings moved to Site Config. v2.3 Language file updated. v2.4 Site config tabs updated. v2.5 Node/javascript path related changes. v2.6 French language file added v2.7 BS4 template set added v2.8 Italian language file added, thanks Nicola 2.9 fixed a notice v3.0 Fixed a notice v3.1 Bootstrap 5 template set added. v3. Serbian lang file updated. v3.3 Markup in BS5 improved and documentation updated.',
			'highlight'=>'',
			'image'=>'https://snippets.jomres.net/plugin_screenshots/2017-08-03_36466.png',
			'demo_url'=>'',
            'compatability'=>['Bootstrap 2','Bootstrap 3','Bootstrap 5'],
			"author"=>"Vince Wooll",
			"authoremail"=>"sales@jomres.net",
			"authorurl"=>"http://www.jomres.net",
			);
		}
	}
