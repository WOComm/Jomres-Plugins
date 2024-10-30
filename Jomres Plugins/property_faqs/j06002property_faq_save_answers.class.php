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

class j06002property_faq_save_answers {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

        $property_uid = getDefaultProperty();

        $mrConfig = getPropertySpecificSettings($property_uid);

        $questions = jomresGetParam( $_POST, 'faqQuestion', array() );
        $answers = jomresGetParam( $_POST, 'faqAnswer', array() );

		if (empty($questions)) {
            echo "Error, questions cannot be empty";
            return;
        }
        if (empty($answers)) {
            echo "Error, answers cannot be empty";
            return;
            }

        $questions_and_answers = array();
        foreach ($questions as $key=>$question){
            $q = jomres_sanitise_string($question);
            $a = jomres_sanitise_string($answers[$key]);
            $questions_and_answers[get_showtime('lang')][] = array('question'=>$q,'answer'=>$a);
        }

        $faq_questions_and_answers = base64_encode( serialize($questions_and_answers));

        $query = "SELECT uid FROM #__jomres_settings WHERE property_uid = '".(int) $property_uid."' and `akey` = 'faq_questions_and_answers'";
        $result = doSelectSql($query);
        if (empty($result)) {
            $query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('".(int) $property_uid."','faq_questions_and_answers','".$faq_questions_and_answers."')";
        } else {
            $query = "UPDATE #__jomres_settings SET `value`='".$faq_questions_and_answers."' WHERE property_uid = '".(int) $property_uid."' and akey = 'faq_questions_and_answers'";
        }

        doInsertSql($query, '');

        $lang = get_showtime('lang');
        foreach ($questions_and_answers as $key=>$value) {
            updateCustomText('PROPERTY_FAQS_QUESTION_'.(int)$key+1, $value['question'], true, $property_uid, 0,  $lang);
            updateCustomText('PROPERTY_FAQS_ANSWER_'.(int)$key+1, $value['answer'], true, $property_uid, 0,  $lang);
        }


        jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=property_faqs_config'), '');
	}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
