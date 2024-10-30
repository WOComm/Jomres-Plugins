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

jr_define('_DEEPL_TITLE',"Traduzioni DeepL");
jr_define('_DEEPL_DESCRIPTION',"DeepL è un servizio di traduzione in linea a prezzi ragionevoli che puoi utilizzare per tradurre automaticamente le stringhe di lingua di Jomres. Queste traduzioni, una volta ricevute dal servizio DeepL, sono archiviate localmente e puoi utilizzare la funzione Label Translations per perfezionarli. Ciò accelera notevolmente il processo di funzionamento del tuo sito Web con più lingue. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'>Supportato lingue</a>");
jr_define('_DEEPL_API_KEY_SETTING',"Chiave di autenticazione DeepL");
jr_define('_DEEPL_API_KEY_SETTING_DESC',"Avrai bisogno di una chiave API valida da <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'>DeepL.</a > Dopo esserti iscritto, troverai la chiave di autenticazione nel <a href='https://www.deepl.com/en/pro-account/' target='_blank'>tuo account.</a> Dopo di te aver salvato la chiave in Jomres il tuo sito potrebbe rallentare per un po' poiché ci saranno molte traduzioni che devono essere estratte dal servizio DeepL. Sii paziente e ricarica la pagina alcune volte. Successivamente potrai perfezionare le personalizzazioni nella pagina delle traduzioni delle etichette.");