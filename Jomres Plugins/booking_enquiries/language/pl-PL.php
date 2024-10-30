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
jr_define('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE',"Temat e-maila");
jr_define('_JOMRES_BOOKING_REJECTION_HCONTENT',"Tekst e-maila (możesz edytować ten tekst, aby podać powód odrzucenia tej rezerwacji, oferty alternatywne, itp.)");
jr_define('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS',"To zapytanie o rezerwację zostanie odrzucone i anulowane. Do klienta zostanie wysłany następujący e-mail.");
jr_define('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE',"To zapytanie o rezerwację nie może zostać odrzucone, ponieważ zostało już odrzucone lub zatwierdzone.");
jr_define('_JOMRES_BOOKING_APPROVAL_HCONTENT',"Tekst wiadomości e-mail (możesz edytować ten tekst, aby wypełnić instrukcje dotyczące płatności za tę rezerwację itp.)");
jr_define('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS',"To zapytanie o rezerwację zostanie zaakceptowane, a dostępność zostanie zaktualizowana w kalendarzu. Do klienta zostanie wysłany następujący e-mail.");
jr_define('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE',"To zapytanie o rezerwację nie może zostać zatwierdzone, ponieważ zostało już odrzucone lub zatwierdzone.");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME',"Nowy e-mail administratora witryny z zapytaniem");
jr_define('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC',"E-mail wysłany do administratora strony w czasie rezerwacji, jeśli rezerwacja wymaga uprzedniego zatwierdzenia i globalna bramka PayPal jest włączona");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME',"E-mail z nowym zapytaniem hotelowym");
jr_define('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC',"E-mail wysłany do hotelu w momencie rezerwacji, jeśli rezerwacja wymaga uprzedniego zatwierdzenia");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME',"Nowy adres e-mail gościa z zapytaniem");
jr_define('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC',"E-mail wysyłany do gościa w momencie rezerwacji, jeśli rezerwacja wymaga uprzedniego zatwierdzenia");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME',"E-mail do zatwierdzenia zapytania gości");
jr_define('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC',"E-mail ręcznie wysłany do gościa przez zarządcę obiektu w celu potwierdzenia dostępności zapytania");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME',"E-mail o odrzuceniu zapytania od gości");
jr_define('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC',"E-mail ręcznie wysłany do gościa przez zarządcę obiektu, jeśli obiekt nie jest dostępny dla szczegółów zapytania");