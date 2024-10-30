<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.9.17
 *
 * @copyright	2005-2018 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

class j03379property_logo
{
    public function __construct($componentArgs)
    {
        // Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
        $MiniComponents = jomres_singleton_abstract::getInstance('mcHandler');
        if ($MiniComponents->template_touch) {
            $this->template_touchable = false;

            return;
        }

        $property_uid = getDefaultProperty();
        
		$this->ret_vals = array(
								'resource_type' => 'property_logo', 
								'resource_id_required' => true, 
								'name' => jr_gettext('_JOMRES_MEDIA_CENTRE_UPLOAD_CONTEXT_PROPERTY_LOGO', '_JOMRES_MEDIA_CENTRE_UPLOAD_CONTEXT_PROPERTY_LOGO', false),
								'upload_root_abs_path' => JOMRES_IMAGELOCATION_ABSPATH.$property_uid.JRDS,
								'upload_root_rel_path' => JOMRES_IMAGELOCATION_RELPATH.$property_uid.'/',
								'notes' => '',
								'preview_link'=>'',
								'max_number_of_images' => 1 //0 = unlimited
								);
    }

    // This must be included in every Event/Mini-component
    public function getRetVals()
    {
        return $this->ret_vals;
    }
}
