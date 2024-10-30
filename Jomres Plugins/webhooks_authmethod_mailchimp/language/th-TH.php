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


jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP', 'Mailchimp' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_NOTES', 'วิธีการผสานรวมนี้จะอัปเดตรายการ Mailchimp เมื่อคุณเพิ่มผู้เยี่ยมชมเข้าสู่ระบบ<br/>
คุณไม่จำเป็นต้องตั้งค่าอินพุต URL สำหรับเว็บฮุคนี้ เราจะหาให้โดยอิงจาก API ของคุณ<br/>
ในการกำหนดค่าเว็บฮุคนี้ คุณจะต้องมีข้อมูลสองรายการ ได้แก่ คีย์ API และ ID รายการ <br/>
หากต้องการค้นหาคีย์ API ของคุณ ให้ไปที่บัญชี Mailchimp และ :<br/>
<ol>
  <li>คลิกชื่อโปรไฟล์ของคุณเพื่อขยายแผงบัญชี และเลือกบัญชี</li>
  <li>คลิกเมนูแบบเลื่อนลงพิเศษและเลือกคีย์ API</li>
  <li>คัดลอกคีย์ API ที่มีอยู่หรือคลิกปุ่มสร้างคีย์</li>
  <li>ตั้งชื่อคีย์ของคุณอย่างละเอียด เพื่อให้คุณรู้ว่าแอปพลิเคชันใดใช้คีย์นั้น</li>
</ol>
ถัดไป คุณจะต้องใช้ List Id ซึ่งคุณสามารถค้นหาได้โดยไปที่รายการของคุณใน Mailchimp คลิกลิงก์เมนูรายการและที่ท้ายแถวให้คลิกขวาที่รายการดรอปดาวน์ จากนั้นเลือกการตั้งค่า เลื่อนลงไปด้านล่างสุดของหน้านั้น มันจะขึ้นว่า "List id for blahblah list" นี่คือรหัสของรายการที่คุณต้องใช้
    ' );

jr_define ( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_APIKEY', 'รหัส API' );
jr_define( 'WEBHOOKS_AUTH_METHOD_MAILCHIMP_LISTID', 'รหัสรายการ' );