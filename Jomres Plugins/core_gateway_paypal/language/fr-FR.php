<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 21/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('PAYPAL_API_KEY_TITLE',"Paypal API Key");
jr_define('PAYPAL_API_KEY_TITLE_DESC',"Configurez votre ID client Paypal et votre Secret pour vos sites en production et en développement (Sandbox). Une fois configuré, vous pourrez prendre à la fois les paiements de réservation et de facturation via Paypal.");

jr_define('PAYPAL_API_CLIENTID',"Client ID");
jr_define('PAYPAL_API_SECRET',"Secret");
jr_define('PAYPAL_API_CLIENTID_SANDBOX',"Sandbox Client ID");
jr_define('PAYPAL_API_SECRET_SANDBOX',"Sandbox Secret");

jr_define('PAYPAL_API_CLIENTID_FINDING',"Comment trouvez-vous votre identifiant client et votre Secret ?");

jr_define('PAYPAL_API_CLIENTID_STEP1','Allez à https://developer.paypal.com/ and Log In.');
jr_define('PAYPAL_API_CLIENTID_STEP2',"Allez à Mes applications (My Apps) et Certificats (credentials) dans le menu latéral.");
jr_define('PAYPAL_API_CLIENTID_STEP3',"Cliquez sur Créer une application pour créer une nouvelle application");
jr_define('PAYPAL_API_CLIENTID_STEP4',"Donnez un nom à votre application, puis cliquez sur Créer une application.");
jr_define('PAYPAL_API_CLIENTID_STEP5',"Sur cette page, vous pouvez voir votre ID client et votre secret. Copiez et collez ces clés dans les champs respectifs ci-dessus.");
