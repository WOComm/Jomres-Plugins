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

class j06001last_active
	{
	function __construct($componentArgs)
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = true; return;
			}
		
		$this->retVals = '';

		$ePointFilepath=get_showtime('ePointFilepath');
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		if (isset($componentArgs[ 'output_now' ])) {
            $output_now = $componentArgs[ 'output_now' ];
        } else {
            $output_now = true;
        }

		if ( $thisJRUser->last_active )
			{
			$pageoutput = array ();
			$output     = array ();
				
			$query = "SELECT count(`contract_uid`) as bookings, `property_uid` 
				FROM #__jomres_contracts 
				WHERE `property_uid` IN (".implode( "," , $thisJRUser->authorisedProperties).") 
				AND DATE_FORMAT(`timestamp`, '%Y-%m-%d %H:%i:%s') > DATE_FORMAT('" . $thisJRUser->last_active . "', '%Y-%m-%d %H:%i:%s') 
				GROUP BY `property_uid`";
					
			$booking_count = doSelectSql ($query );

			if ( count ( $booking_count ) > 0 )
				{
				$rows=array();
				foreach ( $booking_count as $bookings )
					{
					$r=array();
					
					$pageoutput[0]['SINCE'] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_SINCE', '_JOMRES_SINCE_LAST_ONLINE_SINCE', false, false );
					if ( $bookings->bookings == 1 )
						{
						$r['PRETEXT'] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_PRETEXT_SINGULAR', '_JOMRES_SINCE_LAST_ONLINE_PRETEXT_SINGULAR', false, false );
						$r['POSTTEXT'] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_POSTTEXT_SINGULAR', '_JOMRES_SINCE_LAST_ONLINE_POSTTEXT_SINGULAR', false, false );
						}
					else
						{
						$r['PRETEXT'] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_PRETEXT_PLURAL', '_JOMRES_SINCE_LAST_ONLINE_PRETEXT_PLURAL', false, false );
						$r['POSTTEXT'] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_POSTTEXT_PLURAL', '_JOMRES_SINCE_LAST_ONLINE_POSTTEXT_PLURAL', false, false );
						}
					$r['BOOKINGS']				= (int)$bookings->bookings;
					$r['PROPERTYNAME']			= getPropertyName($bookings->property_uid);
					$r['LIST_BOOKINGS_LINK']	= jomresURL( JOMRES_SITEPAGE_URL . "&task=list_bookings&thisProperty=".$bookings->property_uid );
					$rows[] = $r;
					}
	
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'last_active.html' );
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->addRows( 'rows', $rows );
				if ($output_now) 
					{
					$tmpl->displayParsedTemplate();
					}
				else 
					{
					$this->retVals = $tmpl->getParsedTemplate();
					}
				}
			}
			
			
		$last_active = strtotime($thisJRUser->last_active);
		$now = strtotime(date("Y-m-d H:i:s"));
		$diff = $now - $last_active;
		
		// We'll let the user see this message for half an hour.
		if ( $diff > 30*60 )
			{
			$timestamp = date("Y-m-d H:i:s");
			$query = "UPDATE #__jomres_managers SET `last_active` = '".$timestamp."' WHERE `userid` = ".(int)$thisJRUser->userid;
			$result = doInsertSql($query);
			}
		}

	function touch_template_language()
		{
		$output    = array ();
		$output[ ] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_PRETEXT', '_JOMRES_SINCE_LAST_ONLINE_PRETEXT' );
		$output[ ] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_POSTTEXT', '_JOMRES_SINCE_LAST_ONLINE_POSTTEXT' );
		$output[ ] = jr_gettext( '_JOMRES_SINCE_LAST_ONLINE_MIDTEXT_PLURAL', '_JOMRES_SINCE_LAST_ONLINE_MIDTEXT_PLURAL' );

		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}
