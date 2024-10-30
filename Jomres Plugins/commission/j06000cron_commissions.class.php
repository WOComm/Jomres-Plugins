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

class j06000cron_commissions
	{
	function __construct()
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig = $siteConfig->get();
		
		if ($jrConfig['use_commission'] == "0")
			return;

		if ( date('d') == '01' )
			{
			$now = date( 'Y-m-d H:i:s' );
			
			$query = "UPDATE #__jomresportal_invoices SET
							`raised_date`		= '".$now."',
							`due_date`			= '".$now."'
						WHERE `raised_date` <= '1970-01-01 00:00:01' AND `is_commission` = 1 AND `status` = 3 AND `init_total` > 0 ";
			$result  = doInsertSql( $query,'' );
			}
		
		if ($jrConfig['commission_autosuspend_on_overdue'] == "0")
			return;
		
		$threashold = (int) $jrConfig[ 'commission_autosuspend_on_overdue_threashold' ];
		
		$query = "SELECT `cms_user_id` FROM #__jomresportal_invoices WHERE `is_commission` = 1 AND `raised_date` > '1970-01-01 00:00:01' AND `status` = 3 AND DATEDIFF(DATE_FORMAT(NOW(), '%Y-%m-%d'), DATE_FORMAT(`raised_date`, '%Y-%m-%d')) > ".$threashold." ";
		$result  = doSelectSql( $query );
		
		if ( !empty($result) )
			{
			foreach ($result as $manager)
				{
				jr_import( 'jomres_suspensions' );
				$jomres_suspensions = new jomres_suspensions();
				$jomres_suspensions->set_manager_id( $manager->cms_user_id );
				$jomres_suspensions->suspend_manager();
				$jomres_suspensions->unpublish_managers_properties();
				}
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
