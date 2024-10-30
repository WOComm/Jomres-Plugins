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
jr_define('_PHPLIST_INSTRUCTIONS',"Aquest connector integra Jomres amb PHPList i us permet afegir automàticament el nom i el correu electrònic dels clients a una llista de correu quan fan una reserva.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Ometeu el correu electrònic de confirmació de la subscripció?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Envia correus electrònics HTML?");
jr_define('_PHPLIST_HPHPLISTURL',"URL base de la pàgina principal de PHPList");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"L'URL ha de tenir una barra inclinada final i no utilitzar-hi cap paràmetre");
jr_define('_PHPLIST_HUSER',"Nom d'usuari administrador de PHPList");
jr_define('_PHPLIST_HPASS',"Contrasenya d'administrador de PHPList");
jr_define('_PHPLIST_HATTRIB1',"atribut1");
jr_define('_PHPLIST_HATTRIB1_DESC',"Atribut/nom del camp PHPList on voleu emmagatzemar el nom del convidat. Deixeu-lo en blanc per a cap.");
jr_define('_PHPLIST_HATTRIB2',"atribut2");
jr_define('_PHPLIST_HATTRIB2_DESC',"Atribut/nom del camp PHPList on voleu emmagatzemar el cognom del convidat. Deixeu-lo en blanc per a cap.");
jr_define('_PHPLIST_HLIST_ID',"ID de la llista de correu");