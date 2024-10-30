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
jr_define ('_JINTOUR_TITLE', "Տուր/գործունեության կառավարում");

jr_define ('_JINTOUR_PROFILES_TITLE', "Տուր/գործունեության պրոֆիլներ");
jr_define('_JINTOUR_PROFILES_NEW',"Նոր շրջագայության/գործունեության պրոֆիլ");
jr_define('_JINTOUR_PROFILES_DELETE',"Ջնջել շրջագայության/գործունեության պրոֆիլը");

jr_define('_JINTOUR_PROFILE_TITLE',"Պրոֆիլի վերնագիր");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Նկարագրություն");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION_INFO', "Մուտքագրեք ձեր շրջագայության/գործունեության նկարագրությունը, ներառյալ դրա երթուղին");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Շաբաթվա օրեր");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Մեծահասակների համար գին");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Երեխայի գին");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS_INFO', "Ամրագրման ձևում հայտնվելը բացառելու համար գինը թողեք 0 (զրո)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Մեծահասակների տարածքներ");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Երեխաների բացատներ");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Շրջայցի/գործողության համար մատչելի տեղերի քանակը");
jr_define ('_JINTOUR_PROFILE_START_DATE', "Սեզոնի սկիզբ");
jr_define('_JINTOUR_PROFILE_END_DATE',"Սեզոնի ավարտը");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Տուր/գործունեության պրոֆիլ ստեղծելուց հետո դուք պետք է ստեղծեք շրջագայություններ/գործողություններ՝ հիմնվելով այդ պրոֆիլի կարգավորումների վրա: Ստեղծեք շրջագայությունը/գործունեությունը, այնուհետև կտտացրեք այդ պրոֆիլի կողքին գտնվող Կանաչ սլաքի պատկերակին՝ ստեղծելու համար շրջագայությունները/գործողությունները իրենք են: Երբ շրջագայությունները/գործողությունները ստեղծվեն, ցանկության դեպքում կկարողանաք ջնջել առանձին շրջագայությունները/գործունեությունը ");
jr_define ('_JINTOUR_PROFILE_GENERATE', "Ստեղծել շրջագայություններ/գործողություններ");

jr_define ('_JINTOUR_TOUR_TITLE', "Գործունեության անվանումը");
jr_define('_JINTOUR_TOUR_DATE',"Ամսաթիվ");
jr_define('_JINTOUR_TOUR_ADULTS',"Մեծահասակներ");
jr_define('_JINTOUR_TOUR_KIDS',"Երեխաներ");
jr_define ('_JINTOUR_TOUR_ITINERY', "ineանապարհորդություն");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Ստեղծված նոր շրջագայություններ");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Շրջագայության ամրագրումը չեղարկված է");
jr_define ('_JINTOUR_TOUR_SAVE_MESSAGE', "Ստեղծվել են նոր շրջագայություններ");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Ներկայումս հասանելի տարածքներ");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Նոր ամրագրում շրջագայության/ռեսուրսի id-ի համար");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Ադմինիստրատորի շրջագայության/ռեսուրսի նոր ամրագրում է կատարվել: Խնդրում ենք դիտել հետևյալ հղումը՝ այդ շրջագայության ադմինիստրատորի տարածքի էջը դիտելու համար");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres ինտեգրված շրջագայությունների կազմաձևում");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Ամբողջ տեղադրումը Jintour-ի տեղադրո՞ւմ է?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Եթե սա դրեք Այո, ապա բոլոր հատկությունները կլինեն տուրի հատկություններ: Եթե սահմանեք ոչ, ապա երբ ստեղծվեն նոր գույք, դուք կկարողանաք ունենալ և՛ տուր, և՛ հյուրանոց/բնակարան տեսակի հատկություններ: ");

jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS', "Տուրեր");
jr_define ('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC', "Ընտրեք շրջագայությունների տարբերակը, եթե որոշակի ամսաթվերի համար մատչելի ապրանքների (օրինակ` շրջագայություններ, համերգի տոմսեր) ամրագրումներ եք առաջարկում ");
jr_define ('_JINTOUR_SHOWDEPARTURE', "Showույց տա՞լ մեկնման մուտքի դաշտը");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Սրա վրա դրեք Այո, եթե ցանկանում եք ցույց տալ և՛ ժամանման, և՛ մեկնման ամսաթիվը: Սա օգտակար կլինի, եթե դուք առաջարկում եք ավտոբուսով ուղևորություններ, ինքնաթիռի տոմսեր և այլն, որտեղ դուք պետք է իմանաք և՛ մուտքի, և՛ ելքի ամսաթվերը, Մեկնման ամսաթիվը ցույց տալը թույլ է տալիս ռեսուրսներ առաջարկել մի քանի ամսաթվերի համար, մինչդեռ Ոչ դրված պարամետրով կարող են ընդունվել միայն մեկ ամսաթվի ամրագրումներ");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Տուրերի ցուցակ");