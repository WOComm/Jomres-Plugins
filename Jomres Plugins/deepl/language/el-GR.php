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

jr_define ('_DEEPL_TITLE', "Μεταφράσεις DeepL");
jr_define('_DEEPL_DESCRIPTION',"Το DeepL είναι μια μεταφραστική υπηρεσία σε λογικές τιμές που μπορείτε να χρησιμοποιήσετε για να μεταφράσετε αυτόματα τις συμβολοσειρές της γλώσσας Jomres. Αυτές οι μεταφράσεις, μόλις ληφθούν από την υπηρεσία DeepL, αποθηκεύονται τοπικά και μπορείτε να χρησιμοποιήσετε τη δυνατότητα Μεταφράσεων ετικετών για να τις βελτιώσετε. Αυτό επιταχύνει σημαντικά τη διαδικασία δημιουργίας του ιστότοπού σας με πολλές γλώσσες. <a href='https://support.deepl.com/hc/en-us/articles/360019925219' target='_blank'> Υποστηριζόμενες γλώσσες </a>");
jr_define ('_DEEPL_API_KEY_SETTING', "DeepL Authentication Key");
jr_define ('_DEEPL_API_KEY_SETTING_DESC', "Θα χρειαστείτε ένα έγκυρο κλειδί API από <a href='https://www.deepl.com/pro?cta=header-prices/' target='_blank'> DeepL. </a > Αφού εγγραφείτε, θα βρείτε το κλειδί ελέγχου ταυτότητας στον <a href='https://www.deepl.com/en/pro-account/' target='_blank'> λογαριασμό σας. </a> Μετά από εσάς έχετε αποθηκεύσει το κλειδί στο Jomres, ο ιστότοπός σας μπορεί να επιβραδυνθεί για λίγο, καθώς θα υπάρξουν πολλές μεταφράσεις που πρέπει να αφαιρεθούν από την υπηρεσία DeepL. Κάντε υπομονή και φορτώστε ξανά τη σελίδα μερικές φορές. Στη συνέχεια, μπορείτε να ρυθμίσετε προσεκτικά τις προσαρμογές στη σελίδα μεταφράσεων lable. ");