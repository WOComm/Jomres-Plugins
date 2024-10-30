<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.x
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06001widget_total_reservations
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "webhooks_core_documentation",
				"info" => "_JOMRES_SHORTCODES_06000WEBHOOKS_DOCS",
				"arguments" => array ()
				);
			return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
        $this->retVals = '';
		
		$property_uid = getDefaultProperty();
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		$output=array();
		$pageoutput=array();

		$query = "SELECT COUNT(contract_uid) FROM #__jomres_contracts WHERE property_uid = ".(int)$property_uid;
		$total = (int)doSelectSql($query,1);
		
		$query = "SELECT COUNT(contract_uid) FROM #__jomres_contracts WHERE property_uid = ".(int)$property_uid." AND booked_in = 0 AND cancelled = 0";
		$total_pending = (int)doSelectSql($query,1);
		
		$query = "SELECT COUNT(contract_uid) FROM #__jomres_contracts WHERE property_uid = ".(int)$property_uid." AND booked_out = 1";
		$total_completed = (int)doSelectSql($query,1);
		
		$query = "SELECT COUNT(contract_uid) FROM #__jomres_contracts WHERE property_uid = ".(int)$property_uid." AND cancelled = 1";
		$total_cancelled = (int)doSelectSql($query,1);
		
		$output['WIDGET_TOTAL_RESERVATIONS'] = jr_gettext( 'WIDGET_TOTAL_RESERVATIONS', 'WIDGET_TOTAL_RESERVATIONS', false );
		$output['TOTAL_RESERVATIONS'] = $total;
		
		$output['WIDGET_TOTAL_RESERVATIONS_PENDING'] = jr_gettext( 'WIDGET_TOTAL_RESERVATIONS_PENDING', 'WIDGET_TOTAL_RESERVATIONS_PENDING', false );
		$output['TOTAL_PENDING'] = $total_pending;
		
		$output['WIDGET_TOTAL_RESERVATIONS_COMPLETED'] = jr_gettext( 'WIDGET_TOTAL_RESERVATIONS_COMPLETED', 'WIDGET_TOTAL_RESERVATIONS_COMPLETED', false );
		$output['TOTAL_COMPLETED'] = $total_completed;
		
		$output['WIDGET_TOTAL_RESERVATIONS_CANCELLED'] = jr_gettext( 'WIDGET_TOTAL_RESERVATIONS_CANCELLED', 'WIDGET_TOTAL_RESERVATIONS_CANCELLED', false );
		$output['TOTAL_CANCELLED'] = $total_cancelled;
		
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->readTemplatesFromInput( 'widget_total_reservations.html');
		
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