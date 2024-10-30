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


jr_define ('_BYPASS_CONFIRMATION_TITLE', "Ignorar página de reserva de revisão");
jr_define ('_BYPASS_CONFIRMATION_DESC', "Quando ativado, a página de revisão de reserva não será mais exibida e, em vez disso, os hóspedes serão encaminhados diretamente para o pagamento, ou se nenhum gateway estiver habilitado, a reserva será inserida diretamente.");