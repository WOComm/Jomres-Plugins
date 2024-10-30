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

jr_define('_JOMRES_QBLOCK_TITLE',"Distanziamento Prenotazione");
jr_define('_JOMRES_QBLOCK_SETTING',"Abilitare il Distanziamento Prenotazione?");
jr_define('_JOMRES_QBLOCK_DESCRIPTION',"Questa impostazione consente di abilitare il distanziamento di prenotazione. Se abilitato, dopo ogni prenotazione viene creata una prenotazione bloccata per N giorni dopo la prenotazione, che ti dà il tempo di assicurarti che la struttura sia stata pulita a fondo prima dell'arrivo dell'ospite successivo.");
jr_define('_JOMRES_QBLOCK_BLACKBOOKING_NOTE',"Distanziamento prenotazione per ID prenotazione ");
jr_define('_JOMRES_QBLOCK_DAYS',"Numero di giorni da bloccare");
jr_define('_JOMRES_QBLOCK_DAYS_DESC',"Per quanti giorni deve essere bloccata la camera/struttura?");
