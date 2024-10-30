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

class j06000asamodule_recently_viewed
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "asamodule_recently_viewed",
				"info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RECENTLY_VIEWED",
				"arguments" => array (
					array (
						"argument" => "asamodule_recently_viewed_listlimit",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RECENTLY_VIEWED_ARG_ASAMODULE_RECENTLY_VIEWED_LISTLIMIT",
						"arg_example" => "10",
						),
					array (
						"argument" => "asamodule_recently_viewed_vertical",
						"arg_info" => "_JOMRES_SHORTCODES_06000ASAMODULE_RECENTLY_VIEWED_ARG_ASAMODULE_RECENTLY_VIEWED_VERTICAL",
						"arg_example" => "0",
						)
					)
				);
			return;
			}
		$listlimit =  trim(jomresGetParam($_REQUEST,'asamodule_recently_viewed_listlimit',10));
		$vertical 	= (bool)trim(jomresGetParam($_REQUEST,'asamodule_recently_viewed_vertical', '0'));
		
		add_gmaps_source();
		
		$tmpBookingHandler =jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
		$tmpBookingHandler->initBookingSession(); //so that the session id is found and set on non jomres pages
		if (!isset($tmpBookingHandler->user_settings['recently_viewed']))
			return;

		$list = array_reverse($tmpBookingHandler->user_settings['recently_viewed']);
		$property_uids = array();
		for ($i=0;$i<$listlimit;$i++)
			{
			if ( isset($list[$i]) && (int)$list[$i] > 0)
				$property_uids[]=(int)$list[$i];
			}
		
		if ( !empty($property_uids) )
			{
			$result = get_property_module_data($property_uids, '', '', $vertical);
			$rows = array();
			foreach ($result as $property)
				{
				$r=array();
				$r['PROPERTY']=$property['template'];
				$rows[]=$r;
				}
			$output = array();
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( JOMRES_TEMPLATEPATH_FRONTEND );
			$tmpl->readTemplatesFromInput( 'basic_module_output_wrapper.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows', $rows );
			$tmpl->displayParsedTemplate();
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


