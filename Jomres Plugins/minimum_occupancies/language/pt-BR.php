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


jr_define ('_OCCUPANCIES_TITLE', "Ocupações mínimas");

jr_define ('_OCCUPANCIES_DESCRIPTION', "Você pode definir os níveis mínimos de ocupação para tipos de quarto específicos, se quiser garantir que o hóspede tenha selecionado um certo número de tipos de hóspedes no formulário de reserva antes que a combinação de quarto e tarifa apropriada seja exibida." );
jr_define ('_OCCUPANCIES_DESCRIPTION_INFO', "Aqui você pode criar um nível de ocupação mínimo para cada tipo de quarto. Uma combinação de quarto / tarifa não será oferecida se o hóspede não tiver selecionado o número apropriado de tipos de hóspedes. Para cada tipo de quarto, selecione o número de hóspedes de um determinado tipo que deve haver um mínimo no formulário de reserva antes que o tipo de quarto seja oferecido. Se você não se importa com o nível de ocupação de um tipo de quarto, deixe o número de hóspede desse tipo de quarto definido como 0 (zero). ");
jr_define ('_OCCUPANCIES_NUMBER_OF_GUESTTYPE', "Número do tipo de convidado");
jr_define ('_OCCUPANCIES_NO_GUESTTYPES', "Você não tem nenhum tipo de convidado criado ainda. Por favor, crie alguns tipos de convidado antes de usar este recurso.");

jr_define ('_OCCUPANCIES_EDIT', "Editar ocupação mínima para");