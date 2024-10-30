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
// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}
jr_define( 'BEDS24V2_CHANNEL_MANAGEMENT', 'Kanalverwaltung (Beds24)' );

jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD', 'Beds24' );
jr_define( 'BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES', 'Wenn Sie ein Beds24-Konto haben und Beds24 aktualisieren möchten, wenn Sie eine Buchung haben, wählen Sie bitte diese Option. Stellen Sie die URL auf https://www.beds24.com/api/json/ ');
jr_define( 'BEDS24V2_ERROR_USER_NO_KEY', 'Dieser Benutzer hat keine API-Schlüssel festgelegt, kann also nicht fortfahren. Bitte besuchen Sie seine Seite auf der Seite Benutzerverwaltung > Property-Manager und erstellen Sie einen neuen API-Schlüssel für ihn über den auf dieser Seite bereitgestellten Link.' );
jr_define( 'BEDS24V2_ERROR_USER_NO_PROPERTIES', 'Dieser Benutzer hat keine Jomres-Eigenschaften, die er Beds24-Eigenschaften zuweisen kann, oder umgekehrt' );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED', "Der Manager, unter dem Sie angemeldet sind, scheint kein Konto bei Beds24 zu haben, daher müssen Sie sich zuerst für seinen Dienst registrieren und dann diesen API-Schlüssel auf <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'>Die Website von Beds24 hier.</a>" );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_KEY', "Kopieren Sie diesen API-Schlüssel und fügen Sie ihn in das LINK-Feld Ihres Beds24-Kontos ein, um fortzufahren." );
jr_define( 'BEDS24V2_NOT_SUBSCRIBED_RELOAD', "Wenn Sie das getan haben, klicken Sie bitte auf die Schaltfläche unten, um fortzufahren." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_TITLE', "Beds24-Eigenschaftsverknüpfung");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_INFO', "Auf dieser Seite können Sie die Eigenschaften anzeigen, auf die Sie in diesem System Zugriff haben, sowie die, die im Channel Manager vorhanden sind. Außerdem können Sie Eigenschaften aus dem Channel Manager in dieses System importieren oder exportieren vorhandene Eigenschaften an den Channel Manager. <br/> Wenn Sie Eigenschaften sowohl in diesem System als auch in Beds24 haben und diese miteinander verknüpfen möchten, können Sie dies mit dem Eigenschaften-APIkey tun. Besuchen Sie Beds24 > Einstellungen > Eigenschaften (stellen Sie sicher, dass die in der Dropdown-Liste ausgewählte Eigenschaft ist die gleiche, die Sie verlinken möchten), dann speichern Sie im Untermenü Link den 'Property apikey' im Feld 'propKey' in Beds24. Wenn Sie dies getan haben, laden Sie die Seite neu. Dieses System wird Stellen Sie sicher, dass die beiden Eigenschaften mit demselben Schlüssel verknüpft sind, und erstellen Sie die erforderlichen Verknüpfungen. Wenn die beiden Eigenschaften verknüpft sind, denken Sie daran, die Seite \"Eigenschaft anzeigen\" aufzurufen, die Benachrichtigungs-URL zu suchen und diese in das Feld \"Benachrichtigungs-URL\" der Linkseite einzufügen. Das wird Stellen Sie sicher, dass Beds24 den richtigen Link verwendet, um Buchungen mit dieser Unterkunft zu synchronisieren, wenn sie Buchungen erhält. ");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES', "Fehler: Es gibt keine Eigenschaften, auf die Sie in Beds24 verlinken können. Dies kann daran liegen, dass alle Eigenschaften, für die Sie Rechte besitzen, bereits mit einem anderen Konto auf diesem System verknüpft wurden." );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID', "Eigenschafts-UID");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME', "Eigenschaftsname");
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID', "Beds24 Property Uid" );
jr_define( 'BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME', "Beds24-Eigenschaftsname");
jr_define( 'BEDS24V2_DISPLAY_PROPERTY_APIKEY', "Eigenschaft apikey");
jr_define('BEDS24_LISTPROPERTIES_IMPORT', "Importieren");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES', "Raumtypen konfigurieren");
jr_define('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC', "Hier müssen Sie die Zimmertypen in Ihrem Beds24-Konto mit denen in diesem System verknüpfen.");
jr_define('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME', "Beds24 Zimmertyp");

jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY', "Diese Eigenschaft kann noch nicht importiert werden, da Sie den Eigenschaftsschlüssel nicht auf der Eigenschaftslinkseite festgelegt haben.");
jr_define('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS', "Diese Unterkunft kann noch nicht importiert werden, da sie keine Zimmer hat. Bitte erstellen Sie ein oder mehrere Zimmer (Zimmer in Beds24 entsprechen den Zimmertypen in Jomres) und vergessen Sie nicht, den Mindestpreis festzulegen . Danach können Sie den Zimmertyp in Jomres importieren und mit den aktuellen Jomres-Zimmertypen verknüpfen. Danach können Sie die Tarife ändern, es muss jedoch ein Mindestpreis festgelegt werden.");
jr_define('_BEDS24_SUGGESTED_KEY', "Wir empfehlen Ihnen, diesen API-Schlüssel zu verwenden. Wenn Sie das getan haben, laden Sie diese Seite neu.");
jr_define('BEDS24_LISTPROPERTIES_EXPORT', "Exportieren");
jr_define( 'BEDS24V2_REST_API_INTRO', "Hier sehen Sie Ihr REST API-Schlüsselpaar und den Pfad zur API . Wenn Sie diese Angaben in Ihrem Konto bei Beds24 speichern, kann Beds24 24 diese Site über die API kontaktieren." );
jr_define( 'BEDS24V2_REST_API_CLIENT_ID', "Client-ID");
jr_define( 'BEDS24V2_REST_API_CLIENT_SECRET', "Client-Geheimnis");
jr_define( 'BEDS24V2_REST_API_ENDPOINT', "URI (Endpunkt)" );
jr_define('BEDS24_LISTPROPERTIES_CONFIGURE', "Eigenschaft anzeigen");
jr_define('BEDS24_ROOM_TYPES_TITLE', "Raumtypzuordnungen");

jr_define('BEDS24_ROOM_TYPES_INFO', "Auf dieser Seite können Sie Ihre Zimmertypen mit denen verknüpfen, die auf den Beds24-Servern gespeichert sind.");
jr_define('BEDS24_ROOM_TYPES_INFO2', "Solange die Zimmertypen nicht verknüpft sind, können Sie keine von Beds24 gesendeten Buchungsinformationen erhalten. Wenn Ihre Unterkunft zu oder von Beds24 importiert/exportiert wurde, haben wir automatisch Links für Sie erstellt neue Zimmerkategorie erstellen oder löschen, dann kann diese Seite verwendet werden, um sicherzustellen, dass die Zimmerkategorie korrekt zugeordnet ist.");
jr_define('BEDS24_ROOM_TYPES_INFO3', "Wählen Sie die Beds24-Zimmertypen aus, die Sie den Zimmertypen in diesem System zuordnen möchten, und klicken Sie anschließend auf Speichern, um die Änderungen an Beds24 zu aktualisieren.");
jr_define('BEDS24_ROOM_TYPES_YOURS', "Ihre Zimmertypen");
jr_define('BEDS24_ROOM_TYPES_BEDS24', "Beds24 Zimmertypen");
jr_define('BEDS24_ROOM_TYPES_NONE', "Diese Unterkunft hat keine Zimmertypen, daher kann sie nicht mit Beds24-Zimmertypen verknüpft werden. Möchten Sie Zimmertypen aus Beds24 importieren?");
jr_define('BEDS24_IMPORT_ROOMS', "Räume importieren");
jr_define('BEDS24_EXPORT_BOOKINGS', "Buchungen exportieren");
jr_define('BEDS24_IMPORT_BOOKINGS', "Buchungen importieren");
jr_define('BEDS24_IMPORT_EXPORT', "Bestehende Buchungen von und zu Beds24 können Sie auf Knopfdruck importieren und exportieren. Von Beds24 importierte Buchungen werden von gestern importiert und beinhalten alle Buchungen des nächsten Jahres. Verwenden Sie diese Schaltflächen erst danach zuerst Importieren oder Exportieren der Immobilie in das System. Nach der Einrichtung erfolgt der Import und/oder Export automatisch.");
jr_define('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO', "Preise auf Beds24 aktualisieren?");
jr_define ( '_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC', "können Sie wählen Beds24 mit nur Verfügbarkeit oder beide Verfügbarkeit und Preise zu aktualisieren. Wenn Sie bestimmte Situationen verwenden, in dem Sie die Beds24 Bedienfeld für die Festlegung spezifischer Preise für bestimmte Kanäle verwenden möchten, sollten Sie diesen Satz lassen Nein.");
jr_define('_BEDS24_CONTROL_PANEL_DIRECT', "Direktlink");
jr_define('BEDS24_IMPORT_NOTIFICATION_URLS', "Wenn Sie diese Eigenschaft in Jomres importiert haben, müssen Sie die Benachrichtigungs-URL in Ihrem Beds24 -> Eigenschaft -> Linkeinstellungen wie folgt manuell ändern:");
jr_define('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED', "Sie haben derzeit keine Unterkünfte, die mit Beds24-Eigenschaften verknüpft sind. Sie müssen die API-Schlüssel Ihres Managers zurücksetzen, bevor Sie Ihren Managern erlauben, sich mit Beds24 zu verbinden. Dadurch wird sichergestellt, dass alle über eindeutige Schlüssel verfügen.");
jr_define('BEDS24V2_ERROR_KEYS_REBUILD', "Manager-API-Schlüssel jetzt zurücksetzen");
jr_define('BEDS24V2_ERROR_KEYS_DISMISS', "Warnung ignorieren");
jr_define('BEDS24V2_ERROR_KEYS_DONE', "Manager-API-Schlüssel wurden zurückgesetzt");

