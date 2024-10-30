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

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE',"Prosta rezerwacja");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC',"Czarne rezerwacje to rezerwacje, które zajmują pokój, pokoje lub nieruchomość, ale nie mają żadnych danych dotyczących rozliczeń ani faktur. Zazwyczaj są one używane do wskazania rezerwacji dokonanych za pośrednictwem innego medium (np. telefonu). Utworzyłbyś czarne rezerwacje, aby upewnić się, że te zasoby nie mogą być następnie zarezerwowane online, ani przez zarządcę nieruchomości, ani przez gościa.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM',"Musisz wybrać co najmniej jeden pokój.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED',"Zarezerwowano pomyślnie.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED'," Nie można zarezerwować, ponieważ ma już rezerwację w tym okresie.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY',"Pokój zablokowany przez ");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP',"Użyj tego kalendarza, aby łatwo zaciemnić zasoby. Wybierz salę lub sale, a następnie kliknij pierwszą i ostatnią datę czarnej rezerwacji, a zasoby zostaną zarezerwowane na czarno. Jeśli czarna rezerwacja dotyczy tylko jednej datę, a następnie dwukrotnie kliknij tę datę.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP',"Użyj tego kalendarza, aby łatwo zaciemnić zasoby. Kliknij pierwszą i ostatnią datę czarnej rezerwacji, a zasoby zostaną zaksięgowane na czarno. Jeśli czarna rezerwacja dotyczy tylko jednego dnia, kliknij tę datę dwukrotnie .");

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL',"Dodaj wszystko");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL',"Usuń wszystko");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED'," wybrane elementy");