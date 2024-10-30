<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.24.0
 * @package Jomres
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define('_JOMRES_AUCTIONHOUSE_TITLE',"โรงประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTIONTITLE',"กำลังซื้อ");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTIONTITLE',"กำลังขาย");

jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_AUCTIONSHOME',"บ้านการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_BUYER_MENUOPTION_MYBIDS',"รายการที่ฉันเสนอราคา");

jr_define('_JOMRES_AUCTIONHOUSE_EVERYBODY_MENUOPTION_DASHBOARD',"รายการประมูล");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_DASHBOARD',"แดชบอร์ดคุณสมบัติ");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_LISTAUCTIONS',"แสดงรายการการประมูลของคุณ");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CREATE_NEW_AUCTION',"การประมูลใหม่");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_EDIT_AUCTION',"แก้ไขการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',"ยกเลิกการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',"สิ้นสุดการประมูลก่อนกำหนด");

jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_CHOOSEPROPERTY',"โปรดเลือกทรัพย์สินที่คุณต้องการเชื่อมโยงการประมูลนี้ด้วย");
jr_define('_JOMRES_AUCTIONHOUSE_SELLER_CREATE_INCLUDINGROOMS',"คุณรวมห้อง/ทรัพย์สินไว้ในการประมูลครั้งนี้หรือไม่");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_MRP',"โปรดเลือกห้องที่คุณต้องการรวมในการประมูลครั้งนี้ ก่อนอื่นให้เลือกวันที่สำหรับการจอง จากนั้นคุณสามารถเลือกห้องได้ ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_CREATE_SELECTROOMS_SRP',"โปรดเลือกวันที่ที่คุณต้องการจองอสังหาริมทรัพย์เพื่อเป็นส่วนหนึ่งของการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_LINK',"ข้อกำหนดในการให้บริการ");
jr_define('_JOMRES_AUCTIONHOUSE_TERMS_TEXT',"ข้อกำหนดและเงื่อนไข");

jr_define('_JOMRES_AUCTIONHOUSE_TERMS_DETAILED',"ข้อกำหนดและเงื่อนไขโดยละเอียด");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',"ชื่อการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION',"คำอธิบาย");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE',"มูลค่าการประมูลครั้งนี้");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_VALUE_INFO',"โปรดป้อนมูลค่าของแพ็คเกจที่คุณเสนอ ซึ่งจะไม่แสดงให้ผู้ซื้อเห็น");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE',"สำรอง");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',"ไม่ตรงตามที่สำรอง");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',"ซื้อเลย");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DAYSTORUN',"การประมูลนี้ควรดำเนินการกี่วัน");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',"การประมูลบ้าน (ห้ามยกเลิก) สำหรับการประมูล : ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',"โปรดทราบว่าเมื่อคุณเสนอราคาในใบแจ้งหนี้ของคุณจะรวมภาษีเพิ่มเติมจำนวน ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',"หากคุณคลิกปุ่ม Bid หรือ Buy Now แสดงว่าคุณกำลังทำสัญญาที่มีผลผูกพันทางกฎหมายเพื่อซื้อสินค้าหรือแพ็คเกจจากผู้ขาย ไซต์นี้ไม่รับผิดชอบต่อเนื้อหาที่แสดงโดยผู้ขาย") ;


jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE_ERROR',"ข้อผิดพลาด คุณต้องใส่ชื่อ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_DESCRIPTION_ERROR',"ข้อผิดพลาด คุณต้องใส่คำอธิบาย");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ACTIVE_AUCTIONS',"การประมูลที่ใช้งานอยู่");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_FINISHED_AUCTIONS',"เสร็จสิ้นการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',"ราคาเสนอสูงสุด");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',"ไม่มีการเสนอราคา");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',"เวลาที่เหลือ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID',"เสนอราคาของคุณ");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_PLACED',"การเสนอราคาของคุณถูกวางแล้ว!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',"คุณชนะการประมูลครั้งนี้!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',"คุณได้รับการเสนอราคาสูงกว่า!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',"ยินดีด้วย คุณชนะการประมูลครั้งนี้!");
jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',"ขออภัย คุณแพ้การประมูลครั้งนี้");

