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

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"拍卖行");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"购买");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"销售");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"拍卖之家");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"我出价的商品");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"列出拍卖");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"物业仪表板");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"列出您的拍卖");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"新拍卖");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"编辑拍卖");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"取消拍卖");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"提前结束拍卖");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"请选择您想与本次拍卖关联的房产。");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"这次拍卖中是否包括房间/房产？");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"请选择您想参与本次拍卖的房间，先选择预订日期，然后再选择房间。");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"请选择您想在拍卖中预订房产的日期。");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"条款和条件");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"条款和条件");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"详细条款和条件。");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"拍卖标题");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"描述");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"本次拍卖的价值");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"请输入您提供的包裹的价值。它不会显示给买家。");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"保留");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"未满足保留");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"立即购买");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"这次拍卖应该持续多少天？");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"拍卖行预订(不取消)拍卖：");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"请注意，当您出价时，您的发票将包含附加税");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"如果您单击\"立即出价\"或\"立即购买\"按钮，您将签订具有法律约束力的合同以从卖家处购买商品或包裹。本网站不对卖家列出的内容负责。") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"错误，您必须包含标题。");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"错误，您必须包含描述。");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"活跃拍卖");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"已完成拍卖");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"最高出价");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"没有出价");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"剩余时间");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"出价");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"您的出价已出价！");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"您赢得了这次拍卖！");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"你的出价已经超过了！");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"恭喜你赢得了这次拍卖！");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"对不起，你输掉了这次拍卖。");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"拍卖结束");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"抱歉，您未登录，无法参与此次拍卖。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"抱歉，您无法参与此次拍卖，因为它已结束。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"抱歉，您无法参与此次拍卖，我们无法找到该拍卖编号。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"抱歉，您的出价太低了。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"您不能在自己的拍卖中出价。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"由于您尚未输入详细信息，您还不能参与此次拍卖。请先点击上方的\"编辑帐户\"链接填写您的帐户详细信息。");
    
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"抱歉，您尚未登录，无法取消此次拍卖。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"抱歉，您无法取消此次拍卖，因为它已经被出价。只有没有出价的拍卖才能被取消。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"对不起，您不能取消本次拍卖，因为它已经结束。");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"抱歉，您无法取消此次拍卖，因为您无权参加此次拍卖。");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"你的关注列表");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"列表中的数字");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"观察名单");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"加入关注列表");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"添加关注列表");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"输入新的列表名称");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"保存新的关注列表");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"拍卖添加到列表");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"您还没有任何关注列表。您可以将拍卖添加到您的关注列表以创建您的第一个列表，或者使用菜单中的添加关注列表选项手动添加一个列表。");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"错误，该监视列表不存在。");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"该物业正在参与我们的拍卖计划并提供一个或多个拍卖套餐，请参阅下面的列表。");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"关于\"的信息");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"拍卖佣金");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"拍卖：");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"您已经出价竞拍：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"您已经出价竞拍。您可以访问以下链接查看拍卖情况：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"您的出价被高出！拍卖：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"您在一次拍卖中的出价高于您。您可以访问以下链接查看拍卖情况：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"您赢得了拍卖！拍卖：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"您赢得了一次拍卖。您可以访问以下链接查看拍卖情况：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"请确保您及时向卖家付款。您的发票在这里：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"拍卖已结束。拍卖：");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"本次拍卖已结束。您可以在这里看到拍卖：");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"拍卖完成。获奖者详情如下：");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "显示拍卖行页面。" );
    
