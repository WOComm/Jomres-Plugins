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
jr_define('_PAGEVIEW_RECORDER_ENABLED',"Καταγραφή όλων των προβολών σελίδας σε db;");
jr_define('_PAGEVIEW_RECORDER_DESC',"Εάν ενεργοποιηθεί, όλες οι προβολές σελίδας θα καταγραφούν στη βάση δεδομένων. ΠΡΟΕΙΔΟΠΟΙΗΣΗ! Ο πίνακας προβολών σελίδας της βάσης δεδομένων μπορεί να γίνει πολύ μεγάλος σε πολύ σύντομο χρονικό διάστημα! Χρησιμοποιήστε το με προσοχή.");