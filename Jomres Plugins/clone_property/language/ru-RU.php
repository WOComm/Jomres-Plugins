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

jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Клонировать свойство");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Выберите свойство, которое вы хотите клонировать:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Имя нового свойства:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Имейте в виду, что свойства клонирования не имеют тарифов, вам следует использовать плагин Clone Tariffs, если вы хотите скопировать тарифы, или создать тарифы вручную. Настройки плагина не импортируются, если они доступны. На свойство нет перекрестных ссылок с любыми менеджерами собственности. <br/> Клонировать свойство следует использовать только для дублирования свойства, если после этого новое свойство будет использовать тот же тип свойства и тип комнаты. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Свойство клонировано");