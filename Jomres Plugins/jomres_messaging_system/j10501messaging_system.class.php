<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 * @version Jomres 9.8.29
	 *
	 * @copyright	2005-2017 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
	defined('_JOMRES_INITCHECK') or die('');
// ################################################################

	class j10501messaging_system
	{
		public function __construct($componentArgs)
		{
			// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
			$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
			if ($MiniComponents->template_touch) {
				$this->template_touchable = false;

				return;
			}

			if (jomres_bootstrap_version() != "5") {
				return;
			}

			$use_messaging_system = get_showtime('use_messaging_system') ;
			if ($use_messaging_system == "0" ) {
				return;
			}

			$siteConfig = jomres_singleton_abstract::getInstance('jomres_config_site_singleton');
			$jrConfig = $siteConfig->get();

			if (!isset($jrConfig[ 'joomla_login_module_id' ])) {
				$jrConfig[ 'joomla_login_module_id' ] = 0;
			}

			$configurationPanel = $componentArgs[ 'configurationPanel' ];

			$configurationPanel->startPanel(jr_gettext('MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE', 'MESSAGING_SYSTEM_SITE_CONFIG_TAB_TITLE', false));

			if (!this_cms_is_joomla()) {

				if ( !isset($jrConfig[ 'wordpress_login_shortcode' ]) || $jrConfig[ 'wordpress_login_shortcode' ] == '') {
					$jrConfig[ 'wordpress_login_shortcode' ] = jomres_login_form_shortcode([]);
				}

				$configurationPanel->setleft(jr_gettext('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE', 'MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE', false));
				$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_wordpress_login_shortcode" value="'.$jrConfig[ 'wordpress_login_shortcode' ].'" />');
				$configurationPanel->setright(jr_gettext('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC', 'MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_WIDGET_SHORTCODE_DESC', false));
				$configurationPanel->insertSetting();
			} ELSE {

				if ( !isset($jrConfig[ 'joomla_login_module_id' ]) || $jrConfig[ 'joomla_login_module_id' ] == '') {
					$jrConfig[ 'joomla_login_module_id' ] = '0';
				}

				$configurationPanel->setleft(jr_gettext('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID', 'MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_ID', false));
				$configurationPanel->setmiddle('<input type="text" class="input-large" name="cfg_joomla_login_module_id" value="'.$jrConfig[ 'joomla_login_module_id' ].'" />');
				$configurationPanel->setright(jr_gettext('MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC', 'MESSAGING_SYSTEM_SITE_CONFIG_LOGIN_MODULE_DESC', false));
				$configurationPanel->insertSetting();
			}




			$configurationPanel->endPanel();
		}

		// This must be included in every Event/Mini-component
		public function getRetVals()
		{
			return null;
		}
	}
