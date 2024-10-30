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


jr_define('_CLONE_TARIFFS_TITLE',"Clonage des tarifs");
jr_define('_CLONE_TARIFFS_INFO',"Ici, vous pouvez cloner un tarif d'un établissement cible vers un établissement source. Seules les établissements que vous avez l'autorité de gérer seront disponibles.");
jr_define('_CLONE_TARIFFS_SOURCE',"Établissement source");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarif à cloner");
jr_define('_CLONE_TARIFFS_TARGET',"Établissement cible");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Type de chambres d'établissement cible");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Si le mode d'édition de tarif de l'établissement cible est différent du mode d'édition de tarif de l'établissement source, alors, lors du clonage, les tarifs d'origine de l'établissement cible sont supprimés et son mode d'édition de tarif est modifié pour refléter celui du paramètre de l'établissement source.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Supprimer les tarifs existants sur l'établissement cible ?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Si le mode de modification de tarif de l'établissement cible est identique à celui de l'établissement source, les tarifs existants ne seront pas supprimés. Vous pouvez toutefois choisir de remplacer cette option en définissant cette option sur OUI.");
