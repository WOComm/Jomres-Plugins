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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Управление на канали");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Клиентът може да извършва дейности по управление на канали. Обърнете внимание, това дава на клиента значителни правомощия в системата да променя вашите акаунти и свойства.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Почистване");

jr_define ('_CMF_CANCELLED_BOOKING', "Мениджърът на канали отмени резервацията");

jr_define ('_CMF_CLEANING_STRING', "Почистване"); // Не променяйте това, ако вече сте импортирали свойства. Имоти с такси за почистване имат Екстра с това име
jr_define ('_CMF_SECURITY_STRING', "Гаранционен депозит"); // Не променяйте това, ако вече сте импортирали свойства. Имотите с гаранционни депозити имат Екстра с това име


jr_define ('_CMF_API_PRIVACY', "Поверителност на API");
jr_define ('_CMF_API_PRIVACY_ON', "Поверителност включена");
jr_define ('_CMF_API_PRIVACY_OFF', "Поверителността е изключена");

jr_define ('_CMF_API_PRIVACY_DESC', "Информацията за свойството може да се види само от канала, който го е създал. Например, ако сте дали различни двойки ключове на API както за канал А, така и за канал В, информацията за свойство, създадено от канал А, не може да се вижда от канал В ... освен ако не изключите поверителността на API, за да позволите на всички канали да виждат цялата информация за собствеността чрез API. Задайте Privacy API на Off, ако споделяте тази собственост с друг сайт, който иска да изброи свойството. Ако не споделяте този имот с други сайтове, оставете Privacy API зададен на On. ");