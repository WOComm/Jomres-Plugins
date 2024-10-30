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

jr_define( '_COMMON_STRINGS_TITLE', "共通テンプレート変数");

jr_define( '_COMMON_STRINGS_INFO', "開発者ツール。テンプレートの呼び出しスクリプトに追加しなくても,すべてのテンプレートで使用できる共通の文字列を開発者に表示するように設計されています。<br/>たとえば,このリストには定義COMMON_NEXTがあります。開発者 呼び出し元のスクリプトで定義しなくても,これをJomresテンプレートに追加できます。テンプレートに &#123;COMMON_NEXT&#125; を配置することで,他の文字列と同じように共通の文字列をテンプレートに追加できます。<br/> 以下のリストには,言語ファイルで定義されている定数が表示され,その横に表示される出力が表示されます(プロパティ固有の言語のカスタマイズがある場合があります)。「COMMON_LAST_VIEWED_PROPERTY_UID」定数の場合は, プロパティuidはさまざまであり,このリストには表示されません。 ");
jr_define( '_COMMON_STRINGS_CONSTANT', "定数");
jr_define( '_COMMON_STRINGS_VALUE', "出力");