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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Cerca per estrelles");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Cerca per preus");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Cerca per funcions");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Cerca per país");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Cerca per regió");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Cerca per ciutat");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Cerca per tipus d'habitació");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Cerca per tipus de propietat");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Cerca per números de convidats");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Cerca per dates");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Estil de plantilla");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Valor per defecte: caselles de selecció o botons principalment simples si es troba a Bootstrap. Modals: els botons s'obren per permetre als usuaris seleccionar filtres de cerca. L'acordió dissenyat a la part superior de la pàgina, les zones es llisquen cap avall per mostrar filtres. Multiselecció: botons desplegables a revela filtres. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Botons (orientació vertical)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modals (orientació vertical) només arrencada.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Acordió (orientació horitzontal) només arrencada.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Només d'arrencada multiselecció (orientació horitzontal)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Mostra filtres");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Amaga els filtres");


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Utilitza el marc de cerca ajax. Us permet col·locar un mòdul de cerca que ofereix cerques sobre disponibilitat, rang de preus, característiques, tipus de propietat, tipus d'habitació, números de convidats, estrelles, país, regió i ciutat en una barra lateral o barra superior. Tingueu en compte que l'exemple que es mostra aquí no funcionarà, ja que alguns dels arguments es cancel·len, seleccioneu el que necessiteu entre els arguments disponibles (excepte l'argument requerit). Aquest codi curt és una mica diferent de la majoria d'altres shortcodes ja que han d’anar acompanyats d’un div especial després de la declaració de shortcode amb un identificador de asamodule_search_results que és on el connector col·loca la llista de propietats retornada. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obligatori. L'argument ha de ser 'ajax_search_composite'");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Estil dels camps de cerca. Les opcions són botons modals acordió multiselecció Si no s'estableix, el connector utilitzarà l'opció cofigurada a Configuració del lloc. Multiselecció / acordió són ideals per a la visualització horitzontal, les altres dues opcions són les millors per col·locar-les a una barra lateral. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Mostra el formulari de cerca a si la tasca de la pàgina s'estableix en viewproperty (la pàgina de detalls de la propietat). 0 per a No, 1 per a Sí.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "El prefiltrat és on només es poden mostrar les propietats que compleixin la condició del prefiltre als resultats de la cerca. Per tant, només es poden mostrar determinades propietats als arguments de la cerca. llista separada per comes dels uids de la propietat ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Pre-filtrar per tipus de propietat, de manera que només es poden mostrar propietats d'aquest / aquests tipus als resultats de la cerca. Els arguments són una llista separada per comes d'identificadors de tipus de propietat.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Pre-filtreu per codi de país, de manera que només es poden mostrar propietats d'aquests països als resultats de la cerca. Els arguments són una llista separada per comes de codis de país ISO.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Pre-filtreu per nom de regió, de manera que només es poden mostrar les propietats d'aquestes regions als resultats de cerca. Els arguments són una llista separada per comes de noms de regions i han de coincidir amb les regions emmagatzemades a la base de dades. Si heu definit el país com, per exemple, Alemanya (DE) i no es mostraran propietats d'altres països amb noms de regió similars. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Habilita / Desactiva l'entrada de les estrelles al formulari. Tingues en compte que si has definit una opció a través de la pestanya de configuració composta de la cerca Ajax a Configuració del lloc com a No, si defineixes 'asc_by_stars' a la llista d'arguments no tindràs efecte. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Habiliteu / Desactiveu l'entrada de les estrelles al formulari. Tingueu en compte que si heu definit una opció a través de la pestanya de configuració de la cerca Ajax de la configuració del lloc a No, si no configureu asc_by_price a la llista d'arguments efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Activa / Desactiva les funcions de propietat introduïdes al formulari. Tingueu en compte que si heu definit una opció a través de la pestanya de configuració composta de la cerca Ajax a Configuració del lloc a No, llavors el paràmetre asc_by_features a la llista d'arguments tindrà cap efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Habiliteu / Desactiveu l'entrada del país al formulari. Tingueu en compte que si heu establert una opció a través de la pestanya de configuració composta de la cerca Ajax a Configuració del lloc a No, la configuració de asc_by_country a la llista d'arguments no tindrà efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Habiliteu / Desactiveu l'entrada de la regió al formulari. Tingueu en compte que si heu definit una opció a través de la pestanya de configuració de la cerca de l'Ajax a Configuració del lloc a No, si no configureu asc_by_region a la llista d'arguments efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Habiliteu / Desactiveu l'entrada de Town al formulari. Tingueu en compte que si heu establert una opció a través de la pestanya de configuració de la cerca Ajax a Configuració del lloc a No, si no configureu asc_by_town a la llista d'arguments efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Habilita / Desactiva l'entrada del tipus d'habitació al formulari. Tingues en compte que si has definit una opció a través de la pestanya de configuració composta de la cerca Ajax a Configuració del lloc a No, aleshores la configuració asc_by_roomtype tindrà a la llista d'arguments cap efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Habiliteu / Desactiveu l'entrada de tipus de propietat al formulari. Tingueu en compte que si heu definit una opció a través de la pestanya de configuració de la cerca Ajax a Configuració del lloc a No, llavors el paràmetre asc_by_propertytype tindrà cap efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Habiliteu / Desactiveu els números de convidats introduïts al formulari. Tingueu en compte que si heu definit una opció a través de la pestanya de configuració composta de la cerca Ajax a Configuració del lloc a No, llavors la configuració asc_by_guestnumber tindrà a la llista d'arguments cap efecte. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Habiliteu / Desactiveu l'entrada de la data al formulari. Tingueu en compte que si heu definit una opció a través de la pestanya de configuració composta de la cerca Ajax a Configuració del lloc a No, la configuració de asc_by_date a la llista d'arguments no tindrà cap efecte. ");