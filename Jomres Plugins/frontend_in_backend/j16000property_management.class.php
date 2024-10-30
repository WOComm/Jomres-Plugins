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

class j16000property_management
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$thisJRUser=jomres_getSingleton('jr_user');
		if (!$thisJRUser->superPropertyManager)
			{
			echo "Sorry, the user you are logged in as must be a Super Property Manager in the frontend for you to be able to administer properties in the administrator area";
			return;
			}
		
		$homepage = '';

		try 
			{
			$url = JOMRES_SITEPAGE_URL_NOSEF.'&tmpl='.get_showtime('tmplcomponent').'&is_wrapped=1';

			$client = new GuzzleHttp\Client();

			logging::log_message('Starting guzzle call to ', 'Guzzle', 'DEBUG');
			
			$homepage = $client->request('GET', $url)->getBody()->getContents();
			}
		catch (Exception $e) 
			{
			$jomres_user_feedback = jomres_singleton_abstract::getInstance('jomres_user_feedback');
			$jomres_user_feedback->construct_message(array('message'=>'Could not load Jomres frontend', 'css_class'=>'alert-danger alert-error'));
			}

		echo '
		<div class="modal modal-lg hide fade" id="frontend_in_backend">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Jomres Frontend Manager Control Panel</h4>
			</div>
			<div class="modal-body">
				<iframe name="jomres_home" src="'.JOMRES_SITEPAGE_URL_NOSEF.'&tmpl='.get_showtime("tmplcomponent").'&is_wrapped=1" TITLE="" width="100%" height="650" scrolling="yes" frameborder="0"></iframe>
			</div>
		</div>
		';

		echo '<script>jomresJquery(document).ready(function () {jomresJquery( "#frontend_in_backend" ).modal()});</script>
';
		}

	
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}	
	}
