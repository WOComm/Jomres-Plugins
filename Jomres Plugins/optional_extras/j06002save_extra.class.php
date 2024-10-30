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

class j06002save_extra
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$this->saveExtra();
		}

	function saveExtra()
		{
		$defaultProperty=getDefaultProperty();
		$uid						= intval(jomresGetParam( $_POST, 'uid', "" ));
		$desc						= jomresGetParam( $_POST, 'desc', "" );
		$name						= jomresGetParam( $_POST, 'extraname', "" );
		$price						= convert_entered_price_into_safe_float(jomresGetParam( $_POST, 'price', '' ));
		$auto_select				= (int)jomresGetParam( $_POST, 'auto_select', 0 );
		$include_in_property_lists	= (int)jomresGetParam( $_POST, 'include_in_property_lists', 0 );
		$limited_to_room_type		= (int)jomresGetParam( $_POST, 'limited_to_room_type', 0 );
		
		$price=str_replace(",","",$price);
		$maxquantity      = jomresGetParam( $_POST, 'maxquantity', 1 );
		if ($maxquantity < 1 || $maxquantity > 1000)
			$maxquantity = 1;
		$mindays		= jomresGetParam( $_POST, 'mindays', 1 );
		$tax_rate		= jomresGetParam( $_POST, 'taxrate', 0 );
		$extramodel		= jomresGetParam( $_POST, 'extramodel', array() );
		$force			= jomresGetParam( $_POST, 'force', array() );

		$valid_from=JSCalConvertInputDates($_POST['validfrom']);
		$valid_to=JSCalConvertInputDates($_POST['validto']);

		$model=$extramodel[0];
		$m=$model-1;
		$f=$force[$m];
		$chargeabledaily = intval(jomresGetParam( $_POST, 'chargabledaily', 0 ));
		$saveMessage=jr_gettext('_JOMRES_COM_MR_EXTRA_SAVE_UPDATED','_JOMRES_COM_MR_EXTRA_SAVE_UPDATED',FALSE);
		if ($uid==0)
			{
			$auditMessage=jr_gettext('_JOMRES_MR_AUDIT_INSERT_EXTRA','_JOMRES_MR_AUDIT_INSERT_EXTRA',FALSE);
			$query="INSERT INTO #__jomres_extras (`name`,`desc`,`price`,`auto_select`,`tax_rate`,`maxquantity`,`chargabledaily`,`property_uid`,`validfrom`,`validto` , `include_in_property_lists` ,`limited_to_room_type` )VALUES('$name','$desc','".(float)$price."','".(int)$auto_select."',".(int)$tax_rate.", '".(int)$maxquantity."','".(int)$chargeabledaily."','".(int)$defaultProperty."' ,'".$valid_from."' ,'".$valid_to."' , ".$include_in_property_lists." , ".$limited_to_room_type." )";
			$uid=doInsertSql($query,$auditMessage);
			}
		else
			{
			$auditMessage=jr_gettext('_JOMRES_MR_AUDIT_UPDATE_EXTRA','_JOMRES_MR_AUDIT_UPDATE_EXTRA',FALSE);
			$query="UPDATE #__jomres_extras SET `name`='$name',`desc`='$desc',`maxquantity`=".(int)$maxquantity.",`price`='".(float)$price."',`auto_select`='".(int)$auto_select."',`tax_rate`=".(int)$tax_rate." ,`chargabledaily`='".(int)$chargeabledaily."' ,`validfrom`='".$valid_from."' ,`validto`='".$valid_to."' , `include_in_property_lists`=".$include_in_property_lists." , `limited_to_room_type`=".$limited_to_room_type." WHERE uid = '".(int)$uid."' AND property_uid='".(int)$defaultProperty."'";
			doInsertSql($query,$auditMessage);
			}
		$jomres_messaging =jomres_getSingleton('jomres_messages');
		$jomres_messaging->set_message($auditMessage);

		$model=$extramodel[0];
		
		if ( (int)$model == 100 ) // Yucky tweak because a 3rd party dev uses his own cases here, so we need to call the new commission item 100 instead of 10. To not inconvenience their existing users, we'll call the new commission item 100 and hackytacky find the value of Force through this line
			$f = $force[100];
			
		$query="DELETE FROM #__jomcomp_extrasmodels_models WHERE extra_id = '".(int)$uid."'";
		doInsertSql($query,'');
		if (get_showtime('include_room_booking_functionality'))
			$query="INSERT INTO #__jomcomp_extrasmodels_models (`extra_id`,`model`,`params`,`force`,`property_uid`) VALUES ('".(int)$uid."','$model','".(int)$mindays."','".(int)$f."','".(int)$defaultProperty."')";
		else
			$query="INSERT INTO #__jomcomp_extrasmodels_models (`extra_id`,`model`,`params`,`force`,`property_uid`) VALUES ('".(int)$uid."',3,1,0,'".(int)$defaultProperty."')";

		doInsertSql($query,'');
		
		//update custom text table
		updateCustomText( '_JOMRES_CUSTOMTEXT_EXTRANAME'.(string)$uid, $name, true, $defaultProperty );

        $webhook_notification                               = new stdClass();
        $webhook_notification->webhook_event                = 'extra_saved';
        $webhook_notification->webhook_event_description    = 'Logs when optional extras added/updated.';
        $webhook_notification->webhook_event_plugin         = 'optional_extras';
        $webhook_notification->data                         = new stdClass();
		$webhook_notification->data->property_uid			= $defaultProperty;
        $webhook_notification->data->extras_uid             = $uid;
        add_webhook_notification($webhook_notification);
        
		jomresRedirect( jomresURL(JOMRES_SITEPAGE_URL."&task=list_extras"), $saveMessage );
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
