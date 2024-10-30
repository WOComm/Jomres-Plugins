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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Søk etter stjerner");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Søk etter priser");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Søk etter funksjoner");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Søk etter land");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Søk etter region");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Søk etter by");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Søk etter romtype");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Søk etter eiendomstype");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Søk etter gjestetall");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Søk etter datoer");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "malstil");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Standard: Stort sett enkle avmerkingsbokser eller knapper hvis de er i Bootstrap. Modaler: Knapper kan åpnes slik at brukerne kan velge søkefiltre. Trekkspill designet for toppen av siden, områder skyves ned for å vise filtre. Knapper ned: Knapper avsløre filtre. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Knapper (vertikal retning)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modals (vertical vertical)) Bootstrap only.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Trekkspill (horisontal orientering) bare bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (horizontal orientation) Bootstrap only.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Vis filtre");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Skjul filtre");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Bruker ajax -søkerammen. Lar deg plassere en søkemodul som tilbyr søk etter tilgjengelighet, prisklasse, funksjoner, eiendomstype, romtype, gjestenummer, stjerner, land, region og by i et sidefelt eller topplinje. Vær oppmerksom på at eksemplet som vises her ikke vil fungere ettersom noen av argumentene avbryter hverandre, velg akkurat det du trenger fra de tilgjengelige argumentene (bortsett fra det nødvendige argumentet). Denne kortkoden er litt annerledes enn de fleste andre kortkoder ettersom det må ledsages av en spesiell div etter kortnummerdeklarasjonen med en id for asamodule_search_results som er der pluginet plasserer den returnerte listen over egenskaper. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obligatorisk. Argument må være ajax_search_composite");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Søk i feltstil. Alternativer er knapper modaler trekkspill multiselect Hvis det ikke er angitt, bruker pluginet alternativet som er konfigurert i nettstedskonfigurasjon. Multiselect/trekkspill er ideelt for horisontal visning, de to andre alternativene er best for horisontal visning, de to andre alternativene er best for horisontal visning. et sidefelt. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Vis søkeskjemaet på hvis sideoppgaven er satt til viewproperty (eiendomsdetaljesiden). 0 for Nei, 1 for Ja.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Forfiltrering er der du bare velger de egenskapene som tilfredsstiller forfilterbetingelsen, kan vises i søkeresultatene. Forfilter etter egenskap uid, så bare visse egenskaper kan vises i søkeordene. kommaseparert liste over eiendomsbruker ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Forfilter etter eiendomstype, så bare egenskaper av denne/disse typene kan vises i søkeresultatene. Argumenter er en kommaadskilt liste over egenskapstype-id-er.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Forfilter etter landskode, så bare eiendommer i disse landene kan vises i søkeresultatene. Argumenter er en kommaadskilt liste over ISO-landskoder.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Forfilter etter regionnavn, så bare eiendommer i disse områdene kan vises i søkeresultatene. Argumenter er en kommadelt liste over regionnavn og må matche regioner som er lagret i databasen. Hvis du setter landet til for eksempel Tyskland (DE), så blir eiendommer fra andre land med lignende regionnavn ikke vist. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Enable/Disable the Stars input in the form. Vær oppmerksom på at hvis du har angitt et alternativ via kategorien Ajax -søk i sammensatte innstillinger i Site Configuration til No, vil innstillingen asc_by_stars ikke ha noen effekt i argumentlisten. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Aktiver/Deaktiver Stars -inndata i skjemaet. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -fanen for sammensatte innstillinger i nettstedskonfigurasjon til Nei, vil innstillingen asc_by_price ha ingen. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Enable/Disable the Property features input in the form. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søkekomposittinnstillinger -fanen i nettstedskonfigurasjon til Nei, vil innstillingen asc_by_features ha effekt i . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Aktiver/Deaktiver Country -inngangen i skjemaet. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søkekomposittinnstillinger -fanen i Site Configuration til No, vil innstillingen asc_by_country ikke ha effekt i argumentene. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Aktiver/Deaktiver Region -inngangen i skjemaet. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søkekomposittinnstillinger -fanen i nettstedskonfigurasjon til Nei, vil innstillingen asc_by_region ikke ha noen i argumentlisten. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Aktiver/Deaktiver Town -inngangen i skjemaet. Vær oppmerksom på at hvis du har angitt et alternativ via fanen Ajax -søk i sammensatte innstillinger i Site Configuration til No, vil innstillingen asc_by_town ikke ha noen effekt i argumentlisten. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Aktiver/Deaktiver romtype -inngangen i skjemaet. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søkekomposittinnstillinger -fanen i Nettstedskonfigurasjon til Nei, vil innstillingen asc_by_roomtype ikke ha effekt i_listen . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Enable/Disable the Property type input in the form. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søk -sammensatte innstillinger -fanen i Site Configuration til No, vil innstillingen asc_by_have argentype . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Enable/Disable the Guest numbers input in the form. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søkekomposittinnstillinger -fanen i Site Configuration til No, vil innstillingen asc_by_guestnum ha . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Aktiver/deaktiver datoinndata i skjemaet. Vær oppmerksom på at hvis du har angitt et alternativ via Ajax -søkekomposittinnstillinger -fanen i nettstedskonfigurasjon til Nei, vil innstillingen asc_by_date ikke ha noen effekt i argumentlisten. ");