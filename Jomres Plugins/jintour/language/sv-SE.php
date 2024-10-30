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


jr_define ('_JINTOUR_TITLE', "Tour/Activity management");

jr_define ('_JINTOUR_PROFILES_TITLE', "Tour/Activity profiles");
jr_define('_JINTOUR_PROFILES_NEW',"Ny tur/aktivitetsprofil");
jr_define('_JINTOUR_PROFILES_DELETE',"Ta bort tur-/aktivitetsprofil");

jr_define ('_JINTOUR_PROFILE_TITLE', "Profiltitel");
jr_define ('_JINTOUR_PROFILE_DESCRIPTION', "Beskrivning");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Ange en beskrivning av din tur/aktivitet, inklusive dess resplan.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Veckodagar");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define ('_JINTOUR_PROFILE_PRICE_ADULTS', "Vuxenpris");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Barnpris");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"För att utesluta ett alternativ från att visas i bokningsformuläret, lämna priset som 0 (noll)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Vuxenutrymmen");
jr_define ('_JINTOUR_PROFILE_SPACES_KIDS', "Barnrum");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"Antalet platser tillgängliga på turnén/aktiviteten");
jr_define ('_JINTOUR_PROFILE_START_DATE', "Säsongstart");
jr_define('_JINTOUR_PROFILE_END_DATE',"Säsongen slutar");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"När du har skapat en tur-/aktivitetsprofil måste du skapa rundturer/aktiviteter baserat på den profilens inställningar. Skapa turnén/aktiviteten och klicka sedan på den gröna pilikonen bredvid profilen för att skapa själva turerna/aktiviteterna. När turerna/aktiviteterna har skapats kommer du att kunna ta bort enskilda turer/aktiviteter om du vill.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Generera turer/aktiviteter");

jr_define('_JINTOUR_TOUR_TITLE',"Aktivitetstitel");
jr_define('_JINTOUR_TOUR_DATE',"Datum");
jr_define ('_JINTOUR_TOUR_ADULTS', "Vuxna");
jr_define('_JINTOUR_TOUR_KIDS',"Barn");
jr_define('_JINTOUR_TOUR_ITINERY',"Resplan");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Genererade nya turer");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Turnbokning avbruten");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"Nya turer genererade");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Tillgängliga platser för närvarande");

jr_define ('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT', "Ny bokning för turné/resurs -id");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"En ny bokning för en administratörsturné/resurs har gjorts. Se följande länk för att se sidan för den turens administratörsområde ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours Configuration");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Är hela installationen en Jintour-installation?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"Om du ställer in detta till Ja, kommer alla egenskaper att vara reseegenskaper. Om du ställer in det till Nej, då när nya egenskaper skapas kommer du att kunna ha både Tur och Hotell/Lägenhetstyp egenskaper. ");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Tours");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Välj turnéalternativet om du erbjuder bokningar för föremål som är tillgängliga på vissa datum (t.ex. turnéer, biljetter till en konsert.)");
jr_define ('_JINTOUR_SHOWDEPARTURE', "Visa inmatningsfältet för avgång?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Sätt detta till Ja om du vill visa både ett ankomst- och ett avgångsdatum. Detta skulle vara användbart om du erbjuder bussresor, flygbiljetter etc där du behöver veta både inkommande och utgående datum, genom att visa avresedatumet kan du erbjuda resurser över flera datum, medan med inställningen inställd på Nej, kan endast bokningar för ett datum accepteras.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Turlista");