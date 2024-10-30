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

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE', "Reserva senzilla");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC', "Les reserves en negre són reserves que ocupen una habitació, habitacions o una propietat, però que no tenen dades de facturació ni de factura. Normalment s'utilitzen per indicar les reserves que s'han fet mitjançant un altre mitjà (per exemple, per telèfon). Es crearien reserves negres per assegurar-se que aquests recursos no es puguin reservar en línia ni per part del gestor de la propietat ni d'un hoste. ");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM', "Heu de seleccionar almenys una habitació.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED', "Reservat correctament.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED', "No s'ha pogut reservar ja que ja té una reserva durant aquest període de temps.");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY', "Habitació bloquejada per");
jr_define ("_ JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP", "Utilitzeu aquest calendari per reservar recursos negres fàcilment. Trieu una o més habitacions i, a continuació, feu clic a la primera i a l'última data de la reserva negra i els recursos quedaran negres. Si la reserva negra és només per a una data i, a continuació, feu clic a aquesta data dues vegades. ");
jr_define ("_ JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP", "Utilitzeu aquest calendari per reservar fàcilment recursos negres. Feu clic a la primera i a l'última data de la reserva negra i els recursos es reservaran en negre. Si la reserva negra és només per a una data, feu clic a aquesta data dues vegades . ");

jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL', "Afegeix-ho tot");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL', "Elimina-ho tot");
jr_define ('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED', "elements seleccionats");
