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

jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE',"Jomres 2 Jomres Entegrasyonu");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE',"Üst site istemci kimliği");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC',"Üst sitenin istemci kimliği. Ana sitede, tüm api özellik eklentileri yüklü, Kanal Yönetim Çerçevesi eklentisi yüklü ve istemci kimliğini/ gizli anahtar çifti, mevcut tüm kapsamlara erişmesine izin vermeniz gerekecek.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE',"Üst site istemci sırrı");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC',"Üst site istemci sırrı");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE',"Üst url");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC',"Üst Jomres sitesinin url'si. ");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET',"Hata, Ana site müşteri kimliğiniz ayarlanmadı. Müşteri kimliğinizi kaydetmek için Site Yapılandırması > Kanal Yöneticisi hesapları sekmesini ziyaret edin.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET',"Hata, Ana site sırrınız ayarlanmadı. Gizli anahtarınızı kaydetmek için Site Yapılandırması > Kanal Yöneticisi hesapları sekmesini ziyaret edin.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET',"Hata, Ana site gizli url'niz ayarlanmadı. Üst site url'nizi kaydetmek için Site Yapılandırması > Kanal Yöneticisi hesapları sekmesini ziyaret edin.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Hata, Müşteri kimliğiniz ayarlanmadı. Kullanıcı adınızı kaydetmek için Site Yapılandırması > Kanal Yöneticisi Hesapları sekmesine gidin.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE',"Hata, Müşteri kimliğiniz ayarlanmadı. Şifrenizi kaydetmek için Site Yapılandırması > Kanal Yöneticisi Hesapları sekmesine gidin.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE',"Kanal kurulumu");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE',"Jomres 2 Jomres : Yeni özellikleri içe aktar.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT',"IMPORT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT',"İHRACAT");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET',"Özellik kimliği ayarlanmadı");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET',"Eşlenmiş sözlük öğeleri ayarlanmadı");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYPE_NOTFOUND',"Yerel mülk türü bulunamadı. Özellik türü oluşturulmuşsa, lütfen uzak hizmetin özellik türünü yerel mülk türüyle eşleştirdiğinizden emin olun.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYPE_NOTFOUND',"Uzak özellik türü kanal tarafından döndürülmedi.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND',"Yerel özellik türü geçilmedi.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND',"Rezervasyon modeli (mrp veya srp) belirlenemedi.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE',"Özellik türü kimliği bulunduktan sonra rezervasyon modeli (mrp veya srp) belirlenemedi.");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND',"Ülke kodu belirlenemedi");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND',"Bölge kimliği belirlenemedi");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED',"Ayarlar dizisi düzgün bir şekilde doğrulanamadı");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES',"Özellik türleri yönetici tarafından eşlenmemiş");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES',"Özellik özellikleri yönetici tarafından eşlenmemiş");
jr_define('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES',"Oda tipleri yönetici tarafından eşlenmemiş");