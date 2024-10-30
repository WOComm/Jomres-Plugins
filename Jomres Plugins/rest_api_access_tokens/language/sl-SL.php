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

	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"Seznam žetonov dostopa REST API");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Na tej strani so navedeni vsi odjemalci in njihovi žetoni za dostop, če so na voljo (odjemalci morda niso zahtevali žetona za dostop). To je uporabno, če želite pošiljati poizvedbe prek odjemalca, kot je Postman, in potrebujete žeton za dostop . Čeprav so na tej strani navedeni žetoni za dostop SYSTEM, ni priporočljivo, da jih uporabljate. ");