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

jr_define('_CLONE_TARIFFS_TITLE',"Clone Tarifas");
jr_define('_CLONE_TARIFFS_INFO',"Aqui você pode clonar uma tarifa de uma propriedade de destino para uma propriedade de origem. Somente as propriedades que você tem autoridade para gerenciar estarão disponíveis para você.");
jr_define('_CLONE_TARIFFS_SOURCE',"Propriedade de origem");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarifa para clonar");
jr_define('_CLONE_TARIFFS_TARGET',"Propriedade de destino");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Tipo de quarto da propriedade alvo");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Se o modo de edição de tarifa da propriedade Target for diferente do modo de edição de tarifa da propriedade Source, quando a clonagem ocorrer, as tarifas originais da propriedade Target serão excluídas e seu modo de edição de tarifa alterado para refletir o da Source configuração da propriedade.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Excluir tarifas existentes na propriedade Target?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Se o modo de edição de tarifa da propriedade Target for o mesmo que a propriedade Source, as tarifas existentes não serão excluídas. Você pode, no entanto, optar por substituir isso configurando esta opção como Sim.");