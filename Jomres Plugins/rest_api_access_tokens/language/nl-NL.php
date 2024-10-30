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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Lijst REST API Toegangstokens");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Deze pagina geeft een overzicht van alle clients en, indien beschikbaar, hun toegangstokens (clients hebben mogelijk geen toegangstoken aangevraagd). Dit is handig als u vragen wilt verzenden via een client zoals Postman en u een toegangstoken nodig heeft Hoewel deze pagina SYSTEEM-toegangstokens vermeldt, wordt het gebruik ervan niet aanbevolen. ");