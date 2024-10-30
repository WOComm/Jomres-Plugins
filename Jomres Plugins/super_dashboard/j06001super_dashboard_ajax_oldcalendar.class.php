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

jr_import( 'jomres_dashboard' );

class j06001super_dashboard_ajax_oldcalendar extends jomres_dashboard
	{
	function __construct( $componentArgs )
		{
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch )
			{
			$this->template_touchable = false;
			
			return;
			}

		jr_import('jomres_encryption');
		$this->jomres_encryption = new jomres_encryption();
		
		$property_uid = $componentArgs[ 'property_uid' ];
		if ( is_null( $property_uid ) ) $property_uid = getDefaultProperty();

		$thisJRUser = jomres_singleton_abstract::getInstance( 'jr_user' );
		if ( !in_array( $property_uid, $thisJRUser->authorisedProperties ) ) return;

		$this->property_uid = $property_uid;

		$mrConfig = getPropertySpecificSettings( $this->property_uid );
		if ( $mrConfig[ 'is_real_estate_listing' ] == 1 ) return;

		$this->show_legend = false;
		if ( isset( $componentArgs[ 'show_legend' ] ) ) $this->show_legend = $componentArgs[ 'show_legend' ];
		elseif ( get_showtime( "task" ) == "dashboard" ) $this->show_legend = true;

		$this->show_date_dropdown = false;
		if ( isset( $componentArgs[ 'show_date_dropdown' ] ) ) $this->show_date_dropdown = $componentArgs[ 'show_date_dropdown' ];
		elseif ( get_showtime( "task" ) == "dashboard" ) $this->show_date_dropdown = true;
		if ( $mrConfig[ 'singleRoomProperty' ] == "1" ) $this->show_date_dropdown = false;

		$this->cfg_todaycolor        = $mrConfig[ 'avlcal_todaycolor' ]; ## font color for the current date
		$this->cfg_inmonthface       = $mrConfig[ 'avlcal_inmonthface' ]; ## font color for days in the display month
		$this->cfg_outmonthface      = $mrConfig[ 'avlcal_outmonface' ]; ## font color for days not in the display month
		$this->cfg_inbgcolor         = $mrConfig[ 'avlcal_inbgcolour' ]; ## cell bgcolor for days in the display month
		$this->cfg_outbgcolor        = $mrConfig[ 'avlcal_outbgcolour' ]; ## cell bgcolor for days not in display month
		$this->cfg_occupiedcolour    = $mrConfig[ 'avlcal_occupiedcolour' ]; ## cell bgcolour for occupied days
		$this->cfg_provisionalcolour = $mrConfig[ 'avlcal_provisionalcolour' ]; ## cell bgcolour for occupied days
		$this->cfg_pastcolour        = $mrConfig[ 'avlcal_pastcolour' ]; ## cell bgcolour for occupied days
		$this->cfg_booking           = $mrConfig[ 'avlcal_booking' ]; ## font color for days where the room is booked up
		$this->cfg_black             = $mrConfig[ 'avlcal_black' ]; ## font color for days where the room is black booked
		$this->cfg_weekendborder     = $mrConfig[ 'avlcal_weekendborder' ]; ## font color for days where the room is black booked
		$this->requestedMonth        = jomresGetParam( $_REQUEST, 'requestedMonth', 0 );
		$this->dashboardmonthcookie  = jomresGetParam( $_COOKIE, 'dashboardmonth', '' );

		if ( $this->requestedMonth == 0 )
			{
			$currentMonth = date( "Y/m" );
			$dateElements = explode( "/", $currentMonth );
			if ( !$this->dashboardmonthcookie )
				{
				$this->dashboardmonthcookie = mktime( 0, 0, 0, $dateElements[ 1 ], 1, $dateElements[ 0 ] );
				SetCookie( "dashboardmonth", "$this->dashboardmonthcookie", time() + 3600 );
				$this->requestedMonth = $this->dashboardmonthcookie;
				}
			else
				{
				$this->requestedMonth = $this->dashboardmonthcookie;
				}
			}
		else
		SetCookie( "dashboardmonth", "$this->dashboardmonthcookie", time() + 3600 );
		$this->roomsArray           = array ();
		$this->thisMonthsDatesArray = array ();
		$this->unixLatestDate       = 0;
		$this->monthsToShow         = 16;

		// Let's do some data collection to try to minimise the db queries
		$this->contracts = array ();
		$query           = "SELECT contract_uid,deposit_paid,arrival,departure,guest_uid FROM #__jomres_contracts WHERE property_uid = '" . (int) $this->property_uid . "' AND `cancelled` != 1 ";
		$contractList    = doSelectSql( $query );
		if ( !empty( $contractList ))
			{
			foreach ( $contractList as $c )
				{
				$this->contracts[ $c->contract_uid ] = array ( "deposit_paid" => $c->deposit_paid, "arrival" => $c->arrival, "departure" => $c->departure, "guest_uid" => $c->guest_uid );
				}
			}

		$this->guestInfo = array ();
		$query           = "SELECT enc_firstname,enc_surname,guests_uid FROM #__jomres_guests WHERE property_uid = '" . (int) $this->property_uid . "'";
		$guestList       = doSelectSql( $query );
		if ( !empty( $guestList ))
			{
			foreach ( $guestList as $c )
				{
				$this->guestInfo[ $c->guests_uid ] = array ( "firstname" => $this->jomres_encryption->decrypt($c->enc_firstname), "surname" => $this->jomres_encryption->decrypt($c->enc_surname) );
				}
			}

		$this->room_bookings = array ();
		$query               = "SELECT room_uid,contract_uid,black_booking,date FROM #__jomres_room_bookings WHERE property_uid = " . (int) $this->property_uid;
		$bookingsList        = doSelectSql( $query );
		if ( !empty( $bookingsList ) )
			{
			foreach ( $bookingsList as $c )
				{
				$this->room_bookings[ ] = array ( "room_uid" => $c->room_uid, "contract_uid" => $c->contract_uid, "black_booking" => $c->black_booking, "date" => $c->date );
				}
			}


		$this->todaysDate     = date( "Y/m/d" );
		$today                = getdate();
		$this->unixTodaysDate = mktime( 0, 0, 0, $today[ 'mon' ], $today[ 'mday' ], $today[ 'year' ] );
		$this->setDates();
		$this->getRoomsForProperty();


		$cachableContent = '';

		if ( $this->show_date_dropdown ) $cachableContent .= $this->dashboardMakeMonthList();

		$cachableContent .= $this->viewRoomsHorizontal();

		if ( $this->show_legend ) $cachableContent .= $this->getLegend();

		echo $cachableContent;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function viewRoomsHorizontal()
		{
		$mrConfig = getPropertySpecificSettings();

		$output       = "";
		$monthsToShow = 1;
		if ( $mrConfig[ 'singleRoomProperty' ] == "1" ) $monthsToShow = 12;
		$i = 1;
		while ( $i <= $monthsToShow )
			{
			$output .= '<table class="jomres_dashboard" style="table-layout:fixed;font-size: 11px;line-height: 14px;border-collapse: inherit;border-spacing: 1px;">';
			foreach ( $this->roomsArray as $room )
				{
				$n        = 1;
				$bookings = array ();
				if ( !empty( $this->room_bookings ) )
					{
					foreach ( $this->room_bookings as $r )
						{
						if ( $r[ 'room_uid' ] == $room[ 'id' ] )
							{
							$bookings[ ] = array ( "contract_uid" => $r[ 'contract_uid' ], "black_booking" => $r[ 'black_booking' ], "date" => $r[ 'date' ] );
							}
						}
					}
				$output .= "<tr>";
				if ( $mrConfig[ 'singleRoomProperty' ] == "1" ) $output .= '<td>' . date( "m/Y", $this->requestedMonth ) . '</td>';
				else
					{
					$output .= '<td>' . $room[ 'room_number' ] . '</td>';
					}
				$output .= $this->getHorizontalRoom( $room[ 'id' ], $bookings );
				$output .= "</tr>";
				}
			$output .= "</table>";
			$currentMonth = date( "Y/m/d", $this->requestedMonth );
			$dateElements = explode( "/", $currentMonth );


			$this->requestedMonth       = mktime( 0, 0, 0, $dateElements[ 1 ] + 1, $dateElements[ 2 ], $dateElements[ 0 ] );
			$this->thisMonthsDatesArray = array ();
			$this->setDates();
			$i++;
			//echo $i;
			}

		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getHorizontalRoom( $room_id, $bookings )
		{
		$mrConfig = getPropertySpecificSettings();
		$output   = "";
		$i        = 0;

		$roomsArray    = array ();
		$bookingsArray = array ();
		foreach ( $bookings as $rm )
			{
			$date                   = $rm[ 'date' ];
			$contractUid            = $rm[ 'contract_uid' ];
			$blackbooking           = $rm[ 'black_booking' ];
			$bookingsArray[ $date ] = array ( 'contract_uid' => $contractUid, 'black_booking' => $blackbooking );
			}
		foreach ( $this->thisMonthsDatesArray as $currdate )
			{
			$dobookingLink    = false;
			$viewbookingLink  = false;
			$blackBookingLink = false;
			$showDate         = true;
			$pastDate         = false;
			$contract_uid     = "";
			$bgcolor          = $this->cfg_inbgcolor;
			$fcolor           = $this->cfg_inmonthface;
			$sqlDate          = date( "Y/m/d", $currdate );
			$sqlDate2         = date( "Y-m-d", $currdate );

			$deposit_paid = true;
			if ( !empty( $bookingsArray ) )
				{
				if ( array_key_exists( date( "Y/m/d", $currdate ), $bookingsArray ) )
					{
					$bgcolor         = $this->cfg_occupiedcolour;
					$fcolor          = $this->cfg_booking;
					$viewbookingLink = true;
					$d               = date( "Y/m/d", $currdate );
					$t               = $bookingsArray[ $d ];
					$contract_uid    = $t[ 'contract_uid' ];
					$black_booking   = $t[ 'black_booking' ];
					if ( $black_booking != "1" )
						{
						$deposit_paid = $this->contracts[ $contract_uid ][ "deposit_paid" ];
						if ( !$deposit_paid ) $bgcolor = $this->cfg_provisionalcolour;
						}
					else
						{
						$fcolor           = $this->cfg_black;
						$blackBookingLink = true;
						}
					}
				}
			if ( $this->isWeekend( $currdate ) ) //$border='border:solid 1px '.$this->cfg_weekendborder.';';
			$border='border:solid 1px #ffffff;';
			else
			$border = "";

			if ( !$viewbookingLink && !$blackBookingLink ) $dobookingLink = true;
			if ( ( $mrConfig[ 'limitAdvanceBookingsYesNo' ] == "1" && ( $currdate >= $this->unixLatestDate ) ) /* ||$currdate<$this->unixTodaysDate */ )
				{
				$pastDate = true;
				$bgcolor  = $this->cfg_pastcolour;
				}
			if ( date( "d", $currdate ) == date( "d" ) && date( "m", $currdate ) == date( "m" ) && date( "Y", $currdate ) == date( "Y" ) ) $fcolor = $this->cfg_todaycolor;
			$output .= $this->showDate( $pastDate, $dobookingLink, $bgcolor, $fcolor, $currdate, $sqlDate2, $contract_uid, $room_id, $border, $blackBookingLink );
			$i++;
			$currdate = mktime( 0, 0, 0, date( "m", $this->startdate ), date( "d", $this->startdate ) + $i, date( "Y", $this->startdate ) );
			}

		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function showDate( $pastDate, $dobookingLink, $bgcolor, $fcolor, $currdate, $sqlDate2, $contract_uid, $room_id, $border, $blackBookingLink )
		{
		$paddingtop           = "0px";
		$paddingbottom        = "0px";
		$paddingleft          = "0px";
		$paddingright         = "0px";
		$padding              = "0px"; ## overrides jomress.css values, padding is treated differently by browsers and causes image problems
		$weekdayheaderpadding = "0px";

		static $PREVIOUS_BGCOLOR = "";

		$mrConfig = getPropertySpecificSettings();

		$cfg_inbgcolor         = $mrConfig[ 'avlcal_inbgcolour' ]; ## cell bgcolor for days in the display month - GREEN
		$cfg_outbgcolor        = $mrConfig[ 'avlcal_outbgcolour' ]; ## cell bgcolor for days not in display month
		$cfg_occupiedcolour    = $mrConfig[ 'avlcal_occupiedcolour' ]; ## cell bgcolour for occupied days
		$cfg_provisionalcolour = $mrConfig[ 'avlcal_provisionalcolour' ]; ## cell bgcolour for occupied days
		$cfg_pastcolour        = $mrConfig[ 'avlcal_pastcolour' ]; ## cell bgcolour for occupied days

		$cell_width = "";


		$output          = "";
		$bookinglink     = get_booking_url($this->property_uid, '', '&arrivalDate=' . JSCalmakeInputDates( date( "Y/m/d", $currdate ) ));
		$viewbookinglink = JOMRES_SITEPAGE_URL . '&amp;task=edit_booking&amp;contract_uid=' . $contract_uid . '&thisProperty=' . $this->property_uid;
		$basicFont       = '<div style="style=color:' . $fcolor . '; ' . $border . ' ">';

		$style        = 'style="overflow:hidden;white-space:nowrap;padding:' . $padding . ';"';
		$width_height = 'width="16" height="16"';

		$output .= '<td align="center" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . '>';

		if ( $dobookingLink /* && !$pastDate */ )
			{
			if ( $bgcolor == $cfg_inbgcolor && $bgcolor != $PREVIOUS_BGCOLOR ) /* current date is an AVAILABLE and is different to previous */
				{
				switch ( $PREVIOUS_BGCOLOR )
				{
					case $cfg_provisionalcolour: /* previous was PROVISIONAL */
						switch ( $bgcolor )
						{
							case $cfg_inbgcolor: /* PROVISIONAL to AVAILABLE ==DEPARTURE== */
								$output = '<td align="center" class="date_ProvisionalToAvailable" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							default:
								break;
						}
						break;
					case $cfg_occupiedcolour: /* previous was BOOKED */
						switch ( $bgcolor )
						{
							case $cfg_inbgcolor: /* BOOKED to AVAILABLE == DEPARTURE ==  */
								$output = '<td align="center" class="date_BookedToAvailable" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							default:
								break;
						}
						break;
					case $cfg_pastcolour: /* previous was PAST DATE*/
						switch ( $bgcolor )
						{
							case $cfg_inbgcolor: /* PAST DATE to AVAILABLE  */
								break;
							case $cfg_provisionalcolour: /* PAST DATE to PROVISIONAL */
								break;
							case $cfg_occupiedcolour: /* PAST DATE TO BOOKED */
								break;
							default:
								break;
						}
						break;
					default:
						break;
				}
				}

			if ( $mrConfig[ 'fixedArrivalDateYesNo' ] == "1" )
				{
				$currdow = date( "w", $currdate );
				if ( $mrConfig[ 'fixedArrivalDay' ] == date( "w", $currdate ) )
					{
					if ( $mrConfig[ 'visitorscanbookonline' ] )
						{
						if ( !$mrConfig[ 'singleRoomProperty' ] ) $bookinglink .= '&remus=' . $room_id;
						$output .= '<a href="' . jomresValidateUrl( jomresURL( $bookinglink ) ) . '" class="rescal_dashboard"  style="color:' . $fcolor . '; ' . $border . '">' . ( date( "d", $currdate ) ) . '</a>' . '</div></td>
						';
						}
					else
					$output .= date( "d", $currdate );
					}
				else
				$output .= date( "d", $currdate );
				}
			else
				{
				if ( !$mrConfig[ 'singleRoomProperty' ] ) $bookinglink .= '&remus=' . $room_id;
				$output .= '<a href="' . jomresValidateUrl( jomresURL( $bookinglink ) ) . '" class="rescal_dashboard"  style="color:' . $fcolor . '; ' . $border . '">' . ( date( "d", $currdate ) ) . '</a>' . '</td>
				';
				}
			}
		else
			{

			if ( $bgcolor != $PREVIOUS_BGCOLOR ) /* first deal with case when current is different to previous */
				{
				switch ( $PREVIOUS_BGCOLOR )
				{
					case $cfg_inbgcolor: /* previous was AVAILABLE  */
						switch ( $bgcolor )
						{
							case $cfg_provisionalcolour: /* AVAILABLE to PROVISIONAL */
								$output = '<td align="center" class="date_AvailableToProvisional" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							case $cfg_occupiedcolour: /* AVAILABLE to BOOKED */
								$output = '<td align="center" class="date_AvailableToBooked" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							default:
								break;
						}
						break;
					case $cfg_provisionalcolour: /* previous colour was PROVISIONAL */
						switch ( $bgcolor )
						{
							case $cfg_inbgcolor: /* PROVISIONAL to AVAILABLE ==DEPARTURE== */
								//echo "YELLOW/GREEN....";
								$output = '<td align="center" class="date_ProvisionalToAvailable" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							case $cfg_occupiedcolour: /* PROVISIONAL to BOOKED */
								$output = '<td align="center" class="date_ProvisionalToBooked" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							default:
								break;
						}
						break;
					case $cfg_occupiedcolour: /* previous was BOOKED */
						switch ( $bgcolor )
						{
							case $cfg_inbgcolor: /* BOOKED to AVAILABLE == departure == */
								$output = '<td align="center" class="date_BookedToAvailable" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							case $cfg_provisionalcolour: /* BOOKED to PROVISIONAL */
								$output = '<td align="center" class="date_BookedToProvisional" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
								break;
							default:
								break;
						}
						break;
					case $cfg_outbgcolor: /* previous PAST DATE */
						switch ( $bgcolor )
						{
							case $cfg_inbgcolor: /* PAST DATE to AVAILABLE */
								break;
							case $cfg_provisionalcolour: /* PAST DATE to PROVISIONAL */
								break;
							case $cfg_occupiedcolour: /* PAST DATE to BOOKED */
								break;
							default:
								break;
						}
						break;
					default:
						break;
				}
				}

			if ( $contract_uid != "" )
				{

				/* now deal with case that we have a changeover but colour is same for previous and new booking */
				if ( ( $bgcolor == $PREVIOUS_BGCOLOR ) && ( date( "Y/m/d", $currdate ) == $this->contracts[ $contract_uid ][ 'arrival' ] ) )
					{
					switch ( $PREVIOUS_BGCOLOR )
					{
						case $cfg_provisionalcolour: /* previous was PROVISIONAL */
							switch ( $bgcolor )
							{
								case $cfg_provisionalcolour: /* PROVISIONAL to PROVISIONAL */
									$output = '<td align="center" class="date_ProvisionalToProvisional" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
									break;
								default:
									break;
							}
							break;
						case $cfg_occupiedcolour: /* previous was BOOKED */
							switch ( $bgcolor )
							{
								case $cfg_occupiedcolour: /* BOOKED to BOOKED */
									$output = '<td align="center" class="date_BookedToBooked" ' . $style . ' valign="middle" bgcolor="' . $bgcolor . '" ' . $width_height . ' >';
									break;
								default:
									break;
							}
							break;
						default:
							break;
					}
					}

				$is_firstday = false;

				$guest_uid = $this->contracts[ $contract_uid ][ 'guest_uid' ];
                if (isset ($this->guestInfo[ $guest_uid ][ 'firstname' ]) && isset($this->guestInfo[ $guest_uid ][ 'firstname' ])) {
                    $content   = $this->guestInfo[ $guest_uid ][ 'firstname' ] . ' ' . $this->guestInfo[ $guest_uid ][ 'surname' ];
                }
                else {
                    $content   = "Name unknown";
                }
				

				$output .= jomres_makeTooltip( date( "d", $currdate ) . "_" . $contract_uid . "_" . $guest_uid, '', $content, date( "d", $currdate ), "", "dashboard_tooltip", "", jomresValidateUrl( jomresURL( $viewbookinglink ) ) ) . "</td>";
				}
			else
				{
				$output .= $basicFont . date( "d", $currdate ) . "</div></td>
				";
				}
			}
		$PREVIOUS_BGCOLOR = $bgcolor;

		return $output;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getOverlibBookingDeets( $contract_uid )
		{
		$content   = outputDate( $this->contracts[ $contract_uid ][ 'arrival' ] ) . '-' . outputDate( $this->contracts[ $contract_uid ][ 'departure' ] );
		$guest_uid = $this->contracts[ $contract_uid ][ 'guest_uid' ];

		$r = 'onmouseover="return overlib(\'' . $content . '\', CAPTION, \'' . $this->guestInfo[ $guest_uid ][ 'firstname' ] . ' ' . $this->guestInfo[ $guest_uid ][ 'surname' ] . '\');" onmouseout="return nd();"';

		return $r;
		}


	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function dashboardMakeMonthList( $orientation = "" )
		{
		$monthsArray = array ();
		$output      = "";
		//setlocale(LC_ALL, $jomresConfig_locale );
		$currentMonth = date( "Y/m/d" );
		$dateElements = explode( "/", $currentMonth );
		//$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1],1,$dateElements[0]));
		//$year      = strftime( "%Y", mktime( 0, 0, 0, $dateElements[ 1 ] + $i, 1, $dateElements[ 0 ] ) );
		//$nextMonth = getThisMonthName( strftime( "%m", mktime( 0, 0, 0, $dateElements[ 1 ] + $i, 1, $dateElements[ 0 ] ) ), false ) . " " . $year;
		$year      = strftime( "%Y", mktime( 0, 0, 0, $dateElements[ 1 ], 1, $dateElements[ 0 ] ) );
		$nextMonth = getThisMonthName( strftime( "%m", mktime( 0, 0, 0, $dateElements[ 1 ], 1, $dateElements[ 0 ] ) ), false ) . " " . $year;
		$nm        = mktime( 12, 0, 0, $dateElements[ 1 ], 1, $dateElements[ 0 ] );
		for ( $i = 1; $i <= $this->monthsToShow; $i++ )
			{
			$link           = jomresURL( JOMRES_SITEPAGE_URL . '&task=all_bookings&requestedMonth=' . $nm );
			$monthsArray[ ] = jomresHTML::makeOption( $link, $nextMonth );
			//$nextMonth=strftime("%B %Y", mktime(0, 0, 0,$dateElements[1]+$i,1,$dateElements[0]));
			$year      = strftime( "%Y", mktime( 0, 0, 0, $dateElements[ 1 ] + $i, 1, $dateElements[ 0 ] ) );
			$nextMonth = getThisMonthName( strftime( "%m", mktime( 0, 0, 0, $dateElements[ 1 ] + $i, 1, $dateElements[ 0 ] ) ), false ) . " " . $year;
			$nm        = mktime( 0, 0, 0, $dateElements[ 1 ] + $i, 1, $dateElements[ 0 ] );
			}
		$dropdown = jomresHTML::selectList( $monthsArray, 'requestedMonth', ' onchange="location.href=dashboardmonthdropdown.requestedMonth.options[selectedIndex].value" ', 'value', 'text', jomresURL( JOMRES_SITEPAGE_URL . '&task=all_bookings&requestedMonth=' . $this->requestedMonth ) );
		$output   = '<form action="' . jomresURL( JOMRES_SITEPAGE_URL_NOSEF ) . '" name="dashboardmonthdropdown">';
		$output .= $dropdown;
		$output .= '</form>';

		return $output;
		}

	/**
	#
	 * xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	#
	 */
	function getLegend()
		{
		$output = '
<style type="text/css">
<!--
/* >>>>>>>>> PD November 2009 - Added for split arrive/depart day image feature >>>>>>>>>>>>>>> */
.date_AvailableToProvisional { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/AvailableToProvisional.png);}
.date_AvailableToBooked { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/AvailableToBooked.png); background-position: top left; background-repeat: no-repeat;}
.date_ProvisionalToBooked { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/ProvisionalToBooked.png);}
.date_BookedToProvisional { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/BookedToProvisional.png);}
.date_ProvisionalToAvailable { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/ProvisionalToAvailable.png);}
.date_BookedToAvailable { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/BookedToAvailable.png) ; background-position: top left; background-repeat: no-repeat;}
.date_ProvisionalToProvisional { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/ProvisionalToProvisional.png);}
.date_BookedToBooked { background-image: url(' . JOMRES_IMAGES_RELPATH.'dashboard/BookedToBooked.png);}
.date_STAR { background-image: url('.JOMRES_IMAGES_RELPATH.'star.png);}
.date_ICON { background-image: url('.JOMRES_IMAGES_RELPATH.'jricon.png);}
/* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */
}
-->
</style>';
		$output .= '<table>';
		$output .= '<tr><td>' . jr_gettext( '_JOMRES_COM_AVLCAL_INMONTHFACE_KEY', '_JOMRES_COM_AVLCAL_INMONTHFACE_KEY' ) . '</td><td bgcolor="' . $this->cfg_inbgcolor . '" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		$output .= '<td>' . jr_gettext( '_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR_KEY', '_JOMRES_COM_AVLCAL_OCCUPIEDCOLOUR_KEY' ) . '</td><td bgcolor="' . $this->cfg_occupiedcolour . '" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		$output .= '<td>' . jr_gettext( '_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR_KEY', '_JOMRES_COM_AVLCAL_PROVISIONALCOLOUR_KEY' ) . '</td><td bgcolor="' . $this->cfg_provisionalcolour . '" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		//$output.='<td>'.jr_gettext('_JOMRES_COM_AVLCAL_BOOKING_KEY',_JOMRES_COM_AVLCAL_BOOKING_KEY).'</td><td bgcolor="'.$this->cfg_booking.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
		//$output.='<td>'.jr_gettext('_JOMRES_COM_AVLCAL_BLACK_KEY',_JOMRES_COM_AVLCAL_BLACK_KEY).'</td><td bgcolor="'.$this->cfg_black.'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>';
		$output .= '</tr></table>';

		return $output;
		}

	function touch_template_language()
		{
		$output = array ();

		$output[ 'HPROPERTYADMIN' ]     = jr_gettext( '_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN', '_JOMRES_FRONT_MR_MENU_ADMIN_PROPERTYADMIN' );
		$output[ 'HCUSTOMERTYPEADMIN' ] = jr_gettext( '_JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES', '_JOMRES_CONFIG_VARIANCES_CUSTOMERTYPES' );
		$output[ 'HSHOWAUDITTRAIL' ]    = jr_gettext( '_JOMRES_FRONT_MR_MENU_ADMIN_AUDITTRAIL', '_JOMRES_FRONT_MR_MENU_ADMIN_AUDITTRAIL' );
		$output[ 'HLISTEXTRAS' ]        = jr_gettext( '_JOMRES_FRONT_MR_MENU_ADMIN_EXTRAS', '_JOMRES_FRONT_MR_MENU_ADMIN_EXTRAS' );
		$output[ 'HLISTBLACKBOOKINGS' ] = jr_gettext( '_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS', '_JOMRES_FRONT_MR_MENU_ADMIN_BLACKBOOKINGS' );
		$output[ 'HEDITLANG' ]          = jr_gettext( '_JOMRES_FRONT_MR_MENU_ADMIN_LANGUAGE', '_JOMRES_FRONT_MR_MENU_ADMIN_LANGUAGE' );
		$output[ 'HBATCHUPLOADS' ]      = jr_gettext( '_JOMRES_FRONT_IMAGEUPLOADS', '_JOMRES_FRONT_IMAGEUPLOADS' );
		$output[ 'HSTATS' ]             = jr_gettext( '_JRPORTAL_STATS_PATETITLE', '_JRPORTAL_STATS_PATETITLE' );

		$output[ 'P1' ] = jr_gettext( '_JOMRES_COM_MR_VRCT_UNPUBLISH', '_JOMRES_COM_MR_VRCT_UNPUBLISH' );
		$output[ 'P2' ] = jr_gettext( '_JOMRES_COM_MR_VRCT_PUBLISH', '_JOMRES_COM_MR_VRCT_PUBLISH' );

		foreach ( $output as $o )
			{
			echo $o;
			echo "<br/>";
			}
		}

	// This must be included in every Event/Mini-component
	function getRetVals()
		{
		return null;
		}
	}
