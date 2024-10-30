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

class j00005a_jintour {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		if (file_exists($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php'))
			require_once($ePointFilepath.'language'.JRDS.get_showtime('lang').'.php');
		else
			{
			if (file_exists($ePointFilepath.'language'.JRDS.'en-GB.php'))
				require_once($ePointFilepath.'language'.JRDS.'en-GB.php');
			}
		
		$thisJRUser = jomres_singleton_abstract::getInstance('jr_user');

		//menus
		$jomres_menu = jomres_singleton_abstract::getInstance('jomres_menu');

		if (jomres_cmsspecific_areweinadminarea()) 
			{
			//admin menu item
			$jomres_menu->add_admin_item(50, jr_gettext('_JINTOUR_TITLE', '_JINTOUR_TITLE', false), $task = 'jintour', 'fa-bus');
			}
		else 
			{
			$property_uid = getDefaultProperty();
		
			if ($property_uid > 0)
				{
				$mrConfig = getPropertySpecificSettings($property_uid);

				if ($mrConfig[ 'is_real_estate_listing' ] != '1') 
					{
					if ($thisJRUser->accesslevel >= 70)
						{
						$jomres_menu->add_item(80, jr_gettext('_JINTOUR_TITLE', '_JINTOUR_TITLE', false), 'jintour', 'fa-bus');
						}
					}
				}
			}

		//get jintour properties
		if ( !get_showtime('jintour_properties') )
			{
			$curr_jintour_properties = array();

			$query = "SELECT `property_uid` FROM #__jomres_jintour_properties";
			$result = doSelectSql($query);

			if (!empty($result))
				{
				foreach ($result as $r)
					if (!in_array($r->property_uid , $curr_jintour_properties)) {
						$curr_jintour_properties[]=(int)$r->property_uid;
					}
				}
			set_showtime('jintour_properties', $curr_jintour_properties);
			}
		else
			{
			$curr_jintour_properties = get_showtime('jintour_properties');
			}
		
		$result = false;
		if( in_array( (int)get_showtime('property_uid'), $curr_jintour_properties) )
			$result = true;
		
		if ($result)
			set_showtime('is_jintour_property', true);
		else
			set_showtime('is_jintour_property', false);
		
		if (get_showtime('is_jintour_property'))
			{
			set_showtime('include_room_booking_functionality', false);

			// Here we'll set custom paths to our templates or redirect calls to different pages, much better than creating minicomponents to do the same work when all we want to do is modify the resulting output, 
			$task = jomresGetParam($_REQUEST, 'task', '');
			
			if ($task != '')
				{
				switch ($task)
					{
					case 'viewproperty':
						unset($MiniComponents->registeredClasses['00035']['tabcontent_04_availability_calendar']);
						unset($MiniComponents->registeredClasses['00035']['tabcontent_04_roomslist']);
						unset($MiniComponents->registeredClasses['00035']['tabcontent_05_tariffs']);
						unset($MiniComponents->registeredClasses['00035']['tabcontent_01_more_info']);
						break;
					case 'edit_property':
						$current_custom_paths = get_showtime('custom_paths');
						$current_custom_paths['edit_property.html'] = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
						set_showtime('custom_paths',$current_custom_paths);
						break;
					case 'dobooking':
						$current_custom_paths = get_showtime('custom_paths');
						$current_custom_paths['dobooking.html'] = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
						set_showtime('custom_paths',$current_custom_paths);
						break;
					case 'edit_booking':
						$id = jomresGetParam($_REQUEST, 'id', 0);

						if ($id == 0)
							{
							$contract_uid = (int)jomresGetParam($_REQUEST, 'contract_uid', 0);
							
							$query = "SELECT `tour_id` FROM #__jomres_jintour_tour_bookings WHERE `contract_id` = ".(int)$contract_uid;
							$tour_id = doSelectSql($query,1);
							
							jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL."&task=edit_booking&id=".$tour_id."&contract_uid=".$contract_uid ), "" );
							}
						else
							{
							$rooms_tab_replacement = $MiniComponents->specificEvent('06002','jintour_view_tour_bookings',array('id'=>$id, "defer_output"=>true));
							set_showtime('rooms_tab_replacement',$rooms_tab_replacement);	
							}
						break;
					case 'propertyadmin':
						jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL."&task=jintour" ), "" );
						break;
					case 'muviewbooking':
						if ($thisJRUser->accesslevel >= 1)
							{
							$contract_uid = jomresGetParam( $_REQUEST, 'contract_uid', 0 );
							
							$allGuestUids = array();

							if (!$thisJRUser->is_partner)
								$query = 'SELECT `guests_uid` FROM #__jomres_guests WHERE `mos_userid` = '.(int)$thisJRUser->id;
							else
								$query = 'SELECT `guests_uid` FROM #__jomres_guests WHERE `partner_id` = '.(int)$thisJRUser->id;
							
							$result = doSelectSql($query);

							// Because a new record is made in the guests table for each new property the guest registers in, we need to find all the guest uids for this user
							if (!empty($result))
								{
								foreach ($result as $r)
									{
									$allGuestUids[] = $r->guests_uid;
									}
								}
							
							$query="SELECT `guest_uid`, `property_uid` FROM #__jomres_contracts WHERE `contract_uid` = ".(int)$contract_uid." AND `guest_uid` IN (".jomres_implode($allGuestUids).") LIMIT 1";
							$result = doSelectSql($query,2);
							
							$guest_id = $result['guest_uid'];
							$property_uid = $result['property_uid'];
							
							if (in_array($property_uid, $curr_jintour_properties))
								{
								$query = "SELECT `tour_id` FROM #__jomres_jintour_tour_bookings WHERE `contract_id` = ".(int)$contract_uid;
								$tour_id = doSelectSql($query,1);

								$rooms_tab_replacement = $MiniComponents->specificEvent('06005','jintour_guest_view_tour_bookings',array('id'=>(int)$tour_id,"defer_output"=>true,"property_uid"=>$property_uid,"contract_uid"=>$contract_uid));
								set_showtime('rooms_tab_replacement',$rooms_tab_replacement);
								}
							}
						break;
					case 'registerProp_step2':
						$management_process = jomresGetParam($_REQUEST,'management_process','');
						
						if ( $management_process == "jintour")
							{
							$current_custom_paths = get_showtime('custom_paths');
							$current_custom_paths['register_property2.html'] = $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
							
							set_showtime('custom_paths',$current_custom_paths);
							}
						break;
					default:
						break;
					}
				}
			}
			
		$jomres_widgets = jomres_singleton_abstract::getInstance('jomres_widgets');
		$jomres_widgets->register_widget('06001', 'widget_jintour', jr_gettext('_JINTOUR_PROFILES_TITLE_LIST', '_JINTOUR_PROFILES_TITLE_LIST', false), true);
		
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 */
	function getRetVals()
		{
		return null;
		}
	}
