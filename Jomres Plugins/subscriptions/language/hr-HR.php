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

jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktivan");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Nije aktivno");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Status plaćanja");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Razina");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Uredi pretplatu");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Pošalji e-poštu s podsjetnikom o isteku pretplate?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Pošalji e-poštu podsjetnika");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dani prije isteka pretplate");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Pošalji e-poštu kada je pretplata istekla?");
jr_define('_SUBSCRIPTIONS_MY',"Moje pretplate");
jr_define('_SUBSCRIPTIONS_HRENEW',"Obnovi");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Obnova pretplate");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Već ste se pretplatili, umjesto toga kupite obnovu.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Uredi paket pretplate");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Upišite prvih nekoliko slova korisničkog imena i vidjet ćete padajući izbornik s korisničkim imenima. Kliknite na korisničko ime da biste ga odabrali.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Ovaj paket pretplate više nije dostupan pa se ne može obnoviti, razmislite o nadogradnji.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Niste pretplaćeni na ovaj paket pa ga ne možete obnoviti.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Nema mogućnosti obnove za ovaj paket");
jr_define('_SUBSCRIPTIONS_CANCEL',"Otkaži pretplatu");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Učestalost (dana)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Duljina pretplate u danima");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Obnove nisu dopuštene za ovaj paket.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Cijena obnove");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Postavite ovo na 0 da onemogućite obnove za ovaj paket ili unesite cijenu za obnovu");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Opcije paketa");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Pojedinosti o paketu");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Vaš paket pretplate");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Vaš paket pretplate ne uključuje pristup ovoj značajci. Da biste koristili ovu značajku, morat ćete nadograditi svoju pretplatu.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Vaša je pretplata istekla i svi vaši oglasi su poništeni. Vaši oglasi više nisu vidljivi gostima i više nećete moći primati online rezervacije s naše web stranice. Da nastavite koristiti naše usluge, objavite Vaši oglasi i počnite primati online rezervacije, prijavite se na svoj račun i kupite obnovu." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Vaša pretplata na");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"je istekao");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Ovo je obavijest kojom vas obavještavamo da će vaša pretplata uskoro isteći. Da biste nastavili koristiti naše usluge, prijavite se na svoj račun i kupite obnovu." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Paketi pretplate");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Naziv");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Opis");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Objavljeno");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Učestalost");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Cijena");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Poslovno ograničenje");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maksimalni broj tvrtki koje se mogu dodati s ovim paketom pretplate");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Pretplati se");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Koristite funkcionalnost rukovanja pretplatom" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Oprostite, ali taj ID paketa nije prepoznat." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Čini se da još niste ispunili pojedinosti o svom računu. Da bismo naveli svoju imovinu na web-mjestu, potrebno je da popunite podatke o svom računu prije nego što možemo ići dalje." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Iskoristili ste sva mjesta za svojstva dostupna u vašem paketu pretplate, tako da nećete moći kreirati nove unose. Molimo nadogradite svoj paket ako želite kreirati više oglasa." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Prihod po godini/mjesecu");
jr_define('_SUBSCRIPTION_WARNING',"Omogućili ste pretplate, ali izgleda da još niste kreirali nijedan paket pretplate. Vlasnici neće moći registrirati svojstva na vašoj web-lokaciji dok se ne stvori barem jedan paket pretplate.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Pristup API-ju");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Ovoj značajci možete pristupiti nadogradnjom na " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Paket pretplate. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Nadogradnja');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Pretplaćeni');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Postavke pristupnika pretplate');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Trenutno niste pretplaćeni ni na jedan paket pretplate. Pretplatite se na paket kako biste nastavili koristiti naše usluge.');
