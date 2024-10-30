<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jrportal_western_union
	{
	function __construct()
		{
		$this->western_unionConfigOptions=array();
		$this->western_unionConfigOptions['override_active']="0";
		$this->western_unionConfigOptions['active']="0";
		$this->western_unionConfigOptions['accountholder']="";
		$this->western_unionConfigOptions['bankiban']="";
		$this->western_unionConfigOptions['bankswift']="";
		$this->western_unionConfigOptions['bankbic']="";
		$this->western_unionConfigOptions['bankname']="";
		$this->western_unionConfigOptions['accountholder1']="";
		$this->western_unionConfigOptions['bankiban1']="";
		$this->western_unionConfigOptions['bankswift1']="";
		$this->western_unionConfigOptions['bankbic1']="";
		$this->western_unionConfigOptions['bankname1']="";
		$this->western_unionConfigOptions['accountholder2']="";
		$this->western_unionConfigOptions['bankiban2']="";
		$this->western_unionConfigOptions['bankswift2']="";
		$this->western_unionConfigOptions['bankbic2']="";
		$this->western_unionConfigOptions['bankname2']="";
		}
	
	function get_western_union($property_uid = 0)
		{
		$query="SELECT setting,value FROM #__jomres_pluginsettings WHERE prid = '$property_uid' AND plugin = 'western_union'";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->western_unionConfigOptions[$s->setting]=$s->value;
			}
		return $this->western_unionConfigOptions;
		}

	function save_western_union($property_uid = 0)
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
			$query="SELECT id FROM #__jomres_pluginsettings WHERE prid = '$property_uid' AND plugin = 'western_union' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (!empty($settingList))
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomres_pluginsettings SET `value`='$v' WHERE prid = '$property_uid' AND plugin = 'western_union' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomres_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('$property_uid','western_union','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}
