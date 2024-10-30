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

jr_define('_CLONE_TARIFFS_TITLE',"Klon Tarifeleri");
jr_define('_CLONE_TARIFFS_INFO',"Buradan hedef mülkten kaynak mülke bir tarife klonlayabilirsiniz. Yalnızca yönetme yetkisine sahip olduğunuz mülkler size açık olacaktır.");
jr_define('_CLONE_TARIFFS_SOURCE',"Kaynak özelliği");
jr_define('_CLONE_TARIFFS_TARIFF_TO_CLONE',"Klonlanacak tarife");
jr_define('_CLONE_TARIFFS_TARGET',"Hedef özellik");
jr_define('_CLONE_TARIFFS_TARGET_ROOMTYPE',"Hedef tesis oda tipi");
jr_define('_CLONE_TARIFFS_TARGET_WARNING',"Hedef mülkün tarife düzenleme modu, Kaynak mülkün tarife düzenleme modundan farklıysa, klonlama gerçekleştiğinde, Hedef mülkün orijinal tarifeleri silinir ve Tarife düzenleme modu, Kaynak mülkün tarife düzenleme modunu yansıtacak şekilde değiştirilir. mülkün ayarı.");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_EXISTING',"Hedef mülkteki mevcut tarifeler silinsin mi?");
jr_define('_CLONE_TARIFFS_TARGET_DELETE_OPTION',"Hedef özelliğinin tarife düzenleme modu Kaynak özelliği ile aynı ise mevcut tarifeler silinmez. Ancak bu seçeneği Evet olarak ayarlayarak bunu geçersiz kılabilirsiniz.");