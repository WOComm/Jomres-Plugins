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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Predmet e -pošte");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Tekst e -pošte (ovaj tekst možete urediti tako da ispunite razlog odbijanja rezervacije, ponudite alternative itd.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Ovaj upit o rezervaciji će biti odbijen i otkazan. Korisniku će biti poslana sljedeća e -poruka.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Ovaj upit o rezervaciji ne može se odbiti jer je već odbijen ili odobren.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Tekst e -pošte (ovaj tekst možete urediti da biste ispunili upute za plaćanje ove rezervacije itd.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Ovaj upit o rezervaciji će biti prihvaćen i dostupnost će se ažurirati u kalendaru. Sljedeća e -poruka bit će poslana korisniku.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Ovaj upit o rezervaciji ne može se odobriti jer je već odbijen ili odobren.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Nova adresa e -pošte za upite administratora web lokacije");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "E -pošta poslana administratoru web stranice u vrijeme rezervacije ako rezervacija prvo zahtijeva odobrenje i ako je omogućen globalni pristup PayPal");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "E -pošta za novi upit o hotelu");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "E -pošta poslana hotelu u vrijeme rezervacije ako je za rezervaciju potrebno odobrenje");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "E -pošta za novi upit za goste");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "E -poruka poslana gostu u vrijeme rezervacije ako za rezervaciju prvo treba odobrenje");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "E -pošta za odobrenje upita gostiju");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "E -poruku koju je upravitelj objekta ručno poslao gostu kako bi potvrdio dostupnost za upit");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "E -pošta za odbijanje upita gostiju");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "E -mail upravitelj nekretnine ručno šalje gostu ako nekretnina nije dostupna za detalje upita");