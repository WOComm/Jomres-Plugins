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
jr_define ('_CLONE_TARIFFS_TITLE',"Կլոնավորման սակագներ");
jr_define('_CLONE_TARIFFS_INFO',"Այստեղ դուք կարող եք կլոնավորել սակագինը թիրախային սեփականությունից դեպի սկզբնաղբյուր սեփականություն: Ձեզ հասանելի կլինեն միայն այն հատկությունները, որոնք դուք իրավասու եք կառավարել:");
jr_define ('_CLONE_TARIFFS_SOURCE',"Աղբյուրի սեփականություն");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Կլոնավորման սակագին");
jr_define('_CLONE_TARIFFS_TARGET',"Թիրախային հատկություն");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Նպատակային սեփականության սենյակի տեսակը");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Եթե Թիրախային հատկության սակագների խմբագրման ռեժիմը տարբերվում է Աղբյուրի սեփականության սակագների խմբագրման ռեժիմից, ապա երբ կլոնավորումը տեղի ունենա, Target գույքի սկզբնական սակագները կջնջվեն, և դրա սակագնի խմբագրման ռեժիմը կփոխվի, որպեսզի արտացոլի այդ աղբյուրը: գույքի կարգավորումը");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Ջնջել առկա սակագները Target գույքի վրա?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Եթե Թիրախային հատկության սակագների խմբագրման ռեժիմը նույնն է, ինչ Աղբյուր հատկությունը, ապա գոյություն ունեցող սակագները չեն ջնջվի: Այնուամենայնիվ, կարող եք փոխել սա՝ դնելով այս տարբերակը Այո:");