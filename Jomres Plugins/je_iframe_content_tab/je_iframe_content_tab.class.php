<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jrportal_je_iframe_content_tab
	{
	function __construct()
		{
		$this->je_iframe_content_tabConfigOptions=array();
		$this->je_iframe_content_tabConfigOptions['iframeurl']="";
		$this->je_iframe_content_tabConfigOptions['enabled']="0";
		$this->je_iframe_content_tabConfigOptions['width']="100%";
		$this->je_iframe_content_tabConfigOptions['height']="400";
		}
	
	function get_je_iframe_content_tab($puid)
		{
		$query="SELECT setting,value FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'je_iframe_content_tab' ";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->je_iframe_content_tabConfigOptions[$s->setting]=$s->value;
			}
		return $this->je_iframe_content_tabConfigOptions;
		}

	function save_je_iframe_content_tab()
		{
		$puid = (int)(jomresGetParam( $_POST, 'puid', 0 ) );
		foreach ($_POST as $k=>$v)
			{
			$dirty = (string) $k;
			$k=addslashes($dirty);
			if ($k!='task' && $k!='plugin' && $k !="jomrestoken" && $k !="option" && $k!='puid')
				$values[$k]=jomresGetParam( $_POST, $k, "" );
			}
		foreach ($values as $k=>$v)
			{
			$query="SELECT id FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'je_iframe_content_tab' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (!empty($settingList))
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomresextras_pluginsettings SET `value`='$v' WHERE prid = ".$puid." AND plugin = 'je_iframe_content_tab' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomresextras_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('$puid','je_iframe_content_tab','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}
