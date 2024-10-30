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
jr_define('TOOL_HYPHEN_CHECK_TITLE' , "Գծի ստուգում");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Այս գործիքը նախատեսված է բոլոր հատկությունների հետաձգումը և երկար դաշտերը ստուգելու համար: Ոմանք կարող են սխալ ունենալ html տարրեր lat կամ երկար դաշտերում իրական գծիկների փոխարեն: Որտեղ գտնվել է, այս գործիքը դրանք վերածում է գծիկների:");
jr_define ('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND', "HTML հատկություններով հայտնաբերված որոշ հատկություններ, որոնք այժմ փոխարկվել են իրական գծիկների: Փոխարկված հատկությունների թիվը");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND' , "Ամեն ինչ լավ է, html կազմով ոչ մի հատկություն չի գտնվել, որտեղ պետք է լինեն իրական գծիկները:");