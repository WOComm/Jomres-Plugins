<?php
/**
* Jomres CMS Agnostic Plugin
* @author Woollyinwales IT <sales@jomres.net>
* @version Jomres 9 
* @package Jomres
* @copyright	2005-2016 Woollyinwales IT
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################


jr_define('_CLONE_TARIFFS_TITLE',"Clona Tariffe");
jr_define('_CLONE_TARIFFS_INFO',"Qui puoi clonare una tariffa da una struttura di destinazione a una struttura di origine. Saranno disponibili solo le strutture per le quali si dispone dell'autorità di gestione.");
jr_define('_CLONE_TARIFFS_SOURCE',"Struttura Di Origine");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tariffa da clonare");
jr_define('_CLONE_TARIFFS_TARGET',"Struttura Di Destinazione");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Tipologia Di Camera Della Struttura Di Destinazione");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Se la modalità di modifica delle tariffe della struttura di destinazione è diversa dalla modalità di modifica delle tariffe della struttura di origine, quando viene eseguita la clonazione, le tariffe originali della struttura di destinazione verranno eliminate e la modalità di modifica della tariffa cambiata per riflettere quella dell'impostazione della struttura di origine.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Eliminare le tariffe esistenti sulla struttura di destinazione?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Se la modalità di modifica delle tariffe della struttura di destinazione è la stessa della struttura sorgente, le tariffe esistenti non verranno eliminate. Puoi, tuttavia, scegliere di sovrascriverlo impostando questa opzione su Sì.");
