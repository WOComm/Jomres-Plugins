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

jr_define('DISALLOW_SYNDICATION_TITLE',"Disallow Syndication");
jr_define('DISALLOW_SYNDICATION_DESCRIPTION','The Jomres.net syndication feature is new functionality designed to share properties between sites although bookings can only be made on the Home server. ');

jr_define('DISALLOW_SYNDICATION_DESCRIPTION_MORE',"The purpose of this is to make it possible for sites to build trust with search engines. It is a free feature, available to all Jomres users. Active Jomres license holders can, if they wish opt to remove their site from the syndication network via this page. Localhost cannot be added to the network, and if for any reason there is a problem with connectivity you will not be able to add your site to the network. Check the REST API connectivity test page if you are in any doubt.");

jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_DISALLOW',"Click this link to remove your site from the network.");
jr_define('DISALLOW_SYNDICATION_INSTRUCTIONS_ALLOW',"Click this link to add your site to the network.");

jr_define('DISALLOW_SYNDICATION_DISALLOW',"Remove this site from the network");
jr_define('DISALLOW_SYNDICATION_ALLOW',"Add this site to the network");

jr_define('DISALLOW_SYNDICATION_INVALID_KEY',"Sorry, your support key is not valid or is not active, you cannot change the syndication status of this installation.");