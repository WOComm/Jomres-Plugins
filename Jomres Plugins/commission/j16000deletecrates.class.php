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

class j16000deletecrates
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
		
		$idArray = jomresGetParam( $_REQUEST, 'idarray', array () );
		$id = (int)jomresGetParam( $_REQUEST, 'id', 0 );
		
		jr_import('jrportal_commissions');
		$jrportal_commissions = new jrportal_commissions();
		
		if ( !empty( $idArray ) )
			{
			$jrportal_commissions->deleteCrates( $idArray );
			}
		elseif ( $id > 0 )
			{
			$jrportal_commissions->deleteCrates( $id );
			}
		
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL_ADMIN . "&task=listcrates" ), '' );
		}


	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}