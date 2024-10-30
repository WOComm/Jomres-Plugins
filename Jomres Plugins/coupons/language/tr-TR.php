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

jr_define('JOMRES_COUPONS_SCAN',"Bu kodu telefonunuza tarayın ve hemen rezervasyon yapın!");
jr_define('JOMRES_COUPONS_GETADISCOUNT',"İndirim alın");
jr_define('JOMRES_COUPONS_PERCENT',"%");
jr_define('JOMRES_COUPONS_OFFACCOMMODATION'," konaklama ücretinden indirimli");
jr_define('JOMRES_COUPONS_IFYOUBOOKBETWEEN',"arasında rezervasyon yaparsanız");
jr_define('JOMRES_COUPONS_AND'," ve ");
jr_define('JOMRES_COUPONS_FORDATESBETWEEN'," arasındaki tarihler için ");
jr_define('JOMRES_COUPONS_ALTERNATIVELY',"Alternatif olarak, rezervasyonunuzu yaparken bu indirim kodunu giriniz : ");
jr_define('JOMRES_COUPONS_PRINT_COUPONS',"Kupon Yazdır");

jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervasyon başlangıç ​​tarihi');
jr_define('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervasyon şu tarihe kadar geçerlidir');
jr_define('_JRPORTAL_COUPONS_GUESTNAME', 'Misafir adı');
jr_define('_JRPORTAL_COUPONS_DESC_478', "İndirim kodları oluşturulabilir ve rezervasyon yapmaya teşvik olarak misafirlere iletilebilir.<br/>
Geçerlilik ve bitiş tarihleri, bir rezervasyonun yapılabileceği tarihleri ​​belirtirken, geçerlilik bitiş/başlangıç ​​tarihleri, kuponun geçerli olması için rezervasyonun kapsaması gereken tarihleri ​​belirtir. Bir rezervasyon bu sürenin dışında kalırsa, o dönemin dışındaki günler için normal ücretler geçerli olacaktır.<br/>
Rezervasyonun belirli bir konuk için geçerli olmasını istiyorsanız, kuponu yalnızca o konukla sınırlamak için açılır menüden o konuğun adını seçin.");
jr_define('_JRPORTAL_COUPONS_DESC_ADMIN', "Burada oluşturulan indirim kodları sitedeki tüm mülkler için geçerli olacaktır.");
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'Kuponunuzla bu rezervasyon indirimli ');
jr_define('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' ile ');
