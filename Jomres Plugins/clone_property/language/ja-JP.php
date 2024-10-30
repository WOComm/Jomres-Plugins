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

jr_define( '_JRPORTAL_CLONEPROPERTY_TITLE', "クローンプロパティ");
jr_define( '_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY', "複製するプロパティを選択してください：");
jr_define( '_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME', "新しいプロパティの名前：");
jr_define( '_JRPORTAL_CLONEPROPERTY_NOTES', "クローンプロパティには料金がないことに注意してください。料金をコピーする場合は,Clone Tariffsプラグインを使用するか,手動で料金を作成する必要があります。プラグイン設定は,使用可能な場合はインポートされません。プロパティは相互参照されません。 <br/>クローンプロパティは,新しいプロパティがその後同じプロパティタイプと部屋タイプを使用する場合にのみ,プロパティを複製するために使用する必要があります。 ");
jr_define( '_JRPORTAL_CLONEPROPERTY_DONE', "プロパティのクローン");