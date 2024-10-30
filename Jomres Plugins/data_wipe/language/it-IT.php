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

jr_define('_JOMRES_DATAWIPE_TITLE',"Cancellazione dati");
jr_define('_JOMRES_DATAWIPE_DESC',"Questa funzione ti consente di eliminare i dati raccolti quando vengono effettuate le prenotazioni. È destinata all'uso da parte degli sviluppatori che hanno creato molti dati di sviluppo sulle loro installazioni (come prenotazioni di prova, abbonamenti) e desiderano cancella le informazioni dal sistema, mantenendo le informazioni su proprietà e tariffe.<br/> Il plug-in rimuoverà TUTTI i registri cron, i preferiti utente, le note, le prenotazioni, le fatture, gli abbonati, gli abbonamenti, gli ospiti, i dati di controllo, il conteggio dei clic e le recensioni." );
jr_define('_JOMRES_DATAWIPE_WARNING',"Questi dati possono essere recuperati solo da una copia di backup del tuo sistema, quindi devi capire che si tratta di uno script molto dannoso. Di conseguenza, si consiglia di utilizzarlo per scopo di disinstallarlo nuovamente in seguito.");
jr_define('_JOMRES_DATAWIPE_GO',"Clicca per cancellare i dati");
jr_define('_JOMRES_DATAWIPE_EMPTYING',"Svuotamento in corso");
jr_define('_JOMRES_DATAWIPE_EMPTYING_SUCCESS',"Svuotato con successo.");
jr_define('_JOMRES_DATAWIPE_EMPTYING_FAILURE',"Impossibile svuotare la tabella.");