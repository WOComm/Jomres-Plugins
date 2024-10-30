<?php

defined( '_JOMRES_INITCHECK' ) or die( '' );

jr_define('DISALLOW_SYNDICATION_TITLE',"Non consentire Syndication");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION',"La funzione di syndication di Jomres.net è una nuova funzionalità progettata per condividere le strutture tra i siti sebbene le prenotazioni possano essere effettuate solo sul server \"Home\". ");

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"Lo scopo di ciò è consentire ai siti di creare fiducia con i motori di ricerca. È una funzionalità gratuita, disponibile per tutti gli utenti Jomres. I titolari di licenza Jomres attivi possono, se lo desiderano, scegliere di rimuovere il loro sito dalla rete di syndication tramite questa pagina. Localhost non può essere aggiunto alla rete e se per qualsiasi motivo si verifica un problema con la connettività non potrai aggiungere il tuo sito alla rete. In caso di dubbi, controlla la pagina di test della connettività dell'API REST.");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"Clicca su questo collegamento per rimuovere il sito dalla rete.");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"Clicca su questo collegamento per aggiungere il sito alla rete.");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"Rimuovi questo sito dalla rete");
jr_define('DISALLOW_SYNDICATION_ALLOW',"Aggiungi questo sito alla rete");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"Spiacenti, la tua chiave di supporto non è valida o non è attiva, non puoi modificare lo stato di syndication di questa installazione.");