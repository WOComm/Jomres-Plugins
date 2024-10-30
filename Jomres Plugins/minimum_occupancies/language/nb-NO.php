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
jr_define('_OCCUPANCIES_TITLE',"Minimumsbelegg");

jr_define('_OCCUPANCIES_DESCRIPTION',"Du kan angi minimumsbeleggsnivåer for spesifikke romtyper, hvis du vil sikre at gjesten har valgt et visst antall gjestetyper i bestillingsskjemaet før passende rom- og takstkombinasjon vises." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Her kan du opprette et minimumsbeleggsnivå for hver romtype. En kombinasjon av rom/tariff vil ikke bli tilbudt hvis gjesten ikke har valgt riktig antall gjestetyper. For hver romtype, velg antall gjester av en gitt type som det bør være et minimum i bestillingsskjemaet før romtypen tilbys. Hvis du ikke bryr deg om hva beleggsnivået for en romtype skal være, la romtypens gjestenummer være satt til 0 (null). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Gjestetypenummer");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Du har ikke opprettet noen gjestetyper ennå. Opprett noen gjestetyper før du bruker denne funksjonen.");

jr_define('_OCCUPANCIES_EDIT',"Rediger minimumsbelegg for ");