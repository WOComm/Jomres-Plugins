<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Translated to pt-PT by Mario Oliveira, Camara de Lobos, Madeira Island, Portugal, 17Set2010 - www.marioliveira.net - Updated 21Jun2011 for ver 5.1
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('Direct Access to this file is not allowed.');
//#################################################################


jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Mapas estendidos");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Largura do mapa (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Altura do mapa (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Nível de zoom do mapa");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Substituir a lista de propriedades Jomres padrão?");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Ícone do marcador de outros eventos / atrações");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Largura do pop-up (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Largura da imagem (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Altura da imagem (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Exibir descrição da propriedade? (apenas para pop-ups de aluguel)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Cortar descrição da propriedade? (somente para pop-ups de aluguel)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Aparar descrição da propriedade após (caracteres) (somente para popups de aluguel)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Marcadores de grupo");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Exibe um mapa com coleções de propriedades e eventos / atrações locais.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Especifique os tipos de propriedade que deseja mostrar. Separados por vírgulas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Mostrar propriedades? Defina como 0 para evitar que sejam exibidas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Mostrar eventos? Defina como 0 para evitar que sejam exibidos.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Mostrar atrações? Defina como 0 para evitar que sejam exibidas.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "código ISO do país. Use esta opção para limitar o mapa a um país.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Defina o id da região para limitar os resultados às propriedades em uma região específica.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Definir o nome de uma cidade para limitar os resultados às propriedades em uma cidade específica.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");