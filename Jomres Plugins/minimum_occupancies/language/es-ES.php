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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define ('_OCCUPANCIES_TITLE', "Ocupaciones mínimas");

jr_define ('_OCCUPANCIES_DESCRIPTION', "Puede establecer los niveles mínimos de ocupación para tipos de habitación específicos, si desea asegurarse de que el huésped ha seleccionado un cierto número de tipos de huéspedes en el formulario de reserva antes de que se muestre la combinación de habitación y tarifa adecuada. ");
jr_define ('_OCCUPANCIES_DESCRIPTION_INFO', "Aquí puede crear un nivel mínimo de ocupación para cada tipo de habitación. No se ofrecerá una combinación de habitación / tarifa si el huésped no ha seleccionado el número apropiado de tipos de huésped. Para cada tipo de habitación, seleccione el número de huéspedes de un tipo determinado que debe haber un mínimo en el formulario de reserva antes de que se ofrezca el tipo de habitación. Si no le importa cuál debe ser el nivel de ocupación para un tipo de habitación, deje el número de huésped de ese tipo de habitación configurado en 0 (cero). ");
jr_define ('_OCCUPANCIES_NUMBER_OF_GUESTTYPE', "Número de tipo de invitado");
jr_define ('_OCCUPANCIES_NO_GUESTTYPES', "Aún no ha creado ningún tipo de invitado. Cree algunos tipos de invitado antes de usar esta función");

jr_define ('_OCCUPANCIES_EDIT', "Editar ocupación mínima para");