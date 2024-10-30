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

jr_define('_COMMON_STRINGS_TITLE',"Gemeinsame Vorlagenvariablen");

jr_define('_COMMON_STRINGS_INFO',"Entwicklertool. Entwickelt, um Entwicklern allgemeine Zeichenfolgen anzuzeigen, die für alle Vorlagen verfügbar sind, ohne sie dem aufrufenden Skript der Vorlage hinzufügen zu müssen.<br/> In dieser Liste ist beispielsweise die Definition COMMON_NEXT. Ein Entwickler können Sie dies zu einer Jomres-Vorlage hinzufügen, ohne sie im aufrufenden Skript definieren zu müssen. Sie würden die allgemeine Zeichenfolge wie jede andere Zeichenfolge zur Vorlage hinzufügen, indem Sie &#123;COMMON_NEXT&#125; in die Vorlage einfügen.<br/> In der Liste unten sehen Sie die Konstante, wie sie in der Sprachdatei definiert ist, und daneben die Ausgabe, die angezeigt wird (vorbehaltlich eigenschaftsspezifischer Sprachanpassungen). die Eigenschafts-UID variiert und wird in dieser Liste nicht angezeigt.");
jr_define('_COMMON_STRINGS_CONSTANT',"Konstante");
jr_define('_COMMON_STRINGS_VALUE',"Ausgabe");