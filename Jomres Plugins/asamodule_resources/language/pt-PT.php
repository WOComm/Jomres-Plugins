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


jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES', "Mostra quartos / recursos de uma propriedade em um widget / módulo ASAModule. Útil para sites de uma única propriedade.");

jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_PUID', "Obrigatório. O uid de propriedade para o qual você deseja mostrar recursos.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ASAMODULE_RESOURCES_IDS', "Obrigatório. Os ids dos recursos (por exemplo, quartos) que você deseja mostrar. Lista separada por vírgulas de ids.");
jr_define ('_JOMRES_SHORTCODES_06000ASAMODULE_RESOURCES_ARRIVALDATE', "Opcional. Defina a data de chegada no formato que corresponde à Configuração do site> guia Calendário> configuração do formato de entrada do calendário. Por exemplo, 01/02/2018. Isso permite que você mostre preços de quartos específicos em datas específicas em o futuro, supondo que você tenha tarifas definidas que cubram essas datas. ");