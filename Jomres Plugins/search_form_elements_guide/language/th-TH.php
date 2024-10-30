<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/
//#################################################################
	defined('_JOMRES_INITCHECK') or die('');
	//#################################################################

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_TITLE', "ค้นหาคู่มือองค์ประกอบของแบบฟอร์ม" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_INTRO', "ติดตั้งปลั๊กอิน Search Form Elements เพื่อเพิ่มฟอร์มการค้นหาในไซต์ของคุณโดยใช้รหัสย่อที่แสดงที่นี่ หน้านี้แสดงให้คุณเห็นว่ารหัสย่อใดที่คุณสามารถใช้ได้ เพื่อให้คุณสามารถสร้างแบบฟอร์มการค้นหาที่คุณต้องการสำหรับไซต์ของคุณได้ คุณสามารถคัดลอกรหัสเหล่านี้และวางลงในหน้า/บทความ/โมดูลของคุณได้โดยตรงและเริ่มทำงานในเค้าโครง ที่ด้านล่างของหน้า คุณจะเห็นตัวอย่างแบบฟอร์มการค้นหาจำนวนหนึ่ง คลิกปุ่มเพื่อเปิดโมดอล และใช้ ปุ่มคัดลอกเพื่อคัดลอกมาร์กอัปไปยังคลิปบอร์ดของคุณ จากนั้น คุณสามารถใช้มาร์กอัปนั้นในบทความ/โมดูลของคุณเพื่อสร้างแบบฟอร์มการค้นหา" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_AVAILABLE_SHORTCODES', "นี่คือรหัสย่อทั้งหมดที่คุณสามารถใช้ได้เมื่อสร้างแบบฟอร์มการค้นหา" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES', "ตัวอย่าง" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_EXAMPLES_INFO', "คุณสามารถใช้รหัสย่อใดก็ได้ในหน้านี้เพื่อแก้ไขตัวอย่างที่มีให้ หรือใช้ตัวอย่างตามที่เป็นอยู่ คัดลอกและวางรหัสย่อและ/หรือตัวอย่างลงในหน้า บทความ หรือโมดูลเพื่อดู แบบค้นหา" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_1', "คุณต้องใส่รหัสย่อ form_start, form_button และ form_end ในแบบฟอร์มการค้นหาเสมอ" );
	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_2', "เนื่องจากเป็นรหัสย่อที่ใช้แม่แบบ Jomres คุณจึงสามารถใช้คุณลักษณะแทนที่แม่แบบสำหรับรหัสย่อเพื่อแก้ไขผลลัพธ์ได้ ตัวอย่างเช่น คุณสามารถคัดลอก /jomres/core-plugins/search_form_elements/templates/bootstrap5/search_form_autocomplete .html ไปยังไดเร็กทอรีธีม/เทมเพลต /html/com_jomres ของคุณและนี่จะกลายเป็นการแทนที่ นอกจากนี้ หากคุณต้องการให้ฟอร์มหลายฟอร์มและอีกอันแตกต่างจากฟอร์มอื่นๆ คุณก็เปลี่ยนชื่อไฟล์เทมเพลตได้ (เช่น search_form_autocomplete.html) ใน /html/com_jomres เพื่อ search_form_autocomplete_new.html จากนั้นใช้รหัสย่อต่อไปนี้: {jomres search_form_autocomplete &amp;search_form_autocomplete.html=search_form_autocomplete_new.html}" );

	jr_define( '_JOMRES_SEARCH_FORM_ELEMENTS_NOTE_3', "หากคุณต้องการใช้รหัสย่อในไฟล์เทมเพลต Jomres เช่น ตัวเลื่อนฮีโร่ คุณจะต้องแทนที่ {jomres ด้วย {jomres_script และ Jomres จะแยกวิเคราะห์รหัสย่อเอง" );
