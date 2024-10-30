<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000feed_creator {
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$property_uid = getDefaultProperty();
		
		$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
        $jrConfig = $siteConfig->get();

		if ($jrConfig[ 'feed_enabled' ] != '1') {
			return;
		}
		
		//check if feeds temp dir exists and is writable
		if (!is_dir(JOMRES_TEMP_ABSPATH.'feeds'.JRDS)) {
			if (!@mkdir(JOMRES_TEMP_ABSPATH.'feeds'.JRDS)) {
				echo 'Error, unable to make folder '.JOMRES_TEMP_ABSPATH.'feeds'.JRDS." automatically therefore cannot save feeds. Please create the folder manually and ensure that it's writable by the web server";
				exit;
			}
		}
		
		$customTextObj = jomres_singleton_abstract::getInstance('custom_text');

		$output = array();
		
		$feedFormatsArray = array('1'=>"RSS1.0",'2'=>"RSS2.0");
		$feed_filename = $jrConfig[ 'feed_feedfilename' ].'_'.get_showtime('lang').'.xml';
		
		if (
			!file_exists(JOMRES_TEMP_ABSPATH.'feeds'.JRDS.$feed_filename) OR 
			((file_exists(JOMRES_TEMP_ABSPATH.'feeds'.JRDS.$feed_filename) AND 
			(time()-filemtime(JOMRES_TEMP_ABSPATH.'feeds'.JRDS.$feed_filename) > (int)$jrConfig[ 'feed_feedcachetime' ])))
			) 
			{
			require_once("feedcreator.class.php");
			// your local timezone, set to "" to disable or for GMT
			define("TIME_ZONE","");
			
			//Version string
			define("FEEDCREATOR_VERSION", "Jomres Online Booking System for Joomla and WordPress - https://www.jomres.net/");
		
			$rss = new UniversalFeedCreator();
			$rss->title = $jrConfig[ 'feed_feedname' ]; 
			$rss->description = $jrConfig[ 'feed_feeddesc' ];
			$rss->link = get_showtime('live_site');
			$rss->language = get_showtime('lang');
			$rss->syndicationURL = get_showtime('live_site');
			
			if ($jrConfig[ 'feed_showfeedimage' ] == '1') 
				{
				$image = new FeedImage(); 
				$image->title = $jrConfig[ 'feed_feedname' ]; 
				$image->url = get_showtime('live_site').'/'.$jrConfig[ 'feed_feedimageurl' ]; 
				$image->link = get_showtime('live_site'); 
				$image->description = $jrConfig[ 'feed_feeddesc' ];
				$rss->image = $image;
				}
			
			$all_published_properties = get_showtime('published_properties_in_system');
			rsort($all_published_properties);
			
			$property_uids = array_slice($all_published_properties, 0, (int)$jrConfig[ 'feed_items' ]);
			
			$current_property_details=jomres_getSingleton('basic_property_details');
			$current_property_details->gather_data_multi($property_uids);
			
			$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
			$jomres_media_centre_images->get_images_multi($property_uids, array('property'));
		
			foreach ($property_uids as $property_uid) 
				{
				set_showtime('property_uid',$property_uid);
				$current_property_details->gather_data($property_uid);

				$propertyDesc = strip_tags($current_property_details->property_description);
				if ($jrConfig[ 'feed_truncatedesc' ] == '1')
					$propertyDesc = $this->truncateText($propertyDesc, (int)$jrConfig[ 'feed_truncatedescsize' ]);
				
				$jomres_media_centre_images->get_images($property_uid, array('property'));
				$propertyImage = $jomres_media_centre_images->images ['property'][0][0]['small'];
			
				//build feed item
				$item = new FeedItem(); 
				$item->title = $current_property_details->property_name;
				
				if ($jrConfig[ 'feed_showpropertytown' ] == '1')
					$item->title .= ' - '.$current_property_details->property_town;
				
				if ($jrConfig[ 'feed_showpropertyregion' ] == '1')
					$item->title .= ' - '.$current_property_details->property_region;
				
				if ($jrConfig[ 'feed_showpropertycountry' ] == '1')
					$item->title .= ' - '.$current_property_details->property_country;
				
				$item->link = get_property_details_url($property_uid,'nosef');
				
				if ($jrConfig[ 'feed_showpropertyimage' ] == '1')
					$item->description = '<img src="'.$propertyImage.'" title="'.$current_property_details->property_name.'" alt="'.$current_property_details->property_name.'" align="left" hspace="5" border="0" />'.$propertyDesc;
				else
					$item->description = $propertyDesc;
				
				$item->descriptionHtmlSyndicated = true;
				//$item->date = strtotime($property->feed_timestamp);
				$rss->addItem($item); 
				} 
			// Save feed
			$rss->saveFeed($feedFormatsArray[$jrConfig[ 'feed_feedformat' ]], JOMRES_TEMP_ABSPATH.'feeds'.JRDS.$feed_filename, true);
			}
		else
			{
			echo file_get_contents(JOMRES_TEMP_ABSPATH.'feeds'.JRDS.$feed_filename,'rb');
			}
		}
	
	//Truncates a string to a certain length at the most sensible point
	function truncateText($string, $length) {
		if (strlen($string)<=$length) {
			return $string;
			}
		$pos = strrpos($string,".");
		if ($pos>=$length-4) {
			$string = substr($string,0,$length-4);
			$pos = strrpos($string,".");
			}
		if ($pos>=$length*0.4) {
			return substr($string,0,$pos+1)." ...";
			}
		$pos = strrpos($string," ");
		if ($pos>=$length-4) {
			$string = substr($string,0,$length-4);
			$pos = strrpos($string," ");
			}
		if ($pos>=$length*0.4) {
			return substr($string,0,$pos)." ...";
			}
		return substr($string,0,$length-4)." ...";
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
