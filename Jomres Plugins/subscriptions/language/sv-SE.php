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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktiv");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Inte aktiv");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Betalningsstatus");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Nivå");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Redigera prenumeration");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Skicka påminnelse om utgången av prenumerationen?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Skicka påminnelse via e-post");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dagar innan prenumerationen går ut");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Skicka e-post när prenumerationen löpte ut?");
jr_define('_SUBSCRIPTIONS_MY',"Mina prenumerationer");
jr_define('_SUBSCRIPTIONS_HRENEW',"Förnya");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Prenumerationsförnyelse");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Du har redan prenumererat, köp en förnyelse istället.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Redigera prenumerationspaket");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Skriv de första bokstäverna i användarnamnet så ser du en rullgardinsmeny med användarnamn. Klicka på ett användarnamn för att välja det.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Detta prenumerationspaket är inte längre tillgängligt så det kan inte förnyas, vänligen överväg att uppgradera det.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Du prenumererar inte på detta paket så du kan inte förnya det.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Det finns inga förnyelsealternativ för detta paket");
jr_define('_SUBSCRIPTIONS_CANCEL',"Avsluta prenumeration");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frekvens (dagar)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Prenumerationslängd i dagar");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Förnyelser inte tillåtna för detta paket.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Förnyelsepris");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Sätt detta till 0 för att inaktivera förnyelser för detta paket eller ange ett pris för förnyelsen");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Paketalternativ");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Paketdetaljer");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Ditt prenumerationspaket");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Ditt prenumerationspaket inkluderar inte tillgång till denna funktion. För att använda den här funktionen måste du uppgradera din prenumeration.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Din prenumeration har löpt ut och alla dina listor har avpublicerats. Dina uppgifter är inte synliga för gäster längre och du kommer inte att kunna ta emot onlinebokningar från vår webbplats längre. För att fortsätta använda våra tjänster, publicera dina listor och börja ta emot onlinebokningar, logga in på ditt konto och köp en förnyelse." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Din prenumeration på" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"har löpt ut" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Detta är ett meddelande för att informera dig om att din prenumeration snart upphör. För att fortsätta använda våra tjänster, vänligen logga in på ditt konto och köp en förnyelse." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Prenumerationspaket" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Namn" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Beskrivning" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publicerad" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frekvens" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Pris" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Business limit" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maximalt antal företag som kan läggas till med detta prenumerationspaket" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Prenumerera" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Använd prenumerationshanteringsfunktioner" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Tyvärr, men det paket-ID känns inte igen." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Du verkar inte ha fyllt i dina kontouppgifter ännu. För att lista din egendom på webbplatsen måste du fylla i dina kontouppgifter innan vi kan gå vidare." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Du har använt alla fastighetsplatser som är tillgängliga i ditt prenumerationspaket, så du kommer inte att kunna skapa några nya listor. Uppgradera ditt paket om du vill skapa fler listor." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Inkomst per år/månad");
jr_define('_SUBSCRIPTION_WARNING',"Du har aktiverat prenumerationer men ser ut som att du inte har skapat några prenumerationspaket ännu. Ägare kommer inte att kunna registrera egenskaper på din sida förrän minst ett prenumerationspaket har skapats.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API-åtkomst" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Du kan komma åt den här funktionen genom att uppgradera till " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Prenumerationspaket. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Uppgradera');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Prenumererade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Prenumerationsgatewayinställningar');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Du prenumererar för närvarande inte på några prenumerationspaket. Vänligen prenumerera på ett paket för att fortsätta använda våra tjänster.');
