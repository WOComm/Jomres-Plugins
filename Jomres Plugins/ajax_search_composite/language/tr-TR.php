<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax Arama Kompozit");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Yıldızlara göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Fiyatlara göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Özelliklere göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Ülkeye göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Bölgeye göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Şehre göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Oda tipine göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Mülk türüne göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Misafir numaralarına göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Tarihlere göre ara");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Şablon Stili");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Varsayılan : Bootstrap'daysa çoğunlukla basit onay kutuları veya düğmeler. Modallar : Kullanıcıların arama filtrelerini seçmesine izin vermek için düğmeler açık. Sayfanın üst kısmı için tasarlanmış akordeon, filtreleri ortaya çıkarmak için alanlar aşağı kayar. filtreleri göster.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Düğmeler (dikey yönlendirme)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Kipler (dikey yönlendirme) Yalnızca Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Akordeon (yatay yönlendirme) Yalnızca Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Multiselect (yatay yönlendirme) Yalnızca Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Filtreleri göster");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Filtreleri gizle");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Ajax arama çerçevesini kullanır. Bir kenar çubuğuna müsaitlik, fiyat aralığı, özellikler, mülk tipi, oda tipi, misafir numaraları, yıldızlar, ülke, bölge ve kasaba hakkında arama sunan bir arama modülü yerleştirmenizi sağlar. veya üst çubuk.Bazı argümanlar birbirini iptal ettiği için burada gösterilen örneğin çalışmayacağını lütfen unutmayın, mevcut argümanlardan sadece ihtiyacınız olanı seçin (gerekli argüman hariç).Bu kısa kod diğerlerinden biraz farklıdır. eklentinin döndürülen özellikler listesini yerleştirdiği asamodule_search_results kimliğine sahip kısa kod bildiriminden sonra özel bir div eşlik etmelidir.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Gerekli. Argüman ajax_search_composite olmalıdır");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Arama alanları stili. Seçenekler düğmelerdir kipler akordeon çoklu seçim Ayarlanmadıysa, eklenti Site Yapılandırmasında yapılandırılan seçeneği kullanır. Çoklu seçim/Akordeon yatay görüntüleme için idealdir, diğer iki seçenek yerleştirme için en iyisidir bir kenar çubuğu.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Sayfa görevi viewproperty (özellik ayrıntıları sayfası) olarak ayarlanmışsa arama formunu göster. Hayır için 0, Evet için 1.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Ön filtreleme, arama sonuçlarında yalnızca ön filtreleme koşulunu karşılayan özellikleri seçtiğiniz yerdir. Özellik kullanıcı kimliğine göre ön filtreleme yapın, bu nedenle arama sonuçlarında yalnızca belirli özellikler gösterilebilir. özellik kullanıcı kimliklerinin virgülle ayrılmış listesi");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Özellik türüne göre ön filtre uygulayın, bu nedenle arama sonuçlarında yalnızca bu/bu türlerin özellikleri gösterilebilir. Bağımsız değişkenler, özellik türü kimliklerinin virgülle ayrılmış listesidir.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Ülke koduna göre ön filtre uygulayın, böylece arama sonuçlarında yalnızca bu ülkelerdeki özellikler gösterilebilir. Bağımsız değişkenler, ISO ülke kodlarının virgülle ayrılmış listesidir.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Bölge adına göre ön filtre uygulayın, bu nedenle arama sonuçlarında yalnızca bu bölgelerdeki özellikler gösterilebilir. Bağımsız değişkenler, virgülle ayrılmış bölge adları listesidir ve veritabanında depolanan bölgelerle eşleşmesi gerekir. ülkeyi örneğin Almanya (DE) olarak ayarlarsanız, benzer bölge adlarına sahip diğer ülkelerdeki mülkler gösterilmez.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Formdaki Yıldız girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesinden bir seçeneği Hayır olarak ayarladıysanız, argüman listesinde asc_by_stars ayarının hiçbir etkisi olmayacağını unutmayın. ");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Formdaki Yıldız girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesi aracılığıyla bir seçeneği Hayır olarak ayarladıysanız, argüman listesinde asc_by_price ayarının hiçbir etkisi olmayacağını unutmayın. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Forma Girilen Özellik özelliklerini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesi aracılığıyla bir seçeneği Hayır olarak ayarladıysanız, argüman listesindeki asc_by_features ayarının hiçbir etkisi olmayacağını unutmayın. .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Formdaki Ülke girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesinden bir seçeneği Hayır olarak ayarladıysanız, argüman listesinde asc_by_country ayarının hiçbir etkisi olmayacağını unutmayın. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Formdaki Bölge girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesinden bir seçeneği Hayır olarak ayarladıysanız, argüman listesinde asc_by_region ayarının hiçbir etkisi olmayacağını unutmayın. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Formdaki Kasaba girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesinden bir seçeneği Hayır olarak ayarladıysanız, argüman listesinde asc_by_town ayarının hiçbir etkisi olmayacağını unutmayın. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Formdaki Oda tipi girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesinden bir seçeneği Hayır olarak ayarladıysanız, argüman listesindeki asc_by_roomtype ayarının hiçbir etkisi olmayacağını unutmayın. .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Formdaki Özellik türü girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırması'ndaki Ajax arama bileşik ayarları sekmesi aracılığıyla bir seçenek ayarladıysanız, o zaman efekt argümanları listesinde asc_by_propertytype ayarının yapılmayacağını unutmayın. .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Forma girilen Konuk numaralarını Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesi aracılığıyla bir seçeneği Hayır olarak ayarladıysanız, argüman listesindeki asc_by_guestnumber ayarının hiçbir etkisi olmayacağını unutmayın. .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Formdaki Tarih girişini Etkinleştir/Devre Dışı Bırak. Site Yapılandırmasındaki Ajax arama bileşik ayarları sekmesi aracılığıyla bir seçeneği Hayır olarak ayarladıysanız, argüman listesindeki asc_by_date ayarının hiçbir etkisi olmayacağını unutmayın. ");