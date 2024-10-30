<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
jr_define('_JRPORTAL_GMAPS_DD_YES',"כן");
jr_define('_JRPORTAL_GMAPS_DD_NO',"No");
jr_define('_GOOGLE_ADDRESS',"כתובת");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"מיקוד");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"עיר");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"הגעת למספר מקסימלי של 9 נקודות ציון");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google לא הצליחה לחשב הנחיות למסלול זה ולאפשרויות שנבחרו");
jr_define('_GOOGLE_DIRECTION_PRINT',"הדפס מסלול");
jr_define('_GOOGLE_ROUTEPLANNING',"תכנן את המסלול שלך אל ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"המיקום שלך (נקודת ההתחלה של המסלול)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"אפשרויות מסלול");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"בצע אופטימיזציה עבור");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"נהיגה");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"הליכה");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"רכיבה על אופניים");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"הימנע מכבישים מהירים");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"הימנע מאגרה");
jr_define('_GOOGLE_SELECT_BUTTON',"קבל מסלול");
jr_define('_GOOGLE_SELECT_RESETMAP',"אפס מפה");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"היעד שלך (נקודת סיום המסלול) כבר מסומן במפה. אנא הזן את מיקומך ובחר את אפשרויות המסלול שלך כדי לקבל הנחיות לנקודת היעד. תוכל גם ללחוץ על המפה כדי לבחור עד 9 נקודות ציון מנקודת ההתחלה שלך לנקודת היעד.");