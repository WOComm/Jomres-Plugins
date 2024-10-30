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
jr_define('_JINTOUR_TITLE',"Zarządzanie wycieczkami/zajęciami");

jr_define('_JINTOUR_PROFILES_TITLE',"Profile wycieczek/aktywności");
jr_define('_JINTOUR_PROFILES_NEW',"Nowy profil wycieczki/aktywności");
jr_define('_JINTOUR_PROFILES_DELETE',"Usuń profil wycieczki/aktywności");

jr_define('_JINTOUR_PROFILE_TITLE',"Tytuł profilu");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Opis");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Wprowadź opis swojej wycieczki/aktywności, w tym jej plan podróży.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Dni tygodnia");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Cena dla dorosłych");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Cena za dziecko");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"Aby wykluczyć opcję z pojawiania się w formularzu rezerwacji, pozostaw cenę jako 0 (zero)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Spacje dla dorosłych");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Przestrzenie podrzędne");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Liczba miejsc dostępnych na wycieczce/aktywności");
jr_define('_JINTOUR_PROFILE_START_DATE',"Rozpoczęcie sezonu");
jr_define('_JINTOUR_PROFILE_END_DATE',"Koniec sezonu");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Po utworzeniu profilu wycieczki/aktywności będziesz musiał wygenerować wycieczki/aktywności na podstawie ustawień tego profilu. Utwórz wycieczkę/aktywność, a następnie kliknij ikonę zielonej strzałki obok tego profilu, aby utworzyć same wycieczki/działania. Po utworzeniu wycieczek/działań będziesz mógł usunąć poszczególne wycieczki/działania, jeśli chcesz.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Generuj wycieczki/zajęcia");

jr_define('_JINTOUR_TOUR_TITLE',"Tytuł działania");
jr_define('_JINTOUR_TOUR_DATE',"Data");
jr_define('_JINTOUR_TOUR_ADULTS',"Dorośli");
jr_define('_JINTOUR_TOUR_KIDS',"Dzieci");
jr_define('_JINTOUR_TOUR_ITINERY',"Plan podróży");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Wygenerowano nowe wycieczki");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Rezerwacja wycieczki anulowana");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Wygenerowano nowe wycieczki");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Obecnie dostępne miejsca");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"Nowa rezerwacja dla identyfikatora wycieczki/zasobu ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"Dokonano nowej rezerwacji wycieczki/zasobu administratora. Proszę zobaczyć poniższy link, aby wyświetlić stronę obszaru administratora tej wycieczki");

jr_define('_JINTOUR_TITLE_CONFIG',"Konfiguracja zintegrowanych wycieczek Jomres");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Czy cała instalacja jest instalacją Jintour?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Jeśli ustawisz to na Tak, wszystkie właściwości będą właściwościami wycieczki. Jeśli ustawisz to na Nie, po utworzeniu nowych właściwości będziesz mógł mieć zarówno właściwości typu Wycieczka, jak i Hotel/Apartament. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Wycieczki");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Wybierz opcję wycieczki, jeśli oferujesz rezerwacje na pozycje dostępne w określonych terminach (np. wycieczki, bilety na koncert.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Pokaż pole wejściowe odjazdu?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Ustaw to na Tak, jeśli chcesz pokazać zarówno datę przyjazdu, jak i wyjazdu. Jest to przydatne, jeśli oferujesz wycieczki autobusowe, bilety lotnicze itp., gdzie musisz znać zarówno daty przylotów, jak i wylotów, pokazanie daty wyjazdu umożliwia oferowanie zasobów w wielu terminach, natomiast przy ustawieniu na Nie można akceptować tylko rezerwacje na jeden dzień.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Lista wycieczek");