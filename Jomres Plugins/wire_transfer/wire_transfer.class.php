<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jrportal_wire_transfer
	{
	function __construct()
		{
		$this->wire_transferConfigOptions=array();
		$this->wire_transferConfigOptions['override_active']="0";
		$this->wire_transferConfigOptions['active']="0";
		$this->wire_transferConfigOptions['accountholder']="";
		$this->wire_transferConfigOptions['bankiban']="";
		$this->wire_transferConfigOptions['bankswift']="";
		$this->wire_transferConfigOptions['bankbic']="";
		$this->wire_transferConfigOptions['bankname']="";
		$this->wire_transferConfigOptions['accountholder1']="";
		$this->wire_transferConfigOptions['bankiban1']="";
		$this->wire_transferConfigOptions['bankswift1']="";
		$this->wire_transferConfigOptions['bankbic1']="";
		$this->wire_transferConfigOptions['bankname1']="";
		$this->wire_transferConfigOptions['accountholder2']="";
		$this->wire_transferConfigOptions['bankiban2']="";
		$this->wire_transferConfigOptions['bankswift2']="";
		$this->wire_transferConfigOptions['bankbic2']="";
		$this->wire_transferConfigOptions['bankname2']="";
		}
	
	function get_wire_transfer($property_uid = 0)
		{
		$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = '$property_uid' AND plugin = 'wire_transfer'";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->wire_transferConfigOptions[$s->setting]=$s->value;
			}
		return $this->wire_transferConfigOptions;
		}

	function save_wire_transfer($property_uid = 0)
		{
		foreach ($_POST as $k=>$v)
			{
			$dirty = (string) $k;
			$k=addslashes($dirty);
			if ($k!='task' && $k!='plugin' && $k !="jomrestoken" && $k !="option" )
				$values[$k]=jomresGetParam( $_POST, $k, "" );
			}
		foreach ($values as $k=>$v)
			{
			$query="SELECT id FROM #__jomres_pluginsettings WHERE prid = '$property_uid' AND plugin = 'wire_transfer' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (!empty($settingList))
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomres_pluginsettings SET `value`='$v' WHERE prid = '$property_uid' AND plugin = 'wire_transfer' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomres_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('$property_uid','wire_transfer','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}
