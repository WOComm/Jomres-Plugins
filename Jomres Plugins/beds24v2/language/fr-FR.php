<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2017 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 19/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'Channel Manager Beds24' );

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24' );
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Si vous possédez un compte Beds24 et souhaitez mettre à jour Beds24 lors de votre réservation, sélectionnez cette option. Renseignez l\'URL https://www.beds24.com/api/json/' );

// Error messages

jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'Cet utilisateur n\'a pas de clé API définie et ne peut donc pas continuer. Visitez leur page dans la page Gestion des utilisateurs > Gestionnaires d\'établissement et créez-leur une nouvelle clé d\'API à l\'aide du lien fourni sur cette page.' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Cet utilisateur ne peut attribuer aucun établissement Jomres à un établissement Beds24, ou inversement.' );

// Registration

jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "Le manager avec lequel vous êtes connecté ne semble pas avoir de compte chez Beds24. Vous devez donc vous inscrire au service, puis enregistrer cette clé API sur <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Le site Web de Beds24 ici.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Copiez et collez cette clé API dans le champ LIEN de votre compte Beds24 pour continuer." );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Ceci fait, cliquez sur le bouton ci-dessous pour continuer." );

// Display properties

jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24 property linking" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "Cette page vous permet d'afficher les établissements auxquels vous avez accès, ainsi que celles qui existent dans le Channel Manager. Il vous permet également d'importer des établissements du Channel Manager dans ce système ou d'exporter des établissements existantes vers le Channel Manager. <br/> Si vous avez des établissements à la fois dans ce système et dans Beds24 et que vous souhaitez les lier les unes aux autres, vous pouvez utiliser la Property apikey pour le faire. Rendez-vous à Beds24 > Paramètres > Établissements (Properties).(Assurez-vous que l'établissements sélectionné dans le menu déroulant est identique à celle que vous souhaitez lier. Puis, dans le sous-menu Lien, sauvegardez la Property apikey dans le champ 'propKey' de Beds24. Une fois que vous avez fait cela, rechargez la page. Ce système verra que les deux établissements sont associés à la même clé et créeront les associations nécessaires. Une fois les deux établissements liées, n'oubliez pas de visiter la page Afficher la établissement, recherchez l'URL de notification et collez-la dans le champ URL de notification de la page de liaison. Cela garantira que Beds24 utilise le lien correct pour synchroniser les réservations avec cet établissement lors de la réception des réservations." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Erreur ! Il n'y a aucun établissement que vous pouvez relier dans Beds24. Cela peut être dû au fait que tous les établissement, pour lesquels vous avez des droit, sont déjà reliés à un autre compte de ce système." );

jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "UID de l'établissement" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Nom de l'établissemnt" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "UID d'établissement dans Beds24" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Nom de l'établissemnt dans Beds24" );


jr_define( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "ApiKey d'établissement (Property apikey)" );

// Property import
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "Importer");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Configurer les types de chambres");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Ici, vous devez associer les types de chambres de votre compte Beds24 avec ceux stockés dans ce système.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Type de chambre dans Beds24");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Impossible d'importer cet établissement pour l'instant, car vous n'avez pas défini la clé d'établissement (Property Key) dans la page Lien de l'établissement (Property Link).");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Impossible d'importer cet établissement pour l'instant, car il ne possède aucune chambre. Veuillez créer une ou plusieurs chambres (les chambres dans Beds24 sont identiques aux types de chambres à Jomres) et n'oubliez pas de définir le prix minimal. Une fois que vous avez terminé, vous pouvez importer le type de chambre dans Jomres et les associer ensuite aux types de chambres. Après cela, vous pourrez modifier les tarifs, mais un prix minimum doit être défini initialement.");
jr_define('_BEDS24_SUGGESTED_KEY', "Nous vous suggérons d'utiliser cette clé API. Une fois fait , rechargez cette page.");

// Property Export

jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Exportation");

// REST API

jr_define( 'BEDS24V2_REST_API_INTRO', "Ici, vous pouvez voir votre paire de clés REST API et le chemin d'accès à l'API. Si vous enregistrez ces informations dans votre compte sur Beds24, Beds24 24 pourra contacter ensuite ce site via son API." );
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "Client ID" );
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "Client Secret" );
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (endpoint)" );

