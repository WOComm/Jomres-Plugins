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

jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Genişletilmiş Haritalar");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Harita genişliği (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Harita yüksekliği (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Harita yakınlaştırma düzeyi ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Varsayılan Jomres emlak listesi geçersiz kılınsın mı? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Diğer etkinlikler/atraksiyonlar işaretçi simgesi ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Açılır pencere genişliği (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Görüntü genişliği (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Görüntü yüksekliği (px) ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Mülk açıklamasını görüntüle? (yalnızca kiralama açılır pencereleri için)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Mülk açıklaması kırpılsın mı? (yalnızca kiralama açılır pencereleri için)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Özellik açıklamasını (karakterler) sonra kırp (yalnızca kiralık açılır pencereler için)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Grup işaretleri");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Özellikler ve yerel etkinlikler/atraksiyonlar içeren bir harita görüntüler.");
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Göstermek istediğiniz özellik türlerini belirtin. Virgülle ayrılmış." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Özellikleri göster? Gösterilmelerini önlemek için 0 olarak ayarlayın." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Olayları göster? Gösterilmelerini önlemek için 0 olarak ayarlayın." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Gösterilecek yerleri göster? Gösterilmelerini önlemek için 0 olarak ayarlayın." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO ülke kodu. Haritayı bir ülkeyle sınırlamak için bu seçeneği kullanın." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Sonuçları belirli bir bölgedeki özelliklerle sınırlamak için bölge kimliğini ayarlayın." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Sonuçları belirli bir kasabadaki mülklerle sınırlamak için bir kasaba adı ayarlayın." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
