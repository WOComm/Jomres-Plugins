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
jr_define('_JRPORTAL_EXTENDED_MAPS_TITLE',"Rozszerzone mapy");
jr_define('_JRPORTAL_EXTENDED_MAPS_HWIDTH',"Szerokość mapy (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HHEIGHT',"Wysokość mapy (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL',"Poziom powiększenia mapy ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST',"Zastąpić domyślną listę właściwości Jomres? ");
jr_define('_JRPORTAL_EXTENDED_MAPS_HINFOICON',"Ikona znacznika innych wydarzeń/atrakcji");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH',"Szerokość wyskakujących okienek (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH',"Szerokość obrazu (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT',"Wysokość obrazu (px)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION',"Wyświetlić opis właściwości? (tylko dla wyskakujących okienek wynajmu)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION',"Opis właściwości przycinania? (tylko dla wyskakujących okienek wynajmu)");
jr_define('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE',"Przycinanie opisu właściwości po (znakach) (tylko dla wyskakujących okienek wypożyczeń)");
jr_define('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS',"Znaczniki grup");

jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Wyświetla mapę ze zbiorami właściwości i lokalnych wydarzeń/atrakcji." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Określ typy właściwości, które chcesz wyświetlić. Oddzielone przecinkami." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Pokaż właściwości? Ustaw na 0, aby zapobiec ich pokazywaniu." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Pokaż zdarzenia? Ustaw na 0, aby zapobiec ich pokazywaniu." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Pokaż atrakcje? Ustaw na 0, aby zapobiec ich pokazywaniu." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Kod ISO kraju. Użyj tej opcji, aby ograniczyć mapę do jednego kraju." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Ustaw identyfikator regionu, aby ograniczyć wyniki do właściwości w określonym regionie." );
jr_define( '_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Ustaw nazwę miasta, aby ograniczyć wyniki do właściwości w określonym mieście." );

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");
