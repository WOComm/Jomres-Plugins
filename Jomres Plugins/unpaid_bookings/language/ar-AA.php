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


jr_define ('_JRPORTAL_UNPAID_BOOKINGS_TITLE' , "معالجة الحجوزات غير المدفوعة") ;
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL' , "إلغاء أو حذف الحجوزات المؤقتة (غير المدفوعة)؟") ;
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE' , "Alfer كم يوم من وقت الحجز؟") ;
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS' , "يعمل هذا المكون الإضافي تلقائيًا في الخلفية ويحذف أو يلغي جميع الحجوزات المؤقتة التي لم يتم تمييزها على أنها مدفوعة خلال فترة زمنية من اختيارك. هذا مفيد عندما تقبل الحجوزات التي يتم دفعها باستخدام طرق الدفع غير المتصلة بالإنترنت (التحويل البنكي) تحويل , تحقق). إذا لم يتم دفع الحجز في غضون X عدد الأيام من وقت إجراء الحجز , فسيتم حذف الحجز أو إلغاؤه وسيعرض التقويم التواريخ المحجوزة كما هي متاحة , بحيث يمكن لشخص آخر حجز تلك الأيام .عند حذف أو إلغاء حجز , ستتلقى أنت والضيف إشعارًا عبر البريد الإلكتروني. إذا اخترت إلغاء الحجز , فسيتم وضع علامة على الحجز وفاتورته على أنه تم إلغاؤه ولن يتم حذفهما من قاعدة البيانات , حتى تتمكن من الوصول إليهم لاحقًا. إذا اخترت حذفه , فسيتم حذف الحجز وفاتورته من قاعدة البيانات. ");
jr_define ('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE' , "تم إلغاء الحجز") ;
jr_define ('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1' , "تم إلغاء حجزك تلقائيًا بسبب عدم دفع الإيداع المطلوب. لم يعد هذا حجزًا صالحًا. إذا كنت ترغب في الحجز مرة أخرى , فيرجى زيارة موقعنا على الويب وإعادة الحجز. فيما يلي تفاصيل الحجز الملغاة. ") ;
jr_define ('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2' , "إذا شعرت أنك تلقيت هذا الإشعار عن طريق الخطأ , فلا تتردد في الاتصال بنا.") ;