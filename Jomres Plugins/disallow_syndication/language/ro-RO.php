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


jr_define ('DISALLOW_SYNDICATION_TITLE', "Disallow Syndication");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Funcția de sindicalizare Jomres.net este o nouă funcționalitate concepută pentru a partaja proprietăți între site-uri, deși rezervările pot fi făcute numai pe serverul de acasă.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Scopul acestui lucru este de a face posibilă ca site-urile să creeze încredere în motoarele de căutare. Este o funcție gratuită, disponibilă pentru toți utilizatorii Jomres. Deținătorii de licență Jomres activi pot, dacă doresc, să elimine site din rețeaua de sindicare prin această pagină. Localhost nu poate fi adăugat la rețea și, dacă, din orice motiv, există o problemă cu conectivitatea, nu veți putea adăuga site-ul dvs. la rețea. Verificați pagina de testare a conectivității API REST sunt în orice îndoială. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Faceți clic pe acest link pentru a vă elimina site-ul din rețea.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Faceți clic pe acest link pentru a adăuga site-ul dvs. la rețea.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Eliminați acest site din rețea");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Adăugați acest site la rețea");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Ne pare rău, cheia dvs. de asistență nu este validă sau nu este activă, nu puteți schimba starea de sindicare a acestei instalări.");