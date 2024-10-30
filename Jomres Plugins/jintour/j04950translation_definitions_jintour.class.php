<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.7.0
 *
 * @copyright	2005-2023 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
// ################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
// ################################################################
	#[AllowDynamicProperties]
	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * Sends the new property welcome email
	 *
	 */

class j04950translation_definitions_jintour
{

	/**
	 *
	 * Constructor
	 *
	 * Main functionality of the Minicomponent
	 *
	 *
	 *
	 */
	 
	public function __construct($componentArgs)
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}
        $ePointFilepath = get_showtime('ePointFilepath');

		$property_uid = getDefaultProperty();

        $mrConfig = getPropertySpecificSettings($property_uid);


            $definitions = array();
            $section_name = jr_gettext('_JINTOUR_TITLE', '_JINTOUR_TITLE', false);
            $subtitle = '';

            $definitions[$section_name][$subtitle][] = [
               'definition' => jr_gettext('_JINTOUR_TOUR_ADULTS', '_JINTOUR_TOUR_ADULTS')  ,
               'label' => jr_gettext('_JINTOUR_TOUR_ADULTS', '_JINTOUR_TOUR_ADULTS' , false , false),
               'translate_label' => false
            ];

            $definitions[$section_name][$subtitle][] = [
                'definition' => jr_gettext('_JINTOUR_TOUR_KIDS', '_JINTOUR_TOUR_KIDS')  ,
                'label' => jr_gettext('_JINTOUR_TOUR_KIDS','_JINTOUR_TOUR_KIDS' , false , false),
                'translate_label' => false
            ];


            $definitions[$section_name][$subtitle][] = [
				'definition' => jr_gettext('_JINTOUR_TOUR_ITINERY', '_JINTOUR_TOUR_ITINERY')  ,
				'label' => jr_gettext('_JINTOUR_TOUR_ITINERY','_JINTOUR_TOUR_ITINERY' , false , false),
				'translate_label' => false
			];

			$all_tours = jintour_get_all_tours($property_uid);
			// We're not going to render the list in it's entirety, if there are more than 25 tours. That would make the list unmanageable.
			if (!empty($all_tours) && count($all_tours) < 25 ) {
				foreach ($all_tours as $tour) {
					$definitions[$section_name][$subtitle][] = [
						'definition' => jr_gettext('_JINTOUR_TOUR_TITLE_CUSTOM_TEXT'.$tour['id'], $tour['title'])  ,
						'label' => jr_gettext('_JINTOUR_TOUR_TITLE_CUSTOM_TEXT'.$tour['id'],$tour['title'].' '. $tour["tourdate"] , false , false),
						'translate_label' => false
					];
				}
			}

            $this->retVals = $definitions;

	}

	public function getRetVals()
	{
		return $this->retVals;
	}
}
