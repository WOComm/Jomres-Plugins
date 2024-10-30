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
jr_define ('_JRPORTAL_FEED_CREATOR_TITLE', "RSS Feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS' , "Αυτή η προσθήκη δημιουργεί μια τροφοδοσία από όλες τις ιδιότητες jomres. Επί του παρόντος υποστηρίζονται μορφές διανομής RSS 1.0 και RSS 2.0.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME' , "Όνομα ροής δεδομένων");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDDESC', "Περιγραφή ροής");
jr_define ('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME', "Όνομα αρχείου ροής (χωρίς κενά)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT' , "Μορφή διανομής");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Χρόνος προσωρινής αποθήκευσης (σε δευτερόλεπτα)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL' , "Διεύθυνση URL εικόνας ροής δεδομένων");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC' , "Περικοπή περιγραφής ιδιοκτησίας;");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Περικοπή μετά από (χαρακτήρες)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE' , "Εμφάνιση εικόνας ροής;");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE' , "Εμφάνιση εικόνας ιδιότητας;");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN' , "Εμφάνιση της πόλης;");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION' , "Εμφάνιση περιοχής ιδιοκτησίας;");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY' , "Εμφάνιση χώρας ιδιοκτησίας;");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS' , "Περιορισμός αριθμού κοινοπρακτικών ιδιοκτησιών σε");