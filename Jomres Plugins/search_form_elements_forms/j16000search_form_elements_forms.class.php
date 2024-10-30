<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

//This is a month view chart of all paid subscriptions, excludes cancelled/pending/unpaid ones)
class j16000search_form_elements_forms
	{
	function __construct($componentArgs)
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ) {
			$this->template_touchable = false;
			return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$eLiveSite = get_showtime('eLiveSite');

		$output = array();
		$pageoutput = array();

		$output['REL_PATH'] = $eLiveSite;

		if (this_cms_is_joomla()) {
			$output['OPEN_BRACE'] = '{';
			$output['CLOSE_BRACE'] = '}';
			} else {
			$output['OPEN_BRACE'] = '[';
			$output['CLOSE_BRACE'] = ']';
		}

		$pageoutput[] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->addRows('pageoutput', $pageoutput);
		$tmpl->readTemplatesFromInput( 'search_form_elements_forms.html' );
		echo $tmpl->getParsedTemplate();
		}

	function getRetVals()
		{
		return null;
		}
	}
