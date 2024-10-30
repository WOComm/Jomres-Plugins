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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Llista de fitxes d'accés a l'API REST");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Aquesta pàgina enumera tots els clients i, si està disponible, els seus testimonis d'accés (pot ser que els clients no hagin sol·licitat cap testimoni d'accés). Això és útil si voleu enviar consultes a través d'un client com Postman i necessiteu un testimoni d'accés. . Tot i que aquesta pàgina enumera els testimonis d'accés al SISTEMA, no es recomana que els feu servir. ");