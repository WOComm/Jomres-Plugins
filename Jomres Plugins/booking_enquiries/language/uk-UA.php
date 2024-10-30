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

jr_define ('_JOMRES_BOOKING_INQUIRY_HEMAIL_TITLE', "Тема електронної пошти");
jr_define ('_JOMRES_BOOKING_REJECTION_HCONTENT', "Текст електронного листа (ви можете відредагувати цей текст, щоб заповнити причину відхилення цього бронювання, запропонувати альтернативи тощо)");
jr_define ('_JOMRES_BOOKING_REJECTION_INSTRUCTIONS', "Цей запит на бронювання буде відхилено та скасовано. Клієнту буде надіслано такий електронний лист.");
jr_define ('_JOMRES_BOOKING_REJECTION_IMPOSSIBLE', "Цей запит на бронювання не можна відхилити, оскільки він уже відхилений або затверджений.");
jr_define ('_JOMRES_BOOKING_APPROVAL_HCONTENT', "Текст електронного листа (ви можете відредагувати цей текст, щоб заповнити інструкції щодо оплати цього бронювання тощо)");
jr_define ('_JOMRES_BOOKING_APPROVAL_INSTRUCTIONS', "Цей запит на бронювання буде прийнято, а наявність буде оновлено у календарі. Клієнту буде надіслано такий електронний лист.");
jr_define ('_JOMRES_BOOKING_APPROVAL_IMPOSSIBLE', "Цей запит на бронювання не може бути схвалено, оскільки він уже відхилений або схвалений.");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILNAME', "Електронна адреса нового запиту адміністратора сайту");
jr_define ('_JOMRES_ADMIN_NEWENQUIRY_EMAILDESC', "Електронний лист, надісланий адміністратору сайту під час бронювання, якщо для бронювання потрібне перше схвалення, а глобальний шлюз PayPal увімкнено");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILNAME', "Електронна пошта про новий запит готелю");
jr_define ('_JOMRES_HOTEL_NEWENQUIRY_EMAILDESC', "Електронний лист, надісланий до готелю під час бронювання, якщо бронювання потребує попереднього схвалення");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILNAME', "Електронна адреса нового запиту для гостей");
jr_define ('_JOMRES_GUEST_NEWENQUIRY_EMAILDESC', "Лист, надісланий гостю під час бронювання, якщо бронювання потребує попереднього схвалення");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILNAME', "Електронна адреса для схвалення запитів гостей");
jr_define ('_JOMRES_GUEST_APPROVEENQUIRY_EMAILDESC', "Електронний лист, надісланий гостю адміністратором нерухомості вручну для підтвердження наявності запиту");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILNAME', "Електронна пошта для відхилення запиту гостей");
jr_define ('_JOMRES_GUEST_REJECTENQUIRY_EMAILDESC', "Електронний лист, надісланий гостю адміністратором нерухомості вручну, якщо цей об’єкт недоступний для деталей запиту");