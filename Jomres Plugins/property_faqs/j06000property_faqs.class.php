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

	class j06000property_faqs {
		function __construct($componentArgs)
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents =jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch)
			{
				$this->template_touchable=false;
				$this->shortcode_data = array(
					'task' => 'property_faqs',
					'info' => 'PROPERTY_FAQS_TITLE',
					'arguments' => array(0 => array(
						'argument' => 'property_uid',
						'arg_info' => '_JOMRES_SHORTCODES_06000SHOW_PROPERTY_QR_CODE_DIRECTIONS_ARG_PROPERTY_UID',
						'arg_example' => '1',
					),
					),
				);
				return;
			}

			$ePointFilepath = get_showtime('ePointFilepath');

			if (isset($componentArgs[ 'property_uid' ])) {
				$property_uid = (int)$componentArgs[ 'property_uid' ];
			} else {
				$property_uid = (int)jomresGetParam($_REQUEST, 'property_uid', 0);
			}

			if ($property_uid == 0) {
				return;
			}

			$override_directory = get_override_directory().JRDS.'custom_code'.JRDS;
			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$current_property_details->gather_data( $property_uid );
			$property_type=$current_property_details->ptype_id;

			$questions_file = $ePointFilepath.'faq_questions_default.php';
			if (file_exists($override_directory.'faq_questions_'.$property_type.'.php')) {
				require_once $override_directory.'faq_questions_'.$property_type.'.php';
			} elseif (file_exists($ePointFilepath.'faq_questions_'.$property_type.'.php') )  {
				require_once $ePointFilepath.'faq_questions_'.$property_type.'.php';
			} else {
				require_once $ePointFilepath.'faq_questions_default.php';
			}

			$mrConfig = getPropertySpecificSettings($property_uid);
			if (isset($mrConfig['faq_questions_and_answers']) && !empty($mrConfig['faq_questions_and_answers'])) {
				$faq_questions_and_answers = unserialize(base64_decode($mrConfig['faq_questions_and_answers']));
			} else {
				$faq_questions_and_answers = array();
			}

			if (isset($faq_questions_and_answers[get_showtime('lang')]) && !empty($faq_questions_and_answers[get_showtime('lang')]) ) {
				$questions = array_replace($questions, $faq_questions_and_answers[get_showtime('lang')]);
			} else
			if (isset($mrConfig['faq_questions_and_answers']) && !empty($faq_questions_and_answers)) {
				$questions = array_replace($questions, $faq_questions_and_answers);
			}

			$counter = 1;
			if ( !empty($questions)) {
				$rows = array();
				foreach ($questions as $question) {
					$r = array();

					$r['QUESTION'] = jr_gettext('PROPERTY_FAQS_QUESTION_'.$counter , $question['question'], false, false);
					$r['ANSWER'] = jr_gettext('PROPERTY_FAQS_ANSWER_'.$counter , $question['answer'], false, false);
					$r['COUNTER'] = $counter;

					if (trim($question['question']) != '' || trim($question['answer']) != '') {
						$rows[] = $r;
					}
					$counter++;
				}


				$pageoutput[] = [];
				$tmpl = new patTemplate();
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->addRows( 'rows', $rows );
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'property_faqs.html' );
				echo $tmpl->getParsedTemplate();

				$tmpl = new patTemplate();
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->addRows( 'rows', $rows );
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'property_faqs_schema.html' );
				echo $tmpl->getParsedTemplate();
			} else {
				echo '<p class="alert alert-danger">Questions array is empty.</p>';
			}


		}

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return null;
		}
	}
