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
jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Չվճարված ամրագրումների մշակում");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELETEORCANCEL',"Չեղարկել կամ ջնջե՞լ նախնական (չվճարված) ամրագրումները: ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Ամրագրման ժամանակից քանի՞ օր է մնացել: ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Այս փլագինը ավտոմատ կերպով աշխատում է հետին պլանում և ջնջում կամ չեղարկում է բոլոր ժամանակավոր ամրագրումները, որոնք նշված չեն որպես վճարովի ձեր ընտրած ընդմիջումով: Սա օգտակար է, երբ ընդունում եք ամրագրումներ, որոնք վճարվում են անցանց վճարման եղանակներով (լար փոխանցում, չեկ): Եթե ամրագրումը չի վճարվում ամրագրման պահից X օրերի ընթացքում, ապա ամրագրումը ջնջվում կամ չեղարկվում է, և օրացույցը ցույց կտա ամրագրված ամսաթվերը, որպեսզի մեկ ուրիշը կարողանա ամրագրել այդ օրերը: Երբ ամրագրումը ջնջվում կամ չեղարկվում է, և՛ դուք, և՛ հյուրը ծանուցում կստանաք էլ. , այնպես որ կարող եք դրանք ավելի ուշ մուտք գործել: Եթե որոշեք ջնջել այն, ապա ամրագրումը և դրա հաշիվ-ապրանքագիրը կջնջվեն տվյալների բազայից:");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Ամրագրումը չեղարկված է");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Ձեր ամրագրումն ավտոմատ կերպով չեղարկվել է պարտադիր ավանդի չվճարման պատճառով: Սա այլևս վավեր ամրագրում չէ: Եթե ցանկանում եք նորից ամրագրել, այցելեք մեր կայք և կրկնեք ամրագրումը: Ստորև բերված են. չեղյալ ամրագրման մանրամասները");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Եթե կարծում եք, որ սխալմամբ եք ստացել այս ծանուցումը, մի հապաղեք կապվել մեզ հետ:");