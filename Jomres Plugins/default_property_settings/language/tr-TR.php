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

jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE',"Varsayılan özellik ayarları");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE',"Genel Yapılandırma başlığı (varsa, bazıları olmayabilir)");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME',"Değişken adı");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE',"Mevcut değer");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING',"Bu gelişmiş bir özelliktir, belirli bir kullanımınız yoksa kullanmamanız daha iyidir. Bu eklenti yeni bir özelliğin varsayılan değerlerini değiştirmenize olanak sağlar. Değişkeni değiştirmeden önce ne yaptığını anladığınızdan emin olun, çünkü burada değiştirmek Jomres sisteminizde geniş kapsamlı etkilere sahip olabilir.Boş öğeler genellikle artık kullanılmayan, ancak geriye dönük uyumluluk nedenleriyle yerinde bırakılan eski ayarlardır veya Özellik Yapılandırma alanı aracılığıyla değiştirilemez.");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE',"Yeni değer");