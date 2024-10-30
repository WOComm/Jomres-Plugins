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

jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Այաքս որոնման կոմպոզիտ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Աստղերի որոնում");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Որոնել ըստ գների");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Որոնել ըստ առանձնահատկությունների");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Որոնել ըստ երկրների");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Որոնել ըստ տարածաշրջանի");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Որոնել ըստ քաղաքի");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Որոնել ըստ սենյակի տեսակի");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Որոնել ըստ սեփականության տեսակի");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Որոնել հյուրերի համարներով");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Որոնել ըստ ամսաթվերի");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Կաղապարի ոճ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Լռելյայն. Հիմնականում պարզ նշման տուփեր կամ կոճակներ, եթե գտնվում են Bootstrap- ում: Մոդալներ. Կոճակները բացվում են, որպեսզի օգտվողները կարողանան ընտրել որոնման ֆիլտրերը: Էջի վերևի համար նախատեսված ներդաշնակություն, տարածքները սահում են ներքև` ֆիլտրերը բացահայտելու համար: Multiselect: բացահայտել զտիչներ ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Կոճակներ (ուղղահայաց կողմնորոշում)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Մոդալներ (ուղղահայաց կողմնորոշում) միայն Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Ակորդեոն (հորիզոնական կողմնորոշում) միայն Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Բազմակի ընտրություն (հորիզոնական կողմնորոշում) միայն Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "filուցադրել զտիչները");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Թաքցնել զտիչները");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Օգտագործում է ajax որոնման շրջանակը: Թույլ է տալիս տեղադրել որոնման մոդուլ, որն առաջարկում է որոնում մատչելիության, գների միջակայքի, առանձնահատկությունների, գույքի տիպի, սենյակի տիպի, հյուրերի համարների, աստղերի, երկրի, տարածաշրջանի և քաղաքի կողագոտում կամ վերին սանդղակ: Խնդրում ենք նկատի ունենալ, որ այստեղ ներկայացված օրինակը չի աշխատի, քանի որ որոշ փաստարկներ միմյանց չեղարկում են, առկա փաստարկներից ընտրեք այն, ինչ ձեզ անհրաժեշտ է (բացառությամբ պահանջվող փաստարկի): Այս կարճ ծածկագիրը փոքր -ինչ տարբերվում է մյուսներից կարճ ծածկագրեր, քանի որ կարճ կոդի հայտարարագրումից հետո այն պետք է ուղեկցվի հատուկ բաժանմունքով ՝ asamodule_search_results id- ով, որտեղ plugin- ը տեղադրում է հատկությունների վերադարձված ցանկը ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Պահանջվում է: Փաստարկը պետք է լինի ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Որոնման դաշտերի ոճ. Ընտրանքները կոճակներ են, մոդալոններ` բազմընտրանք: Եթե չկարգավորվի, ապա plugin- ը կօգտագործի կայքի կազմաձևում կոֆիգուրացված տարբերակը: Multiselect/Accordion- ը իդեալական է հորիզոնական ցուցադրման համար, մյուս երկու տարբերակները լավագույնն են տեղադրման համար: կողագոտի ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Showույց տալ որոնման ձևը, եթե էջի առաջադրանքը դրված է դիտման սեփականության վրա (սեփականության մանրամասների էջ): 0 համար` ոչ, 1 -ը `այո");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Նախաֆիլտրումն այն է, որտեղ որոնման արդյունքներում ընտրվում են միայն այն նախաֆիլտրի պայմանները բավարարող հատկությունները: գույքի uids- ի ստորակետով առանձնացված ցուցակ ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Նախաֆիլտրել ըստ հատկությունների տիպի, այնպես որ որոնման արդյունքներում կարող են ցուցադրվել միայն այս/այս տեսակների հատկությունները: Փաստարկները սեփականության տիպի ID- ների ստորակետով բաժանված ցուցակ են");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Նախապես զտել ըստ երկրի կոդի, այնպես որ այս երկրների միայն հատկությունները կարող են ցուցադրվել որոնման արդյունքներում: Փաստարկները ISO երկրների կոդերի ստորակետով առանձնացված ցուցակ են");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "-տել ըստ տարածաշրջանի անվան, այնպես որ որոնման արդյունքներում կարող են ցուցադրվել միայն այս տարածաշրջանների հատկությունները: Փաստարկները տարածաշրջանների անունների ստորակետով բաժանված ցանկ են և պետք է համապատասխանեն տվյալների բազայում պահվող շրջաններին: Եթե Դուք երկիրը դրել եք, օրինակ, Գերմանիայի (ԴԵ), ապա նման տարածաշրջանի անուններով այլ երկրների սեփականությունները չեն ցուցադրվի ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Միացնել/անջատել աստղերի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե կայքի կազմաձևման Ajax որոնման կոմպոզիտային ներդիրի միջոցով տարբերակ եք դրել, ապա asc_by_stars- ի արգումենտների ցուցակում ազդեցություն չի լինի: ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Միացնել/անջատել աստղերի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե կայքի կազմաձևման Ajax որոնման կոմպոզիտային կարգավորումների ներդիրի միջոցով տարբերակ եք սահմանել, ապա արգումենտների ցուցակում asc_by_price- ը ազդեցություն չի ունենա: ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Միացնել/անջատել հատկության ձևերի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե Այաջսի որոնման կոմպոզիտային կարգավորումների ներդիրի միջոցով ընտրանք եք սահմանել կայքի կազմաձևում դեպի Ոչ, ապա նշման մեջ . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Միացնել/անջատել երկրի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե կայքի կազմաձևման Ajax որոնման կոմպոզիտային ներդիրի միջոցով տարբերակ եք դրել, ապա asc_by_country- ը արգումենտների ցուցակում չի ունենա: ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Միացնել/անջատել Տարածաշրջանի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե Այաքս -ի որոնման կոմպոզիտային կարգավորումների ներդիրի միջոցով ընտրանք եք սահմանել կայքի կազմաձևում դեպի Ոչ, ապա asc_by_region- ի արգումենտների ցուցակում ազդեցություն չի լինի: ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Միացնել/անջատել քաղաքի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե Այաքս -ի որոնման կոմպոզիտային կարգավորումների ներդիրի միջոցով ընտրանք եք սահմանել կայքի կազմաձևում դեպի ոչ, ապա asc_by_town- ի արգումենտների ցուցակում ազդեցություն չի լինի: ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Միացնել/անջատել Սենյակի տիպի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե Այաքս -ի որոնման կոմպոզիտային կարգավորումների ներդիրի միջոցով տարբերակ եք դրել Կայքի կազմաձևման վրա, ապա ոչ, ապա asc_by_roomtypeype . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Միացնել/անջատել սեփականության տիպի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե կայքի կազմաձևման Ajax որոնման կոմպոզիտային պարամետրերի միջոցով տարբերակ եք սահմանել, ապա nopert ցանկի մեջ . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Միացնել/անջատել ձևի մեջ Հյուրերի թվերի մուտքագրումը: Տեղյակ եղեք, որ եթե Այաքս -ի որոնման կոմպոզիտային կարգավորումների ներդիրի միջոցով ընտրանք եք սահմանել, ապա ոչ, ապա asc_by_guestnumber- ում . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Միացնել/անջատել ամսաթվի մուտքագրումը ձևում: Տեղյակ եղեք, որ եթե կայքի կազմաձևման Ajax որոնման կոմպոզիտային ներդիրի միջոցով տարբերակ եք սահմանել, ապա արգումենտների ցանկում asc_by_date- ը ազդեցություն չի ունենա: ");