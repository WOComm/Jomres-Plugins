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
jr_define('_JRPORTAL_GMAPS_DD_YES',"Այո");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Ոչ");
jr_define('_GOOGLE_ADDRESS',"Հասցե");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE' , "Փոստային կոդ");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN' , "Քաղաք");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Առավելագույնը հասել է 9 ճանապարհային կետի");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google-ը չկարողացավ հաշվարկել ուղղությունները այս երթուղու և ընտրված տարբերակների համար");
jr_define('_GOOGLE_DIRECTION_PRINT',"Տպել ուղղությունները");
jr_define ('_GOOGLE_ROUTEPLANNING', "Պլանավորեք ձեր ճանապարհը դեպի");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Ձեր գտնվելու վայրը (երթուղու մեկնարկային կետ)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS' , "Երթուղու ընտրանքներ");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR' , "Օպտիմալացնել համար");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING' , "Վարել");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING' , "Քայլում");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING' , "Հեծանվավազք");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS' , "Խուսափեք մայրուղիներից");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS' , "Խուսափել վճարովի վճարներից");
jr_define('_GOOGLE_SELECT_BUTTON' , "Ստանալ ուղղություններ");
jr_define('_GOOGLE_SELECT_RESETMAP' , "Վերականգնել քարտեզը");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Ձեր նպատակակետը (երթուղու վերջնակետը) արդեն նշված է քարտեզի վրա: Մուտքագրեք ձեր գտնվելու վայրը և ընտրեք ձեր երթուղու ընտրանքները` դեպի նպատակակետի ուղղություններ ստանալու համար: Կարող եք նաև սեղմել քարտեզի վրա `մինչև 9 ընտրելու համար: ճանապարհային կետեր ձեր ելակետից մինչև նպատակակետ ");