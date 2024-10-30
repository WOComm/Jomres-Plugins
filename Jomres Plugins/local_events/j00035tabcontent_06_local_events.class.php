<?php
/**
 * Plugin
 * @author Woollyinwales IT <sales@jomres.net>
 * @version Jomres 8
* @package Jomres
* @copyright	2005-2014 Vince Wooll
* Jomres (tm) PHP files are released under both MIT and GPL2 licenses.
**/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00035tabcontent_06_local_events 
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{$this->template_touchable=false; return;}
				
		$property_uid = get_showtime('property_uid');
		
		$content = $MiniComponents->specificEvent( '06000', 'show_local_events',array('output_now'=>false, 'property_uid'=>$property_uid));
		
		$anchor = jomres_generate_tab_anchor(jr_gettext('_JRPORTAL_LOCAL_EVENTS_TITLE','_JRPORTAL_LOCAL_EVENTS_TITLE',false,false));
		$tab = array(
			"TAB_ANCHOR"=>$anchor,
			"TAB_TITLE"=>jr_gettext('_JRPORTAL_LOCAL_EVENTS_TITLE','_JRPORTAL_LOCAL_EVENTS_TITLE',false,false),
			"TAB_CONTENT"=>$content
			);
		$this->retVals = $tab;
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
		return $this->retVals;
		}
	}
