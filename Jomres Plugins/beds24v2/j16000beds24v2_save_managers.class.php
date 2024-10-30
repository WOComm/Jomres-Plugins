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
class j16000beds24v2_save_managers
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

		$properties           = jomresGetParam( $_POST, 'properties', array() );
		if (count($properties) > 0 )
			{
			foreach ($properties as $property_uid=>$manager_id)
				{
				// There have been instances where duplicate records have been created in this table so that there have been one or more managers listed in this table. Therefore we'll make an effort to delete all rows for each property uid to ensure that there's just the one record for each property.
				
				$query = "SELECT `beds24_property_uid` FROM #__jomres_beds24_property_uid_xref WHERE `property_uid` =  ".(int)$property_uid." LIMIT 1";
				$result = doSelectSql($query , 2 );
				$beds24_property_uid = $result ['beds24_property_uid'];

				$query = "DELETE FROM #__jomres_beds24_property_uid_xref WHERE `property_uid` =  ".(int)$property_uid;
				$query = doInsertSql ( $query );
	
				$query = "INSERT INTO #__jomres_beds24_property_uid_xref (`property_uid` , `beds24_property_uid` , `manager_id` ) VALUES ( ".(int)$property_uid." , ".(int)$beds24_property_uid." , ".(int)$manager_id." )";
				$query = doInsertSql ( $query );
				}
			}
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=beds24v2_listpropertys" ) );
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}