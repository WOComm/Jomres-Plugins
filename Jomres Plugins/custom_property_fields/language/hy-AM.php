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

jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "Հատուկ սեփականության դաշտեր");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "Խմբագրել հատուկ սեփականության դաշտը");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "Օգտագործեք այս գործառույթը` հատկությունների համար անհատական ​​տեղեկատվական դաշտեր ստեղծելու համար: Այս տեղեկատվությունը ավելացվում է գույքի կառավարչի կողմից և ցուցադրվում է նոր ներդիրում `սեփականության մանրամասների էջում:");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "Գույքի այլ տեղեկություններ");
jr_define ('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "Այս անհատականացված գույքի դաշտերը կարող են ցուցադրվել գույքի մանրամասների մեջ առանձին ներդիրում կամ գույքի ցուցակում: Ձեզ անհրաժեշտ կլինի ձեռքով խմբագրել /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (սեփականության ցուցակի հատվածի համար) `ձեր պահանջվող դասավորությանը հասնելու համար: հիմնական դասավորությունը նման կլինի հետևյալին, որը կարող եք օգտագործել որպես օրինակ, որից կարող եք կառուցել ձեր սեփական դասավորությունը ");