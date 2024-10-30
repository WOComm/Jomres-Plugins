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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Hledat podle hvězd");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Hledat podle cen");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Hledat podle funkcí");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Hledat podle země");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Hledat podle regionu");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Hledat podle města");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Hledat podle typu místnosti");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Hledat podle typu vlastnosti");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Hledat podle čísel hostů");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Hledat podle data");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Styl šablony");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Výchozí: Většinou jednoduchá zaškrtávací políčka nebo tlačítka, pokud jsou v Bootstrapu. Modály: Tlačítka otevřená, aby uživatelé mohli vybrat filtry pro vyhledávání. Akordeon navržený pro horní část stránky, oblasti posunutím dolů pro odhalení filtrů. Multiselect: rozevírací seznam tlačítek odhalit filtry. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Tlačítka (svislá orientace)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modals (svislá orientace) Bootstrap only.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Akordeon (horizontální orientace) Pouze bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (horizontální orientace) pouze bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Zobrazit filtry");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Skrýt filtry");


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Používá rámec hledání ajax. Umožňuje umístit vyhledávací modul, který nabízí vyhledávání na dostupnost, cenové rozpětí, funkce, typ nemovitosti, typ pokoje, čísla hostů, hvězdy, zemi, region a město na postranním panelu nebo horní lišta. Upozorňujeme, že zde uvedený příklad nebude fungovat, protože některé argumenty se navzájem ruší. Vyberte si z dostupných argumentů jen to, co potřebujete (kromě požadovaného argumentu). Tento krátký kód se od většiny ostatních trochu liší shortcodes, protože to musí být doprovázeno speciálním divem za deklarací shortcode s ID asamodule_search_results, kde plugin umístí vrácený seznam vlastností. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Povinné. Argument musí být 'ajax_search_composite'");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Styl vyhledávacích polí. Možnosti jsou tlačítka modální akordeonový multiselect Pokud není nastaven, pak plugin použije možnost konfigurovanou v Konfiguraci webu. Multiselect/Accordion jsou ideální pro horizontální zobrazení, další dvě možnosti jsou nejlepší pro umístění v postranní panel. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Zobrazit vyhledávací formulář na stránce, pokud je úloha stránky nastavena na viewproperty (stránka s podrobnostmi o vlastnosti). 0 pro Ne, 1 pro Ano.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Předfiltrování je místo, kde vyberete pouze ty vlastnosti, které splňují podmínku předfiltru, lze zobrazit ve výsledcích vyhledávání. Předfiltrujte podle vlastnosti uid, takže ve výsledcích hledání lze zobrazit pouze určité vlastnosti Ar. čárkou oddělený seznam vlastností uid ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Předfiltr podle typu vlastnosti, takže ve výsledcích vyhledávání lze zobrazit pouze vlastnosti tohoto/těchto typů. Argumenty jsou seznam ID typů vlastností oddělených čárkami.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Předfiltr podle kódu země, takže ve výsledcích vyhledávání lze zobrazit pouze vlastnosti v těchto zemích. Argumenty jsou seznam kódů zemí ISO oddělených čárkami.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION' , "Předfiltr podle názvu regionu, takže ve výsledcích hledání lze zobrazit pouze vlastnosti v těchto oblastech. Argumenty jsou seznam názvů regionů oddělený čárkami a musí odpovídat regionům uloženým v databázi. Pokud nastavíte zemi například na Německo (DE), pak se vlastnosti z jiných zemí s podobnými názvy oblastí nezobrazí. ");
    

 jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Enable/Disable the Stars input in the form. Buďte si vědomi toho, že pokud jste nastavili možnost pomocí karty Ajax search composite settings tab in Site Site to No, pak nastavení 'asc_by_stars' v seznamu argumentů účinek.");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Enable/Disable the Stars input in the form. Buďte si vědomi toho, že pokud jste nastavili možnost pomocí karty Ajax search kompozitní nastavení nastavení v Site Configuration na No, pak nastavení 'asc_by_price' v seznamu argumentů bude mít účinek.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Povolit/Zakázat vstup vlastností služby ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku nastavení kompozitního vyhledávání Ajaxu v Konfiguraci webu na Ne, pak nastavení 'asc_by_features bude mít v argumentech žádný efekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Povolit/Zakázat vstup země ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku nastavení kompozitního vyhledávání Ajax v Konfigurace webu na Ne, pak nastavení 'asc_by_country' v seznamu argumentů účinek.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Povolit/Zakázat vstup regionu ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku nastavení kompozitního vyhledávání Ajax v Konfiguraci webu na Ne, pak nastavení 'asc_by_region' v seznamu argumentů bude mít účinek.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Povolit/Zakázat vstup města ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku nastavení kompozitního vyhledávání Ajax v Konfiguraci webu na Ne, pak nastavení 'asc_by_town' v seznamu argumentů nebude mít účinek.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Povolit/Zakázat vstup typu Room ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku Kompositní nastavení vyhledávání Ajax v Konfigurace webu na Ne, pak nastavení 'asc_by_roomtype' v žádný efekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Povolit/Zakázat vstup typu vlastnosti ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku složeného nastavení vyhledávání Ajax v Konfigurace webu na Ne, pak nastavíte 'asc_by_property žádný efekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Povolit/Zakázat zadávání čísel hostů ve formuláři. Uvědomte si, že pokud jste nastavili možnost přes záložku složeného nastavení vyhledávání Ajax v Konfigurace webu na Ne, pak nastavení 'asc_by_guestnumber' v žádný efekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Enable/Disable the Date input in the form. Buďte si vědomi toho, že pokud jste nastavili možnost prostřednictvím karty Ajax search kompozitní nastavení nastavení v Site Configuration na No, pak nastavení 'asc_by_date' v seznamu argumentů nebude mít účinek.");
    