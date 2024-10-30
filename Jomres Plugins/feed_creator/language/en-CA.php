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

jr_define('_JRPORTAL_FEED_CREATOR_TITLE',"RSS Feed");
jr_define('_JRPORTAL_FEED_CREATOR_INSTRUCTIONS',"This plugin creates a feed from all jomres propertys. Currently RSS 1.0 and RSS 2.0 syndication formats are supported.");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDNAME',"Feed name");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDDESC',"Feed description");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFILENAME',"Feed filename (no spaces)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDFORMAT',"Syndication format");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDCACHETIME',"Cache time (in seconds)");
jr_define('_JRPORTAL_FEED_CREATOR_HFEEDIMAGEURL',"Feed image URL");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESC',"Truncate property description?");
jr_define('_JRPORTAL_FEED_CREATOR_HTRUNCATEDESCSIZE',"Truncate after (chars)");
jr_define('_JRPORTAL_FEED_CREATOR_HSHOWFEEDIMAGE',"Show feed image?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYIMAGE',"Show property image?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYTOWN',"Show property town?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYREGION',"Show property region?");
jr_define('_JRPORTAL_FEED_CREATOR_HPROPERTYCOUNTRY',"Show property country?");
jr_define('_JRPORTAL_FEED_CREATOR_HITEMS',"Limit number of syndicated propertys to");