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

jr_define('_OCCUPANCIES_TITLE',"最少入住人数");

jr_define('_OCCUPANCIES_DESCRIPTION',"您可以设置特定房间类型的最低入住率，如果您想确保客人在显示适当的房间和房价组合之前在预订表格中选择了一定数量的客人类型。" );
jr_define('_OCCUPANCIES_DESCRIPTION_INFO',"在这里您可以为每个房间类型创建一个最低入住级别。如果客人没有选择合适的客人类型数量，将不会提供房间/资费组合。对于每个房间类型，请选择给定类型的客人数量，在提供房间类型之前，预订表格中应该有一个最小值。如果您不关心房间类型的入住率应该是多少，请将该房间类型的客人数量设置为 0 (零)。 ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"客人类型编号");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"您还没有创建任何访客类型。请在使用此功能之前创建一些访客类型。");

jr_define('_OCCUPANCIES_EDIT',"编辑最低入住率");