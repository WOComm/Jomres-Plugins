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

jr_define ('_JOMRES_DATAWIPE_TITLE', "Esborrat de dades");
jr_define ("_ JOMRES_DATAWIPE_DESC", "Aquesta característica us permet suprimir les dades que es recopilen quan es fan les reserves. Està pensada per als desenvolupadors que han creat moltes dades de desenvolupament a les seves instal·lacions (com ara reserves de proves, subscripcions) i volen esborreu la informació del sistema, mantenint la informació sobre propietats i tarifes. <br/> El connector eliminarà TOTS els registres de cron, els preferits de l'usuari, les notes, les reserves, les factures, els subscriptors, les subscripcions, els convidats, les dades d'auditoria, el recompte de clics i les ressenyes. " );
jr_define ('_JOMRES_DATAWIPE_WARNING', "Aquestes dades només es poden recuperar d'una còpia de seguretat del vostre sistema, de manera que heu d'entendre que es tracta d'un script molt perjudicial. Com a resultat, es recomana que un cop les hàgiu fet servir amb el propòsit de tornar-lo a desinstal·lar després. ");
jr_define ('_JOMRES_DATAWIPE_GO', "Feu clic per esborrar les dades");
jr_define ('_JOMRES_DATAWIPE_EMPTYING', "Buidatge");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_SUCCESS', "Buidat correctament.");
jr_define ('_JOMRES_DATAWIPE_EMPTYING_FAILURE', "No s'ha pogut buidar la taula.");