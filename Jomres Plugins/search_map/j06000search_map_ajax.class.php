<?php
/**
* Jomres CMS Agnostic Plugin.
*
* @author Woollyinwales IT <sales@jomres.net>
*
* @version Jomres 9
*
* @copyright	2005-2015 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project
**/

// ################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
// ################################################################

class j06000search_map_ajax
{
    public function __construct()
    {
        $MiniComponents = jomres_getSingleton('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;
            return;
        }

		$ePointFilepath = get_showtime('ePointFilepath');

		$all_property_uids = array();

        // e.g. "hotels:1;villas:6;camp sites:4"
        $ptype_ids = jomresGetParam($_REQUEST, 'ptype_ids', '');

		$country = jomresGetParam($_REQUEST, 'country', '');
		$region = jomresGetParam($_REQUEST, 'region', '');
		$town = jomresGetParam($_REQUEST, 'town', '');

        $clause = '';

        if ($country != '') {
            $clause .= " AND `property_country` = '".$country."' ";
        }
		if ($region != '' ) {
            $clause .= " AND `property_region` = '".find_region_id($region)."' ";
        }
		if ($town != '' ) {
			$town = jomres_cmsspecific_stringURLSafe($town);
            $town = str_replace('-', '%', $town);
            $clause .= " AND `property_town` LIKE '".$town."' ";
        }

            $query = "SELECT `propertys_uid`  
			FROM #__jomres_propertys 
			WHERE 
			published = 1 
			"
            .$clause;

            $result = doSelectSql($query);

            if (!empty($result)) {
                foreach ($result as $r) {
					$all_property_uids[] = (int)$r->propertys_uid;
                }
            }

        $response = $MiniComponents->specificEvent('06000', 'search_map_build_arrays',   array( 'all_property_uids' => $all_property_uids ));

        if (!empty($response['rows'])) {
            echo json_encode(  $response );
        } else {
            echo json_encode([]);
        }
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return null;
    }
}
