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

jr_define('_OCCUPANCIES_TITLE',"Occupazioni Minime");

jr_define('_OCCUPANCIES_DESCRIPTION',"È possibile impostare i livelli minimi di occupazione per tipologie di camera specifiche, se si desidera assicurarsi che l'ospite abbia selezionato un certo numero di tipologie di ospite nel modulo di prenotazione prima che venga visualizzata la combinazione di camera e tariffa appropriata.");
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Qui puoi creare un livello minimo di occupazione per ogni tipologia di camera. Una combinazione camera/tariffa non sarà offerta se l'ospite non ha selezionato il numero appropriato di tipologie di ospite. Per ogni tipologia di camera selezionare il numero minimo di ospiti di una determinata tipologia che dovrebbe essere inserito nel modulo di prenotazione prima che la tipologia di camera venga offerta. Se non ti interessa impostare il livello di occupazione minimo per una specifica tipologia di camera, lascia il numero di ospiti per quella tipologia di camera impostato su 0 (zero). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Numero per tipologia di ospite");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Non hai ancora creato alcuna tipologia di ospite. Crea alcune tipologie di ospite prima di utilizzare questa funzione.");

jr_define('_OCCUPANCIES_EDIT',"Modifica occupazione minima per ");
