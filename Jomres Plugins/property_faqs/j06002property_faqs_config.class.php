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

class j06002property_faqs_config {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$ePointFilepath = get_showtime('ePointFilepath');
        $output = array();
        $pageoutput = array();

        $property_uid = getDefaultProperty();
        $mrConfig = getPropertySpecificSettings($property_uid);

        $override_directory = get_override_directory();
        $current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
        $current_property_details->gather_data( $property_uid );
        $property_type=$current_property_details->ptype_id;

        $questions_file = $ePointFilepath.'questions_array.php';
        if (file_exists($override_directory.'faq_questions_'.$property_type.'.php')) {
            require_once $override_directory.'faq_questions_'.$property_type.'.php';
        } elseif (file_exists($ePointFilepath.'faq_questions_'.$property_type.'.php') )  {
            require_once $ePointFilepath.'faq_questions_'.$property_type.'.php';
        } else {
            require_once $ePointFilepath.'faq_questions_default.php';
        }

        $faq_questions_and_answers = unserialize(base64_decode($mrConfig['faq_questions_and_answers']));

			if (isset($faq_questions_and_answers[get_showtime('lang')]) && !empty($faq_questions_and_answers[get_showtime('lang')])) {
				$questions = array_replace($questions, $faq_questions_and_answers[get_showtime('lang')]);
			} elseif (isset($mrConfig['faq_questions_and_answers']) && !empty($faq_questions_and_answers)) {
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

                if (trim($question['question']) == '' || trim($question['answer']) == '') {
                    $r['QUESTION'] = '';
                    $r['ANSWER'] = '';
                }
                $rows[] = $r;
                $counter++;
            }

            $jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
            $jrtb = $jrtbar->startTable();

            $jrtb .= $jrtbar->toolbarItem('cancel', JOMRES_SITEPAGE_URL.'&task=cpanel', '');
            $jrtb .= $jrtbar->toolbarItem('save', '', '', true, 'property_faq_save_answers');
            $jrtb .= $jrtbar->endTable();
            $output[ 'JOMRESTOOLBAR' ] = $jrtb;

			$pageoutput[] = $output;
			$tmpl = new patTemplate();
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'rows', $rows );
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'property_faqs_config.html' );
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
