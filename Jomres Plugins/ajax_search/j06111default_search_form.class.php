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

class j06111default_search_form
	{
	function __construct()
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		
		$feature_uids = jomresGetParam( $_REQUEST, 'feature_uids', array() );
		
		$st="";
		if(!empty($feature_uids))
			{
			
			foreach ($feature_uids as $id)
				{
				$st.="'%,".(int)$id.",%' AND property_features LIKE ";
				}
			$st=substr($st,0,-28);
			}
		$arr = array();
		if ( $st != "" )
			{
			$query="SELECT propertys_uid FROM #__jomres_propertys WHERE property_features LIKE $st AND published = '1'";
			$result = doSelectSql($query);
			
			
			if (!empty($result))
				{
				foreach ($result as $r)
					$arr[]=$r->propertys_uid;
				}
			}
		$this->ret_vals = $arr;
		}
	
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->ret_vals;
		}
	}
