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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Hľadanie podľa hviezd");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Hľadanie podľa cien");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Hľadať podľa funkcií");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Hľadať podľa krajiny");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Hľadať podľa regiónu");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Hľadať podľa mesta");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Hľadať podľa typu miestnosti");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Hľadať podľa typu vlastnosti");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Hľadať podľa čísel hostí");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Hľadať podľa dátumov");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "štýl šablóny");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Predvolené: Väčšinou jednoduché začiarkavacie políčka alebo tlačidlá, ak sú v Bootstrap. Modály: Tlačidlá sú otvorené, aby si užívatelia mohli vybrať filtre pre vyhľadávanie. Akordeón navrhnutý pre hornú časť stránky, oblasti posunutím nadol odhalia filtre. Multiselekt: rozbaľovacia ponuka tlačidiel pre odhaliť filtre. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Tlačidlá (vertikálna orientácia)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modály (vertikálna orientácia) Len bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Akordeón (horizontálna orientácia) iba bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Viacnásobný výber (horizontálna orientácia) Len bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Zobraziť filtre");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Skryť filtre");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Používa rámec vyhľadávania ajax. Umožňuje umiestniť vyhľadávací modul, ktorý ponúka vyhľadávanie na základe dostupnosti, cenového rozpätia, funkcií, typu nehnuteľnosti, typu miestnosti, počtu hostí, hviezdičiek, krajiny, regiónu a mesta na bočnom paneli. alebo horný pruh. Upozorňujeme, že tu uvedený príklad nebude fungovať, pretože niektoré argumenty sa navzájom rušia. Vyberte si z dostupných argumentov (okrem požadovaného argumentu) práve to, čo potrebujete. Tento krátky kód sa od väčšiny ostatných trochu líši shortcodes, pretože musí byť doplnený špeciálnym div po deklarácii shortcode s ID asamodule_search_results, kde plugin umiestni vrátený zoznam vlastností. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Povinné. Argument musí byť ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE' , "Štýl vyhľadávacích polí. Možnosti sú tlačidlá modálne akordeónový viacnásobný výber Ak nie je nastavený, doplnok bude používať možnosť konfigurovanú v konfigurácii webu. Multiselekt/akordeón sú ideálne pre horizontálne zobrazenie, ostatné dve možnosti sú najlepšie pre umiestnenie v bočný panel. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Zobraziť vyhľadávací formulár na stránke, ak je úloha stránky nastavená na zobrazenie vlastníctva (stránka s podrobnosťami o vlastnosti). 0 pre Nie, 1 pre Áno.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Predfiltrovanie je miesto, kde vyberiete iba tie vlastnosti, ktoré spĺňajú podmienku predfiltra, sa môžu zobraziť vo výsledkoch vyhľadávania. Predbežný filter podľa vlastnosti uid, takže vo výsledkoch vyhľadávania je možné zobraziť len niektoré vlastnosti Ar. čiarkami oddelený zoznam vlastností použitia ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Predfiltrovať podľa typu vlastnosti, takže vo výsledkoch vyhľadávania sa môžu zobrazovať iba vlastnosti tohto/týchto typov. Argumenty sú zoznamom identifikátorov typov vlastností oddelených čiarkami.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Predfiltrovať podľa kódu krajiny, takže vo výsledkoch vyhľadávania sa môžu zobrazovať iba vlastnosti v týchto krajinách. Argumenty sú zoznamom kódov krajín ISO oddelených čiarkami.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Predfiltrovať podľa názvu oblasti, takže vo výsledkoch vyhľadávania je možné zobraziť iba vlastnosti v týchto oblastiach. Argumenty sú zoznamom názvov regiónov oddelených čiarkami a musia zodpovedať regiónom, ako sú uložené v databáze. Ak nastavíte krajinu napríklad na Nemecko (DE), potom sa vlastnosti z iných krajín s podobnými názvami regiónov nezobrazia. ");
    
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Povoliť/Zakázať vstup Stars vo formulári. Uvedomte si, že ak ste nastavili možnosť na karte zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nebude mať nastavenie asc_by_stars v zozname argumentov žiadny účinok. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Povolenie/Zakázanie vstupu hviezdičky vo formulári. Uvedomte si, že ak ste nastavili možnosť na karte zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nebude mať nastavenie asc_by_price v zozname argumentov žiadny účinok. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Povoliť/Zakázať vstup vlastností objektu vo formulári. Uvedomte si, že ak ste nastavili možnosť prostredníctvom karty zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nastavenie parametra asc_by_features v zozname argumentov . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY' ,  "Povoliť/Zakázať vstup krajiny vo formulári. Uvedomte si, že ak ste nastavili možnosť prostredníctvom karty zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nastavenie zoznamu asc_by_country nebude mať žiadny účinok. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Povoliť/Zakázať vstup regiónu vo formulári. Uvedomte si, že ak ste nastavili možnosť na karte zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nastavenie zoznamu asc_by_region nebude mať žiadny vplyv. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Povolenie/Zakázanie vstupu mesta vo formulári. Uvedomte si, že ak ste nastavili možnosť prostredníctvom karty zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nebude mať nastavenie asc_by_town v zozname argumentov žiadny účinok. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Povoliť/Zakázať vstup typu Izba vo formulári. Uvedomte si, že ak ste nastavili možnosť prostredníctvom karty kompozitných nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nastavenie parametra asc_by_roomtype nebude mať žiadny vplyv na zoznam. . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Povoliť/Zakázať vstup typu vlastnosti vo formulári. Uvedomte si, že ak ste nastavili možnosť prostredníctvom karty kompozitných nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom bude mať parameter asc_by_property . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Povolenie/Zakázanie zadávania čísel hostí vo formulári. Uvedomte si, že ak ste nastavili možnosť prostredníctvom karty zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nastavenie asc_by_guestnumber v zozname argumentov . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Povoliť/Zakázať zadávanie dátumu vo formulári. Uvedomte si, že ak ste nastavili možnosť na karte zložených nastavení vyhľadávania Ajax v Konfigurácii stránky na Nie, potom nebude mať nastavenie asc_by_date v zozname argumentov žiadny účinok. ");