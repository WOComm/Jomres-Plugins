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
jr_define ('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITPRICES', "קבע מחירים באופן ידני");
jr_define ('_JOMRES_MICROMANAGE_PICKERDROPDOWN_EDITMINDAYS', "קבע מינימום לילות באופן ידני");
jr_define ('_JOMRES_MICROMANAGE_PICKER_SETMINDAYS', "קבע מינימום לילות");

jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_DOW', "קבע מחיר ללילה לפי יום בשבוע");
jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_RATES', "קבע מחיר ללילה לפי טווח תאריכים");
jr_define ('_JOMRES_MICROMANAGE_PICKER_TYPE_INTERVAL_MINDAYS', "קבע מינימום לילות לפי טווח תאריכים");

jr_define ('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_RATES', "בוחרי התאריכים וקלט התעריפים מאפשרים לך להגדיר מחיר אחד לטווח תאריכים נתון. בחר תאריך התחלה וסיום, הזן מחיר ולחץ על הלחצן הגדר מחיר ללילה.");
jr_define ('_JOMRES_MICROMANAGE_PICKER_INSTRUCTIONS_MINDAYS', "בוחרי התאריכים וקלט הלילות המינימלי מאפשרים לך להגדיר ערך אחד עבור הלילות המינימליים בטווח תאריכים נתון. בחר תאריך התחלה וסיום, הזן מספר עבור הלילות המינימליות ולחץ על 'הגדר מינימום לילות '. ");

jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO', "השתמש בתפריט הנפתח הזה כדי לשנות בין קביעת מחירים לתאריכים בודדים, לקביעת לילות מינימליים לתאריכים בודדים. תוכל להשתמש בבוחר לפי יום בשבוע, בורר טווחי התאריכים או להגדיר את המחירים/לילות מינימום לפי עריכה ידנית של התאריכים. ");
jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR_INFO_SMALL_VIEWPORT', "השתמש בתפריט הנפתח הזה כדי לשנות בין קביעת מחירים לתאריכים בודדים, לקביעת לילות מינימליים לתאריכים בודדים. תוכל להשתמש בורר טווחי התאריכים או לקבוע את המחירים/לילות מינימליים על ידי עריכה ידנית של התאריכים.") ;
jr_define ('_JOMRES_MICROMANAGE_PICKERS_SELECTOR', "קבע מחירים או מינימום לילות");

jr_define ('_JOMRES_MICROMANAGE_PICKER_BYDOW', "קבע מינימום לילות לפי יום בשבוע");
jr_define ('_JOMRES_MICROMANAGE_PICKER_BYDOW_INFO', "שדות יום בשבוע מאפשרים לך להגדיר מספר לילות מינימלי ליום נתון בשבוע, לאחר שתלחץ על כפתור יום השבוע כל ימות השבוע יוגדרו להגדרת הלילות הדקה. ");


jr_define ('_JOMRES_MICROMANAGE_MANUALLY', "מחירים ידניים/לילות מינימליים");
jr_define ('_JOMRES_MICROMANAGE_SET_PRICES', "קבע מחירים");
jr_define ('_JOMRES_MICROMANAGE_SET_MINDAYS', "קבע מינימום לילות");

jr_define ('_JOMRES_MICROMANAGE_PRICE', "לכל לילה");
jr_define ('_JOMRES_MICROMANAGE_MINDAYS', "דקות לילות");
jr_define ('_JOMRES_MICROMANAGE_MAXDAYS', "מקסימום לילות");

jr_define ('_JOMRES_MICROMANAGE_INTRO', "כאן תוכל ליצור תעריפים המשויכים לסוגי החדרים שיש לך בנכס שלך.");

jr_define ('_JOMRES_MICROMANAGE_BASIC_SETTINGS', "האפשרויות הנפוצות ביותר");

jr_define ('_JOMRES_MICROMANAGE_MODAL_BUTTON', "הוראות");

jr_define ('_JOMRES_MICROMANAGE_MULTIPLE_TARIFFS', "אם ברצונך להוסיף מחירים שונים למספר אורחים אחר, תוכל ליצור יותר ממספר תעריפים עבור כל סוג חדר ולהעריך ערכי מינימום/מקסימום אורחים בתעריפים אלה.");

jr_define ('_JOMRES_MICROMANAGE_INFO', "תן שם לתעריף, הגדר את מספר הלילות המרבי ואת המספר המינימלי והמקסימלי של האורחים הנדרשים בטופס ההזמנה לפני הצעת התעריף. השתמש בלוח בוחרי התאריכים כדי להוסיף מחירים הגדרות לילות מינימום לטווח תאריכים, או ערוך את התשומות ישירות. אם אינך רוצה שתעריף יציע כלל בתאריכים מסוימים, השאר את המחיר על 0 (אפס) בתאריכים אלה. תוכל לקבל מינימום שונה לילות בתאריכים שונים, כך שאם אתה רוצה הזמנות ארוכות יותר במהלך שבועות פסטיבל/ועידה אז תוכל להגדיר את מינימום הלילות להיות גבוהים יותר רק בתקופות אלה. הכרטיסייה תצורה> תעריפים ומטבע, ולאחר מכן צור את סוגי האורחים הדרושים לך בהגדרות> סוגי אורחים. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS', "הפעל/השבת את קלט הכוכבים בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות מורכבות של חיפוש Ajax בתצורת האתר ללא, אז לא תהיה הגדרת asc_by_stars ברשימת הארגומנטים. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE', "הפעל/השבת את קלט הכוכבים בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות מורכבות של חיפוש Ajax בתצורת האתר ללא, אז לא תהיה הגדרת asc_by_price ברשימת הארגומנטים. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES', "הפעל/השבת את קלט תכונות המאפיין בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות חיפוש מורכבות של Ajax בתצורת האתר ללא אין ההגדרה asc_by_features לא תהיה לאפקטוריות של רשימות asc_by_features . ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY', "אפשר/השבת את קלט הארץ בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות חיפוש מורכבות של Ajax בתצורת האתר ללא אין הגדרה של asc_by_country לא תהיה ברשימה. ");
jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION', "הפעל/השבת את קלט האזור בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות חיפוש של Ajax בתצורת האתר ל- No, לא תהיה הגדרת asc_by_region ברשימת הארגומנטים. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN', "הפעל/השבת את קלט העיירה בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות חיפוש של Ajax בתצורת האתר ל- No, לא תהיה הגדרת asc_by_town ברשימת הארגומנטים. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE', "אפשר/השבת את קלט סוג החדר בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות חיפוש מורכבות של Ajax בתצורת האתר ללא, אז לא תהיה הגדרת asc_by_room . ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE', "הפעל/השבת את קלט סוג המאפיין בטופס. שים לב שאם הגדרת אפשרות באמצעות הכרטיסייה הגדרות חיפוש Ajax בתצורת אתרים ללא אין הגדרת ascpby_. ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER', "הפעל/השבת את קלט מספרי האורחים בטופס. שים לב שאם הגדרת אפשרות באמצעות הכרטיסייה הגדרות חיפוש של Ajax בתצורת האתר ל- No, לא תהיה הגדרת asc_by_guestber . ");

jr_define ('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE', "הפעל/השבת את קלט התאריך בטופס. שים לב שאם הגדרת אפשרות דרך הכרטיסייה הגדרות מורכבות של חיפוש Ajax בתצורת האתר ללא, אז לא תהיה הגדרת asc_by_date ברשימת הארגומנטים. ");
