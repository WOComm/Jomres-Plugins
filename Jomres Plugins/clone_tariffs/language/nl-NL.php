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


jr_define('_CLONE_TARIFFS_TITLE',"Kloon Tarieven");
jr_define('_CLONE_TARIFFS_INFO',"Hier kunt u een tarief van een doeleigenschap naar een broneigenschap klonen. Alleen eigendommen die u bevoegd bent om te beheren, zijn voor u beschikbaar.");
jr_define('_CLONE_TARIFFS_SOURCE',"Broneigenschap");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarieven om te klonen");
jr_define('_CLONE_TARIFFS_TARGET',"Doeleigenschap");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Doel kamertype woning");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Als de tariefbewerkingsmodus van de Target-property anders is dan de tariefbewerkingsmodus van de Source-property, worden bij het klonen de oorspronkelijke tarieven van de Target-property verwijderd en wordt de tariefbewerkingsmodus gewijzigd om die van de Bron weer te geven instelling van de accommodatie.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Bestaande tarieven op Target-eigendom verwijderen?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Als de tariefbewerkingsmodus van de Target-eigenschap dezelfde is als de Source-eigenschap, worden de bestaande tarieven niet verwijderd. U kunt er echter voor kiezen om dit te negeren door deze optie in te stellen op Ja.");