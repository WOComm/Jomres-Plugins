<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################



	jr_define('CONVERSATIONS',"Conversations");
	jr_define('CONVERSATION',"Vous parlez à ");
	jr_define('CONVERASTIONS_GROUPS',"Groupes");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_1',"Bonjour, bienvenue à ");
	jr_define('CONVERSATIONS_WELCOME_MESSAGE_2',"Comment puis-je vous aider ?");
	jr_define('CONVERSATIONS_PLACEHOLDER',"Entrez votre message...");
	jr_define('CONVERSATIONS_MEMBERS',"Membres du groupe");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_MANAGER',"Il n'y a pas encore de messages ici.");
	jr_define('CONVERSATIONS_NO_CONVERSATIONS_GUEST',"Il n'y a pas encore de messages ici. Vous pouvez démarrer une nouvelle conversation en visitant une propriété et en cliquant sur le bouton de contact pour cette propriété.");
	jr_define('CONVERSATION_NAME',"Nom de la conversation");
	jr_define('CONVERSATION_GROUP_ID',"ID de groupe");
	jr_define('CONVERSATION_UNDREAD_MESSAGES',"Messages non lus");
	jr_define('CONVERSATION_LAST_MESSAGE',"Dernier message");
	jr_define('CONVERSATION_LEAVE_GROUP',"Quitter le groupe");
	jr_define('LIST_CONVERSATIONS_INFO',"Ici vous pouvez voir une liste des conversations. Remarque, les messages non lus font référence aux messages que vous n'avez pas lus personnellement, ils peuvent avoir été lus et répondus par d'autres membres du groupe. Cliquez sur le nom de la conversation pour ouvrir la conversation dans une nouvelle fenêtre.");
	jr_define('CONVERSATION_MODAL_TITLE',"Alerte de conversation");
	jr_define('CONVERSATION_MODAL_NUDGE',"Vous avez de nouveaux messages.");
	jr_define('CONVERSATION_MODAL_GO',"Afficher les conversations");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE',"Système de messagerie");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID',"Identifiant du module de connexion Joomla");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC'," L'identifiant de votre module de connexion. Voir Plugin Infos Plugin pour plus d'informations sur ce paramètre. ");
	jr_define('MESSAGING_SYSTEM_SEARCH_FIELD_PLACEHOLDER',"Rechercher");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_REGISTERED',"Utilisateur enregistré");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_PROPERTY_MANAGER',"Gestionnaire de propriétés");
	jr_define('MESSAGING_SYSTEM_USER_TYPES_ADMINISTRATOR',"Administrateur");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE',"WordPress login shortcode");
	jr_define('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC',"Votre code abrégé de widget de connexion. Voir Plugin Infos Plugin pour plus d'informations sur ce paramètre. ");
	jr_define('MESSAGING_SYSTEM_REST_API_LOCATION_WARNING',"Actuellement, votre installation de Jomres se trouve dans le répertoire /wp-content/plugins/jomres/jomres/, vous ne pouvez donc pas encore utiliser le système de messagerie. Veuillez visiter la page Administrateur > Jomres > Outils > Rest API Test pour plus d'informations et d'instructions. Pour supprimer ce message, déplacez les fichiers comme indiqué sur cette page ou désinstallez le plug-in Messaging.");
	jr_define('MESSAGING_SYSTEM_BSVERSION_WARNING',"Désolé, le système de messagerie de Jomres ne fonctionne que sur les sites avec des thèmes/modèles qui prennent en charge Bootstrap 5 et où le paramètre Configuration du site > onglet Divers > version de Bootstrap est défini sur Bootstrap 5 ou Pas de Bootstrap dans le thème.") ;