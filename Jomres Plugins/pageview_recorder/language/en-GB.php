<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2011 Aladar Barthi
**/
##################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
##################################################################

jr_define('_PAGEVIEW_RECORDER_ENABLED',"Log all page views to db?");
jr_define('_PAGEVIEW_RECORDER_DESC',"If enabled, all page views will be logged to database. WARNING! The database page views table may become very big in a very short amount of time! Use with care.");
