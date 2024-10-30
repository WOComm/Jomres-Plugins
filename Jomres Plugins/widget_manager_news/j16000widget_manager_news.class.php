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

class j16000widget_manager_news
{
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable = false; return; }

		$ePointFilepath=get_showtime('ePointFilepath');

		$output=array();
		$pageoutput=array();
		
		$output['PAGETITLE'] = jr_gettext('WIDGET_MANAGER_NEWS_TITLE','WIDGET_MANAGER_NEWS_TITLE',false);
		$output['WIDGET_MANAGER_NEWS_DESCRIPTION'] = jr_gettext('WIDGET_MANAGER_NEWS_DESCRIPTION','WIDGET_MANAGER_NEWS_DESCRIPTION',false);
		
		$output['WIDGET_MANAGER_NEWS_ARTICLE_TITLE'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_TITLE','WIDGET_MANAGER_NEWS_ARTICLE_TITLE',false);
		$output['WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT','WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT',false);
		$output['WIDGET_MANAGER_NEWS_ARTICLE_DATE'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_DATE','WIDGET_MANAGER_NEWS_ARTICLE_DATE',false);
		$output['WIDGET_MANAGER_NEWS_TARGET_PROPERTY'] = jr_gettext('WIDGET_MANAGER_NEWS_TARGET_PROPERTY','WIDGET_MANAGER_NEWS_TARGET_PROPERTY',false);
		
		$jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
		$jrtb = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('cancel', jomresURL(JOMRES_SITEPAGE_URL_ADMIN), '');
		$jrtb .= $jrtbar->toolbarItem('new', jomresURL(JOMRES_SITEPAGE_URL_ADMIN.'&task=manager_news_edit'), '');
		$jrtb .= $jrtbar->endTable();
		$output[ 'JOMRESTOOLBAR' ] = $jrtb;
		
		jr_import('manager_news');
		$manager_news = new manager_news();
		
		$rows=array();
		$all_articles = $manager_news->get_all_articles();
		if (!empty($all_articles)) {
			foreach ($all_articles as $article) {
				$r=array();
				
				$r['ID'] = $article['id'];
				$r['ARTICLE_TITLE'] = $article['article_title']	;
				$r['ARTICLE_CONTENT'] = $article['article_content'];
				$r['ARTICLE_URL'] = $article['article_url'];
				$r['DATE_POSTED'] = $article['date_posted'];
				$r['ALERT_STYLE'] = $article['alert_style'];
				
				$r['PROPERTY_NAME'] = "";
				if ( (int)$article['property_uid'] > 0 ) {
					$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
					$property_name = $current_property_details->get_property_name($article['property_uid']);
					$r['PROPERTY_NAME'] = $property_name;
				}
				
				$toolbar = jomres_singleton_abstract::getInstance('jomresItemToolbar');
				$toolbar->newToolbar();
				$toolbar->addItem('fa fa-pencil-square-o', 'btn btn-info', '', jomresURL(JOMRES_SITEPAGE_URL_ADMIN.'&task=manager_news_edit&id='.$article['id']), jr_gettext('COMMON_EDIT', 'COMMON_EDIT', false));
				$r['EDITLINK'] = $toolbar->getToolbar();

				$rows[]=$r;
			}
		}

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_news_articles.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		
	}

	public function getRetVals()
	{
		return null;
	}
}
