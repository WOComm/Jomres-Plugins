<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j09000feed_creator {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

		if ($jrConfig[ 'feed_enabled' ] != '1') {
			return;
		}
		
		$output=array();
		
		$feedFormatsArray = array('1'=>"RSS1.0",'2'=>"RSS2.0");
		
		$output['FEEDS']='<a href="'.jomresURL(JOMRES_SITEPAGE_URL_AJAX."&task=feed_creator&lang=".get_showtime('lang')).'" title="'.$feedFormatsArray[$jrConfig[ 'feed_feedformat' ]].' Feed"><img src="'.get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/core-plugins/feed_creator/images/feed-icon.png" alt="'.$jrConfig[ 'feed_feedname' ].'" /></a>';

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'feed_creator.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
