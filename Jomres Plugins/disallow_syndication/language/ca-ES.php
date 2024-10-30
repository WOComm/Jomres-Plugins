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
jr_define ('DISALLOW_SYNDICATION_TITLE', "No permet la sindicació");
jr_define ('DISALLOW_SYNDICATION_DESCRIPTION', 'La característica de sindicació de Jomres.net és una nova funcionalitat dissenyada per compartir propietats entre llocs, tot i que les reserves només es poden fer al servidor inicial.');

jr_define ('DISALLOW_SYNDICATION_DESCRIPTION_MORE', "El propòsit d'això és fer possible que els llocs generin confiança amb els motors de cerca. És una funció gratuïta, disponible per a tots els usuaris de Jomres. Els titulars de llicències Jomres actius poden, si volen, eliminar els seus local de la xarxa de sindicació mitjançant aquesta pàgina. Localhost no es pot afegir a la xarxa i, per qualsevol motiu, hi ha un problema de connectivitat, no podreu afegir el lloc a la xarxa. Consulteu la pàgina de prova de connectivitat de l'API REST teniu cap dubte. ");

jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW', "Feu clic en aquest enllaç per eliminar el vostre lloc de la xarxa.");
jr_define ('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW', "Feu clic en aquest enllaç per afegir el vostre lloc a la xarxa.");

jr_define ('DISALLOW_SYNDICATION_DISALLOW', "Elimineu aquest lloc de la xarxa");
jr_define ('DISALLOW_SYNDICATION_ALLOW', "Afegeix aquest lloc a la xarxa");

jr_define ('DISALLOW_SYNDICATION_INVALID_KEY', "Ho sentim, la vostra clau d'assistència no és vàlida o no està activa, no podeu canviar l'estat de sindicació d'aquesta instal·lació.");