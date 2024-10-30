<?php
/**
 * Plugin
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9
* @package Jomres
* @copyright	2005-2016 Vince Wooll
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 29/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable. 
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Importation d'établissements");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Cette fonctionnalité vous permet d'importer des établissements via un fichier CSV. En raison des diverses vérifications requises, nous vous recommandons de limiter le nombre d'établissements et de créer des imports ne dépassant pas 50.");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Fichier à importer");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Le fichier CSV doit comporter 11 colonnes et les champs ne doivent contenir aucun code HTML. Tous les champs sont obligatoire.");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Nom de l'établissement");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Le nombre de chambres (s’il s’agit d’une villa/chalet, alors quelque soit le nombre de chambres dans l’établissement, le nombre de chambres doit être égal à 1. Seuls les hôtels/chambres d'hôtes, etc., devraient disposer de plus d'une chambre). Nombre entier.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"Entier");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Prix par nuitée, sans codes de devise.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Décimal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"Mail");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Adresse");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Ville");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Région. Cela doit correspondre aux identifiants des régions stockées dans la table Regions.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"Entier");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Pays de l'établissement. Code court, par exemple GB ou FR ou DE, nom le nom du pays entier");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Code Postal");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Numéro de téléphone");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Texte");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"La description complète de l'établissement. Maximum de 500 caractères");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"Texte");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Erreur ! Le type d'établissement n'a pas été défini.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Erreur ! Nous n'avons aucun type de chambre pour ce type d'établissement. Vous pouvez corriger cela en visitant Structure du site dans la zone de l’administrateur.");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"Oups, avez-vous oublié de télécharger un fichier ?");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Trop de colonnes trouvées, il se peut que le fichier soit mal formaté ou que les données CSV ne soient pas correctement construites.");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Le nom de l'établissement n'a pas été renseigné !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Le nombre de chambres n'était pas défini !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"Le prix par nuitée n'est pas renseigné !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Impossible de valider l'adresse mail !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Adresse non rernseignée !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Ville non renseignée !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Région non renseignée !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"Pays non renseigné !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Code Postal non renseigné !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"Téléphone non renseigné !");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Description non renseignée !");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"L'établissement a été importé avec succès !");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Comme vous avez un ou plusieurs établissements qui ont échoué(s) à l'importation, nous avons exporté uniquement ces établissement dans le champ ci-dessous. Vous pouvez copier ces établissement dans Excel ou Calc d'Open Office et résoudre les problèmes sans avoir à réimporter à nouveau toutes les propriétés.");
