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

class j16000partner_list_discounts
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$this->ret_vals = '';
		if (!isset($componentArgs['cms_userid']))
			$cms_userid	= (int)jomresGetParam( $_GET, 'id', 0 );
		else
			$cms_userid	= (int)$componentArgs['cms_userid'];

		if ($cms_userid > 0)
			{
			$query = "SELECT DISTINCT property_id,valid_from,valid_to,discount FROM #__jomres_partners_discounts WHERE `partner_id` = ".(int)$cms_userid;
			$result = doSelectSql($query);
			$output=array();
			
			$output['_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID']=jr_gettext('_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID','_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID',FALSE);
			$output['_JOMRES_SORTORDER_PROPERTYNAME']=jr_gettext('_JOMRES_SORTORDER_PROPERTYNAME','_JOMRES_SORTORDER_PROPERTYNAME',FALSE);
			$output['_JOMRES_COM_MR_LISTTARIFF_VALIDFROM']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM','_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',FALSE);
			$output['_JOMRES_COM_MR_LISTTARIFF_VALIDTO']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO','_JOMRES_COM_MR_LISTTARIFF_VALIDTO',FALSE);
			$output['_JOMRES_AJAXFORM_BILLING_DISCOUNT']=jr_gettext('_JOMRES_AJAXFORM_BILLING_DISCOUNT','_JOMRES_AJAXFORM_BILLING_DISCOUNT',FALSE);
			
			$rows=array();
			foreach ($result as $res)
				{
				$r=array();

				$r['PROPERTY_ID']	=$res->property_id;
				$r['PROPERTY_NAME']	='<a href="javascript:void(0);" onClick="show_property_discounts('.$res->property_id.')">'.getPropertyName($res->property_id).'</a>';
				$r['VALID_FROM']	=$res->valid_from;
				$r['VALID_TO']		=$res->valid_to;
				$r['DISCOUNT']		=$res->discount;
				$rows[]=$r;
				}
			
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'partner_discounts_show.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows',$rows);
			if (!isset($componentArgs['cms_userid']))
				$tmpl->displayParsedTemplate();
			else
				$this->ret_vals=$tmpl->getParsedTemplate();

			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}	
	}