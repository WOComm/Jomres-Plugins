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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Kanalverwaltung");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Der Kunde kann Channel-Management-Aktivitäten durchführen. Beachten Sie, dass dies dem Kunden im System beträchtliche Möglichkeiten gibt, Ihre Konten und Eigenschaften zu ändern.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Reinigung");

jr_define('_CMF_CANCELLED_BOOKING',"Kanalmanager hat Buchung storniert");

jr_define('_CMF_CLEANING_STRING',"Reinigung"); // Ändern Sie dies nicht, wenn Sie bereits Eigenschaften importiert haben. Immobilien mit Reinigungsgebühren haben ein Extra mit diesem Namen
jr_define('_CMF_SECURITY_STRING',"Sicherheitseinlage"); // Ändern Sie dies nicht, wenn Sie bereits Eigenschaften importiert haben. Immobilien mit Kaution haben ein Extra mit diesem Namen


jr_define('_CMF_API_PRIVACY',"API-Datenschutz");
jr_define('_CMF_API_PRIVACY_ON',"Datenschutz ein");
jr_define('_CMF_API_PRIVACY_OFF',"Datenschutz aus");

jr_define('_CMF_API_PRIVACY_DESC',"Die Informationen einer Eigenschaft können nur von dem Kanal gesehen werden, der sie erstellt hat. Wenn Sie beispielsweise Kanal A und Kanal B unterschiedliche API-Schlüsselpaare gegeben haben, können die Informationen einer von Kanal A erstellten Eigenschaft nicht von Kanal B gesehen werden... es sei denn, Sie deaktivieren API-Datenschutz, damit alle Kanäle alle Informationen der Property über die API sehen können. Setzen Sie API-Datenschutz auf Aus, wenn Sie diese Property mit einer anderen Site teilen, die die Property auflisten möchte. Wenn Sie diese Eigenschaft nicht mit anderen Websites teilen, lassen Sie API-Datenschutz auf Ein.");
