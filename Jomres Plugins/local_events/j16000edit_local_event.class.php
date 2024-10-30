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

class j16000edit_local_event {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$output=array();

		$output['HEVENT_TITLE']		=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE','_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',false);
		$output['HSTARTDATE']		=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_STARTDATE','_JRPORTAL_LOCAL_EVENTS_STARTDATE',false);
		$output['HENDDATE']			=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_ENDDATE','_JRPORTAL_LOCAL_EVENTS_ENDDATE',false);
		$output['HLATITUDE']		=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_LATITUDE','_JRPORTAL_LOCAL_EVENTS_LATITUDE',false);
		$output['HLONGITUDE']		=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_LONGITUDE','_JRPORTAL_LOCAL_EVENTS_LONGITUDE',false);
		$output['HWEBSITEURL']		=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_WEBSITEURL','_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',false);
		$output['HEVENTLOGORELPATH']=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH','_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',false);
		$output['HDESCRIPTION']		=jr_gettext( '_JRPORTAL_ADD_ADHOC_ITEM_DESCRIPTION','_JRPORTAL_ADD_ADHOC_ITEM_DESCRIPTION',false);
		$output['NOTES']			=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_NOTES','_JRPORTAL_LOCAL_EVENTS_NOTES',false);
		$output['_JRPORTAL_LOCAL_EVENTS_EDIT']			=jr_gettext( '_JRPORTAL_LOCAL_EVENTS_EDIT','_JRPORTAL_LOCAL_EVENTS_EDIT',false);
		$output[ '_JOMRES_PROPERTYTYPE_MARKER' ]		= jr_gettext( "_JOMRES_PROPERTYTYPE_MARKER", '_JOMRES_PROPERTYTYPE_MARKER', false );
		
		$id		= jomresGetParam( $_REQUEST, 'id', 0 );
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance('jomres_media_centre_images');
		$jomres_media_centre_images->get_site_images('markers');
		
		$output['ID']=$id;
		$output['TITLE']="Change me";
		$output['START_DATE']=generateDateInput('start_date',date("Y/m/d"));
		$output['END_DATE']=generateDateInput('end_date',date("Y/m/d"));
		$output['LATITUDE']='51.8'.rand(01,99);
		$output['LONGITUDE']='-4.9'.rand(01,99);
		$output['WEBSITE_URL']='';
		$output['EVENT_LOGO']='';
		$output['DESCRIPTION']='';
		$output['MARKER']= 'free-map-marker-icon-red.png';
		
		if ($id >0)
			{
			$query = "SELECT * FROM #__jomres_local_events WHERE id = ".$id;
			$result = doSelectSql($query,2);
			$output['TITLE']=$result['title'];
			$output['START_DATE']=generateDateInput('start_date',str_replace("-","/",$result['start_date']));
			$output['END_DATE']=generateDateInput('end_date',str_replace("-","/",$result['end_date']));

			$output['LATITUDE']=$result['latitude'];
			$output['LONGITUDE']=$result['longitude'];
			$output['WEBSITE_URL']=$result['website_url'];
			$output['EVENT_LOGO']=$result['event_logo'];
			$output['DESCRIPTION']=jr_gettext("_JRPORTAL_LOCAL_EVENTS_CUSTOMTEXT_DESCRIPTION".$id,$result['description'],false,false);
			$output['MARKER']=$result['marker'];
			}

		foreach ($jomres_media_centre_images->site_images['markers'] as $image) 
			{
			$r = array();
			
			$r[ 'IMAGE_FILENAME' ] = substr($image['large'], strrpos($image['large'], '/') + 1);
			$r[ 'IMAGE_SRC' ]  = $image['large'];
			
			$r['CHECKED'] = '';
			if ($r[ 'IMAGE_FILENAME' ] == $output['MARKER'])
				$r[ 'CHECKED' ] = "checked";
			
			$markers[] = $r;
			}
		
		if (class_exists('jomres_toolbar'))
			$jrtbar = new jomres_toolbar();
		else
			$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN."&task=list_local_events",'');
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_local_event');
		if ($id>0)
			$jrtb .= $jrtbar->toolbarItem('delete',JOMRES_SITEPAGE_URL_ADMIN."&task=delete_local_event&no_html=1&id=".$id,'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_local_event.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'markers', $markers );
		$tmpl->displayParsedTemplate();
		
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
