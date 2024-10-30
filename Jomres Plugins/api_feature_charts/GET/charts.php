<?php
/**
* Jomres CMS Agnostic Plugin
* @author  John m_majma@yahoo.com
* @version Jomres 9
* @package Jomres
* @copyright 2017
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

/*
	** Title | Get Charts (bookings) for a specific property
	** Description | Get Charts (bookings) by property uid
	** Plugin | api_feature_charts
	** Scope | properties_get
	** URL | charts
 	** Method | GET
	** URL Parameters | charts/@id/bookings(/:LANGUAGE) LANGUAGE is optional, default to en-GB if not sent
	** Data Parameters | None
	** Success Response |{
  "data": {
    "charts_bookings": {
      "2016": {
        "title": "Bookings",
        "description": "Income by year/month",
        "labels": [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec"
        ],
        "label": 2016,
        "data": [
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          "35.00"
        ],
        "fillColor": "rgba(240,84,72,0.2)",
        "strokeColor": "rgba(240,84,72,1)",
        "pointColor": "rgba(240,84,72,1)",
        "pointStrokeColor": "#fff",
        "pointHighlightFill": "#fff",
        "pointHighlightStroke": "rgba(240,84,72,1)"
      }
    }
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/charts/1/bookings
	** Notes |
*/

Flight::route('GET /charts/@id/bookings(/@language)', function( $property_uid, $language )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");


	//////////// can be deleted

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
    $query = 'SELECT
				a.id,
				a.status,
				a.raised_date,
				SUM( CASE WHEN b.init_total_inclusive < 0 THEN 0 ELSE b.init_total_inclusive END ) AS grand_total
			FROM '.Flight::get("dbprefix").'jomresportal_invoices a
				JOIN '.Flight::get("dbprefix").'jomresportal_lineitems b ON a.id = b.inv_id
			WHERE a.property_uid = :property_uid
				AND a.status = 1
				AND a.contract_id > 0
			GROUP BY a.id
			ORDER BY a.raised_date ASC
			';

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);

	$results 	= array();
	$labels		= array();
	$datasets	= array();

	while ($row = $stmt->fetch())
		{
        $month = date('n', strtotime($row['raised_date']));
        $year = date('Y', strtotime($row['raised_date']));

        if (isset($results[$year][$month])) {
            $results[$year][$month] += number_format((float) $row['grand_total'], 2, '.', '');
        } else {
            $results[$year][$month] = number_format((float) $row['grand_total'], 2, '.', '');
            }
        }

        ksort($results);

    foreach ($results as $k => $v) {
        $data = array();

        //build data for each month
        for ($i = 1; $i <= 12; ++$i) {
            if (isset($v[$i])) {
                $data[] = $v[$i];
            } else {
                $data[] = 0;
                }
            }

        //generate the dataset color
        $a = mt_rand(0, 255);
        $b = mt_rand(0, 255);
        $c = mt_rand(0, 255);

        //set dataset details
        $datasets[$k] = array(
            'title' => jr_gettext('_JOMRES_STATUS_BOOKINGS','_JOMRES_STATUS_BOOKINGS',false),
            'description' => jr_gettext("_JOMRES_CHART_BOOKINGS_DESC",'_JOMRES_CHART_BOOKINGS_DESC',false),
            'labels' => array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"),
            'label' => $k,
            'data' => $data,
            'fillColor' => 'rgba('.$a.','.$b.','.$c.',0.2)',
            'strokeColor' => 'rgba('.$a.','.$b.','.$c.',1)',
            'pointColor' => 'rgba('.$a.','.$b.','.$c.',1)',
            'pointStrokeColor' => '#fff',
            'pointHighlightFill' => '#fff',
            'pointHighlightStroke' => 'rgba('.$a.','.$b.','.$c.',1)',
            );
        }

	$conn = null;
	Flight::json( $response_name = "charts_bookings" ,$datasets);
	});

/*
	** Title | Get Charts (Guest Countries) for a specific property
	** Description | Get Charts (Guest Countries) by property uid
	** Plugin | api_feature_charts
	** Scope | properties_get
	** URL | charts
 	** Method | GET
	** URL Parameters | charts/@id/(/:LANGUAGE) LANGUAGE is optional, default to en-GB if not sent
	** Data Parameters | None
	** Success Response |{
  "data": {
    "charts_guest_contries": [
      {
        "title": "Guests",
        "description": "Country",
        "labels": [
          "Germany",
          "United Kingdom",
          false,
          "United States"
        ],
        "label": "February 2017",
        "data": [
          3,
          3,
          1,
          1
        ],
        "fillColor": "rgba(11,43,156,0.2)",
        "strokeColor": "rgba(11,43,156,1)",
        "pointColor": "rgba(11,43,156,1)",
        "pointStrokeColor": "#fff",
        "pointHighlightFill": "#fff",
        "pointHighlightStroke": "rgba(11,43,156,1)"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/charts/1/guest_countries
	** Notes |
*/

