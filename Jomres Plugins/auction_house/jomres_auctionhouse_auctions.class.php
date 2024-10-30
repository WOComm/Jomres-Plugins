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

class jomres_auctionhouse_auctions
	{
	private static $configInstance;
	private static $internal_debugging;
	
	public function __construct() 
		{
		self::$internal_debugging = false;
		$this->auctions = array();
		
		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		}

	public static function getInstance()
		{
		if (!self::$configInstance)
			{
			self::$configInstance = new showtime();
			}
		return self::$configInstance;
		}
		
	public function __clone()
		{
		trigger_error('Cloning not allowed on a singleton object', E_USER_ERROR);
		}
		
	public function __set($setting,$value)
		{
		if (self::$internal_debugging)
			echo "Setting ".$setting." to ".$value." <br>";
		$this->$setting = $value;
		return true;
		}
		
	public function __get($setting)
		{
		if (self::$internal_debugging)
			echo "Getting ".$setting." which is ".$this->$setting."<br>";
		if (isset($this->$setting))
			return $this->$setting;
		return null;
		}
	
	
	function perform_auction_maintenance()
		{
		//$this->send_email('bid_placed', 82 , array('auction_id'=>12 ) );
		
		$ended_auctions = $this->get_recently_finished_auctions();
		if (!empty($ended_auctions))
			{
			jr_import('jomres_auction');
			foreach ($ended_auctions as $auction_being_processed)
				{
				$query = "SELECT id,bid_value,cms_user_id FROM `#__jomres_auctionhouse_bids` WHERE auction_id = ".(int)$auction_being_processed['id']." ORDER BY bid_value DESC";
				$result=doSelectSql($query);
				if (!empty($result))
					{
					$winning_bid = $result[0];
					
					$auction = new jomres_auction();
					$auction->id = (int)$auction_being_processed['id'];
					if ($auction->getAuction())
						{
						if ((float)$winning_bid->bid_value >= (float)$auction->reserve)
							{
							$auction->winner_cms_user_id	= (int)$winning_bid->cms_user_id;
							$auction->end_value 			= (float)$winning_bid->bid_value;
							$auction->finished = 1;

							$invoice_id = $this->insert_winners_invoice($auction,$winning_bid);
							$this->insert_commission_invoice($auction_being_processed['property_uid'],$auction->end_value, $auction_being_processed['cms_user_id'],$auction);
							$this->insert_winner_into_guests_table_for_this_property($auction);
							$this->update_contract_with_winners_details($auction);
							
							$result = $auction->commitUpdateAuction();
							if ($result)
								$this->send_email('auctionwon', $winning_bid->cms_user_id , array('auction_id'=>$auction->id,'invoice_id'=>$invoice_id ) );
							}
						else
							$this->mark_auction_ended($auction_being_processed['id']);
						}
					}
				else // No bids, just mark it as finished so that we don't process it again in the future
					$this->mark_auction_ended($auction_being_processed['id']);
				
				
				$this->send_email('auction_ended',$auction_being_processed['cms_user_id'] , array('auction_id'=>$auction_being_processed['id']) );
				}
			}
		}

	
	function insert_commission_invoice($property_uid=0,$auction_total = 0, $property_managers_cms_user_id = 0,$auction_obj = '')
		{
		if ($property_uid == 0)
			return false;
		if ($auction_total == 0)
			return false;
		if ($property_managers_cms_user_id == 0)
			return false;

		$basic_property_details =jomres_getSingleton('basic_property_details');
		$basic_property_details->gather_data($property_uid);
		$property_name = $basic_property_details->property_name;
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		
		$tax_code_id=1;  // By default we'll use the VAT tax rate defined in the tax codes area of Jomres. If you want to change the tax code id for commission, you'll need to change this manually. Jomres doesn't allow you to remove the tax code through the UI so the only way it should have disappeared is if it's been removed from the table manually.

		$commissionRate=0.00;
		$commission=0.00;
		
		jr_import('jrportal_commissions');
		$jrportal_commissions = new jrportal_commissions();
		$jrportal_commissions->getAllCrates();
	
		if (empty($jrportal_commissions->crates))
			{
			error_logging( "Error, no commission rates created. Cannot continue with commission line item insert.");
			return false;
			}
		
		$crate = $jrportal_commissions->getCrateForPropertyuid($property_uid);
		if (empty($crate))
			{
			error_logging( "Error, no commission rate for this property. Cannot continue with commission line item insert.");
			return false;
			}

		$rateType=(int)$crate['type']; // Type 1  = flat Type 2 = percentage
		$commissionRate=floatval($crate['value']);
		$currencyCode=$crate['currencycode'];

		if ($rateType==1)
			$commission=$commissionRate;
		else
			$commission=($auction_total/100)*$commissionRate;
		
		if ((float)$commission > 0.00)
			{
			$line_items= array();

			$line_item_data = array (
				'tax_code_id'=>$tax_code_id,
				'name'=>jr_gettext('_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD','_JOMRES_AUCTIONHOUSE_INVOICING_COMMISSIONWORD',false,false)." ".$auction_obj->title." ".(string)$property_name,
				'description'=>'',
				'init_price'=>(float)$commission,
				'init_qty'=>"1",
				'init_discount'=>"0",
				'recur_price'=>"0.00",
				'recur_qty'=>"0",
				'recur_discount'=>"0.00"
				);
			$line_items[]=$line_item_data;

			$invoice_data= array();
			$invoice_data['cms_user_id']=(int)$property_managers_cms_user_id;
			$invoice_data['subscription']=false;
			$invoice_data['is_commission']=1;

			if ($jrConfig['useGlobalCurrency'] == "1")
				$invoice_data['currencycode'] = $jrConfig['globalCurrencyCode'];
			else
				$invoice_data['currencycode'] = $currencyCode;

			jr_import('jrportal_invoice');
			$invoice_handler = new jrportal_invoice();
			$invoice_handler->contract_id=$auction_obj->blackbooking_id;
			$invoice_handler->property_uid=$auction_obj->property_uid;

			$invoice_handler->create_new_invoice($invoice_data,$line_items);
			$invoice_handler->mark_invoice_pending();
			$query = "UPDATE #__jomres_contracts SET invoice_uid = ".$invoice_handler->id." WHERE contract_uid = ".$auction_obj->blackbooking_id;
			doInsertSql($query,"");
			return $invoice_handler->id;
			
			}
		}
	
		
		
	function send_email($type = '', $cms_user_id = 0 ,$arguments = array() )
		{
		if ($type == "" || $cms_user_id ==0 )
			return false;
		
		if (isset($arguments['auction_id']))
			{
			if ($arguments['auction_id'] > 0 )
				{
				$link_to_auction = '<a href="'.JOMRES_AUCTIONHOUSE_URL.'&ahtask=auction_view_auction&auction_id='.$arguments['auction_id'].'">'.JOMRES_AUCTIONHOUSE_URL.'&ahtask=auction_view_auction&auction_id='.$arguments['auction_id'].'</a>';
				jr_import('jomres_auction');
				$auction = new jomres_auction();
				$auction->id = $arguments['auction_id'];
				$auction->getAuction();
				}
			}
		if (isset($arguments['property_uid']))
			{
			if ($arguments['property_uid'] > 0 )
				$link_to_property = '<a href="'.JOMRES_SITEPAGE_URL_NOSEF.'&task=viewproperty&property_uid='.$arguments['property_uid'].'">'.JOMRES_SITEPAGE_URL_NOSEF.'&task=viewproperty&property_uid='.$arguments['property_uid'].'</a>';
			}

		switch ($type) 
			{
			case 'bid_placed':
				$subject 	= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT','_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_SUBJECT',false,false)." ".$auction->title." ";
				$body 		= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY','_JOMRES_AUCTIONHOUSE_EMAILS_BIDPLACED_BODY',false,false).$link_to_auction;
				break;
			case 'outbid':
				$subject 	= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT','_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_SUBJECT',false,false)." ".$auction->title." ";
				$body 		= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY','_JOMRES_AUCTIONHOUSE_EMAILS_OUTBID_BODY',false,false).$link_to_auction;
				break;
			case 'auctionwon':
				$link_to_invoice = '<a href="'.JOMRES_SITEPAGE_URL_NOSEF.'&task=view_invoice&id='.$arguments['invoice_id'].'">'.JOMRES_SITEPAGE_URL_NOSEF.'&task=view_invoice&id='.$arguments['invoice_id'].'</a>';
				$subject 	= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT','_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_SUBJECT',false,false)." ".$auction->title." ";
				$body  		= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY','_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY',false,false).$link_to_auction."<br/>";
				$body 		.= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2','_JOMRES_AUCTIONHOUSE_EMAILS_AUCTIONWON_BODY2',false,false).$link_to_invoice;
				break;
			case 'auction_ended': // Message the auction creator and tell them is has ended
				$subject 	= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT','_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_SUBJECT',false,false)." ".$auction->title." ";
				$body 		= jr_gettext('_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY','_JOMRES_AUCTIONHOUSE_EMAILS_SELLER_AUCTION_ENDED_BODY',false,false).$link_to_auction;
				break;
			}
		
		$query="SELECT email FROM #__jomres_guest_profile WHERE cms_user_id = ".(int)$cms_user_id." LIMIT 1";
		$target_email_address =doSelectSql($query,1);

		$site_name = get_showtime('fromname');
		$site_email_address = get_showtime('mailfrom');
		
		jomresMailer($site_email_address, $site_name, $target_email_address,  $subject, $body, $mode=1);
		}
	
	
	
	function update_contract_with_winners_details($auction)
		{
		$query="SELECT enc_firstname,enc_surname,enc_house,enc_street,enc_town,enc_county,enc_country,enc_postcode,enc_tel_landline,enc_tel_mobile,enc_email FROM #__jomres_guest_profile WHERE cms_user_id = ".(int)$auction->winner_cms_user_id." LIMIT 1";
		$guestData =doSelectSql($query,2);
		if ($guestData)
			{
			$message = jr_gettext('_JOMRES_AUCTIONHOUSE_BOOKINGNOTE',_JOMRES_AUCTIONHOUSE_BOOKINGNOTE,false,false);
			
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_FIRSTNAME','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_FIRSTNAME',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_firstname'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_SURNAME','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_SURNAME',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_surname'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_HOUSENO','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_HOUSENO',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_house'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_STREET','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_STREET',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_street'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_TOWN','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_TOWN',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_town'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_REGION','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_REGION',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_county'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_POSTCODE','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_POSTCODE',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_postcode'])."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_COUNTRY','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_COUNTRY',false,false)." ".getSimpleCountry($this->jomres_encryption->decrypt($guestData['enc_country']))."<br/>";
			$message .=jr_gettext('_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_EMAIL','_JOMRES_BOOKINGFORM_MONITORING_REQUIRED_EMAIL',false,false)." ".$this->jomres_encryption->decrypt($guestData['enc_email'])."<br/>";
			
			addBookingNote($auction->blackbooking_id,$auction->property_uid,   $message);
			}
		}
	
	function insert_winner_into_guests_table_for_this_property($auction)
		{
		$query="SELECT enc_firstname,enc_surname,enc_house,enc_street,enc_town,enc_county,enc_country,enc_postcode,enc_tel_landline,enc_tel_mobile,enc_email FROM #__jomres_guest_profile WHERE cms_user_id = ".(int)$auction->winner_cms_user_id." LIMIT 1";
		$guestData =doSelectSql($query,2);
		if ($guestData)
			{
			$query = "SELECT guests_uid FROM #__jomres_guests WHERE mos_userid = ".(int)$auction->winner_cms_user_id." AND property_uid =".$auction->property_uid;
			$result=doSelectSql($query);
			if (empty($result))
				{
				$query="INSERT INTO #__jomres_guests
				(`enc_firstname`,`enc_surname`,
				`enc_house`,`enc_street`,
				`enc_town`,`enc_county`,
				`enc_country`,`enc_postcode`,
				`enc_tel_landline`,`enc_tel_mobile`,
				`property_uid`,`enc_email`,
				`mos_userid` 
				) VALUES (
				'".$this->jomres_encryption->encrypt($guestData['enc_firstname'])."'	,'".$this->jomres_encryption->encrypt($guestData['enc_surname'])."',
				'".$this->jomres_encryption->encrypt($guestData['enc_house'])."'		,'".$this->jomres_encryption->encrypt($guestData['enc_street'])."',
				'".$this->jomres_encryption->encrypt($guestData['enc_town'])."'		,'".$this->jomres_encryption->encrypt($guestData['enc_county'])."',
				'".$this->jomres_encryption->encrypt($guestData['enc_country'])."'		,'".$this->jomres_encryption->encrypt($guestData['enc_postcode'])."',
				'".$this->jomres_encryption->encrypt($guestData['enc_tel_landline'])."','".$this->jomres_encryption->encrypt($guestData['enc_tel_mobile'])."',
				'".$auction->property_uid."','".$this->jomres_encryption->encrypt($guestData['enc_email'])."',
				".(int)$auction->winner_cms_user_id."
				)";
				$returnid=doInsertSql($query,'');
				}
			else
				{
				$query="UPDATE	#__jomres_guests SET 
				`enc_firstname`='".$this->jomres_encryption->encrypt($guestData['enc_firstname'])."',
				`enc_surname`='".$this->jomres_encryption->encrypt($guestData['enc_surname'])."',
				`enc_house`='".$this->jomres_encryption->encrypt($guestData['enc_house'])."',
				`enc_street`='".$this->jomres_encryption->encrypt($guestData['enc_street'])."',
				`enc_town`= '".$this->jomres_encryption->encrypt($guestData['enc_town'])."',
				`enc_county`= '".$this->jomres_encryption->encrypt($guestData['enc_county'])."',
				`enc_country`= '".$this->jomres_encryption->encrypt($guestData['enc_country'])."',
				`enc_postcode`= '".$this->jomres_encryption->encrypt($guestData['enc_postcode'])."',
				`enc_tel_landline`= '".$this->jomres_encryption->encrypt($guestData['enc_tel_landline'])."',
				`enc_tel_mobile`= '".$this->jomres_encryption->encrypt($guestData['enc_tel_mobile'])."',
				`enc_email`='".$this->jomres_encryption->encrypt($guestData['enc_email'])."'
				WHERE mos_userid = '".(int)$auction->winner_cms_user_id." AND property_uid =".$auction->property_uid;
				doInsertSql($query,'');
				$returnid=$guests_uid;
				}
			}
		}

	function insert_winners_invoice($auction_obj,$winning_bid)
		{
		$mrConfig=getPropertySpecificSettings($auction_obj->property_uid);
		$siteConfig = jomres_getSingleton('jomres_config_site_singleton');
		$jrConfig=$siteConfig->get();
		$basic_property_details =jomres_getSingleton('basic_property_details');
		$basic_property_details->gather_data($auction_obj->property_uid);

		$line_items= array();
		
		if ($mrConfig['prices_inclusive'] != "1" )
			{
			$divisor	= ($basic_property_details->accommodation_tax_rate/100)+1;
			$bid_total=$winning_bid->bid_value/$divisor;
			}
		else
			$bid_total= $winning_bid->bid_value;

		$line_item_data = array (
			'tax_code_id'=>(int)$mrConfig['accommodation_tax_code'],
			'name'=>jr_gettext('_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE','_JOMRES_AUCTIONHOUSE_INVOICING_PREAMBLE',false,false)." ".$auction_obj->title,
			'description'=>'',
			'init_price'=>$bid_total,
			'init_qty'=>"1",
			'init_discount'=>"0",
			'recur_price'=>"0.00",
			'recur_qty'=>"0",
			'recur_discount'=>"0.00"
			);
		$line_items[]=$line_item_data;

		$invoice_data= array();
		$invoice_data['cms_user_id']=$auction_obj->winner_cms_user_id;
		$invoice_data['subscription']=false;
		

		if ($jrConfig['useGlobalCurrency'] == "1")
			$invoice_data['currencycode'] = $jrConfig['globalCurrencyCode'];
		else
			$invoice_data['currencycode'] = $mrConfig['property_currencycode'];

		jr_import('jrportal_invoice');
		$invoice_handler = new jrportal_invoice();
		$invoice_handler->contract_id=$auction_obj->blackbooking_id;
		$invoice_handler->property_uid=$auction_obj->property_uid;
		$invoice_handler->create_new_invoice($invoice_data,$line_items);
		$invoice_handler->mark_invoice_pending();
		$query = "UPDATE #__jomres_contracts SET invoice_uid = ".$invoice_handler->id." WHERE contract_uid = ".$auction_obj->blackbooking_id;
		doInsertSql($query,"");
		return $invoice_handler->id;
		}
	
	function mark_auction_ended($auction_id)
		{
		jr_import('jomres_auction');
		$auction = new jomres_auction();
		$auction->id = (int)$auction_id;
		$result = $auction->getAuction();
		$auction->finished = 1;
		$auction->commitUpdateAuction();
		}
	
	function get_recently_finished_auctions()
		{
		$auctions_array = array();
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE end_date < NOW() AND `winner_cms_user_id` = 0 AND finished = 0";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	
	function get_auction_id_from_request()
		{
		$auction_id = 0;
		if (isset($_REQUEST))
			{
			foreach ($_REQUEST as $key=>$val)
				{
				if (strstr($key,"auction_id"))
					$auction_id = (int)$val;
				}
			}
		if ($auction_id ==0) // Now let's just try for the request var auction_id
			{
			if (isset($_REQUEST['auction_id']))
				$auction_id = (int)$_REQUEST['auction_id'];
			}
		return $auction_id;
		}
	
	function build_auction_list($auction_ids,$lang='en-GB')
		{
		$thisJRUser=jomres_getSingleton('jr_user');
		
		$all_property_uids=array();
		foreach ($auction_ids as $a)
			{
			$all_property_uids[]=$a['property_uid'];
			}
		
		$basic_property_details =jomres_getSingleton('basic_property_details');
		$basic_property_details->gather_data_multi($all_property_uids);
		
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$jomres_media_centre_images->get_images_multi($all_property_uids, array('property'));
		
		$rendered_template = '';
		if (!empty($auction_ids))
			{
			$output = array();
			$pageoutput = array();
			$output['_JOMRES_AUCTIONHOUSE_AUCTION_TITLE']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE','_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',false,false);
			$output['_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID','_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',false,false);
			$output['_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT','_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',false,false);

			foreach ($auction_ids as $key=>$val)
				{
				if ($val['lang'] == get_showtime('lang') || $lang == "ANY")
					{
					$basic_property_details->gather_data($val['property_uid']);
					$jomres_media_centre_images->get_images($val['property_uid'], array('property'));
					
					$ahjavascript = get_showtime('ahjavascript');
					$js_to_eval = "";
					set_showtime('ahjavascript',$ahjavascript.$js_to_eval);

					$r = array();
					if ($val['blackbooking_id'] != 0 && isset($blackbooking_details['arrival']))
						{
						$blackbooking_details = $this->get_blackbooking_details_by_contract_uid($val['blackbooking_id']);
						$r['HARRIVAL']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',false,false);
						$r['HDEPARTURE']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',false,false);
						$r['PACKAGE_START']=outputDate($blackbooking_details['arrival']);
						$r['PACKAGE_DEPARTURE']=outputDate($blackbooking_details['departure']);
						$r['BR']='<br/>';
						}
					
					$r['COMBINED_AUCTION_TITLE']=$val['title'].' ('.$basic_property_details->get_property_name($val['property_uid']).')';
					$r['VIEW_AUCTION_LINK'] = '<a href="'.JOMRES_AUCTIONHOUSE_URL.'&ahtask=auction_view_auction&auction_id='.(int)$val['id'].'" >'.$r['COMBINED_AUCTION_TITLE'].'</a>';
					$mrConfig=getPropertySpecificSettings($val['property_uid']);
					$maxbid = $this->find_latest_max_bid($val['id']);
					if ($maxbid > 0.00)
						$r['HIGHESTBID']=output_price($maxbid,$mrConfig['property_currencycode']);
					else
						$r['HIGHESTBID']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS','_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',false,false);
					
					$status =  $this->get_bid_status($val['id'],$thisJRUser->id);
					$r['BIDSTATUS'] = $status['output'];
				
					$r['IMAGE']=$jomres_media_centre_images->images ['property'][0][0]['large'];
					$r['IMAGETHUMB']=$jomres_media_centre_images->images ['property'][0][0]['small'];
					if ($r['IMAGETHUMB'])
						$r['IMAGE']=$r['IMAGETHUMB'];
					
					if (isset($val['ancillary']))
						$r['ANCILLARY']=$val['ancillary'];

					$interval_obj = $this->calculate_time_to_finish($val['end_date']);
					$r['TIMEREMAINING']=$this->output_time_to_finish($interval_obj);
					
					$res = array_merge($val,$r);
					$running_rows[]=$res;
					}
				}
			$pageoutput[]=$output;
			$tmpl = new patTemplate();
			$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
			$tmpl->readTemplatesFromInput( 'list_auctions.html' );
			$tmpl->addRows( 'running_rows', $running_rows );
			$tmpl->addRows( 'pageoutput', $pageoutput );
			$rendered_template = $tmpl->getParsedTemplate();
			}
		return $rendered_template;
		}
	
	function get_blackbooking_details_by_contract_uid($contract_uid)
		{
		
		$query="SELECT contract_uid,arrival,departure,special_reqs FROM #__jomres_contracts WHERE contract_uid = '".(int)$contract_uid."' LIMIT 1";
		return doSelectSql($query,2);
		}
	
	function view_auction($auction_id = 0)
		{
		$thisJRUser=jomres_getSingleton('jr_user');
		$basic_property_details =jomres_getSingleton('basic_property_details');
		$jomres_media_centre_images = jomres_singleton_abstract::getInstance( 'jomres_media_centre_images' );
		$ah_object = jomres_getSingleton('jomres_auctionhouse_auctions');
		
		$reload = (int)jomresGetParam( $_REQUEST, 'reload',0 );
		
		$increment = 10; // Probably need a setting here later.
		
		$output=array();
		$pageoutput = array();
		
		if ($auction_id ==0)
			$auction_id = $this->get_auction_id_from_request();
		
		if ($auction_id > 0)
			{
			jr_import('jomres_auction');
			$auction = new jomres_auction();
			$auction->id = $auction_id;
			$result = $auction->getAuction();
			if ($result)
				{
				$mrConfig=getPropertySpecificSettings($auction->property_uid);
				$output['_JOMRES_AUCTIONHOUSE_AUCTION_TITLE']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TITLE','_JOMRES_AUCTIONHOUSE_AUCTION_TITLE',false,false);
				$output['_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID','_JOMRES_AUCTIONHOUSE_AUCTION_MAXIBID',false,false);
				$output['_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT','_JOMRES_AUCTIONHOUSE_AUCTION_TIMELEFT',false,false);
				$output['_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER','_JOMRES_AUCTIONHOUSE_AUCTION_DISCLAIMER',false,false);

				$output['ID']					= $auction->id;
				$output['TITLE']				= $auction->title;
				$output['DESCRIPTION']			= $auction->description;
				$output['VALUE']				= $auction->value;
				$output['RESERVE']				= $auction->reserve;
				$output['BUY_NOW_VALUE']		= $auction->buy_now_value;
				$output['PACKAGE_START']	    = $auction->start_date;
				$output['PACKAGE_DEPARTURE']	= $auction->end_date;
				$output['PROPERTY_UID']			= $auction->property_uid;
				$output['CMS_USER_ID']			= $auction->cms_user_id;
				$output['WINNER_CMS_USER_ID']	= $auction->winner_cms_user_id;
				
				$basic_property_details->gather_data($output['PROPERTY_UID']);
				$jomres_media_centre_images->get_images($output['PROPERTY_UID'], array('property'));
				
				$cancellation_check = $this->check_auction_can_be_cancelled($auction->id);
				$cancel_rows = array();
				if ($cancellation_check['cancancel'])
					{
					$c = array();
					$c['_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION']=jr_gettext('_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION','_JOMRES_AUCTIONHOUSE_SELLER_MENUOPTION_CANCEL_AUCTION',false,false);
					$cancel_rows[] = $c;
					}
					
				if ($auction->blackbooking_id != 0 && isset($blackbooking_details['arrival']) )
					{
					$blackbooking_details = $this->get_blackbooking_details_by_contract_uid($auction->blackbooking_id);
					$output['HARRIVAL']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL','_JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL',false,false);
					$output['HDEPARTURE']=jr_gettext('_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE','_JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE',false,false);
					$output['PACKAGE_START']=outputDate($blackbooking_details['arrival']);
					$output['PACKAGE_DEPARTURE']=outputDate($blackbooking_details['departure']);
					$output['BR']='<br />';
					}

				if ($mrConfig['prices_inclusive'] != "1" && $basic_property_details->accommodation_tax_rate != 0 )
					{
					$output['_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE']= jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE','_JOMRES_AUCTIONHOUSE_AUCTION_TAX_NOTE',false,false)." ".$basic_property_details->accommodation_tax_rate."%"; 
					}
				
				$div_id = 'auction_id'.(int)$output['ID'];
				$output['COMBINED_AUCTION_TITLE']=$output['TITLE'];
				
				$output['MOREINFORMATIONLINK']=jomresURL( JOMRES_SITEPAGE_URL."&task=viewproperty&property_uid=".$output['PROPERTY_UID']) ;
				$output['MOREINFORMATION']= jr_gettext('_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO','_JOMRES_AUCTIONHOUSE_PROPERTY_DETAILS_MOREINFO',false,false).getPropertyName($output['PROPERTY_UID'])."" ;

				$output['VIEW_AUCTION_LINK'] = '<a href="javascript:void(0);"  onClick="auction_page(\'auction_view_auction\',[\''.$div_id.'\']);">'.$output['COMBINED_AUCTION_TITLE'].'</a><div id="'.$div_id.'" style="visibility:hidden">'.(int)$output['ID'].'</div>';
				
				$maxbid = $this->find_latest_max_bid($output['ID']);
				if ($maxbid > 0.00)
					$output['HIGHESTBID']=output_price($maxbid,$mrConfig['property_currencycode']);
				else
					$output['HIGHESTBID']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS','_JOMRES_AUCTIONHOUSE_AUCTION_NOBIDS',false,false);

				$output['IMAGE']=$jomres_media_centre_images->images ['property'][0][0]['medium'];
				$output['IMAGETHUMB']=$jomres_media_centre_images->images ['property'][0][0]['small'];

				$interval_obj = $this->calculate_time_to_finish($output['PACKAGE_DEPARTURE']);
				$output['TIMEREMAINING']=$this->output_time_to_finish($interval_obj);
				
				$bidding = array();
				$status =  $this->get_bid_status($auction->id,$thisJRUser->id);

				$output['BIDSTATUS'] = $status['output'];
				if ($this->check_user_can_bid_on_auction($auction->id) && (int)$status['status']!=2 && $interval_obj)
					{
					$b = array();
					$b['PLACEBIDBUTTON']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BID','_JOMRES_AUCTIONHOUSE_AUCTION_BID',false,false);
					if ($maxbid > 0.00)
						$b['SUGGESTEDBID']= $maxbid+$increment;
					else
						$b['SUGGESTEDBID']= $output['RESERVE']+$increment;

					$bidding[] = $b;
					}
				

				
				$output['_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET'] = '';
				if ($maxbid  < (float)$output['RESERVE'] && $maxbid  != 0.00)
					$output['_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET'] = jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET','_JOMRES_AUCTIONHOUSE_AUCTION_RESERVE_NOTMET',false,false);
				
				$buynow=array();
				if ($this->check_user_can_bid_on_auction($auction->id) && $this->check_can_show_buynow($output['ID']) && (float)$output['RESERVE'] > 0.00)
					{
					$bn = array();
					$bn['BUYNOWBUTTON']=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE','_JOMRES_AUCTIONHOUSE_AUCTION_BUYNOW_PRICE',false,false);
					$bn['BUYNOWVALUE']=output_price($output['BUY_NOW_VALUE']);
					$buynow[] = $bn;
					}
				else
					{
					if (!$this->check_user_can_bid_on_auction($auction->id))
						{
						// Todo, show the buy now option but pass the user to the registration page (?)
						}
					}
					
				$endearly=array();
				if ($thisJRUser->superPropertyManager && $interval_obj)
					{
					$ea = array();
					$ea['_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION']=jr_gettext('_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION','_JOMRES_AUCTIONHOUSE_ADMIN_CANCEL_AUCTION',false,false);
					$endearly[] = $ea;
					}
				
				$output['RELOAD'] =  "1";
				if ($reload == 1)
					{
					$output['RELOAD'] =  "0";
					}

				$wl_object = jomres_getSingleton('jomres_auctionhouse_watchlists');
				$output['DROPDOWN'] = $wl_object->build_watchlist_dropdown($thisJRUser->id);
				$output['_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS'] =jr_gettext('_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS','_JOMRES_AUCTIONHOUSE_ADDTOWATCHLIST_INSTRUCTIONS',false,false);

				jomres_cmsspecific_setmetadata("title",$output['TITLE']. ' - '.$basic_property_details->property_name );
		
				
				$pageoutput[] = $output;
				$tmpl = new patTemplate();
				$tmpl->setRoot(get_showtime('auctionhouse_templates_path'));
				$tmpl->readTemplatesFromInput( 'auction_view_auction.html' );
				$tmpl->addRows( 'bidding',$bidding );
				$tmpl->addRows( 'cancel_rows',$cancel_rows );
				$tmpl->addRows( 'buynow',$buynow );
				$tmpl->addRows( 'endearly',$endearly );
				$tmpl->addRows( 'pageoutput',$pageoutput );
				$tpl=$tmpl->getParsedTemplate();
				return $tpl;
		
				}
			else
				return $auction->error;
			}
		else
			return "Auction id not passed";
		
		}
	
	function check_auction_can_be_cancelled($auction_id)
		{
		$result = array("cancancel"=>false,"reason"=>"Unknown");
		$thisJRUser=jomres_getSingleton('jr_user');
		if ($thisJRUser->id < 1) // User isn't logged in
			return array("cancancel"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',false,false));
		
		if ($auction_id ==0) // Duh
			return array("cancancel"=>false,"reason"=>'Auction id not passed');
		
		$query = "SELECT id FROM `#__jomres_auctionhouse_auctions` WHERE id = ".(int)$auction_id." AND cms_user_id =".(int)$thisJRUser->id;
		$result=doSelectSql($query);
		if (empty($result)) // Person cancelling doesn't have the same cms user id as the person who created the auction
			return array("cancancel"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS','_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_NOTYOURS',false,false));
		
		$query = "SELECT id FROM `#__jomres_auctionhouse_bids` WHERE auction_id = ".(int)$auction_id;
		$result=doSelectSql($query);
		if (!empty($result)) // Auction has already been bid upon
			return array("cancancel"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID','_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ALREADYBID',false,false));
		
		$query = "SELECT id FROM #__jomres_auctionhouse_auctions WHERE id = ".(int)$auction_id." AND end_date > NOW()";
		$result=doSelectSql($query);
		if (empty($result)) // Auction has already ended
			return array("cancancel"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED','_JOMRES_AUCTIONHOUSE_CANNOTCANCEL_REASON_ENDED',false,false));

		return array("cancancel"=>true);
		}
	
	function check_user_can_bid_on_auction($auction_id,$placed_bid=null)
		{
		$result = array("canbid"=>false,"reason"=>"Unknown");
		
		$thisJRUser=jomres_getSingleton('jr_user');
		if ($thisJRUser->id < 1)
			return array("canbid"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTLOGGEDIN',false,false));
		
		jr_import('jomres_auction');
		$auction = new jomres_auction();
		$auction->id = $auction_id;
		$result = $auction->getAuction();
		if (!$result)
			return array("canbid"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_NOTFOUND',false,false));
		
		$query = "SELECT id FROM #__jomres_auctionhouse_auctions WHERE end_date > NOW() AND id = ".(int)$auction_id." LIMIT 1";
		$result=doSelectSql($query);
		if (empty($result))
			return array("canbid"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_ENDED',false,false));
		
		$query="SELECT enc_firstname,enc_surname,enc_house,enc_street,enc_town,enc_county,enc_country,enc_postcode,enc_tel_landline,enc_tel_mobile,enc_email FROM #__jomres_guest_profile WHERE cms_user_id = ".(int)$thisJRUser->id." LIMIT 1";
		$guestData =doSelectSql($query);
		if (empty($guestData))
			return array("canbid"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_EDITPROFILE',false,false));
		
		if (isset($placed_bid))
			{
			$current_highest_bid = $this->find_latest_max_bid(auction_id);
			if ($placed_bid <= $current_highest_bid)
				return array("canbid"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',false,false));
			}



		// TODO need to check that the user didn't create the bid, can't bid on own auctions. Won't enable it yet until basic dev is done
/* 		if ($thisJRUser-> == $auction->cms_userid)
			return array("canbid"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION',_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_OWNAUCTION,false,false));
		 */
		 
		return array("canbid"=>true);
		}
	
	
	
	
	function insert_auction_blackbooking($auction_object,$arrival,$departure,$room_ids,$include_rooms)
		{
		if ($include_rooms)
			{
			// Expecting the auction object that's just been created, arrival and departure dates in yyyy/mm/dd format and room ids either as an array, or a csv.
			if (!is_array($room_ids))
				{
				$tmp = explode(",",$room_ids);
				$room_ids = array();
				foreach ($tmp as $t)
					{
					if (trim($t) != "")
						{
						$room_ids[] = (int)$t;
						}
					}
				}
			$dateRangeArray= $this->bb_getDateRange($arrival,$departure);
			foreach ($dateRangeArray as $theDate)
				{
				foreach ($room_ids as $room_uid)
					{
					$query="SELECT room_bookings_uid,contract_uid FROM #__jomres_room_bookings WHERE room_uid = '".(int)$room_uid."' AND date = '$theDate'";
					$bookingsList = doSelectSql($query);
					if (!empty($bookingsList))
						$okToContinue=FALSE;
					}
				}
			}
		
		$numberOfAdults="0";
		$numberOfChildren="0";
		$dateRangeString=implode(",",$dateRangeArray);
		$guests_uid="0";
		$rates_uid="0";
		$cotRequired="0";
		$rate_rules="0";
		$single_person_suppliment="0";
		$deposit_required="0";
		$contract_total="0";
		$specialReqs=jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE','_JOMRES_AUCTIONHOUSE_AUCTION_BLACKBOOKING_NOTE',false,false).$auction_object->title;
		$cot_suppliment="0";
		$extras="0";
		$extrasValue="0";

		$query="INSERT INTO #__jomres_contracts (
				`arrival`,`departure`,`rates_uid`,
				`guest_uid`,`contract_total`,`special_reqs`,
				`adults`,`children`,`deposit_paid`,`deposit_required`,
				`date_range_string`,`booked_in`,`booked_out`,`rate_rules`,
				`property_uid`,`single_person_suppliment`,`extras`,`extrasvalue`)
				VALUES (
				'$arrival','$departure','".(int)$rates_uid."',
				'".(int)$guests_uid."','".(float)$contract_total."','$specialReqs',
				'$numberOfAdults','$numberOfChildren','0','".(float)$deposit_required."',
				'$dateRangeString','0','0','$rate_rules',
				'".$auction_object->property_uid."','".(float)$single_person_suppliment."','$extras','".(float)$extrasValue."')";
		$black_booking_id = doInsertSql($query,'');
		if ( !$black_booking_id )
			trigger_error ("Unable to insert into contracts table, mysql db failure", E_USER_ERROR);
		elseif ($include_rooms)
			{
			$contract_uid=$black_booking_id;
			if ($contract_uid)
				{
				foreach ($room_ids as $room_uid)
					{
					$dateRangeArray=explode(",",$dateRangeString);
					$query="INSERT INTO #__jomres_room_bookings
						(`room_uid`,
						`date`,
						`contract_uid`,
						`black_booking`,
						`internet_booking`,
						`reception_booking`,
						`property_uid`)
						VALUES ";
					for ($i=0, $n=count($dateRangeArray); $i < $n; $i++)
						{
						$internetBooking=0;
						$receptionBooking=0;
						$blackBooking=1;
						$roomBookedDate=$dateRangeArray[$i];
						$query.= ($i>0) ? ', ':'';
						$query.="('".(int)$room_uid."','$roomBookedDate','".(int)$contract_uid."','".(int)$blackBooking."','".(int)$internetBooking."','".(int)$receptionBooking."','".(int)$auction_object->property_uid."')";
						}
					if (!doInsertSql($query,''))
						trigger_error ("Unable to insert into room bookings table, mysql db failure", E_USER_ERROR);
					}
				}
			else
				trigger_error ("Error after inserting to contracts table, no contract uid returned.", E_USER_ERROR);
			}
		return $black_booking_id;
		}
	
	function check_can_show_buynow($auction_id)
		{
		$query = "SELECT bid_value FROM `#__jomres_auctionhouse_bids` WHERE auction_id = ".(int)$auction_id." ";
		$result=doSelectSql($query);
		if (!empty($result))
			return false;
		return true;
		}
	
	// Bid status 0 highest or auction ended  outbid, 1 (effectively, if status is set to 1 then checkbid will trigger the page to reload)
	function get_bid_status($auction_id,$cms_user_id)
		{
		$status = array("output"=>'',"status"=>0);
		jr_import('jomres_auction');
		$auction = new jomres_auction();
		$auction->id = (int)$auction_id;
		$auction->getAuction();
		
		$query = "SELECT max( bid_value ) FROM `#__jomres_auctionhouse_bids` WHERE auction_id = ".(int)$auction_id." AND cms_user_id = ".(int)$cms_user_id;
		$my_highest_bid=doSelectSql($query,1);

		if (!$my_highest_bid || (float)$my_highest_bid == 0)
			return $status;

		if (!empty($my_highest_bid))
			{
			$current_max_bid = (float)$this->find_latest_max_bid($auction_id);

			if ( (int)$auction->finished == 0 && (float)$my_highest_bid === (float)$current_max_bid)
				$status = array("status"=>0,"output"=> jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST','_JOMRES_AUCTIONHOUSE_AUCTION_BID_YOURBIDHIGHEST',false,false));
			elseif ( (int)$auction->finished == 0 && (float)$my_highest_bid < (float)$current_max_bid )
				$status = array("status"=>1,"output"=>jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID','_JOMRES_AUCTIONHOUSE_AUCTION_BID_OUTBID',false,false));
					elseif ( (int)$auction->finished == 1 &&  (float)$my_highest_bid < (float)$current_max_bid)
						$status = array("status"=>0,"output"=>jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST','_JOMRES_AUCTIONHOUSE_AUCTION_BID_LOST',false,false));
						elseif ( (int)$auction->finished == 1 &&  (float)$my_highest_bid === (float)$current_max_bid )
							$status = array("status"=>0,"output"=>jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON','_JOMRES_AUCTIONHOUSE_AUCTION_BID_WON',false,false));
				
			}
			
		return $status;
		}

	function insert_bid($auction_id,$bid,$cms_userid)
		{
		
		$result = array("bidplaced"=>false,"reason"=>"Unknown");
		$current_highest_bid = $this->find_latest_max_bid($auction_id);
		if ($bid <= $current_highest_bid)
			return array("bidplaced"=>false,"reason"=>jr_gettext('_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW','_JOMRES_AUCTIONHOUSE_CANNOTBID_REASON_TOOLOW',false,false));
		
		// Let's find the latest loser so that we can email and tell them they've been outbid
		$last_bid = null;
		$query = "SELECT id,bid_value,cms_user_id FROM `#__jomres_auctionhouse_bids` WHERE auction_id = ".(int)$auction_id." ORDER BY bid_value DESC";
		$result=doSelectSql($query);
		if (!empty($result))
			{
			$last_bid = $result[0];
			}
		
		$query="INSERT INTO #__jomres_auctionhouse_bids (`cms_user_id`,`auction_id`,`bid_value`) VALUES (".(int)$cms_userid.",".(int)$auction_id.",".(float)$bid.")";
		if (doInsertSql($query,''))
			{
			if (isset($last_bid))
				{
				$this->send_email('outbid', (int)$last_bid->cms_user_id, array('auction_id'=>(int)$auction_id) );
				}
			
			$this->send_email('bid_placed', (int)$cms_userid , array('auction_id'=>(int)$auction_id) );
			 
			return array("bidplaced"=>true);
			}
		}
	
	function output_time_to_finish($interval)
		{
		if ($interval)
			{
			$return_data = 
				" ".$interval->d.jr_gettext('_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS','_JOMRES_AUCTIONHOUSE_COUNTDOWN_DAYS',false,false).
				" ".$interval->h.jr_gettext('_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS','_JOMRES_AUCTIONHOUSE_COUNTDOWN_HOURS',false,false).
				" ".$interval->i.jr_gettext('_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES','_JOMRES_AUCTIONHOUSE_COUNTDOWN_MINUTES',false,false).
				" ".$interval->s.jr_gettext('_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS','_JOMRES_AUCTIONHOUSE_COUNTDOWN_SECONDS',false,false);
			}
		else
			{
			$return_data = jr_gettext('_JOMRES_AUCTIONHOUSE_AUCTION_ENDED','_JOMRES_AUCTIONHOUSE_AUCTION_ENDED',false,false);
			}
		return $return_data;
		}
	
	function calculate_time_to_finish($end_date)
		{
		
		$datetime1 = new DateTime();
		$datetime2 = new DateTime($end_date);
		if ($datetime1 < $datetime2)
			{
			if (method_exists($datetime1,'diff') )
				$interval = $datetime1->diff($datetime2);
			else
				$interval = date_diff2($datetime1,$datetime2);
			}
		else
			$interval = false;
		return $interval;
		}

	function find_latest_max_bid($auction_id)
		{
		$query = "SELECT max( bid_value ) FROM `#__jomres_auctionhouse_bids` WHERE auction_id = ".(int)$auction_id;
		$result=doSelectSql($query,1);
		if (isset($result))
			return (float)$result;
		else
			return 0.00;
		}
	
	function expire_auction_now($auction_id)
		{
		$cancellation_check = $this->check_auction_can_be_cancelled($auction_id);
		if ($cancellation_check)
			{
			jr_import('jomres_auction');
			$auction = new jomres_auction();
			$auction->id = (int)$auction_id;
			if ($auction->getAuction())
				{
				$auction->markAuctionEndedNow();
				$this->send_email('auction_ended', (int)$auction->cms_user_id , array('auction_id'=>(int)$auction_id) );
				return true;
				}
			}
		return false;
		}
	
	function get_all_running_auctions()
		{
		$auctions_array = array();
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE end_date > NOW() ORDER BY end_date ";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	function get_all_running_auctions_for_property_uid($property_uid)
		{
		$auctions_array = array();
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE end_date > NOW() AND property_uid = ".(int)$property_uid." ORDER BY end_date ";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	function get_auction_details_for_auction_ids($auction_ids)
		{
		$auctions_array = array();
		$genericOr = genericOr($auction_ids,'id');
		
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE ".$genericOr." ORDER BY end_date ";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	
	function get_all_running_auctions_for_user($cms_user_id)
		{
		$auctions_array = array();
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE cms_user_id = ".(int)$cms_user_id." AND end_date > NOW() ORDER BY end_date ";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	function get_all_auctions_buyer_has_bid_on($cms_user_id)
		{
		$query = "SELECT DISTINCT auction_id FROM `#__jomres_auctionhouse_bids` WHERE cms_user_id = ".(int)$cms_user_id;
		$result=doSelectSql($query);
		
		if (empty($result))
			return array();
		$tmp_arr = array();
		foreach ($result as $res)
			{
			$tmp_arr[]=$res->auction_id;
			}
		$genericOr = genericOr($tmp_arr,'id');
		$auctions_array = array();
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE ".$genericOr." ORDER BY end_date DESC ";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	function get_all_finished_auctions_for_user($cms_user_id)
		{
		$auctions_array = array();
		$query = "SELECT id,title,description,value,reserve,end_value,buy_now_value,start_date,end_date,property_uid,cms_user_id,winner_cms_user_id,lang,blackbooking_id,finished FROM #__jomres_auctionhouse_auctions WHERE cms_user_id = ".(int)$cms_user_id." AND end_date < NOW() ORDER BY end_date ";
		$result=doSelectSql($query);
		return $this->construct_return_auction_data($result);
		}
	
	function construct_return_auction_data($result)
		{
		$return_array = array();
		if (!empty($result))
			{
			foreach ($result as $r)
				{
				$return_array[$r->id]['id']					= $r->id;
				$return_array[$r->id]['title']				= $r->title;
				$return_array[$r->id]['description']		= $r->description;
				$return_array[$r->id]['value']				= $r->value;
				$return_array[$r->id]['reserve']			= $r->reserve;
				$return_array[$r->id]['end_value']			= $r->end_value;
				$return_array[$r->id]['buy_now_value']		= $r->buy_now_value;
				$return_array[$r->id]['start_date']			= $r->start_date;
				$return_array[$r->id]['end_date']			= $r->end_date;
				$return_array[$r->id]['property_uid']		= $r->property_uid;
				$return_array[$r->id]['cms_user_id']		= $r->cms_user_id;
				$return_array[$r->id]['winner_cms_user_id']	= $r->winner_cms_user_id;
				$return_array[$r->id]['lang']				= $r->lang;
				$return_array[$r->id]['blackbooking_id']	= $r->blackbooking_id;
				$return_array[$r->id]['finished']			= $r->finished;
				
				}
			}
		return $return_array;
		}

	
	// A straight copy from the newblackbooking minicomponent
	function bb_getDateRange($start,$end)
		{
		$interval=dateDiff("d",$start,$end);
		$dateRangeArray=array();
		$date_elements  = explode("/",$start);
		$unixCurrentDate= mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
		$currentDay=$start;
		for ($i=0, $n=$interval; $i < $n; $i++)
			{
			$currentDay=date("Y/m/d",$unixCurrentDate);
			$dateRangeArray[]=$currentDay;
			$unixCurrentDate=strtotime("+1 day",$unixCurrentDate);
			}
		//$dateRangeString=implode(",",$dateRangeArray);
		return $dateRangeArray;
		}
	}
