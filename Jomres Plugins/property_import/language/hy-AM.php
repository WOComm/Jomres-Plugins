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
jr_define('_JOMRES_PROPERTY_IMPORT_TITLE',"Գույքի ներմուծում");
jr_define('_JOMRES_PROPERTY_IMPORT_DESC',"Այս հատկությունը թույլ է տալիս ներմուծել հատկություններ CSV ֆայլի միջոցով: Պահանջվող տարբեր ստուգումների պատճառով խորհուրդ ենք տալիս սահմանափակել ստեղծված հատկությունների քանակը միաժամանակ 50-ից ոչ ավելի խմբաքանակներով: ");
jr_define('_JOMRES_PROPERTY_IMPORT_SELECT',"Խնդրում ենք ընտրել այն ֆայլը, որը ցանկանում եք վերբեռնել:");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELDS',"Csv ֆայլը պետք է ունենա 11 սյունակ, իսկ դաշտերը չպետք է պարունակեն որևէ html: Բոլոր դաշտերը պարտադիր են:");

jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME',"Գույքի անուն");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_NAME_TYPE',"Տեքստ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS',"Սենյակների թիվը (եթե սա վիլլա/տնակ է, ապա անկախ փաստացի սեփականության սենյակների քանակից, ապա սա պետք է լինի 1: Միայն հյուրանոցները/B&B-ները և այլն պետք է ունենան մեկից ավելի սենյակ): Ամբողջ թիվ . ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_ROOMS_TYPE', "Ամբողջ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE',"Գիշերվա գինը առանց արժույթի կոդերի");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_PRICE_TYPE',"Float");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS', "Էլ. փոստի հասցե");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_EMAIL_ADDRESS_TYPE',"Տեքստ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET',"Փողոց");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_STREET_TYPE', "Տեքստ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN',"Քաղաք");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TOWN_TYPE',"Տեքստ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION', "Տարածաշրջան. Սա պետք է համապատասխանի Մարզերի աղյուսակում պահված շրջանների ID- ներին");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_REGION_TYPE', "Ամբողջ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY',"Սեփականության երկիր: Կարճ կոդ, օրինակ՝ GB կամ DE, ոչ լրիվ երկրի անվանումը");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_COUNTRY_TYPE', "Տեքստ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE',"Փոստային ինդեքս");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_POSTCODE_TYPE',"Տեքստ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE',"Հեռախոսահամար");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_TELEPHONE_TYPE',"Տեքստ");
jr_define('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION',"Սեփականության ամբողջական նկարագրությունը: Առավելագույնը 500 նիշ");
jr_define ('_JOMRES_PROPERTY_IMPORT_CSV_FIELD_DESCRIPTION_TYPE', "Տեքստ");

jr_define('_JOMRES_PROPERTY_IMPORT_PROPERTY_TYPE_NOT_SENT',"Սխալ, հատկության տեսակը սահմանված չէ:");
jr_define('_JOMRES_PROPERTY_IMPORT_NO_ROOM_TYPES_FOR_PROPERTY_TYPE',"Սխալ, մենք այդ գույքի տեսակի համար սենյակի տեսակներ չունենք: Դուք կարող եք դա ուղղել՝ այցելելով Կայքի կառուցվածքը ադմինիստրատորի տարածքում:");
jr_define ('_JOMRES_PROPERTY_IMPORT_NO_FILE', "Վա ,յ, մոռացե՞լ եք ֆայլ վերբեռնել");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_TOO_MANY_COLUMNS',"Գտնվել են չափազանց շատ սյունակներ, կա՛մ ֆայլը սխալ ձևավորված է, կա՛մ csv-ի տվյալները ճիշտ չեն կառուցված։");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PROPERTY_NAME_NOT_SET',"Գույքի անունը սահմանված չէ:");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NUMBER_OF_ROOMS_INCORRECT',"Սենյակների թիվը սահմանված չէ");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_PRICE_NOT_SET',"մեկ գիշերվա գինը սահմանված չէ");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_COULD_NOT_VALIDATE_EMAIL_ADDRESS',"Չհաջողվեց հաստատել էլփոստի հասցեն:");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_STREET',"Փողոցը սահմանված չէ:");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TOWN',"Քաղաքը սահմանված չէ:");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_REGION',"Տարածաշրջանը սահմանված չէ");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_COUNTRY', "Երկիրը սահմանված չէ:");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_POSTCODE',"Փոստային ինդեքսը սահմանված չէ");
jr_define ('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_TELEPHONE', "Հեռախոսը կարգավորված չէ");
jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_NOT_SET_DESCRIPTION',"Նկարագրությունը սահմանված չէ");

jr_define('_JOMRES_PROPERTY_IMPORT_MESSAGE_SUCCESS',"Գույքը հաջողությամբ ներմուծվեց!");

jr_define('_JOMRES_PROPERTY_IMPORT_FAILED_PROPERTIES',"Քանի որ դուք ունեք մեկ կամ մի քանի հատկություններ, որոնք չհաջողվեց ներմուծել, մենք արտահանել ենք հենց այդ հատկությունները ներքևի դաշտում: Դուք կարող եք պատճենել այս հատկությունները excell/open office calc/ձեր ընտրությամբ CSV ֆայլերի մշակիչ և ուղղել խնդիրները՝ առանց բոլոր գույքը նորից ներմուծելու անհրաժեշտության:");