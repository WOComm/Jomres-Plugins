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

jr_define( '_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE', "カスタムプロパティフィールド");
jr_define( '_JOMRES_CUSTOM_PROPERTY_FIELDS_TITLE_EDIT', "カスタムプロパティフィールドの編集");
jr_define( '_JOMRES_CUSTOM_PROPERTY_FIELDS_INFO', "この機能を使用して,プロパティのカスタム情報フィールドを作成します。この情報はプロパティマネージャによって追加され,プロパティの詳細ページの新しいタブに表示されます。");
jr_define( '_JOMRES_CUSTOM_PROPERTY_FIELDS_MANAGER_TITLE', "その他のプロパティ情報");
jr_define( '_JOMRES_CUSTOM_PROPERTY_FIELDS_INSTRUCTIONS', "これらのカスタムプロパティフィールドは,別のタブのプロパティ詳細またはプロパティリストに表示できます。/".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/tabcontent_01_custom_property_fields.html (for the property details tab) and/or /".JOMRES_ROOT_DIRECTORY."/core-plugins/custom_property_fields/templates/propertylist_custom_property_fields.html(プロパティリストスニペット用)必要なレイアウトを実現します。上記のフィールドを使用して,基本的なレイアウトは次のようになります。これは,独自のレイアウトを作成するための例として使用できます。 ");