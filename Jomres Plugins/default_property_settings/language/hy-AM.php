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

jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Կանխադրված գույքի կարգավորումներ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Ընդհանուր կազմաձևման վերնագիր (եթե առկա է, որոշները կարող են չլինել)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Փոփոխականի անունը");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Ընթացիկ արժեքը");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Սա առաջադեմ գործառույթ է, եթե դրա համար հատուկ օգտագործում չունես, ավելի լավ է չօգտագործես այն: Այս հավելումը թույլ է տալիս փոփոխել նոր սեփականության կանխադրված արժեքները: Կատարել համոզված եք, որ հասկանում եք, թե ինչ է անում փոփոխականը նախքան այն փոխելը, քանի որ այստեղ փոխելը կարող է մեծ ազդեցություն ունենալ ձեր Jomres համակարգի վրա: Դատարկ տարրերը, ընդհանուր առմամբ, ավելի հին պարամետրեր են, որոնք այլևս չեն օգտագործվում, բայց հետադարձ համատեղելիության պատճառով տեղում են մնում կամ այնպիսի կարգավորումներ են, որոնք հնարավոր չէ փոփոխել Property Configuration տարածքի միջոցով ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Նոր արժեք");