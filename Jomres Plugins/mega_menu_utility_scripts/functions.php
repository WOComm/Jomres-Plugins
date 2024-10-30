<?php

function mega_menu_get_countries_and_regions()
	{
	$countries = array();
	
	$original_property_uid = get_showtime('property_uid');
	
	$query="SELECT `propertys_uid`, `property_country`, `property_region` FROM #__jomres_propertys WHERE `published` = 1 ";
	$result =doSelectSql($query); 

	// Do we have at least one property?
	if (empty($result))
		{
		echo "Error, you don't have any published properties";
		return;
		}

	foreach ($result as $p)
		{
		set_showtime( 'property_uid', $p->propertys_uid );

		$country_code = $p->property_country;
		
		if ( is_numeric( $p->property_region ) )
			{
			$jomres_regions = jomres_singleton_abstract::getInstance( 'jomres_regions' );
			$region = jr_gettext( "_JOMRES_CUSTOMTEXT_REGIONS_" . $p->property_region, $jomres_regions->get_region_name($p->property_region), false, false );
			}
		else
			$region = jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_REGION', $p->property_region, false, false );

		$country_name = getSimpleCountry($p->property_country);
		$region_id = $p->property_region;
		
		if (isset($country_name) && $region != "" )
			{
			$countries[$country_name]["country_code"] =$country_code;
			$countries[$country_name][$region_id] =$region;
			}
		}
	
	set_showtime( 'property_uid', $original_property_uid );
	
	ksort($countries);
	return $countries;
	}

function mega_menu_get_regions_and_towns()
	{
	$regions = array();
	
	$original_property_uid = get_showtime('property_uid');
	
	$query="SELECT `propertys_uid`, `property_region`, `property_town` FROM #__jomres_propertys WHERE `published` = 1 ";
	$result =doSelectSql($query); 

	// Do we have at least one property?
	if (empty($result))
		{
		echo "Error, you don't have any published properties";
		return;
		}
	
	foreach ($result as $p)
		{
		set_showtime( 'property_uid', $p->propertys_uid );

		$town = jr_gettext( '_JOMRES_CUSTOMTEXT_PROPERTY_TOWN', $p->property_town, false );
		$region_id = $p->property_region;
		
		$regions[$region_id][$town]=$town;
		}

	set_showtime( 'property_uid', $original_property_uid );
	
	ksort($regions);
	return $regions;
	}
