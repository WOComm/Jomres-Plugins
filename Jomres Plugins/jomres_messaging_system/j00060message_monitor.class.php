<?php
	/**
	 * Core file.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	  *  @version Jomres 10.5.4
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
	 *
	 */

	class j00060message_monitor
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
			$ePointFilepath=get_showtime('ePointFilepath');

			$this->ret_vals = '';

			$popup = intval(jomresGetParam($_REQUEST, 'popup', 0));
			if (AJAXCALL || $popup == 1) {
				return;
			}

			if (isset($_REQUEST['no_html'])){
				return;
			}

			if (jomres_bootstrap_version() != "5") {
				return;
			}

			$menuoff = get_showtime('menuoff');
			if ($menuoff === true ) {
				return;
			}

			$use_messaging_system = get_showtime('use_messaging_system') ;
			if ($use_messaging_system == "0" ) {
				return;
			}

			$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

/*			if ( get_showtime('task' ) == 'list_conversations' || get_showtime('task' ) == 'conversation' ) {
				return;
			}*/

			if ( get_showtime('task' ) == 'conversation' ) {
				return;
			}

			if ($use_messaging_system == 1 && $thisJRUser->userIsRegistered ) {
				$pageoutput = array();
				$output = array();

				jr_import('jomres_call_api');
				$jomres_call_api = new jomres_call_api( $thisJRUser->id , $thisJRUser->params["messaging_api_token"] );

				$output['TOKEN'] = $thisJRUser->params["messaging_api_token"];
				$output['API_URL']								= get_showtime('live_site').'/'.JOMRES_ROOT_DIRECTORY.'/api/';

				$output[ 'CONVERSATION_MODAL_TITLE' ] = jr_gettext('CONVERSATION_MODAL_TITLE', 'CONVERSATION_MODAL_TITLE', false);
				$output[ 'CONVERSATION_MODAL_NUDGE' ] = jr_gettext('CONVERSATION_MODAL_NUDGE', 'CONVERSATION_MODAL_NUDGE', false);
				$output[ 'CONVERSATION_MODAL_GO' ] = jr_gettext('CONVERSATION_MODAL_GO', 'CONVERSATION_MODAL_GO', false);


				$pageoutput[ ] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput('message_monitor.html');
				$tmpl->addRows('pageoutput', $pageoutput);
				$tmpl->displayParsedTemplate();
			}
		}

		/**
		 * Must be included in every mini-component.
		#
		 * Returns any settings that the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
		 */

		public function getRetVals()
		{
			return $this->ret_vals;
		}
	}
