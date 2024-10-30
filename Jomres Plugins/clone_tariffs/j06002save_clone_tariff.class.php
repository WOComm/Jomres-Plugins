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

class j06002save_clone_tariff
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}

		$delete_existing             = jomresGetParam( $_REQUEST, 'delete_existing', FALSE ) ;
		$source_property             = jomresGetParam( $_REQUEST, 'source_property', 0 ) ;
		$source_tariff_id            = jomresGetParam( $_REQUEST, 'source_tariff_id', 0 ) ;
		$target_property             = jomresGetParam( $_REQUEST, 'target_property', 0 ) ;
		$target_property_room_type   = jomresGetParam( $_REQUEST, 'target_property_room_type', 0 ) ;

		if ( $source_tariff_id ==0 || $target_property ==0 || $target_property_room_type ==0) 
			{
			jomresRedirect(  jomresURL( JOMRES_SITEPAGE_URL . "&task=clone_tariff" ), "" );
			}
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		
		if (!in_array( $target_property, $thisJRUser->authorisedProperties ) )
			{
			jomresRedirect(  jomresURL( JOMRES_SITEPAGE_URL . "&task=clone_tariff" ), "" );
			}
		
		$sourceMrConfig       = getPropertySpecificSettings($source_property);
		$targetMrConfig        = getPropertySpecificSettings($target_property);
		
		if ( $sourceMrConfig['tariffmode'] != $targetMrConfig['tariffmode']) 
			{
			$this->delete_tariffs_for_property($target_property);
			
			$query  = "SELECT uid FROM #__jomres_settings WHERE property_uid = '" . (int) $target_property . "' and akey = 'tariffmode'";
			$result = doSelectSql( $query );
			if ( empty( $result ) ) 
				{
				$query = "INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('" . (int) $target_property . "','tariffmode','" . $sourceMrConfig['tariffmode'] . "')";
				}
			else
				{
				$query = "UPDATE #__jomres_settings SET `value`='" .  $sourceMrConfig['tariffmode'] . "' WHERE property_uid = '" . (int) $target_property . "' and akey = 'tariffmode'";
				}
			$result = doInsertSql($query);
			}

		if ($delete_existing)
			{
			$this->delete_tariffs_for_property($target_property);
			}
		
		if ( $sourceMrConfig['tariffmode']=="0" || $sourceMrConfig['tariffmode']=="1")
			{
			$query = "SELECT `rate_title`, `rate_description`, `validfrom`, `validto`, `roomrateperday`, `mindays`,`maxdays`, `minpeople`, `maxpeople`, `roomclass_uid`, `ignore_pppn`, `allow_ph`, `allow_we`, `weekendonly`, `validfrom_ts`, `validto_ts`, `dayofweek`, `minrooms_alreadyselected`, `maxrooms_alreadyselected` FROM #__jomres_rates WHERE rates_uid IN (".implode(',',array($source_tariff_id)).") ";
			$source_tariff = doSelectSql ($query);
			$this->copy_source_tariff_to_target_tariff($source_tariff [0],$target_property_room_type,$target_property);
			 
			}
		else
			{
			$query = "SELECT name FROM #__jomcomp_tarifftypes WHERE id = ".$source_tariff_id;
			$tariff_type_name = doSelectSql ($query,1);
			
			$query = "INSERT INTO #__jomcomp_tarifftypes (`name`,`property_uid`) VALUES ('".$tariff_type_name."','".$target_property."')";
			$tariff_type_id = doInsertSql ($query,'');
			
			$query = "SELECT tariff_id FROM #__jomcomp_tarifftype_rate_xref WHERE tarifftype_id = ".$source_tariff_id;
			$source_tariff_ids = doSelectSql ($query);
			
			
			$source_tariff_ids_array = array();
			foreach($source_tariff_ids as $t)
				{
				$source_tariff_ids_array[] = $t->tariff_id;
				}
			
			$new_tariff_ids_array = array();
			$query = "SELECT `rate_title`, `rate_description`, `validfrom`, `validto`, `roomrateperday`, `mindays`,`maxdays`, `minpeople`, `maxpeople`, `roomclass_uid`, `ignore_pppn`, `allow_ph`, `allow_we`, `weekendonly`, `validfrom_ts`, `validto_ts`, `dayofweek`, `minrooms_alreadyselected`, `maxrooms_alreadyselected` FROM #__jomres_rates WHERE rates_uid IN (".implode(',',$source_tariff_ids_array).") ";
			$source_tariffs = doSelectSql ($query);
			if (!empty($source_tariffs))
				{
				foreach ($source_tariffs as $tariff)
					{
					$new_tariff_ids_array[] = $this->copy_source_tariff_to_target_tariff($tariff,$target_property_room_type,$target_property);
					}
				}
			
			$query = "INSERT INTO #__jomcomp_tarifftype_rate_xref 
				(`tarifftype_id`,`tariff_id`,`roomclass_uid`,`property_uid`) 
				VALUES ";
				foreach ($new_tariff_ids_array as $tariff_id)
					{
					$query .= "('".$tariff_type_id."','".$tariff_id."','".$target_property_room_type."','".$target_property."'),";
					}
			$query = substr( $query, 0, strlen( $query ) - 1 );
			doInsertSql ($query,'');
			}
		
		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		$thisJRUser->set_currentproperty( $target_property );
        
        $webhook_notification                               = new stdClass();
        $webhook_notification->webhook_event                = 'tariffs_updated';
        $webhook_notification->webhook_event_description    = 'Logs when tariffs updated.';
        $webhook_notification->webhook_event_plugin         = 'clone_tariffs';
        $webhook_notification->data                         = new stdClass();
        $webhook_notification->data->property_uid           = $target_property;
        add_webhook_notification($webhook_notification);
        
		jomresRedirect( jomresURL( JOMRES_SITEPAGE_URL . "&task=clone_tariffs" ), 'Tariff cloned.' );
		}
	
	
	function copy_source_tariff_to_target_tariff($tariff_object,$new_room_type,$target_property_uid)
		{
		$query = "INSERT INTO #__jomres_rates 
			(
			`rate_title`,
			`rate_description`,
			`validfrom`,
			`validto`,
			`roomrateperday`,
			`mindays`,
			`maxdays`,
			`minpeople`,
			`maxpeople`,
			`roomclass_uid`,
			`ignore_pppn`,
			`allow_ph`,
			`allow_we`,
			`weekendonly`,
			`validfrom_ts`,
			`validto_ts`,
			`dayofweek`,
			`minrooms_alreadyselected`,
			`maxrooms_alreadyselected`,
			`property_uid`
			) 
			VALUES 
			(
			'".$tariff_object->rate_title."',
			'".$tariff_object->rate_description."',
			'".$tariff_object->validfrom."',
			'".$tariff_object->validto."',
			'".$tariff_object->roomrateperday."',
			'".$tariff_object->mindays."',
			'".$tariff_object->maxdays."',
			'".$tariff_object->minpeople."',
			'".$tariff_object->maxpeople."',
			'".$new_room_type."',
			'".$tariff_object->ignore_pppn."',
			'".$tariff_object->allow_ph."',
			'".$tariff_object->allow_we."',
			'".$tariff_object->weekendonly."',
			'".$tariff_object->validfrom_ts."',
			'".$tariff_object->validto_ts."',
			'".$tariff_object->dayofweek."',
			'".$tariff_object->minrooms_alreadyselected."',
			'".$tariff_object->maxrooms_alreadyselected."',
			'".$target_property_uid."'
			)";
		return doInsertSql ($query,'');
		}
	
	function delete_tariffs_for_property($property_uid)
		{
		$mrConfig        = getPropertySpecificSettings($property_uid);
		if ( $mrConfig['tariffmode']  == "2" || $mrConfig['tariffmode']  == "5" ) // Micromanage
			{
			$query = "DELETE FROM #__jomcomp_tarifftypes WHERE property_uid = ".$property_uid;
			$result = doInsertSql($query);
			$query = "DELETE FROM #__jomcomp_tarifftype_rate_xref WHERE property_uid = ".$property_uid;
			$result = doInsertSql($query);
			$query = "DELETE FROM #__jomres_rates WHERE property_uid = ".$property_uid;
			$result = doInsertSql($query);
			}
			
		if ( $mrConfig['tariffmode']  == "0" || $mrConfig['tariffmode'] == "1") // Normal or Advanced
			{
			$query = "DELETE FROM #__jomres_rates WHERE property_uid = ".$property_uid;
			$result = doInsertSql($query);
			}
		}
		
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}

