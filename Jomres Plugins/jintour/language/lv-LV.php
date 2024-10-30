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

jr_define('_JINTOUR_TITLE',"Tūrisma/aktivitātes vadība");

jr_define('_JINTOUR_PROFILES_TITLE',"Ceļojumu/darbību profili");
jr_define('_JINTOUR_PROFILES_NEW',"Jauns tūres/aktivitātes profils");
jr_define('_JINTOUR_PROFILES_DELETE',"Dzēst ekskursijas/aktivitātes profilu");

jr_define('_JINTOUR_PROFILE_TITLE',"Profila nosaukums");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Apraksts");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Ievadiet savas ekskursijas/aktivitātes aprakstu, tostarp tās maršrutu.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Nedēļas dienas");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define ('_JINTOUR_PROFILE_PRICE_ADULTS', "Pieaugušo cena");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS', "Bērna cena");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Lai izslēgtu opcijas parādīšanos rezervācijas formā, atstājiet cenu kā 0 (nulle)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Pieaugušajiem paredzētas vietas");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Bērnu atstarpes");
jr_define ('_JINTOUR_PROFILE_SPACES_INFO', "Ekskursijā/aktivitātē pieejamo vietu skaits");
jr_define ('_JINTOUR_PROFILE_START_DATE', "Sezonas sākums");
jr_define ('_JINTOUR_PROFILE_END_DATE', "Sezonas beigas");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Kad esat izveidojis ekskursijas/aktivitātes profilu, jums būs jāģenerē ekskursijas/darbības, pamatojoties uz šī profila iestatījumiem. Izveidojiet ceļvedi/aktivitāti, pēc tam noklikšķiniet uz zaļās bultiņas ikonas blakus šim profilam, lai izveidotu pašas ekskursijas/aktivitātes. Kad ekskursijas/aktivitātes būs izveidotas, varēsiet dzēst atsevišķas ekskursijas/aktivitātes, ja vēlēsieties.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Ģenerēt ekskursijas/aktivitātes");

jr_define('_JINTOUR_TOUR_TITLE',"Darbības nosaukums");
jr_define('_JINTOUR_TOUR_DATE',"Datums");
jr_define('_JINTOUR_TOUR_ADULTS',"Pieaugušie");
jr_define('_JINTOUR_TOUR_KIDS',"Bērni");
jr_define ('_JINTOUR_TOUR_ITINERY', "Maršruts");

jr_define ('_JINTOUR_TOUR_SAVE_AUDIT', "Ģenerētas jaunas ekskursijas");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Tūrisma rezervācija atcelta");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Izveidotas jaunas ekskursijas");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Šobrīd pieejamas vietas");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Jauna rezervācija ceļojumam/resursa ID");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Ir veikta jauna administratora ceļojuma/resursa rezervācija. Lūdzu, skatiet šo saiti, lai skatītu šīs ekskursijas administratora apgabala lapu ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours konfigurācija");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Vai visa instalācija ir Jintour instalācija?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Ja iestatīsiet šo vērtību uz Jā, tad visi īpašumi būs ceļojumu īpašumi. Ja iestatīsit uz Nē, tad, kad tiks izveidoti jauni īpašumi, jums būs pieejami gan ceļojuma, gan viesnīcas/dzīvokļu tipa īpašumi. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Tūres");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Izvēlieties ekskursiju opciju, ja piedāvājat rezervēt preces, kas ir pieejamas noteiktos datumos (piemēram, tūres, biļetes uz koncertu.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Rādīt izbraukšanas ievades lauku?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Iestatiet šo uz Jā, ja vēlaties parādīt gan ielidošanas, gan izlidošanas datumu. Tas būtu noderīgi, ja piedāvājat autobusu braucienus, lidmašīnu biļetes utt., kur jums jāzina gan ienākšanas, gan izbraukšanas datumi, izbraukšanas datuma parādīšana ļauj piedāvāt resursus vairākos datumos, savukārt, ja iestatījums ir iestatīts uz Nē, var pieņemt tikai rezervācijas vienam datumam.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Ekskursiju saraksts");