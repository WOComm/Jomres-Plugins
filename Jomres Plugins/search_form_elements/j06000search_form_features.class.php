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

	class j06000search_form_features
	{
		function __construct( $componentArgs )
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
			if ( $MiniComponents->template_touch )
			{
				$this->template_touchable = false;
				$this->shortcode_data = array(
					'task' => 'search_form_features',
					'arguments_distinct' => true,
					'info' => 'Search form features',
					'arguments' => array(
						array(
							'argument' => 'prefilter',
							'arg_info' => 'Property type pre-filter. Comma separated list of property type ids. Example: 1,2,3. Use this to ensure that only property features that are relevant to the property type are shown.',
							'arg_example' => '2',
						)
					),
				);
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

			$selected_feature = '';
			if (isset($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["feature_uids"]) && !empty($tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["feature_uids"])) {
				$selected_feature = $tmpBookingHandler->tmpsearch_data['ajax_search_composite_selections']["feature_uids"][0];
			}


			jr_import('jomSearch');
			$features = prepFeatureSearch();

			if (isset($_REQUEST['prefilter'])) {
				$prefilter_str = jomresGetParam($_REQUEST , 'prefilter', '');
				$bang = explode(",", $prefilter_str);
				if (!empty($bang)) {
					$prefilter = array();
					foreach ($bang as $b) {
						$prefilter[] = $b;
					}
				} else {
					$prefilter = array();
				}
			}

			unset($features[0]); // Refers to the SEARCHALL item which is not used here

			if (!empty($prefilter)) {
				foreach ($features as $key => $feature) {
					foreach ($prefilter as $property_type_id ) {
						if (!in_array($property_type_id ,$feature['ptype_xref'])) {
							unset($features[$key]);
						}
					}

				}
			}


			foreach ($features as $feature) {
				$id=$feature['id'];
				if ($id > 0) { // Need to not use the id 0 as that's a special "all" id that's used by jomsearch, but not by us here
					$r=array();
					$image = '/'.$feature['image'];
					$feature_abbv = jr_gettext('_JOMRES_CUSTOMTEXT_FEATURES_ABBV'.(int)$feature['id'],		jomres_decode($feature['title']),false,false);
					$r['DESCRIPTION']= jr_gettext('_JOMRES_CUSTOMTEXT_FEATURES_DESC'.(int)$feature['id'],		jomres_decode($feature['description']),false,false);
					$r['TITLE']=$feature_abbv;
					$r['IMAGE']=JOMRES_IMAGELOCATION_RELPATH.'pfeatures/'.$image;
					$r['ID']=$id;

					$r['CHECKED']='';
					$r['SELECTED']='';
					$r['ACTIVE_CLASS']='';
					if (isset($previous_selections['feature_uids']))  {
						if (in_array($feature['id'],$previous_selections['feature_uids']))
						{
							$r['CHECKED']='checked="checked"';
							$r['SELECTED']=' selected ';
							$r['ACTIVE_CLASS']=' btn-success active ';
						}
						else
						{
							$r['ACTIVE_CLASS']=' btn-default ';
						}
					}
					$features_rows[]=$r;
				}
			}

			$placeholder_selected = '';
			if ($selected_feature =='') {
				$placeholder_selected = "selected";
			}

			$pageoutput[ ] = array(
				'FORM_ID' =>  get_showtime('search_form_elements_random_identifier'),
				'PLACEHOLDER_SELECTED' => $placeholder_selected
			);
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('features', $features_rows);
			$tmpl->readTemplatesFromInput( 'search_form_features.html' );
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


