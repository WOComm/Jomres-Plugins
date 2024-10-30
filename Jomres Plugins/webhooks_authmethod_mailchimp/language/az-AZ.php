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


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Bu inteqrasiya metodu siz sistemə qonaq əlavə etdiyiniz zaman Mailchimp Siyahısını yeniləyir.<br/>
Bu webhook üçün URL daxiletməsini təyin etməyinizə ehtiyac yoxdur, biz bunu API əsasında müəyyən edəcəyik.<br/>
Bu webhooku konfiqurasiya etmək üçün sizə iki məlumat elementi, API açarı və siyahı ID-si lazımdır. <br/>
API açarınızı tapmaq üçün Mailchimp hesabınıza daxil olun və:<br/>
<ol>
  <li>Hesab Panelini genişləndirmək üçün profil adınıza klikləyin və Hesab seçin.</li>
  <li>Əlavələr açılır menyusuna klikləyin və API açarlarını seçin.</li>
  <li>Mövcud API açarını kopyalayın və ya Açar Yarat düyməsini klikləyin.</li>
  <li>Açarınızı təsviri olaraq adlandırın ki, hansı proqramın həmin açardan istifadə etdiyini biləsiniz.</li>
</ol>
Sonra sizə Mailchimp-də Siyahılarınıza baş çəkərək tapa biləcəyiniz Siyahı İd-si lazımdır. Siyahılar menyusu bağlantısını vurun və sətrin sonunda sağ tərəfdəki açılan menyunu vurun, sonra Parametrlər seçin. Həmin səhifənin aşağısına sürüşdürün, "Blahblah siyahısı üçün siyahı id" kimi bir şey deyəcək. Bu istifadə etməli olduğunuz siyahının id-sidir.
    ' );

jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API Açarı' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Siyahı ID' );