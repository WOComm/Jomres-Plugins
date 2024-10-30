<?php
/**
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j16000property_import
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) { $this->template_touchable = false; return; }
		
		$ePointFilepath=get_showtime('ePointFilepath');
		$pageoutput=array();
		$output=array();
		
		$jomres_property_types = jomres_singleton_abstract::getInstance('jomres_property_types');
		
		$output['_JOMRES_PROPERTY_IMPORT_DESC']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_DESC','_JOMRES_PROPERTY_IMPORT_DESC',false,false);
		$output['_JOMRES_PROPERTY_IMPORT_SELECT']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_SELECT','_JOMRES_PROPERTY_IMPORT_SELECT',false,false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELDS']	=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS','_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',false,false);
		$output['HPROPERTY_TYPE']						=jr_gettext('_JOMRES_FRONT_PTYPE','_JOMRES_FRONT_PTYPE',false);
		$output['PROPERTY_TYPE_DROPDOWN']				=$jomres_property_types->getPropertyTypeDropdown(0, true );
		$output['PAGETITLE']							=jr_gettext('_JOMRES_PROPERTY_IMPORT_TITLE','_JOMRES_PROPERTY_IMPORT_TITLE',false,false);

		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS']	=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION']	=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',false);
		
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE']	=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE']			=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE']		=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',false);
		$output['_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE']	=jr_gettext('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE','_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',false);

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN),"");
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'property_import_file');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( "property_import.html" );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}