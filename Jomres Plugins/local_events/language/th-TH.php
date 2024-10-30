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

jr_define('_JRPORTAL_LOCAL_EVENTS_TITLE',"เกิดอะไรขึ้น");
jr_define('_JRPORTAL_LOCAL_EVENTS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENT_TITLE',"ชื่อกิจกรรม");
jr_define('_JRPORTAL_LOCAL_EVENTS_STARTDATE',"วันที่เริ่มต้น");
jr_define('_JRPORTAL_LOCAL_EVENTS_ENDDATE',"วันที่สิ้นสุด");
jr_define('_JRPORTAL_LOCAL_EVENTS_LATITUDE',"ละติจูด");
jr_define('_JRPORTAL_LOCAL_EVENTS_LONGITUDE',"ลองจิจูด");
jr_define('_JRPORTAL_LOCAL_EVENTS_WEBSITEURL',"URL ของไซต์");
jr_define('_JRPORTAL_LOCAL_EVENTS_EVENTLOGORELPATH',"เส้นทางที่เกี่ยวข้องไปยังโลโก้ของกิจกรรม หากมี เช่น www.event.com/logo.png (ไม่มี https://) ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_TITLE',"สิ่งที่ต้องทำในเครื่อง");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_NOTES'," ");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTION_TITLE',"ชื่อสถานที่ท่องเที่ยว");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ICON',"ไอคอน");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LATITUDE',"ละติจูด");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_LONGITUDE',"ลองจิจูด");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_WEBSITEURL',"URL ของไซต์");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_ATTRACTIONLOGORELPATH',"เส้นทางที่เกี่ยวข้องไปยังโลโก้ของสถานที่ท่องเที่ยว ถ้ามี เช่น www.attraction.com/logo.png (ไม่มี https://) ");
jr_define('_JRPORTAL_LOCAL_EVENTS_EDIT',"แก้ไขเหตุการณ์ในเครื่อง");
jr_define('_JRPORTAL_LOCAL_ATTRACTIONS_EDIT',"แก้ไขสถานที่ท่องเที่ยวในท้องถิ่น");

jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_TITLE',"กิจกรรมท้องถิ่นและสถานที่ท่องเที่ยว");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS',"ขีดจำกัดรัศมี (เป็นกิโลเมตร)");
jr_define('_JRPORTAL_LOCAL_EVENTS_SETTINGS_RADIUS_DESC',"เหตุการณ์และสถานที่ท่องเที่ยวในท้องถิ่นจะแสดงอยู่ใต้รายละเอียดของที่พัก กำหนดรัศมีที่นี่เพื่อจำกัดกิจกรรมที่แสดงต่อผู้ที่อยู่ในช่วงที่กำหนด");