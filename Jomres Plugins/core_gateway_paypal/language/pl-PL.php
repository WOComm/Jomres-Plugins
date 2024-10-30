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

jr_define('PAYPAL_API_KEY_TITLE',"Klucz API PayPal");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Skonfiguruj swój identyfikator klienta Paypal i tajny klucz zarówno dla kont rzeczywistych, jak i piaskownicy. Po skonfigurowaniu będziesz mógł przyjmować zarówno rezerwacje, jak i faktury za pośrednictwem Paypal.");

jr_define('PAYPAL_API_CLIENTID',"Identyfikator klienta");
jr_define('PAYPAL_API_SECRET',"Secret");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"Identyfikator klienta piaskownicy");
jr_define('PAYPAL_API_SECRET_SANDBOX',"Sekret piaskownicy");

jr_define('PAYPAL_API_CLIENTID_FINDING',"Jak znaleźć swój identyfikator klienta i sekret?");

jr_define('PAYPAL_API_CLIENTID_STEP1','Przejdź do https://developer.paypal.com/ i zaloguj się.');
jr_define('PAYPAL_API_CLIENTID_STEP2',"Przejdź do Moich aplikacji i danych logowania w menu bocznym.");
jr_define('PAYPAL_API_CLIENTID_STEP3',"kliknij Utwórz aplikację, aby utworzyć nową aplikację");
jr_define('PAYPAL_API_CLIENTID_STEP4',"Nadaj nazwę swojej aplikacji, a następnie kliknij Utwórz aplikację.");
jr_define('PAYPAL_API_CLIENTID_STEP5',"Na tej stronie możesz zobaczyć swój identyfikator klienta i sekret. Skopiuj i wklej te klucze do odpowiednich pól powyżej.");