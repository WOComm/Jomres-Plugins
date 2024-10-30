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
 * List black bookings
 #
* @package Jomres
#
 */
class j06001list_black_bookings {
	/**
	#
	 * Constructor: List black bookings
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
		$bookingsrows=array();
		$output=array();
		$txt="";
		$editIcon	='<img src="'.JOMRES_IMAGES_RELPATH.'jomresimages/small/EditItem.png" border="0" alt="editicon" />';
		
		$output['HSTART']=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSTARTS','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSTARTS');
		$output['HRESUMEDATE']=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSERVICERESUMES','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_BBSERVICERESUMES');
		$output['HREASON']=jr_gettext('_JOMRES_JR_BLACKBOOKING_REASON','_JOMRES_JR_BLACKBOOKING_REASON');
		$output['_JOMRES_COM_MR_VRCT_ROOM_LINKTEXT']=jr_gettext('_JOMRES_COM_MR_VRCT_ROOM_LINKTEXT','_JOMRES_COM_MR_VRCT_ROOM_LINKTEXT');
		
		$cancelText=jr_gettext('_JOMRES_COM_A_CANCEL','_JOMRES_COM_A_CANCEL',FALSE);
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL.""),$cancelText);
		$jrtb .= $jrtbar->toolbarItem('new',jomresURL(JOMRES_SITEPAGE_URL."&task=new_black_booking"),jr_gettext('_JOMRES_FRONT_BLACKBOOKING_NEW','_JOMRES_FRONT_BLACKBOOKING_NEW',FALSE));
		
		$image = $jrtbar->makeImageValid(JOMRES_IMAGES_RELPATH.'jomresimages/small/WasteBasket.png');
		$jrtb .= $jrtbar->customToolbarItem('delete_multiple_blackbookings','',jr_gettext('_JOMRES_COM_MR_ROOM_DELETE','_JOMRES_COM_MR_ROOM_DELETE',FALSE),$submitOnClick=true,$submitTask="delete_multiple_blackbookings",$image);
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		$output['JOMRES_SITEPAGE_URL']=JOMRES_SITEPAGE_URL;

		$query="SELECT contract_uid FROM #__jomres_room_bookings WHERE black_booking = '1' AND property_uid = '".(int)$defaultProperty."' GROUP BY contract_uid";
		$bookingsList = doSelectSql($query);
		$output['PAGETITLE']=jr_gettext('_JOMRES_FRONT_BLACKBOOKING','_JOMRES_FRONT_BLACKBOOKING',false);
		if (!empty($bookingsList))
			{
			foreach ($bookingsList as $booking)
				{
				$contractUidArray[]=$booking->contract_uid;
				}
			$contractUidArray=array_unique($contractUidArray);
			foreach ($contractUidArray as $uid)
				{
				$txt.=" contract_uid ='".$uid."' OR ";
				}
			$rest = substr($txt, 0, -4);

			$query="SELECT contract_uid,arrival,departure,special_reqs FROM #__jomres_contracts WHERE ".$rest." AND property_uid = '".(int)$defaultProperty."' ORDER BY arrival";
			$bbList=doSelectSql($query);
			foreach ($bbList as $bb)
				{
				$bbrow['START']=outputDate($bb->arrival);
				$bbrow['RESUMEDATE']=outputDate($bb->departure);
				$bbrow['REASON']=$bb->special_reqs;
				$bbrow['CHECKBOX']='<input type="checkbox" name="idarray[]" value="'.$bb->contract_uid.'">';
				$bbrow['EDITLINK']='<a href="'.jomresURL(JOMRES_SITEPAGE_URL."&task=show_black_booking&contract_uid=".($bb->contract_uid) ).'">'.$editIcon.'</a>';
				$bookingsrows[]=$bbrow;
				}
			}
		//else
//			{
//			$output['noblackbookings']=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_NOBBOOKINGS',_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_NOBBOOKINGS);
//			}
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( JOMRES_TEMPLATEPATH_BACKEND );
		$tmpl->readTemplatesFromInput( 'list_black_bookings.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'bookingsrows', $bookingsrows );
		$tmpl->displayParsedTemplate();
		}

	function touch_template_language()
		{
		$output=array();

		$output[]		=jr_gettext('_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_NOBBOOKINGS','_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS_NOBBOOKINGS');
		$output[]		=jr_gettext('_JOMRES_FRONT_BLACKBOOKING','_JOMRES_FRONT_BLACKBOOKING');

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
