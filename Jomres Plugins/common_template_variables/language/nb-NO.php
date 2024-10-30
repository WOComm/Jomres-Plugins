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

jr_define ('_COMMON_STRINGS_TITLE', "Vanlige malvariabler");

jr_define ('_COMMON_STRINGS_INFO', "Utviklerverktøy. Designet for å vise utviklere vanlige strenger som er tilgjengelige for alle maler uten å måtte legge dem til i malens anropsscript. <br/> For eksempel er definisjonen COMMON_NEXT i denne listen. En utvikler kan legge dette til en Jomres -mal uten å måtte definere det i kalleskriptet. Du vil legge til den vanlige strengen i malen akkurat som alle andre strenger, ved å sette &#123;COMMON_NEXT&#125; i malen. <br/> I listen nedenfor vil du se konstanten som definert i språkfilen, og ved siden av den utgangen den vil vise (med forbehold om at det er noen egenskapsspesifikke språktilpasninger). Merk, når det gjelder konstanten 'COMMON_LAST_VIEWED_PROPERTY_UID', egenskapen uid varierer og vises ikke i denne listen. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constant");
jr_define ('_COMMON_STRINGS_VALUE', "Output");