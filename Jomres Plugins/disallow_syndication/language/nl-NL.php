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




jr_define('DISALLOW_SYNDICATION_TITLE',"Syndicatie niet toestaan");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','De syndicatiefunctie van Jomres.net is een nieuwe functionaliteit die is ontworpen om eigendommen tussen sites te delen, hoewel boekingen alleen op de Home-server kunnen worden gemaakt. ');

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"Het doel hiervan is om het voor sites mogelijk te maken om vertrouwen op te bouwen bij zoekmachines. Het is een gratis functie die beschikbaar is voor alle Jomres-gebruikers. Actieve Jomres-licentiehouders kunnen, als ze ervoor kiezen om hun site van het syndicatienetwerk via deze pagina. Localhost kan niet aan het netwerk worden toegevoegd en als er om welke reden dan ook een probleem is met de connectiviteit, kunt u uw site niet aan het netwerk toevoegen. Controleer de REST API-connectiviteitstestpagina als u enige twijfel hebben.");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"Klik op deze link om uw site van het netwerk te verwijderen.");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"Klik op deze link om uw site aan het netwerk toe te voegen.");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"Verwijder deze site van het netwerk");
jr_define('DISALLOW_SYNDICATION_ALLOW',"Voeg deze site toe aan het netwerk");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"Sorry, uw ondersteuningssleutel is niet geldig of niet actief, u kunt de syndicatiestatus van deze installatie niet wijzigen.");