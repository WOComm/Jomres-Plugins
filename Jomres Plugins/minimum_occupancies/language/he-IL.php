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
jr_define('_OCCUPANCIES_TITLE',"מינימום תפוסה");

jr_define('_OCCUPANCIES_DESCRIPTION',"אתה יכול להגדיר את רמות התפוסה המינימליות לסוגי חדרים ספציפיים, אם אתה רוצה לוודא שהאורח בחר מספר מסוים של סוגי אורחים בטופס ההזמנה לפני הצגת שילוב החדר והתעריף המתאים." );
jr_define ('_OCCUPANCIES_DESCRIPTION_INFO', "כאן תוכל ליצור רמת תפוסה מינימלית לכל סוג חדר. שילוב חדר/תעריף לא יוצע אם האורח לא בחר את מספר סוגי האורחים המתאים. עבור כל סוג חדר אנא בחר את מספר אורחים מסוג מסוים שאמור להיות מינימום בטופס ההזמנה לפני שסוג החדר מוצע. אם לא אכפת לך מה צריכה להיות רמת התפוסה של סוג חדר, השאר את מספר האורחים של אותו סוג חדר מוגדר כ-0 (אפס). ");
jr_define('_OCCUPANCIES_NUMBER_OF_GUESTTYPE',"מספר סוג אורח");
jr_define('_OCCUPANCIES_NO_GUESTTYPES',"לא יצרו עדיין סוגי אורחים. אנא צור כמה סוגי אורחים לפני שתשתמש בתכונה זו.");

jr_define('_OCCUPANCIES_EDIT',"ערוך תפוסה מינימלית עבור ");