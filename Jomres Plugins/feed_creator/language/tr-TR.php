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

jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS Beslemesi");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Bu eklenti tüm jomres özelliklerinden bir besleme oluşturur. Şu anda RSS 1.0 ve RSS 2.0 sendikasyon biçimleri desteklenmektedir.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feed adı");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Yayın açıklaması");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feed dosya adı (boşluksuz)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Sendikasyon formatı");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Önbellek süresi (saniye olarak)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Feed image URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Özellik açıklaması kısaltılsın mı?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Sonra kısalt (karakter)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Feed resmi gösterilsin mi?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Mülk resmi gösterilsin mi?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Mülkün bulunduğu şehri göster?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Mülk bölgesi gösterilsin mi?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Mülkün bulunduğu ülkeyi göster mi?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Sendikasyona konu olan mülk sayısını sınırla");