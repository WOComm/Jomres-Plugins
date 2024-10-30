<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jrportal_je_custom_html_tab
	{
	function __construct()
		{
		$this->je_custom_html_tabConfigOptions=array();
		$this->je_custom_html_tabConfigOptions['content']="";
		$this->je_custom_html_tabConfigOptions['enabled']="0";
		}
	
	function get_je_custom_html_tab($puid)
		{
		$query="SELECT setting,value FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'je_custom_html_tab' ";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->je_custom_html_tabConfigOptions[$s->setting]=$s->value;
			}
		return $this->je_custom_html_tabConfigOptions;
		}

	function save_je_custom_html_tab()
		{
		$puid = (int)(jomresGetParam( $_POST, 'puid', 0 ) );
		$description=jomresGetParam( $_POST, 'description', "" );

		if ($description!="")
			updateCustomText("_JOMRES_CUSTOM_HTML_TAB_CONTENT",$description,true,$puid);
		else
			{
			$query="DELETE FROM	#__jomres_custom_text WHERE `constant` = '_JOMRES_CUSTOM_HTML_TAB_CONTENT' AND `property_uid` = ".(int)$puid." AND `language` = '".get_showtime('lang')."' ";
			doInsertSql($query,"");
			}

		foreach ($_POST as $k=>$v)
			{
			$dirty = (string) $k;
			$k=addslashes($dirty);
			if ($k!='task' && $k!='plugin' && $k !="jomrestoken" && $k !="option" && $k!='puid')
				$values[$k]=jomresGetParam( $_POST, $k, "" );
			}
		foreach ($values as $k=>$v)
			{
			$query="SELECT id FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'je_custom_html_tab' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (!empty($settingList))
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomresextras_pluginsettings SET `value`='$v' WHERE prid = ".$puid." AND plugin = 'je_custom_html_tab' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomresextras_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('$puid','je_custom_html_tab','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}
