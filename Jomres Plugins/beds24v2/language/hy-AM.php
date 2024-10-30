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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}
jr_define ('BEDS24V2_CHANNEL_MANAGEMENT', 'Ալիքի կառավարում (Beds24)');

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Մահճակալներ 24');
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Եթե ունեք Beds24 հաշիվ և ցանկանում եք թարմացնել Beds24- ը ամրագրում կատարելիս, ընտրեք այս տարբերակը: Նշեք URL հասցեն ՝ https://www.beds24.com/api/json/');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY', 'Այս օգտվողը API ստեղներ չունի, այնպես որ չի կարող շարունակվել: Խնդրում ենք այցելել նրանց էջը Օգտվողի կառավարում> Գույքի կառավարիչներ էջում և նրանց համար ստեղծել նոր API բանալին `օգտագործելով այդ էջում տրված հղումը:');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Այս օգտվողը չունի Jomres- ի հատկություններ, որոնք նրանք կարող են հատկացնել Beds24- ի հատկություններին կամ հակառակը');
jr_define ('BEDS24V2_NOT_SUBSCRIBED', "Մենեջերը, որում մուտք եք գործել, ըստ ամենայնի, հաշիվ չունի Beds24- ում, այնպես որ նախ պետք է գրանցվեք նրանց ծառայության համար, այնուհետև պահեք այս API բանալին <a href = 'https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Beds24- ի կայքը այստեղ. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY', "Շարունակելու համար պատճենեք և տեղադրեք այս API բանալին ձեր Beds24 հաշվի LINK դաշտում");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Երբ դա անես, շարունակելու համար սեղմիր ներքևի կոճակին");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 սեփականության կապը");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO', "Այս էջը թույլ է տալիս դիտել այն հատկությունները, որոնց հասանելի եք այս համակարգում, ինչպես նաև այն, ինչ առկա է Channel Manager- ում: Այն նաև թույլ է տալիս ներմուծել հատկություններ Channel Manager- ից այս համակարգ կամ արտահանել գոյություն ունեցող հատկություններ Ալիքի կառավարչին: <br/> Եթե ունեք այս համակարգում և Beds24- ում հատկություններ և ցանկանում եք դրանք կապել միմյանց հետ, դա անելու համար կարող եք օգտագործել Property apikey- ն: Այցելեք Beds24> Կարգավորումներ> Հատկություններ (համոզվեք, որ բացվող պատուհանում ընտրված հատկությունը նույնն է, ինչ ցանկանում եք կապել), այնուհետև Հղում ենթամենյուում պահեք \"Գույք apikey\" - ն Beds24- ի \"propKey\" դաշտում: Դա անելուց հետո վերաբեռնեք էջը: Այս համակարգը տեսեք, որ երկու հատկությունները կապված են նույն բանալու հետ և ստեղծում են անհրաժեշտ ասոցիացիաներ: Երբ երկու հատկությունները կապվում են, հիշեք, որ այցելեք View Properties էջը, գտեք ծանուցման url- ը և տեղադրեք այն Հղման էջի \"Notify Url\" դաշտում: Որ կամքը համոզվեք, որ Beds24- ն օգտագործում է ճիշտ հղումը ՝ այդ գույքի հետ ամրագրումները համաժամացնելու համար, երբ այն ստանում է ամրագրումներ: ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Սխալ. Beds24- ում չկան հատկություններ, որոնց կարող եք կապել: Դա կարող է տեղի ունենալ, քանի որ այս համակարգի մեկ այլ հաշվի հետ արդեն կապված լինելու բոլոր իրավունքները ունես:");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Գույքի uid");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Գույքի անուն");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', 'Beds24 Property Uid');
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24 սեփականության անուն");
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Գույքի ապիկեյ");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT', "Ներմուծում");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Կարգավորել սենյակների տեսակները");
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Այստեղ դուք պետք է ձեր Beds24 հաշվի սենյակների տեսակները կապեք այս համակարգում պահվածների հետ");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Մահճակալներ 24 սենյակի տեսակ");

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Առայժմ հնարավոր չէ ներմուծել այս սեփականությունը, քանի որ \"Հատկության բանալին\" սեփականության հղման էջում չեք սահմանել");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Այս գույքը դեռ հնարավոր չէ ներմուծել, քանի որ այն սենյակներ չունի: Խնդրում ենք ստեղծել մեկ կամ ավելի սենյակներ (Beds24- ի սենյակները նույնն են, ինչ typesոմրեսի սենյակները) և մի մոռացեք նվազագույն գինը սահմանել Դա անելուց հետո կարող եք սենյակի տեսակը ներմուծել omոմրես և դրանք կապել omոմրեսի սենյակների ներկայիս տեսակների հետ: Դրանից հետո դուք կկարողանաք փոփոխել սակագները, սակայն անհրաժեշտ է նվազագույն գին սահմանել ");
jr_define ('_BEDS24_SUGGESTED_KEY', "Մենք առաջարկում ենք օգտագործել այս API բանալին: Երբ դա անեք, վերաբեռնեք այս էջը:");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT', "Արտահանել");
jr_define ('BEDS24V2_REST_API_INTRO', "Այստեղ կարող եք տեսնել ձեր REST API բանալիների զույգը և API- ի ուղին: Եթե դուք պահեք այս տվյալները ձեր հաշվում Beds24- ում, ապա Beds24 24 -ը կկարողանա կապվել այս կայքի միջոցով` API- ի միջոցով: ");
jr_define ('BEDS24V2_REST_API_CLIENT_ID', "Հաճախորդի ID");
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET', "Հաճախորդի գաղտնիք");
jr_define ('BEDS24V2_REST_API_ENDPOINT', "URI (վերջնակետ)");
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE', "Դիտել սեփականությունը");
jr_define ('BEDS24_ROOM_TYPES_TITLE', "Սենյակի տիպի ասոցիացիաներ");

