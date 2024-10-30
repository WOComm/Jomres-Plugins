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

class j00001nearest_properties_functions
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

	
// A script to insert a function that'll find the nearest X properties 
// http://www.movable-type.co.uk/scripts/latlong-db.html
// © 2008-2010 Chris Veness
function jomres_find_nearest_properties_by_lat_long($lat,$lon,$rad, $limit,$unit="m")
	{
	//$lat = $_GET['lat'];  // latitude of centre of bounding circle in degrees
	//$lon = $_GET['lon'];  // longitude of centre of bounding circle in degrees
	//$rad = $_GET['rad'];  // radius of bounding circle in kilometers
	
	$lat = (float)$lat;
	$lon = (float)$lon;
	$rad = (float)$rad;
	$limit = (int)$limit;
	
	if ($lat ==  0 )
		return false;
	if ($lon ==  0 )
		return false;
	if ($rad ==  0 )
		return false;
	if ($unit != "m" && $unit != "km")
		return false;
	
	if ($unit="km")
		$R = 6371;  // earth's radius, km
	else
		$R = 3959;
	  
	// first-cut bounding box (in degrees)
	$maxLat = $lat + rad2deg($rad/$R);
	$minLat = $lat - rad2deg($rad/$R);
	// compensate for degrees longitude getting smaller with increasing latitude
	$maxLon = $lon + rad2deg($rad/$R/cos(deg2rad($lat)));
	$minLon = $lon - rad2deg($rad/$R/cos(deg2rad($lat)));
	  
	// convert origin of filter circle to radians
	$lat = deg2rad($lat);
	$lon = deg2rad($lon);

	$query = "
	SELECT `propertys_uid`, `lat`, `long`, `published`,
			acos(sin($lat)*sin(radians(`lat`)) + cos($lat)*cos(radians(`lat`))*cos(radians(`long`)-$lon))*$R AS D
		FROM (
		SELECT `propertys_uid`, `lat`, `long`,`published`
			FROM #__jomres_propertys
		WHERE `lat`>$minLat And `lat`<$maxLat
			AND `long`>$minLon And `long`<$maxLon
		) AS FirstCut 
		WHERE acos(sin($lat)*sin(radians(`lat`)) + cos($lat)*cos(radians(`lat`))*cos(radians(`long`)-$lon))*$R < $rad
		ORDER by D
		LIMIT $limit
		";
	$points = doSelectSql($query);
	$result = array();
	foreach ($points as $p)
		{
		$result [$p->propertys_uid]['propertys_uid']=$p->propertys_uid;
		$result [$p->propertys_uid]['lat']=$p->lat;
		$result [$p->propertys_uid]['long']=$p->long;
		$result [$p->propertys_uid]['published']=$p->published;
		}
	
	return $result;
	}
