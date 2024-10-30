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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Jomres 2 Jomres Integration");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "arentնողի կայքի հաճախորդի ID");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "siteնողական կայքի հաճախորդի id. theնողական կայքում ձեզ հարկավոր կլինի յուրահատուկ հաճախորդի գաղտնի և գաղտնի` բոլոր api ֆունկցիաների հավելվածներով, տեղադրված Channel Management Framework plugin- ով, և երբ ստեղծում/խմբագրում եք հաճախորդի id/ գաղտնի բանալիների զույգը, որը ձեզ անհրաժեշտ կլինի, որպեսզի այն հասանելի դարձնի հասանելի բոլոր շրջանակները ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "arentնողական կայքի հաճախորդի գաղտնիքը");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Մայր կայքի հաճախորդի գաղտնիքը");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "arentնողական url");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "lոմրեսի ծնող կայքի հասցեն");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Սխալ, ձեր ծնողի կայքի հաճախորդի ID- ն սահմանված չէ: Այցելեք կայքի կազմաձևում> Ալիքի կառավարչի հաշիվների ներդիր` ձեր հաճախորդի ID- ն պահելու համար ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Սխալ, ձեր arentնողի կայքի գաղտնիքը որոշված ​​չէ: Ձեր գաղտնիքը պահելու համար այցելեք կայքի կազմաձևում> Ալիքի կառավարչի հաշիվների ներդիր");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Սխալ, ձեր arentնողի կայքի գաղտնի url- ը սահմանված չէ: Այցելեք կայքի կազմաձևում> Ալիքի մենեջերի հաշիվների ներդիր` ձեր մայր կայքի URL- ը պահելու համար ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Սխալ, ձեր հաճախորդի id- ը կարգավորված չէ: Ձեր օգտանունը պահելու համար այցելեք կայքի կազմաձևում> Channel Manager հաշիվների էջանիշ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Սխալ, ձեր Հաճախորդի ID- ն կարգավորված չէ: Ձեր գաղտնաբառը պահելու համար այցելեք կայքի կազմաձևում> Ալիքի կառավարչի հաշիվներ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Ալիքի կարգավորում");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Jomres 2 Jomres: Ներմուծեք նոր հատկություններ:");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "ՆԵՐՄՈORTՈ \"Մ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Գույքի ID- ն սահմանված չէ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Քարտեզագրված բառարանային տարրերը սահմանված չեն");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Տեղական սեփականության տեսակը չի գտնվել: Եթե գույքի տեսակը ստեղծվել է, համոզվեք, որ հեռակա ծառայության սեփականության տեսակը տեղակայել եք տեղական սեփականության տիպին");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Հեռակա գույքի տեսակը ալիքով չի վերադարձվում");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Տեղական սեփականության տեսակը չի փոխանցվում");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Չհաջողվեց որոշել ամրագրման մոդելը (mrp կամ srp):");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Չհաջողվեց որոշել ամրագրման մոդելը (mrp կամ srp) գույքի տիպի ID գտնելուց հետո");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Չհաջողվեց որոշել երկրի կոդը");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Չհաջողվեց որոշել տարածաշրջանի ID");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Չհաջողվեց հաստատել կարգավորումների զանգվածը");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Գույքի տեսակներ, որոնք քարտեզագրված չեն ադմինիստրատորի կողմից");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Գույքի հատկությունները քարտեզագրված չեն ադմինիստրատորի կողմից");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Սենյակների տեսակները, որոնք քարտեզագրված չեն ադմինիստրատորի կողմից");