jr_define( 'BEDS24V2_ADMINISTRATOR_LINKS_TITLE', "Beds24-Eigenschaftslinks");
jr_define('BEDS24_ASSIGN_MANAGER', "Beds24 Change Manager");
jr_define('BEDS24_ASSIGN_MANAGER_DESC', "Wenn ein Manager die Channel Management (Bed24)-Seite im Frontend anzeigt, werden alle Eigenschaften, die einen API-Schlüssel sowohl in Jomres als auch in Beds24 teilen, automatisch in Jomres verknüpft. Ebenso werden alle Eigenschaften, die vom Manager importiert oder exportiert wurden verknüpft sind. Sie können den Verwalter ändern, mit dem eine Immobilie verknüpft ist, indem Sie das Dropdown-Menü des Verwalters auf dieser Seite ändern und dann auf Speichern klicken.");
jr_define( 'BEDS24V2_TARIFFS_TITLE', "Tarifexport" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_DESC', "Sie können die von Ihnen erstellten Tarife zu Beds24 zu einem bestimmten Tagessatz exportieren. Wenn Sie diese Funktion verwenden möchten, sollten Sie die Option 'Preise auf Beds24 aktualisieren?' in der Objektkonfiguration auf Nein setzen. Sie Möglicherweise müssen Sie Ihre Unterkunft auch in der Beds24-Systemsteuerung konfigurieren, damit Sie mehrere Tagespreise haben können. Gehen Sie dazu zu Einstellungen > Eigenschaften > Zimmer > Tagespreise und konfigurieren Sie die 'Anzahl der Tagespreise' auf die gewünschte Anzahl von Preisen . Sobald Sie dies getan haben, können Sie auf eine der P-Schaltflächen klicken, um den Tagessatz einzustellen." );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFFNAME', "Tarifname" );
jr_define( 'BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE', "Raumtyp" );
jr_define( 'BEDS24V2_BOOKING_RESEND', "Benachrichtigung erneut senden");
jr_define( 'BEDS24V2_BOOKING_DATA_AT_B24', "Dies sind die auf Beds24 gespeicherten Buchungsinformationen. Sofern Sie nicht sicher sind, dass die Daten falsch sind, sollten Sie die Buchung nicht erneut an Beds24 senden müssen. " );
jr_define( 'BEDS24V2_BOOKING_NO_DATA_AT_B24', "Diese Buchung scheint nicht mit einer Buchung auf Beds24 verknüpft zu sein. Über den Button Erneut senden können Sie diese Buchung nachbeds24 exportieren." );

jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS', "Gäste anonymisieren?" );
jr_define( 'BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC', "Wenn Buchungen an den Channel-Manager gesendet werden, empfehlen wir Ihnen, die Gästedaten zu anonymisieren. Wenn Sie diese Option auf ja setzen, werden beim Senden der Buchungsinformationen an den Channel-Manager der Gastname und die E-Mail-Adresse nicht angegeben. . OTAs haben eine genaue Aufzeichnung Ihrer Verfügbarkeit, ohne dass Sie mehr Informationen als nötig teilen müssen. Dies bedeutet, dass Sie die DSGVO einhalten, denn wenn der Gast später seine Daten auf diesem System löschen sollte (Sie werden nicht benachrichtigt, wenn dies passiert), ihre Daten werden nicht anderen Datenverantwortlichen überlassen, über die Sie keine Kontrolle haben. Bei Bedarf können Sie Buchungen in diesem System mit denen im Channel-Manager vergleichen. Die Seite Reservierungsdetails zeigt Ihnen die Buchungsnummer für diese Buchung so, wie sie im Channel Manager gespeichert ist." );
jr_define( 'BEDS24V2_MASTER_APIKEY', "EXPERIMENTELLES FUNKTION - Master Beds24 API-Schlüssel");
jr_define( 'BEDS24V2_MASTER_APIKEY_DESC', "WENN SIE BEREITS EINE INSTALLATION VON JOMRES MIT MIT BEDS24 VERLINKTEN EIGENSCHAFTEN HABEN, LESEN SIE DIE GESAMTE BESCHREIBUNG HIER Immobilien sicher von und zu beds24. Mit dieser Einstellung können Sie diese Funktion außer Kraft setzen, indem Sie einen einzigen API-Schlüssel für alle Unterkünfte haben. Dies bedeutet, dass Sie nur ein Konto bei Beds24 benötigen, aber auch, dass alle Gebühren über dieses eine Konto anfallen. Jeder Verwalter mit Zugriff auf eine Unterkunft kann Aktualisierungen an die Unterkunft auf den beds24-Servern senden. Lassen Sie das Feld leer, um diese Einstellung zu ignorieren und die Unterkunftsverwalter zu zwingen, ihre eigenen Beds24-Konten zu verwenden. Der API-Schlüssel kann jede gewünschte Form annehmen, solange da der Schlüssel hier mit dem im <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'><em>API-Schlüssel 1</em> </ übereinstimmt. a> Feld WENN SIE BEREITS EINE INSTALLATI . HABEN ON OF JOMRES MIT MIT BEDS24 VERBUNDENEN EIGENSCHAFTEN : Sie können auf diese Funktion umschalten, jedoch müssen Sie zuerst diese Tabellen abschneiden (leeren), die bereits in Jomres vorhandenen Eigenschaften löschen und dann die Eigenschaften erneut importieren von Beds24 nach Jomres. XXXXX_jomres_beds24_contract_booking_number_xref , XXXXX_jomres_beds24_property_uid_xref , XXXXX_jomres_beds24_rest_api_key_xref , XXXXX_jomres_beds24_room_type_xref. <br/> <br/> Wenn Sie Ihren API-Schlüssel im Abschnitt <em>API-Schlüssel N</em> der Kontozugriffsseite von Beds24 einstellen, ist es wichtig, dass Sie das Feld <em>API-Schlüsselzugriff</em> auf ' Allow whitelist IP only' und Sie setzen die IP-Nummer auf <strong>".$this_servers_ip_number ."</strong> Dies gilt gleichermaßen für die Konfiguration des Master-API-Schlüssels hier und im Frontend, wenn ein Hausverwalter seine eigene individuelle API konfiguriert Schlüssel." );
jr_define( 'BEDS24V2_WHITELIST_WARNING', "Wenn Ihre Unterkünfte bereits mit Beds24 verbunden wurden, beachten Sie, dass Beds24 kürzlich eine Richtlinie eingeführt hat, nach der alle Server, die mit Ihrem Konto verbunden sind, auf die Whitelist gesetzt werden müssen. Dies können Sie auf der Seite Kontozugriff tun, wo Ihr Zugangsschlüssel wurde eingegeben Wählen Sie das Dropdown-Menü Whitelist IP und stellen Sie die IP-Nummer auf " );