// Property settings

jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "Voir l'établissement");

// Room type linking

jr_define('BEDS24_ROOM_TYPES_TITLE', "Asscoiations des types de chambres");
jr_define('BEDS24_ROOM_TYPES_INFO', "Cette page vous permet d’associer vos types de chambres à ceux sur les serveurs Beds24.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Tant que les types de chambres ne sont pas liés, vous ne pouvez pas recevoir les informations de réservation envoyées par Beds24. Si votre établissement a été importé/exporté vers ou depuis Beds24, nous avons automatiquement créé les liens pour vous. Toutefois, si vous ajoutez un nouveau type de chambre ou en supprimez un, cette page peut être utilisée pour garantir que le type de chambre est correctement associé.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Choisissez les types de chambres Beds24 que vous souhaitez associer aux types de chambres de Jomres, puis cliquez sur Enregistrer pour mettre à jour les modifications apportées à Beds24.");

jr_define('BEDS24_ROOM_TYPES_YOURS', "Vos types de chambres");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Les types de chambres Beds24");
jr_define('BEDS24_ROOM_TYPES_NONE', "Cet établissement ne possède aucun type de chambre, il ne peut donc être liée à aucun type de chambre Beds24. Souhaitez-vous importer des types de chambres de Beds24 ?");
jr_define('BEDS24_IMPORT_ROOMS', "Importer les chambres");

jr_define('BEDS24_EXPORT_BOOKINGS', "Exporter les réservations");
jr_define('BEDS24_IMPORT_BOOKINGS', "Importer les réservations");
jr_define('BEDS24_IMPORT_EXPORT', "Vous pouvez importer et exporter des réservations existantes de et vers Beds24 en un seul clic. Les réservations importées de Beds24 sont importées d'hier et comprendront toutes les réservations de l'année prochaine. Vous ne devez utiliser ces boutons qu'après la première importation ou exportation de létablissement dans le système. Une fois la configuration faite, l'importation et/ou l'exportation se feront automatiquement.");

jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Actualiser les prix dans Beds24 ?");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "Vous pouvez choisir de mettre à jour Beds24 avec uniquement la disponibilité ou à la fois la disponibilité et les prix. Si vous utilisez des situations spécifiques dans lesquelles vous souhaitez utiliser le panneau de commande Beds24 pour définir des prix spécifiques pour des canaux spécifiques, laissez cette option sur NON.");

jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Lien direct");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "Si vous avez importé cet établissement dans Jomres, vous devrez modifier manuellement l'URL de notification dans votre Beds24 -> Établissement (Property) -> Lien de paramètres (Link settings) : ");

jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Vous n'avez actuellement aucun établissement associé aux établissements dans Beds24. Vous devez réinitialiser les clés API des gestionnaires d'établissement avant de permettre à vos gestionnaires de tenter de se connecter à Beds24. Cela garantira qu'ils ont tous des clés uniques.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Réinitialiser les clés API des gestionnaires maintenant");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Ignorer l'avertissement");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Les clés API des gestionnaires ont été réinitialisées");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "liens des établissements dans Beds24" );
jr_define('BEDS24_ASSIGN_MANAGER', "Gestionnaire de changement dans Beds24");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "Lorsqu'un gestionnaire visualise la page Channel Management (Beds24) dans l'interface en ligne, toutes les établissements qui partagent une clé API dans Jomres et dans Beds24 sont automatiquement liés dans Jomres. De même, tous les établissements importés ou exportés par le gestionnaire sont liés. Vous pouvez modifier le gestionnaire, auquel un établissement est lié, en modifiant le menu déroulant du gestionnaire sur cette page, puis en cliquant sur Enregistrer.");


jr_define( 'BEDS24V2_TARIFFS_TITLE', "Exportation tarifaire" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "Vous pouvez exporter les tarifs que vous avez créés vers Beds24 vers un tarif journalier spécifique. Si vous envisagez d’utiliser cette fonctionnalité, vous devez définir le paramètre 'Actualiser les prix dans Beds24 ?' sur NON dans la configuration de l'établissement (property) . Vous devrez peut-être également configurer votre établissement dans le panneau de configuration de Beds24, afin de disposer de plusieurs tarifs journaliers. Pour ce faire, accédez à Paramètres > Établissement (Properties) > Chambres > Prix journaliers et configurez le 'Montant du prix journalier' sur le nombre souhaité. Une fois fait, vous pourrez cliquer sur l’un des boutons P pour valider ce tarif journalier." );

jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Nom du tarif" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Type de chambre" );

jr_define( 'BEDS24V2_BOOKING_RESEND', "Renvoyer la notification" );
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "Ce sont les informations de réservation telles qu'elles sont stockées dans Beds24. Sauf si vous êtes sûr que les données sont incorrectes, vous ne devriez pas avoir à renvoyer la réservation à Beds24." );
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "Cette réservation ne semble pas être associée à une réservation dans Beds24. Vous pouvez utiliser le bouton Renvoyer pour exporter cette réservation vers beds24." );

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Anonymiser les clients ?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Lorsque les réservations sont envoyées au Channel Manager (Beds24), nous vous recommandons d'anonymiser les informations des clients. Si vous définissez cette option sur OUI, lorsque le nom du client est envoyé au Channel Manager le mail ne l’est pas. Les OTAs auront un enregistrement précis de votre disponibilité sans que vous ayez besoin de partager plus d'informations que nécessaire. Cela signifie que vous êtes en conformité avec le RGPD, car si le client choisit ultérieurement de supprimer ses informations sur ce système (vous n'êtes pas averti lorsque cela se produit), ses informations ne sont pas laissées à d'autres responsable des données (DPO), sur lesquels vous n'avez aucun contrôle. Si nécessaire, vous pouvez toujours comparer les réservations de ce système avec celles du Channel Manager. La page Informations de la réservation vous indiquera le numéro de réservation, car il est enregistré dans le Channel Manager." );

jr_define( 'BEDS24V2_MASTER_APIKEY', "FONCTION EXPERIMENTALE - Clé API Master Beds24" );
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "SI VOUS AVEZ DÉJÀ UNE INSTALLATION DE JOMRES AVEC DES ÉTABLISSEMENT LIÉS À BEDS24, LISEZ LA DESCRIPTION COMPLÈTE ICI. Par défaut, Jomres est conçu pour être une plateforme de réservation multi-vendeurq. Les gestionnaires disposant de leurs propres comptes Beds24 peuvent importer leurs établissements de et vers Beds24 en toute sécurité. Ce paramètre vous permet de remplacer cette fonctionnalité en ayant une seule clé API pour tous les établissements. Cela signifie que vous n'avez besoin que d'un seul compte avec Beds24, mais cela signifie également que tous les frais seront portés à ce compte. Tout gestionnaire ayant accès à un établissement pourra envoyer des mises à jour à l'établissement sur les serveurs de Beds24. Laissez ce champ vide pour ignorer ce paramètre et obliger les gestionnaires d'établissements à utiliser leur propre compte Beds24. La clé API peut prendre la forme que vous souhaitez, tant qu'elle correspond à celle du <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> Champ <em> Clé API 1 </ em> </a>. SI VOUS AVEZ DÉJÀ UNE INSTALLATION DE JOMRES AVEC DES ÉTABLISSEMENT LIÉS À BEDS24 : vous pouvez passer à l’utilisation de cette fonctionnalité. Toutefois, vous devrez d’abord vider (truncate) ces tables dans la base de données, supprimer les établissements existants déjà présentes dans Jomres, puis les réimportez de Beds24 dans Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> When setting your API key in the <em>API Key N</em> section of Beds24's Account Access page it's vital that you set the <em>API Key Access</em> field to 'Allow whitelist IP only' and you set the IP number to <strong>".$this_servers_ip_number ."</strong>. This applies equally for the master API key configuration here, and in the frontend if a property manager is configuring their own individual API keys. " );

jr_define( 'BEDS24V2_WHITELIST_WARNING', "Si vos établissements ont déjà été connectés à Beds24, sachez que Beds24 a récemment introduit une stratégie selon laquelle tous les serveurs se connectant à votre compte doivent avoir été ajoutés à la liste blanche. Vous pouvez le faire sur la page d'accès au compte, où votre clé d'accès a été saisie. Sélectionnez le menu déroulant IP de la liste blanche et définissez le numéro IP sur " );
