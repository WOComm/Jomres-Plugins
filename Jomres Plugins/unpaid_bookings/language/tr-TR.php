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

jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Ödenmemiş rezervasyonların işlenmesi");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Geçici (ödenmemiş) rezervasyonlar iptal veya silinsin mi?");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Rezervasyondan kaç gün sonra? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Bu eklenti arka planda otomatik olarak çalışır ve seçtiğiniz bir aralıkta ödendi olarak işaretlenmemiş tüm geçici rezervasyonları siler veya iptal eder. Bu, çevrimdışı ödeme yöntemleri (havale) kullanılarak ödenen rezervasyonları kabul ettiğinizde kullanışlıdır. transfer, çek) Rezervasyonun yapıldığı andan itibaren X gün içinde ödeme yapılmazsa, rezervasyon silinir veya iptal edilir ve takvim, rezerve edilen tarihleri ​​uygun olarak gösterir, böylece başka biri o günleri rezerve edebilir . Bir rezervasyon silindiğinde veya iptal edildiğinde, hem siz hem de misafir e-posta ile bir bildirim alırsınız. Bir rezervasyonu iptal etmeyi seçerseniz, rezervasyon ve faturası iptal edildi olarak işaretlenir ve veri tabanından silinmez. , böylece onlara daha sonra erişebilirsiniz. Silmeyi seçerseniz, rezervasyon ve faturası veritabanından silinecektir.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Rezervasyon iptal edildi");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Gerekli depozitonun ödenmemesi nedeniyle rezervasyonunuz otomatik olarak iptal edildi. Bu artık geçerli bir rezervasyon değil. Tekrar rezervasyon yapmak isterseniz, lütfen web sitemizi ziyaret edin ve rezervasyonu yeniden yapın. Aşağıdakiler iptal edilen rezervasyon detayları.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Bu bildirimi yanlışlıkla aldığınızı düşünüyorsanız, lütfen bizimle iletişime geçmekten çekinmeyin.");