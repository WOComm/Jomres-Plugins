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
jr_define('WIDGET_MANAGER_NEWS_TITLE',"Site-News");
jr_define('WIDGET_MANAGER_NEWS_DESCRIPTION',"Von hier aus können Sie kleine Ausschnitte von Site-/Nachrichtenartikeln erstellen, die im Steuerungsfeld des Property Managers angezeigt werden können. Sie können ihm einen Titel, einen kleinen Textausschnitt und eine optionale URL zuweisen. Sie können auch Ändern Sie den Alarmstil, um verschiedenen Nachrichten unterschiedliche Farben zu geben: Erfolg/Info/Warnung/Gefahr");

jr_define('WIDGET_MANAGER_NEWS_ARTICLE_TITLE',"Artikeltitel");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_CONTENT',"Artikelinhalt");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_URL',"URL (optional)");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT',"Stil (Erfolg/Info/Warnung/Gefahr)");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_DATE',"Datum");

jr_define('WIDGET_MANAGER_NEWS_CONTEXT_SUCCESS',"Erfolg");
jr_define('WIDGET_MANAGER_NEWS_CONTEXT_INFO',"Info");
jr_define('WIDGET_MANAGER_NEWS_CONTEXT_WARNING',"Warnung");
jr_define('WIDGET_MANAGER_NEWS_CONTEXT_DANGER',"Gefahr");

jr_define('WIDGET_MANAGER_NEWS_TARGET_PROPERTY',"Zieleigenschaft");