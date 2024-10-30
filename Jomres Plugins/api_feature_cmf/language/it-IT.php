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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Gestione Canali");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Il cliente può eseguire attività di gestione del canale. Nota, questo dà al cliente un notevole potere nel sistema per modificare i tuoi account e proprietà.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Pulizia");

jr_define('_CMF_CANCELLED_BOOKING',"Gestione canali prenotazione annullata");

jr_define('_CMF_CLEANING_STRING',"Pulizia"); // Non modificarlo se hai già importato proprietà. Le proprietà con spese di pulizia hanno un Extra con questo nome
jr_define('_CMF_SECURITY_STRING',"Deposito cauzionale"); // Non modificarlo se hai già importato proprietà. Le proprietà con depositi cauzionali hanno un Extra con questo nome


jr_define('_CMF_API_PRIVACY',"Privacy API");
jr_define('_CMF_API_PRIVACY_ON',"Privacy attiva");
jr_define('_CMF_API_PRIVACY_OFF',"Privacy disattivata");

jr_define('_CMF_API_PRIVACY_DESC',"Le informazioni di una proprietà possono essere visualizzate solo dal canale che l'ha creata. Ad esempio, se hai fornito coppie di chiavi API diverse sia al Canale A che al Canale B, le informazioni di una proprietà creata dal Canale A non possono essere visto dal Canale B... a meno che non disattivi la Privacy API per consentire a tutti i canali di vedere tutte le informazioni della proprietà tramite l'API. Imposta Privacy API su Off se condividi questa proprietà con un altro sito che vuole elencare la proprietà. Se non condividi questa proprietà con altri siti, lascia la privacy API impostata su On.");
