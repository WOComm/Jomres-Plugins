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


jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp');
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'Bu entegrasyon yöntemi, sisteme bir misafir eklediğinizde bir Mailchimp Listesini günceller.<br/>
Bu web kancası için URL girişini ayarlamanıza gerek yok, bunu API\'nize göre çözeceğiz.<br/>
Bu web kancasını yapılandırmak için iki öğeye ihtiyacınız olacak, bir API anahtarı ve liste kimliği. <br/>
API anahtarınızı bulmak için Mailchimp hesabınıza gidin ve:<br/>
<ol>
  <li>Hesap Panelini genişletmek için profil adınızı tıklayın ve Hesap\'ı seçin.</li>
  <li>Ekstralar açılır menüsünü tıklayın ve API anahtarlarını seçin.</li>
  <li>Mevcut bir API anahtarını kopyalayın veya Anahtar Oluştur düğmesini tıklayın.</li>
  <li>Anahtarınızı açıklayıcı bir şekilde adlandırın, böylece bu anahtarı hangi uygulamanın kullandığını bilirsiniz.</li>
</ol>
Ardından, Mailchimp\'teki Listelerinizi ziyaret ederek bulabileceğiniz Liste Kimliğine ihtiyacınız olacak. Listeler menüsü bağlantısına tıklayın ve satırın sonundaki açılır menüye sağ tıklayın, ardından Ayarlar\'ı seçin. Bu sayfanın en altına gidin, "Blahblah listesi için liste kimliği" gibi bir şey söyleyecektir. Bu, kullanmanız gereken listenin kimliğidir.
    ');

jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'API Anahtarı');
jr_define('WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'Liste Kimliği');


