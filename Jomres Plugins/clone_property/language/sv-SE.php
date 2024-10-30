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
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define ('_JRPORTAL_CLONEPROPERTY_TITLE', "Clone property");
jr_define ('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "Välj den egenskap du vill klona:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "Ny fastighets namn:");
jr_define ('_JRPORTAL_CLONEPROPERTY_NOTES', "Var medveten om att klonegenskaper inte har några tariffer, du bör använda klonpriser -pluginet om du vill kopiera tariffer eller skapa tarifferna manuellt. Inga plugin -inställningar importeras, om de är tillgängliga. Egenskapen är inte korsrefererad. med alla fastighetsförvaltare. <br/> Klonegendom ska endast användas för att duplicera en fastighet när den nya fastigheten därefter kommer att använda samma fastighetstyp och rumstyp. ");
jr_define ('_JRPORTAL_CLONEPROPERTY_DONE', "Egendom klonad");