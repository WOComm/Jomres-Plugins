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

jr_define('STRIPE_TITLE',"ลาย");
jr_define('STRIPE_CONNECT_CONFIG_INFO',"เกตเวย์ Stripe นี้ได้รับการออกแบบมาโดยเฉพาะเพื่อให้คุณในฐานะผู้จัดการสถานที่ได้รับเงินส่วนหนึ่งที่จ่ายให้กับผู้จัดการทรัพย์สิน ณ เวลาจอง ก่อนจึงจะสามารถใช้งานได้ คุณต้องตั้งค่าการรวมของคุณเองกับ Stripe ก่อน เชื่อมต่อ <a href='http://www.jomres.net/manual/site-managers-guide/23-control-panel/payment-methods/340-core-gateway-stripe' target='_blank' class= 'btn btn-primary'>เอกสารสำหรับปลั๊กอินนี้สามารถพบได้ที่นี่</a><br/>หากคุณคลิกบันทึกในหน้านี้ เพื่อให้ปลั๊กอินนี้ทำงานได้อย่างราบรื่น เกตเวย์อื่นๆ ทั้งหมดจะถูกปิดใช้งาน<br/> แข็งแกร่ง> ก่อนเริ่มต้น ตรวจสอบให้แน่ใจว่าคุณได้ไปที่หน้า Stripe Connect ของคุณและระบุว่าคุณกำลังตั้งค่าแพลตฟอร์ม เมื่อเสร็จแล้วให้ทำตามคำแนะนำบนหน้าจอเพื่อตั้งค่าบัญชีของคุณ ก่อนที่ผู้จัดการจะเชื่อมต่อบัญชีของพวกเขากับคุณ ต้องไปที่การตั้งค่า > เชื่อมต่อการตั้งค่า และในพื้นที่ \"การตั้งค่า OAuth\" ที่เปิดใช้งาน OAuth สำหรับบัญชีมาตรฐาน จากนั้นคลิกบันทึก (โปรดทราบว่าคุณจะต้องทำเช่นนี้ทั้งในโหมดทดสอบและโหมดสด) " );

jr_define('STRIPE_REGISTER_CONNECT',"ติดต่อเรา!");
jr_define('STRIPE_REGISTER_CONNECT_BLURB',"คุณลงทะเบียนแล้ว แต่การเชื่อมต่อยังไม่สมบูรณ์ คุณต้องเชื่อมต่อบัญชี Stripe ของคุณกับเว็บไซต์ของเรา เมื่อเสร็จแล้ว คุณสามารถเพิ่มคุณสมบัติทั้งหมดของคุณไปยังไซต์ของเราและเริ่มทำการจองได้ .");

jr_define('STRIPE_REGISTER_WELCOME_EMAIL_TITLE',"ยินดีต้อนรับสู่ ");
jr_define('STRIPE_REGISTER_WELCOME_EMAIL_BLURB',"ก่อนที่คุณจะสามารถเริ่มตั้งค่าทรัพย์สินของคุณ คุณต้องเชื่อมต่อเรากับบัญชี Stripe ของคุณ คลิกที่ลิงก์เพื่อเริ่มต้น");

jr_define('STRIPE_SETUP_INFO',"ตอนนี้เราจำเป็นต้องเชื่อมต่อบัญชีของคุณกับบัญชีของเรา ซึ่งจะทำให้เราสามารถชำระเงินในนามของคุณได้ ดังนั้นให้คลิกปุ่มเชื่อมต่อเพื่อไปยัง Stripe ซึ่งคุณสามารถยืนยันการเชื่อมต่อได้");
jr_define('STRIPE_SETUP_DONE',"คุณได้เชื่อมต่อกับเราแล้ว ไม่มีอะไรต้องทำอีกแล้ว! ปิดหน้าต่างนี้แล้วมาเริ่มทำธุรกิจกันเถอะ");
jr_define('STRIPE_SETUP_THANKS',"ขอบคุณที่เชื่อมต่อกับเรา! คุณสามารถปิดหน้าต่างนี้ได้เลย");
jr_define('STRIPE_SETUP_DISCONNECT',"ยกเลิกการเชื่อมต่อบัญชีของคุณ");
jr_define('STRIPE_SETUP_DISCONNECTED',"บัญชีถูกยกเลิก คุณสามารถปิดหน้าต่างนี้ได้");

jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID',"Stripe Connect Client ID");
jr_define('STRIPE_CONNECT_SITE_CONFIG_CLIENT_ID_DESC',"คุณสามารถรับ Stripe Client ID ได้จาก <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>แดชบอร์ด > การตั้งค่า > เชื่อมต่อ API คีย์อยู่ภายใต้ตัวเลือกเมนูนักพัฒนา</a>");
jr_define('STRIPE_CONNECT_SITE_CONFIG_RETURN_URL',"โปรดตรวจสอบให้แน่ใจว่าคุณตั้งค่า Redirect URI ใน <a href='https://dashboard.stripe.com/account/applications/settings' target='_blank'>เชื่อมต่อ > การตั้งค่า</a> ถึง <br/> ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_SECRET_KEY',"รหัสลับ");
jr_define('STRIPE_CONNECT_SITE_CONFIG_PUBLIC_KEY',"กุญแจสาธารณะ");

jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION',"ค่าคอมมิชชั่นของคุณ");
jr_define('STRIPE_CONNECT_SITE_CONFIG_COMMISSION_DESC',"ค่าคอมมิชชั่นนี้นำมาจากการชำระเงินที่ส่งไปยังผู้จัดการทรัพย์สิน ณ เวลาที่ทำการจอง จากนั้น Stripe จะวางลงในบัญชี Stripe ของคุณโดย Stripe <br/> นี่คือเปอร์เซ็นต์ของค่าคอมมิชชั่นที่คุณจะเรียกเก็บจากผู้จัดการทรัพย์สิน การจอง ค่าคอมมิชชั่นของคุณจะถูกเรียกเก็บตามค่าใช้จ่ายทั้งหมดของการจอง ไม่ใช่มูลค่าเงินฝาก <br/> ไม่ว่าคุณจะตั้งค่านี้เป็นอะไร เราขอแนะนำให้คุณกำหนดค่าไซต์การกำหนดค่า ->แบบฟอร์มการจอง -> จำนวนเงินฝากขั้นต่ำเป็น อย่างน้อยสองเท่าของตัวเลขนี้ ดังนั้นหากคุณต้องการคิดค่าคอมมิชชั่น 10% คุณควรทำการฝากขั้นต่ำเป็น 20%");

jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_EURO',"ค่าธรรมเนียมแถบยุโรป");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_DESC',"นี่คือเปอร์เซ็นต์ที่ Stripe เรียกเก็บเงินจากคุณสำหรับการชำระเงินในไซต์ของคุณ ขณะนี้พวกเขาเรียกเก็บเงิน 1.4% สำหรับบัตรยุโรป และ 2.9% สำหรับบัตรที่ไม่ใช่ของยุโรป ตัวเลขนี้จำเป็นสำหรับการกำหนดราคาเมื่อทำการจองและ เวลาชำระเงิน");
jr_define('STRIPE_CONNECT_SITE_CONFIG_STRIPE_COMMISSION_NONEURO',"ค่าธรรมเนียมแถบที่ไม่ใช่ยูโร");

jr_define('STRIPE_PAYMENT_FORM_CREDITCARD',"หมายเลขบัตร");
jr_define('STRIPE_PAYMENT_FORM_EXPIRATION',"หมดอายุ (MM/YY)");
jr_define('STRIPE_PAYMENT_FORM_CVC',"CVC");
jr_define('STRIPE_PAYMENT_FORM_ZIP',"รหัสไปรษณีย์ของการเรียกเก็บเงิน");

