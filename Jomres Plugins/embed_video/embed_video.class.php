<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2010 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jrportal_embed_video
	{
	function __construct()
		{
		$this->embed_videoConfigOptions=array();
		$this->embed_videoConfigOptions['video']="";
		$this->embed_videoConfigOptions['enabled']="0";
		$this->embed_videoConfigOptions['width']="480";
		$this->embed_videoConfigOptions['height']="385";
		}
	
	function get_embed_video($puid)
		{
		$query="SELECT setting,value FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'embed_video' ";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->embed_videoConfigOptions[$s->setting]=$s->value;
			}
		return $this->embed_videoConfigOptions;
		}

	function save_embed_video()
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
			$query="SELECT id FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'embed_video' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (!empty($settingList))
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomresextras_pluginsettings SET `value`='$v' WHERE prid = ".$puid." AND plugin = 'embed_video' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomresextras_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('$puid','embed_video','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}
