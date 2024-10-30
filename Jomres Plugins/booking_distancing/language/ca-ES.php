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
jr_define ('_JOMRES_QBLOCK_TITLE', "Distància de reserva");
jr_define ('_JOMRES_QBLOCK_SETTING', "Voleu habilitar el distanciament de reserva?");
jr_define ("_ JOMRES_QBLOCK_DESCRIPTION", "Aquest paràmetre permet habilitar el distanciament de la reserva. Quan s'activa, abans i després de cada reserva, es crea una reserva negra per a N dies que us dóna temps per assegurar-vos que la propietat s'ha netejat en profunditat abans del següent hoste arriba.");
jr_define ('_JOMRES_QBLOCK_BLACKBOOKING_NOTE', "Distància de reserva per identificador de reserva");
jr_define ('_JOMRES_QBLOCK_DAYS', "Nombre de dies per bloquejar");
jr_define ('_JOMRES_QBLOCK_DAYS_DESC', "Quants dies s'ha de bloquejar l'habitació o la propietat?");