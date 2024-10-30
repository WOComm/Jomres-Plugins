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


jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "Configurações de propriedade padrão");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "Título de configuração geral (se disponível, alguns podem não estar)");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "Nome da variável");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "Valor atual");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "Este é um recurso avançado, se você não tiver um uso específico para ele, é melhor não usá-lo. Este plugin permite que você modifique os valores padrão de uma nova propriedade. Make certifique-se de entender o que a variável faz antes de alterá-la, pois alterá-la aqui pode ter efeitos de longo alcance em seu sistema Jomres. Os itens em branco são geralmente configurações mais antigas que não são mais usadas, mas deixadas no local por motivos de compatibilidade com versões anteriores ou são configurações que não pode ser modificado através da área de configuração de propriedades. ");
jr_define ('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "Novo valor");