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


jr_define ('REST_API_ACCESS_TOKENS_MENU_OPTION', "List REST API Access tokens") ;
jr_define ('REST_API_ACCESS_TOKENS_INFO', "تسرد هذه الصفحة جميع العملاء وإذا كانت متوفرة , رموز الوصول الخاصة بهم (ربما لم يطلب العملاء رمز وصول). هذا مفيد إذا كنت تريد إرسال استعلامات من خلال عميل مثل Postman وتحتاج إلى رمز وصول . بالرغم من أن هذه الصفحة تسرد رموز الوصول إلى النظام , إلا أنه لا يوصى باستخدامها. ");