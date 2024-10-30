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
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################




jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS-feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"Deze plug-in maakt een feed van alle jomres-eigenschappen. Momenteel worden de syndicatie-indelingen RSS 1.0 en RSS 2.0 ondersteund.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feednaam");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Feedbeschrijving");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feedbestandsnaam (geen spaties)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Syndicatie formaat");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Cache-tijd (in seconden)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Feed afbeelding URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Truncate property description?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Truncate na (tekens)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Toon feedafbeelding?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Toon afbeelding van eigendom?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Toon plaats van eigendom?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Toon eigenschapsregio?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Land van eigendom weergeven?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Beperk het aantal gesyndiceerde eigenschappen tot");