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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Ödənilməmiş rezervasiyaların idarə edilməsi");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Müvəqqəti (ödənilməmiş) rezervasiyalar ləğv edilsin və ya silinsin? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Rezervasiya vaxtından neçə gün keçsin? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Bu plagin avtomatik olaraq arxa planda işləyir və seçdiyiniz intervalda ödənilmiş kimi qeyd olunmayan bütün müvəqqəti rezervasiyaları silir və ya ləğv edir. Bu, oflayn ödəniş üsullarından (tellə) istifadə etməklə ödənilən rezervasiyaları qəbul etdiyiniz zaman faydalıdır. köçürmə, çek).Əgər rezervasiya bron edildiyi vaxtdan X gün ərzində ödənilməsə, o zaman rezervasiya silinir və ya ləğv edilir və təqvim rezervasiya edilmiş tarixləri mövcud kimi göstərəcək, beləliklə başqası həmin günləri bron edə bilər. . Rezervasiya silindikdə və ya ləğv edildikdə, həm siz, həm də qonaq e-poçt vasitəsilə bildiriş alacaqsınız. Əgər rezervasiyanı ləğv etməyi seçsəniz, rezervasiya və onun fakturası ləğv edilmiş kimi qeyd olunacaq və verilənlər bazasından silinməyəcək. , beləliklə siz onlara sonra daxil ola bilərsiniz. Əgər onu silməyi seçsəniz, rezervasiya və onun fakturası verilənlər bazasından silinəcək.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Sifariş ləğv edildi");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Tələb olunan depozitin ödənilməməsinə görə rezervasiyanız avtomatik olaraq ləğv edildi. Bu, artıq etibarlı rezervasiya deyil. Yenidən rezervasiya etmək istəyirsinizsə, lütfən, vebsaytımıza daxil olun və rezervasiyanı yenidən həyata keçirin. Aşağıdakılar ləğv edilmiş rezervasiya təfərrüatları.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Bu bildirişi səhvən aldığınızı hiss edirsinizsə, lütfən, bizimlə əlaqə saxlamaqdan çəkinməyin.");