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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Search Form Elements Guide" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "افزونه Search Form Elements را نصب کنید تا با استفاده از کدهای کوتاه نشان داده شده در اینجا فرم های جستجو را به سایت خود اضافه کنید. این صفحه به شما نشان می دهد کدام کدهای کوتاه در دسترس شما هستند تا بتوانید دقیقاً فرم های جستجوی مورد نیاز سایت خود را بسازید. می‌توانید این کدها را کپی کرده و مستقیماً در صفحه/مقاله/ماژول خود جای‌گذاری کنید و شروع به کار بر روی طرح‌بندی کنید. در پایین صفحه تعدادی نمونه از فرم‌های جستجو را مشاهده می‌کنید. برای باز کردن مدال روی دکمه کلیک کنید و از آن استفاده کنید. دکمه کپی را برای کپی کردن نشانه گذاری در کلیپ بورد خود. سپس می توانید از آن نشانه گذاری در مقالات/ماژول های خود برای ایجاد فرم های جستجو استفاده کنید.");

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "اینها همه کدهای کوتاهی هستند که هنگام ساخت فرم های جستجو در دسترس شما هستند." );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "نمونه ها");
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "شما می توانید از هر یک از کدهای کوتاه در اینجا در این صفحه برای اصلاح نمونه های ارائه شده استفاده کنید, یا از نمونه ها همانطور که هست استفاده کنید. کدهای کوتاه و/یا نمونه ها را کپی و در یک صفحه, مقاله یا ماژول قرار دهید تا ببینید فرم جستجو.");

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "شما همیشه باید کدهای کوتاه form_start, form_button و form_end را در فرم جستجوی خود قرار دهید." );
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "از آنجا که این کدهای کوتاهی هستند که از الگوهای Jomres استفاده می کنند, می توانید از ویژگی لغو الگو برای کدهای کوتاه برای تغییر خروجی استفاده کنید. به عنوان مثال, می توانید /jomres/core-plugins/search_form_formes_elements/complate_complates/search_form_elements/complate_define را کپی کنید. . در /html/com_jomres به search_form_autocomplete_new.html بروید و سپس از کد کوتاه زیر استفاده کنید: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "اگر می خواهید از کدهای کوتاه در فایل قالب Jomres استفاده کنید, برای مثال اسلایدر hero, باید {jomres را با {jomres_script جایگزین کنید و Jomres خود کدهای کوتاه را تجزیه خواهد کرد." );