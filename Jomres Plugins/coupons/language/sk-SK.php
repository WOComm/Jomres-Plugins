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

jr_define ('JOMRES_COUPONS_SCAN', "Naskenujte tento kód do telefónu a rezervujte hneď!");
jr_define ('JOMRES_COUPONS_GETADISCOUNT', "Získajte zľavu na");
jr_define ('JOMRES_COUPONS_PERCENT', "%");
jr_define ('JOMRES_COUPONS_OFFACCOMMODATION', "zľava z ceny ubytovania");
jr_define ('JOMRES_COUPONS_IFYOUBOOKBETWEEN', "ak rezervujete medzi");
jr_define ('JOMRES_COUPONS_AND', "a");
jr_define ('JOMRES_COUPONS_FORDATESBETWEEN', "pre dátumy medzi");
jr_define ('JOMRES_COUPONS_ALTERNATIVELY', "Prípadne pri rezervácii zadajte tento zľavový kód:");
jr_define ('JOMRES_COUPONS_PRINT_COUPONS', "Vytlačiť kupóny");

jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDFROM', 'Rezervácia platí od');
jr_define ('_JRPORTAL_COUPONS_BOOKING_VALIDTO', 'Rezervácia platí do');
jr_define ('_JRPORTAL_COUPONS_GUESTNAME', 'meno hosťa');
jr_define ('_JRPORTAL_COUPONS_DESC_478', "Zľavové kódy je možné generovať a posielať hosťom ako motivácia k rezervácii. <br/>
Platné dátumy od a do sa vzťahujú na dátumy, kedy je možné vykonať rezerváciu, zatiaľ čo dátumy platné od/do sa vzťahujú na dátumy, ktoré musí rezervácia obsahovať, aby bol kupón platný. Ak rezervácia spadne mimo uvedené obdobie, na dni mimo tohto obdobia sa budú vzťahovať bežné ceny. <br/>
Ak chcete, aby bola rezervácia k dispozícii pre jedného konkrétneho hosťa, v rozbaľovacom zozname vyberte meno tohto hosťa a obmedzte tak kupón iba na tohto hosťa. ");
jr_define ('_JRPORTAL_COUPONS_DESC_ADMIN', "Tu vytvorené zľavové kódy budú platné pre všetky nehnuteľnosti na webových stránkach.");
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK', 'S vašim kupónom bola táto rezervácia zľavnená z');
jr_define ('_JRPORTAL_COUPONS_BOOKING_DISCOUNT_FEEDBACK_TO', ' to ');