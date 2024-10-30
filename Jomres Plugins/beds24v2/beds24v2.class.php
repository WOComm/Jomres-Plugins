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
#[AllowDynamicProperties]
class beds24v2
	{
	function __construct(){
		$ePointFilepath=get_showtime('ePointFilepath');
		$this->templateDirectory =  $ePointFilepath.'templates'.JRDS.find_plugin_template_directory();
		}

	public function output_property_row($property_name_jomres , $property_name_beds24 , $property_uid , $beds24_property_uid , $link = array(), $apikey = '' ) {
		$output = array();
		$pageoutput = array();
		$ePointFilepath=get_showtime('ePointFilepath');
		

		$output['PROPERTY_NAME_JOMRES'] = $property_name_jomres;
		$output['PROPERTY_NAME_JOMRES'] = $property_name_jomres;
		$output['PROPERTY_NAME_BEDS24'] = $property_name_beds24;
		$output['PROPERTY_UID']		 = $property_uid;
		$output['APIKEY']			   = $apikey;
		$output['BEDS24_PROPERTY_UID']  = $beds24_property_uid;
		if (!empty($link)) {
			$element = $link['ELEMENT'];
			$output[$element]  = $link['CONTENT'];
			}

		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $this->templateDirectory );
		$tmpl->readTemplatesFromInput('beds24v2_output_property_row.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		return $tmpl->getParsedTemplate();
		}
		
	public function output_error($message) {
		$output = array();
		$pageoutput = array();
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$output['MESSAGE'] = $message;
		
		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $this->templateDirectory );
		$tmpl->readTemplatesFromInput('beds24v2_output_error.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		return $tmpl->getParsedTemplate();
		}

	public function output_warning($message) {
		$output = array();
		$pageoutput = array();
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$output['MESSAGE'] = $message;
		
		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $this->templateDirectory );
		$tmpl->readTemplatesFromInput('beds24v2_output_warning.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		return $tmpl->getParsedTemplate();
		}
		
	public function output_message($message) {
		$output = array();
		$pageoutput = array();
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$output['MESSAGE'] = $message;
		
		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot($this->templateDirectory );
		$tmpl->readTemplatesFromInput('beds24v2_output_message.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		return $tmpl->getParsedTemplate();
		}
		
	public function readonly_form($message = '' , $data = '' ) {
		$output = array();
		$pageoutput = array();
		$ePointFilepath=get_showtime('ePointFilepath');
		
		$output['MESSAGE'] = $message;
		$output['DATA'] = $data;
		
		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $this->templateDirectory );
		$tmpl->readTemplatesFromInput('beds24v2_output_readonly_form.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		return $tmpl->getParsedTemplate();
		}
		
	public function button_link($message = '' , $url = '' , $button_class = 'default' ) {
		$output = array();
		$pageoutput = array();
		$ePointFilepath=get_showtime('ePointFilepath');

		$output['MESSAGE'] = $message;
		$output['URL'] = $url;
		$output['BUTTON_CLASS'] = $button_class;
		
		$pageoutput[ ] = $output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $this->templateDirectory );
		$tmpl->readTemplatesFromInput('beds24v2_button_link.html');
		$tmpl->addRows('pageoutput', $pageoutput);
		return $tmpl->getParsedTemplate();
		}
	}
