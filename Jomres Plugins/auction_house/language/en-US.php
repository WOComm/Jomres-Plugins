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


jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"Auction house");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"Buying");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"Selling");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"Auctions home");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"Items I have bid on");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"List auctions");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"Property dashboard");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"List your auctions");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"New auction");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"Edit auction");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"Cancel auction");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"End auction early");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"Please choose the property you want to associate this auction with.");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"Are you including rooms/the property in this auction?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"Please select the rooms you want to include in this auction. First choose the dates for the booking, then you can select the rooms. ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"Please choose the dates you want to book the property out as part of the auction.");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"Terms and conditions");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"Terms and conditions");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"Detailed terms and conditions.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"Auction Title");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"Description");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"Value of this auction");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"Please enter the value of the package that you are offering. It will not be shown to buyers.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"Reserve");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"Reserve not met");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"Buy now");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"How many days should this auction run for?");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"Auction house booking (do not cancel) for auction : ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"Note that when you bid your invoice will include additional tax of ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"If you click the Bid or Buy Now button, you're entering into a legally binding contract to purchase the item or package from the seller. This site is not responsible for content listed by the seller.");


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"Error, you must include a title.");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"Error, you must include a description.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"Active auctions");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"Finished auctions");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"Highest bid");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"No bids");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"Time left");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"Place your bid");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"Your bid has been placed!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"You are winning this auction!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"You have been outbid!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"Congratulations, you won this auction!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"Sorry, you lost this auction.");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"Auction has finished");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"Sorry, you cannot bid on this auction because you are not logged in.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"Sorry, you cannot bid on this auction because it has ended.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"Sorry, you cannot bid on this auction, we can't find that auction id.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"Sorry, your bid was too low.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"You cannot bid on your own auction.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"You cannot bid on this auction yet because you haven't entered your details. Please click the link above 'Edit Account' to fill your account details first.");


jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"Sorry, you cannot cancel this auction because you are not logged in.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"Sorry, you cannot cancel this auction because it has already been bid upon. Only auctions which have no bids can be cancelled.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"Sorry, you cannot cancel this auction as it has already ended.");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"Sorry, you cannot cancel this auction as you do not have access rights to this auction.");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"Your watchlists");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"Number in list");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"Watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"Add to watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"Add watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"Enter the new list name");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"Save new watchlist");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"Auction added to list");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"You don't have any watch lists yet. You can either add an auction to your watchlist to create your first list, or use the Add Watchlist option in the menu to manually add a list.");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"Error, that watch list does not exist.");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"This property is participating in our auction program and offers one or more packages for auction, please see the list below.");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"Information about ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"Auction commission");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"Auction : ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"You have placed a bid for auction : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"You have placed a bid for an auction. You can see the auction by visiting the following link : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"You have been outbid! Auction : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"You have been outbid on an auction. You can see the auction by visiting the following link : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"You have won an auction! Auction : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"You have won an auction. You can see the auction by visiting the following link : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"Please ensure that you pay the seller promptly. Your invoice is here : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"Auction has ended. Auction : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"This auction has ended. You can see the auction here : ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"Auction completed. Winner's details follow : ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "Displays the Auction House page." );

