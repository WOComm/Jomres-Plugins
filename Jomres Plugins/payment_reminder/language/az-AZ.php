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
jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Ödəniş xatırlatmaları");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Ödəniş xatırladıcı e-poçt göndər..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..müvəqqəti rezervasiyadan günlər sonra");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Bu plagin avtomatik olaraq arxa planda işləyir və seçdiyiniz intervalda ödənişli kimi qeyd olunmayan müvəqqəti rezervasiyalar etmiş qonaqlara ödəniş xatırladıcı e-məktub göndərir. Bu, ödənişli rezervasiyaları qəbul etdiyiniz zaman faydalıdır. offline ödəmə üsullarından istifadə etməklə (pul köçürməsi, çek). Rezervasyonun edildiyi andan X gün ərzində ödəniş edilmədikdə, qonağa bir ödəniş xatırlatma e -poçtu göndərilir. Bunun bir nüsxəsini də alacaqsınız . Əgər siz həmçinin Müvəqqəti Rezervasiyaların İdarə Edilməsi plaginindən istifadə edirsinizsə, onda əmin olun ki, ödəniş xatırlatma e-poçtunu göndərmək istədiyiniz interval ödənilməmiş rezervasiyanın silinməsi və ya ləğvi üçün müəyyən edilmiş vaxtdan ən azı 1 gün azdır.");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE', "Rezervasyonunuz üçün ödəniş xatırlatması");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Sizin ödənişsiz rezervasiyanız var ");
jr_define ('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2', "Rezervasyonunuzu təmin etmək üçün depozit ödəməsi lazımdır");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Sifariş nömrəsi");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Ödəniş variantlarını müzakirə etmək istəyirsinizsə bizimlə əlaqə saxlayın.<br /><br />Təşəkkür edirəm.");