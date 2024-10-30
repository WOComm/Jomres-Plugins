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

	class j04950translation_definitions_property_faqs
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

			require_once $ePointFilepath.'faq_questions_default.php';

			$mrConfig = getPropertySpecificSettings($property_uid);
			$faq_questions_and_answers = unserialize(base64_decode($mrConfig['faq_questions_and_answers']));

			if (isset($faq_questions_and_answers[get_showtime('lang')]) && !empty($faq_questions_and_answers[get_showtime('lang')]) ) {
				$questions = array_replace($questions, $faq_questions_and_answers[get_showtime('lang')]);
			}

			if (!empty($questions)) {
				$definitions = array();
				$section_name = jr_gettext('PROPERTY_FAQS_TITLE', '_JOMRES_PATHWAY_PROPERTYDETAILS', false);
				$subtitle = '';

				$counter = 1;

				foreach ($questions as $question) {
					$definitions[$section_name][$subtitle][] = [
						'definition' => jr_gettext('PROPERTY_FAQS_QUESTION_'.$counter, $question['question'])  ,
						'label' => jr_gettext('PROPERTY_FAQS_QUESTION_'.$counter, $question['question'] , false , false),
						'translate_label' => false
					];

					$definitions[$section_name][$subtitle][] = [
						'definition' => jr_gettext('PROPERTY_FAQS_ANSWER_'.$counter, $question['answer'])  ,
						'label' => jr_gettext('PROPERTY_FAQS_ANSWER_'.$counter, $question['answer'] , false , false),
						'translate_label' => false
					];

					$counter++;
				}
				$this->retVals = $definitions;
			}
		}

		public function getRetVals()
		{
			return $this->retVals;
		}
	}
