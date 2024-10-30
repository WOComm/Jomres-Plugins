<?php
/**
 * Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 8
* @package Jomres
* @copyright	2005-2014 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000show_local_events 
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch) {
				$this->template_touchable=false; 
				
				return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$this->retVals = '';
		
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
		
		$output['PAGETITLE']=jr_gettext('_JRPORTAL_LOCAL_EVENTS_TITLE','_JRPORTAL_LOCAL_EVENTS_TITLE',false);
		
		$output['HEVENT_TITLE']		=jr_gettext('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE','_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',false);
		$output['HSTARTDATE']		=jr_gettext('_JRPORTAL_LOCAL_EVENTS_STARTDATE','_JRPORTAL_LOCAL_EVENTS_STARTDATE',false);
		$output['HENDDATE']			=jr_gettext('_JRPORTAL_LOCAL_EVENTS_ENDDATE','_JRPORTAL_LOCAL_EVENTS_ENDDATE',false);
		$output['HWEBSITEURL']		=jr_gettext('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL','_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',false);
		$output['HEVENTLOGORELPATH']=jr_gettext('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH','_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',false);
		
		$today = date("Y-m-d");
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();
		
		if (isset($componentArgs[ 'radius' ])  &&  (int)$componentArgs[ 'radius' ] > 1  )
			$radius = (int) $componentArgs[ 'radius' ];
		elseif ( isset ( $_REQUEST['radius'] ) &&  (int)$_REQUEST['radius'] > 1 )
			$radius = (int) $_REQUEST['radius'];
		else
			$radius = (int)$jrConfig['local_events_radius'];
		
		$result = find_items_within_range_for_property_uid("local_events",$property_uid, $radius);

		if (empty($result))
			return;
		
		$rows=array();
		$counter=0;
		foreach ($result as $res)
			{
			$r=array();
			$r['ID']=$res->id;
			$r['TITLE']=$res->title;
			$r['START_DATE']=outputDate(str_replace("-","/",$res->start_date));
			$r['END_DATE']=outputDate(str_replace("-","/",$res->end_date));
			$r['LATITUDE']=$res->latitude;
			$r['LONGITUDE']=$res->longitude;
			$r['WEBSITE_URL']=trim($res->website_url);
			$r['EVENT_LOGO']=trim($res->event_logo);
			$r['DESCRIPTION']=jr_gettext("_JRPORTAL_LOCAL_EVENTS_CUSTOMTEXT_DESCRIPTION".$res->id,$res->description,false,false);
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
		$tmpl->readTemplatesFromInput( 'frontend_list_local_events.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$content = $tmpl->getParsedTemplate();

		if ( $output_now )
			echo $content;
		else
			$this->retVals = $content;
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
