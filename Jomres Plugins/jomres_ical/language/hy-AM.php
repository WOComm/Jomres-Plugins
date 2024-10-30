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
jr_define ('_JOMRES_ICAL_EVENT', 'iCal իրադարձություն');
jr_define ('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define ('_JOMRES_ICAL_FEEDS_DESC', 'Ձեր iCal լրահոսը/ները կարող են ցուցադրել առաջիկա ամրագրումները հեռավոր օրացույցում, ներառյալ ձեր բջջային սարքը, Google Օրացույցը, Apple Calendar- ը, Thunderbird- ը, Outlook- ը և այլն: ձեր օրացույցի ծրագրակազմը։');
jr_define( '_JOMRES_ICAL_ANON', 'Անանուն iCal Feed URL' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Թույլատրե՞լ անանուն մուտքը iCal-ի ֆիդ/եր' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'Եթե այս տարբերակը միացված է, ձեր iCal իրադարձությունների հոսքը հասանելի կլինի բոլորին, բայց առանց ամրագրման կամ հյուրի մանրամասների։' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal ներմուծում' );
jr_define( '_JOMRES_ICAL_SELECT', 'Ընտրել ֆայլը ներմուծման համար' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Սխալ, ֆայլ չի վերբեռնվել' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "iCal ֆայլ ներմուծելիս Միջոցառման ավարտի ամսաթիվը պետք է լինի հյուրի մեկնման ամսաթիվը: Ամփոփագիրը պետք է լինի հյուրի անունը: Միջոցառման նկարագրությունը կարող է պարունակել բոլոր այլ մանրամասներ:" );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'Այս ամրագրման համարն արդեն գոյություն ունի համակարգում:' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'Ընտրված ամսաթվերին սենյակներ չկան:' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'Ոչ մի իրադարձություն չի գտնվել ics ֆայլում։' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Իրադարձությունը հաջողությամբ ներմուծվեց' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Իրադարձությունը չհաջողվեց ներմուծել' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Հյուրի անուն' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Իրադարձության նկարագրություն' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Սկսել' );
jr_define ('_JOMRES_ICAL_RESULT_HEADER_END', 'Վերջ');
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Արդյունք' );
jr_define ('_JOMRES_ICAL_WITHHELD', 'Պահված');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Ձեր iCal լրահոսը կարող է ցուցադրել առաջիկա ամրագրումները հեռավոր օրացույցում, ներառյալ ձեր շարժական սարքը, Google Օրացույցը, Apple Օրացույցը, Thunderbird-ը, Outlook-ը և այլն:' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'Այս հատկությունը թույլ է տալիս համաժամեցնել ամրագրումները այնպիսի կայքերից, ինչպիսիք են Airbnb-ը, Homeway-ը և այլք Jomres-ի հետ: Դուք պետք է մուտքագրեք ձեր սեփականության iCal հոսքի URL-ը յուրաքանչյուր կայքի համար, որի հետ ցանկանում եք համաժամեցնել: Ամրագրեք ձեր գույքը Airbnb-ով, օրինակ, այդ ամսաթվերը կցուցադրվեն որպես արգելափակված (սև ամրագրումներ) այս Jomres կայքում, այնպես որ ոչ ոք չի կարող ամրագրել այդ ամսաթվերը այստեղ: Սա չի համաժամեցնի ամրագրման մանրամասները կայքերի միջև (օրինակ՝ հյուրերի մանրամասները, գները, հաշիվ-ապրանքագրեր և այլն), բայց դա լավ և հեշտ միջոց է՝ խուսափելու կրկնակի ամրագրումներից՝ համաժամացնելով միայն հասանելիությունը։');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync-ի կարգավորումներ' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'Արտաքին iCal URL' );
jr_define ('_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Ներառե՞լ նաև ամրագրման հարցումները');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'Եթե միացված է, այն կներառի նաև ամրագրումներ, որոնք դեռ հաստատված չեն (եթե ամրագրումների հաստատման գործառույթը միացված է): Այս ընտրանքն անջատված պահելը հիանալի միջոց է օրացույցից ամրագրումները թաքցնելու համար, որոնք, հնարավոր է, սպասում են հաստատման: չհաստատված/հարցման կարգավիճակ: Եթե ամրագրումները հաստատում չեն պահանջում (ամրագրումների հաստատման գործառույթն անջատված է), բոլոր ամրագրումները կարտահանվեն:' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Հեռակա URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Սենյակի UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Սենյակի անունը/համարը' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Ընտրեք սենյակը, որի վրա կազդի այս հոսքը, և հեռավոր կայքի url-ը: iCal ֆայլը ներմուծելիս Միջոցառման ավարտի ամսաթիվը պետք է լինի հյուրի մեկնման ամսաթիվը: Ամփոփագիրը պետք է լինի հյուրի անունը: Իրադարձություն: նկարագրությունը կարող է պարունակել մնացած բոլոր մանրամասները:");

jr_define ('_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ստեղծված է Ical- ի հեռակա սնունդ');
jr_define ('_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical հեռակա հոսքը ջնջված է');
