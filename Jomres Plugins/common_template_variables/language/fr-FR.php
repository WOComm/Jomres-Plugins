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

jr_define('_COMMON_STRINGS_TITLE',"Variables communes de template ");

jr_define('_COMMON_STRINGS_INFO',"Outil de développement. Conçu pour montrer aux développeurs les chaînes communes disponibles pour tous les templates sans avoir besoin de les ajouter au script d'appel du template. <br/> Par exemple, dans cette liste figure la définition COMMON_NEXT. Un développeur peut ajouter cela à un template Jomres sans avoir à le définir dans le script d'appel. Vous ajouterez la chaîne commune au template comme toute autre chaîne en mettant {COMMON_NEXT} dans le modèle. <br/> Dans la liste ci-dessous, vous verrez la constante telle que définie dans le fichier de langue, puis à côté le résultat (sous réserve qu'il y ait des personnalisations linguistiques spécifiques à la propriété). Notez que dans le cas de la constante 'COMMON_LAST_VIEWED_PROPERTY_UID', la propriété UID varie et n'est pas affichée dans cette liste.");
jr_define('_COMMON_STRINGS_CONSTANT',"Constante");
jr_define('_COMMON_STRINGS_VALUE',"Sortie (Output)");

