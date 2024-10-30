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
jr_define ('_JRPORTAL_PAYMENT_REMINDER_TITLE', "Վճարման հիշեցումներ");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Ուղարկել վճարման հիշեցման էլ.");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..նախնական ամրագրումից օրեր անց");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Այս փլագինը ավտոմատ կերպով աշխատում է հետին պլանում և վճարման հիշեցման նամակ է ուղարկում հյուրերին, որ նրանք կատարել են նախնական ամրագրումներ, որոնք նշված չեն որպես վճարովի ձեր ընտրած ընդմիջումով: Սա օգտակար է, երբ ընդունում եք վճարովի ամրագրումներ: օգտագործելով օֆլայն վճարման եղանակները (փոխանցում, չեկ): Եթե ամրագրումը չի վճարվում ամրագրման պահից X օրերի ընթացքում, ապա հյուրին ուղարկվում է վճարման հիշեցման նամակ: Դուք նույնպես կստանաք դրա պատճենը: Եթե ​​դուք նաև օգտագործում եք \"Provisional Bookings Handling\" հավելվածը, ապա համոզվեք, որ այն ընդմիջումը, որով ցանկանում եք ուղարկել վճարման հիշեցման էլ.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Վճարման հիշեցում ձեր ամրագրման համար ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"Դուք ունեք չվճարված ամրագրում ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Ձեր ամրագրումն ապահովելու համար անհրաժեշտ է կատարել ավանդի վճարում ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Ամրագրման համար");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',". Խնդրում ենք կապնվել մեզ հետ, եթե ցանկանում եք քննարկել վճարման տարբերակները:<br /><br />Շնորհակալություն:");