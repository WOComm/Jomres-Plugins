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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Defises pārbaude");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Šis rīks ir paredzēts, lai pārbaudītu visus rekvizītus nobīdes un garos laukus. Dažos laukos var būt nepareizi ievietotas html entītijas, nevis faktiskās defises. Kur tiek atrasts, šis rīks tos pārvērš defisēs.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Daži rekvizīti atrasti ar html entītijām, kas tagad ir pārveidoti faktiskās defisēs. Pārveidoto rekvizītu skaits ir ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Viss ir labi, ar html entītijām netika atrasts neviens rekvizīts, kur vajadzētu būt faktiskajām defisēm.");