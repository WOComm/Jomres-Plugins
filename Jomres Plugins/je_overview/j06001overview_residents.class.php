<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 7
 * @package Jomres
 * @copyright    2005-2013 Vince Wooll
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06001overview_residents
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$property_uid = 0;
		
		if (isset($componentArgs[ 'property_uid' ]))
			$property_uid = $componentArgs[ 'property_uid' ];
		if ( (int)$property_uid == 0 ) 
			$property_uid = getDefaultProperty();
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		if (isset($componentArgs[ 'is_widget' ])) {
            $is_widget = $componentArgs[ 'is_widget' ];
        } else {
            $is_widget = false;
        }
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if ( !in_array( $property_uid, $thisJRUser->authorisedProperties ) ) return;
		
		$mrConfig = getPropertySpecificSettings( $property_uid );
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) return;
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		$output=array();
		$pageoutput=array();

		$output['PAGETITLE'] = jr_gettext( '_JOMRES_HOVERVIEW_CURRENT_RESIDENTS', '_JOMRES_HOVERVIEW_CURRENT_RESIDENTS', false );
		$output['HBOOKINGNO'] = jr_gettext( '_JOMRES_BOOKING_NUMBER', '_JOMRES_BOOKING_NUMBER', false );
		$output['HFIRSTNAME'] = jr_gettext( '_JOMRES_COM_MR_DISPGUEST_FIRSTNAME', '_JOMRES_COM_MR_DISPGUEST_FIRSTNAME', false );
		$output['HSURNAME'] = jr_gettext( '_JOMRES_COM_MR_DISPGUEST_SURNAME', '_JOMRES_COM_MR_DISPGUEST_SURNAME', false );
		
		if ( $mrConfig[ 'wholeday_booking' ] == "1" )
			{
			$output[ 'HARRIVAL' ]   = jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL_WHOLEDAY', '_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL_WHOLEDAY', false );
			$output[ 'HDEPARTURE' ] = jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE_WHOLEDAY', '_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE_WHOLEDAY', false );
			}
		else
			{
			$output[ 'HARRIVAL' ] = jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL', '_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL', false );
			if ( $mrConfig[ 'showdepartureinput' ] == "1" ) 
				$output[ 'HDEPARTURE' ] = jr_gettext( '_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE', '_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE', false );
			else
				$output[ 'HDEPARTURE' ] = " ";
			}
		
		$output['AJAX_URL']=JOMRES_SITEPAGE_URL_AJAX."&task=overview_residents_ajax";

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows( 'pageoutput',$pageoutput);

		if (!$is_widget) {
			$tmpl->readTemplatesFromInput( 'overview_residents.html');
		} else {
			$tmpl->readTemplatesFromInput( 'widget_overview_residents.html');
		}
		
		$this->retVals = '';
		
		if($output_now)
			$tmpl->displayParsedTemplate();
		else
			$this->retVals = $tmpl->getParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
