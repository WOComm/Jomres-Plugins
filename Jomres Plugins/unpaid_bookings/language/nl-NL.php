<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JRPORTAL_UNPAID_BOOKINGS_TITLE',"Afhandeling van onbetaalde boekingen");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_DELEEORCANCEL',"Annuleren of verwijderen van de voorlopige (onbetaalde) boekingen? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_NR_DAYS_TITLE',"Alfer hoeveel dagen vanaf de boekingstijd? ");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_INSTRUCTIONS',"Deze plug-in wordt automatisch op de achtergrond uitgevoerd en verwijdert of annuleert alle voorlopige boekingen die niet zijn gemarkeerd als betaald binnen een interval naar keuze. Dit is handig wanneer u boekingen accepteert die zijn betaald met offline betaalmethoden (overboeking) overschrijving, cheque). Als een boeking niet is betaald binnen X aantal dagen vanaf het moment dat de boeking is gemaakt, wordt de boeking verwijderd of geannuleerd en toont de kalender de geboekte data als beschikbaar, zodat iemand anders die dagen kan boeken . Wanneer een boeking wordt verwijderd of geannuleerd, ontvangen zowel u als de gast een melding per e-mail. Als u ervoor kiest om een ​​boeking te annuleren, worden de boeking en de factuur gemarkeerd als geannuleerd en niet uit de database verwijderd , zodat u ze later kunt openen. Als u ervoor kiest om het te verwijderen, worden de boeking en de factuur uit de database verwijderd.");
jr_define('_JRPORTAL_UNPAID_BOOKINGS_EMAIL_TITLE',"Reservering geannuleerd");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY1',"Uw boeking is automatisch geannuleerd wegens niet-betaling van de vereiste aanbetaling. Dit is niet langer een geldige boeking. Als u opnieuw wilt boeken, bezoek dan onze website en herhaal de boeking. Hieronder volgen de geannuleerde boekingsdetails.");
jr_define('_JOMRES_EMAIL_CANCEL_BOOKING_MSGBODY2',"Als u denkt dat u deze melding per ongeluk heeft ontvangen, neem dan gerust contact met ons op.");