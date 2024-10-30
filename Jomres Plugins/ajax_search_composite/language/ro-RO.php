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

jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Căutare după stele");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Căutare după prețuri");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Căutare după caracteristici");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Căutare după țară");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Căutare după regiune");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Căutare după oraș");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Căutare după tip de cameră");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Căutare după tipul de proprietate");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Căutare după numere de oaspeți");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Căutare după date");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Stil șablon");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Implicit: Casete de selectare sau butoane de cele mai multe ori simple în Bootstrap. Modale: Butoanele se deschid pentru a permite utilizatorilor să selecteze filtrele de căutare. Acordeonul conceput pentru partea de sus a paginii, zonele glisează în jos pentru a afișa filtrele. Multiselectare: Butoane derulante la dezvăluie filtre. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Butoane (orientare verticală)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modale (orientare verticală) numai Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Acordion (orientare orizontală) numai Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (orientare orizontală) Bootstrap numai.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Afișați filtrele");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Ascunde filtrele");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Folosește cadrul de căutare ajax. Vă permite să plasați un modul de căutare care să ofere căutare privind disponibilitatea, gama de prețuri, caracteristicile, tipul de proprietate, tipul camerei, numerele de oaspeți, stele, țară, regiune și oraș într-o bară laterală sau bara de sus. Vă rugăm să rețineți că exemplul prezentat aici nu va funcționa, deoarece unele dintre argumente se anulează reciproc, alegeți exact ceea ce aveți nevoie din argumentele disponibile (cu excepția argumentului necesar). Acest scurtcod este puțin diferit de majoritatea celorlalte shortcodes deoarece trebuie să fie însoțite de un div special după declarația shortcode cu un id asamodule_search_results care este locul în care pluginul plasează lista de proprietăți returnate. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obligatoriu. Argumentul trebuie să fie ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Stilul câmpurilor de căutare. Opțiunile sunt butoane modale acordeon multiselect Dacă nu este setat, atunci pluginul va folosi opțiunea cofigurată în Configurarea site-ului. Multiselect / Acordeon sunt ideale pentru afișarea orizontală, celelalte două opțiuni sunt cele mai bune pentru plasare în o bară laterală. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Afișați formularul de căutare în cazul în care sarcina paginii este setată pentru a vizualiza proprietatea (pagina cu detalii despre proprietate). 0 pentru Nu, 1 pentru Da.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Prefiltrarea este locul în care alegeți numai acele proprietăți care îndeplinesc condiția prefiltrului pot fi afișate în rezultatele căutării. Pre-filtrarea după uidul proprietății, astfel încât numai anumite proprietăți pot fi afișate în rezultatele căutării. listă separată prin virgulă a uidurilor de proprietate ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Pre-filtrare după tipul de proprietate, deci numai proprietățile acestui / aceste tipuri pot fi afișate în rezultatele căutării. Argumentele sunt o listă separată prin virgulă a identificatorilor de tip de proprietate.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Pre-filtrare după codul de țară, deci numai proprietățile din aceste țări pot fi afișate în rezultatele căutării. Argumentele sunt o listă separată prin virgulă a codurilor de țară ISO.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Pre-filtrează după numele regiunii, deci numai proprietățile din aceste regiuni pot fi afișate în rezultatele căutării. Argumentele sunt o listă separată prin virgulă a numelor de regiuni și trebuie să se potrivească cu regiunile stocate în baza de date. Dacă setați țara la, de exemplu, Germania (DE), apoi proprietățile din alte țări cu nume de regiuni similare nu vor fi afișate. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Activați / Dezactivați intrarea Stele în formular. Rețineți că, dacă ați setat o opțiune din fila Setări compozite de căutare Ajax din Configurarea site-ului la No, atunci setarea asc_by_stars în lista de argumente nu va avea niciun efect. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Activați / Dezactivați intrarea Stele în formular. Rețineți că dacă ați setat o opțiune prin fila de setări compozite de căutare Ajax în Configurare site la No, atunci setarea asc_by_price în lista de argumente nu va avea niciun efect. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Activați / Dezactivați caracteristicile proprietății introduse în formular. Rețineți că dacă ați setat o opțiune prin fila de setări compozite de căutare Ajax în Configurarea site-ului la Nu, atunci setarea asc_by_features în lista de argumente nu va avea efect . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Activați / dezactivați introducerea țării în formular. Rețineți că, dacă ați setat o opțiune prin fila de setări compozite de căutare Ajax în Configurarea site-ului la Nu, atunci setarea asc_by_country în lista de argumente nu va avea efect. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Activați / Dezactivați intrarea Regiunii în formular. Rețineți că dacă ați setat o opțiune prin fila Ajax căutare setări compozite în Configurare site la No, atunci setarea asc_by_region în lista de argumente nu va avea niciun efect. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Activați / dezactivați intrarea orașului în formular. Rețineți că dacă ați setat o opțiune prin fila de setări compuse de căutare Ajax în Configurarea site-ului la Nu, atunci setarea asc_by_town în lista de argumente nu va avea niciun efect. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Activați / Dezactivați introducerea tipului de cameră în formular. Rețineți că, dacă ați setat o opțiune prin fila de setări compuse de căutare Ajax în Configurarea site-ului la Nu, atunci setarea asc_by_roomtype în lista de argumente nu va avea efect . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Activați / Dezactivați tipul de proprietate introdus în formular. Rețineți că, dacă ați setat o opțiune din fila Setări compozite de căutare Ajax din Configurarea site-ului la Nu, atunci setarea asc_by_propertytype . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Activați / Dezactivați numerele de oaspeți introduse în formular. Rețineți că, dacă ați setat o opțiune din fila Setări compozite de căutare Ajax din Configurarea site-ului la Nu, atunci setarea asc_by_guestnumber nu va avea efect în lista de argumente . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Activați / Dezactivați introducerea datei în formular. Rețineți că, dacă ați setat o opțiune prin fila de setări compuse de căutare Ajax în Configurarea site-ului la Nu, atunci setarea asc_by_date în lista de argumente nu va avea niciun efect. ");
