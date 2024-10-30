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

	class j06000featured_listings_asamodule_1
	{
		function __construct()
		{
			$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
			if ($MiniComponents->template_touch) {
				$this->template_touchable=false;
				$this->shortcode_data = array (
					"task" => "featured_listings_asamodule_1",
					"info" => "_JOMRES_SHORTCODES_06000FEATURED_LISTINGS_ASAMODULE_1",
					'arguments' => array(
						0 => array(
							'argument' => 'limit',
							'arg_info' => '_JOMRES_SHORTCODES_06000FEATURED_LISTINGS_ASAMODULE_1_FEATURED_LISTINGS_ASAMODULE_1_limit',
							'arg_example' => '10'
						),
						1 => array(
							'argument' => 'ptype_ids',
							'arg_info' => '_JOMRES_SHORTCODES_06000FEATURED_LISTINGS_ASAMODULE_1_FEATURED_LISTINGS_ASAMODULE_1_ptype_ids',
							'arg_example' => '1,7'
						)
					)
				);
				return;
			}

			if (isset($componentArgs[ 'output_now' ])) {
				$output_now = $componentArgs[ 'output_now' ];
			} else {
				$output_now = true;
			}
			$this->retVals = '';

			$jomresConfig_live_site=get_showtime('live_site');
			$ePointFilepath=get_showtime('ePointFilepath');
			$thisJRUser=jomres_getSingleton('jr_user');

			$task = jomresGetParam( $_REQUEST, 'task', '');
			$calledByModule = jomresGetParam( $_REQUEST, 'calledByModule', '');
			$plistpage = jomresGetParam( $_REQUEST, 'plistpage', '');
			if ( $calledByModule != "" || $plistpage != "" )
				return;

			//limit displayed properties
			$listLimit = (int)jomresGetParam( $_REQUEST, 'limit', 5);
			// e.g. "hotels:1;villas:6;camp sites:4"
			$arguments = jomresGetParam( $_REQUEST, 'ptype_ids', '' );
			$property_type_bang = explode (",",$arguments);

			if ($arguments!='') {
				$required_property_type_ids = array();
				foreach ($property_type_bang as $ptype)  {
					$required_property_type_ids[] = (int)$ptype;
				}

				$clause="AND b.ptype_id IN (".jomres_implode($required_property_type_ids).") ";
			}
			else
				$clause='';

			$rows = array();
			$output = array();
			$pageoutput=array();
			$toprowoutput = array();

			$query = "SELECT 
						a.property_uid 
					FROM #__jomresportal_featured_properties a 
						CROSS JOIN #__jomres_propertys b ON a.property_uid = b.propertys_uid 
					WHERE b.published = 1 $clause 
					ORDER BY a.order 
					LIMIT $listLimit";
			$result = doSelectSQL($query);

			if (!empty($result))  {
				$propertiesToShow=array();
				foreach ($result as $p)
				{
					$propertiesToShow[]=$p->property_uid;
				}
			}



			$rows=array();

			if(jomres_bootstrap_version() =='5') {
				$result = get_property_module_data($propertiesToShow, '', '');
				$rows = array();
				foreach ($result as $property) {
					$r=array();
					$r['PROPERTY']=$property['template'];
					$rows[]=$r;
				}
			} else {
				$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
				$current_property_details->gather_data_multi( $propertiesToShow );

				$jomres_property_list_prices = jomres_singleton_abstract::getInstance( 'jomres_property_list_prices' );
				$jomres_property_list_prices->gather_lowest_prices_multi($propertiesToShow);

				$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
				$jomres_media_centre_images->get_images_multi($propertiesToShow, array('property'));
				$animationDelay = 0;
				foreach($propertiesToShow as $puid)
				{
					$r= $this->jomresFeaturedPropertysMakeOutput($puid, $animationDelay);
					$rows[] = $r;
					$animationDelay = $animationDelay + 300;
				}
			}

			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
			$tmpl->readTemplatesFromInput( 'featured_listings_asamodule_1.html');
			$tmpl->addRows( 'pageoutput',$pageoutput);
			$tmpl->addRows( 'rows',$rows);
			$template = $tmpl->getParsedTemplate();
			if ($output_now) {
				echo $template;
			} else {
				$this->retVals = $template;
			}

		}

		function jomresFeaturedPropertysMakeOutput($puid, $animationDelay)
		{
			$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
			$jrConfig = $siteConfig->get();

			$mrConfig = getPropertySpecificSettings($puid);



			$current_property_details = jomres_singleton_abstract::getInstance( 'basic_property_details' );
			$current_property_details->gather_data( $puid );

			if ( $mrConfig['hide_local_address'] == '1' ) {
				$current_property_details->property_street =  jr_gettext('HIDDEN_ADDRESS_PLACEHOLDER', 'HIDDEN_ADDRESS_PLACEHOLDER', false);
			}

			$jomres_property_list_prices = jomres_singleton_abstract::getInstance( 'jomres_property_list_prices' );

			$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
			$jomres_media_centre_images->get_images($puid, array('property'));

			$output = array();

			$output['NAME']=$current_property_details->property_name;
			$output['STREET']=$current_property_details->property_street;
			$output['TOWN']=$current_property_details->property_town;
			$output['REGION']=$current_property_details->property_region;
			$output['COUNTRY']=$current_property_details->property_country;
			$output['DESCRIPTION']=$current_property_details->property_description;

			$output['IMAGE']=$jomres_media_centre_images->images ['property'][0][0]['small'];

			$output['MOREINFORMATION']= jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',$editable=false,true) ;

			$output['URL']=get_property_details_url($puid);
			$output['VIEW_LINK']='<a href="'.$output['URL'].'" target="_blank">'.jr_gettext('_JOMRES_COM_A_CLICKFORMOREINFORMATION','_JOMRES_COM_A_CLICKFORMOREINFORMATION',false,false).'</a>';

			$output['STARS']="<img src=\"".JOMRES_IMAGES_RELPATH."blank.png\" alt=\"star\" border=\"0\" height=\"1\" hspace=\"10\" vspace=\"1\" />";

			$stars=(int)$current_property_details->stars;
			if ($stars>0)
			{
				$starsimage="";
				for ($n=1;$n<=$stars;$n++)
				{
					$starsimage.="<img src=\"".JOMRES_IMAGES_RELPATH."star.png\" alt=\"star\" border=\"0\" />";
				}
				$output['STARS']=$starsimage;
			}
			$output[ 'SUPERIOR' ] = '';
			if ( $current_property_details->superior == 1 )
				$output[ 'SUPERIOR' ] = "<img src=\"" . JOMRES_IMAGES_RELPATH."superior.png\" alt=\"superior\" border=\"0\" />";

			$output[ 'PRICE_PRE_TEXT' ]  = $jomres_property_list_prices->lowest_prices[$puid][ 'PRE_TEXT' ];
			$output[ 'PRICE_PRICE' ]     = $jomres_property_list_prices->lowest_prices[$puid][ 'PRICE' ];
			$output[ 'PRICE_POST_TEXT' ] = $jomres_property_list_prices->lowest_prices[$puid][ 'POST_TEXT' ];

			//ANIMATIONS
			$output[ 'ANIMATION_DELAY' ] = $animationDelay;

			return $output;
		}

		// This must be included in every Event/Mini-component
		function getRetVals() {
			return $this->retVals;
		}
	}
