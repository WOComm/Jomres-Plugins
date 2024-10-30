<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/
//#################################################################
	defined('_JOMRES_INITCHECK') or die('');
	//#################################################################


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "מדריך רכיבי טופס חיפוש" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "התקן את הפלאגין Search Form Elements כדי להוסיף טפסי חיפוש לאתר שלך באמצעות הקודים הקצרים המוצגים כאן. דף זה מראה לך אילו קודי קיצור זמינים עבורך כדי שתוכל לבנות בדיוק את טפסי החיפוש שאתה צריך עבור האתר שלך .אתה יכול להעתיק את הקודים האלה ולהדביק אותם ישירות בעמוד/מאמר/מודול שלך ולהתחיל לעבוד על הפריסה בתחתית העמוד תראה מספר טפסי חיפוש לדוגמה. לחץ על הכפתור כדי לפתוח מודאל, והשתמש לחצן העתק כדי להעתיק את הסימון ללוח שלך. לאחר מכן תוכל להשתמש בסימון זה במאמרים/מודולים שלך כדי ליצור את טפסי החיפוש." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "אלה הם כל הקודים הקצרים הזמינים לך בעת בניית טפסי חיפוש." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "דוגמאות" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "תוכל להשתמש בכל אחד מהקודים הקצרים כאן בדף זה כדי לשנות את הדוגמאות שסופקו, או להשתמש בדוגמאות כפי שהן. העתק והדבק את הקודים הקצרים ו/או הדוגמאות בדף, מאמר או מודול כדי לראות את טופס חיפוש." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "עליך תמיד לכלול את קודי ה-form_start, form_button ו-form_end הקצרים בטופס החיפוש שלך." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "מכיוון שאלו קודים קצרים המשתמשים בתבניות של Jomres, אתה יכול להשתמש בתכונת ביטול התבנית עבור קודים קצרים כדי לשנות את הפלט. לדוגמה, אתה יכול להעתיק /jomres/core-plugins/search_form_elements/templates/autocomple_bootstrap5 .html לספריית הנושא/תבנית /html/com_jomres שלך וזה יהפוך לעקיפה. בנוסף, אם, למשל, אתה רוצה שכמה טפסים ואחד יהיה שונה מהאחרים, תוכל לשנות את שם קובץ התבנית (למשל, search_form_autocomplete.html) ב-/html/com_jomres ל-search_form_autocomplete_new.html ולאחר מכן השתמש בקוד הקצר הבא: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "אם אתה רוצה להשתמש בקודים קצרים בקובץ תבנית של Jomres, למשל המחוון הגיבור, אז תצטרך להחליף את {jomres ב-{jomres_script וג'ומרס ינתח את הקודים הקצרים בעצמו." );