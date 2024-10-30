<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * * @version Jomres 10.1.2
	 *
	 * @copyright	2005-2022 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	/**
	 * @package Jomres\Core\Minicomponents
	 *
	 * Produces slideshows designed to be used on a landing page
	 *
	 */

	class j06000bs5_hero_slider
	{
		/**
		 *
		 * Constructor
		 *
		 * Main functionality of the Minicomponent
		 *
		 *
		 *
		 */

		public function __construct($componentArgs)
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;
				return;
			}

			$ePointFilepath = get_showtime('ePointFilepath');
			$eLiveSite = get_showtime('eLiveSite');

			$this->retVals = '';

			$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');

			//jomres_cmsspecific_addheaddata('css', $eLiveSite.'/flag-icons-main/css/', 'flag-icons.min.css');

			if (isset($componentArgs[ 'output_now' ])) {
				$output_now = $componentArgs[ 'output_now' ];
			} else {
				$output_now = true;
			}

			if (isset($componentArgs[ 'property_uids' ])) {
				$property_uids = [ $componentArgs[ 'property_uids' ] ];
			} else {
				$property_uids_str = jomresGetParam($_REQUEST, 'property_uids', '');
				$property_uids_arr = explode(  "," , $property_uids_str );
				$property_uids = array();
				if (!empty($property_uids_arr)) {
					foreach ($property_uids_arr as $property_uid) {
						if ($property_uid>0) {
							$property_uids[] = (int)$property_uid;
						}
					}
				}

				if ( empty($property_uids) ) {
					if ( $MiniComponents->eventSpecificlyExistsCheck('00005',"featured_listings") ) {
						$query = "SELECT `property_uid`,`order` FROM #__jomresportal_featured_properties ORDER BY `order`";
						$result = doSelectSQL($query);

						if ( !empty($result) )
						{
							foreach ($result as $r)
							{
								$property_uids[] = (int)$r->property_uid;
							}
						}
					}
				}
			}

			if (isset($componentArgs[ 'slideshow_interval' ])) {
				$slideshow_interval = $componentArgs[ 'slideshow_interval' ];
			} else {
				$slideshow_interval= (int)jomresGetParam($_REQUEST, 'slideshow_interval', 0);
			}

			if ($slideshow_interval == 0) {
				$slideshow_interval = 5000;
			}

			$old_zindex_setting = get_showtime('calendar_z_index' );
			if (is_null($old_zindex_setting) || $old_zindex_setting == '') {
				$old_zindex_setting = 0;
			}
			set_showtime('calendar_z_index' , '1044' );

			$override_path = '';
			if (this_cms_is_joomla()) {
				$app = JFactory::getApplication();
				$joomla_templateName = $app->getTemplate('template')->template;
				if (file_exists( JOMRESCONFIG_ABSOLUTE_PATH . "templates" .JRDS. $joomla_templateName .JRDS . 'html' . JRDS . 'bootstrap_5_hero_slider' . JRDS . 'index.html')) {
					$override_path = JOMRESCONFIG_ABSOLUTE_PATH . "templates" .JRDS. $joomla_templateName .JRDS . 'html' . JRDS . 'bootstrap_5_hero_slider';
				}

			} else {
				if (file_exists( JOMRESCONFIG_ABSOLUTE_PATH . "templates" .JRDS. get_theme_file_path() .JRDS . 'html' . JRDS . 'bootstrap_5_hero_slider' . JRDS . 'index.html')) {
					$override_path = JOMRESCONFIG_ABSOLUTE_PATH . "templates" .JRDS. get_theme_file_path() .JRDS . 'html' . JRDS . 'bootstrap_5_hero_slider';
				}
			}

			if ($override_path != '') {
				$template_path = $override_path;
			} else {
				$template_path = $ePointFilepath.'templates'.JRDS.'bootstrap5';
			}

			$search_form =  $MiniComponents->specificEvent('06000', 'search', [ 'templateFilePath' => $template_path , 'templateFile' => 'index.html'  , 'includedInModule' => true]);

			set_showtime('calendar_z_index' , $old_zindex_setting );


			$this->retVals = $MiniComponents->specificEvent('01061', 'hero_slideshow', [ 'property_uids' => $property_uids , 'search_form' => $search_form , 'slideshow_interval' => $slideshow_interval ]);

			if ($output_now) {
				echo $this->retVals ["slideshow"];
			}
		}


		public function getRetVals()
		{
			return $this->retVals;
		}
	}


