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

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET', "Ալիքի ID- ն սահմանված չէ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET', "Կառավարչի ID- ն սահմանված չէ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TITLE', "Channel Manager Framework");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE', "Ալիքներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS', "Տեղադրված ալիքներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL', "Ընտրել ալիք");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE', "Ընտրեք բառարանի տեսակը");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED', "Սխալ, տեղադրված չեն ալիքներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE', "Ալիքի մենեջերի ողջամտության ստուգումներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC', "Ընտրեք ալիք: Դա անելուց հետո մենք կստուգենք ձեր կազմաձևումը և կարևորենք հնարավոր խնդիրները, որոնց լուծման կարիք կունենաք:");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE', "Ռեսուրսների քարտեզագրում");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC', "Տարբեր ալիքներ ունեն այն, ինչ հայտնի է որպես բառարաններ: Սրանք տերմիններ են, որոնք նկարագրում են ռեսուրսներ, ինչպիսիք են սենյակի տեսակները, սենյակի առանձնահատկությունները, գույքի առանձնահատկությունները և այլն: ռեսուրսներ, որպեսզի ալիքներից ներմուծված և արտահանված հատկությունները ունենան ճիշտ ռեսուրսներ: Այս էջում դուք առաջինը կընտրեք ալիք: Ավարտելուց հետո դուք կտեղափոխվեք նոր էջ, որտեղ դուք կկարողանաք ընտրել ռեսուրսի տեսակները, որոնք ցանկանում եք քարտեզագրել դեպի ալիքի ռեսուրսները (օրինակ ՝ սեփականության հատկությունները): Երբ ռեսուրսի տեսակը ընտրվի, դուք կկարողանաք ընտրել Jomres- ի և Channel- ի ռեսուրսները միմյանց հետ ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE', "Այստեղ դուք պետք է ընտրեք ռեսուրսը (բառարան)");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS', "Այս բառարանային նյութի համար տեղական նյութեր չկան, ուստի քարտեզագրման ոչինչ չկա");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST', "Սխալ, ալիքը չունի բառարանային դասարան:");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS', "Այս էջում դուք պետք է քարտեզագրեք ալիքի կառավարչի բառարանի տարրերը Jոմրեսում գտնվողների հետ");

jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS', "Ալիքի կառավարչի հաշիվներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC', "Խնդրում ենք պահպանել թույլտվության տվյալները ցանկացած ալիքի կառավարիչների համար, որոնցում կարող եք ունենալ հաշիվներ");
jr_define ('ԱՎԱՐՏԵԼ', 'Ավարտել խմբագրումը');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED', "Սխալ, լրացուցիչ լրացուցիչ հավելվածը տեղադրված չէ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED', "Ալիքի անունը չի տրամադրվում");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED', "Նոր սեփականության օբյեկտ չի տրամադրվում");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES', "thisJRUser օբյեկտը չի տրամադրվում");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING', "Գույքի ներմուծման սկիզբ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED', "Հաջողությամբ ներմուծված գույք");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED', "Չհաջողվեց ներմուծել սեփականություն");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT', "Ներմուծել բոլոր հատկությունները");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE', "Ներմուծել սեփականություն");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT', "Հեռակա սերվերի վրա հրապարակված/ակտիվացված չնշված հատկությունները կամ փոփոխման տարրեր չունեցող հատկությունները չեն կարող ներմուծվել");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING', "Սակագնի ներմուծման սկիզբ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED', "Հաջողությամբ ներմուծված սակագին");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED', "Չհաջողվեց ներմուծել սակագինը");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION', "Հնարավոր չէ հաստատել սեփականության կարգավորումները, փորձ է արվել ներմուծել չճանաչված սեփականության կարգավորումներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE', "Ներմուծված հատկություններ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME', "Գույքի անուն");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME', "Ալիքի անունը");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID', 'Տեղական սեփականության uid');
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID', "Հեռակա գույքի uid");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY', "Խմբագրել հեռակառավարվողը");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY', "Դիտել տեղական");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY', "localնջել տեղական");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD', "Վահանակ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS', "Ալիքի հաշիվներ");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED', "Բարակ ալիքի հավելումներ տեղադրված չեն, դեռ չեք կարող օգտագործել այս հնարավորությունը");
jr_define ('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO', "Ձեր կողմից կառավարվող չնշանակված հատկությունները կարող են վերագրվել ալիքին: Եթե փոխեք ալիքը, ապա տալիս եք վավեր API մուտքով որևէ ալիք");