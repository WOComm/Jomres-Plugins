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
#[AllowDynamicProperties]
class j16000rest_api_access_tokens
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			$this->template_touchable = false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');

		$toolbar = jomres_singleton_abstract::getInstance('jomresItemToolbar');
		jr_import("jomres_oauth_scopes");
		$scopes_class = new jomres_oauth_scopes($ePointFilepath);
		$all_available_scopes = array();
		foreach ($scopes_class->default_scopes as $category => $category_scopes) {
			foreach ($category_scopes as $scope) {
				$all_available_scopes[$scope->scope] = jr_gettext($scope->definition, $scope->definition, false);
			}
		}

		$cms_users = jomres_cmsspecific_find_cms_users();

		$query = "SELECT access_token,client_id,user_id,expires,scope FROM #__jomres_oauth_access_tokens";
		$tokens_list = doSelectSql($query);
		$tokens = array();
		if (count($tokens_list)>0) {
			foreach ($tokens_list as $token) {
				$tokens[$token->user_id][$token->scope][$token->client_id] = array ('access_token' => $token->access_token , 'client_id' => $token->client_id , 'user_id' => $token->user_id , 'expires' => $token->expires );
			}
		}

		$query = "SELECT client_id,client_secret,scope,identifier,user_id FROM #__jomres_oauth_clients ORDER BY `user_id` ASC";
		$clients_list = doSelectSql($query);

		$rows = array();

		if (count($clients_list)>0) {
			foreach ($clients_list as $client) {
				if ($client->user_id>0) {
					$r=array();
					$r['ACCESS_TOKEN']= '';
					$r['EXPIRES']= '';

					if (isset($tokens[$client->user_id][$client->scope][$client->client_id])) {
						$r['ACCESS_TOKEN']=$tokens[$client->user_id][$client->scope][$client->client_id]['access_token'];
						$r['EXPIRES']=$tokens[$client->user_id][$client->scope][$client->client_id]['expires'];
					}


					$r['USER_ID']=$client->user_id;

					if (isset($cms_users[$client->user_id])) {
						$r['USER_NAME'] = $cms_users[$client->user_id]['username'];
					} else {
						if ( (string)$client->user_id == '999999999' ) {
							$r['USER_NAME'] = 'SYSTEM';
						} else {
							$r['USER_NAME'] = '';
						}
					}


					$r['CLIENT_ID']=$client->client_id;
					$r['CLIENT_SECRET']=$client->client_secret;
					$r['IDENTIFIER']=$client->identifier;
					$r['SCOPE']= '';
					if (trim($client->scope) != "") {
						$bang= explode(",", $client->scope);
						foreach ($bang as $scope_definition) {
							if (isset($all_available_scopes[$scope_definition])) {
								$r['SCOPE'] .= $all_available_scopes[$scope_definition].", ";
							}
						}
					}
					$r['SCOPE'] = rtrim(trim($r['SCOPE']), ",");
					/*$toolbar->newToolbar();
					$toolbar->addItem('fa fa-pencil-square-o', 'btn btn-info', '', jomresURL(JOMRES_SITEPAGE_URL .'&task=oauth_edit_client&client_id='.$r['CLIENT_ID']), jr_gettext('COMMON_VIEW', 'COMMON_VIEW', false));
					$toolbar->addSecondaryItem('fa fa-trash', '', '', jomresURL(JOMRES_SITEPAGE_URL.'&task=delete_client&client_id='.$r['CLIENT_ID']), jr_gettext('COMMON_DELETE', 'COMMON_DELETE', false));
					$r['EDITLINK']=$toolbar->getToolbar();*/

					$rows[]=$r;
				}

			}
		}
			jr_define('', "Identifier");
			jr_define('', "Client ID");
			jr_define('', "Secret");
			jr_define('_OAUTH_CREATED', "Created/Updated App");
			jr_define('_OAUTH_CLIENT_ID_INFO', "The Client ID and Secret are created for you. The Identifier is so that you can easily identify this key pair.");
			jr_define('', "Permissions ( what the client can do ) ");
			jr_define('', "User permissions");
			jr_define('_OAUTH_SCOPE_CATEGORY_PROPERTIES', "Property permissions");

		$pageoutput = array();
		$output = array (
			'PAGETITLE' => jr_gettext('REST_API_ACCESS_TOKENS_MENU_OPTION', 'REST_API_ACCESS_TOKENS_MENU_OPTION', false),
			'INFO' => jr_gettext('REST_API_ACCESS_TOKENS_INFO', 'REST_API_ACCESS_TOKENS_INFO', false),


		);
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput('list_rest_api_access_tokens.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->addRows('rows', $rows);
		$tmpl->displayParsedTemplate();

		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

