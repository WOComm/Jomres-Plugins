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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Պարզ ամրագրում");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Սև ամրագրումները սենյակներ, սենյակներ կամ գույք զբաղեցնող ամրագրումներ են, բայց չունեն որևէ վճարման կամ հաշիվ -ապրանքագրի տվյալներ: Սովորաբար դրանք օգտագործվում են այլ միջոցներով (օրինակ` հեռախոսով) կատարված ամրագրումները նշելու համար: Դուք կստեղծեիք սև ամրագրումներ ՝ ապահովելու համար, որ այդ ռեսուրսներն այնուհետև չեն կարող ամրագրվել առցանց ՝ գույքի կառավարչի կամ հյուրի կողմից ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Դուք պետք է ընտրեք առնվազն մեկ սենյակ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Հաջողությամբ ամրագրված է");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "Չհաջողվեց ամրագրել, քանի որ այն արդեն ունի ամրագրում այդ ժամանակահատվածում");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Սենյակն արգելափակված է");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP', "Օգտագործեք այս օրացույցը` գրքի ռեսուրսները հեշտությամբ ընտրելու համար: Ընտրեք սենյակ կամ սենյակներ, այնուհետև կտտացրեք սև ամրագրման առաջին և վերջին ամսաթվերին, և ռեսուրսները կլինեն սև ամրագրված: Եթե սև ամրագրումը նախատեսված է միայն մեկի համար: ամսաթիվը, այնուհետև երկու անգամ կտտացրեք այդ ամսաթվին ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP', "Օգտագործեք այս օրացույցը` սև գրքի ռեսուրսները հեշտությամբ օգտագործելու համար: Սեղմեք սև ամրագրման առաջին և վերջին ամսաթվերի վրա և ռեսուրսները կլինեն սև ամրագրված: Եթե սև ամրագրումն ընդամենը մեկ ամսաթվի համար է, ապա երկու անգամ սեղմեք այդ ամսաթվի վրա: . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Ավելացնել բոլորը");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Հեռացնել բոլորը");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "ընտրված տարրեր");