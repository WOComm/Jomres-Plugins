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

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "Որոնման ձևի տարրերի ուղեցույց" );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "Տեղադրեք Search Form Elements plugin-ը՝ ձեր կայքում որոնման ձևեր ավելացնելու համար՝ օգտագործելով այստեղ ցուցադրված կարճ կոդերը: Այս էջը ցույց է տալիս, թե որ կարճ կոդերն են ձեզ հասանելի, որպեսզի կարողանաք ստեղծել հենց ձեր կայքի համար անհրաժեշտ որոնման ձևերը: Դուք կարող եք պատճենել այս կոդերը և դրանք ուղղակիորեն տեղադրել ձեր էջի/հոդվածի/մոդուլի մեջ և սկսել աշխատել դասավորության վրա: Էջի ներքևում կտեսնեք մի շարք որոնման ձևաթղթեր: Սեղմեք կոճակը՝ մոդալ բացելու համար և օգտագործեք Պատճենել կոճակը՝ նշումը ձեր clipboard-ում պատճենելու համար: Այնուհետև կարող եք օգտագործել այդ նշումը ձեր հոդվածներում/մոդուլներում՝ որոնման ձևերը ստեղծելու համար:");

jr_define('_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "Սրանք բոլոր այն կարճ կոդերն են, որոնք հասանելի են ձեզ որոնման ձևաթղթեր կառուցելիս" );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "Օրինակներ" );
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "Դուք կարող եք օգտագործել այս էջի կարճ կոդերից որևէ մեկը՝ տրամադրված օրինակները փոփոխելու կամ օրինակներն օգտագործելու համար: Պատճենեք և տեղադրեք կարճ կոդերը և/կամ օրինակները էջի, հոդվածի կամ մոդուլի մեջ՝ տեսնելու համար որոնման ձևը");

jr_define('_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "Ձեր որոնման ձևում միշտ պետք է ներառեք form_start, form_button և form_end կարճ կոդերը:" );
jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "Քանի որ դրանք կարճ կոդեր են, որոնք օգտագործում են Jomres-ի կաղապարներ, դուք կարող եք օգտագործել կաղապարի փոխարինման հատկությունը կարճ կոդերի համար՝ ելքը փոփոխելու համար: Օրինակ, կարող եք պատճենել /jomres/core-plugins/search_formates_elements/search_form_elements/completes_define/ .html ձեր թեմայի/կաղապարի /html/com_jomres գրացուցակում, և սա կդառնա փոխարինող: Բացի այդ, եթե, օրինակ, ցանկանում եք, որ մի քանի ձևեր և մեկը տարբերվի մյուսներից, ապա կարող եք վերանվանել ձևանմուշի ֆայլը (օրինակ՝ search_form_autocomplete.html) /html/com_jomres-ում որոնման_form_autocomplete_new.html-ում և այնուհետև օգտագործեք հետևյալ կարճ կոդը՝ {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "Եթե ցանկանում եք օգտագործել Jomres կաղապարի ֆայլի կարճ կոդերը, օրինակ հերոսի սահիչը, ապա դուք պետք է փոխարինեք {jomres-ը {jomres_script-ով, և Jomres-ը ինքնին կվերլուծի կարճ կոդերը:");
