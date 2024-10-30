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
jr_define('DISALLOW_SYNDICATION_TITLE',"Syndication verbieten");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','Die Syndication-Funktion von Jomres.net ist eine neue Funktionalität, die entwickelt wurde, um Eigenschaften zwischen Websites zu teilen, obwohl Buchungen nur auf dem Home-Server vorgenommen werden können. ');

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"Der Zweck ist es, Websites zu ermöglichen, Vertrauen bei Suchmaschinen aufzubauen. Es ist eine kostenlose Funktion, die allen Jomres-Benutzern zur Verfügung steht Site aus dem Syndication-Netzwerk über diese Seite. Localhost kann nicht zum Netzwerk hinzugefügt werden, und wenn aus irgendeinem Grund ein Problem mit der Konnektivität auftritt, können Sie Ihre Site nicht zum Netzwerk hinzufügen. Überprüfen Sie die REST API-Konnektivitätstestseite, wenn Sie Zweifel haben.");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"Klicken Sie auf diesen Link, um Ihre Site aus dem Netzwerk zu entfernen.");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"Klicken Sie auf diesen Link, um Ihre Site zum Netzwerk hinzuzufügen.");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"Diese Site aus dem Netzwerk entfernen");
jr_define('DISALLOW_SYNDICATION_ALLOW',"Diese Site zum Netzwerk hinzufügen");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"Leider ist Ihr Supportschlüssel ungültig oder nicht aktiv, Sie können den Syndication-Status dieser Installation nicht ändern.");