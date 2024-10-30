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

	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW',"Egyetlen vélemény megjelenítése");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_PROPERTY_UID',"Tulajdon azonosítója");
	jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_SCORE_THREASHOLD',"Értékelési küszöb. Csak azokat a véleményeket jelenítse meg, amelyek pontszáma >= küszöb.");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_IS_SNIPPET',"(Opcionális) 1 vagy 0. Ha 1, akkor egy kis szövegrészt, ha 0, akkor a teljes szövegrészt. Alapértelmezett 0.");
jr_define('_JOMRES_SHORTCODES_0600SHOW_SINGLE_REVIEW_ARG_ALT_REVIEW_ID',"(Opcionális) Ellenőrzési azonosító. Ha nincs beállítva, véletlenszerű értékelés jelenik meg )");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_PATH',"(Opcionális) Sablon elérési útja. Csak akkor használható, ha a componentArgs változó átadja");
jr_define('_JOMRES_SHORTCODES_06000SHOW_SINGLE_REVIEW_ARG_ALT_TEMPLATE_NAME',"(Opcionális) Sablon neve");