jr_define('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',"การประมูลเสร็จสิ้น");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',"ขออภัย คุณไม่สามารถเสนอราคาในการประมูลนี้ได้เนื่องจากคุณไม่ได้เข้าสู่ระบบ");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',"ขออภัย คุณไม่สามารถเสนอราคาในการประมูลนี้ได้เนื่องจากการประมูลสิ้นสุดลงแล้ว");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',"ขออภัย คุณไม่สามารถเสนอราคาในการประมูลนี้ได้ เราไม่พบรหัสการประมูลนั้น");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',"ขออภัย การเสนอราคาของคุณต่ำเกินไป");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',"คุณไม่สามารถเสนอราคาในการประมูลของคุณเองได้");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',"คุณยังไม่สามารถเสนอราคาในการประมูลนี้ได้ เนื่องจากคุณยังไม่ได้ป้อนรายละเอียดของคุณ โปรดคลิกลิงก์ด้านบน 'แก้ไขบัญชี' เพื่อกรอกรายละเอียดบัญชีของคุณก่อน");

jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTLOGGEDIN',"ขออภัย คุณไม่สามารถยกเลิกการประมูลนี้ได้เนื่องจากคุณไม่ได้เข้าสู่ระบบ");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',"ขออภัย คุณไม่สามารถยกเลิกการประมูลนี้ได้เนื่องจากได้รับการเสนอราคาแล้ว เฉพาะการประมูลที่ไม่มีการเสนอราคาเท่านั้นที่สามารถยกเลิกได้");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',"ขออภัย คุณไม่สามารถยกเลิกการประมูลนี้ได้เนื่องจากการประมูลได้สิ้นสุดลงแล้ว");
jr_define('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',"ขออภัย คุณไม่สามารถยกเลิกการประมูลนี้ได้ เนื่องจากคุณไม่มีสิทธิ์เข้าถึงการประมูลนี้");

jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',"d");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',"h");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',"m");
jr_define('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',"s");

jr_define('_JOMRES_AUCTIONHOUSE_LISTS',"รายการเฝ้าดูของคุณ");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_COUNT',"หมายเลขในรายการ");
jr_define('_JOMRES_AUCTIONHOUSE_DEFAULTLIST',"รายการเฝ้าดู");
jr_define('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',"เพิ่มในรายการเฝ้าดู");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADD',"เพิ่มรายการเฝ้าดู");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NEWLIST_NAME',"ป้อนชื่อรายการใหม่");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_SAVENEWLIST',"บันทึกรายการเฝ้าดูใหม่");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_ADDED_TO_LIST',"เพิ่มการประมูลในรายการแล้ว");
jr_define('_JOMRES_AUCTIONHOUSE_LISTS_NO_LISTS',"คุณยังไม่มีรายการเฝ้าดู คุณสามารถเพิ่มการประมูลลงในรายการที่อยากดูเพื่อสร้างรายการแรกของคุณ หรือใช้ตัวเลือกเพิ่มรายการเฝ้าดูในเมนูเพื่อเพิ่มรายการด้วยตนเอง");
jr_define('_JOMRES_AUCTIONHOUSE_LIST_DOESNOTEXIST',"ข้อผิดพลาด รายการเฝ้าดูนั้นไม่มีอยู่จริง");

jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_AUCTIONINFO',"สถานที่ให้บริการนี้เข้าร่วมในโปรแกรมการประมูลของเราและเสนอแพ็คเกจสำหรับการประมูลอย่างน้อยหนึ่งรายการ โปรดดูรายการด้านล่าง");
jr_define('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',"ข้อมูลเกี่ยวกับ ");

jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',"ค่าคอมมิชชั่นการประมูล");
jr_define('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',"การประมูล : ");

jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',"คุณได้เสนอราคาสำหรับการประมูล : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',"คุณได้เสนอราคาสำหรับการประมูล คุณสามารถดูการประมูลได้โดยไปที่ลิงก์ต่อไปนี้ : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',"คุณได้รับการเสนอราคาสูงกว่า! การประมูล : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',"คุณได้รับการเสนอราคาสูงกว่าในการประมูล คุณสามารถดูการประมูลได้โดยไปที่ลิงก์ต่อไปนี้ : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',"คุณชนะการประมูล! Auction : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',"คุณชนะการประมูล คุณสามารถดูการประมูลได้โดยไปที่ลิงก์ต่อไปนี้ : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',"โปรดตรวจสอบให้แน่ใจว่าคุณชำระเงินให้กับผู้ขายโดยทันที ใบแจ้งหนี้ของคุณอยู่ที่นี่ : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',"การประมูลสิ้นสุดลง การประมูล : ");
jr_define('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',"การประมูลนี้สิ้นสุดแล้ว คุณสามารถดูการประมูลได้ที่นี่ : ");

jr_define('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',"ปิดประมูลเรียบร้อยแล้ว รายละเอียดผู้ชนะตาม : ");

jr_define( '_JOMRES_SHORTCODES_06000AUCTION_HOUSE', "แสดงหน้าร้านค้าประมูล" );

