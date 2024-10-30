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
jr_define( 'FIREWALL_CHECK', 'בדיקת חומת אש' );
jr_define( 'FIREWALL_CHECK_DESC', 'תוסף זה הוא בדיקה פשוטה כדי לראות אם השרת הזה יכול להתחבר לשירותים מרוחקים. אם הוא לא יכול, זה עשוי להצביע על כך שקיימים חוקי חומת אש המונעים משני המכונות לדבר זה עם זה. אם יש הם, אז ייתכן שתצטרך לדון בהתאמת חוקי חומת האש עם המארחים של שרת האינטרנט שלך. תגובות 404 ו-403 יכולות להיחשב בסדר מכיוון שאתה מקבל תגובה מהשירות המרוחק.' );
jr_define( 'FIREWALL_CHECK_REMOTE_SERVICE', 'שירות מרוחק' );
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'קוד סטטוס' );
jr_define ('FIREWALL_CHECK_IP_NUMBER', 'מספר IP');