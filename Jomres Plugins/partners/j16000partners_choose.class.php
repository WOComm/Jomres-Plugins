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

class j16000partners_choose
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$output=array();

		$output['AJAXURL']=JOMRES_SITEPAGE_URL_ADMIN."&format=raw&no_html=1&task=";
		$output['LIVESITE']=JOMRES_SITEPAGE_URL_ADMIN."";

		$output['_JOMRES_PARTNER_CHOOSE_SEARCHTITLE']=jr_gettext('_JOMRES_PARTNER_CHOOSE_SEARCHTITLE','_JOMRES_PARTNER_CHOOSE_SEARCHTITLE',FALSE);
		$output['_JOMRES_PARTNER_CHOOSE_SEARCH_INSTRUCTIONS']=jr_gettext('_JOMRES_PARTNER_CHOOSE_SEARCH_INSTRUCTIONS','_JOMRES_PARTNER_CHOOSE_SEARCH_INSTRUCTIONS',FALSE);
		$output['_JOMRES_PARTNER_CHOOSE_EXISTINGTITLE']=jr_gettext('_JOMRES_PARTNER_CHOOSE_EXISTINGTITLE','_JOMRES_PARTNER_CHOOSE_EXISTINGTITLE',FALSE);
		$output['_JOMRES_PARTNER_CHOOSE_EXISTING_INSTRUCTIONS']=jr_gettext('_JOMRES_PARTNER_CHOOSE_EXISTING_INSTRUCTIONS','_JOMRES_PARTNER_CHOOSE_EXISTING_INSTRUCTIONS',FALSE);
		$output['_JOMRES_PARTNERS_TITLE']=jr_gettext('_JOMRES_PARTNER_DISCOUNT','_JOMRES_PARTNER_DISCOUNT',FALSE);
		$output['HUSERNAME'] = jr_gettext('_JOMRES_COM_MR_ASSIGNUSER_USERNAME','_JOMRES_COM_MR_ASSIGNUSER_USERNAME',FALSE);

		$all_users = jomres_cmsspecific_getCMSUsers();
		$rows = array();
		$query = "SELECT id,cms_userid FROM #__jomres_partners";
		$existing = doSelectSql($query);
		if (!empty($existing))
			{
			foreach ($existing as $partner)
				{
				$row = array();
				$cms_userid = $partner->cms_userid;
				
				if (!using_bootstrap())
					{
					$row['LINK'] = '<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=partner_show&id='.$cms_userid.'">'.$all_users[$cms_userid]["username"].'</a>';
					$row['DELETELINK'] = '<a href="'.JOMRES_SITEPAGE_URL_ADMIN.'&task=partner_delete&no_html=1&id='.$cms_userid.'"><img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png" /></a><br/>';
					}
				else
					{
					$row['USERNAME'] = $all_users[$cms_userid]["username"];
					
					$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
					$toolbar->newToolbar();
					$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=partner_show&id=' . $cms_userid ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
					$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=partner_delete&id=' . $cms_userid ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
					
					$row['EDITLINK'] = $toolbar->getToolbar();
					}
				
				$rows[]=$row;
				}
			}
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'partners_choose.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}