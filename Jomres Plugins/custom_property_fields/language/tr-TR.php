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

jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"Özel özellik alanları");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"Özel özellik alanını düzenle");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"Özellikler için özel bilgi alanları oluşturmak için bu özelliği kullanın. Bu bilgi bir mülk yöneticisi tarafından eklenir ve mülk ayrıntıları sayfasında yeni bir sekmede görüntülenir.");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"Diğer mülk bilgileri");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"Bu özel özellik alanları, özellik ayrıntılarında ayrılmış bir sekmede veya özellik listesinde görüntülenebilir. /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (mülk listesi snippet'i için) istediğiniz düzeni elde etmek için. Yukarıda girilen alanlar ile, temel bir düzen aşağıdakine benzer, kendi düzeninizi oluşturabileceğiniz bir örnek olarak kullanabilirsiniz. ");