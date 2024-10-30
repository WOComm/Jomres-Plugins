<?php
	/**
	 * Core file
	 * @author Woollyinwales IT <sales@jomres.net>
	 * @version Jomres 4
	 * @package Jomres
	 * @copyright	2005-2010 Vince Wooll
	 * Jomres (tm) PHP files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly, however all images, css and javascript which are copyright Vince Wooll are not GPL licensed and are not freely distributable.
	 **/

// ################################################################
	defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	class j00035tabcontent_03_qr_code_agent
	{
		function __construct($componentArgs)
		{
			$MiniComponents =jomres_getSingleton('mcHandler');
			if ($MiniComponents->template_touch)
			{
				$this->template_touchable=true; return;
			}

			jr_import('jomres_encryption');
			$this->jomres_encryption = new jomres_encryption();

			$this->retVals = '';
			$manager_id = 0;

			$anchor = jomres_generate_tab_anchor("QR_Code");

			$property_uid = get_showtime("property_uid");
			$current_property_details =jomres_singleton_abstract::getInstance('basic_property_details');
			$current_property_details->gather_data($property_uid);

			$property_manager_xref=get_showtime('property_manager_xref');
			if (is_null($property_manager_xref))
			{
				$property_manager_xref = build_property_manager_xref_array();
			}

			if (isset($property_manager_xref[$property_uid]))
				$manager_id = $property_manager_xref[$property_uid];

			if ($manager_id > 0)
			{
				$manager_image=JOMRES_IMAGES_RELPATH.'noimage.gif';
				if (file_exists(JOMRES_IMAGELOCATION_ABSPATH.'userimages'.JRDS."userimage_".(int)$manager_id."_thumbnail.jpg"))
					$manager_image=JOMRES_IMAGELOCATION_RELPATH.'userimages/userimage_'.(int)$manager_id.'_thumbnail.jpg';

				$manager_url = jomresURL( JOMRES_SITEPAGE_URL."&task=view_agent&id=".$manager_id) ; // not currently used

				$query = "SELECT enc_firstname,enc_surname,enc_house,enc_street,enc_town,enc_county,enc_country,enc_postcode,enc_tel_landline,enc_tel_mobile,enc_email
					FROM
					#__jomres_guest_profile
					WHERE 
					cms_user_id = ".$manager_id." LIMIT 1";
				$manager_info = doSelectSql($query,2);

				if ( !empty($manager_info) )
				{
					// Note, some ( possibly dodgy ) parsers don't like =uri:tel: and instead will only work with =tel:  Vcard v4 however has uri:tel: as the standard so we'll keep that here for now.

					// Do not add tabs/spaces.

					$vcard ='BEGIN:VCARD
VERSION:4.0
KIND:individual
FN:'.$this->jomres_encryption->decrypt($manager_info['enc_firstname']).' '.$this->jomres_encryption->decrypt($manager_info['enc_surname']).'	ORG:'.$current_property_details->property_name.'
PHOTO;MEDIATYPE=image/jpeg:'.$manager_image.'
TEL;TYPE=cell,voice;VALUE=uri:tel:'.$this->jomres_encryption->decrypt($manager_info['enc_tel_mobile']).'
TEL;TYPE=work,voice;VALUE=uri:tel:'.$this->jomres_encryption->decrypt($manager_info['enc_tel_landline']).'
ADR;TYPE=work:;;'.$this->jomres_encryption->decrypt($manager_info['enc_house']).';'.$this->jomres_encryption->decrypt($manager_info['enc_street']).';'.$this->jomres_encryption->decrypt($manager_info['enc_town']).';'.$this->jomres_encryption->decrypt($manager_info['enc_county']).';'.$this->jomres_encryption->decrypt($manager_info['enc_postcode']).';'.getSimpleCountry($this->jomres_encryption->decrypt($manager_info['enc_country'])).'
EMAIL:'.$this->jomres_encryption->decrypt($manager_info['enc_email']).'
URL:'.get_property_details_url($property_uid,'nosef').'
END:VCARD
';

					$qr_code=jomres_make_qr_code ($vcard);
					$tab = array(
						"TAB_ANCHOR"=>$anchor,
						"TAB_TITLE"=>jr_gettext('_JOMRES_CUSTOMCODE_QRCODE_VCARD_TITLE',"Agent vcard",false,false),
						"TAB_CONTENT"=> '<img src="'.$qr_code[ 'relative_path' ].'" alt="Agent vcard" />'
					);
					$this->retVals = $tab;
				}
			}
		}

		function touch_template_language()
		{
			$output=array();
			$output[]=jr_gettext('_JOMRES_CUSTOMCODE_QRCODE_VCARD_TITLE',"Agent vcard");

			foreach ($output as $o)
			{
				echo $o;
				echo "<br/>";
			}
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
			return $this->retVals;
		}

	}

	/*
BEGIN:VCARD
VERSION:4.0
N:Gump;Forrest;;;
FN:Forrest Gump
ORG:Bubba Gump Shrimp Co.
TITLE:Shrimp Man
PHOTO;MEDIATYPE=image/gif:http://www.example.com/dir_photos/my_photo.gif
TEL;TYPE=work,voice;VALUE=uri:tel:+1-111-555-1212
TEL;TYPE=home,voice;VALUE=uri:tel:+1-404-555-1212
ADR;TYPE=work;LABEL="100 Waters Edge\nBaytown, LA 30314\nUnited States of America"
:;;100 Waters Edge;Baytown;LA;30314;United States of America
ADR;TYPE=home;LABEL="42 Plantation St.\nBaytown, LA 30314\nUnited States of America"
:;;42 Plantation St.;Baytown;LA;30314;United States of America
EMAIL:forrestgump@example.com
REV:20080424T195243Z
END:VCARD
	*/
