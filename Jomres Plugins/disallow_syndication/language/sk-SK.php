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
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'Funkcia syndikácie Jomres.net je nová funkcia navrhnutá na zdieľanie vlastností medzi webmi, aj keď rezervácie je možné vykonať iba na domácom serveri.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "Účelom tohto je umožniť stránkam vybudovať si dôveru voči vyhľadávacím nástrojom. Je to bezplatná funkcia, dostupná pre všetkých používateľov Jomres. Aktívni držitelia licencie Jomres môžu, ak sa chcú rozhodnúť odstrániť svoje server zo siete syndikácie prostredníctvom tejto stránky. Localhost nie je možné pridať do siete, a ak z nejakého dôvodu nastane problém s pripojením, nebudete môcť pridať svoje stránky do siete. Ak vyskúšate stránku testu pripojenia REST API, majú akékoľvek pochybnosti. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Kliknutím na tento odkaz odstránite svoje stránky zo siete.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Kliknutím na tento odkaz pridáte svoje stránky do siete.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Odstrániť tento web zo siete");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Pridať túto stránku do siete");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Ospravedlňujeme sa, váš kľúč podpory je neplatný alebo nie je aktívny, nemôžete zmeniť stav syndikácie tejto inštalácie.");