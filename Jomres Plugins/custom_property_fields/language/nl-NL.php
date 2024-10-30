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



jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE',"Aangepaste eigenschapsvelden");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT',"Aangepast eigenschapsveld bewerken");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO',"Gebruik deze functie om aangepaste informatievelden voor eigendommen te maken. Deze informatie wordt toegevoegd door een eigenschappenbeheerder en weergegeven op een nieuw tabblad op de pagina met eigendomsdetails.");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE',"Overige eigendomsinformatie");
jr_define('_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS',"Deze aangepaste eigenschapsvelden kunnen worden weergegeven in eigenschapdetails op een apart tabblad, of in eigenschappenlijst. U moet /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html (voor het eigenschappenlijstfragment) om de gewenste lay-out te verkrijgen. Met de velden zoals hierboven ingevoerd, een basislay-out ziet er ongeveer als volgt uit, die u als voorbeeld kunt gebruiken om uw eigen lay-out te bouwen. ");
