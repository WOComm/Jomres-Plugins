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

jr_define('_OCCUPANCIES_TITLE',"Minimalna popunjenost");

jr_define ('_OCCUPANCIES_DESCRIPTION', "Možete postaviti minimalne razine zauzetosti za određene vrste soba, ako želite osigurati da je gost odabrao određeni broj vrsta gostiju u obrascu za rezervaciju prije nego što se prikaže odgovarajuća kombinacija sobe i tarife." );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"Ovdje možete kreirati minimalnu popunjenost za svaku vrstu sobe. Kombinacija soba/cijena neće biti ponuđena ako gost nije odabrao odgovarajući broj vrsta gostiju. Za svaku vrstu sobe odaberite broj gostiju određene vrste koji bi trebao biti minimalan u obrascu za rezervaciju prije nego što se ponudi vrsta sobe. Ako vas nije briga kolika bi trebala biti popunjenost za vrstu sobe, ostavite broj gostiju te vrste sobe postavljen na 0 (nula). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"Broj tipa gosta");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"Još nemate kreiranu nijednu vrstu gostiju. Prije korištenja ove značajke stvorite neke vrste gostiju.");

jr_define('_OCCUPANCIES_EDIT',"Uredi minimalnu popunjenost za ");