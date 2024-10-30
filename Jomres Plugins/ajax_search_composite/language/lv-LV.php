<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Meklēt pēc zvaigznēm");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Meklēt pēc cenām");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Meklēt pēc funkcijām");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Meklēt pēc valsts");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Meklēt pēc reģiona");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Meklēt pēc pilsētas");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Meklēt pēc telpas veida");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Meklēt pēc īpašuma veida");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Meklēt pēc viesu numuriem");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Meklēt pēc datumiem");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Veidnes stils");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Noklusējums: pārsvarā vienkāršas izvēles rūtiņas vai pogas Bootstrap režīmā. Modāli: pogas tiek atvērtas, lai lietotāji varētu atlasīt meklēšanas filtrus. Akordeons, kas paredzēts lapas augšdaļai, apgabali slīd uz leju, lai atklātu filtrus. Multiselect: Buttons dropdown to atklāt filtrus. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Pogas (vertikālā orientācija)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modāli (vertikālā orientācija) Tikai sāknēšanas siksna.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Akordeons (horizontālā orientācija) Tikai sāknēšanas siksna.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (horizontālā orientācija) Bootstrap only");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Rādīt filtrus");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Paslēpt filtrus");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "izmanto ajax meklēšanas ietvaru. Ļauj ievietot meklēšanas moduli, kas piedāvā meklēšanu pēc pieejamības, cenu diapazona, funkcijām, īpašuma veida, istabas veida, viesu skaita, zvaigznēm, valsts, reģiona un pilsētas sānjoslā vai augšējā josla. Lūdzu, ņemiet vērā, ka šeit parādītais piemērs nedarbosies, jo daži argumenti atceļ viens otru, no pieejamajiem argumentiem izvēlieties tikai to, kas jums nepieciešams (izņemot obligāto argumentu). Šis īss kods nedaudz atšķiras no vairuma citu īsie kodi, jo tam pēc īsā koda deklarācijas jāpievieno īpašs divs ar id asamodule_search_results, kurā spraudnis ievieto atgriezto īpašumu sarakstu. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obligāti. Argumentam jābūt ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Meklēšanas lauku stils. Iespējas ir pogas modāli akordeons multiselect Ja tas nav iestatīts, spraudnis izmantos vietnes konfigurācijā konfigurēto opciju. Daudzizvēle/akordeons ir ideāli piemērots horizontālai attēlošanai. sānjosla. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Rādīt meklēšanas veidlapu, ja lapas uzdevums ir iestatīts kā viewproperty (rekvizītu informācijas lapa). 0 - nē, 1 - jā.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Meklēšanas rezultātos var parādīt tikai tos filtrus, kas atbilst priekšfiltra nosacījumam. Iepriekš filtrējiet pēc īpašuma uid, tāpēc meklēšanas rezultātos var parādīt tikai noteiktus rekvizītus. ar komatiem atdalīts īpašuma uids saraksts ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Iepriekš filtrējiet pēc īpašuma veida, tāpēc meklēšanas rezultātos var tikt parādīti tikai šī/šo veidu rekvizīti. Argumenti ir ar komatu atdalīts rekvizītu veidu ID saraksts.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Iepriekš filtrējiet pēc valsts koda, tāpēc meklēšanas rezultātos var tikt parādīti tikai šo valstu rekvizīti. Argumenti ir ar komatu atdalīts ISO valstu kodu saraksts.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Iepriekš filtrējiet pēc reģiona nosaukuma, tāpēc meklēšanas rezultātos var tikt parādīti tikai šo reģionu rekvizīti. Argumenti ir ar komatu atdalīts reģionu nosaukumu saraksts un tiem jāatbilst reģioniem, kas saglabāti datu bāzē. Ja jūs iestatāt valsti uz, piemēram, Vāciju (DE), tad netiks parādīti citu valstu īpašumi ar līdzīgiem reģionu nosaukumiem. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Iespējot/atspējot Stars ievadi veidlapā. Ņemiet vērā, ka, ja vietnes konfigurācijas cilnē Ajax meklēšanas saliktie iestatījumi esat iestatījis opciju Nē, tad, iestatot asc_by_stars, argumentu sarakstā nebūs. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Iespējot/atspējot Stars ievadi veidlapā. Ņemiet vērā, ka, ja esat iestatījis opciju, izmantojot vietnes konfigurācijas cilni Ajax meklēšanas saliktie iestatījumi uz Nē, tad argumentu saraksta iestatīšanai asc_by_price nebūs. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Iespējot/atspējot rekvizītu funkciju ievadi veidlapā. Ņemiet vērā, ka, ja esat iestatījis opciju, izmantojot vietnes konfigurācijas cilni Ajax meklēšanas saliktie iestatījumi uz Nē, tad parametram asc_by_features argumentu sarakstā nebūs efektu . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Iespējot/atspējot valsts ievadi veidlapā. Ņemiet vērā: ja esat iestatījis opciju, izmantojot vietnes konfigurācijas cilni Ajax meklēšanas saliktie iestatījumi uz Nē, tad argumentu sarakstā nebūs iestatīta asc_by_country. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Iespējot/atspējot reģiona ievadi veidlapā. Ņemiet vērā, ka, ja vietnes konfigurācijas cilnē Ajax meklēšanas saliktie iestatījumi esat iestatījis opciju Nē, tad argumentu saraksta iestatīšanai asc_by_region nebūs nekādas ietekmes. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Iespējot/atspējot pilsētas ievadi veidlapā. Ņemiet vērā, ka, ja esat iestatījis opciju, izmantojot vietnes konfigurācijas cilni Ajax meklēšanas saliktie iestatījumi uz Nē, tad argumentu saraksta iestatīšanai asc_by_town nebūs nekādas ietekmes. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Iespējot/atspējot telpas tipa ievadi veidlapā. Ņemiet vērā, ka, ja esat iestatījis opciju, izmantojot vietnes konfigurācijas cilni Ajax meklēšanas saliktie iestatījumi uz Nē, tad, iestatot asc_by_roomtype, argumentu sarakstā nebūs efektu . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Iespējot/atspējot rekvizīta tipa ievadi veidlapā. Ņemiet vērā, ka, ja vietnes konfigurācijas cilnē Ajax meklēšanas saliktie iestatījumi esat iestatījis opciju Nē, tad iestatot asc_by_efacty . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Iespējot/atspējot viesu numuru ievadi veidlapā. Ņemiet vērā, ka, ja vietnes konfigurācijas cilnē Ajax meklēšanas saliktie iestatījumi esat iestatījis opciju Nē, tad iestatot asc_by_guestnumber . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Iespējot/atspējot datuma ievadi veidlapā. Ņemiet vērā, ka, ja vietnes konfigurācijas cilnē Ajax meklēšanas salikto iestatījumu iestatījāt opciju Nē, tad argumentu saraksta iestatīšanai asc_by_date nebūs nekādas ietekmes. ");