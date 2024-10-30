<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 24/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('STRIPE_TITLE',"Stripe");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"Cette passerelle de paiement Stripe est spécialement conçue pour vous permettre, en tant que gestionnaire de site, de recevoir une partie des paiements versés aux gestionnaires d'établissement au moment de la réservation. Avant de pouvoir l’utiliser, vous devez d’abord configurer votre propre intégration avec Stripe Connect. <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target ='_blank' class = 'btn btn-primary'> La documentation de ce plug-in est disponible ici.</a><br/> Si vous cliquez sur Enregistrer sur cette page, pour permettre à ce plug-in de fonctionner de manière transparente, toutes les autres passerelles seront désactivées.");

jr_define('STRIPE_REGISTER_CONNECT',"Connectez-vousi avec nous !");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"Vous vous êtes inscrit, mais la connexion n'est pas encore terminée. Vous devez connecter votre compte Stripe à notre site Web. Une fois cela fait, vous pouvez ajouter toutes vos établissement sur notre site et commencer à prendre des réservations.");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"Bienvenue à ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"Avant de pouvoir commencer à configurer votre établissement, vous devez nous connecter avec votre compte Stripe. Cliquez sur le lien pour commencer.");

jr_define('STRIPE_SETUP_INFO',"Nous devons maintenant connecter votre compte au nôtre. Cela nous permettra de prendre les paiements en votre nom. Cliquez donc sur le bouton Connect pour vous rendre à Stripe, où vous pourrez confirmer la connexion.");
jr_define('STRIPE_SETUP_DONE',"Vous êtes déjà connecté avec nous, rien de plus à faire ! Fermez cette fenêtre, merci.");
jr_define('STRIPE_SETUP_THANKS',"Merci de vous êtes connecté avec nous ! Vous pouvez fermer cette fenêtre maintenant.");
jr_define('STRIPE_SETUP_DISCONNECT',"Déconnectez votre compte.");
jr_define('STRIPE_SETUP_DISCONNECTED',"Compte déconnecté, vous pouvez fermer cette fenêtre maintenant.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Compte déconnecté, vous pouvez fermer cette fenêtre maintenant.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"Vous pouvez obtenir votre ID client Stripe à partir de votre <a href='https://dashboard.stripe.com/account/applications/settings 'target='_blank'> tableau de bord (Dashboard). </a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"Assurez-vous de définir votre adresse URI de redirection dans <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'> Connect (connexion) > Settings (réglages)</a> à <br/>.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"Secret key (clef secrète)");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"Public key (clef public)");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"Votre commission");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"Cette commission provient du paiement envoyé au gérant de l'établissement au moment de la réservation. Il est ensuite placé dans votre compte Stripe par Stripe. <br/> Il s'agit du pourcentage de commission que vous facturez aux gestionnaires d'établissement pour leurs réservations. Votre commission est facturée en fonction de l’intégralité du coût de la réservation et non de la valeur de l’acompte. <br/> Quelle que soit la valeur que vous définissez, nous vous recommandons de configurer, dans Configuration du site -> Formulaire de réservation, le montant de l'acompte minimum au moins du double de ce chiffre. Par conséquent, si vous souhaitez facturer une commission de 10%, vous devez définir le paramètre minimum d'acompte à 20%.");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"Frais Stripe Europe");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"C'est le pourcentage que Stripe vous facture pour effectuer des paiements sur votre site. Actuellement, ils facturent 1,4% pour les cartes européennes et 2,9% pour les cartes non européennes. Ce chiffre est nécessaire pour déterminer les prix au moment de la réservation et du paiement.");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"Frais Stripe hors Europe");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"Numéro de carte");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"Expiration (MM/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"Code de facturation");

jr_define('STRIPE_PAYMENT_FORM_SECURE',"Formulaire sécurisé de paiement");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"Informations de la facturation");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"Informations de la CB");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"Nom du porteur de la CB");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"Payer maintenant");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','L\'adresse est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','L\'adresse doit comporter entre 6 et 96 caractères !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','La ville est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','Le Code Postal est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','Le Code Postal doit comporter plus de 3 caractères et moins de 12 caractères !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','Le mail est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','Le mail n\'est pas au format valide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','Le mail doit comporter plus de 6 caractères et moins de 65 caractères !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','Le nom du titulaire de la carte est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','Le nom du titulaire de la carte doit comporter plus de 6 caractères et moins de 70 caractères !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','Le numéro de carte de crédit est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','Le numéro de carte de crédit est invalide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','Le mois d\'expiration est obligatoire !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','Le mois d\'expiration ne peut contenir que des chiffres !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','L\'année d\'expiration est obligatoire !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','L\'année d\'expiration ne peut contenir que des chiffres !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','Le CVV est obligatoire et ne peut pas être vide !');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','La valeur renseignée n\'est pas un CVV valide !');

jr_define('STRIPE_PAYMENT_FAILED',"Désolé, nous ne pouvons pas traiter votre paiement pour le moment !");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"Veuillez réessayer, merci !");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"Le paiement a été refusé !");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT',"Trop de requêtes ont été adressées à l'API trop rapidement !");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"Des paramètres non valides ont été fournis à l'API de Stripe !");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"L'authentification avec l'API de Stripe a échoué !");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"La communication réseau avec Stripe a échoué ! Votre connexion Internet a-t-elle été interrompue ?");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"Une erreur non identifiée s\'est produite !");
