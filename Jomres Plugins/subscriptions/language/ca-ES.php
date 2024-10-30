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
jr_define('_SUBSCRIPTIONS_ACTIVE',"Active");
jr_define('_SUBSCRIPTIONS_EXPIRED',"No actiu");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Estat del pagament");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Nivell");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Edita la subscripció");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Envia un correu electrònic de recordatori de caducitat de la subscripció?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Envia un correu electrònic de recordatori");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"dies abans que caduqui la subscripció");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Envia un correu electrònic quan caduqui la subscripció?");
jr_define('_SUBSCRIPTIONS_MY',"Les meves subscripcions");
jr_define('_SUBSCRIPTIONS_HRENEW',"Renovar");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Renovació de la subscripció");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Ja us heu subscrit, si us plau, compra una renovació.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Edita el paquet de subscripció");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Escriviu les primeres lletres del nom d'usuari i veureu un desplegable amb noms d'usuari. Feu clic a un nom d'usuari per seleccionar-lo.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Aquest paquet de subscripció ja no està disponible, de manera que no es pot renovar, si us plau, considereu actualitzar-lo.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"No esteu subscrit a aquest paquet, així que no el podeu renovar.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"No hi ha opcions de renovació per a aquest paquet");
jr_define('_SUBSCRIPTIONS_CANCEL',"Cancel·la la subscripció");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Freqüència (dies)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Durada de la subscripció en dies");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Renovacions no permeses per a aquest paquet.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Preu de renovació");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"Definiu-ho a 0 per desactivar les renovacions d'aquest paquet o introduïu un preu per a la renovació");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Opcions del paquet");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Detalls del paquet");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"El vostre paquet de subscripció");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"El vostre paquet de subscripció no inclou accés a aquesta funció. Per utilitzar aquesta funció, haureu d'actualitzar la vostra subscripció.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "La teva subscripció ha caducat i tots els teus llistats s'han anul·lat. Els teus llistats ja no són visibles per als convidats i ja no podràs rebre reserves en línia del nostre lloc web. Per continuar utilitzant els nostres serveis, publica'l les vostres llistes i comenceu a rebre reserves en línia, inicieu sessió al vostre compte i compreu una renovació." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"La teva subscripció a" );
jr_define('_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"ha caducat");
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"Aquesta és una notificació per informar-vos que la vostra subscripció caducarà aviat. Per continuar utilitzant els nostres serveis, inicieu sessió al vostre compte i compreu una renovació." );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"Paquets de subscripció" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"Nom" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',"Descripció" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"Publicat" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"Freqüència" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"Preu" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"Límit de negoci" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"Nombre màxim d'empreses que es poden afegir amb aquest paquet de subscripció" );
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"Subscriu-te");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Utilitza la funcionalitat de gestió de subscripcions");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"Ho sentim, però aquest ID de paquet no es reconeix." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"Sembla que encara no heu emplenat les dades del vostre compte. Per incloure la vostra propietat al lloc, necessitem que completeu les dades del vostre compte abans que puguem anar més enllà." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"Heu utilitzat tots els espais de propietat disponibles al vostre paquet de subscripció, de manera que no podreu crear cap llista nova. Si us plau, actualitzeu el vostre paquet si voleu crear més fitxes." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Ingressos per any/mes");
jr_define('_SUBSCRIPTION_WARNING',"Heu activat les subscripcions, però sembla que encara no heu creat cap paquet de subscripcions. Els propietaris no podran registrar propietats al vostre lloc fins que no es creï almenys un paquet de subscripcions.");
jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS',"Accés a l'API");

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Podeu accedir a aquesta funció actualitzant a " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Paquet de subscripció. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Actualitza');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Subscrit');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Configuració de la passarel·la de subscripció');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'En aquest moment no esteu subscrit a cap paquet de subscripció. Subscriu-te a un paquet per continuar utilitzant els nostres serveis.');
