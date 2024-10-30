<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 29/06/2019 - https://www.valtari
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('_OCCUPANCIES_TITLE',"Occupations minimales");

jr_define('_OCCUPANCIES_DESCRIPTION',"Vous pouvez définir les niveaux d'occupation minimum pour des types de chambres spécifiques si vous voulez vous assurer que le client a sélectionné un certain nombre de types de clients dans le formulaire de réservation, et cela avant d'afficher la combinaison de chambre et de tarif appropriée.");
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Ici, vous pouvez créer un niveau d'occupation minimum pour chaque type de chambre. Une combinaison chambre/tarif ne sera pas proposée, si l'invité n'a pas sélectionné le nombre approprié de types de clients. Pour chaque type de chambre, veuillez sélectionner le nombre de personnes d’un type donné pour lequel le formulaire de réservation doit contenir au minimum avant que le type de chambre ne soit offert. Si le niveau d'occupation d'un type de chambre ne vous intéresse pas, laissez le numéro de client de ce type de chambre défini sur 0 (zéro). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Numéro de type de clients");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Vous n'avez encore créé aucun type de clients. Veuillez créer certains types de clients avant d'utiliser cette fonctionnalité.");

jr_define('_OCCUPANCIES_EDIT',"Modifier l'occupation miminale pour ");
