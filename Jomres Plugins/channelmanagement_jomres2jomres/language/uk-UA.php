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

jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_TITLE', "Інтеграція Джомреса 2 Джомреса");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_TITLE', "Ідентифікатор клієнта батьківського сайту");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_DESC', "Ідентифікатор клієнта батьківського сайту. На батьківському сайті вам знадобиться унікальний ідентифікатор клієнта та секрет із усіма встановленими плагінами функцій api, плагіном Channel Management Framework, а також під час створення/редагування ідентифікатора клієнта/ пару секретних ключів, вам потрібно буде надати їй доступ до всіх доступних областей. ");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_TITLE', "Секрет клієнта батьківського сайту");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_DESC', "Секрет клієнта батьківського сайту");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_TITLE', "Батьківська URL -адреса");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENTSITE_DESC', "URL -адреса батьківського сайту Jomres.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET', "Помилка, ідентифікатор клієнта вашого батьківського сайту не встановлено. Перейдіть на вкладку Конфігурація сайту> Облікові записи менеджера каналу, щоб зберегти ідентифікатор клієнта.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET', "Помилка, секрет вашого батьківського сайту не встановлено. Перейдіть на вкладку Конфігурація сайту> облікові записи менеджера каналів, щоб зберегти свій секрет.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PARENT_NOT_SET', "Помилка, секретна URL -адреса вашого батьківського сайту не встановлена. Перейдіть на вкладку Конфігурація сайту> Облікові записи диспетчера каналів, щоб зберегти URL -адресу батьківського сайту.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_USERNAME_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Помилка, ваш ідентифікатор клієнта не встановлено. Перейдіть на вкладку Конфігурація сайту ">" Облікові записи менеджера каналу, щоб зберегти своє ім'я користувача.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_PASSWORD_NOT_SET_ADMIN_SANITY_CHECK_MESSAGE', "Помилка, ваш ідентифікатор клієнта не встановлено. Перейдіть на вкладку Конфігурація сайту ">" Облікові записи менеджера каналу, щоб зберегти свій пароль.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_TITLE', "Налаштування каналу");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_MESSAGE', "Джомрес 2 Джомрес: Імпортувати нові властивості.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_IMPORT', "IMPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_SETUP_INITIALISE_BUTTON_EXPORT', "EXPORT");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYID_NOTSET', "Ідентифікатор властивості не встановлено");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET', "Відображені елементи словника не встановлені");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_PROPERTYTYPE_NOTFOUND', "Тип локальної власності не знайдено. Якщо тип властивості був створений, переконайтеся, що ви зіставили тип властивості віддаленої служби з місцевим типом властивості.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REMOTEPROPERTYTYPE_NOTFOUND', "Тип віддаленої властивості не повертається каналом.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_LOCAL_PROPERTYTYPE_NOTFOUND', "Тип локальної власності не передано.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND', "Не вдалося визначити модель бронювання (mrp або srp).");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_BOOKING_MODEL_NOT_FOUND_IN_PROPERTY_TYPE', "Не вдалося визначити модель бронювання (mrp або srp) після знаходження ідентифікатора типу власності.");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_COUNTRY_CODE_NOT_FOUND', "Не вдалося визначити код країни");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_REGION_ID_NOT_FOUND', "Не вдалося визначити ідентифікатор регіону");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_VALIDATE_SETTINGS_FAILED', "Не вдалося належним чином перевірити масив налаштувань");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PTYPES', "Типи властивостей не відображені адміністратором");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_PFEATURES', "Функції власності не відображені адміністратором");
jr_define ('CHANNELMANAGEMENT_JOMRES2JOMRES_IMPORT_MAPPEDDICTIONARYITEMS_NOTSET_ROOM_TYPES', "Типи кімнат не відображені адміністратором");