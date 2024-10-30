<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class jrportal_je_bookingform_instructions
	{
	function __construct()
		{
		$this->je_bookingform_instructionsConfigOptions=array();
		$this->je_bookingform_instructionsConfigOptions['content']="";
		$this->je_bookingform_instructionsConfigOptions['enabled']="0";
		}
	
	function get_je_bookingform_instructions($puid)
		{
		$query="SELECT setting,value FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'je_bookingform_instructions' ";
		$settingList=doSelectSql($query);
		foreach ($settingList as $s)
			{
			$this->je_bookingform_instructionsConfigOptions[$s->setting]=$s->value;
			}
		return $this->je_bookingform_instructionsConfigOptions;
		}

	function save_je_bookingform_instructions()
		{
		$puid = (int)(jomresGetParam( $_POST, 'puid', 0 ) );
		$description=jomresGetParam( $_POST, 'description', '' );
		if ($description!="")
			updateCustomText("_JE_BOOKINGFORM_INSTRUCTIONS_CONTENT",$description,true,$puid);
		else
			{
			$query="DELETE FROM	#__jomres_custom_text WHERE constant = '_JE_BOOKINGFORM_INSTRUCTIONS_CONTENT' AND property_uid = '".(int)$puid."' AND language = '".get_showtime('lang')."'";
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
			$query="SELECT id FROM #__jomresextras_pluginsettings WHERE prid = ".$puid." AND plugin = 'je_bookingform_instructions' AND setting = '$k'";
			$settingList=doSelectSql($query);
			if (!empty($settingList))
				{
				foreach ($settingList as $set)
					{
					$id=$set->id;
					}
				$query="UPDATE #__jomresextras_pluginsettings SET `value`='$v' WHERE prid = ".$puid." AND plugin = 'je_bookingform_instructions' AND setting = '$k'";
				doInsertSql($query,"");
				}
			else
				{
				$query="INSERT INTO #__jomresextras_pluginsettings
					(`prid`,`plugin`,`setting`,`value`) VALUES
					('$puid','je_bookingform_instructions','$k','$v')";
				doInsertSql($query,"");
				}
			}
		}
	}
