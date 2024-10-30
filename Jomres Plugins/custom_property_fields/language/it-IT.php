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

jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"Campi Personalizzati Struttura");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"Modifica Campi Personalizzati Struttura");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"Utilizzare questa funzione per creare campi di informazioni personalizzati per le strutture. Queste informazioni vengono aggiunte da un manager della struttura e visualizzate in una nuova scheda nella pagina dei dettagli della struttura.");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"Altre informazioni sulla struttura");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"Questi campi personalizzati delle strutture possono essere visualizzati nei dettagli della struttura in una scheda separata o nell'elenco delle strutture. Dovrai modificare manualmente /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (per la scheda dei dettagli della struttura) e/oppure /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (per lo snippet dell'elenco delle strutture) per ottenere il layout richiesto. Con i campi immessi sopra, un layout di base sarebbe simile al seguente, che potrai utilizzare come esempio da cui creare il tuo layout. ");
