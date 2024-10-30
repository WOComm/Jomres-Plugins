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

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT', "Správa kanálů");
jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_DESC', "Klient může provádět činnosti správy kanálů. Všimněte si toho, že to dává klientovi v systému značnou moc upravovat vaše účty a vlastnosti.");

jr_define ('_OAUTH_SCOPE_CHANNEL_MANAGEMENT_CLEANING_PRICE', "Čištění");

jr_define ('_CMF_CANCELLED_BOOKING', "Správce kanálu zrušil rezervaci");

jr_define ('_CMF_CLEANING_STRING', "Čištění"); // Neměňte to, pokud jste již importovali vlastnosti. Nemovitosti s poplatky za úklid mají zvláštní název s tímto názvem
jr_define ('_CMF_SECURITY_STRING', "Kauce"); // Neměňte to, pokud jste již importovali vlastnosti. Nemovitosti s cennými papíry mají Extra s tímto názvem


jr_define ('_CMF_API_PRIVACY', "Ochrana osobních údajů API");
jr_define ('_CMF_API_PRIVACY_ON', "Ochrana soukromí");
jr_define ('_CMF_API_PRIVACY_OFF', "Ochrana soukromí vypnuta");

jr_define ('_CMF_API_PRIVACY_DESC', "Informace o vlastnosti může vidět pouze kanál, který ji vytvořil. Například pokud jste kanálu A i kanálu B dali různé páry klíčů API, informace o vlastnosti vytvořené kanálem A nelze být viděn kanálem B ... pokud nevypnete ochranu osobních údajů API, aby všechny kanály mohly prostřednictvím API zobrazit všechny informace o službě. Pokud tuto službu sdílíte s jiným webem, který chce službu uvést, nastavte ochranu soukromí API na Vypnuto. Pokud tuto vlastnost nesdílíte s žádnými jinými weby, ponechte nastavení ochrany osobních údajů API zapnuto. ");
