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

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_TITLE',"Prenotazione bloccate");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_DESC',"Le prenotazioni bloccate sono prenotazioni che occupano una camera, camere o una struttura, ma non hanno dati di fatturazione o fatture emesse. In genere vengono utilizzate per indicare le prenotazioni effettuate tramite un altro mezzo (es. Telefono). Potresti creare prenotazioni bloccate per assicurarti che determinate risorse non possano essere prenotate online, né dal manager della struttura né da un ospite.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_SELECTAROOM',"Devi selezionare almeno una camera.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED'," Prenotazione effettuata correttamente.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_NOT_BOOKED',"  Impossibile prenotare perché ha già una prenotazione in quel periodo.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ROOM_BOOKED_BY',"Camera bloccata da ");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_MRP',"Usa questo calendario per inserire facilmente le risorse nelle prenotazioni bloccate. Scegli una o più camere, quindi cliccare sulla prima e sull'ultima data della prenotazione bloccata e le risorse saranno aggiunte alle prenotazioni bloccate. Se la prenotazione bloccata è per una sola data, cliccare due volte su quella data.");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_INSTRUCTIONS_SRP',"Usa questo calendario per inserire facilmente le risorse nelle prenotazioni bloccate Fare clic sulla prima e sull'ultima data della prenotazione bloccata e le risorse saranno aggiunte alle prenotazioni bloccate. Se la prenotazione bloccata è per una sola data, cliccare due volte su quella data.");

jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ADDALL',"Aggiungi tutto");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_REMOVEALL',"Rimuovi tutto");
jr_define('_JOMRES_BLACKBOOKINGS_IMPROVED_ITEMSSELCTED'," elementi selezionati");