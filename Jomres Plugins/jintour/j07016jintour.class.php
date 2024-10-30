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

// Calculates the lowest price for a property for showing in listproperties
class j07016jintour {
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$property_uid = $componentArgs['property_uid'];

		$query = "SELECT 
						(
						 CASE WHEN `price_adults` > 0  
						 THEN `price_adults` 
						 ELSE `price_kids` 
						 END
						 ) AS price,
						`tax_rate` 
					FROM #__jomres_jintour_tours 
					WHERE tourdate > NOW() 
						AND `property_uid` = ".(int)$property_uid." 
					ORDER BY price ASC";
		$prices = doSelectSql($query);
		$price_adults=0.00;
		if (isset($prices[0]))
			{
			$price_adults=$prices[0]->price;
			
			$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
			$tax_rate=(float)$jrportal_taxrate->taxrates[$prices[0]->tax_rate]['rate'];
			}
		
		$mrConfig=getPropertySpecificSettings($property_uid);
		
		if ($mrConfig['prices_inclusive'] == 0 && $price_adults>0 )
			{
			$divisor	= ($tax_rate/100)+1;
			$rate=$price_adults+(($price_adults/100)*$tax_rate);
			}
		else
			$rate=$price_adults;

		if (!empty($prices))
			$price = output_price($rate);
		else
			$price = 0.00;
		
		$this->result = array ( "PRE_TEXT"=>jr_gettext('_JOMRES_TARIFFSFROM','_JOMRES_TARIFFSFROM',false,false),"PRICE"=>$price,"POST_TEXT"=>'');
		}


	function getRetVals()
		{
		return $this->result;
		}
	}
