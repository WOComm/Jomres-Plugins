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
jr_define ('STRIPE_CONNECT_CONFIG_INFO', "Aquesta passarel·la de Stripe està dissenyada específicament per permetre-li, com a gestor del lloc, rebre una part dels pagaments efectuats als administradors de propietats en el moment de fer la reserva. Abans que es pugui utilitzar, primer heu de configurar la vostra pròpia integració amb Stripe Connecteu. <a href = 'http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class = 'btn btn-primary'>  La documentació d'aquest connector es pot trobar aquí. </a> <br/> Si feu clic a Desa en aquesta pàgina, per permetre que aquest connector funcioni perfectament  la resta de passarel·les es desactivaran </ strong> Abans de començar, assegureu-vos d'haver anat a la pàgina de Stripe Connect i indiqui que esteu configurant una plataforma. Un cop fet això, seguiu les instruccions que apareixen a la pantalla per configurar el compte. Abans que els administradors puguin connectar el seu compte amb el vostre, heu de visitar Configuració> Configuració de connexió i a l'àrea \"Configuració OAuth\" heu habilitat OAuth per a comptes estàndard i, a continuació, feu clic a Desa (tingueu en compte que haurà de fer-ho tant en modes Prova com en mode directe). ");

jr_define ('STRIPE_REGISTER_CONNECT', "Connecteu amb nosaltres!");
jr_define ('STRIPE_REGISTER_CONNECT_BLURB', "Us heu registrat, però la connexió encara no s'ha completat. Heu de connectar el vostre compte de Stripe amb el nostre lloc web. Un cop fet això, podeu afegir totes les vostres propietats al nostre lloc i començar a fer reserves . ");

jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_TITLE', "Benvingut a");
jr_define ('STRIPE_REGISTER_WELCOME_EMAIL_BLURB', "Abans de començar a configurar les vostres propietats, heu de connectar-nos amb el vostre compte de Stripe. Feu clic a l'enllaç per començar.");

jr_define ('STRIPE_SETUP_INFO', "Ara hem de connectar el vostre compte al nostre, això ens permetrà fer pagaments en nom vostre, així que feu clic al botó Connecta per accedir a Stripe, on podeu confirmar la connexió.");
jr_define ('STRIPE_SETUP_DONE', "Ja esteu connectat amb nosaltres, res més a fer aquí! Tanqueu aquesta finestra i continuem amb el negoci de fer negocis.");
jr_define ('STRIPE_SETUP_THANKS', "Gràcies per connectar-vos amb nosaltres! Podeu tancar aquesta finestra ara.");
jr_define ('STRIPE_SETUP_DISCONNECT', "Desconnecteu el vostre compte.");
jr_define ('STRIPE_SETUP_DISCONNECTED', "Compte desconnectat, podeu tancar aquesta finestra ara.");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID', "Identificador de client Stripe Connect");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC', "Podeu obtenir el vostre identificador de client de Stripe des del vostre <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Tauler> Configuració> Connectar API. les tecles es troben a l’opció del menú de desenvolupadors. </a> ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL', "Assegureu-vos que configureu l'URI de redirecció a <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Connecta> Configuració </a> a <br/> ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY', "Clau secreta");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY', "clau pública");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION', "La vostra Comissió");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC', "Aquesta comissió es retira del pagament enviat al gestor de la propietat en el moment de fer la reserva. Després es col·loca al vostre compte de Stripe mitjançant Stripe. <br/> Aquest és el percentatge de comissió que cobrarà als administradors de propietats La vostra comissió es cobra en funció del cost TOTAL de la reserva, no del valor del dipòsit. <br/> Siga quin sigui el valor que hàgiu establert, us recomanem que configureu la configuració del lloc -> Formulari de reserva -> La xifra mínima de dipòsit almenys el doble d'aquesta xifra, de manera que si voleu cobrar una comissió del 10%, hauríeu de fer que el dipòsit mínim sigui del 20%. ");

jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO', "Stripe Fee European");
jr_define ("STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC", "Aquest és el percentatge que Stripe us cobra per fer pagaments al vostre lloc. Actualment cobren un 1,4% per a targetes europees i un 2,9% per a targetes no europees. Aquesta xifra és necessària per determinar els preus a la reserva i temps de pagament. ");
jr_define ('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO', "Comissió de franja no euro");

jr_define ('STRIPE_PAYMENT_FORM_CREDITCARD', "Número de targeta");
jr_define ('STRIPE_PAYMENT_FORM_EXPIRATION', "Caducitat (MM / AA)");
jr_define ('STRIPE_PAYMENT_FORM_CVC', "CVC");
jr_define ('STRIPE_PAYMENT_FORM_ZIP', "Zip de facturació");
jr_define ('STRIPE_PAYMENT_FORM_SECURE', "Formulari de pagament segur");
jr_define ('STRIPE_PAYMENT_FORM_BILLINGDETAILS', "Detalls de facturació");
jr_define ('STRIPE_PAYMENT_FORM_CARDDETAILS', "Detalls de la targeta");
jr_define ('STRIPE_PAYMENT_FORM_HOLDER', "Nom del titular de la targeta");
jr_define ('STRIPE_PAYMENT_FORM_PAYNOW', "Paga ara");
jr_define ('STRIPE_PAYMENT_FORM_TOPAY', "Per pagar ara");

jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY', 'El carrer és obligatori i no pot estar buit');
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH", "El carrer ha de tenir més de 6 i menys de 96 caràcters");
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY', 'La ciutat és obligatòria i no pot estar buida');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY', 'El codi postal és obligatori i no pot estar buit');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH', 'El codi postal ha de tenir més de 3 i menys de 12 caràcters');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY', 'L\'adreça de correu electrònic és obligatòria i no pot estar buida');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID', 'L\'entrada no és una adreça de correu electrònic vàlida');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH', 'El correu electrònic ha de tenir més de 6 i menys de 65 caràcters');
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY", "El nom del titular de la targeta és obligatori i no pot estar buit");
jr_define ("STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH", "El nom del titular de la targeta ha de tenir més de 6 i menys de 70 caràcters");
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY', 'El número de la targeta de crèdit és obligatori i no pot estar buit');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID', 'El número de la targeta de crèdit no és vàlid');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY', 'El mes de caducitat és obligatori');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS', 'El mes de caducitat només pot contenir dígits');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY', 'L\'any de caducitat és obligatori');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS', 'L\'any de caducitat només pot contenir dígits');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY', 'El cvv és obligatori i no pot estar buit');
jr_define ('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID', 'El valor no és un CVV vàlid');

jr_define ('STRIPE_PAYMENT_FAILED', "Ho sentim, en aquest moment no hem pogut processar el vostre pagament.");
jr_define ('STRIPE_PAYMENT_TRY_AGAIN', "Torneu-ho a provar");

jr_define ('STRIPE_PAYMENT_ERROR_DECLINED', "El pagament s'ha denegat.");
jr_define ('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "S'han fet massa sol·licituds a l'API massa ràpidament");
jr_define ('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS', "S'han proporcionat paràmetres no vàlids a l'API de Stripe");
jr_define ('STRIPE_PAYMENT_ERROR_AUTH_FAILED', "L'autenticació amb l'API de Stripe ha fallat");
jr_define ('STRIPE_PAYMENT_ERROR_NETWORK_FAULT', "La comunicació de xarxa amb Stripe ha fallat (la vostra connexió a Internet ha caigut?)");
jr_define ('STRIPE_PAYMENT_ERROR_UNCAUGHT', "S'ha produït un error no capturat");