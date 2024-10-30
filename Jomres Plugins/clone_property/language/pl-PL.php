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

jr_define('_JRPORTAL_CLONEPROPERTY_TITLE',"Właściwość klonowania");
jr_define('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY',"Wybierz właściwość, którą chcesz sklonować: ");
jr_define('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME',"Nazwa nowej właściwości: ");
jr_define('_JRPORTAL_CLONEPROPERTY_NOTES',"Pamiętaj, że właściwości klonowania nie mają taryf, powinieneś użyć wtyczki Clone Tariffs, jeśli chcesz kopiować taryfy lub tworzyć taryfy ręcznie. Żadne ustawienia wtyczki nie są importowane, jeśli są dostępne. Właściwość nie jest powiązana z dowolnymi menedżerami nieruchomości.<br/> Klonuj usługę należy używać tylko do duplikowania usługi, gdy nowa usługa będzie od tego czasu używać tego samego typu usługi i pokoju.");
jr_define('_JRPORTAL_CLONEPROPERTY_DONE',"Właściwość sklonowana");