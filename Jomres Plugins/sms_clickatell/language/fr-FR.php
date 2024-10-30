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

jr_define('_JRPORTAL_SMS_CLICKATELL_TITLE', 'Intégration d\'envoi de SMS avec Clickatell');
jr_define('_JRPORTAL_SMS_CLICKATELL_USERNAME', 'Identifiant');
jr_define('_JRPORTAL_SMS_CLICKATELL_PASSWORD', 'Mot de passe');
jr_define('_JRPORTAL_SMS_CLICKATELL_APIID', 'ID PI');
jr_define('_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER', 'Numéro de mobile recevant les notifications');
jr_define('_JRPORTAL_SMS_CLICKATELL_NOTIFICATION_MOBILENUMBER_DESC', "Veuillez utiliser le format Code pays + numéro de téléphone mobile. Par exemple, un numéro de téléphone mobile basé au Royaume-Uni serait quelque chose comme 447979123456. Laissez ce champ vide, si vous ne souhaitez pas envoyer de SMS de notification sur votre téléphone portable.");
jr_define('_JRPORTAL_SMS_CLICKATELL_TABTITLE', 'SMS');
jr_define('_JRPORTAL_SMS_CLICKATELL_INSTRUCTIONS', "<b>De toute évidence, vous ne pouvez pas utiliser/tester cette passerelle à partir de localhost, vous devrez le faire sur un serveur en production.</b><br/><br/>Pour utiliser la passerelle Clickatell, vous devez disposer d'un compte Clickatell et d'au moins une connexion enregistrée (instance de sous-produit API) entre votre application et notre passerelle. Chaque méthode de connexion est connue comme un sous-produit. Voici comment : <br/><br/><b>Step 1 - register for a Clickatell account</b><br/>Si vous n'avez pas encore de compte Clickatell, vous devez en créer un comme indiqué ci-dessous. Sinon, passez à l'étape 2.<br/>* Allez sur http://www.clickatell.com/products/sms_gateway.php et choisissez le sous-produit API (méthode de connexion) que vous souhaitez utiliser (Clickatell Central (API)).<br/>* Cliquez sur le lien d'inscription.<br/>* Remplissez le formulaire d'inscription.<br/>Après avoir soumis le formulaire avec succès, vous serez automatiquement connecté à votre nouveau compte et dirigé vers une page sur laquelle vous pourrez ajouter la connexion d'API choisie.<br/><b>Étape 2 - ajouter une connexion API enregistrée (sous-produit)</b><br/>Si vous n'êtes pas déjà connecté à votre compte, vous devez le faire à l'adresse http://www.clickatell.com/login.php.<br/>* Sélectionnez Gérer mes produits dans le menu supérieur.<br/>* Sélectionnez le type de connexion API que vous souhaitez utiliser (API HTTP) dans le menu déroulant (Ajouter une connexion).<br/>* Complétez le formulaire. Assurez-vous que vous entrez l'adresse IP verrouillée (l'adresse IP de ce serveur), définissez Callback sur HTTP POST. Vous devez définir le rappel IP sur .get_showtime('live_site')./Index.php?Option=com_jomres&task=sms_clickatell_callback et sur un ID utilisateur et un mot de passe.<br/>Si vous enregistrez plusieurs connexions API, le nom de description que vous entrez pour chacune doit être unique - vous ne pouvez pas avoir plusieurs API portant le même nom.<br/>Une fois le formulaire correctement envoyé, vos détails d’authentification seront affichés, y compris l’ID API unique de chaque connexion (api_id). Ces informations d'authentification sont requises lors de la connexion à la passerelle Clickatell pour envoyer un message.<br/><br/>Utilisez vos identifiant utilisateur, mot de passe et api_id pour renseigner les champs ci-dessus.<br/><br/>" );
