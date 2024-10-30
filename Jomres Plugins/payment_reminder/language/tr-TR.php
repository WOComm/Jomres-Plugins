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

jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Ödeme hatırlatıcıları");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Ödeme hatırlatma e-postası gönder..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..geçici rezervasyon yapıldıktan sonraki günler");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Bu eklenti arka planda otomatik olarak çalışır ve seçtiğiniz bir aralık içinde ödenmiş olarak işaretlenmemiş geçici rezervasyon yapan konuklara bir ödeme hatırlatma e-postası gönderir. Bu, ödemesi yapılan rezervasyonları kabul ettiğinizde kullanışlıdır. çevrimdışı ödeme yöntemlerini kullanarak (havale, çek) Rezervasyonun yapıldığı tarihten itibaren X gün içinde bir rezervasyonun ödemesi yapılmazsa, misafire bir ödeme hatırlatma e-postası gönderilir.Bunun bir kopyası da size gönderilecektir. Geçici Rezervasyon İşleme eklentisini de kullanıyorsanız, ödeme hatırlatma e-postasını göndermek istediğiniz aralığın, ödenmemiş rezervasyonu silmek veya iptal etmek için ayarlanmış olandan en az 1 gün daha kısa olduğundan emin olun.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Rezervasyonunuz için ödeme hatırlatıcısı ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Ücretsiz rezervasyonunuz var ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Rezervasyonunuzu garanti altına almak için depozito ödemesi yapmanız gerekmektedir ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Rezervasyon numarası");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Ödeme seçeneklerini görüşmek isterseniz lütfen bizimle iletişime geçin.<br /><br />Teşekkür ederiz.");