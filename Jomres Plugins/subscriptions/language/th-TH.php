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

jr_define('_SUBSCRIPTIONS_ACTIVE',"ใช้งานอยู่");
jr_define('_SUBSCRIPTIONS_EXPIRED',"ไม่ทำงาน");
jr_define('_SUBSCRIPTIONS_HPAYMENT_STATUS',"สถานะการชำระเงิน");
jr_define('_SUBSCRIPTIONS_HSUBSCRIPTION_LEVEL',"ระดับ");
jr_define('_SUBSCRIPTIONS_EDIT_TITLE',"แก้ไขการสมัครรับข้อมูล");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_TITLE',"ส่งอีเมลแจ้งเตือนการหมดอายุของการสมัครรับข้อมูลหรือไม่");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_A',"ส่งอีเมลแจ้งเตือน");
jr_define('_SUBSCRIPTIONS_SEND_REMINDER_EMAIL_DAYS_B',"วันก่อนการสมัครจะหมดอายุ");
jr_define('_SUBSCRIPTIONS_SEND_EXPIRATION_EMAIL_TITLE',"ส่งอีเมลเมื่อการสมัครหมดอายุ?");
jr_define('_SUBSCRIPTIONS_MY',"การสมัครของฉัน");
jr_define('_SUBSCRIPTIONS_HRENEW',"ต่ออายุ");
jr_define('_SUBSCRIPTIONS_HRENEWAL',"การต่ออายุการสมัคร");
jr_define('_SUBSCRIPTIONS_HALREADY_SUBSCRIBED',"คุณได้สมัครรับข้อมูลแล้ว โปรดซื้อการต่ออายุแทน");
jr_define('_SUBSCRIPTIONS_HEDIT',"แก้ไขแพ็คเกจการสมัครสมาชิก");
jr_define('_SUBSCRIPTIONS_USERID_DESC',"พิมพ์อักษรสองสามตัวแรกของชื่อผู้ใช้และคุณจะเห็นรายการแบบเลื่อนลงพร้อมชื่อผู้ใช้ คลิกที่ชื่อผู้ใช้เพื่อเลือก");
jr_define('_SUBSCRIPTIONS_PACKAGE_NO_LOGER_PUBLISHED',"แพ็คเกจการสมัครรับข้อมูลนี้ไม่มีให้บริการอีกต่อไป ดังนั้นจึงไม่สามารถต่ออายุได้ โปรดพิจารณาอัปเกรด");
jr_define('_SUBSCRIPTIONS_NOT_SUBSCRIBED_TO_PACKAGE_ID',"คุณไม่ได้สมัครแพ็กเกจนี้ คุณจึงไม่สามารถต่ออายุได้");
jr_define('_SUBSCRIPTIONS_NO_RENEWAL_OPTIONS_FOR_PACKAGE',"ไม่มีตัวเลือกการต่ออายุสำหรับแพ็คเกจนี้");
jr_define('_SUBSCRIPTIONS_CANCEL',"ยกเลิกการสมัครรับข้อมูล");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS',"ความถี่ (วัน)");
jr_define('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',"ระยะเวลาการสมัครเป็นวัน");
jr_define('_SUBSCRIPTIONS_HRENEWAL_NOTALLOWED',"ไม่อนุญาตให้ต่ออายุแพ็คเกจนี้");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE',"ราคาต่ออายุ");
jr_define('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',"ตั้งค่านี้เป็น 0 เพื่อปิดใช้งานการต่ออายุสำหรับแพ็คเกจนี้หรือป้อนราคาสำหรับการต่ออายุ");
jr_define('_SUBSCRIPTIONS_HPACKAGE_FEATURES',"ตัวเลือกแพ็คเกจ");
jr_define('_SUBSCRIPTIONS_HPACKAGE_DETAILS',"รายละเอียดแพ็คเกจ");
jr_define('_SUBSCRIPTIONS_HPACKAGE_YOUR',"แพ็คเกจการสมัครของคุณ");
jr_define('_SUBSCRIPTIONS_HACCESS_TO_FEATURE_NOTALLOWED',"แพ็คเกจการสมัครรับข้อมูลของคุณไม่ได้รวมการเข้าถึงคุณลักษณะนี้ หากต้องการใช้คุณลักษณะนี้ คุณจะต้องอัปเกรดการสมัครรับข้อมูลของคุณ");
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TEXT1', "การสมัครของคุณหมดอายุแล้ว และรายชื่อทั้งหมดของคุณไม่ได้รับการเผยแพร่ แขกผู้เข้าพักจะไม่เห็นรายชื่อของคุณอีกต่อไป และคุณจะไม่สามารถรับการจองออนไลน์จากเว็บไซต์ของเราได้อีก หากต้องการใช้บริการของเราต่อไป โปรดเผยแพร่ รายชื่อของคุณและเริ่มรับการจองออนไลน์ โปรดเข้าสู่ระบบบัญชีของคุณและซื้อการต่ออายุ" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE1',"การสมัครของคุณที่" );
jr_define( '_JRPORTAL_SUBSCRIPTION_EXPIRED_EMAIL_TITLE2',"หมดอายุแล้ว" );
jr_define( '_JRPORTAL_SUBSCRIPTION_REMINDER_EMAIL_TEXT1',"นี่คือการแจ้งเตือนเพื่อแจ้งให้คุณทราบว่าการสมัครของคุณจะหมดอายุในไม่ช้า หากต้องการใช้บริการของเราต่อไป โปรดลงชื่อเข้าใช้บัญชีของคุณและซื้อการต่ออายุ" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_TITLE',"แพ็คเกจการสมัครรับข้อมูล" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',"ชื่อ" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION', "คำอธิบาย" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',"เผยแพร่แล้ว" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FREQUENCY',"ความถี่" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',"ราคา" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT',"ขีดจำกัดธุรกิจ" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PROPERTYLIMIT_DESC',"จำนวนธุรกิจสูงสุดที่สามารถเพิ่มได้ด้วยแพ็คเกจการสมัครรับข้อมูลนี้" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_SUBSCRIBE',"สมัครสมาชิก" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_USE', "ใช้ฟังก์ชันการจัดการการสมัครรับข้อมูล" );
jr_define( '_JRPORTAL_SUBSCRIPTIONS_SUBSCRIBING_ERROR_NOPACKAGEID',"ขออภัย แต่ ID แพ็กเกจนั้นไม่เป็นที่รู้จัก" );
jr_define( '_JRPORTAL_INVOICES_SUBSCRIPTION_PROFILE_ERROR_EXPL',"ดูเหมือนคุณจะยังไม่ได้กรอกรายละเอียดบัญชีของคุณ หากต้องการลงรายการทรัพย์สินของคุณบนเว็บไซต์ เราต้องการให้คุณกรอกรายละเอียดบัญชีของคุณก่อนที่เราจะสามารถดำเนินการต่อไปได้" );
jr_define( '_JRPORTAL_SUBSCRIPTION_ALLSLOTSUSED',"คุณได้ใช้ช่องทรัพย์สินทั้งหมดที่มีอยู่ในแพ็คเกจการสมัครของคุณ ดังนั้นคุณจะไม่สามารถสร้างรายการใหม่ได้ โปรดอัปเกรดแพ็คเกจของคุณหากคุณต้องการสร้างรายการเพิ่มเติม" );
jr_define('_JOMRES_CHART_SUBSCRIPTIONS_DESC',"รายได้ต่อปี/เดือน");
jr_define('_SUBSCRIPTION_WARNING',"คุณได้เปิดใช้งานการสมัครสมาชิกแต่ดูเหมือนว่าคุณยังไม่ได้สร้างแพ็คเกจการสมัครรับข้อมูล เจ้าของจะไม่สามารถลงทะเบียนคุณสมบัติบนไซต์ของคุณได้จนกว่าจะสร้างแพ็คเกจการสมัครสมาชิกอย่างน้อยหนึ่งแพ็คเกจ");
jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_APIACCESS', "การเข้าถึง API" );

	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_1',"คุณสามารถเข้าถึงคุณลักษณะนี้ได้โดยอัปเกรดเป็น " );
	jr_define( '_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE_SUBSCRIPTION_2'," แพ็คเกจสมัครสมาชิก " );
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_UPGRADE', 'อัปเกรด');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_ALREADY_SUBSCRIBED', 'สมัครแล้ว');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_GATEWAY_SETTINGS', 'การตั้งค่าเกตเวย์การสมัคร');
	jr_define('_JRPORTAL_SUBSCRIPTIONS_NOT_SUBSCRIBED', 'คุณยังไม่ได้สมัครแพ็กเกจใด ๆ โปรดสมัครแพ็กเกจเพื่อใช้บริการของเราต่อไป');
