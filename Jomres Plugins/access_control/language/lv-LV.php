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
jr_define ('_JOMRES_ACCESS_CONTROL', 'Piekļuves kontrole');
jr_define ('_JOMRES_ACCESS_CONTROL_DESC', 'Šī funkcija ļauj iestatīt minimālo piekļuves līmeni, kas nepieciešams lietotājiem, lai piekļūtu konkrētiem uzdevumiem.');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_DEFAULT', 'Noklusējums');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_ANYBODY', 'Jebkurš');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_REGISTERED', 'Reģistrēts');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_MANAGER', 'Pārvaldnieks');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_SUPERMANAGER', 'Super vadītājs');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_NOBODY', 'Neviens');
jr_define ('_JOMRES_ACCESS_CONTROL_LEVELS_RECEPTIONIST', 'Reģistratūra');