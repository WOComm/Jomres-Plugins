<?php
	/**
	 * Jomres CMS Agnostic Plugin
	 * @author Woollyinwales IT <sales@jomres.net>
	 * @version Jomres 9
	 * @package Jomres
	 * @copyright	2005-2015 Woollyinwales IT
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project.
	 **/

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

	class j06000show_property_weather
	{
		function __construct( $componentArgs )
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
			if ( $MiniComponents->template_touch )
			{
				$this->template_touchable = false;
				$this->shortcode_data = array (
					"task" => "show_property_weather",
					"info" => "_CURRENT_WEATHER",
					"arguments" => array ( 0 =>
						array (
							"argument" => "property_uid",
							"arg_info" => "_JRPORTAL_LISTBOOKINGS_HEADER_PROPERTY_ID",
							"arg_example" => "1",
						)
					)
				);
				return;
			}

			$this->retVals = '';

			$this->eLiveSite = get_showtime('eLiveSite');
			$this->ePointFilepath = get_showtime('ePointFilepath');

			if ( isset($componentArgs[ 'property_uid' ]) )
				$this->property_uid = $componentArgs[ 'property_uid' ];
			else
			{
				$this->property_uid = (int)jomresGetParam( $_REQUEST, 'property_uid', 0 );

				if ($this->property_uid == 0)
				{
					$this->property_uid = get_showtime('property_uid');
				}
			}

			if ( $this->property_uid == 0 )
				return;

			$output_now = true;
			if (isset($componentArgs[ 'output_now' ]))
				$output_now = (bool)$componentArgs[ 'output_now' ];

			$template = $this->get_cache_file();

			if ( $output_now )
				echo $template;
			else
				$this->retVals = $template;
		}


		/*
		["weather"]=>
			array(1) {
			  [0]=>
			  object(stdClass)#4473 (4) {
				["id"]=>
				int(800)
				["main"]=>
				string(5) "Clear"
				["description"]=>
				string(12) "sky is clear"
				["icon"]=>
				string(3) "01d"
			  }
			}
		*/

		function get_weather_live()
		{
			$siteConfig	= jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig = $siteConfig->get();

			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$current_property_details -> gather_data( $this->property_uid );

			$APIKEY = '';
			$rows = array();

			if (isset($jrConfig['openweather_apikey']) && trim($jrConfig['openweather_apikey']) != '') {
				$APIKEY = trim($jrConfig['openweather_apikey']);
			}

			if ($APIKEY != '')
			{
				$response = '';

				try
				{
					$url = "http://api.openweathermap.org/data/2.5/forecast?lat=".$current_property_details ->lat."&lon=".$current_property_details ->long."&lang=".get_showtime("lang_shortcode")."&APPID=".$APIKEY."&units=metric";

					$client = new GuzzleHttp\Client();

					logging::log_message('Starting guzzle call to '.$url, 'Guzzle', 'DEBUG');

					$response = $client->request('GET', $url)->getBody()->getContents();
				}
				catch (Exception $e)
				{
					// Nested try catches. Ick!
					try
					{
						$url = "http://api.openweathermap.org/data/2.5/forecast/daily?lat=".$current_property_details ->lat."&lon=".$current_property_details ->long."&lang=".get_showtime("lang_shortcode")."&APPID=".$APIKEY."&units=metric";

						$client = new GuzzleHttp\Client();

						logging::log_message('Starting guzzle call to '.$url, 'Guzzle', 'DEBUG');

						$response = $client->request('GET', $url)->getBody()->getContents();
					}
					catch (Exception $e)
					{
						$jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
						$jomres_user_feedback->construct_message(array('message'=>'Could not get weather data', 'css_class'=>'alert-danger alert-error'));
					}
				}

				$forecast = json_decode($response);

				$image_path = $this->eLiveSite.'images/';

				if (isset($forecast->list)){
					$weather = $forecast->list;

					foreach ( $weather as $w)
					{
						$output=array();
						$pageoutput=array();

						if (isset($w->temp)) {
							$output['MAX_TEMP']=(int)$w->temp->max;
							$output['MIN_TEMP']=(int)$w->temp->min;
						} else {
							$output['MAX_TEMP']=(int)$w->main->temp_max;
							$output['MIN_TEMP']=(int)$w->main->temp_min;
						}

						$output['DATETIME']=outputDate ( date("Y-m-d" ,$w->dt) ) ;
						$output['TIME']=date("H:i" ,$w->dt) ;
						$output['WEATHER']=$w->weather[0]->main;
						$output['DESCRIPTION']=$w->weather[0]->description;
						$output['ICON']=$image_path.$w->weather[0]->icon.".png";

						$pageoutput[]=$output;
						$tmpl = new patTemplate();
						$tmpl->addRows( 'pageoutput', $pageoutput );
						$tmpl->setRoot( $this->ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
						$tmpl->readTemplatesFromInput( 'weather_snippet.html' );
						$rows[] = array ( "WEATHER" => $tmpl->getParsedTemplate() );
					}
				}

			}
			else
			{
				return '<p class="alert alert-danger">Weather API key not set, cannot download weather data.</p>';
			}

			if (!empty($rows))
			{
				$output = array();
				$pageoutput = array();

				$output['CITY'] = $forecast->city->name;

				$pageoutput[] = $output;
				$tmpl = new patTemplate();
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->addRows( 'rows', $rows );
				$tmpl->setRoot( $this->ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'show_property_weather.html' );
				return $tmpl->getParsedTemplate();
			}
			else
			{
				return "Error, could not download weather data";
			}
		}

		function get_cache_file()
		{
			$cache_file_path = JOMRES_TEMP_ABSPATH."weather_cache";

			if ( !is_dir( $cache_file_path ) )
			{
				if ( !@mkdir( $cache_file_path ) )
				{
					throw new Exception( "Error, unable to make directory " . $cache_file_path . " automatically therefore cannot write weather cache files. Please create the directory manually and ensure that it's writable by the web server" );
				}
			}

			$this->cache_file = $cache_file_path . JRDS . "weather_".get_showtime("lang_shortcode")."_".$this->property_uid.".html";



			if (file_exists( $this->cache_file ) && time()-filemtime($this->cache_file) < (24 * 3600) ) // If the file exists and it's younger than 24 hours old
				$template = file_get_contents( $this->cache_file );
			else
			{
				$template = $this->get_weather_live();
				file_put_contents( $this->cache_file, $template );
			}

			return $template;
		}

		/*
		 Weather condition codes
		Thunderstorm
		ID 	Meaning 	Icon
		200 	thunderstorm with light rain", "icon"=>"11d.png"),
		201 	thunderstorm with rain", "icon"=>"11d.png"),
		202 	thunderstorm with heavy rain", "icon"=>"11d.png"),
		210 	light thunderstorm", "icon"=>"11d.png"),
		211 	thunderstorm", "icon"=>"11d.png"),
		212 	heavy thunderstorm", "icon"=>"11d.png"),
		221 	ragged thunderstorm", "icon"=>"11d.png"),
		230 	thunderstorm with light drizzle", "icon"=>"11d.png"),
		231 	thunderstorm with drizzle", "icon"=>"11d.png"),
		232 	thunderstorm with heavy drizzle", "icon"=>"11d.png"),
		Drizzle
		ID 	Meaning 	Icon
		300 	light intensity drizzle", "icon"=>"09d.png"),
		301 	drizzle", "icon"=>"09d.png"),
		302 	heavy intensity drizzle", "icon"=>"09d.png"),
		310 	light intensity drizzle rain", "icon"=>"09d.png"),
		311 	drizzle rain", "icon"=>"09d.png"),
		312 	heavy intensity drizzle rain", "icon"=>"09d.png"),
		313 	shower rain and drizzle", "icon"=>"09d.png"),
		314 	heavy shower rain and drizzle", "icon"=>"09d.png"),
		321 	shower drizzle", "icon"=>"09d.png"),
		Rain
		ID 	Meaning 	Icon
		500 	light rain", "icon"=>"10d.png"),
		501 	moderate rain", "icon"=>"10d.png"),
		502 	heavy intensity rain", "icon"=>"10d.png"),
		503 	very heavy rain", "icon"=>"10d.png"),
		504 	extreme rain", "icon"=>"10d.png"),
		511 	freezing rain", "icon"=>"13d.png"),
		520 	light intensity shower rain", "icon"=>"09d.png"),
		521 	shower rain", "icon"=>"09d.png"),
		522 	heavy intensity shower rain", "icon"=>"09d.png"),
		531 	ragged shower rain", "icon"=>"09d.png"),
		Snow
		ID 	Meaning 	Icon
		600 	light snow", "icon"=>"13d.png"),
		601 	snow", "icon"=>"13d.png"),
		602 	heavy snow", "icon"=>"13d.png"),
		611 	sleet", "icon"=>"13d.png"),
		612 	shower sleet", "icon"=>"13d.png"),
		615 	light rain and snow", "icon"=>"13d.png"),
		616 	rain and snow", "icon"=>"13d.png"),
		620 	light shower snow", "icon"=>"13d.png"),
		621 	shower snow", "icon"=>"13d.png"),
		622 	heavy shower snow", "icon"=>"13d.png"),
		Atmosphere
		ID 	Meaning 	Icon
		701 	mist", "icon"=>"50d.png"),
		711 	smoke", "icon"=>"50d.png"),
		721 	haze", "icon"=>"50d.png"),
		731 	sand, dust whirls", "icon"=>"50d.png"),
		741 	fog", "icon"=>"50d.png"),
		751 	sand", "icon"=>"50d.png"),
		761 	dust", "icon"=>"50d.png"),
		762 	volcanic ash", "icon"=>"50d.png"),
		771 	squalls", "icon"=>"50d.png"),
		781 	tornado", "icon"=>"50d.png"),
		Clouds
		ID 	Meaning 	Icon
		800 	clear sky", "icon"=>"01d.png"), [[file:01n.png"),
		801 	few clouds", "icon"=>"02d.png"), [[file:02n.png"),
		802 	scattered clouds", "icon"=>"03d.png"), [[file:03d.png"),
		803 	broken clouds", "icon"=>"04d.png"), [[file:03d.png"),
		804 	overcast clouds", "icon"=>"04d.png"), [[file:04d.png"),
		Extreme
		ID 	Meaning
		900 	tornado
		901 	tropical storm
		902 	hurricane
		903 	cold
		904 	hot
		905 	windy
		906 	hail
		Additional
		ID 	Meaning
		951 	calm
		952 	light breeze
		953 	gentle breeze
		954 	moderate breeze
		955 	fresh breeze
		956 	strong breeze
		957 	high wind, near gale
		958 	gale
		959 	severe gale
		960 	storm
		961 	violent storm
		962 	hurricane
		*/

		// This must be included in every Event/Mini-component
		function getRetVals()
		{
			return $this->retVals;
		}
	}
