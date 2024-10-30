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
#[AllowDynamicProperties]
class j06002beds24v2_associate_room_types
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

		$ePointFilepath=get_showtime('ePointFilepath');
        
		$property_uid              = jomresGetParam( $_REQUEST, 'property_uid', 0 );

        $JRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
        if (!in_array( $property_uid , $JRUser->authorisedProperties ) )
            throw new Exception("Manager cannot manage this property");

        $query = "DELETE FROM #__jomres_beds24_room_type_xref WHERE `property_uid` = ".(int)$property_uid;
        doInsertSql($query , "Deleted old room type associations");

        foreach ( $_POST['resource_id'] as $key => $val ) {
            $query = "INSERT INTO #__jomres_beds24_room_type_xref ( `jomres_room_type` , `beds24_room_type` , `property_uid` ) VALUES ( ".(int)$key ." , ".(int)$val." ,  ".(int)$property_uid." )";
			doInsertSql($query);
        }

        jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=beds24v2_configure_property&property_uid=".(int)$property_uid) );
        }
	

	
	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
