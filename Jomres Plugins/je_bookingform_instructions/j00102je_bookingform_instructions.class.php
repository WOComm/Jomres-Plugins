<?php
/**
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
* @author Aladar Barthi <sales@jomres-extras.com>
* @copyright 2009-2012 Aladar Barthi
**/
// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j00102je_bookingform_instructions
	{
	function __construct( $componentArgs = array () )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;

			return;
			}
		$property_uid = get_showtime( 'property_uid' );
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$je_bookingform_instructions = new jrportal_je_bookingform_instructions();
		$je_bookingform_instructions->get_je_bookingform_instructions($property_uid);
		if ($je_bookingform_instructions->je_bookingform_instructionsConfigOptions['enabled']=="1") 
			{
			$output=array();
			$output['CONTENT']=jr_gettext('_JE_BOOKINGFORM_INSTRUCTIONS_CONTENT', trim(stripslashes($je_bookingform_instructions->je_bookingform_instructionsConfigOptions['content'])),false,false);
			if ($output['CONTENT']!='')
				{
				$pageoutput[]=$output;
				$tmpl = new patTemplate();
				$tmpl->addRows( 'pageoutput', $pageoutput );
				$tmpl->setRoot( $ePointFilepath.JRDS.'templates'.JRDS.find_plugin_template_directory() );
				$tmpl->readTemplatesFromInput( 'je_bookingform_instructions.html');
				$tmpl->displayParsedTemplate();
				}
			}

		}

	//Must be included in every mini-component
	function getRetVals()
		{
		return null;
		}
	}
