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
jr_define('_JINTOUR_TITLE',"Gestió de visites/activitats");

jr_define ('_JINTOUR_PROFILES_TITLE', "Perfils de gira / activitat");
jr_define('_JINTOUR_PROFILES_NEW',"Nou perfil de recorregut/activitat");
jr_define('_JINTOUR_PROFILES_DELETE',"Suprimeix el perfil del recorregut/activitat");

jr_define ('_JINTOUR_PROFILE_TITLE', "Títol del perfil");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Descripció");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Introduïu una descripció del vostre recorregut/activitat, inclòs el seu itinerari.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Dies de la setmana");
jr_define ('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO', "");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Preu per a adults");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Preu per a nens");
jr_define ('_JINTOUR_PROFILE_PRICE_KIDS_INFO', "Per excloure una opció que aparegui al formulari de reserva, deixeu el preu com a 0 (zero)");
jr_define ('_JINTOUR_PROFILE_SPACES_ADULTS', "Espais per a adults");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Espais secundaris");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"El nombre d'espais disponibles al recorregut/activitat");
jr_define('_JINTOUR_PROFILE_START_DATE',"Inici de temporada");
jr_define('_JINTOUR_PROFILE_END_DATE',"S'acaba la temporada");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Un cop hàgiu creat un perfil de recorregut/activitat, haureu de generar visites/activitats basades en la configuració d'aquest perfil. Creeu el recorregut/activitat i feu clic a la icona de fletxa verda al costat d'aquest perfil per crear el excursions / activitats pròpies. Un cop creades les visites / activitats, podreu suprimir excursions / activitats individuals si ho desitgeu. ");
jr_define ('_JINTOUR_PROFILE_GENERATE', "Generar excursions / activitats");

jr_define('_JINTOUR_TOUR_TITLE',"Títol de l'activitat");
jr_define('_JINTOUR_TOUR_DATE',"Data");
jr_define('_JINTOUR_TOUR_ADULTS',"Adults");
jr_define ('_JINTOUR_TOUR_KIDS', "Nens");
jr_define('_JINTOUR_TOUR_ITINERY',"Itinerari");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Visitades noves generades");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Reserva de viatge cancel·lada");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Nous recorreguts generats");
jr_define ('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE', "Espais disponibles actualment");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Nova reserva per a l'identificador del tour/recurs ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"S'ha fet una nova reserva per a un recorregut/recurs d'administrador. Si us plau, mireu l'enllaç següent per veure la pàgina de l'àrea d'administrador d'aquest recorregut ");

jr_define('_JINTOUR_TITLE_CONFIG',"Configuració de recorreguts integrats de Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"La instal·lació sencera és una instal·lació de Jintour?");
jr_define ('_JINTOUR_TITLE_WHOLESITE_DESC', "Si ho definiu com a Sí, totes les propietats seran propietats de visites. Si l'estableu a No, quan es creen propietats noves podreu tenir propietats de tipus Tour i Hotel / Apartament. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Tours");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Trieu l'opció d'excursions si esteu oferint reserves per a articles que estan disponibles en dates determinades (per exemple, gires, entrades per a un concert.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Mostrar el camp d'entrada de sortida?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Definiu-ho com a Sí si voleu mostrar tant una data d'arribada com una de sortida. Això seria útil si oferiu viatges en autobús, bitllets d'avió, etc. on necessiteu saber tant les dates d'entrada com de sortida. mostrar la data de sortida us permet oferir recursos durant diverses dates, mentre que amb la configuració establerta en No, només es poden acceptar reserves per a una data.");

jr_define ('_JINTOUR_PROFILES_TITLE_LIST', "Llista de tours");