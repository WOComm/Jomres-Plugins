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
jr_define ('_JRPORTAL_EXTENDED_MAPS_TITLE', "Εκτεταμένοι χάρτες");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HWIDTH', "Πλάτος χάρτη (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HHEIGHT', "Mapψος χάρτη (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HZOOMLEVEL', "Επίπεδο ζουμ χάρτη");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HOVERRIDE_PROPERTYLIST', "Παράκαμψη προεπιλεγμένου ιδιοκτήτη Jomres;");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HINFOICON', "Εικονίδιο δείκτη άλλης εκδήλωσης/αξιοθέατων");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPOPUP_WIDTH', "Αναδυόμενο πλάτος (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGWIDTH', "Πλάτος εικόνας (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HPROPERTY_IMGHEIGHT', "Imageψος εικόνας (px)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HSHOW_DESCRIPTION', "Εμφάνιση περιγραφής ιδιοκτησίας; (μόνο για ενοικιαζόμενα αναδυόμενα παράθυρα)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_DESCRIPTION', "Περικοπή περιγραφής ιδιοκτησίας; (μόνο για ενοικιαζόμενα αναδυόμενα παράθυρα)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_HTRIM_VALUE', "Περικοπή περιγραφής ιδιοκτησίας μετά (χαρακτήρες) (μόνο για ενοικιαζόμενα αναδυόμενα παράθυρα)");
jr_define ('_JRPORTAL_EXTENDED_MAPS_GROUPMARKERS', "Δείκτες ομάδας");

jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS', "Εμφανίζει έναν χάρτη με συλλογές ιδιοκτησιών και τοπικές εκδηλώσεις/αξιοθέατα.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_PTYPE_IDS', "Καθορίστε τους τύπους ιδιοτήτων που θέλετε να εμφανίζονται. Διαχωρισμένα με κόμμα.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_PROPERTIES', "Εμφάνιση ιδιοτήτων; Ορίστε στο 0 για να μην εμφανίζονται");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_EVENTS', "Εμφάνιση συμβάντων; Ορίστε στο 0 για να μην εμφανίζονται.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_SHOW_ATTRACTIONS', "Εμφάνιση αξιοθέατων; Ορίστε στο 0 για να μην εμφανίζονται.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_COUNTRY', "Κωδικός χώρας ISO. Χρησιμοποιήστε αυτήν την επιλογή για να περιορίσετε τον χάρτη σε μία χώρα.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_REGION', "Ορίστε το αναγνωριστικό περιοχής για να περιορίσετε τα αποτελέσματα σε ιδιότητες σε μια συγκεκριμένη περιοχή.");
jr_define ('_JOMRES_SHORTCODES_06000EXTENDED_MAPS_ARG_TOWN', "Ορίστε ένα όνομα πόλης για να περιορίσετε τα αποτελέσματα σε ιδιότητες σε μια συγκεκριμένη πόλη.");

jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID',"Map ID");
jr_define('_JRPORTAL_EXTENDED_MAPS_MAP_ID_DESC',"To use the Advanced mapping features you will need to create a map id and save it here.");