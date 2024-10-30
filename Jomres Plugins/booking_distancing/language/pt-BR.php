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


jr_define ('_JOMRES_QBLOCK_TITLE', "Distanciamento de reserva");
jr_define ('_JOMRES_QBLOCK_SETTING', "Habilitar distanciamento de reserva?");
jr_define ('_JOMRES_QBLOCK_DESCRIPTION', "Esta configuração permite que você ative o distanciamento da reserva. Quando ativada, antes e depois de cada reserva, uma reserva preta é criada por N dias, o que dá a você tempo para garantir que a propriedade foi bem limpa antes do próximo hóspede chega. ");
jr_define ('_JOMRES_QBLOCK_BLACKBOOKING_NOTE', "Distância de reserva para id de reserva");
jr_define ('_JOMRES_QBLOCK_DAYS', "Número de dias para bloquear");
jr_define ('_JOMRES_QBLOCK_DAYS_DESC', "Por quantos dias o quarto / propriedade deve ser bloqueado?");