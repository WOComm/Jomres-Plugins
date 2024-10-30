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

jr_define('_COMMON_STRINGS_TITLE',"Stringhe Comuni Template");

jr_define('_COMMON_STRINGS_INFO',"Strumento per sviluppatori. Progettato per mostrare agli sviluppatori le stringhe comuni disponibili per tutti i templates senza doverle aggiungere allo script di chiamata del template.<br/> Ad esempio, in questo elenco è presente la definizione COMMON_NEXT. Uno sviluppatore può aggiungerlo a un template Jomres senza doverlo definire nello script chiamante. Si può aggiungere la stringa comune al template come qualsiasi altra stringa, inserendo  	&#123;COMMON_NEXT&#125; nel template.<br/> Nell'elenco seguente è visualizzata la costante come definita nel file della lingua e accanto ad essa l'output che mostrerà (a condizione che siano presenti personalizzazioni della lingua specifiche per le strutture). Nota, nel caso della costante 'COMMON_LAST_VIEWED_PROPERTY_UID', poichè l'ID della struttura varia, non sarà mostrata nell'elenco.");
jr_define('_COMMON_STRINGS_CONSTANT',"Costante");
jr_define('_COMMON_STRINGS_VALUE',"Output");

