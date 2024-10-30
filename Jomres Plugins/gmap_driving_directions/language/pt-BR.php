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


jr_define ('_JRPORTAL_GMAPS_DD_YES', "Sim");
jr_define ('_JRPORTAL_GMAPS_DD_NO', "Não");
jr_define ('_GOOGLE_ADDRESS', "Endereço");
jr_define ('_GOOGLE_INPUT_FIELDSET_POSTALCODE', "Código postal");
jr_define ('_GOOGLE_INPUT_FIELDSET_TOWN', "Cidade");
jr_define ('_GOOGLE_INITIALIZE_ERROR1', "Número máximo de 9 waypoints atingido");
jr_define ('_GOOGLE_INITIALIZE_ERROR2', "Google não conseguiu calcular direções para esta rota e opções selecionadas");
jr_define ('_GOOGLE_DIRECTION_PRINT', "Imprimir direções");
jr_define ('_GOOGLE_ROUTEPLANNING', "Planeje sua rota para");
jr_define ('_GOOGLE_ROUTEPLANNING_HYOURLOCATION', "Sua localização (ponto de partida da rota)");
jr_define ('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS', "Opções de rota");
jr_define ('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR', "Otimizar para");
jr_define ('_GOOGLE_ROUTEPLANNING_HDRIVING', "Dirigindo");
jr_define ('_GOOGLE_ROUTEPLANNING_HWALKING', "Caminhando");
jr_define ('_GOOGLE_ROUTEPLANNING_HCYCLING', "Ciclismo");
jr_define ('_GOOGLE_ROUTEPLANNING_HHIGHWAYS', "Evitar rodovias");
jr_define ('_GOOGLE_ROUTEPLANNING_HTOLLS', "Evite pedágios");
jr_define ('_GOOGLE_SELECT_BUTTON', "Obter direções");
jr_define ('_GOOGLE_SELECT_RESETMAP', "Redefinir mapa");
jr_define ('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS', "Seu destino (ponto final da rota) já está marcado no mapa. Insira sua localização e escolha as opções de rota para obter direções para o ponto de destino. Você também pode clicar no mapa para escolher até 9 waypoints do seu ponto de partida ao ponto de destino. ");