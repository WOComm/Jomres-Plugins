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

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT',"Zarządzanie kanałami");
jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC',"Klient może wykonywać czynności związane z zarządzaniem kanałami. Uwaga, daje to klientowi znaczne uprawnienia w systemie do modyfikowania kont i właściwości.");

jr_define('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE',"Czyszczenie");

jr_define('_CMF_CANCELLED_BOOKING',"Menedżer kanału anulował rezerwację");

jr_define('_CMF_CLEANING_STRING',"Czyszczenie"); // Nie zmieniaj tego, jeśli zaimportowałeś już właściwości. Nieruchomości z opłatami za sprzątanie mają dodatek o tej nazwie
jr_define('_CMF_SECURITY_STRING',"Depozyt"); // Nie zmieniaj tego, jeśli zaimportowałeś już właściwości. Nieruchomości z kaucjami mają dodatek o tej nazwie


jr_define('_CMF_API_PRIVACY',"Prywatność API");
jr_define('_CMF_API_PRIVACY_ON',"Prywatność włączona");
jr_define('_CMF_API_PRIVACY_OFF',"Prywatność wyłączona");

jr_define('_CMF_API_PRIVACY_DESC',"Informacje o właściwości mogą być widoczne tylko przez kanał, który ją utworzył. Na przykład, jeśli nadałeś różne pary kluczy API zarówno kanałowi A, jak i kanałowi B, informacje o właściwości utworzonej przez kanał A nie mogą widoczne dla kanału B..., chyba że wyłączysz Prywatność interfejsu API, aby umożliwić wszystkim kanałom wyświetlanie wszystkich informacji o usłudze za pośrednictwem interfejsu API. Ustaw opcję Prywatność interfejsu API na Wył., jeśli udostępniasz tę usługę innej witrynie, która chce ją wyświetlić. Jeśli nie udostępniasz tej usługi żadnym innym witrynom, pozostaw opcję Prywatność interfejsu API ustawioną na Wł.");