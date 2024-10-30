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

jr_define('_JRPORTAL_WESTERN_UNION',"西联汇款");
jr_define('_JRPORTAL_WESTERN_UNION_TITLE',"西联汇款设置");
jr_define('_JRPORTAL_WESTERN_UNION_ADMIN_INSTRUCTIONS',"在这里您可以定义将用于所有启用了 WU 网关的属性的 WU 帐户详细信息。如果您选择覆盖在前端设置的 WU 帐户详细信息，则将使用此处设置的详细信息. 如果您选择不这样做，则将使用前端网关配置中定义的 WU 帐户详细信息。");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_OVERRIDE_ACTIVE',"覆盖为所有属性设置的WU帐户详细信息？");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER',"西联汇款：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN',"收款人姓名：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT',"收款人ID：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC',"收款人地址：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME',"其他信息：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER1',"西联汇款：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN1',"收款人姓名：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT1',"收款人ID：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC1',"收款人地址：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME1',"其他信息：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_ACCOUNT_HOLDER2',"西联汇款：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_IBAN2',"收款人姓名：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_SWIFT2',"收款人ID：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_BIC2',"收款人地址：");
jr_define('_JOMRES_WESTERN_UNION_GATEWAY_BANK_NAME2',"其他信息：");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_TITLE',"您预订的付款详情");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_HELLO',"亲爱的");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_EMAIL_THANKYOU',"感谢您预订");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_SENDDEPOSITTO',"为了确保您的预订，请发送您的押金");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS_EMAIL',"到下面的西联账户。");
jr_define('_JOMRES_CUSTOMTEXT_WESTERN_UNION_BELOWADDRESS',"到下方的西联账户。在您提交此预订后，西联账户信息的副本也会通过电子邮件发送给您。");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS1',"如果您有任何问题，请随时与我们联系。您可以拨打我们的电话");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS2'," 或给我们发电子邮件 ");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_CONTACTUS_EMAIL',"如果您有任何问题，请随时与我们联系。");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_PRINT',"打印西联汇款账户详情");
jr_define('_JOMRES_WESTERN_UNION_CUSTOMTEXT_SUBMIT',"提交");

	jr_define('JOMRES_WESTERN_UNION_GATEWAY_WU_CHOSEN',"客人使用西联汇款");
