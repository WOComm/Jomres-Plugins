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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Arama Formu Öğeleri Kılavuzu" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Sitenize burada gösterilen kısa kodları kullanarak arama formları eklemek için Search Form Elements eklentisini kurun. Bu sayfa, siteniz için tam olarak ihtiyaç duyduğunuz arama formlarını oluşturabilmeniz için hangi kısa kodları kullanabileceğinizi gösterir. .Bu kodları kopyalayıp doğrudan sayfanıza/makalenize/modülünüze yapıştırabilir ve düzen üzerinde çalışmaya başlayabilirsiniz.Sayfanın alt kısmında bir dizi örnek arama formu göreceksiniz.Bir modal açmak için düğmeyi tıklayın ve kullanın İşaretlemeyi panonuza kopyalamak için Kopyala düğmesini tıklayın. Ardından, arama formlarını oluşturmak için bu işaretlemeyi makalelerinizde/modüllerinizde kullanabilirsiniz." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Bunlar, arama formları oluştururken kullanabileceğiniz tüm kısa kodlardır." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Örnekler");
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Sunulan örnekleri değiştirmek için bu sayfadaki kısa kodlardan herhangi birini kullanabilir veya örnekleri olduğu gibi kullanabilirsiniz. Kısa kodları ve/veya örnekleri kopyalayıp bir sayfaya, makaleye veya modüle yapıştırın. Arama Formu." );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Form_start, form_button ve form_end kısa kodlarını arama formunuza her zaman eklemelisiniz." );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Bunlar Jomres şablonlarını kullanan kısa kodlar olduğundan, çıktıyı değiştirmek için kısa kodlar için şablon geçersiz kılma özelliğini kullanabilirsiniz. Örneğin, /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete dosyasını kopyalayabilirsiniz. .html'yi theme/template /html/com_jomres dizininize ekleyin ve bu, geçersiz kılma olacaktır. Ek olarak, örneğin, birkaç form ve birinin diğerlerinden farklı olmasını istiyorsanız, şablon dosyasını yeniden adlandırabilirsiniz (ör. search_form_autocomplete.html) /html/com_jomres'te search_form_autocomplete_new.html'ye gidin ve ardından şu kısa kodu kullanın: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Bir Jomres şablon dosyasındaki kısa kodları, örneğin kahraman kaydırıcısını kullanmak istiyorsanız, o zaman {jomres'i {jomres_script ile değiştirmeniz gerekecek ve Jomres kısa kodları kendisi ayrıştıracaktır." );
