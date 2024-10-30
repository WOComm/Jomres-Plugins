<?php
/**
 * Jomres CMS Agnostic Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 10.7
 * @package Jomres
 * @copyright	2005-2023 Woollyinwales IT
 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
 **/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06002module_basics_save {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

        $property_uid = getDefaultProperty();

        $mrConfig = getPropertySpecificSettings($property_uid);

        $accommodates = jomresGetParam( $_POST, 'accommodates', 0 );
        $bedrooms = jomresGetParam( $_POST, 'bedrooms', 0 );
        $bathrooms = jomresGetParam( $_POST, 'bathrooms', 0 );
        $size = jomresGetParam( $_POST, 'size',0 );

        $mrConfig['module_basics'] =  base64_encode( serialize(['accommodates' => $accommodates ,'bedrooms' => $bedrooms,'bathrooms' => $bathrooms,'size' => $size]));


        $query = "SELECT uid FROM #__jomres_settings WHERE property_uid = '".(int) $property_uid."' and `akey` = 'module_basics'";
        $result = doSelectSql($query);
        if (empty($result)) {
            $query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('".(int) $property_uid."','module_basics','".$mrConfig['module_basics']."')";
        } else {
            $query = "UPDATE #__jomres_settings SET `value`='".$mrConfig['module_basics']."' WHERE property_uid = '".(int) $property_uid."' and akey = 'module_basics'";
        }

        doInsertSql($query, '');


        jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=module_basics_config'), '');
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
