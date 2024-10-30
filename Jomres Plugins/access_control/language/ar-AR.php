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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Access Control') ;
jr_define ('_JOMRES_ACCESS_CONTROL_DESC' , 'تسمح لك هذه الميزة بتعيين الحد الأدنى لمستوى الوصول المطلوب من قبل المستخدمين للوصول إلى مهام محددة.') ;
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'افتراضي') ;
jr_define ("_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY" , "أي شخص");
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'مسجل') ;
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Manager');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super Manager') ;
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'لا أحد') ;
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'موظف استقبال') ;