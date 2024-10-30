<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.9.4
 *
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################


class j16000manager_news_delete
{
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable = false; return; }
		
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$id = intval(jomresGetParam($_REQUEST, 'id', 0));

		jr_import('manager_news');
		$manager_news = new manager_news();
		$manager_news->id = $id ;

		$manager_news->delete_article();
		
		jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL_ADMIN.'&task=widget_manager_news'), '');
	}

	public function getRetVals()
	{
		return null;
	}
}
