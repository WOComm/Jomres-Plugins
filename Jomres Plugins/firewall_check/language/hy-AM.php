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
jr_define('FIREWALL_CHECK', 'Firewall-ի ստուգում' );
jr_define( 'FIREWALL_CHECK_DESC', 'Այս փլագինը պարզ ստուգում է` տեսնելու, թե արդյոք այս սերվերը կարող է միանալ հեռավոր ծառայություններին: Եթե չկարողանա, դա կարող է ցույց տալ, որ գոյություն ունեն firewall-ի կանոններ, որոնք թույլ չեն տալիս երկու մեքենաներին խոսել միմյանց հետ: են, ապա ձեզ հարկավոր է քննարկել firewall կանոնների կարգավորումը ձեր վեբսերվերի հոսթերների հետ: 404 և 403 պատասխանները կարելի է համարել լավ, քանի որ պատասխան եք ստանում հեռակա ծառայությունից:' );
jr_define ('FIREWALL_CHECK_REMOTE_SERVICE', 'Հեռակա ծառայություն');
jr_define( 'FIREWALL_CHECK_STATUSCODE', 'Կարգի կոդը' );
jr_define('FIREWALL_CHECK_IP_NUMBER', 'IP համար' );