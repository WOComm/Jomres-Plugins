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

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax 搜索组合");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"按星星搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"按价格搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"按功能搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"按国家搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"按地区搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"按城镇搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"按房间类型搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"按属性类型搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"按客人编号搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"按日期搜索");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"模板样式");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"默认值：如果在 Bootstrap 中，主要是简单的复选框或按钮。模态：按钮打开以允许用户选择搜索过滤器。手风琴设计用于页面顶部，区域向下滑动以显示过滤器。多选：按钮下拉到显示过滤器。");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"按钮(垂直方向)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"仅模态(垂直方向)Bootstrap。");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"手风琴(水平方向)仅引导程序。");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"多选(水平方向)仅引导程序。");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"显示过滤器");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"隐藏过滤器");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"使用ajax搜索框架。允许您放置一个搜索模块，在侧边栏中提供搜索可用性,价格范围,功能,物业类型,房间类型,客人人数,星级,国家,地区和城镇或顶部栏。请注意，此处显示的示例将不起作用，因为某些参数会相互抵消，请从可用参数中选择您需要的参数(必需参数除外)。此简码与大多数其他简码略有不同短代码，因为它必须在短代码声明之后带有一个特殊的 div，id 为 asamodule_search_results，这是插件放置返回的属性列表的地方。");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"必填。参数必须是ajax_search_composite");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"搜索字段样式。选项是按钮模式手风琴多选如果未设置，则插件将使用站点配置中配置的选项。多选/手风琴是水平显示的理想选择，其他两个选项最适合放置在侧边栏。");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"如果页面任务设置为viewproperty(属性详细信息页面)，则显示搜索表单。0代表否，1代表是。");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"预过滤是只选择满足预过滤条件的属性才能在搜索结果中显示。通过属性uid进行预过滤，因此搜索结果中只能显示某些属性。参数是以逗号分隔的属性 uid 列表");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"按属性类型进行预过滤，因此搜索结果中只能显示此/这些类型的属性。参数是以逗号分隔的属性类型ID列表。");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"按国家/地区代码预过滤，因此搜索结果中只能显示这些国家/地区的属性。参数是ISO国家/地区代码的逗号分隔列表。");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"按区域名称预过滤，因此搜索结果中只能显示这些区域中的属性。参数是区域名称的逗号分隔列表，必须与存储在数据库中的区域匹配。如果例如，您将国家/地区设置为德国 (DE)，则不会显示来自具有类似地区名称的其他国家/地区的属性。");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"启用/禁用表单中的星星输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_stars 将无效。 ");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"启用/禁用表单中的星星输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_price 将无效。 ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"启用/禁用表单中的属性输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_features 将无效.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"启用/禁用表单中的国家/地区输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_country 将无效。 ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"启用/禁用表单中的区域输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_region 将无效。 ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"启用/禁用表单中的城镇输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_town 将无效。 ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"启用/禁用表单中的房间类型输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_roomtype 将无效.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"启用/禁用表单中的属性类型输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_propertytype 将无效.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"启用/禁用表单中的访客号码输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_guestnumber 将无效.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"启用/禁用表单中的日期输入。请注意，如果您已通过站点配置中的 Ajax 搜索复合设置选项卡将选项设置为否，则在参数列表中设置 asc_by_date 将无效。 ");