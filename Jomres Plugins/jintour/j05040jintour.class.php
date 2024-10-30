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

class j05040jintour {
	function __construct($bkg)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$this->retVal = '';
		
		$mrConfig=getPropertySpecificSettings();
		$data = explode("^",$_GET['value']);
		// first some data validation
		if (count($data)!=3)
			return;
		$quantity = (int)$data[0];
		$type = (string)$data[1];
		if ($type != "adults" && $type != "kids")
			return;
		$tour_id = (int)$data[2];
		
		$valid_tours =$bkg->third_party_extras_private_data['jintour']['validtours'];
		if (empty($valid_tours))
			return;
		if (!array_key_exists($tour_id,$valid_tours))
			return;
		// Finish validation
		
		// Now to record the chosen option
		$bkg->third_party_extras_private_data['jintour']['chosen_options'][$tour_id]['tour_id']=$tour_id;
		if ($type == "adults")
			$bkg->third_party_extras_private_data['jintour']['chosen_options'][$tour_id]['adults']=$quantity;
		if ($type == "kids")
			$bkg->third_party_extras_private_data['jintour']['chosen_options'][$tour_id]['kids']=$quantity;
		$bkg->third_party_extras_private_data['jintour']['chosen_options'][$tour_id]['property_uid']=$valid_tours[$tour_id]['property_uid'];
		// Now we'll calculate the prices and save them against the booking
		
		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		
		if (!empty($bkg->third_party_extras_private_data['jintour']['chosen_options']))
			{
			foreach ($bkg->third_party_extras_private_data['jintour']['chosen_options'] as $tour)
				{
				$grand_total = 0.00;
				$tour_id = $tour['tour_id'];
				
				if (isset($tour['adults']))
					$number_of_adults = (int)$tour['adults'];
				else
					$number_of_adults = 0;
				
				if (isset($tour['kids']))
					$number_of_kids = (int)$tour['kids'];
				else
					$number_of_kids = 0;
				
				$tax_rate_id = $valid_tours[$tour_id]['tax_rate'];
				$rate = (float)$jrportal_taxrate->taxrates[$tax_rate_id]['rate'];

				$adult_price = $valid_tours[$tour_id]['price_adults'];
				$kid_price = $valid_tours[$tour_id]['price_kids'];
				
				if ($mrConfig['prices_inclusive'] == 0)
					{
					$tax   = ( $kid_price / 100 ) * $rate;
					$kid_price = $kid_price + $tax;
					
					$tax   = ( $adult_price / 100 ) * $rate;
					$adult_price = $adult_price + $tax;
					}
				
				$adult_total = 0.00;
				$kids_total = 0.00;
				if ( $number_of_adults>0 || $number_of_kids>0)
					{
					if ($number_of_adults>0)
						$adult_total = $adult_price * $number_of_adults;
					if ($number_of_kids>0)
						$kids_total = $kid_price * $number_of_kids;

					$grand_total = $adult_total + $kids_total;

					$tour_date = outputDate(str_replace("-","/",$valid_tours[$tour_id]['tourdate']));
					$num_ads = jr_gettext('_JINTOUR_TOUR_ADULTS','_JINTOUR_TOUR_ADULTS',false). " x ".$number_of_adults;
					$num_kids = "";
					if ($number_of_kids >0)
						$num_kids = jr_gettext('_JINTOUR_TOUR_KIDS','_JINTOUR_TOUR_KIDS',false). " x ".$number_of_kids;
						
					$extra_description = $valid_tours[$tour_id]['title']." ".$num_ads." ".$num_kids."  ".jr_gettext('_JINTOUR_TOUR_DATE','_JINTOUR_TOUR_DATE',false)." :: ".outputDate($valid_tours[$tour_id]['tourdate']);
					
					$bkg->setErrorLog("j05040jintour:: Adult price : ".$adult_total.  " Kids total ".$kids_total);
					$bkg->setErrorLog("j05040jintour:: Description ".$extra_description);
					$bkg->setErrorLog("j05040jintour:: Grand total ".$grand_total);
					$bkg->add_third_party_extra("jintour",$tour_id,$extra_description,$grand_total,$valid_tours[$tour_id]['tax_rate']);
					}
				else
					{
					$bkg->remove_third_party_extra("jintour",$tour_id);
					}
				}
			}
		// Finally we'll rebuild the tours list using the new data found by all the above
		$tourslist = jintour_build_available_tours_list($bkg);

		if ($tourslist)
			{
			$retVal="<td colspan=\"5\"><table>".$tourslist."</table></td>";
			$retVal=str_replace('"','\"',$retVal);
			$retVal=str_replace("'","\'",$retVal);
			}
		else
			$retVal="<td colspan=\"5\">&nbsp;</td>";
			
		$this->retVal=array('reply_to_echo'=>'populateDiv("jintour_third_party_extra_div",\''.$retVal.'\')');
		}

	function getRetVals()
		{
		return $this->retVal;
		}
	}
