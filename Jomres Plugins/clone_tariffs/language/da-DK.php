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

jr_define('_CLONE_TARIFFS_TITLE',"Klontakster");
jr_define('_CLONE_TARIFFS_INFO',"Her kan du klone en tarif fra en målegenskab til en kildeejendom. Kun egenskaber, som du har autoritet til at administrere, vil være tilgængelige for dig.");
jr_define('_CLONE_TARIFFS_SOURCE',"Kildeegenskab");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Tarif for at klone");
jr_define('_CLONE_TARIFFS_TARGET',"Målegenskab");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Målejendom værelsestype");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Hvis Target-egenskabens takstredigeringstilstand er forskellig fra Source-egenskabens takstredigeringstilstand, vil Target-egenskabens oprindelige takster blive slettet, når kloningen finder sted, og dens tarifredigeringstilstand ændres, så den afspejler den for Kilden ejendommens indstilling.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Slet eksisterende tariffer på Target ejendom?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Hvis Target-egenskabens takstredigeringstilstand er den samme som Source-egenskaben, slettes de eksisterende tariffer ikke. Du kan dog vælge at tilsidesætte dette ved at sætte denne mulighed til Ja.");