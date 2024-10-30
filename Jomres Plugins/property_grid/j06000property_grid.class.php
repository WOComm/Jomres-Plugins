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

class j06000property_grid
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
				$this->shortcode_data = array(
					'task' => 'property_grid',
					'arguments_distinct' => true,
					'info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID',
					'arguments' => array(
						array(
							'argument' => 'property_uids',
							'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_UIDS',
							'arg_example' => '56,43,60',
						),
						array(
							'argument' => 'property_cols',
							'arg_info' => '_JOMRES_SHORTCODES_06000PROPERTY_GRID_PROPERTY_COLS',
							'arg_example' => '6',
						),
					),
				);
				return;
			}
			$ePointFilepath = get_showtime('ePointFilepath');

			if (jomres_bootstrap_version() == '5' ) {
				output_ribbon_styling();

				$ids = jomresGetParam($_REQUEST, 'property_uids', '');
				$cols = jomresGetParam($_REQUEST, 'property_cols', 6);


				if ($ids == '' && $cols > 0 ) {
					$jomres_properties = jomres_singleton_abstract::getInstance('jomres_properties');
					$jomres_properties->get_all_properties();
					if (count($jomres_properties->all_property_uids['all_published_propertys']) ==0) {
						echo '<p class="alert alert-danger">Error, no published properties available. Publish at least one property before using this plugin</p>';
						return;
					}
					if ( count($jomres_properties->all_property_uids['all_published_propertys']) > 1 ) {
						$keys = array_rand($jomres_properties->all_property_uids['all_published_propertys'] , $cols );
						if (is_int($keys)) {
							$keys = (array)$keys;
						}
					} else {
						$keys = (array)array_key_first($jomres_properties->all_property_uids['all_published_propertys']);
					}

					foreach($keys as $key) {
						$ids .= $jomres_properties->all_property_uids['all_published_propertys'][$key].',';
					}
				}

				$property_uid_array = explode(',', $ids);

				if (empty($property_uid_array))
					return;

				$property_uids = array();

				foreach ($property_uid_array as $p)
				{
					if ($p>0)
						$property_uids[]=(int)$p;
				}

				// We now need to find out which wrapper template to use to display the properties
				// To do that, we will find out if the number of properties is exactly equal to certain numbers
				// and from there decide which template to use

				$count = count($property_uids);

				IF ($count > 6) {
					$a= array_slice($property_uids, 0, 5);
					$property_uids = $a;
				}

				switch ($count) {
					case '1':
						$template_file = 'grid_1.html';
						break;
					case '2':
						$template_file = 'grid_2.html';
						break;
					case '3':
						$template_file = 'grid_3.html';
						break;
					case '4':
						$template_file = 'grid_4.html';
						break;
					case '5':
					case '6':
						$template_file = 'grid_6.html';
						break;
				}

				$rows = array();
				foreach ($property_uids as $property_uid)
				{
					$result = get_property_module_data(array($property_uid) );
					foreach ($result as $property)
					{
						$r = [];
						$r['PROPERTY'] = $property['template'];
						$rows[] = $r;
					}
				}

				$pageoutput[ ] = array();
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates' );
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->addRows('rows', $rows);

				$tmpl->readTemplatesFromInput($template_file);

				echo $tmpl->getParsedTemplate();
			}
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


