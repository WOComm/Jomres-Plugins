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

jr_define ('_ CLONE_TARIFFS_TITLE', "Clone Tariffs") ;
jr_define ('_ CLONE_TARIFFS_INFO' , "هنا يمكنك استنساخ تعريفة من خاصية مستهدفة إلى خاصية مصدر. فقط الخصائص التي لديك سلطة للمدير ستكون متاحة لك.") ;
jr_define ('_ CLONE_TARIFFS_SOURCE', "خاصية المصدر") ;
jr_define ('_ CLONE_TARIFFS_TARIFF_TO_CLONE', "تعريفة الاستنساخ") ;
jr_define ('_ CLONE_TARIFFS_TARGET', "خاصية الهدف") ;
jr_define ('_ CLONE_TARIFFS_TARGET_ROOMTYPE' , "نوع غرفة الخاصية الهدف") ;
jr_define ('_ CLONE_TARIFFS_TARGET_WARNING' , "إذا كان وضع تحرير تعريفة الخاصية الهدف مختلفًا عن وضع تحرير تعريفة الخاصية المصدر , فعند حدوث الاستنساخ , سيتم حذف التعريفات الأصلية للخاصية الهدف وتغيير وضع تحرير التعريفة لتعكس ذلك الخاص بالمصدر وضع الملكية. ") ;
jr_define ('_ CLONE_TARIFFS_TARGET_DELETE_EXISTING', "هل تريد حذف التعريفات الحالية على خاصية الهدف؟") ;
jr_define ('_ CLONE_TARIFFS_TARGET_DELETE_OPTION' , "إذا كان وضع تحرير تعريفة الخاصية الهدف هو نفسه خاصية المصدر , فلن يتم حذف التعريفات الحالية. ومع ذلك , يمكنك اختيار تجاوز هذا عن طريق تعيين هذا الخيار على نعم .") ;