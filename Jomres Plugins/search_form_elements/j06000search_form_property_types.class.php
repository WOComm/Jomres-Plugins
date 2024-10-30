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

class j06000search_form_property_types
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
			$rows = array();

			$selected_property_type_uids = '';
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["property_type_uids"]) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["property_type_uids"])) {
				$selected_property_type_uids = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["property_type_uids"][0];
			}

			jr_import('jomSearch');
			$property_type_array = prepPropertyTypeSearch();
			unset($property_type_array[0]);

			foreach ($property_type_array as $property_type) {
				$id=$property_type['id'];
				if ($id > 0) { // Need to not use the id 0 as that's a special "all" id that's used by jomsearch, but not by us here
					$r=array();

					// Much of this is lifted from ajax search composite. Many options added here are not used in the dropdowns, however on the offchance that we want to switch from dropdowns to checkboxes etc, they will be useful.

					$r['TITLE']=jr_gettext('_JOMRES_CUSTOMTEXT_PROPERTYTYPE'.$property_type['id'],jomres_decode($property_type['ptype']),false,false);
					$r['ID']=$id;
					$r['RANDOM_ID']=generateJomresRandomString(10);
					$r['CHECKED']='';
					$r['SELECTED']='';
					$r['ACTIVE_CLASS']='';
					if (isset($previous_selections['property_type_uids'])) {
						if (in_array($property_type['id'],$previous_selections['property_type_uids'])) {
							$r['CHECKED']='checked="checked"';
							$r['SELECTED']=' selected ';
							$r['ACTIVE_CLASS']=' btn-success active ';
						}
						else {
							$r['ACTIVE_CLASS']=' btn-default ';
						}
					}
					$property_type_rows[]=$r;
					}
				}

			$placeholder_selected = '';
			if ($selected_property_type_uids =='0' || $selected_property_type_uids =='' ) {
				$placeholder_selected = "selected";
			}

			$pageoutput[ ] = array(
				'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				'PLACEHOLDER_SELECTED' => $placeholder_selected
			);
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('property_types', $property_type_rows);
			$tmpl->readTemplatesFromInput( 'search_form_property_types.html' );
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


