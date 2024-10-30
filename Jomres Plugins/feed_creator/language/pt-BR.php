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


jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "RSS Feed");
jr_define ('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS', "Este plugin cria um feed de todas as propriedades jomres. Atualmente os formatos de distribuição RSS 1.0 e RSS 2.0 são suportados.");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDNAME', "Nome do feed");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC', "Descrição do feed");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "Feed de arquivo (sem espaços)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT', "Formato de distribuição");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME', "Tempo de cache (em segundos)");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL', "URL da imagem do feed");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC', "Truncar descrição da propriedade?");
jr_define ('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE', "Truncar após (caracteres)");
jr_define ('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE', "Mostrar imagem de feed?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE', "Mostrar imagem da propriedade?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN', "Mostrar cidade de propriedade?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION', "Mostrar região de propriedade?");
jr_define ('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY', "Mostrar país da propriedade?");
jr_define ('_JRPORTAL_FEED_CREATOR_HITEMS', "Limitar o número de propriedades sindicadas a");