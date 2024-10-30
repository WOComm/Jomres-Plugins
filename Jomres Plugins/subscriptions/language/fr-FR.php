<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 30/06/2019 - https://www.valtari
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_SUBSCRIPTIONS_ACTIVE',"Activé");
jr_define('_SUBSCRIPTIONS_EXPIRED',"Non activé");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"Satut de paiement");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"Niveau");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"Modifier l'abonnement");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"Envoyer un mail de rappel de l'expiration de l'abonnement ?");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"Envoyer le mail de rappel");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B'," jour(s) avant l'expritation de l'abonnement");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"Envoyer un mail lorsque l'abonnement a expiré ?");
jr_define('_SUBSCRIPTIONS_MY',"Mes abonnements");
jr_define('_SUBSCRIPTIONS_HRENEW',"Renouveler");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"Renouvellement d'abonnement");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"Vous êtes déjà inscrit, achetez plutôt un renouvellement.");
jr_define('_SUBSCRIPTIONS_HEDIT',"Modifier le forfait d'abonnement");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"Tapez les premières lettres du nom d'utilisateur et vous verrez une liste déroulante avec les noms d'utilisateur correspondant à votre recherche. Cliquez sur un nom d'utilisateur pour le sélectionner.");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"Ce forfait d’abonnement n’est plus disponible et ne peut donc pas être renouvelé. Veuillez envisager de le mettre à niveau.");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"Vous n'êtes pas abonné à ce forfait, vous ne pouvez donc pas le renouveler.");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"Il n'y a pas d'option de renouvellement pour ce forfait");
jr_define('_SUBSCRIPTIONS_CANCEL',"Annuler l'abonnement");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"Fréquence (jours)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"Durée de l'abonnement en jours");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"Les renouvellements ne sont pas autorisés pour ce forfait.");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"Prix du renouvellement");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"0 pour désactiver les renouvellements pour ce package ou entrez un prix pour le renouvellement.");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"Options du forfait");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"Détails du forfait");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"Votre forfait d'abonnement");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"Votre forfait d'abonnement n'inclut pas l'accès à cette fonctionnalité. Pour utiliser cette fonctionnalité, vous devrez mettre à jour votre abonnement.");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "Your subscription has expired and all your listings have been unpublished. Your listings are not visible to guests anymore and your won`t be able to receive online bookings from our website anymore. To continue using our services, publish your listings and start receiving online bookings, please login to your account and purchase a renewal de forfait." );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1', "Votre abonnement à " );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2', " a expiré !" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1', "Ceci est une notification pour vous informer que votre abonnement va bientôt expirer. Pour continuer à utiliser nos services, veuillez vous connecter à votre compte et renouveler votre abonnement." );

jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE', "Forfaits d'abonnement" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME', "Nom" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "Description" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED', "Publié" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY', "Fréquence" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT', "Priix" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT', "Limitation d'entreprises" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC', "Nombre maximum d'entreprises pouvant être ajoutées avec ce forfait d'abonnement" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE', "S'abonner" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "Utiliser la fonctionnalité de gestion des abonnements" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID', "Désolé, cet ID de package n'est pas reconnu." );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL', "Vous ne semblez pas avoir renseigné les détails de votre compte pour le moment. Pour inscrire votre établissement sur le site, vous devez compléter les informations de votre compte avant de pouvoir aller plus loin." );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED', "Vous avez utilisé tous les emplacements d'établissements disponibles dans votre forfait d’abonnement, vous ne pouvez donc pas créer de nouvelles annonces. Veuillez mettre à jour votre forfait, si vous souhaitez créer plus d’annonces." );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"Revenu par année/mois");
jr_define('_SUBSCRIPTION_WARNING',"Vous avez activé les abonnements, mais vous n’avez pas encore créé de forfait d’abonnement. Les propriétaires ne pourront pas enregistrer d'établissement sur votre site avant la création d'au moins un forfait d'abonnement.");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "API Access" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"Vous pouvez accéder à cette fonctionnalité en passant à " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," Forfait d'abonnement. " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'Mettre à niveau');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'Inscrit');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'Paramètres de la passerelle d\'abonnement');
jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'Vous n\'êtes actuellement abonné à aucun forfait d\'abonnement. Veuillez souscrire à un forfait pour continuer à utiliser nos services.');
