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

jr_define('_JOMRES_ICAL_EVENT', 'iCal 事件');
jr_define('_JOMRES_ICAL_FEED', 'iCal Feed');
jr_define('_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL');
jr_define('_JOMRES_ICAL_FEEDS', 'iCal Feed/s');
jr_define( '_JOMRES_ICAL_FEEDS_DESC', '您的 iCal feed/s 可以在远程日历中显示即将到来的预订，包括您的移动设备,Google 日历,Apple 日历,Thunderbird,Outlook 等。使用以下 URL/s 订阅 feed/s您的日历软件。');
jr_define('_JOMRES_ICAL_ANON', '匿名 iCal Feed URL');
jr_define('_JOMRES_ICAL_ALLOW_ANON', '允许匿名访问 iCal feed/s？');
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', '如果启用此选项，您的 iCal 活动供稿将可供所有人使用，但没有预订或客人详细信息。');
jr_define('_JOMRES_ICAL_IMPORT', 'iCal 导入');
jr_define( '_JOMRES_ICAL_SELECT', '选择要导入的文件');
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', '错误，没有上传文件。');
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "导入 iCal 文件时，活动结束日期应为客人的离开日期。摘要应为客人的姓名。活动描述可以包含所有其他详细信息。");

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', '系统中已存在此预订编号。');
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', '所选日期没有空房。');
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', '在 ics 文件中没有发现事件。');
jr_define( '_JOMRES_ICAL_SUCCESS', '事件导入成功');
jr_define('_JOMRES_ICAL_FAILURE', '事件无法导入');

jr_define('_JOMRES_ICAL_RESULT_HEADER_SUMMARY', '客人姓名');
jr_define('_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', '事件描述');
jr_define('_JOMRES_ICAL_RESULT_HEADER_START', '开始');
jr_define('_JOMRES_ICAL_RESULT_HEADER_END', '结束');
jr_define('_JOMRES_ICAL_RESULT_HEADER_RESULT', '结果');
jr_define('_JOMRES_ICAL_WITHHELD', '隐瞒');
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', '您的 iCal feed/s 可以在远程日历中显示即将到来的预订，包括您的移动设备,谷歌日历,Apple 日历,Thunderbird,Outlook 等。');
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', '此功能允许您将 Airbnb,Homeway 等网站的预订同步到 Jomres。您必须为要与之同步的每个网站输入您的财产的 iCal 供稿网址。如果有人愿意例如，在 Airbnb 上预订您的房产，这些日期也会在 Jomres 网站上显示为阻止(黑色预订)，因此没有人也可以在此处预订这些日期。这不会在网站之间同步预订详细信息(例如客人详细信息,价格,发票等)，但这是一种通过仅同步可用性来避免重复预订的好方法。');
jr_define('_JOMRES_ICAL_SYNC_SETTINGS', 'iCal 同步设置');
jr_define('_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed 设置');
jr_define('_JOMRES_ICAL_SYNC_URL1', '外部 iCal URL');
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', '还包括预订查询吗？' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', '如果启用，它还将包括尚未批准的预订(如果启用了预订批准功能)。禁用此选项是从日历中隐藏可能正在等待确认的预订的好方法未批准/查询状态。如果预订不需要批准(预订批准功能已禁用)，所有预订将被导出。' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds');
jr_define('_JOMRES_ICAL_REMOTE_FEED_URL', '远程 URL');
jr_define('_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', '房间 UID');
jr_define('_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', '房间名称/号码');
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "选择此提要将影响的房间，以及远程站点的 url。导入 iCal 文件时，活动结束日期应为客人的离开日期。摘要应为客人的姓名。活动说明可以包含所有其他详细信息。" );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical 远程提要创建');
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical 远程提要已删除');