<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2013 Aladar Barthi
* Translation to fr-FR by Stéphane Bernard, Valtari NumAgency, France - 26/06/2019 - https://www.valtari.fr
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Contrôle des traits d'union");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Cet outil est conçu pour vérifier tous les champs de retard et de longueur des établissements. Certains peuvent avoir de manière incorrecte des entités HTML dans les champs lat ou long au lieu de traits d'union. Cet outil convertit ceux-ci en traits d'union.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Certains établissements trouvées avec des entités html, qui ont maintenant été converties en traits d'union. Le nombre d'établissement convertis est  ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Tout est bon ! Aucun établissement n'a été trouvé avec des entités HTML où les traits d'union auraient du être.");