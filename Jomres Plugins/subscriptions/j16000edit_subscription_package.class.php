<?php
	/**
	 * Core plugin.
	 *
	 * @author Vince Wooll <sales@jomres.net>
	 *
	 *  @version Jomres 10.7.0
	 *
	 * @copyright	2005-2023 Vince Wooll
	 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
	 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( 'Direct Access to this file is not allowed.' );
// ################################################################

class j16000edit_subscription_package 
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return 
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}

		$id = intval(jomresGetParam( $_REQUEST, 'id', 0 ));
		
		$ePointFilepath = get_showtime('ePointFilepath');
		
		$siteConfig = jomres_singleton_abstract::getInstance( 'jomres_config_site_singleton' );
		$jrConfig   = $siteConfig->get();
		
		if ( (int)$jrConfig[ 'useSubscriptions' ] != 1 )
			return;

		$jrportal_taxrate = jomres_singleton_abstract::getInstance( 'jrportal_taxrate' );
		
		jr_import('jrportal_subscriptions');
		$jrportal_subscriptions = new jrportal_subscriptions();

		if ($id > 0)
			{
			$jrportal_subscriptions->package['id'] = $id;
			if ($jrportal_subscriptions->getSubscriptionPackage() === false)
				{
				$jrportal_subscriptions->package['id'] = 0;
				$id = 0;
				}
			}

		$output = array();
		$rows = array();

		$output['PAGETITLE']		=jr_gettext('_SUBSCRIPTIONS_HEDIT','_SUBSCRIPTIONS_HEDIT',FALSE);
		$output['HNAME']			=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_NAME',FALSE);
		$output['HDESCRIPTION']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_DESCRIPTION',FALSE);
		$output['HPUBLISHED']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_PUBLISHED',FALSE);
		$output['HFREQUENCY']		=jr_gettext('_SUBSCRIPTIONS_HFREQUENCY_DAYS','_SUBSCRIPTIONS_HFREQUENCY_DAYS',FALSE);
		$output['HFREQUENCY_DESC']	=jr_gettext('_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC','_SUBSCRIPTIONS_HFREQUENCY_DAYS_DESC',FALSE);
		$output['HFULLAMOUNT']		=jr_gettext('_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT','_JRPORTAL_SUBSCRIPTIONS_PACKAGES_FULLAMOUNT',FALSE);
		$output['HTAXCODE']			=jr_gettext('_JRPORTAL_TAXRATES_CODE','_JRPORTAL_TAXRATES_CODE',FALSE);
		$output['HCURRENCYCODE']	=jr_gettext('_JOMRES_COM_A_CURRENCYCODE','_JOMRES_COM_A_CURRENCYCODE',FALSE);
		$output['HPUBLISHED']		=jr_gettext('_JOMRES_STATUS_PUBLISHED','_JOMRES_STATUS_PUBLISHED',FALSE);
		$output['HRENEWALPRICE']	=jr_gettext('_SUBSCRIPTIONS_HRENEWAL_PRICE','_SUBSCRIPTIONS_HRENEWAL_PRICE',FALSE);
		$output['HRENEWALPRICEDESC']=jr_gettext('_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL','_SUBSCRIPTIONS_HRENEWAL_PRICE_EXPL',FALSE);
		$output['HPACKAGE_FEATURES']=jr_gettext('_SUBSCRIPTIONS_HPACKAGE_FEATURES','_SUBSCRIPTIONS_HPACKAGE_FEATURES',FALSE);
		$output['HPACKAGE_DETAILS']	=jr_gettext('_SUBSCRIPTIONS_HPACKAGE_DETAILS','_SUBSCRIPTIONS_HPACKAGE_DETAILS',FALSE);
		//$output['HPACKAGE_EMAILS']	=jr_gettext('_JOMRES_EMAIL_TEMPLATES_TITLE','_JOMRES_EMAIL_TEMPLATES_TITLE',FALSE);

		$output['ID']				=$jrportal_subscriptions->package['id'];
		$output['NAME']				=$jrportal_subscriptions->package['name'];
		$output['DESCRIPTION']		=$jrportal_subscriptions->package['description'];
		$output['PUBLISHED']		=$jrportal_subscriptions->package['published'];
		$output['FREQUENCY']		=$jrportal_subscriptions->package['frequency'];
		$output['FULLAMOUNT']		=$jrportal_subscriptions->package['full_amount'];
		$output['RENEWALPRICE']		=$jrportal_subscriptions->package['renewal_price'];
		$output['TAXCODEDROPDOWN']	=$jrportal_taxrate->makeTaxratesDropdown($jrportal_subscriptions->package['tax_code_id']);
		
		$currency_codes = jomres_singleton_abstract::getInstance('currency_codes');
		
		if ($id > 0){
			$output['CURRENCYCODE'] = $currency_codes->makeCodesDropdown($jrportal_subscriptions->package['currencycode'], false, "currencycode");
			}
		else{
			$output['CURRENCYCODE'] = $currency_codes->makeCodesDropdown($jrConfig[ 'globalCurrencyCode' ], false, "currencycode");
			}
		
		$options = array();
		$options[] = jomresHTML::makeOption( '0', jr_gettext( '_JOMRES_COM_MR_NO', '_JOMRES_COM_MR_NO', false ) );
		$options[] = jomresHTML::makeOption( '1', jr_gettext( '_JOMRES_COM_MR_YES', '_JOMRES_COM_MR_YES', false ) );
		$output['PUBLISHED']=jomresHTML::selectList( $options, 'published',' ', 'value', 'text', (int)$jrportal_subscriptions->package['published']);
		
		//package options
		$MiniComponents->triggerEvent( '00007' );
		
		$subscribable_features = get_showtime("subscribable_features");

		if (!is_null($subscribable_features) && !empty($subscribable_features))
			{
			foreach ($subscribable_features as $feature=>$f)
				{
				$r = array();
				
				$r['NAME'] = $f['friendlyname'];
				
				switch ( $f['input_type'] )
					{
					case "dropdown":
						if (!isset($jrportal_subscriptions->package['params'][$f['name']]))
							{
							$jrportal_subscriptions->package['params'][$f['name']] = '';
							}

						$r['SETTING'] = jomresHTML::selectList( $options, $f['name'],' ', 'value', 'text', (int)$jrportal_subscriptions->package['params'][$f['name']]);
						break;
					
					case "text":
						if (!isset($jrportal_subscriptions->package['params'][$f['name']]))
							{
							$jrportal_subscriptions->package['params'][$f['name']] = '';
							}

						$r['SETTING'] = '<input type="text" name="'.$f['name'].'" class="inputbox input-large input-lg" value="'.(int)$jrportal_subscriptions->package['params'][$f['name']].'" />';
						break;
					
					case "number":
						if (!isset($jrportal_subscriptions->package['params'][$f['name']]))
							{
							$jrportal_subscriptions->package['params'][$f['name']] = $f['input_min'];
							}

						$r['SETTING'] = '<input type="number" name="'.$f['name'].'" class="inputbox input-small input-sm" min="'.$f['input_min'].'" max="'.$f['input_max'].'" value="'.(int)$jrportal_subscriptions->package['params'][$f['name']].'" />';
						break;
						
					default:
						if (!isset($jrportal_subscriptions->package['params'][$f['name']]))
							{
							$jrportal_subscriptions->package['params'][$f['name']] = '';
							}

						$r['SETTING'] = jomresHTML::selectList( $options, $f['name'],' ', 'value', 'text', (int)$jrportal_subscriptions->package['params'][$f['name']]);
					}

				if ( isset($f['friendlydesc']) && $f['friendlydesc'] != '' )
					$r['DESC'] = $f['friendlydesc'];
				else
					$r['DESC'] = '';
				
				$rows[] = $r;
				}
			}

		$output[ 'MARKDOWN_BUTTON' ] = $MiniComponents->specificEvent('06000', 'show_markdown_modal', array('output_now' => false));
			$output['SIMPLEMDE_JAVASCRIPT'] = '
				<script type="text/javascript">
				jomresJquery(document).ready(function () {
					var buttons =  ["bold", "italic", "heading", "strikethrough" , "|" , "unordered-list" , "ordered-list" , "clean-block" , "image" , "table" , "horizontal-rule" , "|", "preview" ];
					var simplemde = new SimpleMDE({ element: document.getElementById("description") ,toolbar: buttons, });
				});
				</script>';

		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',JOMRES_SITEPAGE_URL_ADMIN."&task=list_subscription_packages",'');
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_subscription_package');
		if ($id > 0)
			$jrtb .= $jrtbar->toolbarItem('delete',JOMRES_SITEPAGE_URL_ADMIN."&task=delete_subscription_package&no_html=1&id=".$jrportal_subscriptions->package['id'] , '');
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;


		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'edit_subscription_package.html' );
		$tmpl->addRows( 'pageoutput', $pageoutput );
		$tmpl->addRows( 'rows', $rows );
		$tmpl->displayParsedTemplate();
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
