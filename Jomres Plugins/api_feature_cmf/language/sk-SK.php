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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Správa kanálov");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Klient môže vykonávať činnosti správy kanálov. Upozorňujeme, že toto dáva klientovi v systéme značnú právomoc upravovať vaše účty a vlastnosti.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Čistenie");

jr_define ('_CMF_CANCELLED_BOOKING', "Správca kanála zrušil rezerváciu");

jr_define ('_CMF_CLEANING_STRING', "Čistenie"); // Nemeňte to, ak ste už importovali vlastnosti. Nehnuteľnosti s poplatkami za upratovanie majú dodatok s týmto názvom
jr_define ('_CMF_SECURITY_STRING', "zábezpeka"); // Nemeňte to, ak ste už importovali vlastnosti. Nehnuteľnosti s cennými papiermi majú dodatok s týmto názvom


jr_define ('_CMF_API_PRIVACY', "Ochrana osobných údajov API");
jr_define ('_CMF_API_PRIVACY_ON', "Ochrana osobných údajov");
jr_define ('_CMF_API_PRIVACY_OFF', "Ochrana osobných údajov vypnutá");

jr_define ('_CMF_API_PRIVACY_DESC', "Informácie o vlastnosti môže vidieť iba kanál, ktorý ho vytvoril. Ak ste napríklad kanálu A aj kanálu B dali rôzne páry kľúčov API, informácie o vlastnosti vytvorenej kanálom A nemožno byť videný kanálom B ... pokiaľ nevypnete ochranu osobných údajov rozhrania API, aby všetky kanály mohli prostredníctvom rozhrania API zobrazovať všetky informácie o vlastníctve. Nastavte ochranu osobných údajov rozhrania API na vypnuté, ak zdieľate toto vlastníctvo s iným webom, ktorý chce uviesť vlastníctvo v zozname. Ak toto vlastníctvo nezdieľate s inými webovými stránkami, nechajte ochranu osobných údajov rozhrania API nastavenú na hodnotu Zapnuté. ");
