<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

// Because the server may be using a proxy for outgoing calls it's better to call the Jomres App server and ask it to respond with this server's IP address. Once we know that, then we are able to give the documentation the correct IP number to configure in Beds24's API Key N field(s)
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.ipify.org?format=json');
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cURLConnection, CURLOPT_CONNECTTIMEOUT, 1);
curl_setopt($cURLConnection, CURLOPT_TIMEOUT, 1);

$ip_number_response = curl_exec($cURLConnection);
curl_close($cURLConnection);

$jsonArrayResponse = json_decode($ip_number_response);

if (isset( $jsonArrayResponse->ip)) {
    $this_servers_ip_number = $jsonArrayResponse->ip;
} else {
    $this_servers_ip_number = 'Unknown, ask your server hosts support team';
}

jr_define ('BEDS24V2_CHANNEL_MANAGEMENT' , 'مدیریت کانال (Beds24)') ;

jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD' , 'Beds24') ;
jr_define ('BEDS24V2_WEBHOOKS_AUTH_METHOD_NOTES' , 'اگر حساب Beds24 دارید و می خواهید هنگام رزرو Beds24 را به روز کنید , لطفاً این گزینه را انتخاب کنید. نشانی اینترنتی را روی https://www.beds24.com/api/json/ تنظیم کنید');
jr_define ('BEDS24V2_ERROR_USER_NO_KEY' , 'این کاربر کلید API ندارد , بنابراین نمی تواند ادامه دهد. لطفاً از صفحه آنها در مدیریت مدیریت کاربر> صفحه مدیران دارایی دیدن کرده و با استفاده از پیوند ارائه شده در آن صفحه , یک کلید API جدید برای آنها ایجاد کنید.');
jr_define ('BEDS24V2_ERROR_USER_NO_PROPERTIES' , 'این کاربر هیچ ویژگی Jomres ندارد که بتواند آن را به خواص Beds24 اختصاص دهد یا برعکس') ;
jr_define ('BEDS24V2_NOT_SUBSCRIBED' , "مدیری که در آن وارد شده اید ظاهراً در Beds24 حساب کاربری ندارد , بنابراین ابتدا باید برای خدمات آنها ثبت نام کنید , سپس این کلید API را در <a href='https://www.beds24.com/control2.php?pagetype=accountpassword' target='_blank'> وب سایت Beds24 در اینجا. </a> ");
jr_define ('BEDS24V2_NOT_SUBSCRIBED_KEY' , "برای ادامه این کلید API را در قسمت LINK در حساب Beds24 خود کپی و جایگذاری کنید.") ;
jr_define ('BEDS24V2_NOT_SUBSCRIBED_RELOAD' , "وقتی این کار را انجام دادید , برای ادامه لطفاً روی دکمه زیر کلیک کنید.") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_TITLE' , "پیوند دادن ویژگی Beds24") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_INFO' , "این صفحه به شما امکان می دهد خواصی را که در این سیستم به آن دسترسی دارید مشاهده کنید , بعلاوه آنهایی که در مدیر کانال وجود دارد. همچنین به شما امکان می دهد تا املاک را از مدیر کانال به این سیستم وارد کرده یا صادر کنید خواص موجود به مدیر کانال. <br/> اگر هم در این سیستم و هم در Beds24 ویژگی هایی دارید و می خواهید آنها را به یکدیگر پیوند دهید , می توانید از ویژگی apikey برای انجام این کار استفاده کنید. به Beds24> Settings> Properties (اطمینان حاصل کنید که ویژگی انتخاب شده در کرکره همان چیزی است که می خواهید پیوند دهید) سپس در زیر منوی پیوند \"Property apikey\" را در قسمت \"propKey\" در Beds24 ذخیره کنید. هنگامی که این کار را انجام دادید , صفحه را بارگیری کنید. این سیستم مشاهده کنید که دو ویژگی با یک کلید مرتبط هستند و ارتباطات مورد نیاز را ایجاد می کنند. پس از پیوند دو ویژگی , به یاد داشته باشید که از صفحه View Property دیدن کرده , آدرس اعلان را پیدا کرده و آن را در قسمت پیوند \"Notify Url\" قرار دهید. آن اراده اطمینان حاصل کنید که Beds24 در هنگام دریافت رزرو از پیوند صحیح برای همگام سازی رزروها با آن ویژگی استفاده می کند. ");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_NO_PROPERTIES' , "خطا: هیچ ویژگی ای وجود ندارد که بتوانید در Beds24 به آن ها پیوند دهید. این ممکن است به این دلیل باشد که همه ویژگی هایی که از حق داشتن پیوند به حساب دیگری در این سیستم برخوردار هستید , وجود دارد.");
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_UID' , "شناسه ملک") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_PROPERTY_NAME' , "نام دارایی") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_UID' , "Beds24 Property Uid") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTIES_BEDS24_PROPERTY_NAME' , "نام دارایی Beds24") ;
jr_define ('BEDS24V2_DISPLAY_PROPERTY_APIKEY' , "apikey property") ;
jr_define ('BEDS24_LISTPROPERTIES_IMPORT' , "واردات") ;
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES' , "پیکربندی انواع اتاق") ;
jr_define ('BEDS24_LISTPROPERTIES_ASSOCIATE_ROOM_TYPES_DESC' , "در اینجا باید انواع اتاق ها را در حساب Beds24 خود با موارد ذخیره شده در این سیستم پیوند دهید.");
jr_define ('_BEDS24_DISPLAY_BOOKINGS_JOMRESROOMS_BEDS24TYPENAME' , "نوع اتاق Beds24") ;

jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOAPIKEY' , "هنوز نمی توان این ویژگی را وارد کرد زیرا کلید ویژگی را در صفحه پیوند ویژگی تنظیم نکرده اید.");
jr_define ('BEDS24_LISTPROPERTIES_IMPORT_CANNOT_NOROOMS' , "هنوز نمی توان این ملک را وارد کرد زیرا هیچ اتاقی ندارد. لطفاً یک یا چند اتاق ایجاد کنید (اتاقهای Beds24 مشابه انواع اتاق ها در Jomres است) و تنظیم حداقل قیمت را فراموش نکنید . پس از انجام این کار , می توانید نوع اتاق را به Jomres وارد کنید و آنها را با انواع اتاق Jomres فعلی مرتبط کنید. پس از آن شما می توانید تعرفه ها را تغییر دهید , اما حداقل قیمت باید تعیین شود. ");
jr_define ('_BEDS24_SUGGESTED_KEY' , "ما به شما پیشنهاد می کنیم از این کلید API استفاده کنید. وقتی این کار را انجام دادید , این صفحه را دوباره بارگیری کنید.");
jr_define ('BEDS24_LISTPROPERTIES_EXPORT' , "صادرات") ;
jr_define ('BEDS24V2_REST_API_INTRO' , "در اینجا می توانید جفت کلید REST API خود و مسیر API را مشاهده کنید. اگر این جزئیات را در حساب خود در Beds24 ذخیره کنید , Beds24 24 قادر خواهد بود از طریق API خود با این سایت تماس بگیرد.");
jr_define ('BEDS24V2_REST_API_CLIENT_ID' , "شناسه مشتری") ;
jr_define ('BEDS24V2_REST_API_CLIENT_SECRET' , "راز مشتری") ;
jr_define ('BEDS24V2_REST_API_ENDPOINT' , "URI (نقطه پایانی)") ;
jr_define ('BEDS24_LISTPROPERTIES_CONFIGURE' , "مشاهده ویژگی") ;
jr_define ('BEDS24_ROOM_TYPES_TITLE' , "انجمن های نوع اتاق") ;

