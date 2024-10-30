<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################
jr_define('_CLONE_TARIFFS_TITLE',"Klon-Tarife");
jr_define('_CLONE_TARIFFS_INFO',"Hier können Sie einen Tarif von einer Zielimmobilie auf eine Quellimmobilie klonen. Ihnen stehen nur Eigenschaften zur Verfügung, die Sie verwalten können.");
jr_define('_CLONE_TARIFFS_SOURCE',"Quelleigenschaft");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarif zum Klonen");
jr_define('_CLONE_TARIFFS_TARGET',"Zieleigenschaft");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Zielobjekt-Zimmertyp");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Falls sich der Tarifbearbeitungsmodus der Ziel-Eigenschaft vom Tarifbearbeitungsmodus der Quell-Eigenschaft unterscheidet, werden beim Klonen die ursprünglichen Tarife der Ziel-Eigenschaft gelöscht und der Tarifbearbeitungsmodus geändert, um den der Quelle widerzuspiegeln Einstellung der Eigenschaft.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Vorhandene Tarife auf Zielobjekt löschen?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Wenn der Tarifbearbeitungsmodus der Ziel-Eigenschaft der gleiche ist wie der Quell-Eigenschaft, dann werden die bestehenden Tarife nicht gelöscht. Sie können dies jedoch überschreiben, indem Sie diese Option auf Ja setzen.");