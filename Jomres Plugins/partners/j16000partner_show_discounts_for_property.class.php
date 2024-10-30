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

class j16000partner_show_discounts_for_property
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

		$partner_id	= (int)jomresGetParam( $_GET, 'partner_id', 0 );
		$property_id	= (int)jomresGetParam( $_GET, 'property_id', 0 );
		
		if ($partner_id > 0 && $property_id > 0)
			{
			$output=array();
			
			$output['_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID']=jr_gettext('_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID','_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID',FALSE);
			$output['_JOMRES_SORTORDER_PROPERTYNAME']=jr_gettext('_JOMRES_SORTORDER_PROPERTYNAME','_JOMRES_SORTORDER_PROPERTYNAME',FALSE);
			$output['_JOMRES_COM_MR_LISTTARIFF_VALIDFROM']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDFROM','_JOMRES_COM_MR_LISTTARIFF_VALIDFROM',FALSE);
			$output['_JOMRES_COM_MR_LISTTARIFF_VALIDTO']=jr_gettext('_JOMRES_COM_MR_LISTTARIFF_VALIDTO','_JOMRES_COM_MR_LISTTARIFF_VALIDTO',FALSE);
			$output['_JOMRES_AJAXFORM_BILLING_DISCOUNT']=jr_gettext('_JOMRES_AJAXFORM_BILLING_DISCOUNT','_JOMRES_AJAXFORM_BILLING_DISCOUNT',FALSE);
			
			$query = "SELECT * FROM #__jomres_partners_discounts WHERE partner_id = '".(int)$partner_id."' AND property_id = '".(int)$property_id."' ";
			$result = doSelectSql($query);

			$rows=array();
			foreach ($result as $res)
				{
				$r = array();

				$r['DISCOUNT_ID']	=$res->id;
				$r['PROPERTY_ID']	=$res->property_id;
				$r['PROPERTY_NAME']	=getPropertyName($property_id);
				
				$r['VALID_FROM']	=generateDateInput("valid_from_".$res->id,str_replace("-","/",$res->valid_from));
				$r['VALID_TO']		=generateDateInput("valid_to_".$res->id,str_replace("-","/",$res->valid_to));
				$r['DISCOUNT']		=$res->discount;
				$r['LIVESITE']	=get_showtime('live_site');
				$rows[]=$r;
				}
			
			$output['AJAXURL']=JOMRES_SITEPAGE_URL_ADMIN."&format=raw&no_html=1&task=";
			
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'partner_show_discounts_for_property.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->displayParsedTemplate();
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}