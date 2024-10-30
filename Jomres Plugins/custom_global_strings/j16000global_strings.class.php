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

class j16000global_strings
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');
		
		$query = "SELECT `uid`, `constant`, `customtext`, `language`, `language_context` FROM #__jomres_custom_text WHERE `property_uid` = 0 ";
		$custom_global_strings = doSelectSql($query);

		$output = array();
		$rows = array();
		$output['PAGETITLE'] = jr_gettext('_JOMRES_GLOBALSTRINGS','_JOMRES_GLOBALSTRINGS',false);
		$output['INFO']=jr_gettext('_JOMRES_GLOBALSTRINGS_INFO','_JOMRES_GLOBALSTRINGS_INFO',false);
		
		$output['HID']=jr_gettext('_JOMRES_GLOBALSTRINGS_ID','_JOMRES_GLOBALSTRINGS_ID',false);
		$output['HCONSTANT']=jr_gettext('_JOMRES_GLOBALSTRINGS_CONSTANT','_JOMRES_GLOBALSTRINGS_CONSTANT',false);
		$output['HCUSTOMTEXT']=jr_gettext('_JOMRES_GLOBALSTRINGS_CUSTOMTEXT','_JOMRES_GLOBALSTRINGS_CUSTOMTEXT',false);
		$output['HLANGUAGE']=jr_gettext('_JOMRES_GLOBALSTRINGS_LANG','_JOMRES_GLOBALSTRINGS_LANG',false);
		$output['HDELETE']=jr_gettext('_JOMRES_GLOBALSTRINGS_DELETE','_JOMRES_GLOBALSTRINGS_DELETE',false);
		$output['HLANGUAGE_CONTEXT']=jr_gettext('_JOMRES_COM_LANGUAGE_CONTEXT','_JOMRES_COM_LANGUAGE_CONTEXT',false);

		if (!empty($custom_global_strings))
			{
			foreach ($custom_global_strings as $custom_string)
				{
				$r=array();
				$r['ID']=$custom_string->uid;
				$r['CONSTANT']=$custom_string->constant;
				$r['CUSTOMTEXT']=$custom_string->customtext;
				$r['LANGUAGE']=$custom_string->language;
				
				if ($custom_string->language_context != '0') {
					$r['LANGUAGE_CONTEXT']=$custom_string->language_context;
				} else {
					$r['LANGUAGE_CONTEXT']='';
				}
				
				if (!using_bootstrap())
					{
					$r['DELETELINK'] = '<a href="'.jomresUrl(JOMRES_SITEPAGE_URL_ADMIN.'&task=delete_global_string&id='.$custom_string->uid).'"><img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png"/></a>';
					}
				else
					{
					$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
					$toolbar->newToolbar();
					$toolbar->addItem( 'fa fa-trash-o', 'btn btn-danger', '', jomresURL( JOMRES_SITEPAGE_URL_ADMIN . '&task=delete_global_string&id=' . $custom_string->uid ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
					$r['DELETELINK'] = $toolbar->getToolbar();
					}
				
				$rows[]=$r;
				}
			}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_global_strings.html');
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