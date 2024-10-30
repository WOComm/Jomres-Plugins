<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 01/07/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Cette méthode d\'intégration met à jour une liste Mailchimp lorsque vous ajoutez un client au système.<br/>Vous n\'avez pas besoin de définir l\'URL d\'entrée pour ce Webhook, nous allons le déterminer en fonction de votre API.<br/>Pour configurer ce Webhook, vous aurez besoin de deux informations, une clé API et l\'ID de la liste. <br/>Pour trouver votre clé API, allez sur votre compte Mailchimp et : <br/> <ol><li>Cliquez sur le nom de votre profil pour développer le panneau de compte, puis choisissez Compte.</li><li>Cliquez sur le menu déroulant Extras et choisissez les clés de l\'API.</li><li>Copiez une clé d\'API existante ou cliquez sur le bouton Créer une clé.</li><li>Nommez votre clé de manière descriptive afin de savoir quelle application utilise cette clé.</li></ol>Ensuite, vous aurez besoin de l\'ID de la liste, que vous pourrez trouver en consultant vos listes dans Mailchimp. Cliquez sur le lien du menu Listes et à la fin de la ligne, cliquez avec le bouton droit de la souris sur le menu déroulant, puis choisissez Paramètres. Faites défiler vers le bas de cette page, il dira quelque chose comme Identifiant de liste pour une liste de x. Ceci est l\'ID de la liste que vous devez utiliser.' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'Clé API' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'ID de liste' );