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

jr_define('_PAGEVIEW_RECORDER_ENABLED',"Tüm sayfa görünümlerini db'ye kaydedelim mi?");
jr_define('_PAGEVIEW_RECORDER_DESC',"Etkinleştirilirse, tüm sayfa görünümleri veritabanına kaydedilir. UYARI! Veritabanı sayfa görünümleri tablosu çok kısa sürede çok büyük olabilir! Dikkatli kullanın.");