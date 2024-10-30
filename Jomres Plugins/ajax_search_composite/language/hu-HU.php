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
jr_define ('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITPRICES', "Árak manuális beállítása");
jr_define ('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITMINDAYS', "Állítsa be a minimális éjszakákat manuálisan");
jr_define ('_JOMRES_MICROMANAGE_PICKER_SETMINDAYS', "Minimális éjszakák beállítása");

jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_DOW', "Éjszakánkénti ár beállítása a hét napján");
jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_RATES', "Éjszakánkénti ár beállítása dátumtartomány szerint");
jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_MINDAYS', "Minimális éjszakák beállítása dátumtartomány szerint");

jr_define ('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_RATES', "A dátumválasztók és az árbevitel lehetővé teszik, hogy egy árat állítson be egy adott dátumtartományban. Válasszon ki egy kezdő és befejező dátumot, írjon be egy árat, majd kattintson az Éjszakai ár beállítása gombra.");
jr_define ('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_MINDAYS', "A dátumválasztók és a minimális éjszakák megadása lehetővé teszi, hogy egy értéket állítson be a minimális éjszakákhoz egy adott dátumtartományban. Válasszon kezdő és befejező dátumot, írjon be egy számot a minimális éjszakákhoz, majd kattintson a Beállítás gombra. minimum éjszakák ");

jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO', "Ezzel a legördülő menüvel válthat az egyes dátumok árainak beállítása, illetve az egyes dátumok minimális éjszakáinak beállítása között. Használhatja a hét napja szerinti választót, a dátumtartomány szerinti választót, vagy beállíthatja az árakat/minimális éjszakákat a dátumok kézi szerkesztése. ");
jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO_SMALL_VIEWPORT', "Ezzel a legördülő menüvel válthat az egyes dátumok árainak beállítása és az egyes dátumok minimális éjszakái között. Használhatja a dátumtartomány -választót, vagy beállíthatja az árakat/minimális éjszakákat a dátumok manuális szerkesztésével.") ;
jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR', "Árak vagy minimális éjszakák beállítása");

jr_define ('_JOMRES_MICROMANAGE_PICKER_BYDOW', "Minimális éjszakák beállítása a hét napjaira");
jr_define ('_JOMRES_MICROMANAGE_PICKER_BYDOW_INFO', "A hét napja mezők lehetővé teszik a minimális éjszakák számának beállítását egy adott hét napra, ha a hét napja gombra kattint, a hét minden napja a min éjszaka beállításra lesz állítva. ");


jr_define ('_JOMRES_MICROMANAGE_MANUALLY', "Manuálisan beállított árak/minimális éjszakák");
jr_define ('_JOMRES_MICROMANAGE_SET_PRICES', "Árak beállítása");
jr_define ('_JOMRES_MICROMANAGE_SET_MINDAYS', "Minimális éjszakák beállítása");

jr_define ('_JOMRES_MICROMANAGE_PRICE', "Éjszakánként");
jr_define ('_JOMRES_MICROMANAGE_MINDAYS', "Min éjszaka");
jr_define ('_JOMRES_MICROMANAGE_MAXDAYS', "Max éjszaka");

jr_define ('_JOMRES_MICROMANAGE_INTRO', "Itt hozhat létre tarifákat, amelyek az ingatlanban lévő szobatípusokhoz vannak társítva.");

jr_define ('_JOMRES_MICROMANAGE_BASIC_SETTINGS', "Leggyakrabban használt lehetőségek");

jr_define ('_JOMRES_MICROMANAGE_MODAL_BUTTON', "Utasítások");

jr_define ('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS', "Ha különböző árakat szeretne hozzáadni különböző számú vendéghez, akkor több szobatípust is létrehozhat minden szobatípushoz, és különböző min/max vendégek értékeket tartalmazhat ezekben a tarifákban.");

