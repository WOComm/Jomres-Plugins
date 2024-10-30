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

jr_define('_PHPLIST_INSTRUCTIONS',"Questo plugin integra Jomres con PHPList e ti permette di aggiungere automaticamente il nome e l'email dei clienti a una mailing list quando effettuano una prenotazione.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Salta email di conferma iscrizione?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Invia email HTML?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPLista l'URL di base della prima pagina");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"L\'url deve avere una barra finale e non usare parametri al suo interno");
jr_define('_PHPLIST_HUSER',"nome utente amministratore PHPList");
jr_define('_PHPLIST_HPASS',"Password amministratore PHPLista");
jr_define('_PHPLIST_HATTRIB1',"attributo1");
jr_define('_PHPLIST_HATTRIB1_DESC',"Attributo/campo PHPList nome in cui si desidera memorizzare il nome dell'ospite. Lasciare vuoto per nessuno.");
jr_define('_PHPLIST_HATTRIB2',"attributo2");
jr_define('_PHPLIST_HATTRIB2_DESC',"attributo/campo PHPList nome in cui si desidera memorizzare il cognome dell'ospite. Lasciare vuoto per nessuno.");
jr_define('_PHPLIST_HLIST_ID',"ID lista di distribuzione");