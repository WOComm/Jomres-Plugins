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

class j16000savecrate
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}

		$id           = jomresGetParam( $_REQUEST, 'id', 0 );
		$title        = jomresGetParam( $_REQUEST, 'title', '' );
		$type         = jomresGetParam( $_REQUEST, 'type', 0 );
		$value        = jomresGetParam( $_REQUEST, 'value', 0.00 );
		$currencycode = jomresGetParam( $_REQUEST, 'currencycode', '' );
		$tax_rate     = jomresGetParam( $_REQUEST, 'tax_rate', 0 );

		jr_import('jrportal_commissions');
		$jrportal_commissions = new jrportal_commissions();
		
		$jrportal_commissions->id = $id;
		
		if ( $id > 0 ) 
			$jrportal_commissions->getCrate();
		
		$jrportal_commissions->title        = $title;
		$jrportal_commissions->type         = $type;
		$jrportal_commissions->value        = $value;
		$jrportal_commissions->currencycode = $currencycode;
		$jrportal_commissions->tax_rate     = $tax_rate;
		
		if ( $id > 0 ) 
			$jrportal_commissions->commitUpdateCrate();
		else
			$jrportal_commissions->commitNewCrate();
		
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=listcrates" ), '' );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
