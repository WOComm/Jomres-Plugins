<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_ID_NOT_SET',"Kanaal-ID niet ingesteld");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MANAGER_ID_NOT_SET',"Manager-ID niet ingesteld");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TITLE',"Channel Manager Framework");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_FRONTEND_TITLE',"Kanalen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_INSTALLED_CHANNELS',"Geïnstalleerde kanalen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL',"Selecteer een kanaal");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHOOSE_CHANNEL_CHOOSE_DICTIONARY_TYPE',"Kies woordenboektype");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_CHANNEL_NONE_INSTALLED',"Fout, geen kanalen geïnstalleerd");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_TITLE',"Channel Manager Sanity checks");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SANITY_CHECKS_DESC',"Selecteer een kanaal. Zodra je dat hebt gedaan, zullen we je configuratie controleren en eventuele problemen markeren die je mogelijk moet oplossen.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_TITLE',"Brontoewijzing");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_DESC',"Verschillende kanalen hebben zogenaamde woordenboeken. Dit zijn termen om bronnen te beschrijven, zoals kamertypes, kamerkenmerken, eigendomskenmerken enz. Voordat u het kanaal kunt gebruiken, moet u verschillende Jomres-bronnen in kaart brengen met individuele kanalen bronnen zodat eigenschappen die zijn geïmporteerd uit en geëxporteerd naar de kanalen de juiste bronnen hebben. Op deze pagina selecteert u eerst een kanaal. Als u klaar bent, wordt u naar een nieuwe pagina gebracht waar u de brontypen kunt selecteren die u wilt toewijzen naar de bronnen van het kanaal (bijvoorbeeld eigenschappen van eigenschappen). Zodra het type bron is geselecteerd, kun je de bronnen van Jomres en het kanaal met elkaar kiezen.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_SELECT_RESOURCE',"Hier moet je de bron (woordenboek) selecteren ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_NO_LOCAL_ITEMS',"Er zijn geen lokale items voor dit woordenboekitem, dus er is niets om tegen in te delen.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_CHANNEL_DICTIONARY_CLASS_DOESNT_EXIST',"Fout, kanaal heeft geen woordenboekklasse.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MAPPING_MAP_ITEM_TYPES_INSTRUCTIONS',"Op deze pagina moet je de woordenboekitems van de kanaalbeheerder koppelen aan die in Jomres.");


jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS',"Channel Manager-accounts");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_USER_ACCOUNTS_DESC',"Sla autorisatie-informatie op voor alle kanaalbeheerders waarmee je een account hebt.");
jr_define('FINISH', 'Bewerking voltooien');
jr_define('CHANNELMANAGEMENT_FRAMEWORK_EXTRAS_NOTINSTALLED',"Fout, de optionele extra's plug-in is niet geïnstalleerd.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_CHANNEL_NAME_NOT_SUPPLIED',"Kanaalnaam niet opgegeven");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_NEW_PROPERTY_OBJECT_NOT_SUPPLIED',"Nieuw eigendomsobject niet opgegeven");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING_THISJRUSER_OBJECT_NOT_SUPPLIES',"dit JRUser-object niet meegeleverd");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTING',"Begin van eigendom importeren ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORTED',"Eigenschap met succes geïmporteerd ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_FAILED',"Kan eigenschap niet importeren ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT',"Importeer alle eigenschappen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_ONE',"Importeer eigenschap");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_PROPERTY_IMPORT_UNPUBLISHED_CANNOT_IMPORT',"Eigenschappen die niet zijn gemarkeerd als gepubliceerd/geactiveerd op de externe server, of eigenschappen die geen changelog-items hebben, kunnen niet worden geïmporteerd.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTING',"Invoer van tarief starten ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORTED',"Succesvol geïmporteerd tarief ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_TARIFF_IMPORT_FAILED',"Kan tarief niet importeren ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_SETTINGS_FAILED_VALIDATION',"Kan eigenschapsinstellingen niet valideren, er is geprobeerd een niet-herkende eigenschapsinstelling te importeren ");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PAGETITLE',"Geïmporteerde eigenschappen");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_PROPERTY_NAME',"Propertynaam");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_CHANNEL_NAME',"Kanaalnaam");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_LOCAL_PROPERTY_UID',"Local property uid");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_REMOTE_PROPERTY_UID',"Remote property uid");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_REMOTE_PROPERTY',"Bewerk afstandsbediening");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_EDIT_LOCAL_PROPERTY',"Bekijk lokaal");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_LIST_PROPERTIES_DELETE_LOCAL_PROPERTY',"Verwijder lokaal");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_DASHBOARD',"Dashboard");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_MENUITEM_ACCOUNTS',"Kanaalaccounts");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_THIN_CHANNELS_NOT_INSTALLED',"Er zijn geen thin channel-plug-ins geïnstalleerd, je kunt deze functie nog niet gebruiken.");
jr_define('CHANNELMANAGEMENT_FRAMEWORK_DASHBOARD_INFO',"Niet-toegewezen eigenschappen die u beheert, kunnen aan een kanaal worden toegewezen. Als u het kanaal wijzigt, geeft u elk kanaal met geldige API-toegang ");