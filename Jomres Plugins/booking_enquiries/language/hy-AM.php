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
jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Էլ. փոստի թեմա");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Էլ. փոստի տեքստ (կարող եք խմբագրել այս տեքստը` այս ամրագրումը մերժելու պատճառը լրացնելու, այլընտրանքներ առաջարկելու և այլն) ");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Այս ամրագրման հարցումը մերժվելու և չեղարկվելու է: Հաճախորդին կուղարկվի հետևյալ էլ. փոստը");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Ամրագրման այս հարցումը չի կարող մերժվել, քանի որ այն արդեն մերժվել կամ հաստատվել է");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Էլ. փոստի տեքստ (կարող եք խմբագրել այս տեքստը` այս ամրագրման վճարման հրահանգները լրացնելու և այլն) ");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Այս ամրագրման հարցումը կընդունվի, և առկայությունը կթարմացվի օրացույցում: Հաճախորդին կուղարկվի հետևյալ էլ. փոստը");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Ամրագրման այս հարցումը չի կարող հաստատվել, քանի որ այն արդեն մերժվել կամ հաստատվել է");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Կայքի ադմինիստրատորի նոր հարցման էլ. փոստ");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Էլ. փոստ, որն ամրագրման պահին ուղարկվել է կայքի ադմինիստրատորին, եթե ամրագրման համար պահանջվում է առաջին հաստատումը, և paypal- ի գլոբալ դարպասը միացված է");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Հյուրանոցի նոր հարցման էլ. փոստ");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Էլեկտրոնային նամակ, որն ուղարկվել է հյուրանոցին ամրագրման պահին, եթե ամրագրման համար անհրաժեշտ է նախապես հաստատում");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Հյուրի նոր հարցման էլ. փոստ");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Ամրագրման պահին հյուրին ուղարկված էլ. փոստ, եթե ամրագրման համար անհրաժեշտ է նախ հաստատում");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Հյուրերի հարցման հաստատման էլ. փոստ");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Գույքի կառավարչի կողմից հյուրին ձեռքով ուղարկված էլ. փոստ` հարցման առկայության հաստատման համար ");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Հյուրերի հարցման մերժման էլ. փոստ");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Էլեկտրոնային նամակ, որը սեփականության կառավարչի կողմից ձեռքով ուղարկվում է հյուրին, եթե գույքը մատչելի չէ հարցման մանրամասների համար");