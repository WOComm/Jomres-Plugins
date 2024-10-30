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

jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktívne");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Neaktívne");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Stav platby");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Úroveň");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Upraviť odber");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Poslať e-mail s pripomenutím vypršania predplatného?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Odoslať e-mail s pripomenutím");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dni pred vypršaním predplatného");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Poslať email po vypršaní predplatného?");
jr_define('_SUBSCRIPTIONS_MY',"Moje odbery");
jr_define('_SUBSCRIPTIONS_HRENEW',"Obnoviť");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Obnovenie predplatného");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Už ste sa prihlásili na odber, prosím, zakúpte si obnovenie.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Upraviť balík predplatného");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Napíšte prvých pár písmen používateľského mena a uvidíte rozbaľovaciu ponuku s používateľskými menami. Kliknutím na používateľské meno ho vyberiete.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Tento balík predplatného už nie je dostupný, takže ho nemožno obnoviť, zvážte jeho aktualizáciu.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Nie ste prihlásený na odber tohto balíka, takže si ho nemôžete obnoviť.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Pre tento balík neexistujú žiadne možnosti obnovenia");
jr_define('_SUBSCRIPTIONS_CANCEL',"Zrušiť odber");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frekvencia (dni)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Dĺžka predplatného v dňoch");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Obnovenia nie sú povolené pre tento balík.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Cena za obnovenie");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Nastavte toto na 0, ak chcete zakázať obnovenie tohto balíka alebo zadať cenu za obnovenie");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Možnosti balíčka");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Detaily balíka");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Váš balík predplatného");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Vaše predplatné nezahŕňa prístup k tejto funkcii. Ak chcete používať túto funkciu, budete musieť aktualizovať svoje predplatné.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Platnosť vášho predplatného vypršala a všetky vaše záznamy boli zrušené. Vaše záznamy už nie sú viditeľné pre hostí a už nebudete môcť prijímať online rezervácie z našej webovej stránky. Ak chcete pokračovať v používaní našich služieb, zverejnite ich svoje záznamy a začnite prijímať online rezervácie, prihláste sa do svojho účtu a zakúpte si obnovenie." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Vaše predplatné na" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"vypršala platnosť" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Toto je upozornenie, aby ste vedeli, že platnosť vášho predplatného čoskoro vyprší. Ak chcete pokračovať v používaní našich služieb, prihláste sa do svojho účtu a zakúpte si obnovenie." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Predplatné balíčky" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Nazov" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Popis" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publikované" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frekvencia" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Cena" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Obchodný limit" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maximálny počet podnikov, ktoré je možné pridať s týmto predplatným balíčkom" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Prihlásiť sa" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Použiť funkciu spracovania predplatného" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Prepáčte, ale toto ID balíka nebolo rozpoznané." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Zdá sa, že ste ešte nevyplnili podrobnosti o svojom účte. Ak chcete uviesť svoju nehnuteľnosť na stránke, potrebujeme, aby ste vyplnili podrobnosti o svojom účte, aby sme mohli pokračovať ďalej." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Použili ste všetky priestory vlastností dostupné v balíku predplatného, ​​takže nebudete môcť vytvárať žiadne nové záznamy. Ak chcete vytvoriť ďalšie záznamy, aktualizujte svoj balík." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Príjmy za rok/mesiac");
jr_define('_SUBSCRIPTION_WARNING',"Povolili ste odbery, ale zdá sa, že ste ešte nevytvorili žiadne balíky odberov. Vlastníci nebudú môcť registrovať vlastnosti na vašej stránke, kým nebude vytvorený aspoň jeden balík odberov.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API Access" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Túto funkciu získate aktualizáciou na " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Balíček predplatného. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Prihlásený na odber');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Nastavenia predplatiteľskej brány');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Momentálne nie ste prihlásení na odber žiadnych balíkov odberov. Ak chcete pokračovať v používaní našich služieb, prihláste sa na odber balíka.');