jr_define ('BEDS24_ROOM_TYPES_INFO', "Այս էջը թույլ է տալիս ձեր սենյակների տեսակները կապել Beds24 սերվերներում պահվողների հետ");
jr_define ('BEDS24_ROOM_TYPES_INFO2', "Մինչև սենյակների տեսակները միացված չեն, դուք չեք կարող ստանալ Beds24- ի ուղարկած ամրագրման տեղեկությունները: Եթե ձեր գույքը ներմուծվել/արտահանվել է Beds24- ից կամ այնտեղից, ապա մենք ձեզ համար ավտոմատ կերպով հղումներ ենք ստեղծել, սակայն, եթե ավելացնեք սենյակի նոր տեսակը կամ ջնջեք մեկը, ապա այս էջը կարող է օգտագործվել երաշխավորելու համար, որ սենյակի տեսակը ճիշտ է կապված ");
jr_define ('BEDS24_ROOM_TYPES_INFO3', "Ընտրեք Beds24 սենյակի տեսակները, որոնք ցանկանում եք կապել այս համակարգում գտնվող սենյակների տեսակների հետ, և ավարտելուց հետո կտտացրեք Պահել ՝ Beds24- ում փոփոխությունները թարմացնելու համար");
jr_define ('BEDS24_ROOM_TYPES_YOURS', "Ձեր սենյակի տեսակները");
jr_define ('BEDS24_ROOM_TYPES_BEDS24', "Մահճակալներ 24 սենյակի տեսակներ");
jr_define ('BEDS24_ROOM_TYPES_NONE', "Այս հատկությունը չունի որևէ սենյակի տեսակ, ուստի այն չի կարող կապվել Beds24- ի որևէ սենյակի տեսակի հետ: youանկանու՞մ եք սենյակների տեսակներ ներմուծել Beds24- ից:");
jr_define ('BEDS24_IMPORT_ROOMS', "Ներմուծել սենյակներ");
jr_define ('BEDS24_EXPORT_BOOKINGS', "Արտահանել ամրագրումներ");
jr_define ('BEDS24_IMPORT_BOOKINGS', "Ներմուծել ամրագրումները");
jr_define ('BEDS24_IMPORT_EXPORT', "Մեկ կոճակի սեղմումով կարող եք ներմուծել և արտահանել Beds24- ից առկա ամրագրումները: Beds24- ից ներմուծվող ամրագրումները ներմուծվում են երեկվանից և կներառեն հաջորդ տարվա բոլոր ամրագրումները: Այս կոճակները պետք է օգտագործեք միայն այն բանից հետո, երբ նախ գույքի ներմուծումը կամ արտահանումը համակարգ: Կարգավորվելուց հետո ներմուծումը և (կամ) արտահանումը կկատարվեն ինքնաբերաբար ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Թարմացնել գները Beds24- ին?");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Դուք կարող եք ընտրել Beds24- ի թարմացումը միայն առկայությամբ կամ առկայությամբ և գներով: Եթե օգտագործում եք որոշակի իրավիճակներ, երբ ցանկանում եք օգտագործել Beds24 կառավարման վահանակը` որոշակի ալիքների համար հատուկ գներ սահմանելու համար, Ոչ ");
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT', "Ուղիղ հղում");
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS', "Եթե դուք ներմուծել եք այս սեփականությունը omոմրես, ապա ձեզ հարկավոր է ձեռքով փոխել Notify Url- ը ձեր Beds24 -> Property -> Link կարգավորումները հետևյալին.");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Դուք ներկայումս Beds24- ի հատկությունների հետ կապված որևէ հատկություն չունեք: Նախքան ձեր ղեկավարներին թույլատրել կապվել Beds24- ի հետ, պետք է վերակայեք ձեր մենեջերի API բանալիները: Սա կապահովի, որ նրանք բոլորն ունեն յուրահատուկ բանալիներ");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD', "Վերակայել կառավարչի API բանալիներն այժմ");
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS', "Անտեսել նախազգուշացումը");
jr_define ('BEDS24V2_ERROR_KEYS_DONE', "Կառավարչի API ստեղները վերակայված են");

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24 սեփականության հղումներ");
jr_define ('BEDS24_ASSIGN_MANAGER', 'Beds24 Change Manager');
jr_define ('BEDS24_ASSIGN_MANAGER_DESC', "Երբ կառավարիչը դիտում է Channel Management (Bed24) էջը առջևում, Jomres- ում և Beds24- ում API ստեղնը կիսող ցանկացած հատկություն ինքնաբերաբար կապված է Jomres- ի ներսում: Նմանապես, ցանկացած հատկություն, որը ներմուծվում կամ արտահանվում է մենեջերի կողմից կապված են: Դուք կարող եք փոխել կառավարչին, որի հետ կապված է սեփականությունը, փոխելով այս էջի մենեջերի բացվող տարբերակը, այնուհետև կտտացնելով Պահել: ");
jr_define ('BEDS24V2_TARIFFS_TITLE', "Սակագների արտահանում");
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC', "Դուք կարող եք ձեր կողմից ստեղծված սակագները արտահանել Beds24- ին որոշակի օրական սակագներով: Եթե դուք պատրաստվում եք օգտագործել այս գործառույթը, ապա պետք է \" Թարմացնել գները Beds24- ին?\" տարբերակը` Property Configuration to No.- ին: կարող է նաև անհրաժեշտ լինել կարգավորել ձեր սեփականությունը Beds24 կառավարման վահանակում, որպեսզի կարողանաք ունենալ օրական մի քանի սակագներ: Դա անելու համար անցեք Կարգավորումներ> Հատկություններ> Սենյակներ> Օրական գներ և կազմաձևեք \"Օրական գների քանակը\" ըստ ձեր ուզած գների: Դա անելուց հետո դուք կկարողանաք սեղմել P կոճակներից մեկին ՝ այդ օրական դրույքը սահմանելու համար ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Սակագնի անուն");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Սենյակի տեսակը");
jr_define ('BEDS24V2_BOOKING_RESEND', "Նորից ուղարկել ծանուցում");
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24', "Սա ամրագրման տեղեկությունն է, որը պահվում է Beds24- ում: Եթե համոզված չեք, որ տվյալները սխալ են, ապա պետք չէ նորից ամրագրումն ուղարկել Beds24:");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24', "Այս ամրագրումը, ըստ երևույթին, կապված չէ Beds24- ում ամրագրման հետ: Դուք կարող եք օգտագործել Վերաուղարկելու կոճակը` այս ամրագրումը մահճակալներ տեղափոխելու համար 24: ");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS', "Անհայտացնե՞լ հյուրերին");
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Երբ ամրագրումներն ուղարկվում են ալիքի կառավարչին, խորհուրդ ենք տալիս անանունացնել հյուրի տվյալները: Եթե այս տարբերակը դնում եք այո, երբ ամրագրման տեղեկատվությունը ուղարկվում է ալիքի կառավարչին, հյուրի անունը, էլ. . OTA- ները կունենան ձեր առկայության ճշգրիտ գրառում ՝ առանց անհրաժեշտության ավելի շատ տեղեկատվություն տարածելու: Սա նշանակում է, որ դուք համապատասխանում եք GDPR- ին, քանի որ եթե հյուրը հետագայում որոշի ջնջել այս համակարգի իր տվյալները (դուք չեք տեղեկացվի, երբ դա պատահում է), նրանց տվյալները չեն թողնվում տվյալների այլ վերահսկիչների վրա, որոնց վրա դուք վերահսկողություն չունեք: Անհրաժեշտության դեպքում, այս համակարգում դեռ կարող եք ամրագրումներ կատարել ալիքի մենեջերի հետ, ամրագրման մանրամասների էջը ցույց կտա ձեզ համար ամրագրման համարը այս ամրագրումը, քանի որ այն պահվում է ալիքի կառավարչում ");
jr_define ('BEDS24V2_MASTER_APIKEY', 'ՓՈՐՁԱԿԱՆ ԳՈՐՈՆԵՈ --ԹՅՈՆ - Master Beds24 API- ի բանալին ');
jr_define ("BEDS24V2_MASTER_APIKEY_DESC", "ԵԹԵ ԱՐԴԵՆ ԱՊԱՀՈՎՈ JԹՅՈՆ OMՈՄՐԵՐԻ ՏԵSTԱԴՐՈՄ ԵՆ ԲԵԴՍ 24-ԻՆ ԿԱՊՈԹՅՈՆՆԵՐՈՎ: հատկություններ bed24- ից ապահով և ապահով: Այս կարգավորումը թույլ է տալիս անտեսել այդ գործառույթը `ունենալով մեկ api բանալին բոլոր հատկությունների համար: Սա նշանակում է, որ Beds24- ում ձեզ անհրաժեշտ է միայն մեկ հաշիվ, սակայն դա նաև նշանակում է, որ բոլոր վճարները կհաշվարկվեն այդ մեկ հաշվի միջոցով: Գույքի հասանելիություն ունեցող ցանկացած կառավարիչ կկարողանա սեփականության թարմացումներ ուղարկել bed24 սերվերների վրա: Թողեք դատարկ ՝ այս պարամետրը անտեսելու և սեփականության կառավարիչներին ստիպելու համար օգտագործել իրենց սեփական Beds24 հաշիվները: API ստեղնը կարող է ունենալ ցանկացած ձև, որը ցանկանում եք: քանի որ այստեղ բանալին համընկնում է <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> <em> API բանալի 1 </em> </ - ի հետ: a> դաշտ: ԵԹԵ ԱՌԱ ԴՈՔ ԻՆՍՏԱԼԱՏԻ ՈւՆԵՔ ՄԱՍՆԱԵԿՆԵՐԻՆ ԿԱՎԱ ՍԵՓԱԿԱՆՈ JԹՅՈՆՆԵՐՈՎ JՈՄՐՈՍԻ:. Դուք կարող եք անցնել այս գործառույթի օգտագործմանը, սակայն դա կպահանջի, որ դուք նախ կրճատեք (դատարկեք) այս աղյուսակները, ջնջեք արդեն omոմրեսում գտնվող առկա հատկությունները, իսկ հետո նորից ներմուծեք հատկությունները Beds24- ից Jոմրես: XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Beds24- ի Հաշվի մուտքի էջի <em> API բանալի N </em> բաժնում ձեր API բանալին սահմանելիս կարևոր է, որ <em> API- ի բանալիների մուտքը </em> դաշտը սահմանեք ' Թույլատրել միայն սպիտակ ցուցակի IP- ն, և դուք IP- ի համարը սահմանում եք <strong> ". $this_servers_ip_number." </strong> Սա հավասարապես վերաբերում է այստեղ հիմնական API- ի բանալին կազմաձևելուն, իսկ առջև ՝ եթե սեփականության կառավարիչը կարգավորում է իր անհատական ​​API- ն բանալիներ ");
jr_define ('BEDS24V2_WHITELIST_WARNING', "Եթե ձեր սեփականությունները արդեն միացված են Beds24- ին, ապա տեղյակ եղեք, որ Beds24- ը վերջերս ներդրել է քաղաքականություն, որտեղ ձեր հաշվին միացնող բոլոր սերվերները պետք է լինեն սպիտակ ցուցակում: Դուք կարող եք դա անել Հաշվի մուտքի էջում, որտեղ մուտքագրված է ձեր մուտքի բանալին: Ընտրեք \"Սպիտակ ցուցակ\" IP- ի բացվող պատուհանը և IP համարը սահմանեք ");