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


	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_TITLE', "Tulajdonrészletek sablonjai" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_INFO', "Ez a beépülő modul számos különböző tulajdonságrészlet-sablonfájlt tartalmaz. Itt konfigurálhatja, hogy a vezetők kiválaszthassák-e saját tulajdonrészletes sablonjaikat, és melyik sablon legyen az alapértelmezett webhely." );

	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_TITLE', "Tulajdonrészletek sablon" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_CONFIGURATION_DESCRIPTION', "Válassza ki azt az elrendezést, amelyet használni szeretne, amikor az emberek megtekintik a tulajdonát." );

	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT', "Alapértelmezett tulajdonság részletei oldalelrendezés" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_DEFAULT_INFO', "Állítsa be, hogy az egész webhelyen melyik tulajdonságrészletes sablont használja. Ha a vezetők használhatják saját elrendezéseiket, akkor a választásuk felülírja ezt." );

	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED', "A vezetők választhatnak saját sablont?" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_ADMIN_MANAGERS_ALLOWED_INFO', "Használja ezt a beállítást annak meghatározására, hogy az ingatlankezelők kiválaszthatják-e saját ingatlan részleteit tartalmazó oldal elrendezését." );


	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DEFAULT', "Alapértelmezett tulajdonság részletei" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_LUX', "Luxus elrendezés" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_MINIMALIST', "Minimalista elrendezés" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_CALENDAR_ONLY', "Csak a naptárban" );
	jr_define( 'JOMRES_BS5_PROPERTY_DETAILS_TEMPLATES_DYNAMO', "Dynamo" );