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




jr_define('_JRPORTAL_PAYMENT_REMINDER_TITLE',"Betalingsherinneringen");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE1',"Stuur betalingsherinnering per e-mail..");
jr_define('_JRPORTAL_PAYMENT_REMINDER_NR_DAYS_TITLE2',"..dagen nadat de voorlopige boeking was gemaakt");
jr_define('_JRPORTAL_PAYMENT_REMINDER_INSTRUCTIONS',"Deze plug-in wordt automatisch op de achtergrond uitgevoerd en stuurt een betalingsherinnering per e-mail naar gasten die voorlopige boekingen hebben gemaakt die niet zijn gemarkeerd als betaald binnen een interval naar keuze. Dit is handig wanneer u betaalde boekingen accepteert met behulp van offline betaalmethoden (bankoverschrijving, cheque). Als een boeking niet binnen X aantal dagen vanaf het moment dat de boeking is gemaakt is betaald, wordt er een betalingsherinnering naar de gast gestuurd. U ontvangt ook een kopie ervan Als je ook de Provisional Bookings Handling plugin gebruikt, zorg er dan voor dat het interval waarmee je de betalingsherinnering per e-mail wilt versturen minimaal 1 dag lager is dan de ingestelde tijd voor het verwijderen of annuleren van de onbetaalde boeking.");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_TITLE',"Betalingsherinnering voor uw boeking bij de ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY1',"U heeft een onbetaalde boeking bij de ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY2',"Om uw boeking te garanderen, is het noodzakelijk om een ​​aanbetaling te doen van ");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_BOOKINGNO',"Reserveringsnummer");
jr_define('_JOMRES_PAYMENT_REMINDER_EMAIL_MSGBODY3',"Neem contact met ons op als u betalingsopties wilt bespreken.<br /><br />Bedankt.");