<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2015 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 01/07/2019 - https://www.valtari.fr
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die();
// ################################################################

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Channel Management");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Gestion des canaux");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Le client peut effectuer des activités de gestion des canaux. Notez que cela donne au client un pouvoir considérable dans le système pour modifier vos comptes et propriétés.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Nettoyage");

jr_define('_CMF_CANCELLED_BOOKING',"Le gestionnaire de la chaîne a annulé la réservation");

jr_define('_CMF_CLEANING_STRING',"Nettoyage"); // Ne modifiez pas cela si vous avez déjà importé des propriétés. Les propriétés avec frais de ménage ont un Extra avec ce nom
jr_define('_CMF_SECURITY_STRING',"Dépôt de garantie"); // Ne modifiez pas cela si vous avez déjà importé des propriétés. Les propriétés avec des dépôts de garantie ont un Extra avec ce nom


jr_define('_CMF_API_PRIVACY',"Confidentialité API");
jr_define('_CMF_API_PRIVACY_ON',"Confidentialité activée");
jr_define('_CMF_API_PRIVACY_OFF',"Confidentialité désactivée");

jr_define('_CMF_API_PRIVACY_DESC',"Les informations d'une propriété ne peuvent être vues que par le canal qui l'a créée. Par exemple, si vous avez donné différentes paires de clés API à la fois au canal A et au canal B, les informations d'une propriété créée par le canal A ne peuvent pas être vu par le canal B... sauf si vous désactivez la confidentialité de l'API pour permettre à tous les canaux de voir toutes les informations de la propriété via l'API. Définissez la confidentialité de l'API sur Désactivé si vous partagez cette propriété avec un autre site qui souhaite répertorier la propriété. Si vous ne partagez pas cette propriété avec d'autres sites, laissez la confidentialité de l'API sur On.");