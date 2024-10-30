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
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class manager_news
	{
	function __construct(){
		$this->id = 0;
		$this->article_title = '';
		$this->article_content = '';
		$this->article_url = '';
		$this->date_posted = '';
		$this->alert_style = 'success';
		$this->property_uid = 0;
		}

	function get_all_articles() {
		$articles = array();
		
		$query = 'SELECT `id`,`article_title`,`article_content`, `article_url`, `date_posted`, `alert_style` , `property_uid` FROM #__jomres_manager_news';
		$result = doSelectSql($query);

		if (empty($result)) {
			return false;
		}

		foreach ($result as $r) {
			$id = (int) $r->id;
			$articles[$id]['id'] = $r->id;
			$articles[$id]['article_title'] = $r->article_title;
			$articles[$id]['article_content'] = $r->article_content;
			$articles[$id]['article_url'] = $r->article_url;
			$articles[$id]['date_posted'] = $r->date_posted;
			$articles[$id]['alert_style'] = $r->alert_style;
			$articles[$id]['property_uid'] = $r->property_uid;
			}
		return $articles;
		}

  	function get_news_article () {
		if ( $this->id == 0 ) {
			return false;
		}

		$query = 'SELECT `id`,`article_title`,`article_content`, `article_url`, `date_posted`, `alert_style` , `property_uid` FROM #__jomres_manager_news WHERE `id` = '. $this->id;
		$result = doSelectSql($query);

		if (empty($result)) {
			return false;
		}

		foreach ($result as $r) {
			$this->id = (int)$r->id;
			$this->article_title = $r->article_title;
			$this->article_content = $r->article_content;
			$this->article_url = $r->article_url;
			$this->date_posted = $r->date_posted;
			$this->alert_style = $r->alert_style;
			$this->property_uid = $r->property_uid;
			}
		return true;
	}

	function save_article(){
		if ( $this->id == 0 ) {
			$query = "INSERT INTO #__jomres_manager_news
					(
					`article_title` ,
					`article_content`,
					`article_url`,
					`date_posted`,
					`alert_style`,
					`property_uid`
					) 
				VALUES 
					(
					'".$this->article_title."', 
					'".$this->article_content."',
					'".$this->article_url."',
					NOW(),
					'".$this->alert_style."',
					".$this->property_uid."
					)
					";
			$this->id = doInsertSql($query);
		} else {
			$query = " UPDATE #__jomres_manager_news SET
					`article_title` = '".$this->article_title."',
					`article_content` = '".$this->article_content."',
					`article_url` = '".$this->article_url."',
					`alert_style` = '".$this->alert_style."',
					`property_uid` = ".$this->property_uid."
					WHERE id = ".(int)$this->id;
			doInsertSql($query);
		}
	}
	
	function delete_article() {
		if ($this->id == 0) {
			return false;
		}
		
		$query = "DELETE FROM #__jomres_manager_news WHERE id = ".(int)$this->id;
		doInsertSql($query);
	}
	
	
	function make_context_dropdown() {
		
		$options = array();
		$options[] = jomresHTML::makeOption('success', jr_gettext('WIDGET_MANAGER_NEWS_CONTEXT_SUCCESS', 'WIDGET_MANAGER_NEWS_CONTEXT_SUCCESS', false) );
		$options[] = jomresHTML::makeOption('info', jr_gettext('WIDGET_MANAGER_NEWS_CONTEXT_INFO', 'WIDGET_MANAGER_NEWS_CONTEXT_INFO', false) );
		$options[] = jomresHTML::makeOption('warning', jr_gettext('WIDGET_MANAGER_NEWS_CONTEXT_WARNING', 'WIDGET_MANAGER_NEWS_CONTEXT_WARNING', false) );
		$options[] = jomresHTML::makeOption('danger', jr_gettext('WIDGET_MANAGER_NEWS_CONTEXT_DANGER', 'WIDGET_MANAGER_NEWS_CONTEXT_DANGER', false) );
		
		return jomresHTML::selectList($options, 'alert_style', 'class="inputbox" ', 'value', 'text', $this->alert_style );
	}
}
	
