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

/**
#
 * Displays a black booking
 #
* @package Jomres
#
 */
class j06001show_black_booking {
	/**
	#
	 * Constructor: Displays a black booking
	#
	 */
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$defaultProperty=getDefaultProperty();
		$contract_uid=jomresGetParam( $_REQUEST, 'contract_uid', 0 );
		$cancelText=jr_gettext('_JOMRES_COM_A_CANCEL','_JOMRES_COM_A_CANCEL',FALSE);
		$deleteText=jr_gettext('_JOMRES_COM_MR_ROOM_DELETE','_JOMRES_COM_MR_ROOM_DELETE',FALSE);
		$newText= jr_gettext('_JOMRES_COM_MR_NEWTARIFF','_JOMRES_COM_MR_NEWTARIFF',FALSE);

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL."&task=list_black_bookings"),$cancelText);
		$jrtb .= $jrtbar->toolbarItem('new',jomresURL(JOMRES_SITEPAGE_URL."&task=new_black_booking"),$newText );
		
		$jrtb .= $jrtbar->toolbarItem('delete',jomresURL(JOMRES_SITEPAGE_URL."&task=delete_black_booking&contract_uid=$contract_uid"),$deleteText);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$output['PAGETITLE']=jr_gettext('_JOMRES_FRONT_BLACKBOOKING','_JOMRES_FRONT_BLACKBOOKING');
		$output['ROOM_NUMBER']=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER','_JOMRES_COM_MR_VRCT_ROOM_HEADER_NUMBER');
		$output['ROOM_NAME']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NAME','_JOMRES_COM_MR_EB_ROOM_NAME');
		$output['CONTRACTID']=$contract_uid;

		if ($contract_uid != 0)
			{
			$query="SELECT arrival,departure,special_reqs FROM #__jomres_contracts WHERE contract_uid = '".(int)$contract_uid."'";
			$bbList=doSelectSql($query);
			foreach ($bbList as $bb)
				{
				$output['BBSTART']=outputDate($bb->arrival);
				$output['BBENDS']=outputDate($bb->departure);
				$output['REASON']=$bb->special_reqs;
				}
			$output['BBDATE']=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSTARTS','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSTARTS');
			$output['BBDATEENDS']=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSERVICERESUMES','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSERVICERESUMES');
			$output['INFO']=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_ROOMSSUBJECT','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_ROOMSSUBJECT');
			$output['_JOMRES_COM_MR_EB_ROOM_NUMBER']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NUMBER','_JOMRES_COM_MR_EB_ROOM_NUMBER');
			$output['_JOMRES_COM_MR_EB_ROOM_NAME']=jr_gettext('_JOMRES_COM_MR_EB_ROOM_NAME','_JOMRES_COM_MR_EB_ROOM_NAME');
			
			$query="SELECT DISTINCT room_uid FROM #__jomres_room_bookings WHERE contract_uid = '".(int)$contract_uid."'";
			$bbBookingData  = doSelectSql($query);
			foreach($bbBookingData as $bbBooking)
				{
				$query="SELECT room_number,room_name FROM #__jomres_rooms WHERE room_uid = '".(int)$bbBooking->room_uid."'";
				$bbRoomData  = doSelectSql($query);
				if (!empty($bbRoomData))
					{
					$roomNumberArray=array();
					foreach ($bbRoomData as $roomnumber)
						{
						$bkngs['ROOMNO']=($roomnumber->room_number);
						$bkngs['ROOMNAME']=($roomnumber->room_name);
						$bookingsrows[]=$bkngs;
						}
					}
				}

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
			$tmpl->readTemplatesFromInput( 'view_black_booking.html' );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$tmpl->addRows( 'bookingsrows', $bookingsrows );
			$tmpl->displayParsedTemplate();
			}
		else
			{
			echo "Error: Uid for black booking not found";
			}
		}


	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMRES_FRONT_BLACKBOOKING','_JOMRES_FRONT_BLACKBOOKING');
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSTARTS','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSTARTS');
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSERVICERESUMES','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSERVICERESUMES');
		$output[]		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_ROOMSSUBJECT','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_ROOMSSUBJECT');

		foreach ($output as $o)
			{
			echo $o;
			echo "<br/>";
			}
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
