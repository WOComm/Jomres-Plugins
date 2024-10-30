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

jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE',"Impostazioni proprietà predefinite");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE',"Titolo configurazione generale (se disponibile, alcuni potrebbero non essere)");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME',"Nome variabile");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE',"Valore attuale");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING',"Questa è una funzionalità avanzata, se non ne hai un uso specifico, è meglio che non la usi. Questo plugin ti permette di modificare i valori predefiniti di una nuova proprietà. Crea assicurati di aver compreso cosa fa la variabile prima di cambiarla poiché modificarla qui potrebbe avere effetti di vasta portata sul tuo sistema Jomres.Gli elementi vuoti sono generalmente impostazioni precedenti che non vengono più utilizzate, ma lasciate in situ per motivi di compatibilità con le versioni precedenti, o sono impostazioni che non può essere modificato tramite l'area Configurazione Proprietà.");
jr_define('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE',"Nuovo valore");