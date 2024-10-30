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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE', "Ajax Search Composite");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS', "Sök med stjärnor");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES', "Sök efter priser");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES', "Sök efter funktioner");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY', "Sök efter land");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION', "Sök efter region");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN', "Sök efter stad");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE', "Sök efter rumstyp");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE', "Sök efter egenskapstyp");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER', "Sök efter gästnummer");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES', "Sök efter datum");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE', "mallstil");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Standard: Oftast enkla kryssrutor eller knappar om de finns i Bootstrap. Modaler: Knappar öppnas så att användare kan välja sökfilter. Dragspel designat överst på sidan, områden glider ner för att avslöja filter. Knappar: Knappar avslöja filter. ");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS', "Knappar (vertikal orientering)");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS', "Modaler (vertikal orientering) Endast bootstrap.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION', "Dragspel (horisontell orientering) Bootstrap bara.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT', "Multiselect (horizontal orientation) Bootstrap only.");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS', "Visa filter");
jr_define ('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS', "Dölj filter");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Använder ajax -sökramen. Gör att du kan placera en sökmodul som erbjuder sökning efter tillgänglighet, prisklass, egenskaper, egenskapstyp, rumstyp, gästnummer, stjärnor, land, region och stad i en sidofält eller översta fältet. Observera att exemplet som visas här inte fungerar eftersom några av argumenten avbryter varandra, välj precis vad du behöver från de tillgängliga argumenten (förutom det obligatoriska argumentet). Den här kortkoden skiljer sig lite från de flesta andra kortkoder eftersom det måste åtföljas av en särskild div efter kortnummerdeklarationen med ett id för asamodule_search_results som är där pluginet placerar den returnerade listan över egenskaper. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN', "Obligatoriskt. Argument måste vara ajax_search_composite");
jr_define ( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "sökfält stil. Alternativen är knappar modals dragspel Multiselect Om inte satt då plugin kommer att använda alternativet cofigured i Site Konfiguration. Markera flera / Dragspel är idealiska för horisontell visning, de två andra alternativen är bäst för placering i en sidofält. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS', "Visa sökformuläret om siduppgiften är inställd på viewproperty (egendomsinformationssidan). 0 för Nej, 1 för Ja.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Förfiltrering är där du bara väljer de egenskaper som uppfyller förfiltervillkoret kan visas i sökresultaten. Förfiltrera efter egenskap uid, så endast vissa egenskaper kan visas i sökresultaten. kommaseparerad lista över fastighets -uids ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES', "Förfiltrera efter egenskapstyp, så bara egenskaper av denna/dessa typer kan visas i sökresultaten. Argument är en kommaseparerad lista med egenskapstyps-id:");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY', "Förfiltrera efter landskod, så endast fastigheter i dessa länder kan visas i sökresultaten. Argument är en kommaseparerad lista med ISO-landskoder.");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION', "Förfiltrera efter regionnamn, så bara egenskaper i dessa regioner kan visas i sökresultaten. Argument är en kommaseparerad lista med regionnamn och måste matcha regioner som lagras i databasen. Om du ställer in landet till exempel Tyskland (DE) så visas inte fastigheter från andra länder med liknande regionnamn. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "Aktivera/inaktivera stjärninmatningen i formuläret. Tänk på att om du har angett ett alternativ via fliken Ajax -sammansatta inställningar i platskonfiguration till nej, kommer inställningen asc_by_stars inte att ha effekt i listan med argument. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "Aktivera/inaktivera stjärninmatningen i formuläret. Var medveten om att om du har angett ett alternativ via fliken Ajax -sammansatta inställningar i platskonfiguration till nej, kommer inställningen asc_by_price att ha ingen effekt i argumentlistan. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "Aktivera/inaktivera egenskapens inmatning i formuläret. Var medveten om att om du har ställt in ett alternativ via Ajax -sökningssammansatta flikar i webbplatskonfiguration till ingen, kommer inställningen asc_by_features inte att ha effekt i_listan kommer inte att ha effekt i listan har ingen effekt . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "Aktivera/inaktivera landinmatningen i formuläret. Tänk på att om du har ställt in ett alternativ via fliken Ajax -sammansatta inställningar i platskonfiguration till ingen, kommer inställningen asc_by_country inte att ha effekt i listan. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "Aktivera/inaktivera Region -ingången i formuläret. Tänk på att om du har ställt in ett alternativ via fliken Ajax -sökningssammansatta inställningar i platskonfiguration till ingen, kommer inställningen asc_by_region inte att ha någon effekt i listan över argument. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "Aktivera/inaktivera Town -ingången i formuläret. Var medveten om att om du har ställt in ett alternativ via fliken Ajax -sökningssammansatta sidor i webbplatskonfiguration till ingen, kommer inställningen asc_by_town inte att ha någon effekt i argumentlistan. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "Aktivera/inaktivera inmatning av rumstyp i formuläret. Var medveten om att om du har ställt in ett alternativ via Ajax -sökningssammansatta flikar i platskonfiguration till Ingen, kommer inställningen asc_by_roomtype inte att ha effekt i_listan -typen har ingen effekt i_lista . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "Aktivera/inaktivera egenskapstypsinmatning i formuläret. Tänk på att om du har ställt in ett alternativ via fliken Ajax -sökningssammansatta inställningar i Sajtkonfiguration till ingen, kommer inställningen asc_by_inte att ha argentypen_justering i . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "Aktivera/inaktivera inmatning av gästnummer i formuläret. Tänk på att om du har ställt in ett alternativ via fliken Ajax -sammansatta inställningar i platskonfiguration till ingen, kommer inställningen asc_by_guestnum att ha ingen i_listan . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "Aktivera/inaktivera datuminmatningen i formuläret. Var medveten om att om du har ställt in ett alternativ via fliken Ajax -sökning i webbplatskonfiguration till Nej, kommer inställningen asc_by_date inte att ha effekt i listan med argument. ");