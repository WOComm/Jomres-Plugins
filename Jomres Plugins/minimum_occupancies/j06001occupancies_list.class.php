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


class j06001occupancies_list {
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$ePointFilepath=get_showtime('ePointFilepath');
		$defaultProperty=getDefaultProperty();
		$output=array();
		
		$current_property_details =jomres_getSingleton('basic_property_details');
		$current_property_details->gather_data($defaultProperty);

		
		jr_import('jomres_occupancies');
		$occupancies = new jomres_occupancies();
		$occupancies->property_uid = $defaultProperty;
		$occupancies->get_all_by_property_uid();
		
		
		$output['PAGETITLE']=jr_gettext('_OCCUPANCIES_TITLE','_OCCUPANCIES_TITLE',false,false);
		
		
		$output['_OCCUPANCIES_DESCRIPTION']=jr_gettext('_OCCUPANCIES_DESCRIPTION','_OCCUPANCIES_DESCRIPTION',false,false);
		$output['_OCCUPANCIES_NUMBER_OF_GUESTTYPE']=jr_gettext('_OCCUPANCIES_NUMBER_OF_GUESTTYPE','_OCCUPANCIES_NUMBER_OF_GUESTTYPE',false,false);
		
		$query="SELECT `id`,`type` FROM `#__jomres_customertypes` where property_uid = ".(int)$defaultProperty." AND published = '1'";
		$gtypes =doSelectSql($query);
		$guest_types = array();
		if (!empty($gtypes))
			{
			foreach ($gtypes as $gtype)
				{
				$guest_types[$gtype->id]=$gtype->type;
				}
			}
		else
			{
			echo jr_gettext('_OCCUPANCIES_NO_GUESTTYPES','_OCCUPANCIES_NO_GUESTTYPES',false,false);
			return;
			}
			
		$rows=array();
		foreach($current_property_details->this_property_room_classes as $room_type_id=>$room_type)
			{
			$r = array();
			$r['abbv'] = $room_type['abbv'];
			$r['desc'] = $room_type['desc'];
			$r['image'] = JOMRES_IMAGELOCATION_RELPATH.'rmtypes/'.$room_type['image'];
			//$r['guest_type'] = $room_type['guest_type'];
			$r['guest_type_number'] = 'N/A';
			$r['room_type_id'] = $room_type_id;
			$numbers = '';
			if (isset($occupancies->all_occupancies[$room_type_id]))
				{
				$map=$occupancies->all_occupancies[$room_type_id]['guest_type_map'];
				
				foreach ($map as $key=>$val)
					{
					$numbers .= $guest_types[$key]." ".$val." ";
					}
				}

			$r['NUMBERS']=$numbers;
			
			$r['EDITLINK']='<a href="'.jomresURL(JOMRES_SITEPAGE_URL.'&task=occupancies_edit&room_type_id='.$r['room_type_id']).'">'.$r['abbv'].'</a>';
			$rows[]=$r;
			}

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		//$jrtb .= $jrtbar->toolbarItem('new',jomresURL(JOMRES_SITEPAGE_URL."&task=occupancies_edit"),'');
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL.""),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'occupancies_list.html');
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	
	function touch_template_language()
		{
		$output=array();


		$output[]		=jr_gettext('_JOMRES_COM_MR_EXTRA_TITLE','_JOMRES_COM_MR_EXTRA_TITLE');
		$output[]		=jr_gettext('_JOMRES_COM_MR_EXTRA_LINKTEXT','_JOMRES_COM_MR_EXTRA_LINKTEXT');
		$output[]		=jr_gettext('_JOMRES_COM_MR_EXTRA_NAME','_JOMRES_COM_MR_EXTRA_NAME');
		$output[]		=jr_gettext('_JOMRES_COM_MR_EXTRA_DESC','_JOMRES_COM_MR_EXTRA_DESC');
		$output[]		=jr_gettext('_JOMRES_COM_MR_EXTRA_PRICE','_JOMRES_COM_MR_EXTRA_PRICE');
		$output[]		=jr_gettext('_JOMRES_COM_MR_VRCT_PUBLISHED','_JOMRES_COM_MR_VRCT_PUBLISHED');

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
		return null;
		}
	}
