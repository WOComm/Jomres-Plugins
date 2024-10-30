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


jr_define ('_COMMON_STRINGS_TITLE', "Almindelige skabelonvariabler");

jr_define ('_COMMON_STRINGS_INFO', "Udviklerværktøj. Designet til at vise udviklere fælles strenge, der er tilgængelige for alle skabeloner uden at skulle føje dem til skabelonens kaldescript. <br/> For eksempel findes definitionen KOMMON_NÆST på denne liste. En udvikler kan føje dette til en Jomres -skabelon uden at skulle definere det i kaldescriptet. Du vil tilføje den fælles streng til skabelonen ligesom enhver anden streng ved at sætte &#123;COMMON_NEXT&#125; i skabelonen. <br/> På listen herunder vil du se konstanten som defineret i sprogfilen og ved siden af den output, den vil vise (med forbehold for, at der er egenskabsspecifikke sprogtilpasninger). Bemærk, i tilfælde af konstanten 'COMMON_LAST_VIEWED_PROPERTY_UID', ejendommen uid varierer og vises ikke på denne liste. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constant");
jr_define ('_COMMON_STRINGS_VALUE', "Output");