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
jr_define ('_JOMRES_DATAWIPE_TITLE', "Տվյալների ջնջում");
jr_define ('_JOMRES_DATAWIPE_DESC', "Այս գործառույթը թույլ է տալիս ջնջել ամրագրումները կատարելիս հավաքված տվյալները: Այն նախատեսված է այն մշակողների կողմից, ովքեր ստեղծել են զարգացման բազմաթիվ տվյալներ իրենց տեղադրումների վրա (օրինակ ՝ թեստերի ամրագրումներ, բաժանորդագրություններ) և ցանկանում են ջնջել տեղեկատվությունը համակարգից ՝ պահպանելով գույքի և սակագնի մասին տեղեկությունները: <br/> Հավելվածը կհեռացնի ԲՈԼՈՐ cron տեղեկամատյանները, օգտվողների նախընտրած էջերը, նշումները, ամրագրումները, հաշիվ -ապրանքագրերը, բաժանորդները, բաժանորդագրությունները, հյուրերը, աուդիտի տվյալները, կտտոցների հաշվարկն ու ակնարկները ");
jr_define ('_JOMRES_DATAWIPE_WARNING', "Այս տվյալները կարող են առբերվել միայն ձեր համակարգի պահուստային պատճենից, այնպես որ դուք պետք է հասկանաք, որ սա շատ վնասակար սցենար է: Արդյունքում, խորհուրդ է տրվում այն ​​օգտագործելուց անմիջապես հետո նպատակ, որ հետո նորից հեռացնես ");
jr_define ('_JOMRES_DATAWIPE_GO', "Կտտացրեք տվյալները ջնջելու համար");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Դատարկող");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Հաջողությամբ դատարկվեց");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "Չհաջողվեց դատարկել սեղանը");