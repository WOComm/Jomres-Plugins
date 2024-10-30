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

jr_define ('EXTERNAL_FORM' , "فرم خارجی") ;
jr_define ('EXTERNAL_FORM_PLUGIN_SHORTCODE' , 'کد کوتاه افزونه (به عنوان مثال "rsform")') ;
jr_define ('EXTERNAL_FORM_PLUGIN_ARG1' , 'استدلال 1 (به عنوان مثال "1")') ;
jr_define ('EXTERNAL_FORM_PLUGIN_ARG2' , "استدلال 2 (اختیاری)") ;
jr_define ('EXTERNAL_FORM_INFO' , "به شما امکان می دهد یک فرم از افزونه فرم خارجی را در برگه های جزئیات ویژگی قرار دهید. کد کوتاه افزونه را روی چیزی مانند 'rsform' تنظیم کرده و در صورت نیاز آرگومان های اضافی اضافه کنید. نیازی به فرم , می تواند هر چیزی باشد که به عنوان mambot نامیده می شود , اما یک فرم معمولی است. ");