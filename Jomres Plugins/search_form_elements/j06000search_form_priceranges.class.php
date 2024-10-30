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

class j06000search_form_priceranges
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
/*				$this->shortcode_data = array(
					'task' => 'search_form_elements',
					'arguments_distinct' => true,
					'info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID',
					'arguments' => array(
						array(
							'argument' => 'element',
							'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS',
							'arg_example' => '56,43,60',
						),
						array(
							'argument' => 'property_cols',
							'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS',
							'arg_example' => '6',
						),
					),
				);*/
				return;
			}
			$ePointFilepath = get_showtime('ePointFilepath');

			$previous_selections = array();
			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections'])) {
				$previous_selections = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections'];
			}




			$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			$selected_pricerange_value_to = 0;
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["pricerange_value_to"]) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["pricerange_value_to"])) {
				$selected_pricerange_value_to = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["pricerange_value_to"];
			}

			$currency_codes = jomres_singleton_abstract::getInstance('currency_codes');
			$symbols = $currency_codes->getSymbol($jrConfig['globalCurrencyCode']);

			jr_import('jomSearch');
			$price_ranges = prepPriceRangeSearch();

			$price_ranges_rows = array();
			if (!empty($price_ranges)) {
				foreach ($price_ranges as $key=>$range) {
					if ($key != 0) {
						$r=array();
						$r['RANGE']=$range;
						$r['CHECKED']='';
						$r['SELECTED']='';
						$r['ACTIVE_CLASS']='';
						if (isset($previous_selections['priceranges'])){
							if (in_array($range,$previous_selections['priceranges'])){
								$r['CHECKED']='checked="checked"';
								$r['SELECTED']=' selected ';
								$r['ACTIVE_CLASS']=' btn-success active ';
							}
							else{
								$r['ACTIVE_CLASS']=' btn-default ';
							}
						}
						$r['RANDOM_ID']=generateJomresRandomString(10);
						$price_ranges_rows[]=$r;
					}
				}
				// To build the sliders.
				$count = count($price_ranges);
				$exploded_ranges = array( 0 );
				for ($i=1;$i<=$count;$i++)
				{
					if(array_key_exists($i,$price_ranges))
					{
						$bang = explode("-",$price_ranges[$i]);
						if (is_array($bang))
						{
							if ( (int)$bang[0] > 0 )
								$exploded_ranges[]=(int)$bang[0];
							if ( (int)$bang[1] > 0 )
								$exploded_ranges[]=(int)$bang[1];
						}
					}
				}

				$num=count($exploded_ranges);
				$minprice = $exploded_ranges[0];
				$maxprice = $exploded_ranges[$num-1];
			} else {
				$minprice = '0';
				$maxprice = '1';
			}

			$defaultprice = $maxprice;

			$pageoutput = array();
			$pageoutput[ ] = array(
				'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				'ARIA' => jr_gettext('_JOMRES_SEARCH_PRICERANGES', '_JOMRES_SEARCH_PRICERANGES', false),
				'PREPRICE'	=> $symbols['pre'],
				'POSTPRICE'	=> $symbols['post'],
				'MINPRICE'	=> $minprice,
				'MAXPRICE'	=> $maxprice,
				'DEFAULT_PRICE' => $defaultprice
			);

			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('price_ranges', $price_ranges_rows);
			$tmpl->readTemplatesFromInput( 'search_form_price_ranges.html' );
			echo $tmpl->getParsedTemplate();
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}


