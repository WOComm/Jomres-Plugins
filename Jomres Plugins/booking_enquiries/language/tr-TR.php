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

jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"E-posta konusu");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"E-posta metni (bu metni, bu rezervasyonu reddetme nedenini doldurmak, alternatifler sunmak vb. için düzenleyebilirsiniz)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"Bu rezervasyon talebi reddedilecek ve iptal edilecektir. Müşteriye aşağıdaki e-posta gönderilecektir.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"Bu rezervasyon sorgusu zaten reddedilmiş veya onaylanmış olduğundan reddedilemez.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"E-posta metni (bu rezervasyon için ödeme talimatlarını doldurmak için bu metni düzenleyebilirsiniz, vb.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"Bu rezervasyon talebi kabul edilecek ve müsaitlik durumu takvimde güncellenecektir. Müşteriye aşağıdaki e-posta gönderilecektir.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"Bu rezervasyon sorgusu zaten reddedilmiş veya onaylanmış olduğundan onaylanamıyor.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Site Yöneticisi Yeni Sorgu E-postası");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"Rezervasyon önce onay gerektiriyorsa ve global paypal ağ geçidi etkinse rezervasyon sırasında site yöneticisine e-posta gönderilir");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"Otel Yeni Sorgu E-postası");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"Rezervasyon önce onay gerektiriyorsa, rezervasyon sırasında otele e-posta gönderilir");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Misafir Yeni Sorgu E-postası");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"Rezervasyon önce onay gerektiriyorsa, konuğa rezervasyon sırasında e-posta gönderilir");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"Misafir Sorgulama Onay E-postası");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"Soruşturma için müsaitliği onaylamak için mülk yöneticisi tarafından misafire manuel olarak gönderilen e-posta");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"Misafir Sorgusu Reddi E-postası");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"Tesis sorgulama detayları için müsait değilse tesis yöneticisi tarafından misafire manuel olarak e-posta gönderilir");