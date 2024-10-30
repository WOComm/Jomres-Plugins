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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Tire kontrolü");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Bu araç, tüm özellik gecikmesini ve uzun alanları kontrol etmek için tasarlanmıştır. Bazılarının enlem veya uzun alanlarında gerçek tireler yerine yanlış html varlıkları olabilir. Bu araç bulunduğunda bunları kısa çizgiye dönüştürür.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Html varlıklarıyla birlikte şimdi gerçek tirelere dönüştürülmüş bazı özellikler bulundu. Dönüştürülen özelliklerin sayısı ");
jr_define('TOOL_HYPHEN_CHECK_DONE_NONEFOUND',"Her şey yolunda, gerçek tirelerin olması gereken html varlıklarında hiçbir özellik bulunamadı.");