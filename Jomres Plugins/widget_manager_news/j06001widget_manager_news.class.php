<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 9.x
 * @package Jomres
 * @copyright	2005-2017 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06001widget_manager_news
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			$this->shortcode_data = array (
				"task" => "webhooks_core_documentation",
				"info" => "_JOMRES_SHORTCODES_06000WEBHOOKS_DOCS",
				"arguments" => array ()
				);
			return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
        $this->retVals = '';
		
		$property_uid = getDefaultProperty();
		
		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;
		
		$output=array();
		$pageoutput=array();

		$output['WIDGET_MANAGER_NEWS_TITLE'] = jr_gettext('WIDGET_MANAGER_NEWS_TITLE','WIDGET_MANAGER_NEWS_TITLE',false) ;
		
		jr_import('manager_news');
		$manager_news = new manager_news();
		
		$rows=array();
		$all_articles = $manager_news->get_all_articles();
		if (!empty($all_articles)) {
			foreach ($all_articles as $article) {
				if ( (int)$article['property_uid'] == 0 || (int)$article['property_uid'] == $property_uid ) {
					$r=array();
					$r['ID'] = $article['id'];
					$r['ARTICLE_TITLE'] = $article['article_title']	;
					$r['ARTICLE_CONTENT'] = $article['article_content'];
					
					$r['DATE_POSTED'] = $article['date_posted'];
					$r['ALERT_STYLE'] = $article['alert_style'];
					
					$r['ARTICLE_URL'] = '';
					if ($article['article_url'] != "" ) {
						$r['ARTICLE_URL'] ='<a href="'.$article['article_url'].'" class="btn btn-info" title="'.$r['ARTICLE_TITLE'].'" target="_blank">'.jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION', '_JOMRES_COM_A_CLICKFORMOREINFORMATION', false).'</a>';
					}
					
					
					$rows[]=$r;
				}
			}
		}
		
		
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->readTemplatesFromInput( 'widget_manager_news.html');
		
		if($output_now)
			$tmpl->displayParsedTemplate();
		else
			$this->retVals = $tmpl->getParsedTemplate();
		
		}



	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return $this->retVals;
		}
	}