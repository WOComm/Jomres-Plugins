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
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Søg med stjerner");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Søg efter priser");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Søg efter funktioner");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Søg efter land");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Søg efter område");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Søg efter by");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Søg efter værelsestype");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Søg efter ejendomstype");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Søg efter gæstetal");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Søg efter datoer");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "Skabelonstil");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Standard: Mest enkle afkrydsningsfelter eller knapper, hvis de er i Bootstrap. Modaler: Knapper kan åbnes, så brugerne kan vælge søgefiltre. Harmonika designet til toppen af ​​siden, områder glider ned for at afsløre filtre. afsløre filtre. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Knapper (lodret retning)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modaler (lodret retning) kun bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Accordeon (vandret retning) kun bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (horizontal orientation) Bootstrap only.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Vis filtre");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Skjul filtre");


jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Bruger ajax -søgerammen. Giver dig mulighed for at placere et søgemodul, der tilbyder søgning efter tilgængelighed, prisklasse, funktioner, egenskabstype, værelsestype, gæstetal, stjerner, land, region og by i et sidebjælke eller øverste bjælke. Bemærk, at eksemplet vist her ikke fungerer, da nogle af argumenterne annullerer hinanden, vælg lige hvad du har brug for blandt de tilgængelige argumenter (undtagen det nødvendige argument). Denne kortkode er lidt anderledes end de fleste andre shortcodes, da det skal ledsages af en speciel div efter shortcode -erklæringen med et id for asamodule_search_results, hvor pluginet placerer den returnerede liste over egenskaber. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Påkrævet. Argumentet skal være 'ajax_search_composite'");
jr_define ( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Søg felter stil. Mulighederne er knapper modals harmonika multiselect Hvis ikke indstil derefter plugin vil bruge muligheden cofigured i Site Configuration. Multiselect / Accordion er ideelle til vandret visning, de to andre muligheder er bedst til placering i et sidebjælke. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Vis søgeformularen på hvis sideopgaven er indstillet til viewproperty (ejendomsoplysningssiden). 0 for Nej, 1 for Ja.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Forfiltrering er, hvor du kun vælger de egenskaber, der opfylder forfilterbetingelsen, kan vises i søgeresultaterne. Forfilter efter egenskab uid, så kun visse egenskaber kan vises i søgeresultaterne. kommasepareret liste over ejendoms -uids ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Forfiltrer efter egenskabstype, så kun egenskaber af denne/disse typer kan vises i søgeresultaterne. Argumenter er en kommasepareret liste over egenskabstype-id'er.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Forfiltrer efter landekode, så kun ejendomme i disse lande kan vises i søgeresultaterne. Argumenter er en kommasepareret liste over ISO-landekoder.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Forfiltrer efter regionnavn, så kun egenskaber i disse regioner kan vises i søgeresultaterne. Argumenter er en kommasepareret liste over regionsnavne og skal matche regioner, som er gemt i databasen. Hvis du indstiller landet til f.eks. Tyskland (DE), så bliver ejendomme fra andre lande med lignende regionsnavne ikke vist. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Aktiver/deaktiver input fra stjernerne i formularen. Vær opmærksom på, at hvis du har angivet en indstilling via fanen Ajax -sammensatte indstillinger i webstedskonfiguration til Nej, vil indstillingen 'asc_by_stars' ikke have i argumenterne listen effekt.");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Aktiver/deaktiver input fra stjernerne i formularen. Vær opmærksom på, at hvis du har angivet en mulighed via fanen Ajax -søgningssammensatte indstillinger i webstedskonfiguration til ingen, vil indstillingen 'asc_by_price' ikke have i argumenterne listen effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Enable/Disable the Property features input in the form. Vær opmærksom på, at hvis du har angivet en mulighed via fanen Ajax -søgningssammensatte indstillinger i Site Configuration til Ingen, vil indstillingen 'asc_by_feat' have 'asc_by_features' ingen effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Enable/Disable the Country input in the form. Vær opmærksom på, at hvis du har angivet en mulighed via fanen Ajax -søgningssammensatte indstillinger i Site Configuration til No, vil indstillingen 'asc_by_country' ikke have 'asc_by_country' i effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Aktiver/Deaktiver Region -input i formularen. Vær opmærksom på, at hvis du har angivet en indstilling via fanen Ajax -søgningssammensatte i Site Configuration til No, vil indstillingen 'asc_by_region' ikke have i argumenterne effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Aktiver/deaktiver Town -input i formularen. Vær opmærksom på, at hvis du har angivet en mulighed via fanen Ajax -søgningssammensatte i Site Configuration til No, vil indstillingen 'asc_by_town' ikke have i argumenterne listen effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Aktiver/deaktiver input af rumtype i formularen. Vær opmærksom på, at hvis du har angivet en indstilling via fanen Ajax -søgningssammensatte i Site Configuration til Ingen, vil indstillingen 'asc_by_roomtype' have 'asc_by_roomtype' ingen effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Aktiver/deaktiver egenskabstypen input i formularen. Vær opmærksom på, at hvis du har indstillet en indstilling via fanen Ajax -søgning sammensatte indstillinger i Site Configuration til Ingen derefter indstilling 'asc_ingen effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Enable/Disable the Guest numbers input in the form. Vær opmærksom på, at hvis du har angivet en indstilling via fanen Ajax -søgningssammensatte i Site Configuration til No, vil indstillingen 'asc_by_gunum' have 'asc_by_gunum ingen effekt.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Aktiver/deaktiver datoindtastningen i formularen. Vær opmærksom på, at hvis du har angivet en mulighed via fanen Ajax -søgningssammensatte indstillinger i webstedskonfiguration til ingen, vil indstillingen 'asc_by_date' ikke have i argumenterne listen effekt.");