jr_define('STRIPE_PAYMENT_FORM_SECURE',"แบบฟอร์มการชำระเงินที่ปลอดภัย");
jr_define('STRIPE_PAYMENT_FORM_BILLINGDETAILS',"รายละเอียดการเรียกเก็บเงิน");
jr_define('STRIPE_PAYMENT_FORM_CARDDETAILS',"รายละเอียดบัตร");
jr_define('STRIPE_PAYMENT_FORM_HOLDER',"ชื่อผู้ถือบัตร");
jr_define('STRIPE_PAYMENT_FORM_PAYNOW',"ชำระเงินเลย");
jr_define('STRIPE_PAYMENT_FORM_TOPAY',"ชำระเงินทันที");

jr_define('STRIPE_PAYMENT_FORM_VALIDATION_STREET_EMPTY','จำเป็นต้องระบุถนนและไม่สามารถเว้นว่างได้');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_LENGTH','ถนนต้องมีความยาวมากกว่า 6 และน้อยกว่า 96 อักขระ');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CITY_EMPTY','ต้องระบุเมืองและไม่สามารถเว้นว่างได้');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_EMPTY','จำเป็นต้องระบุรหัสไปรษณีย์และไม่สามารถเว้นว่างได้');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_ZIP_LENGTH','รหัสไปรษณีย์ต้องมีความยาวมากกว่า 3 และน้อยกว่า 12 อักขระ');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_EMPTY','จำเป็นต้องระบุที่อยู่อีเมลและไม่สามารถเว้นว่างได้');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_INVALID','ข้อมูลที่ป้อนไม่ใช่ที่อยู่อีเมลที่ถูกต้อง');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EMAIL_LENGTH','อีเมลต้องมีความยาวมากกว่า 6 และน้อยกว่า 65 อักขระ');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_EMPTY','จำเป็นต้องระบุชื่อผู้ถือบัตรและไม่สามารถเว้นว่างได้');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDHOLDER_LENGTH','ชื่อผู้ถือบัตรต้องมีความยาวมากกว่า 6 และน้อยกว่า 70 อักขระ');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_EMPTY','จำเป็นต้องระบุหมายเลขบัตรเครดิตและไม่สามารถเว้นว่างได้');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CARDNUMBER_INVALID','หมายเลขบัตรเครดิตไม่ถูกต้อง');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_EMPTY','ต้องระบุเดือนที่หมดอายุ');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_MONTH_DIGITS','เดือนที่หมดอายุสามารถมีตัวเลขได้เท่านั้น');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_EMPTY','ต้องระบุปีที่หมดอายุ');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_EXPIRATION_YEAR_DIGITS','ปีที่หมดอายุต้องเป็นตัวเลขเท่านั้น');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_EMPTY','ต้องระบุ cvv และต้องไม่ว่างเปล่า');
jr_define('STRIPE_PAYMENT_FORM_VALIDATION_CCV_INVALID','ค่านี้ไม่ใช่ CVV ที่ถูกต้อง');

jr_define('STRIPE_PAYMENT_FAILED',"ขออภัย เราไม่สามารถประมวลผลการชำระเงินของคุณได้ในขณะนี้");
jr_define('STRIPE_PAYMENT_TRY_AGAIN',"โปรดลองอีกครั้ง");

jr_define('STRIPE_PAYMENT_ERROR_DECLINED',"การชำระเงินถูกปฏิเสธ");
jr_define('STRIPE_PAYMENT_ERROR_RATE_LIMIT', "ส่งคำขอไปยัง API เร็วเกินไป");
jr_define('STRIPE_PAYMENT_ERROR_INVALID_PARAMETERS',"พารามิเตอร์ที่ไม่ถูกต้องถูกส่งไปยัง API ของ Stripe");
jr_define('STRIPE_PAYMENT_ERROR_AUTH_FAILED',"การตรวจสอบสิทธิ์ด้วย API ของ Stripe ล้มเหลว");
jr_define('STRIPE_PAYMENT_ERROR_NETWORK_FAULT',"การสื่อสารผ่านเครือข่ายกับ Stripe ล้มเหลว (การเชื่อมต่ออินเทอร์เน็ตของคุณหลุดหรือไม่)");
jr_define('STRIPE_PAYMENT_ERROR_UNCAUGHT',"เกิดข้อผิดพลาดที่ไม่ถูกตรวจจับ");