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
	jr_define('REST_API_ACCESS_TOKENS_MENU_OPTION',"REST API hozzáférési tokenek listázása");
	jr_define('REST_API_ACCESS_TOKENS_INFO',"Ez az oldal felsorolja az összes klienst, és ha elérhető, a hozzáférési jogkivonatait (lehet, hogy az ügyfelek nem kértek hozzáférési tokent). Ez akkor hasznos, ha lekérdezéseket szeretne küldeni egy olyan kliensen keresztül, mint a Postman, és hozzáférési tokenre van szüksége . Bár ezen az oldalon a RENDSZER hozzáférési jogkivonatok szerepelnek, nem ajánlott ezek használata. ");