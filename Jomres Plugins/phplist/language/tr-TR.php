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

jr_define('_PHPLIST_INSTRUCTIONS',"Bu eklenti Jomres'i PHPList ile entegre eder ve rezervasyon yaptıklarında müşterilerin adını ve e-postasını bir posta listesine otomatik olarak eklemenizi sağlar.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Abonelik onay e-postası atlansın mı?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"HTML e-postaları gönderilsin mi?");
jr_define('_PHPLIST_HPHPLISTURL',"PHPList ön sayfa temel URL'si");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"URL'nin sonunda eğik çizgi olmalı ve içinde herhangi bir param kullanılmamalıdır");
jr_define('_PHPLIST_HUSER',"PHPList yönetici kullanıcı adı");
jr_define('_PHPLIST_HPASS',"PHPList yönetici şifresi");
jr_define('_PHPLIST_HATTRIB1',"özellik1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList özelliği/konuk adını saklamak istediğiniz alan adı. Hiçbiri için boş bırakın.");
jr_define('_PHPLIST_HATTRIB2',"özellik2");
jr_define('_PHPLIST_HATTRIB2_DESC',"Misafir soyadını saklamak istediğiniz PHPlist özniteliği/alan adı. Hiçbiri için boş bırakın.");
jr_define('_PHPLIST_HLIST_ID',"Posta listesi kimliği");