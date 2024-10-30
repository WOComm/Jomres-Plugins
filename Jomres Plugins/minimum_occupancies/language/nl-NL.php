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




jr_define('_OCCUPANCIES_TITLE',"Minimum bezettingen");

jr_define('_OCCUPANCIES_DESCRIPTION',"U kunt de minimale bezettingsniveaus voor specifieke kamertypes instellen als u er zeker van wilt zijn dat de gast een bepaald aantal gasttypes heeft geselecteerd in het boekingsformulier voordat de juiste kamer- en tariefcombinatie wordt weergegeven." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Hier kunt u voor elk kamertype een minimale bezettingsgraad creëren. Een kamer/tariefcombinatie wordt niet aangeboden als de gast niet het juiste aantal gasttypes heeft geselecteerd. Selecteer voor elk kamertype de aantal gasten van een bepaald type dat er een minimum moet zijn in het boekingsformulier voordat het kamertype wordt aangeboden.Als het u niet kan schelen wat de bezettingsgraad voor een kamertype moet zijn, laat het gastnummer van dat kamertype op 0 staan (nul). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Gasttypenummer");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"U heeft nog geen gasttypes aangemaakt. Maak eerst een aantal gasttypes aan voordat u deze functie gebruikt.");

jr_define('_OCCUPANCIES_EDIT',"Bewerk minimumbezetting voor ");