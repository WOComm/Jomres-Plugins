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

class j06005list_conversations
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
		$eLiveSite = get_showtime('eLiveSite');
		$this->retVals = '';

		if (jomres_bootstrap_version() != "5") {
			return;
		}

		$use_messaging_system = get_showtime('use_messaging_system') ;
		if ($use_messaging_system == "0" ) {
			return;
		}

		if (isset($componentArgs[ 'output_now' ])) {
			$output_now = $componentArgs[ 'output_now' ];
		} else {
			$output_now = true;
		}

		if (get_showtime('task' == 'list_conversations')) {
			jomres_cmsspecific_setmetadata('title', jomres_purify_html( jr_gettext('CONVERSATIONS', 'CONVERSATIONS', false) ));
		}

		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		jr_import('jomres_call_api');
		$jomres_call_api = new jomres_call_api( $thisJRUser->id , $thisJRUser->params["messaging_api_token"] );
		try {
			$response = $jomres_call_api->send_request("GET" , "messaging/all_groups/");
		}
		catch (Exception $e) {
			throw new Exception('Error: invalid response from local API, received '.$e->getMessage() );
		}

		$messages_by_group = $this->object_to_array($response->data->response);

		$unread_only = false;

		$rows = array();
		if (!empty($messages_by_group["messages_by_group"])) {
			foreach ($messages_by_group["messages_by_group"] as $group ) {
				$r=array();

				$r['GROUP_ID'] = $group['group']['group_id'];
				$r['GROUP_NAME'] = $group['group']['group_name'];
				$r['UNREAD_COUNT'] = $group['group']['unread_count'];
				$last_key = array_key_last($group['messages']);
				$r['LAST_MESSAGE'] = $group['messages'][$last_key]["message_body"];

				$r['BADGE_CLASS'] = 'bg-secondary';
				if ( isset($r['UNREAD_COUNT'] ) && $r['UNREAD_COUNT'] > 0 ) {
					$r['BADGE_CLASS'] = 'bg-danger';
				}

				if ($unread_only == true && $group['group']['unread_count'] > 0 ) {
					$rows[]=$r;
				} elseif ($unread_only == false ) {
					$rows[]=$r;
				}
			}

			$pageoutput = array();
			$output = array();

			$output['ELIVESITE']								=  $eLiveSite;
			$output['CONVERSATIONS'] = jr_gettext( 'CONVERSATIONS' , 'CONVERSATIONS' , false);
			$output['CONVERSATION_NAME'] = jr_gettext( 'CONVERSATION_NAME' , 'CONVERSATION_NAME' , false);
			$output['CONVERSATION_GROUP_ID'] = jr_gettext( 'CONVERSATION_GROUP_ID' , 'CONVERSATION_GROUP_ID' , false);
			$output['CONVERSATION_LEAVE_GROUP'] = jr_gettext( 'CONVERSATION_LEAVE_GROUP' , 'CONVERSATION_LEAVE_GROUP' , false);

			$output['CONVERSATION_UNREAD_MESSAGES'] = jr_gettext( 'CONVERSATION_UNDREAD_MESSAGES' , 'CONVERSATION_UNDREAD_MESSAGES' , false);
			$output['CONVERSATION_LAST_MESSAGE'] = jr_gettext( 'CONVERSATION_LAST_MESSAGE' , 'CONVERSATION_LAST_MESSAGE' , false);

			$output['LIST_CONVERSATIONS_INFO'] = jr_gettext( 'LIST_CONVERSATIONS_INFO' , 'LIST_CONVERSATIONS_INFO' , false);

			$output['AJAX_URL'] = JOMRES_SITEPAGE_URL_AJAX.'&task=list_conversations_ajax';

			if (isset($componentArgs['no_datatables']) && $componentArgs['no_datatables'] == true ) { // Allows the widget to call a no-datatables version of the list conversations template file
				$template = 'list_conversations_no_datatables.html';
			} else {
				$template = 'list_conversations.html';
			}


			$pageoutput[ ] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput($template);
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('rows', $rows);
			$template = $tmpl->getParsedTemplate();
		} else {
			$pageoutput = array();
			$output = array();

			if ($thisJRUser->userIsManager) {
				$output['CONVERSATIONS_NO_CONVERSATIONS'] = jr_gettext( 'CONVERSATIONS_NO_CONVERSATIONS_MANAGER' , 'CONVERSATIONS_NO_CONVERSATIONS_MANAGER' , false);
			} else {
				$output['CONVERSATIONS_NO_CONVERSATIONS'] = jr_gettext( 'CONVERSATIONS_NO_CONVERSATIONS_GUEST' , 'CONVERSATIONS_NO_CONVERSATIONS_GUEST' , false);
			}

			$pageoutput[ ] = $output;
			$tmpl = new patTemplate();
			$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput('conversations_no_conversations.html');
			$tmpl->addRows('pageoutput', $pageoutput);
			$tmpl->addRows('rows', $rows);
			$template = $tmpl->getParsedTemplate();
		}
		if ($output_now) {
			echo $template ;
		} else {
			$this->retVals = $template;
		}

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
