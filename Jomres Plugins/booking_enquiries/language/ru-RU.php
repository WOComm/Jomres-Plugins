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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Тема письма");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Текст сообщения электронной почты (вы можете отредактировать этот текст, чтобы указать причину отклонения этого бронирования, предложить альтернативы и т. д.)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Этот запрос на бронирование будет отклонен и отменен. Следующее электронное письмо будет отправлено клиенту.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Этот запрос на бронирование не может быть отклонен, потому что он уже был отклонен или одобрен.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Текст сообщения электронной почты (вы можете отредактировать этот текст, чтобы заполнить инструкции по оплате для этого бронирования и т. д.)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Этот запрос на бронирование будет принят, и информация о наличии мест будет обновлена ​​в календаре. Следующее электронное письмо будет отправлено клиенту.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Этот запрос на бронирование не может быть одобрен, потому что он уже был отклонен или одобрен.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Электронное письмо с новым запросом администратора сайта");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Электронное письмо, отправленное администратору сайта во время бронирования, если бронирование сначала требует утверждения и включен глобальный шлюз PayPal");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Электронное письмо с запросом о новом отеле");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Электронное письмо, отправленное в отель во время бронирования, если бронирование сначала требует подтверждения");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Электронная почта нового запроса гостя");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Электронное письмо, отправленное гостю во время бронирования, если бронирование сначала требует подтверждения");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Электронное письмо с подтверждением запроса гостя");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Электронное письмо, отправленное гостю вручную менеджером отеля для подтверждения доступности для запроса");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Электронное письмо с отклонением запроса гостя");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Электронное письмо, отправленное гостю вручную менеджером собственности, если свойство недоступно для деталей запроса");