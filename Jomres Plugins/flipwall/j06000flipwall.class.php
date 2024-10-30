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


// Adapted from the Sponsor Flip Wall at tutorialzine.com http://tutorialzine.com/2010/03/sponsor-wall-flip-jquery-css/  http://lab.smashup.it/flip/
class j06000flipwall
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; 
			
			return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');	
		$required_number_of_properties = 20;
		$description_number_of_chars = 70;
		$base_property_uids = array();

		$base_property_uids =get_showtime('published_properties_in_system');
		
		if (empty($base_property_uids))
			{
			$query = "SELECT propertys_uid FROM #__jomres_propertys WHERE published = '1' LIMIT 200 ";
			$result = doSelectSql( $query );
			
			foreach ($result as $p)
				{
				$base_property_uids[] = $p->propertys_uid;
				}
			}
		
		if (count($base_property_uids)>$required_number_of_properties)
			$property_uids=array_slice($base_property_uids,0,$required_number_of_properties);
		else
			$property_uids=$base_property_uids;

		// Do we have at least one property?
		if (empty($property_uids))
			{
			echo "Error, you don't have any published properties";
			return;
			}
		
		// Add jquery.flip.js to the host CMS's head
		jomres_cmsspecific_addheaddata("javascript",get_showtime('eLiveSite').'javascript/',"jquery.flip.js");
		
		// Randomise that sukka
		shuffle($property_uids);

		// Grab the property details
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data_multi($property_uids);
		
		//Grab the property imaages
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($property_uids, array('property'));
		
		// Put the details into the $rows array
		foreach ($property_uids as $p)
			{
			$r = array();
			$jomres_media_centre_images->get_images($p, array('property'));
			$r['THUMBNAIL'] = $jomres_media_centre_images->images ['property'][0][0]['small'];
			$r['PROPERTY_NAME'] = $current_property_details->multi_query_result[$p]['property_name'];
			$r['_JOMRES_FLIPWALL_CLICKTOFLIP']=jr_gettext('_JOMRES_FLIPWALL_CLICKTOFLIP',"Click to flip",false,false);
			$r['PROPERTY_DETAILS_LINK'] = get_property_details_url($p);
			$description_stripped = strip_tags(html_entity_decode($current_property_details->multi_query_result[$p]['property_description']));
			$r['PROPERTY_DESCRIPTION'] = substr($description_stripped,0,$description_number_of_chars);
			$rows[]=$r;
			}
		
		$output['LIVESITE'] = get_showtime('eLiveSite');
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'flipwall.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$this->ret_vals = $tmpl->getParsedTemplate();
		echo $this->ret_vals;
		}
	
	function touch_template_language()
		{
		$output=array();
		$output[]=jr_gettext('_JOMRES_FLIPWALL_CLICKTOFLIP',"Click to flip"); // Not going to bother creating a language file just for one string that v few people will see, instead we'll let the site admin, using Label Editing, translate an english string

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
