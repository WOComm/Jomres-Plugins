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

jr_define('TOOL_HYPHEN_CHECK_TITLE',"Provjera crtice");
jr_define('TOOL_HYPHEN_CHECK_DESCRIPTION',"Ovaj alat je dizajniran za provjeru svih svojstava zaostajanja i dugih polja. Neki mogu pogrešno imati html entitete u poljima lat ili long umjesto stvarnih crtica. Gdje je pronađen ovaj alat ih pretvara u crtice.");
jr_define('TOOL_HYPHEN_CHECK_DONE_SOMEFOUND',"Pronađena su neka svojstva s html entitetima, koja su sada pretvorena u stvarne crtice. Broj konvertiranih svojstava je ");
jr_define ('TOOL_HYPHEN_CHECK_DONE_NONEFOUND', "Sve je dobro, nisu pronađena svojstva s html entitetima gdje bi trebali biti stvarni crtice.");