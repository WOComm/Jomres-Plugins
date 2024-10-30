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

class j16000clone_property
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$jomresConfig_live_site=get_showtime('live_site');
		
		$output=array();
		if (!isset($_POST['property_to_clone']) )
			{
			$output['PAGETITLE']=jr_gettext('_JRPORTAL_CLONEPROPERTY_TITLE','_JRPORTAL_CLONEPROPERTY_TITLE',false);
			$output['HCHOOSEPROPERTY']=jr_gettext('_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY','_JRPORTAL_CLONEPROPERTY_CHOOSEPROPERTY',false);
			$output['HNEWNAME']=jr_gettext('_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME','_JRPORTAL_CLONEPROPERTY_NEWPROPERTY_NAME',false);

			$propertys = array();
			$query = "SELECT propertys_uid,property_name FROM #__jomres_propertys";
			$propertyList=doSelectSql($query);
			if (!empty($propertyList))
				{
				foreach ($propertyList as $p)
					{
					$propertys[] = jomresHTML::makeOption($p->propertys_uid, $p->property_name);
					}
				$output['PROPERTYSDROPDOWN']= jomresHTML::selectList($propertys, 'property_to_clone', ' ', 'value', 'text', null , false );
				$output['NOTES']=jr_gettext('_JRPORTAL_CLONEPROPERTY_NOTES','_JRPORTAL_CLONEPROPERTY_NOTES',false);
				$jrtbar =jomres_getSingleton('jomres_toolbar');
				$jrtb  = $jrtbar->startTable();
				
				$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL("index.php?option=com_jomres"),'');
				$jrtb .= $jrtbar->toolbarItem('save','','',true,'clone_property');
				
				$jrtb .= $jrtbar->endTable();
				$output['JOMRESTOOLBAR']=$jrtb;
				
				$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;

				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'select_property.html');
				$tmpl->addRows( 'pageoutput',$pageoutput);
				$tmpl->displayParsedTemplate();
				}
			else
				echo "Hmmm, you want me to clone a property, although you don't have any in the database?";
			}
		else
			{
			$property_to_clone	= jomresGetParam( $_POST, 'property_to_clone', 0 );
			$new_property_name	= jomresGetParam( $_POST, 'newname', "" );
			if ($property_to_clone>0)
				$this->clone_me_now($property_to_clone,$new_property_name);
			else
				echo "Error, a valid property uid wasn't supplied";
			}
		}

	function clone_me_now($property_uid,$new_property_name)
		{
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$MiniComponents =jomres_getSingleton('mcHandler');
		$this->systemTables	=	array();
		$this->getSystemTables();
		$this->tablesToSkipUpdateOn	=	array();

		if (in_array('__jomcomp_extrasmodels_models',$this->systemTables) )
			$this->tablesToSkipUpdateOn[]='__jomcomp_extrasmodels_models';
		//if (in_array('__jomcomp_tarifftype_rate_xref',$this->systemTables) )
		//	$this->tablesToSkipUpdateOn[]='__jomcomp_tarifftype_rate_xref';
		
		$this->tablesToSkipUpdateOn[]='__jomres_site_settings';
		
		if ($jrConfig['useGlobalRoomTypes']=="0")
			{
			echo "Sorry, you must use global room types to use this plugin.";
			return;
			}

		$jintour_property = false;
		if (isset( $MiniComponents->registeredClasses['00001']['jintour_start']))
			{
			$query = "SELECT property_uid FROM #__jomres_jintour_properties WHERE `property_uid` = ".(int)$property_uid . " LIMIT 1";
			$result = doSelectSql($query , 1);
			if (!$result===false)
				{
				$jintour_property = true;
				}
			}
		
		$this->newPropertyName=$new_property_name;

		$jomresTablesArray=array();
		$jomresTablesArray['__jomres_customertypes']	=array('autoid'=>'id','idkey'=>'property_uid','columns'=>array('id','type','notes',	'maximum','is_percentage','posneg','variance','published','order') );
		$jomresTablesArray['__jomres_pluginsettings']	=array('autoid'=>'id','idkey'=>'prid','columns'=>array('id','plugin', 'setting', 'value') );
		$jomresTablesArray['__jomres_custom_text']		=array('autoid'=>'uid','idkey'=>'property_uid','columns'=>array('uid','constant','customtext','language', 'language_context') );
		$jomresTablesArray['__jomres_extras']   =array('autoid'=>'uid','idkey'=>'property_uid','columns'=>array('uid','name','desc','price','auto_select','tax_rate','maxquantity','chargabledaily','published') );
		$jomresTablesArray['__jomres_settings']			=array('autoid'=>'uid','idkey'=>'property_uid','columns'=>array('uid','akey','value') );
		//$jomresTablesArray['__jomres_rates']			=array('autoid'=>'rates_uid','idkey'=>'property_uid','columns'=>array('rates_uid','rate_title','rate_description','validfrom','validto','roomrateperday','mindays','maxdays','minpeople','maxpeople','roomclass_uid','ignore_pppn','allow_ph','allow_we','weekendonly','validfrom_ts','validto_ts','dayofweek','minrooms_alreadyselected','maxrooms_alreadyselected') );
		$jomresTablesArray['__jomres_rooms']			=array('autoid'=>'room_uid','idkey'=>'propertys_uid','columns'=>array('room_uid','room_classes_uid','room_features_uid','room_name','room_number','room_floor','max_people') );
/* 		if (!$jintour_property)
			{
			$jomresTablesArray['__jomres_room_features']	=array('autoid'=>'room_features_uid','idkey'=>'property_uid','columns'=>array('room_features_uid','feature_description') );
			} */
		
		$jomresTablesArray['__jomres_propertys']		=array('autoid'=>'propertys_uid','idkey'=>'propertys_uid','columns'=>array('propertys_uid','property_name', 'property_street','property_town','property_region', 'property_country', 'property_postcode', 'property_tel','property_fax','property_email','property_features','property_mappinglink','property_description','property_checkin_times', 'property_area_activities','property_driving_directions','property_airports','property_othertransport','property_policies_disclaimers','property_key','published','stars','ptype_id','lat','long','metatitle','metadescription') );
		// We can add some minicomponent tables here
		if (in_array('__jomcomp_extrasmodels_models',$this->systemTables) )
			$jomresTablesArray['__jomcomp_extrasmodels_models']	=array('autoid'=>'id','idkey'=>'property_uid','columns'=>array('extra_id','model','params','force') );
		//if (in_array('__jomcomp_tarifftypes ',$this->systemTables) )
		//	$jomresTablesArray['__jomcomp_tarifftypes ']	=array('autoid'=>'id','idkey'=>'property_uid','columns'=>array('name') );
		//if (in_array('__jomcomp_tarifftype_rate_xref',$this->systemTables) )
		//	$jomresTablesArray['__jomcomp_tarifftype_rate_xref']	=array('autoid'=>'id','idkey'=>'property_uid','columns'=>array('id','tarifftype_id','tariff_id','roomclass_uid') );

		$selectResults=array();
		foreach ($jomresTablesArray as $key=>$val)
			{
			$query="SELECT * FROM #".$key." WHERE ".$val['idkey']." = ".$property_uid;
			//echo $query.'<br>';
			$jomresTablesArray[$key]['results']=doSelectSql($query);
			}

		$query="INSERT INTO #__jomres_propertys (`property_name`) VALUES ('".$this->newPropertyName."')";
		$newid=doInsertSql($query,jr_gettext('_JOMRES_MR_AUDIT_INSERT_PROPERTY','_JOMRES_MR_AUDIT_INSERT_PROPERTY',FALSE));
		$this->importSettings($property_uid,$newid);
		//$this->insertSetting($newid,'tariffmode',1);  // Set the tariff editing mode to Advanced

		foreach ($jomresTablesArray as $key=>$val)
			{
			$table="#".$key;
			$autoid=$val['autoid'];
			$idkey=$val['idkey'];
			$columns=$val['columns'];
			$selectResults=$val['results'];
			$autoIdNumber=0;
			//echo $key."<br>";
			if (!in_array($key,$this->tablesToSkipUpdateOn) )
				{
				//echo "Attempting to insert ".$key."<br>
				//";
				foreach ($selectResults as $res)
					{
					if ($key == '__jomres_custom_text' && $res->constant == '_JOMRES_CUSTOMTEXT_PROPERTY_NAME_'.$property_uid )
						{
						$res->customtext = $this->newPropertyName;
						$res->constant == '_JOMRES_CUSTOMTEXT_PROPERTY_NAME_'.$newid;
						}
					
					$tmpStr="";
					$autoIdNumber=0;
					
					
					foreach ($columns as $col)
						{
						$colval=$res->$col;
						$column=$col;
						//if ($key == '__jomres_extras')
						//	echo $column.' '.$colval.'<br>';
						if ($column == $autoid)
							$autoIdNumber=$colval;
						if ($column != $autoid)
							{
							if ($key == '__jomres_propertys' && $column== 'property_name')
								$tmpStr.='`'.$col.'`=\''.$this->newPropertyName.'\', ';
							elseif ($key == '__jomres_propertys' && $column== 'published') // Newly cloned properties shouldn't be published
								$tmpStr.='`'.$col.'`=0, ';
							else
								$tmpStr.='`'.$col.'`=\''.$res->$col.'\', ';
							}
						}
					if ($key != '__jomres_propertys' )
						$query = "INSERT INTO ".$table." SET ".$tmpStr." `".$idkey."`='".$newid."'";
					else
						{
						$tmpStr=substr($tmpStr,strlen($string),strlen($string)-2 );
						$query = "UPDATE ".$table." SET ".$tmpStr." WHERE `".$idkey."`='".$newid."'";
						}
					//echo $query."<br>";
					$returnid=doInsertSql($query,'Clone action');
					if (!$returnid)
						trigger_error ("Unable to update table during CLONE property, mysql db failure ".$query, E_USER_ERROR);
					
					
					// Special for extras models
					if (in_array('__jomcomp_extrasmodels_models',$this->systemTables) &&  $key == '__jomres_extras')
						{
						$modelResults=$jomresTablesArray['__jomcomp_extrasmodels_models']['results'];
						foreach ($modelResults as $mod)
							{
							//echo $autoIdNumber .' '. $mod->extra_id.'<br>';
							if ($autoIdNumber == $mod->extra_id)
								{
								$model	=$mod->model;
								$params=$mod->params;
								$force=$mod->force;
								$query="INSERT INTO #__jomcomp_extrasmodels_models
								(`extra_id`,`model`,`params`,`force`,`property_uid`)
								VALUES
								('$returnid','$model','$params','$force','$newid')
								";
								//echo $query.'<br>';
								$result=doInsertSql($query,'');
								if (!$result)
									trigger_error ("Unable to update table during CLONE property, mysql db failure ".$query, E_USER_ERROR);
								}
							}
						}
					}
				}
			}
			
		$apikey=createNewAPIKey();
		$query = "UPDATE #__jomres_propertys SET `apikey` = '".$apikey."' WHERE propertys_uid =".$newid;
		$result=doInsertSql($query,'');			
		
		if ( $jintour_property )
			{
			$query = "SELECT `title`,`description`,`days_of_week`,`price_adults`,`price_kids`,`spaces_adults`,`spaces_kids`,`start_date`,`end_date`,`repeating`,`tax_rate` FROM #__jomres_jintour_profiles WHERE property_uid =".(int)$property_uid;
			$existing_prifles = doSelectSql($query);
			if (!empty($existing_prifles))
				{
				foreach ($existing_prifles as $profile)
					{
					$query = " INSERT INTO #__jomres_jintour_profiles  (
						`title`,
						`description`, 
						`days_of_week`,
						`price_adults`,
						`price_kids`,
						`spaces_adults`,
						`spaces_kids`,
						`start_date`,
						`end_date`,
						`repeating`,
						`property_uid`,
						`tax_rate`
						)
						VALUES 
						(
						'".$profile->title."',
						'".$profile->description."',
						'".$profile->days_of_week."',
						'".$profile->price_adults."',
						'".$profile->price_kids."',
						'".$profile->spaces_adults."',
						'".$profile->spaces_kids."',
						'".$profile->start_date."',
						'".$profile->end_date."',
						'".$profile->repeating."',
						'".$newid."',
						'".$profile->tax_rate."'
						)";
					$result = doInsertSql($query);
					}
				}
			$query = "INSERT INTO #__jomres_jintour_properties (`property_uid`)VALUES (".(int)$newid.")";
			$result = doInsertSql($query);
			}
		
		$componentArgs=array('property_uid'=>$newid);
		$MiniComponents->specificEvent('04901','jrportal',$componentArgs); // Adds the default commission rate to that property. Can't use just triggerEvent because that'll call j04901tariffsenhanced

		echo jr_gettext('_JRPORTAL_CLONEPROPERTY_DONE',_JRPORTAL_CLONEPROPERTY_DONE,FALSE)." <a href='".JOMRES_SITEPAGE_URL_NOSEF . "&task=edit_property&thisProperty=".$newid."' target='_blank'> ".$this->newPropertyName."</a>";
		}

	function importSettings($property_uid,$source_property_uid=0)
		{
		$mrConfig=getPropertySpecificSettings($property_uid);
		if ($property_uid == 0 )  // We're installing, so all settings will be inserted from jomres_config.php into the database. We'll use property_uid 0 to create baseline settings that all other properties will use as their default when they call getPropertySpecificSettings
			{
			include(JOMRESPATH_BASE.JRDS.'jomres_config.php' );
			foreach ($mrConfig as $k=>$v)
				{
				if (!insertSetting(0,$k,$v))
					error_logging("Error, couldn't import setting ".$k . " - " .$v. " for property uid 0 into the jomres_settings table ");
				}
			}
		else  // We have created a new property and are inserting their default settings into the db by pulling the default settings from the 0 property uid list
			{
			$query="SELECT akey,value FROM #__jomres_settings WHERE property_uid LIKE ".$source_property_uid." AND akey LIKE '".$k."'";
			$settingsList=doSelectSql($query);
			foreach ($settingsList as $set)
				{
				
				if (!insertSetting($property_uid,$set->akey,$set->value))
					error_logging("Error, couldn't import setting ".$set->akey . " - " .$set->value. " for property uid ".$property_uid." into the jomres_settings table ");
				}
			}
		return;
		}
		
	// Companion to the importSettings function above
	function insertSetting($property_uid,$k,$v)
		{
		$query="SELECT value FROM #__jomres_settings WHERE property_uid LIKE '".(int)$property_uid."' AND akey LIKE '".$k."'";
		$settingsList=doSelectSql($query);
		if (empty($settingsList))
			$query="INSERT INTO #__jomres_settings (property_uid,akey,value) VALUES ('".(int)$property_uid."','".$k."','".$v."')";
		else
			$query="UPDATE #__jomres_settings SET `value`='".$v."' WHERE property_uid LIKE '".(int)$property_uid."' and akey LIKE '".$k."'";
		return doInsertSql($query,'');
		}

	function getSystemTables()
		{
		$tablesFound=false;
		$query="SHOW TABLES";
		$result=doSelectSql($query,$mode=FALSE);
		$string="Tables_in_".get_showtime("db");
		foreach ($result as $r)
			{
			//var_dump($r);echo "<br>";
			$tblName=$r->$string;
			$tblName=str_replace(get_showtime("dbprefix"),"__",$tblName);
			$this->systemTables[]=$tblName;
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}