Flight::route('GET /charts/@id/guest_countries(/@language)', function( $property_uid, $language )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");

    jr_import('jomres_encryption');
    $jomres_encryption = new jomres_encryption();
	
	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query = "SELECT `enc_country`, COUNT(`enc_country`) AS how_many FROM ".Flight::get("dbprefix")."jomres_guests WHERE `property_uid` = :property_uid
			GROUP BY `enc_country`
			ORDER BY how_many DESC
				";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);

			$labels		= array();
			$data 		= array();
			$datasets	= array();

			$decrypted = array();
			while ($row = $stmt->fetch()) {
				$data[] = $row['how_many'];
				
				$country_code = $jomres_encryption->decrypt($row['enc_country']);
				
				$country = getSimpleCountry($country_code);
				
				if ( isset($labels[$country] ) ) {
					$labels[$country]++;
				} else {
					$labels[$country] = 1;
				}
				
				
				
			}

			//generate the dataset color
			$a = mt_rand(0, 255);
			$b = mt_rand(0, 255);
			$c = mt_rand(0, 255);

			//set dataset details
			$datasets[0] = array(
								'title' => jr_gettext('_JOMRES_HLIST_GUESTS','_JOMRES_HLIST_GUESTS',false),
								'description' => jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY','_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',false),
								'labels' => $labels,
								'label' => date("F").' '.date("Y"),
								'data' => $data,
								'fillColor' => "rgba(".$a.",".$b.",".$c.",0.2)",
								'strokeColor' => "rgba(".$a.",".$b.",".$c.",1)",
								'pointColor' => "rgba(".$a.",".$b.",".$c.",1)",
								'pointStrokeColor' => "#fff",
								'pointHighlightFill' => "#fff",
								'pointHighlightStroke' => "rgba(".$a.",".$b.",".$c.",1)"
								);

	$conn = null;
	Flight::json( $response_name = "charts_guest_contries" ,$datasets);
	});

/*
	** Title | Get Charts (occupancy) for a specific property
	** Description | Get Charts (occupancy) by property uid
	** Plugin | api_feature_charts
	** Scope | properties_get
	** URL | charts
 	** Method | GET
	** URL Parameters | charts/@id/(/:LANGUAGE) LANGUAGE is optional, default to en-GB if not sent
	** Data Parameters | None
	** Success Response |{
  "data": {
    "charts_occupancy": [
      {
        "title": "Bookings February 2017",
        "description": "Rooms booked by month/day",
        "labels": [
          1,
          2,
          3,
          4,
          5,
          6,
          7,
          8,
          9,
          10,
          11,
          12,
          13,
          14,
          15,
          16,
          17,
          18,
          19,
          20,
          21,
          22,
          23,
          24,
          25,
          26,
          27,
          28
        ],
        "label": "February 2017",
        "data": [
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          2,
          2,
          2,
          2,
          0,
          0,
          0,
          0,
          0,
          0,
          0,
          2,
          2,
          1,
          1,
          1,
          1,
          1,
          1,
          0
        ],
        "fillColor": "rgba(95,90,110,0.2)",
        "strokeColor": "rgba(95,90,110,1)",
        "pointColor": "rgba(95,90,110,1)",
        "pointStrokeColor": "#fff",
        "pointHighlightFill": "#fff",
        "pointHighlightStroke": "rgba(95,90,110,1)"
      }
    ]
  },
  "meta": {
    "code": 200
  }
}
	** Error Response | 403 "User attempted to access a property that they don't have rights to access"
	** Sample call |jomres/api/charts/1/occupancy
	** Notes |
*/

Flight::route('GET /charts/@id/occupancy(/@language)', function( $property_uid, $language )
	{
	validate_scope::validate('properties_get');
	validate_property_access::validate($property_uid);

	if (!isset($language))
		$language = "en-GB";
	$_REQUEST['jomreslang'] = $language;
	require_once("../framework.php");


	//get days in month to be used later on X axis
	$current_month = date("m");
	$current_year = date("Y");
	$days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

	$conn = Flight::db();
	$conn->query("SET NAMES 'UTF8'");
	$query = "SELECT DATE_FORMAT(`date`, '%e') AS booked_date, COUNT(`room_uid`) AS rooms_booked
			FROM ".Flight::get("dbprefix")."jomres_room_bookings
			WHERE `property_uid` = :property_uid
			AND DATE_FORMAT(`date`, '%Y/%m') = '".$current_year."/".$current_month."'
			GROUP BY booked_date
			ORDER BY booked_date ASC
			";

	$stmt = $conn->prepare( $query );
	$stmt->execute([ 'property_uid' => $property_uid ]);

			$results 	= array ();
			$labels		= array();
			$data 		= array();
			$datasets	= array();

			while ($row = $stmt->fetch())
			{
			if (isset($results[$row['booked_date']]))
				$results[$row['booked_date']] += $row['rooms_booked'];
			else
				$results[$row['booked_date']] = $row['rooms_booked'];
			}

			ksort($results);

			//X-axis labels and Y-axis data
			for ($i = 1; $i <= $days_in_month; $i++)
				{
				$labels[] = $i;

				if (isset($results[$i]))
					$data[] = $results[$i];
				else
					$data[] = 0;
				}

			//generate the dataset color
			$a = mt_rand(0, 255);
			$b = mt_rand(0, 255);
			$c = mt_rand(0, 255);

			//set dataset details
			$datasets[0] = array(
								'title' => jr_gettext('_JOMRES_STATUS_BOOKINGS','_JOMRES_STATUS_BOOKINGS',false).' '.date("F").' '.date("Y"),
								'description' => jr_gettext("_JOMRES_CHART_OCCUPANCY_DESC",'_JOMRES_CHART_OCCUPANCY_DESC',false),
								'labels' => $labels,
								'label' => date("F").' '.date("Y"),
								'data' => $data,
								'fillColor' => "rgba(".$a.",".$b.",".$c.",0.2)",
								'strokeColor' => "rgba(".$a.",".$b.",".$c.",1)",
								'pointColor' => "rgba(".$a.",".$b.",".$c.",1)",
								'pointStrokeColor' => "#fff",
								'pointHighlightFill' => "#fff",
								'pointHighlightStroke' => "rgba(".$a.",".$b.",".$c.",1)"
								);
	$conn = null;
	Flight::json( $response_name = "charts_occupancy" ,$datasets);
	});
