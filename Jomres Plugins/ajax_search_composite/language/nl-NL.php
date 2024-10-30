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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################


jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax zoekcomposiet");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Zoeken op sterren");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Zoeken op prijs");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Zoeken op kenmerken");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Zoeken op land");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Zoeken op regio");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Zoeken op stad");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Zoeken op kamertype");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Zoeken op eigenschapstype");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Zoeken op gastnummers");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Zoeken op datum");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Sjabloonstijl");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Standaard : Meestal eenvoudige selectievakjes of knoppen in Bootstrap. Modals : Knoppen openen zodat gebruikers zoekfilters kunnen selecteren. Accordeon ontworpen voor bovenaan de pagina, gebieden schuiven naar beneden om filters weer te geven. filters onthullen.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Knoppen (verticale oriëntatie)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modals (verticale oriëntatie) Alleen Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Accordeon (horizontale oriëntatie) Alleen Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Multiselect (horizontale oriëntatie) Alleen Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Toon filters");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Verberg filters");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Gebruikt het ajax zoekraamwerk. Hiermee kunt u een zoekmodule plaatsen die het zoeken op beschikbaarheid, prijsklasse, kenmerken, woningtype, kamertype, gastnummers, sterren, land, regio en stad in een zijbalk biedt of bovenste balk. Houd er rekening mee dat het hier getoonde voorbeeld niet zal werken omdat sommige van de argumenten elkaar opheffen, kies precies wat je nodig hebt uit de beschikbare argumenten (behalve het vereiste argument). Deze shortcode is een beetje anders dan de meeste andere shortcodes omdat het vergezeld moet gaan van een speciale div na de shortcode-declaratie met een id van asamodule_search_results, waar de plug-in de geretourneerde lijst met eigenschappen plaatst.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Vereist. Argument moet ajax_search_composite zijn");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Zoekvelden stijl. Opties zijn knoppen modals accordeon multiselect Indien niet ingesteld, zal de plug-in de optie gebruiken die is geconfigureerd in Siteconfiguratie. Multiselect/Accordeon zijn ideaal voor horizontale weergave, de andere twee opties zijn het beste voor plaatsing in een zijbalk.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Toon het zoekformulier op de als de paginataak is ingesteld op viewproperty (de pagina met eigenschappendetails). 0 voor Nee, 1 voor Ja.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Voorfiltering is waar u kiest dat alleen die eigenschappen die voldoen aan de prefiltervoorwaarde in de zoekresultaten getoond kunnen worden. Prefilter op eigenschap uid, zodat alleen bepaalde eigenschappen in de zoekresultaten kunnen worden getoond. Argumenten zijn een door komma's gescheiden lijst van property-uids");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Pre-filter op eigenschapstype, zodat alleen eigenschappen van dit/deze typen in de zoekresultaten kunnen worden getoond. Argumenten zijn een door komma's gescheiden lijst van eigenschapstype-id's.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Pre-filter op landcode, zodat alleen woningen in deze landen in de zoekresultaten kunnen worden getoond. Argumenten zijn een door komma's gescheiden lijst van ISO-landcodes.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Pre-filter op regionaam, , zodat alleen eigenschappen in deze regio's in de zoekresultaten kunnen worden weergegeven. Argumenten zijn een door komma's gescheiden lijst van regionamen en moeten overeenkomen met regio's zoals opgeslagen in de database. Als u stelt het land in op bijvoorbeeld Duitsland (DE), dan worden woningen uit andere landen met vergelijkbare regionamen niet weergegeven.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Schakel de invoer van sterren in/uit in het formulier. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_stars in de lijst met argumenten geen effect heeft. ");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Schakel de invoer van sterren in/uit in het formulier. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_price in de lijst met argumenten geen effect heeft. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Enable/Disable the Property features input in the form. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_features in de lijst met argumenten geen effect heeft .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"De Land-invoer in het formulier in-/uitschakelen. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_country in de lijst met argumenten geen effect heeft. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"De regio-invoer in het formulier in-/uitschakelen. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_region in de lijst met argumenten geen effect heeft. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"De invoer van de stad in het formulier in-/uitschakelen. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_town in de lijst met argumenten geen effect heeft. ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"De invoer van het kamertype in het formulier in-/uitschakelen. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_roomtype in de lijst met argumenten geen effect heeft .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"De invoer van het eigenschapstype in het formulier in-/uitschakelen. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_propertytype in de lijst met argumenten geen effect heeft .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"In-/uitschakelen van de gastnummers die in het formulier worden ingevoerd. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_guestnumber in de lijst met argumenten geen effect heeft .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"De datuminvoer in het formulier in-/uitschakelen. Houd er rekening mee dat als u een optie via het tabblad Ajax-zoekcomposietinstellingen in Siteconfiguratie hebt ingesteld op Nee, het instellen van asc_by_date in de lijst met argumenten geen effect heeft. ");


