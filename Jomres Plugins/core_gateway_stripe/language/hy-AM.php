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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Stripe- ի այս դարպասը հատուկ նախագծված է ձեզ թույլ տալու, որպես կայքի մենեջեր, ամրագրման ժամանակ ստանալ սեփականության կառավարիչներին տրվող վճարումների մի մասը: Նախքան դրա օգտագործումը, նախ պետք է ձեր սեփական ինտեգրումը կարգավորեք Stripe- ի հետ Միացեք: <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Այս plugin- ի փաստաթղթերը կարող եք գտնել այստեղ: </a> <br/> Եթե կտտացրեք Save on this page- ին, այս plugin- ին անխափան աշխատեցնելու համար  մյուս բոլոր դարպասները կանջատվեն </ ուժեղ> Նախքան սկսելը, համոզվեք, որ անցել եք ձեր Stripe Connect էջ և նշել, որ հարթակ եք ստեղծում: Դա անելուց հետո հետևեք ձեր հաշիվը կարգավորելու էկրանի հրահանգներին: Նախքան կառավարիչները կարող են իրենց հաշիվը ձեր հետ կապել ձեզ հետ պետք է այցելել Կարգավորումներ> Միացնել կարգավորումները և \"OAuth settings\" տարածքում միացված OAuth ստանդարտ հաշիվների համար և այնուհետև կտտացրեք Պահել (նկատի ունեցեք, դա ձեզ հարկավոր է անել ինչպես թեստային, այնպես էլ կենդանի ռեժիմներում): ");

jr_define ('STRIPE_REGISTER_CONNECT', "Միացեք մեզ հետ");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Դուք գրանցվել եք, բայց կապը դեռ ավարտված չէ: Դուք պետք է ձեր Stripe հաշիվը միացնեք մեր կայքին: Ավարտելուց հետո կարող եք ձեր բոլոր հատկությունները ավելացնել մեր կայքին և սկսել ամրագրումներ կատարել: . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Բարի գալուստ");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Նախքան սեփականության (գույքի) կարգավորումը սկսելը, մեզ պետք է կապեք ձեր Stripe հաշվի հետ: Սկսելու համար կտտացրեք հղմանը");

jr_define ('STRIPE_SETUP_INFO', "Այժմ մենք պետք է միացնենք ձեր հաշիվը մեր հաշվին, դա թույլ կտա ձեզ վճարումներ կատարել ձեր անունից, այնպես որ կտտացրեք Միացնել կոճակը ՝ Stripe տեղափոխվելու համար, որտեղից կարող եք հաստատել կապը");
jr_define ('STRIPE_SETUP_DONE', "Դուք արդեն կապված եք մեզ հետ, այլևս անելիք չունեք: Փակեք այս պատուհանը և եկեք շարունակենք բիզնեսով զբաղվելու բիզնեսը");
jr_define ('STRIPE_SETUP_THANKS', "Շնորհակալություն մեզ հետ կապվելու համար: Այժմ կարող եք փակել այս պատուհանը");
jr_define ('STRIPE_SETUP_DISCONNECT', "Անջատեք ձեր հաշիվը");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Հաշիվն անջատված է, այժմ կարող եք փակել այս պատուհանը");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect Client ID");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Դուք կարող եք ստանալ ձեր Stripe Client ID- ն ձեր <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Գործիք>> բանալիները գտնվում են Developers- ի ընտրացանկում: </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Խնդրում ենք համոզվել, որ ձեր վերահղման URI- ն սահմանել եք <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Connect> Settings> </a> դեպի <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Գաղտնի բանալին");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "Հանրային բանալին");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Ձեր հանձնաժողովը");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Այս միջնորդավճարը վերցվում է ամրագրման պահին գույքի կառավարչին ուղարկված վճարումից: Այնուհետև այն տեղադրվում է Stripe- ի կողմից ձեր Stripe հաշվում: <br/> Սա այն միջնորդավճարի տոկոսն է, որը դուք կգանձեք գույքի կառավարիչներից: ձեր ամրագրումները: Ձեր միջնորդավճարը գանձվում է ամրագրման Ամբողջ արժեքի և ոչ թե ավանդի արժեքի հիման վրա: <br/> Անկախ նրանից, թե ինչ եք սահմանել այս արժեքը, խորհուրդ ենք տալիս կարգավորել կայքի կազմաձևումը -> ամրագրման ձևը -> Ավանդի նվազագույն ցուցանիշը առնվազն երկու անգամ այս ցուցանիշից, այնպես որ, եթե ցանկանում եք գանձել միջնորդավճար 10% -ով, ապա պետք է նվազագույն ավանդը դարձնեք 20% ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Սա այն տոկոսն է, որը Stripe- ն ձեզանից գանձում է ձեր կայքում վճարումներ կատարելու համար: Ներկայումս նրանք գանձում են 1.4% եվրոպական քարտերի համար, իսկ 2.9% -ը` ոչ եվրոպական քարտերի համար: Այս ցուցանիշը պահանջվում է ամրագրման և գների որոշման համար: վճարման ժամանակը ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Շերտերի վճար ոչ եվրո");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Քարտի համար");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "pirationամկետանց (MM/YY)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', 'Billing Zip');
    
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Ապահով վճարման ձև");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Վճարման մանրամասներ");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Քարտի մանրամասներ");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Քարտապանի անունը");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Վճարիր հիմա");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Վճարել հիմա");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Փողոցը պահանջվում է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Փողոցը պետք է լինի ավելի քան 6 և 96 նիշից պակաս');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Քաղաքը պահանջվում է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zip- ը պարտադիր է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Zip- ը պետք է լինի ավելի քան 3 և 12 նիշից պակաս');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'Էլ.փոստի հասցեն պարտադիր է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Մուտքը վավեր էլփոստի հասցե չէ');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'Նամակը պետք է լինի ավելի քան 6 և 65 նիշից պակաս');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Քարտապանի անունը պարտադիր է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Քարտապանի անունը պետք է լինի ավելի քան 6 և 70 նիշից պակաս');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Վարկային քարտի համարը պարտադիր է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'Վարկային քարտի համարն անվավեր է');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Պարտադիր ժամկետը պարտադիր է');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'expամկետանց ամիսը կարող է պարունակել միայն թվանշաններ');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'Պարտադիր ժամկետը պարտադիր է');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Պիտանելիության տարին կարող է պարունակել միայն թվանշաններ');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'Cvv- ն պարտադիր է և չի կարող դատարկ լինել');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'Արժեքը վավեր CVV չէ');

jr_define ('STRIPE_PAYMENT_FAILED', "Ներողություն, այս պահին մեզ չհաջողվեց մշակել ձեր վճարումը");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Խնդրում ենք կրկին փորձել");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Վճարումը մերժվել է");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Չափից շատ հարցումներ API- ին արված");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Անվավեր պարամետրեր են տրամադրվել Stripe- ի API- ին");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Չհաջողվեց նույնականացում Stripe- ի API- ով");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Stripe- ի հետ ցանցային հաղորդակցությունը ձախողվեց (ձեր ինտերնետային կապը խափանվե՞լ է)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Չգտնված սխալ է տեղի ունեցել");