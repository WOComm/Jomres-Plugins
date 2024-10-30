<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000featured_listings {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		$output['FEATURED_LISTINGS_CLASS'] = $jrConfig['featured_listings_emphasis'];
		$output['HPROPERTYNAME'] = jr_gettext("_JRPORTAL_PROPERTIES_PROPERTYNAME",'_JRPORTAL_PROPERTIES_PROPERTYNAME',false);
		$output['HORDER'] = jr_gettext("_JRPORTAL_FEATUREDLISTINGS_ORDER",'_JRPORTAL_FEATUREDLISTINGS_ORDER',false);
		$output['_JRPORTAL_FEATUREDLISTINGS_EMPHASIS'] = jr_gettext("_JRPORTAL_FEATUREDLISTINGS_EMPHASIS",'_JRPORTAL_FEATUREDLISTINGS_EMPHASIS',false);

		$featured = array();
		$query = "SELECT `property_uid`,`order` FROM #__jomresportal_featured_properties ORDER BY `order`";
		$result = doSelectSQL($query);
		
		if ( !empty($result) )
			{
			foreach ($result as $r)
				{
				$featured[$r->property_uid]['id'] = (int)$r->property_uid;
				$featured[$r->property_uid]['order'] = (int)$r->order;
				}
			}

		//get all properties in system
		$all_properties_in_system = get_showtime('all_properties_in_system');
		
		//get all property names
		$basic_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
		$basic_property_details->get_property_name_multi( $all_properties_in_system );

		$counter = 1;
		foreach($all_properties_in_system as $property_uid)
			{
			$r = array();
			$checked = '';
			
			if ($counter % 2)
				$r['STYLE'] ="odd";
			else 
				$r['STYLE'] ="even";
			
			$r['ORDER'] = "";
			$r['PID'] = $property_uid;
			
			if ( array_key_exists($property_uid, $featured) )
				{
				$checked = "checked";
				$r['ORDER'] = $featured[$property_uid]['order'];
				}
			
			$r['CHECKBOX'] = '<input type="checkbox" id="idarray" name="idarray[]" value="'.$property_uid.'" '.$checked.' />';
			
			$r['PROPERTYNAME'] = $basic_property_details->property_names[$property_uid];
			
			$counter++;
			
			$rows[]=$r;
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,jr_gettext("_JRPORTAL_CANCEL",'_JRPORTAL_CANCEL',false));
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_featured_listings');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$output['PAGETITLE'] = jr_gettext("_JRPORTAL_FEATUREDLISTINGS_TITLE",'_JRPORTAL_FEATUREDLISTINGS_TITLE',false);
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'featured_listings.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
