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


class j16000manager_news_save
{
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable = false; return; }
		
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$id = intval(jomresGetParam($_REQUEST, 'id', 0));
		$article_title = (string) jomresGetParam($_REQUEST, 'article_title', '');
		$article_content = (string) jomresGetParam($_REQUEST, 'article_content', '');
		$article_url = (string) jomresGetParam($_REQUEST, 'article_url', '');
		$alert_style = (string) jomresGetParam($_REQUEST, 'alert_style', '');
		$property_uid = (int) jomresGetParam($_REQUEST, 'target_property', 0);
		

		jr_import('manager_news');
		$manager_news = new manager_news();
		$manager_news->id = $id ;
		$manager_news->article_title = $article_title;
		$manager_news->article_content = $article_content;
		$manager_news->article_url = $article_url;
		$manager_news->alert_style = $alert_style;
		$manager_news->property_uid = $property_uid;

		$manager_news->save_article();
		
		jomresRedirect(jomresURL(JOMRES_SITEPAGE_URL_ADMIN.'&task=widget_manager_news'), '');
	}

	public function getRetVals()
	{
		return null;
	}
}
