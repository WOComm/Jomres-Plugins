<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

//This is a month view chart of all paid bookings, excludes cancelled/pending/unpaid ones)
class j13600chart_subscriptions
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			return;
			}
		
		$all_jomres_charts = get_showtime("all_jomres_charts");
		
		//commissions chart
		$all_jomres_charts[] = array(
									 "id" => 'chart_subscriptions',
									 "title"=>jr_gettext("_JOMRES_STATUS_SUBSCRIPTIONS",'_JOMRES_STATUS_SUBSCRIPTIONS',false,false),
									 "description"=> jr_gettext("_JOMRES_CHART_SUBSCRIPTIONS_DESC",'_JOMRES_CHART_SUBSCRIPTIONS_DESC',false,false)
									 );
		
		set_showtime("all_jomres_charts", $all_jomres_charts);
		}

	function getRetVals()
		{
		return null;
		}
	}
