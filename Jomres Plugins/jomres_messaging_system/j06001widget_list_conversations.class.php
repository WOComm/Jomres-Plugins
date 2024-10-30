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

class j06001widget_list_conversations
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

		if (jomres_bootstrap_version() != "5") {
			return;
		}

		$use_messaging_system = get_showtime('use_messaging_system') ;
		if ($use_messaging_system == "0" ) {
			return;
		}

		$property_uid = getDefaultProperty();

		if (isset($componentArgs[ 'output_now' ]))
			$output_now = $componentArgs[ 'output_now' ];
		else
			$output_now = true;

		$output=array();
		$pageoutput=array();

		$output['CONVERSATIONS'] = $MiniComponents->specificEvent('06005', 'list_conversations', array('output_now' => false , 'no_datatables' => true ));
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->readTemplatesFromInput( 'widget_list_conversations.html');
		
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