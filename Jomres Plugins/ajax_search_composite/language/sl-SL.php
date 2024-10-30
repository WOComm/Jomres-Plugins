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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Iskanje po zvezdicah");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Iskanje po cenah");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Iskanje po funkcijah");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Iskanje po državah");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Iskanje po regijah");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Iskanje po mestu");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Iskanje po vrsti sobe");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Iskanje po vrsti lastnosti");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Iskanje po številkah gostov");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Iskanje po datumih");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Slog predloge");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Privzeto: večinoma preprosta potrditvena polja ali gumbi, če so v zagonski vrstici. Načini: Gumbi se odprejo, da uporabnikom omogočijo izbiro iskalnih filtrov. Harmonika, zasnovana za vrh strani, območja se pomaknejo navzdol, da se prikažejo filtri. Več izbir: spustni gumbi razkriti filtre. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Gumbi (navpična usmeritev)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Načini (navpična usmeritev) Samo zagonski trak.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Harmonika (vodoravna usmeritev) samo zagonski trak.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Večizbir (vodoravna usmerjenost) Samo zagonski trak.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Prikaži filtre");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Skrij filtre");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Uporablja iskalni okvir ajax. Omogoča vam, da v stransko vrstico postavite iskalni modul, ki ponuja iskanje glede razpoložljivosti, cenovnega razreda, lastnosti, vrste nepremičnine, vrste sobe, številk gostov, zvezd, države, regije in mesta. ali zgornjo vrstico. Upoštevajte, da tukaj prikazani primer ne bo deloval, saj se nekateri argumenti medsebojno prekličejo, med razpoložljivimi argumenti izberite le tisto, kar potrebujete (razen zahtevanega argumenta). Ta kratka koda se nekoliko razlikuje od večine drugih kratke kode, saj mora po deklaraciji kratke kode spremljati poseben div z ID -jem asamodule_search_results, kamor vtičnik postavi vrnjeni seznam lastnosti. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obvezno. Argument mora biti ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Slog iskalnih polj. Možnosti so gumbi modals harmonika multiselect Če ni nastavljen, bo vtičnik uporabil možnost, ki je konfigurirana v konfiguraciji spletnega mesta. Več izbir/harmonika sta idealna za horizontalni prikaz, drugi dve možnosti pa sta najboljši za postavitev v stransko vrstico. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Pokaži iskalni obrazec, če je naloga strani nastavljena na viewproperty (stran s podrobnostmi o lastnostih). 0 za Ne, 1 za Da.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Predfiltriranje je tisto, kjer izberete samo tiste lastnosti, ki izpolnjujejo pogoj predfiltra, so lahko prikazane v rezultatih iskanja. Predfiltrirajte po uidu lastnosti, zato so lahko v rezultatih iskanja prikazane samo nekatere lastnosti. seznam uidov lastnosti, ločenih z vejicami ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Predfiltriraj glede na vrsto lastnosti, zato so lahko v rezultatih iskanja prikazane samo lastnosti te/teh vrst. Argumenti so z vejicami ločeni seznami ID-jev lastnosti.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Predfiltrirajte po kodi države, zato so v rezultatih iskanja prikazane samo lastnosti v teh državah. Argumenti so seznam z oznakami držav ISO ločen z vejicami.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Predfiltriraj po imenu regije, zato so v rezultatih iskanja prikazane samo lastnosti v teh regijah. Argumenti so z vejicami ločeni imeni regij in se morajo ujemati z regijami, shranjenimi v bazi podatkov. Če ste državo nastavili na primer v Nemčijo (DE), nato nepremičnine iz drugih držav s podobnimi imeni regij ne bodo prikazane. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Omogoči/onemogoči vnos zvezdic v obrazec. Zavedajte se, da če ste na zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_stars na seznamu argumentov ne bo imela učinka. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Omogoči/onemogoči vnos zvezdic v obrazec. Upoštevajte, da če ste na zavihku Sestavljene nastavitve iskanja Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_price na seznamu argumentov ne bo imela učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Omogoči/onemogoči vnos lastnosti lastnosti v obrazec. Upoštevajte, da če ste v zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_features na seznamu argumentov ne bo imela učinka . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Omogoči/onemogoči vnos države v obrazec. Zavedajte se, da če ste na zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_country na seznamu argumentov ne bo imela učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Omogoči/onemogoči vnos regije v obrazcu. Zavedajte se, da če ste na zavihku Sestavljene nastavitve iskanja Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_region na seznamu argumentov ne bo imela učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Omogoči/onemogoči vnos mesta v obrazcu. Zavedajte se, da če ste na zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_town na seznamu argumentov ne bo imela učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Omogoči/onemogoči vnos vrste sobe v obrazcu. Upoštevajte, da če ste na zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_roomtype ne bo imela učinka na seznamu argumentov . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Omogoči/onemogoči vnos vrste lastnosti v obrazcu. Zavedajte se, da če ste na zavihku Sestavljene nastavitve iskanja Ajax v nastavitvah spletnega mesta nastavili možnost, nastavitev na seznamu argumentov ne bo imela učinka v seznamu lastnosti. . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Omogoči/onemogoči vnos številk gostov v obrazec. Zavedajte se, da če ste na zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_guestnumber ne bo imela učinka na seznamu argumentov . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Omogoči/onemogoči vnos datuma v obrazec. Zavedajte se, da če ste na zavihku Sestavljene nastavitve Ajax v konfiguraciji spletnega mesta nastavili možnost na Ne, potem nastavitev asc_by_date na seznamu argumentov ne bo imela učinka. ");