jr_define ('_JOMRES_MICROMANAGE_INFO', "Adjon nevet a tarifának, határozza meg az éjszakák maximális számát, valamint a foglalási űrlapon feltüntetett minimális és maximális vendégszámot a tarifa felajánlása előtt. A dátumválasztó panelen adhat hozzá árakat és a minimális éjszakák beállításait egy dátumtartományra, vagy közvetlenül szerkesztheti a bevitelt. Ha nem szeretné, hogy a tarifát egyáltalán felkínálják bizonyos dátumokon, hagyja az árat 0 -ra (nulla) ezeken a napokon. éjszakák különböző dátumokon, így ha hosszabb foglalásokat szeretne a fesztivál/konferencia hetek alatt, akkor beállíthatja, hogy a minimális éjszakák magasabbak legyenek ezekben az időszakokban. Ha személyenként és személyenként (PPPN) számol fel, engedélyezheti ezt a beállítást a Beállítások> Tulajdon menüpontban Konfiguráció> Tarifák és pénznem fül, majd hozza létre a kívánt vendégtípusokat a Beállítások> Vendégtípusok menüben. ");
    
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Keresés csillagok szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Keresés árak szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Keresés funkciók szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Keresés ország szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Keresés régió szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Keresés város szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Keresés szobatípus szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Keresés tulajdonság típusa szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Keresés vendégszámok alapján");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Keresés dátumok szerint");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Sablonstílus");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Alapértelmezett: Többnyire egyszerű jelölőnégyzetek vagy gombok, ha Bootstrap -ban vannak. Modálok: A gombok megnyílnak, hogy a felhasználók választhassanak keresési szűrőket. Az oldal tetejére tervezett harmonika, a területek lefelé csúsznak a szűrők megjelenítéséhez. Multiselect: Gombok legördülő listája felfedje a szűrőket. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Gombok (függőleges tájolás)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modálisok (függőleges tájolás) Csak rendszerindító.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Harmonika (vízszintes tájolás) Csak rendszerindító.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (vízszintes tájolás) Csak Bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Szűrők megjelenítése");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Szűrők elrejtése");


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Használja az ajax keresési keretrendszert. Lehetővé teszi egy keresési modul elhelyezését, amely az elérhetőségről, az árkategóriáról, a szolgáltatásokról, a szállás típusáról, a szobatípusról, a vendégszámról, a csillagokról, az országról, a régióról és a városról kínál egy oldalsávot vagy a felső sáv. Kérjük, vegye figyelembe, hogy az itt látható példa nem fog működni, mivel néhány argumentum kioltja egymást, a rendelkezésre álló argumentumok közül válassza ki, amire szüksége van (kivéve a kötelező argumentumot). Ez a rövid kód kissé eltér a legtöbb más argumentumtól rövid kódokat, mivel a rövid kódkivonat után speciális div -ot kell kísérnie, amelynek azonosítója asamodule_search_results, ahol a plugin elhelyezi a visszaadott tulajdonságlistát. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Kötelező. Az érvnek ajax_search_composite -nak kell lennie");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Keresési mezők stílusa. Az opciók gombok modal harmonika multiselect Ha nincs beállítva, akkor a bővítmény a Site Configurationban konfigurált opciót használja. A multiselect/Accordion ideális a vízszintes megjelenítéshez, a másik két lehetőség a legjobb az elhelyezéshez oldalsáv. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Mutassa a keresési űrlapot, ha az oldalfeladat nézettulajdonságra van állítva (a tulajdonság részletei oldal). 0 a Nem, 1 az Igen gombra.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Az előszűrés az, ahol csak azokat a tulajdonságokat választja ki, amelyek megfelelnek az előszűrő feltételének. a tulajdonság uidok vesszővel elválasztott listája ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Tulajdonságtípus szerinti előszűrés, így csak ennek/ezeknek a típusoknak a tulajdonságai jeleníthetők meg a keresési eredményekben. Az érvek a tulajdonságok azonosítóinak vesszővel elválasztott listája.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Előszűrés országkód szerint, így ezekben az országokban csak a tulajdonságok jeleníthetők meg a keresési eredmények között. Az érvek az ISO országkódok vesszővel elválasztott listája.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Előszűrés régiónév alapján, így ezekben a régiókban csak a tulajdonságok jeleníthetők meg a keresési eredményekben. Az argumentumok a régiók neveinek vesszővel elválasztott listája, és meg kell egyezniük az adatbázisban tárolt régiókkal. Ha az országot például Németországra (DE) állítja be, akkor más országok hasonló régiónevekkel rendelkező ingatlanjai nem jelennek meg. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Engedélyezze/tiltsa le a Stars bemenetet az űrlapon. Ne feledje, hogy ha beállítást adott meg az Ajax keresési összetett beállítások lapján a Webhely konfigurációban, akkor a Nem értékre állítja be az asc_by_stars beállítást. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Engedélyezze/tiltsa le a Stars bemenetet az űrlapon. Ne feledje, hogy ha beállítást adott meg az Ajax keresési összetett beállítások lapján a Webhely konfigurációban, akkor a Nem értékre, az asc_by_price értéknek nem lesz hatása. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Engedélyezze/tiltsa le a Tulajdonságok bevitelét az űrlapon. Ne feledje, hogy ha az Opciót az Ajax keresési összetett beállítások lapján a Nem beállítás értékre állította be, akkor az asc_by_features beállításnak nincs hatása az argumentumlistában . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Engedélyezze/tiltsa le az országbevitelt az űrlapon. Ne feledje, hogy ha beállítást adott meg az Ajax keresési összetett beállítások lapján a Webhelykonfiguráció értékben Nem, akkor az asc_by_country nem állítja be az argumentumlistát. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Engedélyezze/tiltsa le a Régió bemenetet az űrlapon. Ne feledje, hogy ha beállítást adott meg az Ajax keresési összetett beállítások lapján a Webhely konfigurációban, akkor a Nem értékre, az asc_by_region beállítás nem lesz érvényes. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Engedélyezze/tiltsa le a városbevitelt az űrlapon. Ne feledje, hogy ha az Opciót az Ajax keresési összetett beállításai lapon állította be a Nem beállításra, akkor az asc_by_town beállításnak nincs hatása. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Engedélyezze/tiltsa le a Szobatípus bevitelt az űrlapon. Ne feledje, hogy ha az Opciót az Ajax keresési összetett beállítások fülén a Nem beállítás értékre állította be, akkor az asc_by_roomtype beállításnak nincs hatása az argumentumok listájában . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Engedélyezze/tiltsa le a Tulajdonság típusa bevitelt az űrlapon. Ne feledje, hogy ha beállítást adott meg az Ajax keresési összetett beállítások lapján a Webhelykonfigurációban, akkor nem, akkor az asc_by_efactyt listában . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Engedélyezze/tiltsa le a vendégszámok bevitelét az űrlapon. Ne feledje, hogy ha az Opciót az Ajax keresési összetett beállítások lapon keresztül a Webhelykonfiguráció értékre állította Nem értékre, akkor állítsa be az asc_by_guestnumber parancsot . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Engedélyezze/tiltsa le a dátumbevitelt az űrlapon. Ne feledje, hogy ha az Opciót az Ajax keresési összetett beállításai lapon a Nem konfiguráción keresztül állította be, akkor az érvlistában az asc_by_date beállításnak nincs hatása. ");