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

jr_define('USEFUL_LINKS_MODULE_TITLE',"Collegamenti Utili per ");
jr_define('USEFUL_LINKS_FORSALE',"Strutture in vendita a ");
jr_define('USEFUL_LINKS_HOTELS',"Hotels/Bed & Breakfasts a ");
jr_define('USEFUL_LINKS_VILLAS',"Case vacanza in affitto a ");
jr_define('USEFUL_LINKS_WIKIPEDIA',"Informazioni su ");

jr_define('USEFUL_LINKS_ADMIN',"Collegamenti Utili");
jr_define('USEFUL_LINKS_ADMIN_PROPERTIESFORSALE',"ID per tipologia di struttura Immobiliare");
jr_define('USEFUL_LINKS_ADMIN_HOTELS',"ID per tipologia di struttura Hotel/B&B");
jr_define('USEFUL_LINKS_ADMIN_VILLAS',"ID per tipologia di struttura Case Vacanza");

jr_define( '_JOMRES_SHORTCODES_06000USEFULLINKS', "Questo plugin è progettato per mostrare collegamenti a ricerche specifiche se l'URL include \"paese\", \"regione\" oppure \"città\", quindi in genere dovresti metterlo in una barra laterale o in una posizione di modulo/widget nella parte superiore della pagina. Dovrai prima configurare il plug-in nella scheda Configurazione Sito > Collegamenti Utili per indicare gli ID delle tipologie di struttura per Hotel, Immobili e Appartamento/Cottage/Ville. " );
