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
jr_define ('DISALLOW_SYNDICATION_TITLE', "Արգելել համակցումը");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Jomres.net սինդիկացիայի գործառույթը նոր գործառույթ է, որը նախատեսված է կայքերի միջև հատկություններ կիսելու համար, չնայած ամրագրումները կարող են կատարվել միայն Գլխավոր սերվերի վրա:');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Սրա նպատակն է կայքերին հնարավորություն ընձեռել վստահություն հաստատել որոնման համակարգերի նկատմամբ: Դա անվճար գործառույթ է, որը հասանելի է Jomres- ի բոլոր օգտվողներին: Jոմրեսի ակտիվ լիցենզիա կրողները կարող են, եթե ցանկանում են հեռացնել իրենց այս էջի միջոցով սինդիկացիոն ցանցից: Localhost- ը չի կարող ավելացվել ցանցին, և եթե ինչ -ինչ պատճառներով կապի խնդիր կա, դուք չեք կարողանա ձեր կայքը ավելացնել ցանցին: Ստուգեք REST API միացման փորձարկման էջը, եթե կասկածի տակ են ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Կտտացրեք այս հղմանը` ձեր կայքը ցանցից հեռացնելու համար ");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Կտտացրեք այս հղմանը` ձեր կայքը ցանցին ավելացնելու համար ");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Հեռացնել այս կայքը ցանցից");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Ավելացնել այս կայքը ցանցին");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Ներողություն, ձեր աջակցության բանալին վավեր չէ կամ ակտիվ չէ, դուք չեք կարող փոխել այս տեղադրման սինդիկացիայի կարգավիճակը");