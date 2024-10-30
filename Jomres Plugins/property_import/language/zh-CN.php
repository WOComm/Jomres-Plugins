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

jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"属性导入");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"此功能允许您通过 CSV 文件导入属性。由于需要进行各种检查，我们建议您将创建的属性数量限制为一次不超过 50 个批次。");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"请选择您要上传的文件。");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"csv 文件应该有 11 列，并且字段不应包含任何 html。所有字段都是必需的。");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"属性名称");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"房间数(如果这是别墅/小屋那么无论实际财产中的房间数如何，都应该是1。只有酒店/B＆B等应该有一个以上的房间)。整数.");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE',"整数");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"不含货币代码的每晚价格。");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"浮动");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS',"电子邮件地址");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"街道");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"城镇");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION',"Region。这个需要和Regions表中存储的region的id对应");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE',"整数");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"属性国家。短代码，例如GB或DE，不是完整的国家名称");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"邮政编码");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"电话号码");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"文本");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"属性的完整描述。最多500个字符");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE',"文本");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"错误，未设置属性类型。");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"错误，我们没有该物业类型的任何房间类型。您可以通过访问管理员区域中的站点结构来更正此问题。");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_FILE',"哎呀，你忘记上传文件了吗？");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"找到的列太多，要么文件格式错误，要么csv数据结构不正确。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"未设置属性名称。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"房间数未设置。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"未设置每晚价格。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"无法验证电子邮件地址。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"街道未设置。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"城镇未设置。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"区域未设置。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY',"未设置国家。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"未设置邮政编码。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE',"电话未设置。");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"未设置说明。");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"属性导入成功！");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"由于您有一个或多个导入失败的属性，我们仅将这些属性导出到下面的字段中。您可以将这些属性复制到 Excel/open office calc/您选择的 CSV 文件处理程序并修复无需再次重新导入所有属性即可解决问题。");