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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Aktivní");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Neaktivní");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Stav platby");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Úroveň");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Upravit předplatné");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Poslat e-mail s připomenutím vypršení předplatného?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Odeslat e-mail s připomínkou");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dny před vypršením předplatného");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Poslat e-mail po vypršení předplatného?");
jr_define('_SUBSCRIPTIONS_MY',"Moje odběry");
jr_define('_SUBSCRIPTIONS_HRENEW',"Obnovit");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Obnovení předplatného");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Již jste se přihlásili k odběru, zakupte si místo toho obnovení.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Upravit balíček předplatného");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Zadejte několik prvních písmen uživatelského jména a zobrazí se rozbalovací nabídka s uživatelskými jmény. Kliknutím na uživatelské jméno jej vyberete.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Tento balíček předplatného již není dostupný, takže jej nelze obnovit, zvažte prosím jeho aktualizaci.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Nejste přihlášeni k odběru tohoto balíčku, takže jej nemůžete obnovit.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Pro tento balíček nejsou žádné možnosti obnovení");
jr_define('_SUBSCRIPTIONS_CANCEL',"Zrušit předplatné");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Frekvence (dny)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Délka předplatného ve dnech");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Obnovení není pro tento balíček povoleno.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Cena za obnovení");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Nastavte toto na 0, chcete-li zakázat obnovení tohoto balíčku nebo zadat cenu za obnovení");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Možnosti balíčku");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Podrobnosti o balíčku");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Váš balíček předplatného");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Vaše předplatné nezahrnuje přístup k této funkci. Chcete-li tuto funkci používat, budete muset upgradovat své předplatné.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Platnost vašeho předplatného vypršela a všechny vaše zápisy byly zrušeny. Vaše zápisy již nejsou viditelné pro hosty a již nebudete moci přijímat online rezervace z našeho webu. Chcete-li nadále používat naše služby, publikujte své nabídky a začněte přijímat online rezervace, přihlaste se prosím ke svému účtu a zakupte si obnovení." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"Vaše předplatné na" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"vypršela" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Toto je upozornění, abyste věděli, že vaše předplatné brzy vyprší. Chcete-li nadále používat naše služby, přihlaste se prosím ke svému účtu a zakupte obnovení." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Předplatné balíčky" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Jméno" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Popis" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publikováno" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Frekvence" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Cena" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Obchodní limit" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Maximální počet podniků, které lze přidat pomocí tohoto balíčku předplatného" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Přihlásit se");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Použít funkci zpracování předplatného" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Omlouváme se, ale toto ID balíčku nebylo rozpoznáno." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Zdá se, že jste ještě nevyplnili podrobnosti o svém účtu. Abychom mohli uvést svou nemovitost na webu, potřebujeme, abyste dokončili podrobnosti o svém účtu, než budeme moci pokračovat." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Využili jste všechny sloty vlastností dostupné ve vašem balíčku předplatného, ​​takže nebudete moci vytvářet žádné nové nabídky. Pokud chcete vytvořit další nabídky, aktualizujte svůj balíček." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Příjmy za rok/měsíc");
jr_define('_SUBSCRIPTION_WARNING',"Povolili jste předplatné, ale zdá se, že jste ještě nevytvořili žádné balíčky předplatného. Vlastníci nebudou moci registrovat vlastnosti na vašem webu, dokud nebude vytvořen alespoň jeden balíček předplatného.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"API Access" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Tuto funkci můžete získat upgradem na " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Předplatitelský balíček. ");
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Upgrade');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Přihlášeno');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Nastavení předplatitelské brány');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'V současné době nejste přihlášeni k odběru žádných předplatitelských balíčků. Předplaťte si prosím balíček, abyste mohli nadále používat naše služby.');
