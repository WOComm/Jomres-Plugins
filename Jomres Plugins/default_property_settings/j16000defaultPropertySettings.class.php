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


class j16000defaultPropertySettings
	{
	function __construct()
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents =jomres_getSingleton('mcHandler');
		if ($MiniComponents->template_touch)
			{
			$this->template_touchable=false; return;
			}
		$ePointFilepath = get_showtime('ePointFilepath');
		$jomresConfig_live_site = get_showtime('live_site');
		$output=array();
		$rows=array();
		$pageoutput=array();
		$output['PAGETITLE']=jr_gettext('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE','_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_TITLE',false);
		$output['HCONFIGTITLE']=jr_gettext('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE','_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CONFIGTITLE',false);
		$output['HKEY']=jr_gettext('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME','_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_VARIABLENAME',false);
		$output['HCURRENTVAL']=jr_gettext('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE','_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_CURRENTVALUE',false);
		$output['INSTRUCTIONS']=jr_gettext('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING','_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_WARNING',false);
		$output['_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE']=jr_gettext('_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE','_JRPORTAL_DEFAULT_PROPERTY_SETTINGS_NEWVALUE',false);
		
		
		$configTitles=$this->getConfigTitles();
		
		include( JOMRESCONFIG_ABSOLUTE_PATH . JRDS . JOMRES_ROOT_DIRECTORY . JRDS . 'jomres_config.php' );

		$query="SELECT akey,value FROM #__jomres_settings WHERE property_uid = 0";
		$settingsList=doSelectSql($query);
		
		foreach ($settingsList as $setting)
			{
			$mrConfig[$setting->akey] = $setting->value;
			}

		$i=0;
		foreach ($mrConfig as $set=>$value)
			{
			$r=array();
			if (
				$set != 'jomres_licensekey' && 
				$set != 'version' && 
				$set != 'encKey' && 
				$set != 'jomresdotnet' && 
				$set != 'property_vat_number' && 
				$set != 'property_vat_number_validated' && 
				$set != 'vat_number_validation_response' && 
				$set != 'facebook_page'
				)
				{
				if (!isset($configTitles[$set]))
					$configTitles[$set] = "";
				$r['CONFIGTITLE']=$configTitles[$set];
				$r['KEY'] = $set;
				$r['SETTING'] = $value;
				if ($i % 2 == 0)
					$r['CLASS']="odd";
				else
					$r['CLASS']="even";
				$rows[]=$r;
				$i++;
				}
			}
		$jrtbar =jomres_getSingleton('jomres_toolbar');
		$jrtb  = $jrtbar->startTable();
		
		$jrtb .= $jrtbar->toolbarItem('cancel',jomresURL(JOMRES_SITEPAGE_URL_ADMIN),'');
		$jrtb .= $jrtbar->toolbarItem('save','','',true,'save_defaultPropertySettings');
		
		$jrtb .= $jrtbar->endTable();
		$output['JOMRESTOOLBAR']=$jrtb;
		
		$output['JOMRES_SITEPAGE_URL_ADMIN']=JOMRES_SITEPAGE_URL_ADMIN;
		
		$pageoutput[]=$output;
		$tmpl = new patTemplate();
		$tmpl->setRoot( $ePointFilepath.'templates'.JRDS.find_plugin_template_directory() );
		$tmpl->readTemplatesFromInput( 'default_property_settings.html');
		$tmpl->addRows( 'pageoutput',$pageoutput);
		$tmpl->addRows( 'rows',$rows);
		$tmpl->displayParsedTemplate();
		}

	function getConfigTitles()
		{
		$titles=array();
		$titles['newTariffModels']= "X" ;
		$titles['galleryLink']= jr_gettext('_JOMRES_COM_A_GALLERYLINK','_JOMRES_COM_A_GALLERYLINK',false) ;
		$titles['editingOn']= jr_gettext('_JOMRES_COM_A_EDITINGMODEON','_JOMRES_COM_A_EDITINGMODEON',false) ;
		$titles['singlePersonSuppliment']= jr_gettext('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON','_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON',false) ;
		$titles['supplimentChargeIsPercentage']= jr_gettext('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_ISPERCENTAGE','_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_ISPERCENTAGE',false) ;
		$titles['singlePersonSupplimentCost']= jr_gettext('_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_COST','_JOMRES_COM_A_SUPPLIMENTS_SINGLEPERSON_COST',false) ;
		$titles['useOnlinepayment']= jr_gettext('_JOMRES_COM_A_GATEWAY_USEGATEWAYS','_JOMRES_COM_A_GATEWAY_USEGATEWAYS',false) ;
		$titles['defaultcountry']= jr_gettext('_JOMRES_COM_CONFIGCOUNTRIES','_JOMRES_COM_CONFIGCOUNTRIES',false) ;
		$titles['inputBoxErrorBackground']=  jr_gettext('_JOMRES_COM_INPUTERROR_BACKGROUND','_JOMRES_COM_INPUTERROR_BACKGROUND',false);
		$titles['inputBoxOktobookBackground']=  jr_gettext('_JOMRES_COM_INPUTOKTOBOOK_BACKGROUND','_JOMRES_COM_INPUTOKTOBOOK_BACKGROUND',false);
		$titles['editiconsize']= jr_gettext('_JOMRES_COM_A_EDITICON','_JOMRES_COM_A_EDITICON',false) ;
		//$titles['showRoomsInPropertyDetails']= jr_gettext('_JOMRES_COM_A_SHOWROOMINPROPERTYDETAILS',_JOMRES_COM_A_SHOWROOMINPROPERTYDETAILS,false) ;
		$titles['showRoomsListingLink']= jr_gettext('_JOMRES_COM_A_SHOWROOMSLISTLINK','_JOMRES_COM_A_SHOWROOMSLISTLINK',false) ;
		$titles['roomslistinpropertydetails']= jr_gettext('_JOMRES_COM_A_LISTROOMSINPROPERTYDETAILS','_JOMRES_COM_A_LISTROOMSINPROPERTYDETAILS',false) ;
		$titles['popupsAllowed']= jr_gettext('_JOMRES_COM_A_POPUPSALLOWED','_JOMRES_COM_A_POPUPSALLOWED',false) ;
		$titles['visitorscanbookonline']= jr_gettext('_JOMRES_COM_A_VISITORSCANBOOKONLINE','_JOMRES_COM_A_VISITORSCANBOOKONLINE',false) ;
		$titles['registeredUsersOnlyCanBook']= jr_gettext('_JOMRES_COM_A_REGISTEREDUSERSONLYBOOK','_JOMRES_COM_A_REGISTEREDUSERSONLYBOOK',false) ;
		$titles['bookingform_requiredfields_name']= jr_gettext('_JOMRES_FRONT_MR_DISPGUEST_FIRSTNAME','_JOMRES_FRONT_MR_DISPGUEST_FIRSTNAME',false) ;
		$titles['bookingform_requiredfields_surname']= jr_gettext('_JOMRES_FRONT_MR_DISPGUEST_SURNAME','_JOMRES_FRONT_MR_DISPGUEST_SURNAME',false) ;
		$titles['bookingform_requiredfields_houseno']= jr_gettext('_JOMRES_FRONT_MR_EB_GUEST_JOMRES_HOUSE_EXPL','_JOMRES_FRONT_MR_EB_GUEST_JOMRES_HOUSE_EXPL',false) ;
		$titles['bookingform_requiredfields_street']= jr_gettext('_JOMRES_FRONT_MR_EB_GUEST_JOMRES_STREET_EXPL','_JOMRES_FRONT_MR_EB_GUEST_JOMRES_STREET_EXPL',false) ;
		$titles['bookingform_requiredfields_town']= jr_gettext('_JOMRES_FRONT_MR_EB_GUEST_JOMRES_TOWN_EXPL','_JOMRES_FRONT_MR_EB_GUEST_JOMRES_TOWN_EXPL',false) ;
		$titles['bookingform_requiredfields_postcode']= jr_gettext('_JOMRES_FRONT_MR_EB_GUEST_JOMRES_POSTCODE_EXPL','_JOMRES_FRONT_MR_EB_GUEST_JOMRES_POSTCODE_EXPL',false) ;
		$titles['bookingform_requiredfields_region']= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION','_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION',false) ;
		$titles['bookingform_requiredfields_country']= jr_gettext('_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY','_JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY',false) ;
		$titles['bookingform_requiredfields_tel']= jr_gettext('_JOMRES_FRONT_MR_EB_GUEST_JOMRES_LANDLINE_EXPL','_JOMRES_FRONT_MR_EB_GUEST_JOMRES_LANDLINE_EXPL',false) ;
		$titles['bookingform_requiredfields_mobile']= jr_gettext('_JOMRES_FRONT_MR_EB_GUEST_JOMRES_MOBILE_EXPL','_JOMRES_FRONT_MR_EB_GUEST_JOMRES_MOBILE_EXPL',false) ;
		$titles['bookingform_requiredfields_email']= jr_gettext('_JOMRES_COM_MR_EB_GUEST_JOMRES_EMAIL_EXPL','_JOMRES_COM_MR_EB_GUEST_JOMRES_EMAIL_EXPL',false) ;
		$titles['showSlideshowLink']= jr_gettext('_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWLINK','_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWLINK',false) ;
		$titles['showSlideshowInline']= jr_gettext('_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWINLINE','_JOMRES_COM_A_SLIDESHOWS_SHOWSLIDESHOWINLINE',false) ;
		$titles['singleRoomProperty']= jr_gettext('_JOMRES_COM_A_SINGLEROOMPROPERTY','_JOMRES_COM_A_SINGLEROOMPROPERTY',false) ;
		$titles['tariffChargesStoredWeeklyYesNo']= jr_gettext('_JOMRES_COM_A_TARIFFPRICESAREWEEKLY','_JOMRES_COM_A_TARIFFPRICESAREWEEKLY',false) ;
		$titles['showOnlyAvailabilityCalendar']= jr_gettext('_JOMRES_COM_A_SHOWONLYAVLCAL','_JOMRES_COM_A_SHOWONLYAVLCAL',false) ;
		$titles['fixedPeriodBookings']= jr_gettext('_JOMRES_COM_A_FIXEDPERIODBOOKINGS','_JOMRES_COM_A_FIXEDPERIODBOOKINGS',false) ;
		$titles['fixedPeriodBookingsNumberOfDays']= jr_gettext('_JOMRES_COM_A_FIXEDPERIOD','_JOMRES_COM_A_FIXEDPERIOD',false) ;
		$titles['numberofFixedPeriods']= jr_gettext('_JOMRES_COM_A_FIXEDPERIOD_NUMBEROFPERIODS','_JOMRES_COM_A_FIXEDPERIOD_NUMBEROFPERIODS',false) ;
		$titles['fixedPeriodBookingsShortYesNo']= jr_gettext('_JOMRES_COM_A_FIXEDPERIODBOOKINGSSHORT','_JOMRES_COM_A_FIXEDPERIODBOOKINGSSHORT',false) ;
		$titles['fixedPeriodBookingsShortNumberOfDays']= jr_gettext('_JOMRES_COM_A_FIXEDPERIOD_SHORTBREAK_DAYS','_JOMRES_COM_A_FIXEDPERIOD_SHORTBREAK_DAYS',false) ;
		$titles['fixedArrivalDateYesNo']= jr_gettext('_JOMRES_COM_MR_FIXEDARRIVALDATE_YESNO','_JOMRES_COM_MR_FIXEDARRIVALDATE_YESNO',false) ;
		$titles['fixedArrivalDay']= jr_gettext('_JOMRES_COM_MR_FIXEDARRIVALDATE_DAY','_JOMRES_COM_MR_FIXEDARRIVALDATE_DAY',false) ;
		$titles['fixedArrivalDatesRecurring']= jr_gettext('_JOMRES_COM_MR_FIXEDARRIVALDATE_RECURRING','_JOMRES_COM_MR_FIXEDARRIVALDATE_RECURRING',false) ;
		$titles['tariffmode']= jr_gettext('JOMRES_COM_A_TARIFFMODE','JOMRES_COM_A_TARIFFMODE',false) ;
		$titles['cformat']= jr_gettext('_JOMRES_CURRENCYFORMAT','_JOMRES_CURRENCYFORMAT',false) ;
		$titles['newTariffModels']= jr_gettext('_JOMRES_COM_A_TARIFFS_MODEL','_JOMRES_COM_A_TARIFFS_MODEL',false) ;
		$titles['currency']= jr_gettext('_JOMRES_COM_A_CURRENCYSYMBOL','_JOMRES_COM_A_CURRENCYSYMBOL',false) ;
		$titles['currencyCode']= jr_gettext('_JOMRES_COM_A_CURRENCYCODE','_JOMRES_COM_A_CURRENCYCODE',false) ;
		$titles['perPersonPerNight']=jr_gettext('_JOMRES_COM_A_TARIFFS_PER','_JOMRES_COM_A_TARIFFS_PER',false)  ;
		$titles['chargeDepositYesNo']= jr_gettext('_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT','_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT',false) ;
		$titles['depositIsPercentage']= jr_gettext('_JOMRES_COM_A_DEPOSIT_ISPERCENTAGE','_JOMRES_COM_A_DEPOSIT_ISPERCENTAGE',false) ;
		$titles['depositValue']= jr_gettext('_JOMRES_COM_A_DEPOSIT_VALUE','_JOMRES_COM_A_DEPOSIT_VALUE',false) ;
		$titles['depAmount']= jr_gettext('_JOMRES_COM_CHARGING_CONFIG','_JOMRES_COM_CHARGING_CONFIG',false) ;
		$titles['roundupDepositYesNo']= jr_gettext('_JOMRES_COM_A_DEPOSIT_DEPOSITROUNDUP','_JOMRES_COM_A_DEPOSIT_DEPOSITROUNDUP',false) ;
		$titles['showTariffsLink']= jr_gettext('_JOMRES_COM_A_TARIFFS_SHOWTARIFFSLINK','_JOMRES_COM_A_TARIFFS_SHOWTARIFFSLINK',false) ;
		$titles['showTariffsInline']= jr_gettext('_JOMRES_COM_A_TARIFFS_SHOWTARIFFSINLINE','_JOMRES_COM_A_TARIFFS_SHOWTARIFFSINLINE',false) ;
		$titles['verbosetariffinfo']= jr_gettext('JOMRES_COM_A_VERBOSETARIFFINTO','JOMRES_COM_A_VERBOSETARIFFINTO',false) ;
		$titles['roomTaxYesNo']= jr_gettext('_JOMRES_COM_A_ROOMTAX','_JOMRES_COM_A_ROOMTAX',false) ;
		$titles['roomTaxFixed']= jr_gettext('_JOMRES_COM_A_ROOMTAX_FIXED','_JOMRES_COM_A_ROOMTAX_FIXED',false) ;
		$titles['roomTaxPercentage']= jr_gettext('_JOMRES_COM_A_ROOMTAX_PERCENTAGE','_JOMRES_COM_A_ROOMTAX_PERCENTAGE',false) ;
		$titles['euroTaxYesNo']= jr_gettext('_JOMRES_COM_A_EUROTAX','_JOMRES_COM_A_EUROTAX',false) ;
		$titles['euroTaxPercentage']= jr_gettext('_JOMRES_COM_A_EUROTAX_PERCENTAGE','_JOMRES_COM_A_EUROTAX_PERCENTAGE',false) ;
		$titles['showGoogleCurrencyLink']= jr_gettext('_JOMRES_SHOWGOOGLECURRENCYLINKS','_JOMRES_SHOWGOOGLECURRENCYLINKS',false) ;
		$titles['lastminuteactive']= jr_gettext('_JOMCOMP_LASTMINUTE_ACTIVE','_JOMCOMP_LASTMINUTE_ACTIVE',false) ;
		$titles['lastminutethreshold']= jr_gettext('_JOMCOMP_LASTMINUTE_THREASHOLD','_JOMCOMP_LASTMINUTE_THREASHOLD',false) ;
		$titles['lastminutediscount']= jr_gettext('_JOMCOMP_LASTMINUTE_DISCOUNT','_JOMCOMP_LASTMINUTE_DISCOUNT',false) ;
		$titles['wisepriceactive']= jr_gettext('_JOMCOMP_WISEPRICE_ACTIVE','_JOMCOMP_WISEPRICE_ACTIVE',false) ;
		$titles['wisepricethreshold']= jr_gettext('_JOMCOMP_WISEPRICE_THREASHOLD','_JOMCOMP_WISEPRICE_THREASHOLD',false) ;
		$titles['wiseprice10discount']= jr_gettext('_JOMCOMP_WISEPRICE_PERCENTAGE10','_JOMCOMP_WISEPRICE_PERCENTAGE10',false) ;
		$titles['wiseprice25discount']= jr_gettext('_JOMCOMP_WISEPRICE_PERCENTAGE25','_JOMCOMP_WISEPRICE_PERCENTAGE25',false) ;
		$titles['wiseprice50discount']= jr_gettext('_JOMCOMP_WISEPRICE_PERCENTAGE50','_JOMCOMP_WISEPRICE_PERCENTAGE50',false) ;
		$titles['wiseprice75discount']= jr_gettext('_JOMCOMP_WISEPRICE_PERCENTAGE75','_JOMCOMP_WISEPRICE_PERCENTAGE75',false) ;
		$titles['CalendarMonthsToShow']= jr_gettext('_JOMRES_COM_MONTHSTOSHOW','_JOMRES_COM_MONTHSTOSHOW',false) ;
		$titles['calstartfrombeginningofyear']= jr_gettext('_JOMRES_COM_MONTHS_STARTOFYEAR','_JOMRES_COM_MONTHS_STARTOFYEAR',false) ;
		$titles['dateFormatStyle']= jr_gettext('_JOMRES_COM_A_DATEFORMATSTYLE','_JOMRES_COM_A_DATEFORMATSTYLE',false) ;
		$titles['cal_output']= jr_gettext('_JOMRES_COM_CALENDAROUTPUT','_JOMRES_COM_CALENDAROUTPUT',false) ;
		$titles['cal_input']=jr_gettext('_JOMRES_COM_CALENDARINPUT','_JOMRES_COM_CALENDARINPUT',false)  ;
		$titles['avlcal_todaycolor']= jr_gettext('_JOMRES_COM_AVLCAL_TODAYCOLOUR','_JOMRES_COM_AVLCAL_TODAYCOLOUR',false) ;
		$titles['avlcal_inmonthface']= jr_gettext('_JOMRES_COM_AVLCAL_INMONTHFACE','_JOMRES_COM_AVLCAL_INMONTHFACE',false) ;
		$titles['avlcal_outmonface']= jr_gettext('_JOMRES_COM_AVLCAL_OUTMONTHFACE','_JOMRES_COM_AVLCAL_OUTMONTHFACE',false) ;
		$titles['avlcal_inbgcolour']= jr_gettext('_JOMRES_COM_AVLCAL_INBGCOLOUR','_JOMRES_COM_AVLCAL_INBGCOLOUR',false) ;
		$titles['avlcal_outbgcolour']= jr_gettext('_JOMRES_COM_AVLCAL_OUTBGCOLOUR','_JOMRES_COM_AVLCAL_OUTBGCOLOUR',false) ;
		$titles['avlcal_occupiedcolour']= jr_gettext('_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR','_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR',false) ;
		$titles['avlcal_provisionalcolour']= jr_gettext('_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR','_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR',false) ;
		$titles['avlcal_booking']= jr_gettext('_JOMRES_COM_AVLCAL_CURRENTBOOKINGFONT','_JOMRES_COM_AVLCAL_CURRENTBOOKINGFONT',false) ;
		$titles['avlcal_pastcolour']= jr_gettext('_JOMRES_COM_AVLCAL_PASTCOLOUR','_JOMRES_COM_AVLCAL_PASTCOLOUR',false) ;
		$titles['avlcal_black']= jr_gettext('_JOMRES_FRONT_BLACKBOOKING','_JOMRES_FRONT_BLACKBOOKING',false) ;
		$titles['avlcal_weekendborder']= jr_gettext('_JOMRES_COM_AVLCAL_WEEKENDBORDER','_JOMRES_COM_AVLCAL_WEEKENDBORDER',false) ;
		$titles['minimuminterval']= jr_gettext('_JOMRES_COM_A_MINIMUMINTERVAL','_JOMRES_COM_A_MINIMUMINTERVAL',false) ;
		$titles['mindaysbeforearrival']= jr_gettext('_JOMRES_COM_A_DAYSBEFOREFIRSTBOOKING','_JOMRES_COM_A_DAYSBEFOREFIRSTBOOKING',false) ;
		$titles['defaultNumberOfFirstGuesttype']= jr_gettext('_JOMRES_COM_A_DEFAULTNUMBEROFFIRSTGUESTTYPE','_JOMRES_COM_A_DEFAULTNUMBEROFFIRSTGUESTTYPE',false) ;
		$titles['showExtras']= jr_gettext('_JOMRES_COM_A_EXTRAS','_JOMRES_COM_A_EXTRAS',false) ;
		$titles['limitAdvanceBookingsYesNo']= jr_gettext('_JOMRES_COM_A_ADVANCEBOOKINGSLIMITYESNO','_JOMRES_COM_A_ADVANCEBOOKINGSLIMITYESNO',false) ;
		$titles['advanceBookingsLimit']= jr_gettext('_JOMRES_COM_A_ADVANCEBOOKINGSLIMITDAYS','_JOMRES_COM_A_ADVANCEBOOKINGSLIMITDAYS',false) ;
		$titles['showAvailabilityCalendar']= jr_gettext('_JOMRES_COM_A_SHOWAVILABILITY_CALENDAR','_JOMRES_COM_A_SHOWAVILABILITY_CALENDAR',false) ;
		$titles['showdepartureinput']= jr_gettext('_JOMRES_COM_A_SHOWDEPARTUREINPUT','_JOMRES_COM_A_SHOWDEPARTUREINPUT',false) ;
		$titles['returnRoomsLimit']= jr_gettext('_JOMRES_COM_LIMITROOMSLIST','_JOMRES_COM_LIMITROOMSLIST',false) ;
		$titles['weekenddays']= jr_gettext('_JOMRES_COM_WEEKENDDAYS','_JOMRES_COM_WEEKENDDAYS',false) ;
		$titles['showRoomImageInBookingFormOverlib']= jr_gettext('_JOMRES_COM_A_BOOKINGFORM_SHOWROOMIMAGE','_JOMRES_COM_A_BOOKINGFORM_SHOWROOMIMAGE',false) ;
		$titles['bookingform_roomlist_showroomno']= jr_gettext('_JOMRES_COM_A_BOOKINGFORM_SHOWROOMNO','_JOMRES_COM_A_BOOKINGFORM_SHOWROOMNO',false) ;
		$titles['bookingform_roomlist_showroomname']= jr_gettext('_JOMRES_COM_A_BOOKINGFORM_SHOWROOMNAME','_JOMRES_COM_A_BOOKINGFORM_SHOWROOMNAME',false) ;
		$titles['bookingform_roomlist_showtarifftitle']= jr_gettext('_JOMRES_COM_A_BOOKINGFORM_SHOWTARIFFTITLE','_JOMRES_COM_A_BOOKINGFORM_SHOWTARIFFTITLE',false) ;

		$titles['bookingform_roomlist_showdisabled']= jr_gettext('_JOMRES_COM_A_BOOKINGFORM_SHOWDISABLED','_JOMRES_COM_A_BOOKINGFORM_SHOWDISABLED',false) ;
		$titles['bookingform_roomlist_showmaxpeople']= jr_gettext('_JOMRES_COM_A_BOOKINGFORM_SHOWMAXPEOPLE','_JOMRES_COM_A_BOOKINGFORM_SHOWMAXPEOPLE',false) ;
		$titles['accommodation_tax_code']= jr_gettext('_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE','_JRPORTAL_INVOICES_LINEITEMS_TAX_RATE',false) ;
		$titles['use_variable_deposits']= jr_gettext('_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT_VARIABLE','_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT_VARIABLE',false) ;
		$titles['variable_deposit_threashold']= jr_gettext('_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT_NUMBEROFDAYS','_JOMRES_COM_A_DEPOSIT_CHARGEDEPOSIT_NUMBEROFDAYS',false) ;
		$titles['property_currencycode']= jr_gettext('_JOMRES_COM_A_CURRENCYCODE','_JOMRES_COM_A_CURRENCYCODE',false) ;
		$titles['prices_inclusive']= jr_gettext('_JOMRES_COM_A_TAXINCLUSIVE','_JOMRES_COM_A_TAXINCLUSIVE',false) ;
		$titles['booking_form_rooms_list_style']= jr_gettext('_JOMRES_ROOMMSLIST_STYLE','_JOMRES_ROOMMSLIST_STYLE',false) ;
		$titles['booking_form_daily_weekly_monthly']= jr_gettext('_JOMRES_BOOKINGFORM_PRICINGOUTPUT','_JOMRES_BOOKINGFORM_PRICINGOUTPUT',false) ;
		$titles['requireApproval']= jr_gettext('_JOMRES_BOOKING_INQUIRY_SETTING_TITLE','_JOMRES_BOOKING_INQUIRY_SETTING_TITLE',false) ;

		return $titles;
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}