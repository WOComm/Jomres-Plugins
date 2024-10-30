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

class j06001overview
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false; return;
			}
		
		$this->retVals = '';
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$property_uid = 0;
		
		if (isset($componentArgs[ 'property_uid' ]))
			$property_uid = $componentArgs[ 'property_uid' ];
		if ( (int)$property_uid == 0 ) 
			$property_uid = getDefaultProperty();

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if ( !in_array( $property_uid, $thisJRUser->authorisedProperties ) ) return;
		
		$mrConfig = getPropertySpecificSettings( $property_uid );
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) return;
		
        if (isset($componentArgs[ 'output_now' ])) {
            $output_now = $componentArgs[ 'output_now' ];
        } else {
            $output_now = true;
        }

		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		$output=array();
		$pageoutput=array();
		
		$output['PAGETITLE'] = "Overview";
		$output['TODAY_CHECKINS'] = $MiniComponents->specificEvent( '06001', 'overview_checkins', array ( 'output_now' => false ) );
		$output['TODAY_CHECKOUTS'] = $MiniComponents->specificEvent( '06001', 'overview_checkouts', array ( 'output_now' => false ) );
		$output['TODAY_RESIDENTS'] = $MiniComponents->specificEvent( '06001', 'overview_residents', array ( 'output_now' => false ) );
		
		//$output['NEW_BOOKINGS'] = $MiniComponents->miniComponentData[ '06001' ][ 'new_bookings' ][ 'newbookings' ];
		
		//$output['WORKORDERS'] = $MiniComponents->miniComponentData[ '06001' ][ 'workorders' ][ 'workorders' ];
		
		//$output['OUT_OF_SERVICE_ROOMS'] = $MiniComponents->miniComponentData[ '06001' ][ 'new_bookings' ][ 'newbookings' ];

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->readTemplatesFromInput( 'overview.html');
        $template = $tmpl->getParsedTemplate();
        if ($output_now) {
            echo $template;
        } else {
            $this->retVals = $template;
        }
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
