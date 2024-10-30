<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 25/06/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_JOMRES_DATAWIPE_TITLE',"Effacement des données");
jr_define('_JOMRES_DATAWIPE_DESC',"Cette fonctionnalité vous permet de supprimer les données collectées lors des réservations. Il est destiné aux développeurs qui ont créé de nombreuses données de développement lors de leurs installations (telles que des réservations de test, des abonnements) et qui souhaitent effacer les informations du système, tout en conservant les informations de l'établissement et de tarif. <br/> Le plug-in supprime TOUS les journaux cron, les favoris des utilisateurs, les notes, les réservations, les factures, les abonnés et leurs abonnements, les clients, les données d'audit, les avis et leur compteur .");
jr_define('_JOMRES_DATAWIPE_WARNING',"Ces données ne peuvent être récupérées qu'à partir d'une copie de sauvegarde de votre système. Vous devez donc comprendre qu'il s'agit d'un script très dommageable et irréversible. Par conséquent, il est recommandé de le désinstaller après son utilisation.");
jr_define('_JOMRES_DATAWIPE_GO',"Cliquez pour effacer les données");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"Effacement ");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"Effacement réalisé avec succés !");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"Erreur d'effacement de la base de données !");
