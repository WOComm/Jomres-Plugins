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

jr_define ('STRIPE_TITLE', "Stripe");
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Tato brána Stripe je navržena speciálně tak, aby vám jako správci webu umožnila přijímat část plateb uhrazených správcům nemovitostí v době rezervace. Než bude možné ji použít, musíte nejprve nastavit vlastní integraci s Stripe Připojte se. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  Dokumentaci k tomuto pluginu najdete zde. </a> <br/> Pokud na této stránce kliknete na Uložit, aby tento plugin fungoval bezproblémově  všechny ostatní brány budou deaktivovány </ silný> Než začnete, ujistěte se, že jste přešli na svou stránku Stripe Connect a uvedli, že nastavujete platformu. Jakmile to bude provedeno, postupujte podle pokynů na obrazovce a nastavte svůj účet. Než mohou manažeři propojit svůj účet s vámi musíte navštívit Nastavení> Nastavení připojení a v oblasti \"Nastavení OAuth\" povolit OAuth pro standardní účty a potom klikněte na Uložit (poznámka, budete to muset udělat v testovacím i živém režimu). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Spojte se s námi!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Zaregistrovali jste se, ale připojení ještě není dokončeno. Musíte propojit svůj účet Stripe s naší webovou stránkou. Až to budete mít hotové, můžete na náš web přidat všechny své nemovitosti a začít přijímat rezervace.");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Vítejte v");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Než budete moci začít nastavovat své nemovitosti, musíte nás propojit se svým účtem Stripe. Začněte kliknutím na odkaz.");

jr_define ('STRIPE_SETUP_INFO', "Nyní potřebujeme propojit váš účet s naším, to nám umožní přijímat platby vaším jménem, ​​takže kliknutím na tlačítko Připojit se dostanete do Stripe, kde můžete připojení potvrdit.");
jr_define ('STRIPE_SETUP_DONE', "Už jste s námi spojeni, tady už není co dělat! Zavřete toto okno a můžeme se pustit do podnikání.");
jr_define ('STRIPE_SETUP_THANKS', "Děkujeme, že jste se s námi spojili! Nyní můžete toto okno zavřít.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Odpojit účet.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Účet odpojen, toto okno můžete nyní zavřít.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Stripe Connect ID klienta");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "ID svého proužkového klienta můžete získat ze svého <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> panelu> Nastavení> Připojit. API klávesy jsou pod možností nabídky Vývojáři. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Ujistěte se, že jste nastavili svůj identifikátor URI přesměrování v <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Connect> Settings </a> k <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "tajný klíč");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "veřejný klíč");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "Vaše provize");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Tato provize je stržena z platby zaslané správci nemovitosti v době rezervace. Poté ji Stripe vloží na váš účet Stripe. <br/> Toto je procento provize, za kterou budete správcům nemovitostí účtovat jejich rezervace. Vaše provize je účtována na základě CELÝCH nákladů na rezervaci, nikoli na hodnotě vkladu. <br/> Ať už tuto hodnotu nastavíte na cokoli, doporučujeme nakonfigurovat konfiguraci webu -> rezervační formulář -> údaj o minimálním vkladu. alespoň dvojnásobek tohoto čísla, takže pokud chcete účtovat provizi 10%, měli byste provést minimální vklad ve výši 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC', "Toto je procento, které vám Stripe účtuje za platby na vašem webu. V současné době účtují 1,4% za evropské karty a 2,9% za neevropské karty. Toto číslo je vyžadováno pro stanovení cen při rezervaci a doba platby. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Stripe Fee non-euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "číslo karty");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Expiration (MM/YY)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Billing Zip");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "zabezpečený platební formulář");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Fakturační údaje");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Podrobnosti o kartě");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Jméno držitele karty");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Zaplatit nyní");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Zaplatit hned");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'Ulice je povinná a nemůže být prázdná');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH', 'Ulice musí mít více než 6 a méně než 96 znaků');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'Město je povinné a nemůže být prázdné');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'Zip je povinný a nemůže být prázdný');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'Zip musí mít více než 3 a méně než 12 znaků');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'E -mailová adresa je povinná a nemůže být prázdná');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'Vstup není platná e -mailová adresa');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'E -mail musí mít více než 6 a méně než 65 znaků');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY', 'Jméno držitele karty je povinné a nemůže být prázdné');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH', 'Jméno držitele karty musí mít více než 6 a méně než 70 znaků');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'Číslo kreditní karty je povinné a nemůže být prázdné');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'číslo kreditní karty je neplatné');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'Je vyžadován měsíc vypršení platnosti');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'Měsíc vypršení platnosti může obsahovat pouze číslice');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'rok vypršení platnosti je vyžadován');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'Rok vypršení platnosti může obsahovat pouze číslice');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'CVV je povinné a nemůže být prázdné');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'hodnota není platným CVV');

jr_define ('STRIPE_PAYMENT_FAILED', "Litujeme, v tuto chvíli se nám nepodařilo zpracovat vaši platbu.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Zkuste to znovu");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "Platba byla odmítnuta.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "Příliš mnoho požadavků odeslaných do API příliš rychle");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "Do API Stripe byly dodány neplatné parametry");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "Ověření pomocí API Stripe se nezdařilo");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "Síťová komunikace s Stripe selhala (vypadlo vám připojení k internetu?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "Došlo k nezachycené chybě");