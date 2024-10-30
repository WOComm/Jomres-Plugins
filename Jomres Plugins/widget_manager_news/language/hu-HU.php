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
jr_define('WIDGET_MANAGER_NEWS_TITLE',"Webhelyhírek");
jr_define('WIDGET_MANAGER_NEWS_DESCRIPTION',"Innen kis kivonatokat hozhat létre webhelyekből/hírcikkekből, amelyeket az ingatlankezelő vezérlőpultján tekinthet meg. Adhat címet, egy kis szövegrészletet és egy opcionális URL-t. Azt is megteheti módosítsa a riasztási stílust, hogy a különböző üzenetek különböző színeket kapjanak: siker/info/figyelmeztetés/veszély");

jr_define('WIDGET_MANAGER_NEWS_ARTICLE_TITLE',"Cikk címe");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_CONTENT',"Cikk tartalma");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_URL',"URL (opcionális)");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT',"Stílus (siker/info/figyelmeztetés/veszély)");
jr_define('WIDGET_MANAGER_NEWS_ARTICLE_DATE',"Dátum");

jr_define('WIDGET_MANAGER_NEWS_CONTEXT_SUCCESS',"Siker");
jr_define('WIDGET_MANAGER_NEWS_CONTEXT_INFO',"Info");
jr_define('WIDGET_MANAGER_NEWS_CONTEXT_WARNING',"Figyelmeztetés");
jr_define('WIDGET_MANAGER_NEWS_CONTEXT_DANGER',"Veszély");

jr_define('WIDGET_MANAGER_NEWS_TARGET_PROPERTY',"Céltulajdon");