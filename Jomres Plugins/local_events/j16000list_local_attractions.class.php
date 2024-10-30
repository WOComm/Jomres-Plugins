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

class j16000list_local_attractions
{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$editIcon	='<IMG SRC="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon">';
		$output=array();
		
		$output['PAGETITLE']=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_TITLE','_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',false);
		
		$output['HEVENT_TITLE']		=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE','_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',false);
		$output['HICON']			=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_ICON','_JRPORTAL_LOCAL_ATTRACTIONS_ICON',false);
		$output['HLATITUDE']		=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE','_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE',false);
		$output['HLONGITUDE']		=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE','_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE',false);
		$output['HWEBSITEURL']		=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL','_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',false);
		$output['HEVENTLOGORELPATH']=jr_gettext( '_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH','_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',false);
		
		$query = "SELECT * FROM #__jomres_local_attractions";
		$result = doSelectSql($query);

		$rows=array();
		foreach ($result as $res)
			{
			$r=array();
			$r['ID']=$res->id;
			$r['TITLE']=$res->title;
			
			$r['ICON'] = get_marker_src($res->marker);
			
			$r['LATITUDE']=$res->latitude;
			$r['LONGITUDE']=$res->longitude;
			$r['WEBSITE_URL']=$res->website_url;
			$r['EVENT_LOGO']=$res->event_logo;
			
			if (!using_bootstrap())
				{
				$r['EDITLINK']='<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=edit_local_attraction&id='.(int)$res->id.'">'.$editIcon.'</a>';
				}
			else
				{
				$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
				$toolbar->newToolbar();
				$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=edit_local_attraction&id=' . $res->id ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
				$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=delete_local_attraction&id=' . $res->id ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
				
				$r['EDITLINK'] = $toolbar->getToolbar();
				}

			$rows[]=$r;
			}

		if (class_exists('jomres_toolbar'))
			$jrtbar = new jomres_toolbar();
		else
			$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN,jr_gettext( '_JRPORTAL_CANCEL','_JRPORTAL_CANCEL',false));
		$jrtb .= $jrtbar->toolbarItem('new',JOMRES_SITEPAGE_URL_ADMIN."&task=edit_local_attraction",'');

		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_local_attractions.html');
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