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

jr_define('_JRPORTAL_GMAPS_DD_YES',"Evet");
jr_define('_JRPORTAL_GMAPS_DD_NO',"Hayır");
jr_define('_GOOGLE_ADDRESS',"Adres");
jr_define('_GOOGLE_INPUT_FIELDSET_POSTALCODE',"Posta kodu");
jr_define('_GOOGLE_INPUT_FIELDSET_TOWN',"Kasaba");
jr_define('_GOOGLE_INITIALIZE_ERROR1',"Maksimum 9 ara noktaya ulaşıldı");
jr_define('_GOOGLE_INITIALIZE_ERROR2',"Google bu rota ve seçilen seçenekler için yol tarifini hesaplayamadı");
jr_define('_GOOGLE_DIRECTION_PRINT',"Yol tarifi yazdır");
jr_define('_GOOGLE_ROUTEPLANNING',"Rotanızı planlayın ");
jr_define('_GOOGLE_ROUTEPLANNING_HYOURLOCATION',"Konumunuz (rota başlangıç ​​noktası)");
jr_define('_GOOGLE_ROUTEPLANNING_HROUTEOPTIONS',"Rota seçenekleri");
jr_define('_GOOGLE_ROUTEPLANNING_HOPTIMIZEFOR',"En iyi duruma getir");
jr_define('_GOOGLE_ROUTEPLANNING_HDRIVING',"Sürüş");
jr_define('_GOOGLE_ROUTEPLANNING_HWALKING',"Yürüyüş");
jr_define('_GOOGLE_ROUTEPLANNING_HCYCLING',"Bisiklete binme");
jr_define('_GOOGLE_ROUTEPLANNING_HHIGHWAYS',"Otoyollardan kaçının");
jr_define('_GOOGLE_ROUTEPLANNING_HTOLLS',"Ücretli geçişlerden kaçının");
jr_define('_GOOGLE_SELECT_BUTTON',"Yol tarifi alın");
jr_define('_GOOGLE_SELECT_RESETMAP',"Haritayı sıfırla");
jr_define('_GOOGLE_ROUTEPLANNING_INSTRUCTIONS',"Hedefiniz (rota bitiş noktası) haritada zaten işaretlenmiş. Lütfen konumunuzu girin ve varış noktasına yol tarifi almak için rota seçeneklerinizi seçin. 9 adede kadar seçmek için haritaya da tıklayabilirsiniz. başlangıç ​​noktanızdan varış noktasına geçiş noktaları.");