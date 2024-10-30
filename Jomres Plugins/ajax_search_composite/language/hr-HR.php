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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Traži po zvijezdama");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Traži po cijenama");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Traži prema značajkama");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Traži po zemlji");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Traži po regijama");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Traži po gradu");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Traži prema vrsti sobe");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Traži prema vrsti svojstva");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Traži prema brojevima gostiju");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Traži po datumima");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Stil predloška");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Zadano: Uglavnom jednostavni potvrdni okviri ili gumbi ako su u Bootstrapu. Modaliteti: Gumbi se otvaraju kako bi korisnicima omogućili odabir filtara za pretraživanje. Harmonika dizajnirana za vrh stranice, područja se klize prema dolje kako bi se otkrili filtri. Višestruki odabir: Gumbi padaju otkrijte filtere. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Gumbi (okomita orijentacija)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modals (vertikalna orijentacija) samo Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Harmonika (vodoravna orijentacija) samo Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Višestruki odabir (vodoravna orijentacija) samo Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Prikaži filtre");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Sakrij filtere");


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Koristi okvir pretraživanja ajaxa. Omogućuje postavljanje modula za pretraživanje koji nudi pretraživanje dostupnosti, raspona cijena, značajki, vrste nekretnine, vrste sobe, brojeva gostiju, zvjezdica, zemlje, regije i grada na bočnoj traci ili gornju traku. Imajte na umu da ovdje prikazani primjer neće funkcionirati jer se neki argumenti međusobno poništavaju, odaberite samo ono što vam je potrebno od dostupnih argumenata (osim potrebnog argumenta). Ovaj kratki kôd malo se razlikuje od većine drugih kratki kodovi jer moraju biti popraćeni posebnim div -om nakon deklaracije kratkog koda s ID -om asamodule_search_results, gdje dodatak postavlja vraćeni popis svojstava. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obavezno. Argument mora biti ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Stil polja za pretraživanje. Opcije su gumbi modals harmonika višestruki odabir Ako nije postavljen, dodatak će koristiti opciju konfiguriranu u konfiguraciji web mjesta. Višestruki odabir/harmonika idealne su za horizontalni prikaz, ostale dvije opcije najbolje su za postavljanje u bočna traka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Prikaži obrazac za pretraživanje ako je stranica postavljena na viewproperty (stranica s pojedinostima o nekretnini). 0 za Ne, 1 za Da.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Predfiltriranje je mjesto gdje odabirete samo ona svojstva koja zadovoljavaju uvjete predfiltera mogu se prikazati u rezultatima pretraživanja. Prethodno filtrirajte prema svojstvu uid, pa se u rezultatima pretraživanja mogu prikazati samo neka svojstva. popis svojstava svojstava odvojenih zarezima ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Predfiltriraj prema vrsti svojstva, pa se samo svojstva ove/ovih vrsta mogu prikazati u rezultatima pretraživanja. Argumenti su popis ID-ova vrsta svojstava odvojenih zarezima.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Predfiltriraj prema kodu zemlje, tako da se samo svojstva u tim zemljama mogu prikazati u rezultatima pretraživanja. Argumenti su popis ISO oznaka zemalja.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Predfiltrirajte prema nazivu regije, tako da se samo svojstva u tim regijama mogu prikazati u rezultatima pretraživanja. Argumenti su zarezima odvojeni nazivi regija i moraju se podudarati s regijama pohranjenima u bazi podataka. Ako postavite državu na, na primjer, Njemačku (DE), a zatim se ne prikazuju nekretnine iz drugih zemalja sa sličnim nazivima regija. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Omogući/onemogući unos zvjezdica u obrazac. Imajte na umu da ako ste postavili opciju putem kartice Ajax pretraživanja kompozitnih postavki u konfiguraciji web stranice na Ne, tada postavljanje asc_by_stars na popisu argumenata neće imati učinka. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Omogući/onemogući unos zvjezdica u obrazac. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u Konfiguraciji web stranice na Ne, tada postavljanje asc_by_price na popisu argumenata neće imati učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Omogući/onemogući unos značajki Svojstva u obrazac. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u Konfiguraciji web stranice na Ne, tada postavka asc_by_features neće imati učinka na popisu argumenata . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Omogućite/onemogućite unos zemlje u obrazac. Imajte na umu da ako ste postavili opciju putem kartice Ajax pretraživanja kompozitnih postavki u konfiguraciji web stranice na Ne, tada postavljanje asc_by_country na popisu argumenata neće imati učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Omogući/onemogući unos regije u obrascu. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u konfiguraciji web stranice na Ne, tada postavljanje asc_by_region na popisu argumenata neće imati učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Omogući/onemogući unos grada u obrascu. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u Konfiguraciji web stranice na Ne, tada postavljanje asc_by_town na popisu argumenata neće imati učinka. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Omogući/onemogući unos vrste sobe u obrascu. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u konfiguraciji web stranice na Ne, tada postavka asc_by_roomtype neće imati učinak s popisa argumenata . ");
jr_define ( "_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE", "Omogućavanje / onemogućavanje nekretnine unos upišite u obrazac. Budite svjesni da, ako ste postavili opciju preko Ajax traži kompozitni karticu Postavke u web konfiguraciju na Ne zatim postavljanje asc_by_propertytype na popisu argumenata neće imati nikakvog učinka . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Omogućite/onemogućite unos brojeva gostiju u obrazac. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u Konfiguraciji web stranice na Ne, tada postavka asc_by_guestnumber neće imati učinka u popisu argumenata . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Omogući/onemogući unos datuma u obrazac. Imajte na umu da ako ste postavili opciju putem Ajaxove kartice za pretraživanje kompozitnih postavki u konfiguraciji web stranice na Ne, tada postavljanje asc_by_date na popisu argumenata neće imati učinka. ");
