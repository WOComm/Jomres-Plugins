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



jr_define ('DISALLOW_SYNDICATION_TITLE', "Onemogoči razširjanje");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Funkcija združevanja Jomres.net je nova funkcionalnost, namenjena skupni rabi lastnosti med spletnimi mesti, čeprav je mogoče rezervirati le na domačem strežniku.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Namen tega je omogočiti, da spletna mesta vzpostavijo zaupanje z iskalniki. To je brezplačna funkcija, ki je na voljo vsem uporabnikom Jomresa. Imetniki licenc Jomres lahko, če želijo, odstranijo svoje spletnega mesta iz distribucijskega omrežja prek te strani. Localhosta ni mogoče dodati v omrežje in če iz kakršnega koli razloga pride do težave s povezljivostjo, svojega spletnega mesta ne boste mogli dodati v omrežje. Preverite preskusno stran povezljivosti API -ja REST, če so v dvomih. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Kliknite to povezavo, če želite odstraniti svoje spletno mesto iz omrežja.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Kliknite to povezavo, če želite svoje spletno mesto dodati v omrežje.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Odstrani to spletno mesto iz omrežja");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Dodaj to spletno mesto v omrežje");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Žal, vaš ključ za podporo ni veljaven ali ni aktiven, statusa distribucije te namestitve ne morete spremeniti.");