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

class j06005leave_conversation_group
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
		$this->retVals = '';

		if (jomres_bootstrap_version() != "5") {
			return;
		}

		$use_messaging_system = get_showtime('use_messaging_system') ;
		if ($use_messaging_system == "0" ) {
			return;
		}

		jomres_cmsspecific_setmetadata('title', jomres_purify_html( jr_gettext('CONVERSATIONS', 'CONVERSATIONS', false) ));

		if (!isset($_REQUEST['group_id'])) {
			return;
		}

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api( $thisJRUser->id , $thisJRUser->params["messaging_api_token"] );
		try {
			$response = $jomres_call_api->send_request("PUT" , "messaging/leave_group/".(int)$_REQUEST['group_id']);
		}
		catch (Exception $e) {
			//throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL.'&task=list_conversations'), '');

	}

	private function object_to_array($data)
	{
		if (is_array($data) || is_object($data))
		{
			$result = [];
			foreach ($data as $key => $value)
			{
				$result[$key] = (is_array($value) || is_object($value)) ? $this->object_to_array($value) : $value;
			}
			return $result;
		}
		return $data;
	}

	public function getRetVals()
	{
		return $this->retVals;
	}
}
