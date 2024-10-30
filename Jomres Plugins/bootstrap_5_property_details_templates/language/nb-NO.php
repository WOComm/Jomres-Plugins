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
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', "Egenskapsdetaljer maler" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_INFO', "Dette pluginet inneholder en rekke forskjellige malfiler for eiendomsdetaljer. Her kan du konfigurere om ledere kan velge sine egne maler for eiendomsdetaljer, og hvilken mal du vil skal være standard for nettstedet." );

	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_TITLE', "Mal for eiendomsdetaljer" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_DESCRIPTION', "Velg oppsettet du vil bruke når folk ser på eiendommen din." );

	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT', "Standard layout for egenskapsdetaljer" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT_INFO', "Konfigurer hvilken mal for eiendomsdetaljer som skal brukes på hele nettstedet. Hvis ledere har lov til å bruke sine egne oppsett, vil deres valg overstyre denne." );

	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED', "Ledere kan velge egen mal?" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED_INFO', "Bruk denne innstillingen til å bestemme om eiendomsforvaltere kan velge sin egen sidelayout for eiendomsdetaljer." );


	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DEFAULT', "Standard egenskapsdetaljer" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_LUX', "Luksusoppsett" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_MINIMALIST', "Minimalistisk layout" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_CALENDAR_ONLY', "Kun kalender" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DYNAMO', "Dynamo" );