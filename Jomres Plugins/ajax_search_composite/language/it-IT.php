<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ricerca Ajax Composita");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Cerca per numero di stelle");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Cerca in base al prezzo");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Cerca per caratteristiche");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Cerca per nazione");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Cerca per regione");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Cerca per città");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Cerca per tipologia di camera");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Cerca per tipologia di struttura");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Cerca per numero di ospiti");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Cerca per date");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Stile Template");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Predefinito : Per lo più semplici caselle di controllo o pulsanti se in Bootstrap. Modali : I pulsanti si aprono per consentire agli utenti di selezionare i filtri di ricerca. Fisarmonica progettata per la parte superiore della pagina, le aree scorrono verso il basso per rivelare i filtri. Selezione multipla : Pulsanti a discesa per rivelare i filtri.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Pulsanti (orientamento verticale)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modali (orientamento verticale) Solo Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Fisarmonica (orientamento orizzontale) Solo Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Selezione multipla (orientamento orizzontale) Solo Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Mostra filtri");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Nascondi filtri");


jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Utilizza il framework di ricerca ajax. Consente di posizionare un modulo di ricerca che offre la ricerca per disponibilità, fascia di prezzo, caratteristiche, tipologia di struttura, tipologia di camera, numero di ospiti, stelle, paese, regione e città in una barra laterale o in alto. Si noti che l'esempio mostrato qui non funzionerà poiché alcuni degli argomenti si annullano a vicenda, scegli solo ciò di cui hai bisogno dagli argomenti disponibili (eccetto l'argomento richiesto). Questo shortcode è leggermente diverso dalla maggior parte degli altri shortcode in quanto deve essere accompagnato da un div speciale dopo la dichiarazione dello shortcode con un ID di asamodule_search_results in cui il plugin visualizzerà l'elenco delle strutture da restituire.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Necessario. L'argomento deve essere 'ajax_search_composite'");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Stile dei campi di ricerca. Le opzioni sono pulsanti modali fisarmonica multiselezione Se non impostato, il plugin utilizzerà l'opzione configurata in Configurazione Sito. Selezione multipla/Fisarmonica sono ideali per la visualizzazione orizzontale, le altre due opzioni sono le migliori per il posizionamento in una barra laterale.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Mostrare il modulo di ricerca se l'attività della pagina è impostata su viewproperty (la pagina dei dettagli della struttura). 0 per No, 1 per Sì.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Prefiltraggio è dove si scelgono solo le strutture che soddisfano la condizione di prefiltro e possono essere mostrate nei risultati della ricerca. Prefiltrare per ID della struttura, così solo alcune strutture possono essere visualizzate nei risultati di ricerca. Gli argomenti sono un elenco separato da virgole di ID di strutture");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Prefiltrare per tipologia di struttura, così possono essere visualizzate nei risultati di ricerca solo le strutture di determinate tipologie di struttura. Gli argomenti sono un elenco separato da virgole di ID di tipologie di struttura.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Prefiltrare per codice nazione, così possono essere visualizzate nei risultati di ricerca solo le strutture che si trovano in determinate nazioni. Gli argomenti sono un elenco separato da virgole di codici paese ISO.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Prefiltrare er nome regione, così possono essere visualizzate nei risultati di ricerca solo le strutture che si trovano in determinate regioni. Gli argomenti sono un elenco delimitato da virgole di nomi di regioni e devono corrispondere alle regioni memorizzate nel database. Se imposti il paese, ad esempio, Germania (DE), le strutture di altri paesi con nomi di regioni simili non verranno visualizzate.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Abilitare/Disabilitare l'inserimento delle stelle nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_stars\" nell'elenco degli argomenti non avrà alcun effetto.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Abilitare/Disabilitare l'inserimento dei prezzi nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_price\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Abilitare/Disabilitare l'inserimento delle caratteristiche della struttura nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_features\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Abilitare/Disabilitare l'inserimento della nazione nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_country\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Abilitare/Disabilitare l'inserimento della regione nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_region\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Abilitare/Disabilitare l'inserimento della città nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_town\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Abilitare/Disabilitare l'inserimento della tipologia di camera nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_roomtype\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Abilitare/Disabilitare l'inserimento della tipologia di struttura nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_propertytype\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Abilitare/Disabilitare l'inserimento del numero di ospiti nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_guestnumber\" nell'elenco degli argomenti non avrà alcun effetto.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Abilitare/Disabilitare l'inserimento della data nel modulo. Tieni presente che se hai impostato un'opzione tramite la scheda delle impostazioni Ricerca Ajax Composita in Configurazione Sito su No, l'impostazione di \"asc_by_date\" nell'elenco degli argomenti non avrà alcun effetto.");

