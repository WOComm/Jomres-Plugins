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

jr_define('_PHPLIST_INSTRUCTIONS',"Този плъгин интегрира Jomres с PHPList и ви позволява автоматично да добавяте име и имейл на клиенти към пощенски списък, когато направят резервация.");
jr_define('_PHPLIST_HSKIPCONFEMAIL',"Пропускане на имейл за потвърждение на абонамента?");
jr_define('_PHPLIST_HSENDHTMLEMAILS',"Изпращане на HTML имейли?");
jr_define('_PHPLIST_HPHPLISTURL',"основен URL адрес на началната страница на PHPList");
jr_define('_PHPLIST_HPHPLISTURL_DESC',"URL адресът трябва да има крайна наклонена черта и да не използва никакви параметри в него");
jr_define('_PHPLIST_HUSER',"PHPList потребителско име на администратора");
jr_define('_PHPLIST_HPASS',"PHPList администраторска парола");
jr_define('_PHPLIST_HATTRIB1',"атрибут1");
jr_define('_PHPLIST_HATTRIB1_DESC',"PHPList атрибут/име на поле, където искате да съхраните името на госта. Оставете празно за нищо.");
jr_define('_PHPLIST_HATTRIB2',"атрибут2");
jr_define('_PHPLIST_HATTRIB2_DESC',"PHPList атрибут/име на поле, където искате да съхраните фамилията на госта. Оставете празно за нищо.");
jr_define('_PHPLIST_HLIST_ID',"Идентификатор на пощенския списък");