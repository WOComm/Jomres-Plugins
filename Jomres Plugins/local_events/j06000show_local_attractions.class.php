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

class j06000show_local_attractions {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable=false; 
			
			return;
		}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (isset($componentArgs[ 'property_uid' ])) {
            $property_uid = (int)$componentArgs[ 'property_uid' ];
        } else {
			$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
        }
		
		if ($property_uid == 0) {
            return;
        }
		
		if (!user_can_view_this_property($property_uid))
			return;
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		$output=array();
		$this->retVals = '';
		
		$output['PAGETITLE']=jr_gettext('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE','_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',false);
		
		$output['HEVENT_TITLE']		=jr_gettext('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE','_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',false);
		$output['HWEBSITEURL']		=jr_gettext('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL','_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',false);
		$output['HEVENTLOGORELPATH']=jr_gettext('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH','_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',false);
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if (isset($componentArgs[ 'radius' ])  &&  (int)$componentArgs[ 'radius' ] > 1  )
			$radius = (int) $componentArgs[ 'radius' ];
		elseif ( isset ( $_REQUEST['radius'] ) &&  (int)$_REQUEST['radius'] > 1 )
			$radius = (int) $_REQUEST['radius'];
		else
			$radius = (int)$jrConfig['local_events_radius'];
		
		$result = find_items_within_range_for_property_uid("local_attractions",$property_uid, $radius);

		if (empty($result))
			return;
		
		$rows=array();
		$counter=0;
		foreach ($result as $res)
			{
			$r=array();
			$r['ID']=$res->id;
			$r['TITLE']=$res->title;
			$r['WEBSITE_URL']=trim($res->website_url);
			$r['EVENT_LOGO']=trim($res->event_logo);
			$r['DESCRIPTION']=jr_gettext("_JRPORTAL_LOCAL_ATTRACTIONS_CUSTOMTEXT_DESCRIPTION".$res->id,$res->description,false,false);
			if ($counter%2)
				$r['CLASS']="even";
			else
				$r['CLASS']="odd";
			$rows[]=$r;
			$counter++;
			}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'frontend_list_local_attractions.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$content = $tmpl->getParsedTemplate();
		
		if ( $output_now )
			echo $content;
		else
			$this->retVals = $content;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
