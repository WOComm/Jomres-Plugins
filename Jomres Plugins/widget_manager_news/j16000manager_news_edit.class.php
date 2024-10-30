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


class j16000manager_news_edit
{
	public function __construct($componentArgs)
	{
		$MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
		if ($MiniComponents->template_touch) { $this->template_touchable = false; return; }
		
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$id = intval(jomresGetParam($_REQUEST, 'id', 0));
		
		$output=array();
		$pageoutput=array();
		
		$output['PAGETITLE'] = jr_gettext('WIDGET_MANAGER_NEWS_TITLE','WIDGET_MANAGER_NEWS_TITLE',false);
		$output['WIDGET_MANAGER_NEWS_DESCRIPTION'] = jr_gettext('WIDGET_MANAGER_NEWS_DESCRIPTION','WIDGET_MANAGER_NEWS_DESCRIPTION',false);
		
		$output['WIDGET_MANAGER_NEWS_ARTICLE_TITLE'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_TITLE','WIDGET_MANAGER_NEWS_ARTICLE_TITLE',false);
		$output['WIDGET_MANAGER_NEWS_ARTICLE_CONTENT'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_CONTENT','WIDGET_MANAGER_NEWS_ARTICLE_CONTENT',false);
		$output['WIDGET_MANAGER_NEWS_ARTICLE_URL'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_URL','WIDGET_MANAGER_NEWS_ARTICLE_URL',false);
		$output['WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT'] = jr_gettext('WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT','WIDGET_MANAGER_NEWS_ARTICLE_CONTEXT',false);
		$output['WIDGET_MANAGER_NEWS_TARGET_PROPERTY'] = jr_gettext('WIDGET_MANAGER_NEWS_TARGET_PROPERTY','WIDGET_MANAGER_NEWS_TARGET_PROPERTY',false);
		
		
        $jrtbar = jomres_singleton_abstract::getInstance('jomres_toolbar');
        $jrtb = $jrtbar->startTable();

        $jrtb .= $jrtbar->toolbarItem('cancel', JOMRES_SITEPAGE_URL_ADMIN.'&task=widget_manager_news', '');
        $jrtb .= $jrtbar->toolbarItem('save', '', '', true, 'manager_news_save');
        if ($id > 0) {
            $jrtb .= $jrtbar->toolbarItem('delete', JOMRES_SITEPAGE_URL_ADMIN.'&task=manager_news_delete'.'&no_html=1&id='.$id, '');
        }
        $jrtb .= $jrtbar->endTable();
        $output[ 'JOMRESTOOLBAR' ] = $jrtb;

		jr_import("jomres_properties");
		$properties = new jomres_properties();
		$properties->get_all_properties();
		$property_uids = $properties->all_property_uids;

		$current_property_details = jomres_singleton_abstract::getInstance('basic_property_details');
        $property_names = $current_property_details->get_property_name_multi($property_uids['all_propertys']);

		$propertyOptions = array  ();
		$propertyOptions[ ] = jomresHTML::makeOption( 0, "" );
		foreach ( $property_names as $property_uid=>$property_name ) {
			$propertyOptions[ ] = jomresHTML::makeOption( $property_uid, $property_name );
		}

		
		jr_import('manager_news');
		$manager_news = new manager_news();
		$manager_news->id = $id ;
		$manager_news->get_news_article ();
		
		$output['ID'] = $id;
		$output['ARTICLE_TITLE'] = $manager_news->article_title;
		$output['ARTICLE_CONTENT'] = $manager_news->article_content;
		$output['ARTICLE_URL'] = $manager_news->article_url;
		$output['ALERT_STYLE'] = $manager_news->make_context_dropdown();
		$output[ 'PROPERTYNAMES' ] = jomresHTML::selectList($propertyOptions, 'target_property', 'size="1" ', 'value', 'text', $manager_news->property_uid );

		

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_manager_article.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->displayParsedTemplate();
		
	}

	public function getRetVals()
	{
		return null;
	}
}
