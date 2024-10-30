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

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"การค้นหา Ajax แบบรวม");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"ค้นหาด้วยดาว");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"ค้นหาตามราคา");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"ค้นหาตามคุณลักษณะ");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"ค้นหาตามประเทศ");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"ค้นหาตามภูมิภาค");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"ค้นหาตามเมือง");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"ค้นหาตามประเภทห้อง");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"ค้นหาตามประเภทคุณสมบัติ");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"ค้นหาตามหมายเลขของแขก");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"ค้นหาตามวันที่");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"รูปแบบเทมเพลต");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Default : ช่องทำเครื่องหมายหรือปุ่มธรรมดาๆ ส่วนใหญ่ถ้าอยู่ใน Bootstrap Modals : ปุ่มเปิดเพื่อให้ผู้ใช้เลือกตัวกรองการค้นหา หีบเพลงออกแบบมาสำหรับด้านบนของหน้า พื้นที่เลื่อนลงเพื่อแสดงตัวกรอง Multiselect : ปุ่มแบบเลื่อนลงไปที่ เปิดเผยตัวกรอง");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"ปุ่ม (การวางแนวตั้ง)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modals (การวางแนวแนวตั้ง) Bootstrap เท่านั้น");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Accordion (การวางแนวนอน) Bootstrap เท่านั้น");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Multiselect (การวางแนวแนวนอน) Bootstrap เท่านั้น");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"แสดงตัวกรอง");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"ซ่อนตัวกรอง");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"ใช้เฟรมเวิร์กการค้นหา ajax ช่วยให้คุณวางโมดูลการค้นหาที่นำเสนอการค้นหาเกี่ยวกับห้องว่าง ช่วงราคา คุณลักษณะ ประเภทที่พัก ประเภทห้อง หมายเลขผู้เข้าพัก ดาว ประเทศ ภูมิภาค และเมืองในแถบด้านข้าง หรือแถบด้านบน โปรดทราบว่าตัวอย่างที่แสดงที่นี่จะไม่ทำงานเนื่องจากอาร์กิวเมนต์บางอันยกเลิกกัน เลือกสิ่งที่คุณต้องการจากอาร์กิวเมนต์ที่มีอยู่ (ยกเว้นอาร์กิวเมนต์ที่จำเป็น) รหัสสั้นนี้แตกต่างจากอาร์กิวเมนต์ส่วนใหญ่เล็กน้อย รหัสย่อเนื่องจากต้องมาพร้อมกับ div พิเศษหลังจากการประกาศรหัสย่อด้วย id ของ asamodule_search_results ซึ่งเป็นที่ที่ปลั๊กอินวางรายการคุณสมบัติที่ส่งคืน");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"จำเป็น อาร์กิวเมนต์ต้องเป็น ajax_search_composite");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"รูปแบบช่องค้นหา ตัวเลือกคือปุ่ม modals accordion multiselect หากไม่ได้ตั้งค่าไว้ ปลั๊กอินจะใช้ตัวเลือกที่กำหนดในการกำหนดค่าไซต์ Multiselect/Accordion เหมาะสำหรับการแสดงผลในแนวนอน อีกสองตัวเลือกที่ดีที่สุดสำหรับการจัดวางใน แถบด้านข้าง");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"แสดงแบบฟอร์มการค้นหาว่างานเพจถูกตั้งค่าเป็น viewproperty ( the property details page ) 0 สำหรับ No, 1 สำหรับ Yes.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS', "Prefiltering คือที่ที่คุณเลือกเฉพาะคุณสมบัติที่ตรงตามเงื่อนไขของตัวกรองล่วงหน้าเท่านั้นที่สามารถแสดงในผลการค้นหา Pre-filter ตามคุณสมบัติ uid ดังนั้นเฉพาะคุณสมบัติบางอย่างเท่านั้นที่สามารถแสดงในผลการค้นหา อาร์กิวเมนต์ รายการคุณสมบัติ uid คั่นด้วยเครื่องหมายจุลภาค");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"กรองข้อมูลล่วงหน้าตามประเภทคุณสมบัติ ดังนั้นจึงแสดงเฉพาะคุณสมบัติของประเภทนี้/ประเภทนี้ในผลการค้นหา อาร์กิวเมนต์เป็นรายการรหัสประเภทคุณสมบัติที่คั่นด้วยเครื่องหมายจุลภาค");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"กรองข้อมูลล่วงหน้าตามรหัสประเทศ จึงสามารถแสดงเฉพาะพร็อพเพอร์ตี้ในประเทศเหล่านี้ในผลการค้นหา อาร์กิวเมนต์เป็นรายการรหัสประเทศ ISO ที่คั่นด้วยเครื่องหมายจุลภาค");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"กรองข้อมูลล่วงหน้าตามชื่อภูมิภาค ดังนั้นเฉพาะคุณสมบัติในภูมิภาคเหล่านี้เท่านั้นที่สามารถแสดงในผลการค้นหา อาร์กิวเมนต์เป็นรายการชื่อภูมิภาคที่คั่นด้วยเครื่องหมายจุลภาค และต้องตรงกับภูมิภาคตามที่จัดเก็บไว้ในฐานข้อมูล หาก คุณตั้งค่าประเทศเป็น เช่น เยอรมนี (DE) พร็อพเพอร์ตี้จากประเทศอื่นที่มีชื่อภูมิภาคใกล้เคียงกันจะไม่แสดง");
    
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"เปิดใช้งาน/ปิดใช้งานอินพุต Stars ในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_stars ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ ");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"เปิดใช้งาน/ปิดใช้งานการป้อนข้อมูล Stars ในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_price ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"เปิดใช้งาน/ปิดใช้งานอินพุตคุณสมบัติคุณสมบัติในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_features ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"เปิดใช้งาน/ปิดใช้งานการป้อนข้อมูลประเทศในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_country ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"เปิดใช้งาน/ปิดใช้งานการป้อนข้อมูลภูมิภาคในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_region ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"เปิดใช้งาน/ปิดใช้งานอินพุต Town ในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_town ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ ");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"เปิดใช้งาน/ปิดใช้งานอินพุตประเภทห้องในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_roomtype ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"เปิดใช้งาน/ปิดใช้งานอินพุตประเภทคุณสมบัติในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_propertytype ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"เปิดใช้งาน/ปิดใช้งานการป้อนหมายเลขแขกในแบบฟอร์ม โปรดทราบว่าหากคุณตั้งค่าตัวเลือกผ่านแท็บการตั้งค่าคอมโพสิตการค้นหา Ajax ในการกำหนดค่าไซต์เป็น No ดังนั้นการตั้งค่า asc_by_guestnumber ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ .");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Enable/Disable the Date input in the form. โปรดทราบว่าหากคุณได้ตั้งค่าตัวเลือกผ่านทางแท็บการตั้งค่า Ajax การค้นหาคอมโพสิตใน Site Configuration เป็น No ดังนั้นการตั้งค่า asc_by_date ในรายการอาร์กิวเมนต์จะไม่มีผลใดๆ ");