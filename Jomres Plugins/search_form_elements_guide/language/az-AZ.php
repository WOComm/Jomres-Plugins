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


	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Forma Elementləri üzrə Axtarış Bələdçisi" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Burada göstərilən qısa kodlardan istifadə edərək saytınıza axtarış formaları əlavə etmək üçün Axtarış Forması Elementləri plaginini quraşdırın. Bu səhifə sizə hansı qısa kodların əlçatan olduğunu göstərir ki, saytınız üçün tam olaraq ehtiyac duyduğunuz axtarış formalarını yarada biləsiniz. . Siz bu kodları kopyalayıb birbaşa səhifə/məqalə/modulunuza yapışdırıb tərtibat üzərində işləməyə başlaya bilərsiniz. Səhifənin altında bir sıra nümunə axtarış formaları görəcəksiniz. Modal açmaq üçün düyməni basın və istifadə edin İşarələməni mübadilə buferinizə köçürmək üçün Kopyala düyməsi. Daha sonra axtarış formaları yaratmaq üçün məqalələrinizdə/modullarınızda həmin işarələmədən istifadə edə bilərsiniz." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Bunlar axtarış formalarını qurarkən istifadə edə biləcəyiniz bütün qısa kodlardır." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Nümunələr" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Təqdim olunan nümunələri dəyişdirmək üçün bu səhifədəki qısa kodlardan hər hansı birini istifadə edə və ya nümunələri olduğu kimi istifadə edə bilərsiniz. Qısa kodları və/yaxud nümunələri kopyalayıb səhifəyə, məqaləyə və ya modula yerləşdirin. axtarış forması." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Siz həmişə axtarış formanızda forma_başlaması, forma_düyməsi və forma_sonu qısa kodlarını daxil etməlisiniz." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Bunlar Jomres şablonlarından istifadə edən qısa kodlar olduğundan, çıxışı dəyişmək üçün qısa kodlar üçün şablonu ləğv etmək xüsusiyyətindən istifadə edə bilərsiniz. Məsələn, /jomres/core-plugins/search_form_elements_elementstotempleau5/search_formes/elementsboottepformar5-i kopyalaya bilərsiniz. .html tema/template /html/com_jomres kataloqunuza köçürün və bu, ləğv ediləcək. Əlavə olaraq, məsələn, bir neçə formanın və birinin digərlərindən fərqli olmasını istəyirsinizsə, şablon faylının adını dəyişdirə bilərsiniz (məsələn, search_form_autocomplete.html) /html/com_jomres daxilində search_form_autocomplete_new.html seçin və sonra aşağıdakı qısa kodu istifadə edin: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Əgər siz Jomres şablon faylında, məsələn, qəhrəman slayderində qısa kodlardan istifadə etmək istəyirsinizsə, onda siz {jomres-i {jomres_script ilə əvəz etməli olacaqsınız və Jomres qısa kodların özünü təhlil edəcək." );