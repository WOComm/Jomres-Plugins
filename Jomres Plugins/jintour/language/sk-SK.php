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

jr_define ('_JINTOUR_TITLE', "Správa prehliadok/aktivít");

jr_define ('_JINTOUR_PROFILES_TITLE', "Profily prehliadky/aktivity");
jr_define ('_JINTOUR_PROFILES_NEW', "Nový profil prehliadky/aktivity");
jr_define('_JINTOUR_PROFILES_DELETE',"Vymazať profil prehliadky/aktivity");

jr_define('_JINTOUR_PROFILE_TITLE',"Názov profilu");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "Popis");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Zadajte popis vašej túry/aktivity vrátane itinerára.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Dni v týždni");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Cena pre dospelých");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Detská cena");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Ak chcete vylúčiť možnosť, aby sa zobrazila v rezervačnom formulári, ponechajte cenu 0 (nulu)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Priestor pre dospelých");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Detské medzery");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Počet voľných miest na prehliadke/aktivite");
jr_define('_JINTOUR_PROFILE_START_DATE',"Začiatok sezóny");
jr_define ('_JINTOUR_PROFILE_END_DATE', "sezóna končí");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Po vytvorení profilu prehliadky/aktivity budete musieť generovať prehliadky/aktivity na základe nastavení tohto profilu. Vytvorte prehliadku/aktivitu a potom kliknite na ikonu zelenej šípky vedľa daného profilu, čím vytvoríte samotné zájazdy/aktivity. Po vytvorení zájazdov/aktivít budete môcť jednotlivé zájazdy/aktivity vymazať, ak si to želáte.");
jr_define ('_JINTOUR_PROFILE_GENERATE', "Generovanie výletov/aktivít");

jr_define('_JINTOUR_TOUR_TITLE',"Názov aktivity");
jr_define ('_JINTOUR_TOUR_DATE', "dátum");
jr_define('_JINTOUR_TOUR_ADULTS',"Dospelí");
jr_define('_JINTOUR_TOUR_KIDS',"Deti");
jr_define('_JINTOUR_TOUR_ITINERY',"Itinerár");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Vygenerované nové prehliadky");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Rezervácia zájazdu zrušená");
jr_define ('_JINTOUR_TOUR_SAVE_MESSAGE', "Generované nové zájazdy");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Momentálne dostupné priestory");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Nová rezervácia turné/ID zdroja");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Bola vykonaná nová rezervácia pre prehliadku/zdroj správcu. Ak chcete zobraziť stránku oblasti administrátora tejto prehliadky, pozrite si nasledujúci odkaz ");

jr_define('_JINTOUR_TITLE_CONFIG',"Konfigurácia integrovaných prehliadok Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Je celá inštalácia inštaláciou Jintour?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Ak toto nastavíte na Áno, potom všetky vlastnosti budú vlastnosťami prehliadky. Ak to nastavíte na Nie, po vytvorení nových nehnuteľností budete môcť mať vlastnosti typu Prehliadka aj Hotel/Apartmán. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Prehliadky");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Vyberte možnosť zájazdov, ak ponúkate rezervácie položiek, ktoré sú dostupné v určité dátumy (napr. zájazdy, lístky na koncert.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Zobraziť vstupné pole odchodu?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Nastavte toto na Áno, ak chcete zobraziť dátum príchodu aj odchodu. Toto by bolo užitočné, ak ponúkate autobusové výlety, letenky atď., kde potrebujete poznať dátumy príchodu aj odchodu, zobrazenie dátumu odchodu vám umožňuje ponúkať zdroje vo viacerých dátumoch, zatiaľ čo s nastavením nastaveným na Nie je možné akceptovať len rezervácie na jeden dátum.");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Zoznam zájazdov");