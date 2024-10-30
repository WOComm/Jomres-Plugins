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
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax Search Composite");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Suche nach Sternen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Nach Preisen suchen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Suche nach Funktionen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Suche nach Land");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Suche nach Region");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Nach Stadt suchen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Nach Zimmertyp suchen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Suche nach Eigenschaftstyp");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Suche nach Gastnummern");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Nach Datum suchen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Vorlagenstil");
jr_define ( '_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC', "Default: Meistens einfache Kontrollkästchen oder Schaltflächen, wenn in Bootstrap Modals:.. Buttons öffnen, damit Benutzer Suchfilter wählen Akkordeon entworfen für oben auf der Seite, Flächen nach unten rutschen Filter offenbaren Mehrfachauswahl:. Buttons Dropdown-Liste Filter aufdecken.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Schaltflächen (vertikale Ausrichtung)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modals (vertikale Ausrichtung) nur Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Akkordeon (horizontale Ausrichtung) nur Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Multiselect (horizontale Ausrichtung) nur Bootstrap.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Filter anzeigen");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Filter ausblenden");


jr_define ( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO', "Verwendet die Ajax-Such-Framework. Damit können Sie ein Suchmodul platzieren, dass Angebote auf Verfügbarkeit, Preisbereich, Eigenschaften, Objekttyp, Zimmertyp, Gäste-Zahlen, Sterne, Land, Region und Stadt in einer Sidebar Suche Bitte beachten Sie, dass das hier gezeigte Beispiel nicht funktioniert, da sich einige der Argumente gegenseitig aufheben, wählen Sie aus den verfügbaren Argumenten genau das aus, was Sie benötigen (außer dem erforderlichen Argument). Dieser Shortcode unterscheidet sich ein wenig von den meisten anderen. Shortcodes, da sie von einem speziellen div nach der Shortcode-Deklaration mit einer ID von asamodule_search_results begleitet werden müssen, wo das Plugin die zurückgegebene Liste der Eigenschaften platziert.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Erforderlich. Argument muss 'ajax_search_composite' sein");
jr_define ( '_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE', "Suchen Felder Stil. Die Optionen sind Tasten modals Akkordeon Mehrfachauswahl Wenn nicht, dann das Plugin gesetzt wird die Option in Site Configuration cofigured verwenden. Mehrfachauswahl / Akkordeon sind ideal für horizontale Anzeige, die beiden anderen Optionen sind am besten für die Platzierung in eine Seitenleiste.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Zeige das Suchformular auf der Seite an, wenn die Seitenaufgabe auf viewproperty eingestellt ist ( die Eigenschaftsdetailseite ). 0 für Nein, 1 für Ja.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Vorfilterung ist, wo Sie nur die Eigenschaften auswählen, die die Vorfilterbedingung erfüllen, können in den Suchergebnissen angezeigt werden. Vorfiltern nach Eigenschafts-UID, sodass nur bestimmte Eigenschaften in den Suchergebnissen angezeigt werden können. Argumente sind a durch Kommas getrennte Liste von Eigenschafts-UIDs");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Vorfiltern nach Eigenschaftstyp, damit nur Eigenschaften dieses/dieser Typen in den Suchergebnissen angezeigt werden können. Argumente sind eine durch Kommas getrennte Liste von Eigenschaftstyp-IDs.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Vorfilter nach Ländercode, damit nur Immobilien in diesen Ländern in den Suchergebnissen angezeigt werden können. Argumente sind eine kommagetrennte Liste von ISO-Ländercodes.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Vorfiltern nach Regionsnamen, , damit nur Eigenschaften in diesen Regionen in den Suchergebnissen angezeigt werden können. Argumente sind eine durch Kommas getrennte Liste von Regionsnamen und müssen mit Regionen übereinstimmen, wie sie in der Datenbank gespeichert sind Wenn Sie das Land beispielsweise auf Deutschland (DE) einstellen, werden Immobilien aus anderen Ländern mit ähnlichen Regionsnamen nicht angezeigt.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Aktivieren/Deaktivieren der Sterne-Eingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Suche zusammengesetzte Einstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung asc_by_stars in der Argumentliste keine Wirkung.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Aktivieren/Deaktivieren der Sterne-Eingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Suche zusammengesetzte Einstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung 'asc_by_price' in der Argumentliste keine Funktion hat Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Aktivieren/Deaktivieren der Eingabe der Eigenschaftsfunktionen im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Zusammengesetzte Einstellungen für die Ajax-Suche in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung asc_by_features in der Argumentliste keine Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Aktivieren/Deaktivieren der Ländereingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Suche zusammengesetzte Einstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung 'asc_by_country' in der Argumentliste keine hat Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Aktivieren/Deaktivieren der Region-Eingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Sucheinstellungen für zusammengesetzte Einstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung asc_by_region in der Argumentliste keine Funktion hat Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Aktivieren/Deaktivieren der Stadteingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Suche zusammengesetzte Einstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung 'asc_by_town' in der Argumentliste keine hat Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Enable/Disable the Room type input in the form. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax Search Composite Settings in Site Configuration auf No gesetzt haben, die Einstellung 'asc_by_roomtype' in der Argumentliste hat keine Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Aktivieren/Deaktivieren der Eigenschaftstyp-Eingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Zusammengesetzte Einstellungen für die Ajax-Suche in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung asc_by_propertytype in der Argumentliste enthalten ist keine Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Aktivieren/Deaktivieren der Eingabe von Gastnummern im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Sucheinstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung 'asc_by_guestnumber' . in der Argumentliste keine Wirkung.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Aktivieren/Deaktivieren der Datumseingabe im Formular. Beachten Sie, dass, wenn Sie eine Option über die Registerkarte Ajax-Suche zusammengesetzte Einstellungen in der Site-Konfiguration auf Nein gesetzt haben, die Einstellung asc_by_date in der Argumentliste keine hat Wirkung.");
