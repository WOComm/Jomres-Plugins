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

class j06002list_extras
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		
		$ePointFilepath = get_showtime('ePointFilepath');
		$mrConfig=getPropertySpecificSettings();
		$defaultProperty=getDefaultProperty();
		$toolbar = jomres_singleton_abstract::getInstance( 'jomresItemToolbar' );
		$output=array();
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images($defaultProperty, array('extras'));

		$output['HEDITLINK']=jr_gettext('_JOMRES_COM_MR_EXTRA_LINKTEXT','_JOMRES_COM_MR_EXTRA_LINKTEXT',$editable=false,$isLink=true);
		$output['HEXNAME']=jr_gettext('_JOMRES_COM_MR_EXTRA_NAME','_JOMRES_COM_MR_EXTRA_NAME',false);
		$output['HEXDESC']=jr_gettext('_JOMRES_COM_MR_EXTRA_DESC','_JOMRES_COM_MR_EXTRA_DESC',false);
		$output['HEXPRICE']=jr_gettext('_JOMRES_COM_MR_EXTRA_PRICE','_JOMRES_COM_MR_EXTRA_PRICE',false);
		$output['HPUBLISHIMAGE']=jr_gettext('_JOMRES_COM_MR_VRCT_PUBLISHED','_JOMRES_COM_MR_VRCT_PUBLISHED',false);
		$output['HIMAGE']=jr_gettext('_JOMRES_IMAGE','_JOMRES_IMAGE',false);
		
		$query="SELECT `uid`,`name`,`desc`,`price`,`property_uid`,`published` FROM `#__jomres_extras` WHERE `property_uid` = ".(int)$defaultProperty." ORDER BY `name` ";
		$exList =doSelectSql($query);
		$rows=array();
		
		foreach($exList as $ex)
			{
			$published=$ex->published;
			if ($published)
				$img = JOMRES_IMAGES_RELPATH.'jomresimages/small/Tick.png';
			else
				$img = JOMRES_IMAGES_RELPATH.'jomresimages/small/Cancel.png';
			$rw['PUBLISHIMAGE']=$img;

			if (!using_bootstrap())
				{
				$jrtbar =jomres_getSingleton('jomres_toolbar');
				$jrtb  = $jrtbar->startTable();
				$jrtb .= $jrtbar->toolbarItem('edit',jomresURL(JOMRES_SITEPAGE_URL."&task=edit_extra&uid=".$ex->uid ),'');
				if ($published)
					{
					$jrtb .= $jrtbar->toolbarItem('publish',jomresURL(JOMRES_SITEPAGE_URL."&task=publish_extra&uid=".$ex->uid ),'');
					}
				else
					{
					$jrtb .= $jrtbar->toolbarItem('unpublish',jomresURL(JOMRES_SITEPAGE_URL."&task=publish_extra&uid=".$ex->uid ),'');
					}
				$jrtb .= $jrtbar->toolbarItem('delete',jomresURL(JOMRES_SITEPAGE_URL."&task=delete_extra&uid=".$ex->uid ),'');
				$jrtb .= $jrtbar->endTable();
				$rw['EDITLINK']=$jrtb;
				}
			else
				{
				$toolbar->newToolbar();
				if ( !$published )
					$toolbar->addSecondaryItem( 'fa fa-times', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=publish_extra' . '&uid=' . $ex->uid ), jr_gettext( '_JOMRES_COM_MR_VRCT_PUBLISH', '_JOMRES_COM_MR_VRCT_PUBLISH', false ) );
				else
					$toolbar->addSecondaryItem( 'fa fa-check', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=publish_extra' . '&uid=' . $ex->uid ), jr_gettext( '_JOMRES_COM_MR_VRCT_UNPUBLISH', '_JOMRES_COM_MR_VRCT_UNPUBLISH', false ) );
				$toolbar->addItem( 'fa fa-pencil-square-o', 'btn btn-info', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=edit_extra' . '&uid=' . $ex->uid ), jr_gettext( 'COMMON_EDIT', 'COMMON_EDIT', false ) );
				$toolbar->addSecondaryItem( 'fa fa-trash-o', '', '', jomresURL( JOMRES_SITEPAGE_URL . '&task=delete_extra' . '&uid=' . $ex->uid ), jr_gettext( 'COMMON_DELETE', 'COMMON_DELETE', false ) );
				$rw['EDITLINK']=$toolbar->getToolbar();
				}
				
			$rw[ 'EXTRA_IMAGE' ] = $jomres_media_centre_images->multi_query_images['noimage-small'];
			if (isset($jomres_media_centre_images->images['extras'][ $ex->uid ][0]['small']))
				$rw[ 'EXTRA_IMAGE' ] = $jomres_media_centre_images->images['extras'][ $ex->uid ][0]['small'];
				
			$rw['EXNAME']=jr_gettext('_JOMRES_CUSTOMTEXT_EXTRANAME'.$ex->uid, jomres_decode($ex->name) );
			$rw['EXDESC']=jr_gettext('_JOMRES_CUSTOMTEXT_EXTRADESC'.$ex->uid, jomres_decode($ex->desc) );
			
			$query                = "SELECT `model` FROM #__jomcomp_extrasmodels_models WHERE extra_id = '" . (int) $ex->uid . "'";
			$model                = doSelectSql( $query, 1 );
			
			if ($model != "100")
				$rw['EXPRICE']=output_price($ex->price);
			else
				$rw['EXPRICE']=$ex->price."%";
				
			$rows[]=$rw;
			}
		$output['PAGETITLE']=jr_gettext('_JOMRES_COM_MR_EXTRA_TITLE','_JOMRES_COM_MR_EXTRA_TITLE',false);

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		$jrtb .= $jrtbar->toolbarItem('new',jomresURL(JOMRES_SITEPAGE_URL."&task=edit_extra"),'');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;

		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'list_extras.html' );
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
