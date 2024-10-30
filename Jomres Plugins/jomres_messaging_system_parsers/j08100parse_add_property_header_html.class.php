<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 *  @version Jomres 10.5.3
 *
 * @copyright	2005-2022 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################
	


class j08100parse_add_property_header_html
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
	 
	public function __construct()
	{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) {
			$this->template_touchable = false;

			return;
		}

		$jms_message_message_body = get_showtime('jms_message_message_body');

		if (is_null($jms_message_message_body) || $jms_message_message_body == '' ) {
			return;
		}

		$regex = '/{property_uid\s*.*?}/i';

		// find all instances of mambot and put in $matches
		preg_match_all( $regex, $jms_message_message_body, $matches );

		if (count($matches)>0) {
			foreach ($matches[0] as $m) {
				$match = str_replace(array("{","}"),"",$m);

				$match = str_replace("&amp;","&",$match);
				$bang = explode (" ",$match);
				$property_uid = (int)$bang[1];

				// Proof of concept only, don't actually want to add the property header to the message
				// $property_header_html = run_jomres_shortcode('{jomres show_property_header &property_uid='.$property_uid.'}' );
				// $jms_message_message_body = str_replace($m, $property_header_html ,$jms_message_message_body);
			}
		}
		set_showtime('jms_message_message_body' , $jms_message_message_body );
	}

	public function getRetVals()
	{
		return null;
	}
}
