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

class j16000saveRfeature
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

		$roomFeatureUid      	 = jomresGetParam( $_REQUEST, 'roomFeatureUid', 0 );
		$feature_description     = jomresGetParam( $_REQUEST, 'feature_description', "" );
		$property_uid			 = jomresGetParam( $_REQUEST, 'property_uid', 0 );
		$ptype_ids		         = jomresGetParam( $_REQUEST, 'ptype_ids', array() );
		$image                	 = jomresGetParam( $_REQUEST, 'image', "" );

		if ( empty( $roomFeatureUid ) )
			{
			$query = "INSERT INTO #__jomres_room_features (`feature_description`,`property_uid`,`ptype_xref`, `image` ) VALUES ('$feature_description','0','" . serialize($ptype_ids) . "', '$image')";
			if ( doInsertSql( $query, '' ) ) jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=listRfeatures" ), "" );
			}
		else
			{
			$query = "UPDATE #__jomres_room_features SET `feature_description`='$feature_description',`ptype_xref`='" . serialize($ptype_ids) . "', `image` = '$image' WHERE room_features_uid='" . (int) $roomFeatureUid . "' AND property_uid = '0'";
			if ( doInsertSql( $query, '' ) ) jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL_ADMIN . "&task=listRfeatures" ), "" );
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}