jr_define ('BEDS24_ROOM_TYPES_INFO' , "این صفحه به شما اجازه می دهد تا انواع اتاق خود را با موارد ذخیره شده در سرورهای Beds24 مرتبط کنید.");
jr_define ('BEDS24_ROOM_TYPES_INFO2' , "تا زمانی که انواع اتاق به هم متصل نشوند , نمی توانید اطلاعات رزرو ارسال شده توسط Beds24 را دریافت کنید. اگر اموال شما به Beds24 وارد یا صادر شده است , ما به طور خودکار پیوندهایی برای شما ایجاد کرده ایم , اما اگر یک نوع اتاق جدید , یا یکی را حذف کنید , از این صفحه می توان برای اطمینان از صحت نوع اتاق استفاده کرد. ");
jr_define ('BEDS24_ROOM_TYPES_INFO3' , "انواع اتاقهای Beds24 را که می خواهید با انواع اتاقهای این سیستم مرتبط شوند انتخاب کنید , و پس از اتمام کار روی ذخیره کلیک کنید تا تغییرات در Beds24 به روز شود.");
jr_define ('BEDS24_ROOM_TYPES_YOURS' , "انواع اتاق شما") ;
jr_define ('BEDS24_ROOM_TYPES_BEDS24' , "انواع اتاق Beds24") ;
jr_define ('BEDS24_ROOM_TYPES_NONE' , "این ویژگی هیچ نوع اتاق ندارد , بنابراین نمی توان آن را به انواع اتاق های Beds24 متصل کرد. آیا می خواهید انواع اتاق ها را از Beds24 وارد کنید؟");
jr_define ('BEDS24_IMPORT_ROOMS' , "واردات اتاق") ;
jr_define ('BEDS24_EXPORT_BOOKINGS' , "صادرات رزروها") ;
jr_define ('BEDS24_IMPORT_BOOKINGS' , "وارد کردن رزروها") ;
jr_define ('BEDS24_IMPORT_EXPORT' , "با کلیک یک دکمه می توانید رزروهای موجود را از و به Beds24 وارد و صادر کنید. رزروهای وارد شده از Beds24 از دیروز وارد شده و شامل همه رزروهای سال آینده می شود. فقط باید بعد از ابتدا اموال را به سیستم وارد یا صادر کنید. پس از راه اندازی , واردات و/یا صادرات به صورت خودکار انجام می شود. ");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO' , "قیمت ها را به Beds24 به روز کنید؟");
jr_define ('_BEDS24_CHANNEL_MANAGEMENT_UPDATE_PRICING_YESNO_DESC' , "شما می توانید Beds24 را فقط با در دسترس بودن یا در دسترس بودن و قیمت به روز کنید. اگر از موقعیت های خاصی استفاده می کنید که می خواهید از کنترل پنل Beds24 برای تعیین قیمت های خاص برای کانال های خاص استفاده کنید , باید این تنظیم را به شماره ") ;
jr_define ('_BEDS24_CONTROL_PANEL_DIRECT' , "پیوند مستقیم") ;
jr_define ('BEDS24_IMPORT_NOTIFICATION_URLS' , "اگر این ویژگی را به Jomres وارد کرده اید , باید آدرس Notify Url را در Beds24 خود -> Property -> تنظیمات پیوند به موارد زیر به صورت دستی تغییر دهید:");
jr_define ('BEDS24V2_ERROR_KEYS_SHOULD_BE_REGENERATED' , "شما در حال حاضر هیچ ویژگی مرتبط با ویژگی های Beds24 ندارید. قبل از اینکه به مدیران خود اجازه دهید با Beds24 ارتباط برقرار کنند , باید کلیدهای API مدیر خود را بازنشانی کنید. این امر اطمینان حاصل می کند که همه آنها دارای کلیدهای منحصر به فرد هستند.");
jr_define ('BEDS24V2_ERROR_KEYS_REBUILD' , "بازنشانی کلیدهای API مدیر اکنون") ;
jr_define ('BEDS24V2_ERROR_KEYS_DISMISS' , "نادیده گرفتن هشدار") ;
jr_define ('BEDS24V2_ERROR_KEYS_DONE' , "کلیدهای API مدیریت بازنشانی شده است") ;

jr_define ('BEDS24V2_ADMINISTRATOR_LINKS_TITLE' , "پیوندهای دارایی Beds24") ;
jr_define ('BEDS24_ASSIGN_MANAGER' , "Beds24 Change Change Manager") ;
jr_define ('BEDS24_ASSIGN_MANAGER_DESC' , "هنگامی که مدیر صفحه مدیریت کانال (Bed24) را در نمای اصلی مشاهده می کند , هر ویژگی که دارای کلید API در Jomres و Beds24 باشد به طور خودکار در Jomres پیوند داده می شود. به همین ترتیب , هر گونه املاک وارد شده یا صادر شده توسط مدیر پیوند داده شده است. می توانید با تغییر منوی کشویی مدیر در این صفحه و کلیک بر روی ذخیره , مدیر مورد نظر را تغییر دهید. ");
jr_define ('BEDS24V2_TARIFFS_TITLE' , "صادرات تعرفه") ;
jr_define ('BEDS24V2_TARIFF_EXPORT_DESC' , "می توانید تعرفه هایی را که ایجاد کرده اید به Beds24 با نرخ مشخص روزانه صادر کنید. اگر قصد استفاده از این ویژگی \را دارید باید گزین Update prices to Beds24را در Configuration Property به No. همچنین ممکن است نیاز به تنظیم ملک خود در کنترل پنل Beds24 داشته باشید تا بتوانید چندین نرخ روزانه داشته باشید. برای انجام این کار به تنظیمات> ویژگیها> اتاقها> قیمتهای روزانه بروید و \"تعداد قیمتهای روزانه\" را به تعداد قیمتهای دلخواه خود پیکربندی کنید. هنگامی که این کار را انجام دادید , می توانید بر روی یکی از دکمه های P کلیک کنید تا نرخ روزانه تعیین شود. ");
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFFNAME' , "نام تعرفه") ;
jr_define ('BEDS24V2_TARIFF_EXPORT_TARIFF_ROOM_TYPE' , "نوع اتاق") ;
jr_define ('BEDS24V2_BOOKING_RESEND' , "ارسال مجدد اعلان") ;
jr_define ('BEDS24V2_BOOKING_DATA_AT_B24' , "این اطلاعات رزرو شده در Beds24 ذخیره شده است. مگر اینکه مطمئن شوید که داده ها نادرست هستند , نیازی به ارسال مجدد رزرو به Beds24 ندارید.");
jr_define ('BEDS24V2_BOOKING_NO_DATA_AT_B24' , "به نظر نمی رسد این رزرو با رزرو در Beds24 مرتبط باشد. می توانید از دکمه ارسال مجدد برای صادر کردن این رزرو به bed24 استفاده کنید.");

jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS' , "مهمانان ناشناس شوند؟") ;
jr_define ('BEDS24V2_GDPR_ANONYMISE_GUESTS_DESC' , "هنگام ارسال رزرو به مدیر کانال , توصیه می کنیم اطلاعات مهمان را ناشناس کنید. اگر این گزینه را بله تنظیم کرده اید , هنگام رزرو اطلاعات به مدیر کانال نام مهمان ارسال نمی شود , آدرس ایمیل . OTA ها بدون نیاز به به اشتراک گذاشتن اطلاعات بیشتر از آنچه لازم است , ثبت دقیقی از در دسترس بودن شما خواهند داشت. این بدان معناست که شما از GDPR پیروی می کنید زیرا اگر مهمان بعداً تصمیم به حذف اطلاعات خود در این سیستم بگیرد (در این مورد به شما اطلاع داده نمی شود اتفاق می افتد) , اطلاعات آنها در اختیار دیگر کنترل کننده های داده ای قرار نمی گیرد که شما هیچ کنترلی بر آنها ندارید. در صورت لزوم , می توانید رزروهای موجود در این سیستم را با رزروهای موجود در مدیر کانال متقابل کنید , صفحه جزئیات رزرو شماره رزرو را برای شما نشان می دهد این رزرو همانطور که در مدیر کانال ذخیره شده است. ");
jr_define ('BEDS24V2_MASTER_APIKEY' , "ویژگی تجربی - کلید API اصلی Beds24") ;
jr_define ("BEDS24V2_MASTER_APIKEY_DESC" , "اگر شما همواره نصب JOMRES با املاک مرتبط با BEDS24 کامل را در اینجا بخوانید. به طور پیش فرض Jomres طراحی شده است. ویژگی ها به bed24 و به صورت ایمن. این تنظیم به شما امکان می دهد با داشتن یک کلید api برای همه ویژگی ها , آن عملکرد را نادیده بگیرید. این بدان معناست که شما فقط به یک حساب در Beds24 احتیاج دارید , اما این بدان معناست که تمام هزینه ها توسط آن یک حساب جمع می شود. هر مدیری که به یک ملک دسترسی داشته باشد , می تواند به روزرسانی های مورد نظر را در سرورهای bed24 ارسال کند. برای نادیده گرفتن این تنظیم خالی بگذارید و مدیران ملک را مجبور به استفاده از حساب های Beds24 خود کنند. کلید API می تواند به هر شکلی که می خواهید باشد , به مدت طولانی به عنوان کلید در اینجا با <a href='https://www.beds24.com/control2.php؟pagetype=accountpassword' target='_blank'> <em> API Key 1 </em> </مطابقت دارد a> اگر شما قبلاً یک INSTALLATI دارید ON OF JOMRES with Properties LINKED to BEDS24: می توانید از این ویژگی استفاده کنید , اما لازم است ابتدا این جداول را کوتاه کرده (خالی کنید) , ویژگی های موجود موجود در Jomres را حذف کرده و سپس مجدداً خواص را وارد کنید از Beds24 به Jomres. XXXXX_jomres_beds24_contract_booking_number_xref, XXXXX_jomres_beds24_property_uid_xref, XXXXX_jomres_beds24_rest_api_key_xref, XXXXX_jomres_beds24_room_type_xref. <br/> <br/> هنگام تنظیم کلید API خود در <em> کلید API N </em> صفحه دسترسی به حساب Beds24 , بسیار مهم است که قسمت <em> کلید دسترسی API </em> را روی ' فقط IP مجاز لیست مجاز باشد 'و شماره IP را روی <strong> ". $this_servers_ip_number." </strong> این امر برای پیکربندی اصلی API اصلی در اینجا و در صورتی که مدیر املاک API شخصی خود را پیکربندی می کند , یکسان اعمال شود. کلید ");
jr_define ('BEDS24V2_WHITELIST_WARNING' , "اگر املاک شما قبلاً به Beds24 متصل شده اند , توجه داشته باشید که Beds24 اخیراً سیاستی را معرفی کرده است که در آن همه سرورهای متصل به حساب شما باید در لیست سفید قرار گرفته باشند. این کار را می توانید در صفحه دسترسی به حساب انجام دهید. کلید دسترسی شما وارد شده است. فهرست کشویی IP سفید را انتخاب کرده و شماره IP را روی  تنظیم کنید. ");