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
jr_define('QUICK_REGISTER_TITLE',"Արագ գրանցում");
jr_define ('QUICK_REGISTER',"Միանալ");
jr_define('QUICK_REGISTER_BLURB',"Ունե՞ք գույք, որը կցանկանայիք ցուցակագրել: Կտտացրեք այստեղ՝ կուսակցությանը միանալու համար!");
jr_define('QUICK_REGISTER_EMAIL_ADD',"Մուտքագրեք Ձեր էլ. հասցեն, և մենք ձեզ կսկսենք");
jr_define ('QUICK_REGISTER_EMAIL',"Էլ.փոստի հասցե");
jr_define('QUICK_REGISTER_EMAIL_SAVE',"Եկեք դա անենք!");
jr_define('QUICK_REGISTER_EMAIL_CLICKLINK',"Ձեր գրանցման էլ.փոստը ստանալուց հետո դուք կկարողանաք մուտք գործել և ավելացնել ձեր սեփականությունը մեր կայք:");
jr_define('QUICK_REGISTER_EMAIL_THANKS',"Շնորհակալություն գրանցվելու համար!");
jr_define('QUICK_REGISTER_EMAIL_THANKS_BLURB',"Դուք պետք է շուտով նամակ ստանաք, խնդրում ենք սեղմել այնտեղ գտնվող հղման վրա, և մենք ձեզ կառաջնորդենք ձեր սեփականությունը կայքում ավելացնելու գործընթացում:");
jr_define ('QUICK_LOGIN',"Մուտք գործել");
jr_define ('QUICK_REGISTER_PASSWORD',"Գաղտնաբառ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_TITLE',"Բարի գալուստ ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_LOGIN',"Եկեք սկսենք ստեղծել ձեր առաջին սեփականությունը: Նախ մուտք գործեք կայք այս հղման միջոցով. ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_CREATE',"Մուտք գործելուց հետո այցելեք այս էջը ձեր առաջին սեփականությունը ստեղծելու համար: ");
jr_define('QUICK_REGISTER_WELCOME_EMAIL_DONE',"Հիմա հետևեք էկրանի հրահանգներին, և եթե հարցեր ունեք, մի հապաղեք կապվել մեզ հետ այստեղ");
jr_define('QUICK_REGISTER_CONFIG_TITLE',"Ցույց տալ գործիքագոտու տակ?");
jr_define('QUICK_REGISTER_CONFIG_DESC',"Եթե դուք սա սահմանել եք այո, ապա արագ գրանցման կոճակները կցուցադրվեն գործիքագոտու տակ չգրանցված և չգրանցված օգտատերերի համար: Եթե դուք սահմանել եք ոչ, ապա տեղադրելու համար անհրաժեշտ կլինի օգտագործել ASAModule-ը: կոճակները՝ ստեղծելով նոր ASAModule մոդուլ և առաջադրանքը դնելով quick_register, այնուհետև կարող եք տեղադրել այդ մոդուլը ցանկացած վայրում, որտեղ անհրաժեշտ է։");