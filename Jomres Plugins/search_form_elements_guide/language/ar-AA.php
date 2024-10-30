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


	jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "دليل عناصر نموذج البحث") ;

jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_INTRO' , "قم بتثبيت المكون الإضافي Search Form Elements لإضافة نماذج بحث إلى موقعك باستخدام الرموز القصيرة الموضحة هنا. توضح لك هذه الصفحة الرموز القصيرة المتاحة لك حتى تتمكن من إنشاء نماذج البحث التي تحتاجها بالضبط لموقعك . يمكنك نسخ هذه الرموز ولصقها مباشرة في صفحتك / مقالتك / وحدتك والبدء في العمل على التخطيط. في أسفل الصفحة سترى عددًا من أمثلة نماذج البحث. انقر فوق الزر لفتح نموذج , واستخدم الزر نسخ لنسخ الترميز إلى الحافظة الخاصة بك. يمكنك بعد ذلك استخدام هذا الترميز في مقالاتك / وحداتك لإنشاء نماذج البحث. ");

jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES' , "هذه كلها الرموز القصيرة المتاحة لك عند إنشاء نماذج البحث.") ;

jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "أمثلة") ;
jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO' , "يمكنك استخدام أي من الرموز المختصرة هنا في هذه الصفحة لتعديل الأمثلة المقدمة , أو استخدام الأمثلة كما هي. انسخ والصق الرموز القصيرة و / أو الأمثلة في صفحة أو مقالة أو وحدة لمشاهدة نموذج بحث." );

jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1' , "يجب عليك دائمًا تضمين الرموز القصيرة form_start و form_button و form_end في نموذج البحث.") ;
jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2' , "نظرًا لأن هذه رموز قصيرة تستخدم قوالب Jomres , يمكنك استخدام ميزة تجاوز القالب للرموز القصيرة لتعديل الإخراج. على سبيل المثال , يمكنك نسخ / jomres / core-plugins / search_form_elements / قوالب / bootstrap5 / search_form_a .html إلى دليل theme / template / html / com_jomres وسيصبح هذا هو التجاوز. بالإضافة إلى ذلك , إذا كنت تريد , على سبيل المثال , عدة نماذج وأخرى مختلفة عن الأخرى , فيمكنك إعادة تسمية ملف النموذج (على سبيل المثال , search_form_autocomplete.html) في / html / com_jomres to search_form_autocomplete_new.html ثم استخدم الكود المختصر التالي: {jomres search_form_autocomplete & amp; search_form_autocomplete.html = search_form_autocomplete_new.html} ");

jr_define ('_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3' , "إذا كنت تريد استخدام الرموز القصيرة في ملف قالب Jomres , على سبيل المثال شريط تمرير البطل , فستحتاج إلى استبدال {jomres بـ {jomres_script وسيقوم Jomres بتحليل الرموز القصيرة نفسها.") ;