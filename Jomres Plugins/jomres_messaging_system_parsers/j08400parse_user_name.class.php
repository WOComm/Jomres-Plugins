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
	


class j08400parse_user_name
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

		$group_name = get_showtime('jms_message_group_name');

		$regex = '/{user_id\s*.*?}/i';

		// find all instances of mambot and put in $matches
		preg_match_all( $regex, $group_name, $matches );

		if (count($matches)>0) {
			foreach ($matches[0] as $m) {
				$match = str_replace(array("{","}"),"",$m);

				$match = str_replace("&amp;","&",$match);
				$bang = explode (" ",$match);
				$user_id = (int)$bang[1];

				$query = 'SELECT enc_firstname,enc_surname FROM #__jomres_guest_profile WHERE cms_user_id = '.(int) $user_id.' LIMIT 1';
				$userData = doSelectSql($query);
				if ($userData[0]->enc_firstname == '' && $userData[0]->enc_surname == '' ) {
					$user_name = jomres_cmsspecific_getUsername($user_id);
				} else {
					$this->jomres_encryption = new jomres_encryption();
					$firstname = $this->jomres_encryption->decrypt($userData[0]->enc_firstname);
					$surname = $this->jomres_encryption->decrypt($userData[0]->enc_surname);
					$user_name = $firstname .' '. $surname;
				}

				$group_name = str_replace($m, $user_name , $group_name);
			}
		}
		set_showtime('jms_message_group_name' , $group_name );
	}

	public function getRetVals()
	{
		return null;
	}
}
