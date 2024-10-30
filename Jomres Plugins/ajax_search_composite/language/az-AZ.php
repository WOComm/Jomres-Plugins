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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Axtarış Kompoziti");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Ulduzlarla axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Qiymətlərə görə axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Xüsusiyyətlərə görə axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Ölkəyə görə axtar");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Bölgələrə görə axtar");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Şəhər üzrə axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Otaq tipinə görə axtar");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Mülkiyyət növünə görə axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Qonaq nömrələrinə görə axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Tarixlərə görə axtarış");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Şablon Stili");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Varsayılan: Bootstrap -da olarsa, əksər hallarda sadə onay qutuları və ya düymələr. Modallar: İstifadəçilərin axtarış filtrlərini seçməsinə imkan verən düymələr açılır. Səhifənin yuxarı hissəsi üçün hazırlanmış akkordeon, süzgəcləri açmaq üçün sahələr aşağıya sürüşür. filtrləri aç. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Düymələr (şaquli istiqamət)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modals (şaquli istiqamət) yalnız Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Akkordeon (üfüqi oriyentasiya) Bootstrap yalnız.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Çox seçimli (üfüqi oriyentasiya) Bootstrap yalnız.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Filtrləri göstər");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Filtrləri gizlət");


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "ajax axtarış çərçivəsindən istifadə edir. Mövcudluğu, qiymət aralığını, xüsusiyyətlərini, mülkiyyət tipini, otaq tipini, qonaq nömrələrini, ulduzları, ölkəni, bölgəni və şəhəri bir kenar çubuğunda axtarmağı təklif edən bir axtarış modulu yerləşdirməyə imkan verir. və ya yuxarı çubuq. Burada göstərilən nümunənin işləməyəcəyini unutmayın, çünki bəzi arqumentlər bir -birini ləğv edir, mövcud arqumentlərdən yalnız ehtiyacınız olanı seçin (tələb olunan arqument istisna olmaqla). Bu qısa kod əksər digərlərindən bir az fərqlidir. qısa kodlar, eklentinin qaytarılmış xüsusiyyətlər siyahısını yerləşdirdiyi asamodule_search_results id ilə qısa kod bəyannaməsindən sonra xüsusi bir div ilə müşayiət olunmalıdır. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Lazımdır. Arqument 'ajax_search_composite' olmalıdır");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Axtarış sahələrinin tərzi. Seçimlər düymələrdir modallar akkordeon çox seçimdir. Bu halda plagin Sayt Konfiqurasiyasında konfiqurasiya edilmiş seçimdən istifadə edəcək. Multiselect/Accordion üfüqi görüntü üçün idealdır, digər iki seçim yerləşdirmə üçün ən yaxşısıdır. yan çubuq. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Səhifə vəzifəsi viewperperty (mülkiyyət detalları səhifəsi) olaraq təyin edilibsə axtarış formasını göstərin. 0 üçün Xeyr, 1 Bəli.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Prefiltering, yalnız prefilter şərtinə cavab verən xüsusiyyətlərin seçildiyi yerdir, axtarış nəticələrində göstərilə bilər. Mülkiyyət uid tərəfindən əvvəlcədən süzülür, buna görə də yalnız müəyyən xüsusiyyətlər göstərilə bilər. mülkiyyət vasitələrinin vergüllə ayrılmış siyahısı ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Mülkiyyət növünə görə əvvəlcədən süzün, buna görə axtarış nəticələrində yalnız bu/bu növlərin xassələri göstərilə bilər. Arqumentlər mülkiyyət növü idlərinin vergüllə ayrılmış siyahısıdır.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Ölkə kodu ilə əvvəlcədən süzün, buna görə axtarış nəticələrində yalnız bu ölkələrdəki xüsusiyyətlər göstərilə bilər. Arqumentlər ISO ölkə kodlarının vergüllə ayrılmış siyahısıdır.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Bölgə adı ilə əvvəlcədən süzün, buna görə də axtarış nəticələrində yalnız bu bölgələrdəki xüsusiyyətlər göstərilə bilər. Arqumentlər bölgə adlarının vergüllə ayrılmış siyahısıdır və verilənlər bazasında saxlanıldığı kimi bölgələrlə uyğunlaşmalıdır. ölkəni məsələn Almaniyaya (DE) qoyursunuzsa, oxşar bölgə adları olan digər ölkələrin mülkləri göstərilməyəcək. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Formada Ulduz girişini aktiv edin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesinde bir seçim təyin etdinizsə 'asc_by_stars' da arqumentlərdə yoxdur. təsir. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Formada Ulduzların daxil edilməsini aktiv edin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesinde bir seçim təyin etdinizsə 'asc_by_price' arqumentlər siyahısında olmayacaq. təsir. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Formada Əmlak xüsusiyyətləri girişini aktiv edin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesinde bir seçim təyin etdinizsə, 'asc_by_features' olacaq. təsiri yoxdur. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Forma daxilində Ölkə girişini aktiv et/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesinde bir seçim təyin etdinizsə asc_by_country arqumentlərində yoxdur. təsir. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Forma daxilində Bölgə girişini aktiv edin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesi vasitəsi ilə bir seçim qoymusunuzsa, 'asc_by_region' arqumentlər siyahısında olmayacaq. təsir. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Forma daxilində şəhər girişini aktivləşdirin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasında Ajax axtarış kompozit parametrləri sekmesinde bir seçim təyin etdinizsə 'asc_by_town' arqumentlər siyahısında olmayacaq. təsir. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Formada Otaq növü girişini aktivləşdirin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesi vasitəsilə bir seçim qoymusunuzsa 'asc_by_roomtype' da olacaq təsiri yoxdur. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Formada Mülkiyyət növü girişini aktivləşdirin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasında Ajax axtarış kompozit parametrləri sekmesinde bir seçim təyin etmisinizsə, sonra argumentlər siyahısında arcype_by_pro parametrinə sahib olacaqsınız. təsiri yoxdur. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Formada Qonaq nömrələrinin daxil edilməsini aktiv edin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit ayarları sekmesinde bir seçim təyin etdinizsə 'asc_by_guestnumber' da olacaq təsiri yoxdur. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Formada Tarix daxil edilməsini aktiv edin/deaktiv edin. Unutmayın ki, Sayt Konfiqurasiyasındakı Ajax axtarış kompozit parametrləri sekmesi vasitəsi ilə bir seçim qoymusunuzsa, arqumentlər siyahısında 'asc_by_date' yoxdur. təsir. ");
