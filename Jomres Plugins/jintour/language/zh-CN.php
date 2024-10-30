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

jr_define('_JINTOUR_TITLE',"旅游/活动管理");

jr_define('_JINTOUR_PROFILES_TITLE',"旅游/活动简介");
jr_define('_JINTOUR_PROFILES_NEW',"新的旅游/活动资料");
jr_define('_JINTOUR_PROFILES_DELETE',"删除旅游/活动资料");

jr_define('_JINTOUR_PROFILE_TITLE',"个人资料标题");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"说明");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"输入您的旅行/活动的描述，包括它的行程。");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"星期几");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"成人价格");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"儿童价格");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"要排除预订表格中出现的选项，请将价格保留为 0(零)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"成人空间");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"子空间");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"旅游/活动的可用空间数量");
jr_define('_JINTOUR_PROFILE_START_DATE',"赛季开始");
jr_define('_JINTOUR_PROFILE_END_DATE',"赛季结束");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"创建游览/活动配置文件后，您将需要根据该配置文件的设置生成游览/活动。创建游览/活动，然后单击该配置文件旁边的绿色箭头图标以创建游览/活动本身。创建游览/活动后，您可以根据需要删除单个游览/活动。");
jr_define('_JINTOUR_PROFILE_GENERATE',"生成旅游/活动");

jr_define('_JINTOUR_TOUR_TITLE',"活动标题");
jr_define('_JINTOUR_TOUR_DATE',"日期");
jr_define('_JINTOUR_TOUR_ADULTS',"成人");
jr_define('_JINTOUR_TOUR_KIDS',"儿童");
jr_define('_JINTOUR_TOUR_ITINERY',"行程");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"生成的新旅游");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"旅游预订取消");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"新旅游产生");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"当前可用空间");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"新的旅游/资源ID预订");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"已为管理员导览/资源进行了新预订。请查看以下链接以查看该导览的管理员区域页面");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres 综合旅游配置");
jr_define('_JINTOUR_TITLE_WHOLESITE',"整个安装是金途安装吗？");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"如果将此设置为 Yes，则所有属性都将是旅游属性。如果将其设置为 No，则在创建新属性时，您将能够同时拥有 Tour 和酒店/公寓类型的属性。 ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"旅游");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"如果您提供特定日期可用项目的预订(例如旅游,音乐会门票。)，请选择旅游选项。");
jr_define('_JINTOUR_SHOWDEPARTURE',"显示出发输入字段？");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"如果您想同时显示到达和出发日期，请将其设置为 Yes。如果您提供巴士旅行,飞机票等需要知道到达和离开日期的地方，这将非常有用，显示出发日期允许您提供多个日期的资源，而设置为否时，只能接受某一日期的预订。");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"旅游列表");