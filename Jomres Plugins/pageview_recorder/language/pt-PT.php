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


jr_define ('_PAGEVIEW_RECORDER_ENABLED', "Registrar todas as visualizações de página no banco de dados?");
jr_define ('_PAGEVIEW_RECORDER_DESC', "Se habilitado, todas as visualizações de página serão registradas no banco de dados. AVISO! A tabela de visualizações de página do banco de dados pode ficar muito grande em um curto período de tempo! Use com cuidado.");