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

class j06000search_form_stars
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

 			$pageoutput = array();

			$stars_array=array(0=>0,1=>0,2=>0,3=>0,4=>0,5=>0);
			$query = "SELECT stars FROM #__jomres_propertys WHERE published = 1";
			$result = doSelectSql($query);

			if (!empty($result))
			{
				foreach ($result as $s)
				{
					$no = $s->stars;
					if (!isset($stars_array[$no]))
						$stars_array[$no] = 0;
					$stars_array[$no]++;
				}
			}

			$stars_rows = array();

			foreach ($stars_array as $key=>$st)
			{
				$s=array();
				$s['NUMBER']=$key;
				$s['DISABLED']='';
				if ((int)$st == 0)
					$s['DISABLED']='disabled="disabled"';
				$s['COUNT'] = (int)$st;

				$s['CHECKED']='';
				$s['SELECTED']='';
				if (isset($previous_selections['stars']))
				{
					if (in_array($key,$previous_selections['stars']))
					{
						$s['CHECKED']='checked="checked"';
						$s['SELECTED']=' selected ';
					}
				}

				$s['STAR_ICON'] = '';
				for ($i=0;$i<=(int)$key;$i++)
				{
					if ($i == 0 && $key == 0) {
						$s['STAR_ICON'] .= simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory(), 'search_form_star_icon_none.html', '');
					} else {
						$s['STAR_ICON'] .= simple_template_output($ePointFilepath.'templates'.JRDS.find_plugin_template_directory(), 'search_form_star_icon.html', '');
					}
				}


				$stars_rows[] = $s;
			}

			$pageoutput[ ] = array(
				'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				'ARIA' => jr_gettext('_JOMRES_COM_A_INTEGRATEDSEARCH_BYTARS', '_JOMRES_COM_A_INTEGRATEDSEARCH_BYTARS', false)
			);
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('stars', $stars_rows);
			$tmpl->readTemplatesFromInput( 'search_form_stars.html' );
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


