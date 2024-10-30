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


jr_define ('_COMMON_STRINGS_TITLE', "Vanliga mallvariabler");

jr_define ('_COMMON_STRINGS_INFO', "Utvecklarverktyg. Utformat för att visa utvecklare vanliga strängar som är tillgängliga för alla mallar utan att behöva lägga till dem i mallens anropsskript. <br/> Till exempel finns definitionen COMMON_NEXT i denna lista. En utvecklare kan lägga till detta i en Jomres -mall utan att behöva definiera det i anropsskriptet. Du skulle lägga till den gemensamma strängen i mallen precis som alla andra strängar genom att sätta &#123;COMMON_NEXT&#125; i mallen. <br/> I listan nedan ser du konstanten enligt definitionen i språkfilen och bredvid den utdata som den kommer att visa (förutsatt att det finns egenskapsspecifika språkanpassningar). Observera, när det gäller konstanten 'COMMON_LAST_VIEWED_PROPERTY_UID', egenskapen uid varierar och visas inte i denna lista. ");
jr_define ('_COMMON_STRINGS_CONSTANT', "Constant");
jr_define ('_COMMON_STRINGS_VALUE', "Output");