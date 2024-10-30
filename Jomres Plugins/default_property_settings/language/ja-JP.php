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

jr_define( '_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE', "デフォルトのプロパティ設定");
jr_define( '_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE', "一般的な構成タイトル(使用可能な場合,一部は使用できない場合があります)");
jr_define( '_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME', "変数名");
jr_define( '_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE', "現在の値");
jr_define( '_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING', "これは高度な機能です。特定の用途がない場合は,使用しない方がよいでしょう。このプラグインを使用すると,新しいプロパティのデフォルト値を変更できます。ここで変更すると,Jomresシステムに大きな影響を与える可能性があるため,変数を変更する前に,変数の機能を理解してください。空白の項目は,通常,使用されなくなった古い設定ですが,下位互換性の理由でそのまま残されているか,次のような設定です。プロパティ設定領域から変更することはできません。 ");
jr_define( '_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE', "新しい値");