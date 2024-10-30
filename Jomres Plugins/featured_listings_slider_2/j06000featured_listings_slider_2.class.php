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

class j06000featured_listings_slider_2
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; 
			
			return;
			}
		$description_number_of_chars = 70;
		$required_number_of_properties = 8;
		$ePointFilepath = get_showtime('ePointFilepath'); // Need to set this here, because the calls further down will reset the path to the called minicomponent's path.
		jomres_cmsspecific_addheaddata("css",JOMRES_ROOT_DIRECTORY.'/core-plugins/featured_listings_slider_2/css/','slider.css');
		jomres_cmsspecific_addheaddata("javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/featured_listings_slider_2/javascript/',"slider.js");
		
		$query="SELECT property_uid FROM #__jomresportal_featured_properties ORDER BY `order`";
		$featured_propertiesList=doSelectSQL($query);
		if (!empty($featured_propertiesList))
			{
			foreach ($featured_propertiesList as $p)
				{
				$featured[]=$p->property_uid;
				}
			}
		else
			{
			echo "You haven't featured any properties yet.";
			return;
			}
		
		//Grab the property details
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data_multi($featured);
		
		//Grab the property imaages
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($featured, array('property'));
		
		$counter = 1;
		$rows=array();
		foreach ($featured as $f)
			{
			if ($counter<=$required_number_of_properties)
				{
				$r = array();
				$property_uid = (int)$f;
				$current_property_details->gather_data($f);
				
				$r['PROPERTY_NAME'] = jomres_decode($current_property_details->property_name);
				$r['ID'] = $counter;
				
				$jomres_media_centre_images->get_images($property_uid, array('property'));
				$r['PROPERTY_IMAGE'] =$jomres_media_centre_images->images ['property'][0][0]['large'];
				$r['PROPERTY_IMAGE_THUMB'] =$jomres_media_centre_images->images ['property'][0][0]['small'];
	
				$description_stripped =strip_tags(html_entity_decode($current_property_details->property_description));
				$r['PROPERTY_DESCRIPTION'] = substr($description_stripped,0,$description_number_of_chars);
				$r['MOREINFORMATIONLINK']=get_property_details_url($property_uid);
	
				$rows[] = $r;
				$counter++;
				}
			}
		
		$rows2=$rows;
		$output['HOME_URL'] = get_showtime('live_site');

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates' );
		if (using_bootstrap())
			$tmpl->readTemplatesFromInput( 'slider_bootstrap.html');
		else
			$tmpl->readTemplatesFromInput( 'slider.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->addRows( 'rows2', $rows2 );
		$tmpl->displayParsedTemplate();
		}
	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
