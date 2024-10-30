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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Ընդլայնված քարտեզներ");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Քարտեզի լայնությունը (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Քարտեզի բարձրությունը (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Քարտեզի խոշորացման մակարդակ");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Չեղարկե՞լ Jomres- ի կանխադրված սեփականատիրոջը");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Այլ իրադարձությունների/տեսարժան վայրերի նշիչ պատկերակ");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Բացվող լայնություն (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Պատկերի լայնություն (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Պատկերի բարձրություն (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Displayուցադրե՞լ գույքի նկարագրությունը (միայն վարձակալության թռուցիկների համար)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Կտրե՞լ գույքի նկարագրությունը (միայն վարձակալության թռուցիկների համար)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Կտրել գույքի նկարագրությունը (տողերից հետո) (միայն վարձույթների համար բացվող պատուհանների համար)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Խմբի նշիչներ");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Disուցադրում է քարտեզ, որտեղ կան գույքի հավաքածուներ և տեղական իրադարձություններ/տեսարժան վայրեր:");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Նշեք այն հատկությունների տեսակները, որոնք ցանկանում եք ցուցադրել: Ստորակետն առանձնացված է");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "propertiesուցադրել հատկությունները. սահմանել 0 -ը` դրանք չցուցադրվելու համար ");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "eventsուցադրել իրադարձությունները. սահմանել 0 -ը` դրանք ցուցադրվելուց խուսափելու համար ");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "attractուցադրել տեսարժան վայրերը. սահմանե՞լ 0 -ը` դրանք չցուցադրվելու համար ");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "ISO երկրի կոդը. Օգտագործեք այս տարբերակը` քարտեզը մեկ երկրի վրա սահմանափակելու համար: ");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Սահմանել տարածաշրջանի ID- ն` արդյունքները սահմանափակելու համար որոշակի տարածաշրջանի հատկություններով ");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Սահմանել քաղաքի անուն` արդյունքները որոշակի քաղաքում սահմանափակելու համար ");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
