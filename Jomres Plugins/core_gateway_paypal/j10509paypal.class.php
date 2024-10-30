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


class j10509paypal 
	{
	function __construct($componentArgs)
		{
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=true; return;
			}
		$plugin = "paypal";
		$image = '<img src="'.get_showtime('eLiveSite').'j00510'.$plugin.'.gif" alt="$plugin" />';

		if ( isset($componentArgs['show_anyway']) && !$componentArgs['show_anyway'] )
			{
			$invoice_id = (int) $componentArgs ['invoice_id'];
			if ( $invoice_id == 0 )
				{
				$this->retVals = false;
				}
			else
				{
				$invoice = jomres_singleton_abstract::getInstance( 'basic_invoice_details' );
				$invoice->gatherData($invoice_id);
				if ( (int)$invoice->subscription_id > 0 || (int) $invoice->is_commission > 0 )
					{
					$this->retVals= array ("name" => "paypal" , "friendlyname" => $gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false) ,"image"=>$image);
					}
				else // It's a booking invoice, let's check that this property offers settings for this gateway
					{
					$settings = get_plugin_settings("paypal",(int)$invoice->property_uid);

					if ( array_key_exists('client_id' , $settings ) && array_key_exists('secret', $settings )  )
						{
						if ( $settings['client_id'] != "" &&  $settings['secret'] != "" )
							{
							$this->retVals= array ("name" => "paypal" , "friendlyname" => $gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false), "image"=>$image );
							}
						elseif ( $settings['client_id_sandbox'] != "" &&  $settings['secret_sandbox'] != "" )
							{
							$this->retVals= array ("name" => "paypal" , "friendlyname" => $gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false), "image"=>$image );
							}
						else
							{
							$this->retVals = false;
							}
						}
					else
						$this->retVals = false;
					}
				}
			}
		else
			{
			$this->retVals= array ("name" => "paypal" , "friendlyname" => $gatewayname=jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin),false,false), "image"=>$image );
			}
		}

	function touch_template_language()
		{
		$plugin="paypal";
		echo jr_gettext('_JOMRES_CUSTOMTEXT_GATEWAYNAME'.$plugin,ucwords($plugin));
		}

	function getRetVals()
		{
		return $this->retVals;
		}
	}
