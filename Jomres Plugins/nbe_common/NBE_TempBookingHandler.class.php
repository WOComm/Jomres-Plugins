<?php


class NBE_TempBookingHandler
{
	public $booking_data = array();

	public function __construct( $session_id = '' )
	{

		$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
		$tmpBookingHandler->initBookingSession( $session_id );
		$this->booking_data = $tmpBookingHandler;
		$this->property_uid = 0;
	}

	public function getBookingData($setting)
	{
		if (isset($this->booking_data->tmpbooking[$setting])){
			return $this->booking_data->tmpbooking[$setting];
		} else {
			return null;
		}

	}

	public function setBookingData($setting , $value)
	{
		$this->booking_data->tmpbooking[$setting] = $value;
	}



	public function getGuestData($setting)
	{
		if (isset($this->booking_data->tmpguest[$setting])) {
			return $this->booking_data->tmpguest[$setting];
		} else {
			return null;
		}

	}

	public function setGuestData($setting , $value)
	{
		$this->booking_data->tmpguest[$setting] = $value;
	}

	public function getUserSettingData($setting)
	{
		if (isset($this->booking_data->user_settings[$setting])){
			return $this->booking_data->user_settings[$setting];
		} else {
			return null;
		}
	}

	public function setUserSettingData($setting , $value)
	{
		$this->booking_data->user_settings[$setting] = $value;
	}

	/*
	 *
	 * TmpGuest and TmpBooking are old booking engine settings, which we will maintain because following functionality (e.g. payment gateways) uses it, however the NBE functionality will store it's own data (like session id, rooms selected) in ['cart']['NBE']
	 *
	 * Cart is under used, and already exists in the temp booking handler so it's the perfect pristine place for it
	 *
	 */
	public function getNBEData($setting)
	{
		if (isset($this->booking_data->cart_data['NBE'][$setting])){
			return $this->booking_data->cart_data['NBE'][$setting];
		} else {
			return '';
		}
	}

	public function setNBEData($setting , $value)
	{
		$this->booking_data->cart_data['NBE'][$setting] = $value;
	}

	function __destruct() {
		$tmpBookingHandler = jomres_singleton_abstract::getInstance('jomres_temp_booking_handler');
		$tmpBookingHandler->close_jomres_session();
	}
}
