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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Ալիքի կառավարում");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Հաճախորդը կարող է իրականացնել ալիքների կառավարման գործունեություն: Նկատի ունեցեք, դա հաճախորդին տալիս է համակարգում զգալի ուժ` ձեր հաշիվներն ու հատկությունները փոփոխելու համար ");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Մաքրում");

jr_define ('_CMF_CANCELLED_BOOKING', "Ալիքի կառավարիչը չեղարկեց ամրագրումը");

jr_define ('_CMF_CLEANING_STRING', "Մաքրում"); // Մի փոխեք սա, եթե արդեն ներմուծված հատկություններ ունեք: Մաքրման վճարներ ունեցող գույքն ունի այս անունով լրացուցիչ
jr_define ('_CMF_SECURITY_STRING', "Երաշխիքային ավանդ"); // Մի փոխեք սա, եթե արդեն ներմուծված հատկություններ ունեք: Անվտանգության ավանդ ունեցող գույքը ունի այս անունով լրացուցիչ


jr_define ('_CMF_API_PRIVACY', "API- ի գաղտնիություն");
jr_define ('_CMF_API_PRIVACY_ON', "Գաղտնիությունը միացված է");
jr_define ('_CMF_API_PRIVACY_OFF', "Գաղտնիությունն անջատված է");

jr_define ('_CMF_API_PRIVACY_DESC', "Գույքի մասին տեղեկությունները կարող են դիտվել միայն այն ստեղծող ալիքի կողմից: Օրինակ, եթե դուք տվել եք տարբեր API բանալիների զույգ ինչպես A ալիքին, այնպես էլ B ալիքին, A ալիքի ստեղծած հատկության տվյալները չեն կարող տեսանելի կլինի B ալիքով ... եթե չջնջեք API- ի գաղտնիությունը `բոլոր ալիքներին API- ի միջոցով տեսնելու սեփականության ողջ տեղեկատվությունը: API- ի գաղտնիությունը դարձրեք Off, եթե դուք այս սեփականությունը կիսում եք մեկ այլ կայքի հետ, որը ցանկանում է ցուցակել սեփականությունը: Եթե ​​դուք չեք կիսում այս գույքը որևէ այլ կայքի հետ, թողեք API- ի գաղտնիությունը միացված: ");