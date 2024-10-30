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
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j06000search_form_hidden_field
	{
	function __construct( $componentArgs )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
				return;
			}

            /*
             * Valid fields
             *
             * country : country
             * region : region
             * town : town
             * stars : stars[]
             * property_type : ptype
             * feature : feature_uids[]
             */

            $valid_fields = array(
                'country' => 'country',
                'region' => 'region',
                'town' => 'town',
                'stars' => 'stars[]',
                'property_type' => 'ptype',
                'feature' => 'feature_uids[]'
            );

            $field = jomresGetParam($_REQUEST , 'field' , '' );
            $value = jomresGetParam($_REQUEST , 'value' , '' );

            if (!in_array($field, array_keys($valid_fields))) {
                return;
            }

            echo '<input type="hidden" name="'.$valid_fields[$field].'" value="'.$value.'">';
		}

	/**
	#
	 * Must be included in every mini-component
	#
	 * Returns any settings the the mini-component wants to send back to the calling script. In addition to being returned to the calling script they are put into an array in the mcHandler object as eg. $mcHandler->miniComponentData[$ePoint][$eName]
	#
	 */
	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}


