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

class j01009z_featured_listings
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$this->propertys_uids=get_showtime('filtered_property_uids');

		$prioritise_featured_properties = true;
		if ( !isset($jrConfig[ 'prioritise_featured_properties' ] ) || $jrConfig[ 'prioritise_featured_properties' ] == "0") {
			$prioritise_featured_properties = false;
		}
		
		$featured_listing_ids=array();
		if ($prioritise_featured_properties == true ) {
			$featured=array();
			$query="SELECT a.property_uid FROM #__jomresportal_featured_properties a, #__jomres_propertys b WHERE (a.property_uid = b.propertys_uid) AND b.published = 1 ORDER BY a.order ";
			$x_featured_listingsList=doSelectSQL($query);
			if (!empty($x_featured_listingsList))
				{
				foreach ($x_featured_listingsList as $p)
					{
					$featured[]=(int)$p->property_uid;
					}
				}

			
			if (!empty($featured))
				{
				foreach ($featured as $f)
					{
					if (in_array($f,$this->propertys_uids) )
						{
						$featured_listing_ids[]=$f;
						}
					}
				if (!empty($featured_listing_ids))
					{
					$newArray=array();
					foreach ($this->propertys_uids as $id)
						{
						if (!in_array($id,$featured_listing_ids))
							$newArray[]=$id;
						}

					$this->propertys_uids=array_merge($featured_listing_ids,$newArray);
					}
				}
			}
		
		set_showtime("featured_properties",$featured_listing_ids);
		
		$calledByModule = jomresGetParam($_REQUEST, 'calledByModule', '');
		$task = jomresGetParam($_REQUEST, 'task', '');
		
		if ($calledByModule != '' || $task == '' )
			{
			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
			$tmpBookingHandler->tmpsearch_data['ajax_list_search_results'] = $this->propertys_uids;
			unset($tmpBookingHandler->tmpsearch_data['ajax_list_properties_sets']);
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->propertys_uids;
		}
	}
