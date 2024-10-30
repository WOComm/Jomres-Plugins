<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000je_fps
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$description_number_of_chars = 200;
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (!using_bootstrap())
			{
			jomres_cmsspecific_addheaddata("javascript",JOMRES_ROOT_DIRECTORY.'/core-plugins/je_fps/javascript/',"jquery.ad-gallery.pack.js");
			jomres_cmsspecific_addheaddata("css",JOMRES_ROOT_DIRECTORY.'/core-plugins/je_fps/css/','jquery.ad-gallery.css');
			}
		else
			{
			jomres_cmsspecific_addheaddata("javascript",JOMRES_NODE_MODULES_RELPATH.'galleria/dist/', 'galleria.min.js');
			jomres_cmsspecific_addheaddata("javascript",JOMRES_NODE_MODULES_RELPATH.'galleria/dist/themes/classic/', 'galleria.classic.min.js');
			jomres_cmsspecific_addheaddata("css",JOMRES_CSS_RELPATH, 'galleria.classic.css');
			}
		
		//limit displayed properties
		$listLimit = (int)jomresGetParam( $_REQUEST, 'limit', 20);
		// e.g. "hotels:1;villas:6;camp sites:4" 
		$arguments = jomresGetParam( $_REQUEST, 'ptype_ids', '' );
		$property_type_bang = explode (",",$arguments);
		
		$required_property_type_ids = array();
		foreach ($property_type_bang as $ptype)
			{
			if ((int)$ptype!=0)
				$required_property_type_ids[] = (int)$ptype;
			}
		if (count($required_property_type_ids)>0)
			{
			$g_ptype_ids=$this->genericIn($required_property_type_ids);
			$clause="AND #__jomres_propertys.ptype_id IN $g_ptype_ids ";
			}
		else
			$clause='';

		$query="SELECT property_uid FROM #__jomresportal_featured_properties INNER JOIN #__jomres_propertys ON #__jomresportal_featured_properties.property_uid = #__jomres_propertys.propertys_uid WHERE #__jomres_propertys.published = 1 $clause ORDER BY #__jomresportal_featured_properties.order LIMIT $listLimit";
		$featured_propertiesList=doSelectSQL($query);
		if (count($featured_propertiesList)>0)
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
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data_multi($featured);
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($featured, array('property'));
		
		jr_import('jomres_markdown');
		
		$counter = 1;
		$rows=array();
		foreach ($current_property_details->multi_query_result as $p)
			{
			$r = array();
			$property_uid = (int)$p['propertys_uid'];
			if (in_array($property_uid,$featured))
				{
				set_showtime( 'property_uid', $property_uid );
				set_showtime( 'property_type', $current_property_details->multi_query_result[ $property_uid ]['property_type'] );
				
				$jomres_media_centre_images->get_images($property_uid, array('property'));
				
				$r['PROPERTY_NAME'] = jomres_decode($p['property_name']);
				$r['ID'] = $counter;
				$r['PROPERTY_IMAGE'] =$jomres_media_centre_images->images ['property'][0][0]['large'];
				$r['PROPERTY_IMAGE_THUMB'] =$jomres_media_centre_images->images ['property'][0][0]['small'];

				$jomres_markdown = new jomres_markdown();
				$property_description = $jomres_markdown->get_markdown($p['property_description']);
				
				$r['PROPERTY_DESCRIPTION'] = jr_substr(strip_tags(jomres_decode($property_description)),0,$description_number_of_chars);
				$r['MOREINFORMATIONLINK']=jomresURL( JOMRES_SITEPAGE_URL."&task=viewproperty&property_uid=".$property_uid) ;

				$rows[] = $r;
				$counter++;
				}
			}
		
		$output=array();
		$output['HTITLE']=jr_gettext('_JE_FPS_MODULE_TITLE','_JE_FPS_MODULE_TITLE',false);
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'slider.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	
	function genericIn($idArray,$idArrayisInteger=true)
		{
		$newArr=array();
		foreach ($idArray as $id)
			{
			$newArr[]=$id;
			}
		$idArray=$newArr;
		$txt=" ( ";
		for ($i=0, $n=count($idArray); $i < $n; $i++)
			{
			if ($idArrayisInteger)
				$id=(int)$idArray[$i];
			else
				$id=$idArray[$i];
			$txt .= "'$id'";
			if ($i < count($idArray)-1)
				$txt .= ",";
			}
		$txt .= " ) ";
		return $txt;
		}
	}
