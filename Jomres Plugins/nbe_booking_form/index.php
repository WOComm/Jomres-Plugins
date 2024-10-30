<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title id="page_title"></title>
</head>

<body id="body" style="display: none">
<main class="container" id="form_wrapper" >
	<form onSubmit="validateBooking(); return false;" >
		<div class="row">
			<div class="col-sm-12">
				<div class="py-1 text-center">
					<img class="d-block mx-auto mb-4 img-fluid" src="" alt="" id="logo">
					<h2 id="form_title"></h2>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-12 h3 bg-primary text-white text-center p-1" id="booking_form_title">
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-12" id="prices_panel"  style="display: none">
								<div class="row">
									<div class="col-4 fst-italic" id="checkin_label"></div>
									<div class="col-8" id="checkin"></div>
								</div>
								<div class="row">
									<div class="col-4 fst-italic" id="checkout_label"></div>
									<div class="col-8" id="checkout"></div>
								</div>
								<div class="row">
									<div class="col-4 fst-italic" id="stay_days_label"></div>
									<div class="col-8" id="stay_days"></div>
								</div>
								<div class="row">
									<div class="col-4 fst-italic" id="guests_label"></div>
									<div class="col-8" id="guests"></div>
								</div>
								<div class="row">
									<div class="col-4 fst-italic" id="adult_prices_per_night_label"></div>
									<div class="col-8" id="adult_price_per_night"></div>
								</div>
								<div class="row" id="child_prices_per_night"></div>
								<div class="row m-1">
									<div class="col-12 text-center">
										<hr/>
									</div>
								</div>
								<div class="row">
									<div class="col-4 fst-italic" id="adult_prices_label"></div>
									<div class="col-8" id="adult_prices"></div>
								</div>
								<div class="row" id="child_prices"></div>
								<div class="row">
									<div class="col-4 fst-italic" id="city_tax_label"></div>
									<div class="col-8" id="city_tax"></div>
								</div>
								<div class="row">
									<div class="col-4 fst-italic" id="cleaning_fee_label"></div>
									<div class="col-8" id="cleaning_fee"></div>
								</div>
								<div class="row border-bottom">
									<div class="col-4 fst-italic fw-bold" id="deposit_label"></div>
									<div class="col-8 fw-bold" id="deposit"></div>
								</div>
								<div class="row border-bottom">
									<div class="col-4 fst-italic fw-bold" id="accommodation_price_summary_label"></div>
									<div class="col-8 fw-bold" id="accommodation_price_summary"></div>
								</div>
								<div class="row border-bottom">
									<div class="col-4 fst-italic fw-bold" id="grand_total_label"></div>
									<div class="col-8 fw-bold" id="grand_total"></div>
								</div>
							</div>
						</div>
						<div class="form-group col-sm-12">
							<label class="control-label" for="datepicker">&nbsp;</label>
							<div class="">
								<div id="date_picker_wrapper"></div>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-sm-12">
								<label class="control-label"  id="adult_sleeps_picker_label" for="sleeps_adults"></label>
								<div class="input-group">
									<span class="input-group-text quantity-left-minus-adults"   data-type="minus" data-field=""><i class="fas fa-minus"></i></span>
									<input type="text" id="sleeps_adults" name="sleeps_adults" class="form-control input-number" value="2" min="1" max="" autocomplete="off" disabled>
									<span class="input-group-text quantity-right-plus-adults"   data-type="plus" data-field=""><i class="fas fa-plus"></i></span>
								</div>
							</div>
						</div>
						<div class="row" id="child_pickers"></div>
					</div>
				</div>
				<div class="row m-1" id="roomSelectionModalOpener" style="display: none" >
					<div class="col-12 text-center">
						<button class="btn btn-primary" type="button" id="roomSelectionMdalButton" data-bs-toggle="modal" data-bs-toggle="button" data-bs-target="#roomSelectionModal"></button>
					</div>
				</div>

				<div class="row m-1" id="continue_button" style="display: none" >

					<div class="col-12 text-center">
						<button class="btn btn-primary active" type="button" id="show_address" data-bs-toggle="modal" data-bs-target="#addressModal"></button>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="thanksModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="thanksModalBody">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="thanksModalCloseButton"></button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="alert alert-danger" role="alert" id="errorModalBody">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addressModalLabel"></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row mt-3 border-5"  id="address_form">
							<div class="col-6">
								<div class="form-floating mb-3">
									<input type="text" id="firstname" value="{FIRSTNAME}" class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="firstname" id="HFIRSTNAME"></label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" id="house" value="" class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="house" id="HHOUSENO"></label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" id="town" value="" class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="town" id="HTOWN"></label>
								</div>
								<div class="form-floating mb-3">
									<input type="tel" id="tel_mobile" value="" class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="tel_mobile"  id="HMOBILE"></label>
								</div>
								<div class="form-floating mb-3">
									<select name="country" id="country" class="form-select" autocomplete="off"  >
									</select>
									<label class="col-form-label" for="country" id="HCOUNTRY"></label>
								</div>

							</div>
							<div class="col-6">
								<div class="form-floating mb-3">
									<input type="text" id="surname" value="" class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="surname" id="HSURNAME"></label>
								</div>
								<div class="form-floating mb-3">
									<input type="text" id="street" value=""  class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="street" id="HSTREET"></label>
								</div>
								<div class="form-floating mb-3" >
									<input type="text" id="postcode" value="" class="form-control" placeholder="" autocomplete="off" >
									<label class="col-form-label" for="postcode"  id="HPOSTCODE"></label>
								</div>
								<div class="form-floating mb-3">
									<input type="email" name="email" id="email" value="" class="form-control" autocomplete="off" >
									<label class="col-form-label" for="email"  id="HEMAIL"></label>
								</div>
								<div class="form-floating mb-3">
									<select name="region" id="region" class="form-select" autocomplete="off" >
									</select>
									<label class="col-form-label" for="region"  id="HREGION"></label>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_modal_button" type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>
						<button class="btn btn-primary" type="submit" id="submit"></button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="roomSelectionModal" tabindex="-1" aria-labelledby="roomSelectionModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="roomSelectionModalLabel"></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12" id="room_types_available">

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="close_room_selection_modal_button" type="button" class="btn btn-secondary" data-bs-dismiss="modal"></button>
						<button class="btn btn-primary" type="button" id="selectRooms" data-bs-dismiss="modal"></button>
					</div>
				</div>
			</div>
		</div>

	</form>
</main>
</body>

<div style="display: none" id="selected_dates"><div id="arrivalDate"></div><div id="departureDate"></div></div>



<script>
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null) {
            return null;
        }
        return decodeURI(results[1]) || 0;
    }

    var params={};
    window.location.search
        .replace(/[?&]+([^=&]+)=([^&]*)/gi, function(str,key,value) {
                params[key] = value;
            }
        );

    var api_url = '';
    if (params.api_url == undefined) {
        var getUrl = window.location;
        baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        api_url = baseUrl+'/jomres/api/booking/';
    } else {
        var baseUrl = params.api_url;
        api_url = baseUrl;
    }

    const show_image = 0;

    const session_id = makeid(20);

    var requestHeaders = new Headers();
    requestHeaders.set('Accept', 'application/json');
    requestHeaders.set('X-JOMRES-BOOKING-SESSION-ID', session_id);
    requestHeaders.set('User-Agent', 'Jomres booking form');


    var property_uid = $.urlParam('property_uid');
    if (property_uid === null) {
        property_uid = 20;
    }

    var language = $.urlParam('lang');
    if (language === null) {
        language = window.navigator.language;
    }
    if (language === null) {
        language = 'en-GB';
    }

    const default_country = 'AT';

    var currency_formatter ;
    var selected_country = default_country;
    var initial_response;
    var selectedRooms = [];
    var dates_array = [];
    var calendar_prices = [];
    var addressData = {};
    var adult_daily_price_formatted = '';
    var adult_price_total_formatted = '';
    var child_rates_array = [];
    var adult_price_total = 0.0;
    var child_price_total = 0.0;
    var extras_total = 0.0;
    var total_accommodation = 0.0;
    var total_accommodation_formatted = '';
    var price_response = [];
    var numberOfDays = 0;
    var number_of_adults_in_booking = 0;
    var number_of_children_in_booking = 0;

    var scrolled = false;
    var room_tariff_hat_pair = '';
    var picker; // Global cos we need to reset it
    var picker_template = `<input id="datepicker" autocomplete="off" class="form-control input-number" style="display:none" required/>`;
    var mrp_room_selection = [];
    var checkin_dates = [];
    var calendar_config = 	{
    }

    var event = new CustomEvent("arrivalDateChange", { "detail": arrivalDate });

    // Add an event listener
    document.addEventListener("arrivalDateChange", function(e) {
        sendDates();
    });

    $(document).ready(function() {
        initialise_form();
    });

    // Was originally in the doc ready section, but if this form is showing in a module position it's better to just re-initialise the form after the booking has been confirmed
    function initialise_form()
    {
        showSpinner(true);
        fetch(api_url+'initialise'+'/'+property_uid+'/'+language, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                if ( result.error_message != null ) {
                    showSpinner(false);
                    showErrorModal(result.error_message);
                    console.log(result);
                    return;
                }
                initial_response = result.data.initialise.response.data;
                console.log(initial_response);

                calendar_config.allowedDates = Object.values(initial_response.availability.allowed_dates);
                calendar_config.fully_booked_dates = Object.values(initial_response.availability.not_available_dates);

                if (show_image) {
                    document.getElementById('form_title').innerHTML = initial_response.property_name;
                    $("#logo").attr("src",initial_response.images.property[0][0]['medium']);
                } else {
                    var element = document.getElementById("test");
                    if(typeof(element) != undefined && element != null) {
                        document.getElementById("logo").remove();
                    }
                }

                //window.top.document.title = initial_response.property_name+" "+initial_response.labels.BOOKINGHEADER;

                document.getElementById('booking_form_title').innerHTML = initial_response.property_name;

                $("#sleeps_adults").attr("max",initial_response.capacity.adults);

                document.getElementById('adult_sleeps_picker_label').innerHTML = initial_response.labels.LABEL_ADULTS;
                document.getElementById('adult_prices_label').innerHTML = initial_response.labels.LABEL_ADULTS;
                document.getElementById('stay_days_label').innerHTML = initial_response.labels.STAYDAYS;
                document.getElementById('guests_label').innerHTML = initial_response.labels._JOMRES_HLIST_GUESTS;
                document.getElementById('checkin_label').innerHTML = initial_response.labels._JOMRES_COM_MR_VIEWBOOKINGS_ARRIVAL;
                document.getElementById('checkout_label').innerHTML = initial_response.labels._JOMRES_COM_MR_VIEWBOOKINGS_DEPARTURE;
                document.getElementById('city_tax_label').innerHTML = initial_response.labels.JOMRES_CITY_TAX_HEADING;
                document.getElementById('cleaning_fee_label').innerHTML = initial_response.labels.JOMRES_CLEANING_FEE_HEADING;
                document.getElementById('deposit_label').innerHTML = initial_response.labels.DEPOSIT;
                document.getElementById('addressModalLabel').innerHTML = initial_response.labels.AJAXFORM_ADDRESS;
                document.getElementById('thanksModalBody').innerHTML = initial_response.labels._JOMRES_FRONT_MR_BOOKINGMADE;
                document.getElementById('thanksModalCloseButton').innerHTML = initial_response.labels.COMMON_CLOSE;

                $("#backToPropertyDetails").attr("href", initial_response.property_details_url);

                document.getElementById('adult_prices_per_night_label').innerHTML = initial_response.labels.LABEL_ADULTS+' '+initial_response.labels.JOMRES_CITY_TAX_MODEL_PER_NIGHT;
                document.getElementById('accommodation_price_summary_label').innerHTML = initial_response.labels.BILLING_ROOMTOTAL;
                document.getElementById('grand_total_label').innerHTML = initial_response.labels.PRICE_SUMMARY;


                if (initial_response.bypass_confirmation == false) {
                    document.getElementById('submit').innerHTML = initial_response.labels.REVIEW_BOOKING_BUTTON;
                    document.getElementById('close_modal_button').innerHTML = initial_response.labels.COMMON_CLOSE;
                } else {
                    document.getElementById('submit').innerHTML = initial_response.labels.CREATE_BOOKING_BUTTON;
                    document.getElementById('close_modal_button').innerHTML = initial_response.labels.COMMON_CLOSE;
                }

                document.getElementById('close_room_selection_modal_button').innerHTML = initial_response.labels.COMMON_CLOSE;
                document.getElementById('selectRooms').innerHTML = initial_response.labels._PN_NEXT;
                document.getElementById('roomSelectionModalLabel').innerHTML = initial_response.labels.AJAXFORM_AVAILABLE_DESC;


                let rooms = initial_response.rooms;
                rooms_keys = Object.keys(rooms);

                let number_of_tariff_sets = rooms_keys.length;

                // In the future this form will be able to offer selection of tariff set names by room, but for SRPs there's no need to select a room. If there's just one tariff set (which is true if the property uses Standard tariff editing mode) then the form will automatically select the room and tariff set IDs which will be handed back to the REST API before the guest is redirected to the booking form.
                if (number_of_tariff_sets == 1 && initial_response.booking_model == 'SRP' ) { // It's an SRP with just one tariff set. We will set a hidden option with the selected tariff ids and room ids.
                    let rooms_array = Object.keys(rooms).map(v => new Array(v, rooms[v]));
                    let dates = rooms_array[0][1].tariff_sets[0].dates;

                    da = Object.entries(dates);

                    for (let element of da) {
                        let ndx = element[1].date;
                        let prc = element[1].adult_price;
                        checkin_dates[ndx] = element[1].checkin_date;
                        calendar_prices[ndx] = Number(prc).toFixed(2);
                    }

                    for (let element of da) {
                        let ndx = element[1].date;
                        let prcs = element[1];
                        dates_array[ndx] = prcs;
                    }
                }

                if (initial_response.fixedPeriodBookings ==1) {
                    initial_response.min_days = parseInt(initial_response.fixedPeriodBookingsNumberOfDays);
                }

                document.getElementById('date_picker_wrapper').innerHTML = picker_template;
                init_calendar();
                init_numbers_picker();

                child_rates = Object.entries(initial_response.child_rates);
                if ( child_rates.length > 0 ) {

                    for (let element of child_rates) {
                        let str = element[1].age_from+'-'+element[1].age_to;
                        child_rates_array[str] = element[1];
                        child_rates_array[str].quantity = 0;
                        initialise_child_number_picker(str ,element[1].age_from.toString() , element[1].age_to.toString() );
                        $("#sleeps_children-"+str).attr("max",initial_response.capacity.children);
                    }
                }

                populate_address_form();

                currency_formatter = new Intl.NumberFormat(language, {
                    style: 'currency',
                    currency: initial_response.currency_code,
                });

                $('body').fadeIn(500);
                //sendGuestNumbers();
                showSpinner(false);
            })
    }

    function resetFormElements()
    {


        $('#prices_panel').fadeOut(1000);

        document.getElementById('child_pickers').innerHTML = '';
        document.getElementById('child_prices_per_night').innerHTML = '';
        document.getElementById('child_prices').innerHTML = '';
        document.getElementById('arrivalDate').innerHTML = '';
        document.getElementById('departureDate').innerHTML = '';
        document.getElementById('checkin').innerHTML = '';
        document.getElementById('checkout').innerHTML = '';
        document.getElementById('stay_days').innerHTML = '';
        document.getElementById('guests').innerHTML = '';
        document.getElementById('adult_prices').innerHTML = '';
        document.getElementById('adult_price_per_night').innerHTML = '';
        document.getElementById('city_tax').innerHTML = '';
        document.getElementById('cleaning_fee').innerHTML = '';
        document.getElementById('deposit').innerHTML = '';
        document.getElementById('accommodation_price_summary').innerHTML = '';
        document.getElementById('grand_total').innerHTML = '';
        document.getElementById('show_address').innerHTML = '';

        document.getElementById('date_picker_wrapper').innerHTML = picker_template;
        init_calendar();

        $('#roomSelectionModalOpener').fadeOut(200);
        $('#continue_button').fadeOut(200);
        $('#prices_panel').fadeIn(1000);
    }

    function showSpinner(state)
    {
        $.blockUI.defaults.css =
            {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff',
                cursor:		 'wait'
            };

        $.blockUI.defaults.overlayCSS =  {
            backgroundColor: '#fff',
            opacity:		 0.6,
            //cursor:		  'wait'
        };

        if (state == true) {
            $('#form_wrapper').block({
                message: '<div class="spinner-border text-info" role="status">\n' +
                    '  <span class="visually-hidden">Loading...</span>\n' +
                    '</div>',
            });
        }
        else {
            $('#form_wrapper').unblock();
        }
    }

    function showErrorModal(message)
    {
        document.getElementById('errorModalBody').innerHTML = message;
        $('#errorModal').modal('show');
    }

    function validateBooking()
    {
        $('#addressModal').modal('hide');
        showSpinner(true);
        let formData = new FormData();
        formData.append('firstname', get_element('firstname') );
        formData.append('surname', get_element('surname') );
        formData.append('house', get_element('house') );
        formData.append('street', get_element('street') );
        formData.append('town', get_element('town') );
        formData.append('postcode', get_element('postcode') );
        formData.append('country', Cookies.get('booking_form_country') );
        formData.append('region', Cookies.get('booking_form_region') );
        formData.append('tel_mobile', get_element('tel_mobile') );
        formData.append('email', get_element('email') );

        fetch(api_url + 'set/address/', {
            body: formData,
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                if ( result.error_message != null ) {
                    showSpinner(false);
                    showErrorModal(result.error_message);
                    console.log(result);
                    return;
                }
                fetch( api_url + 'validate/booking/', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-JOMRES-BOOKING-SESSION-ID': session_id,
                        'User-Agent': 'Jomres booking form'
                    }
                })
                    .then(response => response.json())
                    .then(result => {
                        if ( result.error_message != null ) {
                            showSpinner(false);
                            showErrorModal(result.error_message);
                            console.log(result);
                            return;
                        }
                        success = result.data.booking_validation.valid;
                        if ( success == true ) {

                            if (initial_response.bypass_confirmation == false) {
                                //console.log("Booking validated");
                                window.top.location.href = initial_response.confirmation_url+'&jsid='+session_id;
                            } else {
                                fetch(api_url + 'create/', {
                                    body: formData,
                                    method: 'POST',
                                    headers: {
                                        'Accept': 'application/json',
                                        'X-JOMRES-BOOKING-SESSION-ID': session_id,
                                        'User-Agent': 'Jomres booking form'
                                    }
                                })
                                    .then(response => response.json())
                                    .then(result => {
                                        if ( result.error_message != null ) {
                                            showSpinner(false);
                                            showErrorModal(result.error_message);
                                            console.log(result);
                                            return;
                                        }
                                        resetFormElements();
                                        showSpinner(false);
                                        $('#thanksModal').modal('show');

                                        initialise_form();
                                    })

                            }

                        } else {
                            showSpinner(false);
                            console.log(result);
                            //console.error("Booking not valid");

                            showErrorModal("Booking not valid")
                        }
                    })
            })
        return false;
    }

    function updatePricesPanel()
    {
        document.getElementById('stay_days').innerHTML = numberOfDays;
        document.getElementById('guests').innerHTML = parseInt(number_of_adults_in_booking)  +  parseInt(number_of_children_in_booking);

        document.getElementById('adult_price_per_night').innerHTML = adult_daily_price_formatted;

        document.getElementById('adult_prices').innerHTML = adult_price_total_formatted;
        document.getElementById('accommodation_price_summary').innerHTML = total_accommodation_formatted;

        let arrivalDate = document.getElementById('arrivalDate').innerHTML;
        let departureDate = document.getElementById('departureDate').innerHTML;

        let ad = new Date(arrivalDate);
        let dd = new Date(departureDate);

        let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('checkin').innerHTML = toLocaleUTCDateString( ad , undefined , options );
        document.getElementById('checkout').innerHTML = toLocaleUTCDateString( dd , undefined , options );

        document.getElementById('city_tax').innerHTML = currency_formatter.format(price_response.city_tax);
        document.getElementById('cleaning_fee').innerHTML = currency_formatter.format(price_response.cleaning_fee);
        document.getElementById('deposit').innerHTML = currency_formatter.format(price_response.deposit);

        let grandTotal = parseFloat(price_response.accommodation_total_inc_tax) + parseFloat(extras_total) + parseFloat(price_response.city_tax) + parseFloat(price_response.cleaning_fee);
        document.getElementById('grand_total').innerHTML = currency_formatter.format(grandTotal);

        $('#prices_panel').fadeIn(1000);
        $('#continue_button').fadeIn(500);
        $('#continue_button').fadeIn(500);
    }

    function populate_address_form()
    {
        document.getElementById('HFIRSTNAME').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_ARRIVALFIRSTNAME_EXPL;
        document.getElementById('HSURNAME').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_ARRIVALSURNAME_EXPL;
        document.getElementById('HHOUSENO').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_GUEST_JOMRES_HOUSE_EXPL;
        document.getElementById('HSTREET').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_GUEST_JOMRES_STREET_EXPL;
        document.getElementById('HTOWN').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_GUEST_JOMRES_TOWN_EXPL;
        document.getElementById('HPOSTCODE').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_GUEST_JOMRES_POSTCODE_EXPL;
        document.getElementById('HMOBILE').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_GUEST_JOMRES_MOBILE_EXPL;
        document.getElementById('HEMAIL').innerHTML = initial_response.labels._JOMRES_COM_MR_EB_GUEST_JOMRES_EMAIL_EXPL;
        document.getElementById('HCOUNTRY').innerHTML = initial_response.labels._JOMRES_COM_MR_VRCT_PROPERTY_HEADER_COUNTRY;
        document.getElementById('HREGION').innerHTML = initial_response.labels._JOMRES_COM_MR_VRCT_PROPERTY_HEADER_REGION;

        document.getElementById('show_address').innerHTML = initial_response.labels._PN_NEXT;
        document.getElementById('roomSelectionMdalButton').innerHTML = initial_response.labels.AJAXFORM_AVAILABLE_DESC;


        $("#firstname").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_FIRSTNAME ).val("").focus().blur();
        $("#surname").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_SURNAME ).val("").focus().blur();
        $("#house").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_HOUSENUMBER ).val("").focus().blur();
        $("#street").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_STREET ).val("").focus().blur();
        $("#town").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_TOWN ).val("").focus().blur();
        $("#postcode").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_POSTCODE ).val("").focus().blur();
        $("#tel_mobile").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_MOBILE ).val("").focus().blur();
        $("#email").attr("placeholder", initial_response.labels.COMMON_PLACEHOLDER_EMAIL ).val("").focus().blur();
        //$("#datepicker").attr("placeholder", initial_response.labels.AJAXFORM_PARTICULARS_DESC ).val("").focus().blur();



        $("#firstname").val( Cookies.get('booking_form_firstname') );
        $("#surname").val( Cookies.get('booking_form_surname') );
        $("#house").val( Cookies.get('booking_form_house') );
        $("#street").val( Cookies.get('booking_form_street') );
        $("#town").val( Cookies.get('booking_form_town') );
        $("#postcode").val( Cookies.get('booking_form_postcode') );
        $("#tel_mobile").val( Cookies.get('booking_form_tel_mobile') );
        $("#email").val( Cookies.get('booking_form_email') );

        $("#email").val( Cookies.get('booking_form_email') );

        let val = Cookies.get('booking_form_country');
        if (val != '') {
            selected_country = val;
        }

        populateRegions();

        $.each(initial_response.countries, function(key, value) {
            $('#country')
                .append($("<option></option>")
                    .attr("value", key)
                    .text(value));
        });
        $('select option[value="'+selected_country+'"]').attr("selected",true);

        $.each(initial_response.address_form_fields, function(key, value) {
            if (value.required == true) {
                $('#'+value.field).prop('required',true);

            }
        });
    }

    function populateRegions()
    {
        // Empty the existing region dropdown
        $('#region').find('option').remove().end().append('').val('');
        $('#region')
            .append($("<option></option>")
                .attr("value", 0)
                .text('').attr("selected", true));

        fetch(api_url + 'regions' + '/' + selected_country + '/', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                let regions = result.data.regions.regions;
                $.each(regions, function(key, value) {
                    var selected = false;
                    if ( key == Cookies.get('booking_form_region') ) {
                        selected = 'selected';
                    }
                    $('#region')
                        .append($("<option></option>")
                            .attr("value", key)
                            .text(value).attr("selected", selected));
                });

                /*				let region  = '';
								let val = Cookies.get('booking_form_region');
								if (val != '') {
									region = val;
								}
								$('select option[value="'+region+'"]').attr("selected",true);*/

            })
    }

    function init_calendar()
    {
        // https://easepick.com/
        const DateTime = easepick.DateTime;
        const bookedDates =  calendar_config.fully_booked_dates.map(d => {

            if (d instanceof Array) {
                const start = new DateTime(d[0], 'YYYY-MM-DD');
                const end = new DateTime(d[1], 'YYYY-MM-DD');

                return [start, end];
            }

            return new DateTime(d, 'YYYY-MM-DD');
        });

        picker = new easepick.create({

            element: document.getElementById('datepicker'),
            zIndex: 10,
            inline: true,
            grid: 1,
            calendars: 1,
            header: true,
            autoApply: true,
            locale: {
                apply: 'Go',
                cancel: 'Clear',
            },
            css: [
                'https://cdn.jomres.net/easypicker/v1/index.css',
                'https://cdn.jomres.net/easypicker/v1/demo_prices.css',
            ],
            plugins: ['RangePlugin', 'LockPlugin','KbdPlugin'],

            RangePlugin: {
                tooltipNumber(num) {
                    return num - 1;
                },
                locale: {
                    one: 'night',
                    other: 'nights',
                },
            },
            LockPlugin: {
                inseparable: true,
                filter(date, picked) {

                    if (picked.length === 1) {
                        const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                        return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
                    }
                    return date.inArray(bookedDates, '[)');
                },
                filter(date, picked) {
                    return !calendar_config.allowedDates.includes(date.format('YYYY-MM-DD'));
                },
            },
            setup(picker) {
                const lockPlugin = picker.PluginManager.getInstance('LockPlugin');
                // add price to day element
                picker.on('view', (evt) => {
                    const { view, date, target } = evt.detail;
                    const d = date ? date.format('YYYY-MM-DD') : null;

                    if (view === 'CalendarDay' && calendar_prices[d]) {
                        const span = target.querySelector('.day-price') || document.createElement('span');
                        span.className = 'day-price';
                        span.innerHTML = `${calendar_prices[d]}`;
                        target.append(span);
                    } else {
                        if (view === 'CalendarDay' && !calendar_prices[d]) {
                            const span = target.querySelector('.day-price') || document.createElement('span');
                            span.className = 'day-price';
                            span.innerHTML = '&nbsp;';
                            target.append(span);
                        }
                    }
                });

                picker.on('select', (e) => {
                    var dateEl = document.getElementById('arrivalDate');
                    dateEl.innerHTML = new DateTime(e.detail.start).format('YYYY-MM-DD');
                    var dateEl = document.getElementById('departureDate');
                    dateEl.innerHTML = new DateTime(e.detail.end).format('YYYY-MM-DD');

                    // Dispatch/Trigger/Fire the event
                    document.dispatchEvent(event);

                    // The booking calendar doesn't allow us to select tomorrow, if tomorrow is marked as booked. As a temporary workaround we can allow selection of the arrival date twice
                    let arrivalDate = document.getElementById('arrivalDate').innerHTML;
                    let departureDate = document.getElementById('departureDate').innerHTML;

                    if (arrivalDate == departureDate ) {
                        const DateTime = easepick.DateTime;
                        let today = new DateTime(departureDate);
                        const tomorrow = today.clone().add(1, 'day');
                        var dateEl = document.getElementById('departureDate');
                        dateEl.innerHTML = new DateTime(tomorrow).format('YYYY-MM-DD');
                        document.dispatchEvent(event);
                    }
                });

                // https://jsfiddle.net/waki/a92xjk3g/  https://github.com/easepick/easepick/discussions/38
                picker.on('preselect', (e) => {
                    const { start, end } = e.detail;
                    const DateTime = easepick.DateTime;
                    var key = new DateTime(start).format('YYYY-MM-DD');

                    // if ( dates_array[key+1] != undefined) {
                    if (initial_response.booking_model == 'SRP') {
                        const a = new DateTime(dates_array[key].date);
                        const b = new DateTime(dates_array[key].checkin_date);

                        if (start && start.isBetween(a, b, '[]')) {
                            lockPlugin.options.minDays = parseInt(dates_array[key].min_days)+1;
                        } else {
                            lockPlugin.options.minDays = initial_response.min_days;
                        }
                    }



                    // refresh layout
                    picker.renderAll();
                    //}

                });
            }
        });
    }

    function sendGuestNumbers()
    {
        number_of_adults_in_booking = $('#sleeps_adults').val();

        let newArr = [];
        let cr = Object.entries(child_rates_array);
        if ( cr.length > 0 ) {
            for (let element of cr) {
                let cr_red =  Object.entries(element);
                newArr.push(cr_red[1][1]);
            }
        }

        let children_str = JSON.stringify(newArr);

        let formData = new FormData();
        formData.append('adults', number_of_adults_in_booking );
        formData.append('children', children_str );

        fetch(api_url + 'set/guest/numbers', {
            body: formData,
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                if ( result.error_message != null ) {
                    showSpinner(false);
                    showErrorModal(result.error_message);
                    console.log(result);
                    return;
                }
                showSpinner(false);
            })
    }


    function sendDates()
    {
        let arrivalDate = document.getElementById('arrivalDate').innerHTML;
        let departureDate = document.getElementById('departureDate').innerHTML;

        if (arrivalDate =='' || departureDate =='') {
            return;
        }
        if (arrivalDate == departureDate) {
            return;
        }

        let formData = new FormData();
        formData.append('arrivalDate', arrivalDate );
        formData.append('departureDate', departureDate );

        fetch(api_url + 'set/dates/', {
            body: formData,
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                if ( result.error_message != null ) {
                    showSpinner(false);
                    showErrorModal(result.error_message);
                    console.log(result);
                    return;
                }
                if ( initial_response.booking_model == 'SRP' ) {
                    calculatePrices();
                }
                else {
                    show_rooms_options();
                }
            })
    }


    function show_rooms_options()
    {
        document.getElementById('room_types_available').innerHTML = '';
        if (initial_response.booking_model != 'SRP'){
            $('#roomSelectionModalOpener').fadeIn(200);
        }

        var word_tariffs = initial_response.labels._JOMRES_FRONT_TARIFFS_TITLE;
        var word_rooms = initial_response.labels._JOMRES_COM_MR_VRCT_TAB_ROOM;
        var word_type = initial_response.labels._JOMRES_COM_MR_VRCT_ROOM_HEADER_TYPE;

        var select_template = '';

        showSpinner(true);

        fetch(api_url + 'rooms/', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                if ( result.error_message != null ) {
                    showSpinner(false);
                    showErrorModal(result.error_message);
                    console.log(result);
                    return;
                }

                $.each(result.data.rooms_available_on_selected_dates.room_types, function(tariff_type_id, value) {
                    var featuresStr = '<div class="text-wrap">';
                    var tariff_type_id = tariff_type_id;
                    var room_type_name = value.room_type_info.room_class_abbv;

                    var features = value.room_type_features;
                    var number_of_features = Object.keys(features).length;
                    if (number_of_features > 0) {
                        $.each(features, function (feature_id, room_feature) {
                            featuresStr = featuresStr + `
							 				<span class="badge bg-secondary">${room_feature.feature_description}</span>
							`;

                            /*

							featuresStr = featuresStr + `
									<div class="col-sm-12">
										<div class="row">
											<div class="col-6">
												 ${room_feature.feature_description}
											</div>
											<div class="col-6">
												 <img src="${room_feature.image}" class="img-fluid"/>
											</div>
										</div>
									</div>
								`;

							 */
                        });
                        featuresStr = featuresStr + `</div>`;
                    };

                    var occupancy_levels = value.occupancy_levels;
                    var occupancyStr = ``;
                    if (occupancy_levels.max_adults >0) {
                        for (let step = 1; step <= occupancy_levels.max_adults; step++) {
                            occupancyStr = occupancyStr+`<i class="fas fa-user"></i>`;
                        }
                    }
                    if (occupancy_levels.max_children >0) {
                        for (let step = 1; step <= occupancy_levels.max_children; step++) {
                            occupancyStr = occupancyStr+`<i class="fas fa-child"></i>`;
                        }
                    }

                    $.each(value.room_type_rooms, function(room_type_key, room_types_values) {
                        var hatPairs = room_types_values.hatPairs;
                        var tariffName = room_types_values.tariff_name;
                        var options = '<option value="" selected>0</option>';
                        var counter = 1;
                        var hatPairStr = '';

                        $.each(hatPairs, function(hatPairKey, hatPair) {
                            if ( hatPairStr != '') {
                                hatPairStr = hatPairStr+','+hatPair;
                            } else {
                                hatPairStr = hatPair;
                            }

                            options = options+`
							<option value="${hatPairStr}">${counter}</option>`;
                            counter ++;

                        });

                        select_template = `
						<div class="card shadow p-2 mb-5 bg-body rounded mb-2">
							<div class="card-header bg-primary text-white">
								<h5 class="card-title">${room_type_name}</h5>
							</div>
							<div class="card-body ">
								<div class="row border border-secondary border-3 p-2">
									<div class="col-sm-3">
										<em>${room_type_name}</em>
									</div>
									<div class="col-sm-3">
										${tariffName}
									</div>
									<div class="col-sm-3">
										${occupancyStr}
									</div>
									<div class="col-sm-3">
										<select class="form-select hatPairs" name="roomSelection[]" id="roomSelection_${tariff_type_id}">
											${options}
										</select>
									</div>
								</div>
								<div class="row mt-2 fs-6">
									${featuresStr}
								</div>
						  </div>
						</div>

								`;
                        document.getElementById('room_types_available').insertAdjacentHTML('beforeend', select_template );
                    });
                })
            });


        showSpinner(false);

        $('#roomSelectionModal').modal('show');
    }

    function sendRoomSelection()
    {
        String.prototype.isEmpty = function() {
            return (this.length === 0 || !this.trim());
        };
        var hatPairs = '';

        $('.hatPairs').each(function(){
            var val = $(this).val();
            if (!val.isEmpty()) {
                if ( hatPairs == '') {
                    hatPairs = val+','	;
                }
                else {
                    hatPairs = hatPairs+val+",";
                }
            }

        });
        selectedRooms = hatPairs.slice(0, -1);
        if (selectedRooms != '') {
            calculatePrices();
        }

    }

    function calculatePrices()
    {
        let arrivalDate = document.getElementById('arrivalDate').innerHTML;
        let departureDate = document.getElementById('departureDate').innerHTML;

        if ( arrivalDate == '' || departureDate == '' ) {
            return;
        }

        showSpinner(true);
        number_of_adults_in_booking = $('#sleeps_adults').val();

        let newArr = [];
        let cr = Object.entries(child_rates_array);
        if ( cr.length > 0 ) {
            for (let element of cr) {
                let cr_red =  Object.entries(element);
                newArr.push(cr_red[1][1]);
            }
        }

        let children_str = JSON.stringify(newArr);

        let formData = new FormData();
        formData.append('adults', number_of_adults_in_booking );
        formData.append('children', children_str );

        fetch(api_url + 'set/guest/numbers', {
            body: formData,
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                'User-Agent': 'Jomres booking form'
            }
        })
            .then(response => response.json())
            .then(result => {
                if ( result.error_message != null ) {
                    showSpinner(false);
                    showErrorModal(result.error_message);
                    console.log(result);
                    return;
                }
                let formData = new FormData();
                formData.append('selectedRooms', selectedRooms );

                fetch(api_url + 'set/property/booking/', {
                    body: formData,
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-JOMRES-BOOKING-SESSION-ID': session_id,
                        'User-Agent': 'Jomres booking form'
                    }
                })
                    .then(response => response.json())
                    .then(result => {
                        if ( result.error_message != null ) {
                            showSpinner(false);
                            showErrorModal(result.error_message);
                            console.log(result);
                            return;
                        }

                        fetch(api_url + 'prices', {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-JOMRES-BOOKING-SESSION-ID': session_id,
                                'User-Agent': 'Jomres booking form'
                            }
                        })
                            .then(response => response.json())
                            .then(result => {
                                if ( result.error_message != null ) {
                                    showSpinner(false);
                                    showErrorModal(result.error_message);
                                    console.log(result);
                                    return;
                                }
                                price_response = result.data.room_prices[0];
                                total_accommodation = price_response.accommodation_total_inc_tax;
                                adult_price_total = price_response.adult_prices;
                                child_price_total = price_response.child_prices;
                                numberOfDays = price_response.stayDays;
                                let daily_price = adult_price_total / numberOfDays / number_of_adults_in_booking;
                                adult_daily_price_formatted = currency_formatter.format(daily_price);
                                price_response.child_price_breakdown;

                                document.getElementById('child_prices_per_night').innerHTML = '';
                                document.getElementById('child_prices').innerHTML = '';

                                Object.keys(child_rates_array).forEach(function(x){
                                    if (child_rates_array[x].quantity > 0) {
                                        let id = child_rates_array[x].id;
                                        let rate = price_response.child_prices_breakdown[id].rate;
                                        let total = price_response.child_prices_breakdown[id].total;

                                        let label = child_rates_array[x].label;
                                        let label_ext = '';
                                        let child_price_per_night = total;

                                        if (child_rates_array[x].model == 'per_stay') {
                                            label_ext = initial_response.labels.JOMRES_POLICIES_CHILDREN_CHARGE_MODEL_PER_STAY;
                                        } else {
                                            label_ext = initial_response.labels.JOMRES_POLICIES_CHILDREN_CHARGE_MODEL_PER_NIGHT;
                                        }

                                        child_price_per_night = currency_formatter.format(rate);

                                        let child_prices_template = `
											<div class="col-4 fst-italic">${label}</div>
											<div class="col-8">${child_price_per_night} ${label_ext}</div>
											`;
                                        document.getElementById('child_prices_per_night').insertAdjacentHTML('beforeend', child_prices_template);

                                        child_price_total =  child_price_total + total;
                                        child_price_total_formatted = currency_formatter.format(total);

                                        let child_prices_totals_template = `
											<div class="col-4 fst-italic">${label}</div>
											<div class="col-8">${child_price_total_formatted}</div>
											`;

                                        document.getElementById('child_prices').insertAdjacentHTML('beforeend', child_prices_totals_template);
                                    }
                                });

                                adult_price_total_formatted = currency_formatter.format(adult_price_total);
                                child_price_total_formatted = currency_formatter.format(child_price_total);
                                total_accommodation_formatted = currency_formatter.format(total_accommodation);
                                updatePricesPanel();
                                showSpinner(false);
                            })
                    })
            })
    }

    function initialise_child_number_picker( age_range_string , age_from , age_to )
    {

        let selector_minus = 'quantity-left-minus-children-'+age_range_string;
        let selector_plus = 'quantity-left-plus-children-'+age_range_string;
        let input_field = 'sleeps_children-'+age_range_string;
        let picker_label_id = 'children_sleeps_picker_label-'+age_range_string;
        let label = initial_response.labels.LABEL_CHILDREN+' '+age_from+' - '+age_to;

        let child_picker_template = `
		<label class="control-label" id="${picker_label_id}" htmlFor="${input_field}">${label}</label>

		<div class="input-group">
			<span class="input-group-text ${selector_minus}" data-type="minus" data-field="">
				<i class="fas fa-minus"></i>
			</span>
			<input type="text" id="${input_field}" name="${input_field}" class="form-control input-number" value="0" min="0" max="" autoComplete="off" disabled>
			<span class="input-group-text ${selector_plus}" data-type="plus" data-field="">
				<i class="fas fa-plus"></i>
			</span>
		</div>
`;
        document.getElementById('child_pickers').insertAdjacentHTML('beforeend', child_picker_template);

        $('.'+selector_minus).click(function(e){
            e.preventDefault();
            let quantity = parseInt($('#'+input_field).val());
            if(quantity>0){
                $('#'+input_field).val(quantity - 1);
                number_of_children_in_booking = number_of_children_in_booking - 1;
            }
            child_rates_array[age_range_string].quantity = $('#'+input_field).val();
            child_rates_array[age_range_string].label =label;
            //sendGuestNumbers();
            calculatePrices();
        });

        $('.'+selector_plus).click(function(e){
            e.preventDefault();
            let quantity = parseInt($('#'+input_field).val());
            let new_qty = quantity + 1;
            if (number_of_children_in_booking < initial_response.capacity.children) {
                if (new_qty <= initial_response.capacity.children ) {
                    $('#'+input_field).val(new_qty );
                    number_of_children_in_booking = number_of_children_in_booking + 1;
                }
            }
            child_rates_array[age_range_string].quantity = $('#'+input_field).val();
            child_rates_array[age_range_string].label =label;
            //sendGuestNumbers();
            calculatePrices();
        });
    }

    function init_numbers_picker()
    {
        $('.quantity-left-minus-adults').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#sleeps_adults').val());
            if(quantity>1){
                $('#sleeps_adults').val(quantity - 1);
            }
            //sendGuestNumbers();
            calculatePrices();
        });

        $('.quantity-right-plus-adults').click(function(e){
            e.preventDefault();
            let quantity = parseInt($('#sleeps_adults').val());
            if (quantity + 1 <= initial_response.capacity.adults) {
                $('#sleeps_adults').val(quantity + 1 );
            }
            //sendGuestNumbers();
            calculatePrices();
        });

    }

    function makeid(length) {
        let result		   = '';
        let characters	   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let charactersLength = characters.length;
        for ( let i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }


    // Because, especially in the context of the address form, empty can be ok
    function get_element(element)
    {
        let item = $('#'+element).val();
        return Object.is(item, undefined) ? '' : item;
    }

    function set_address()
    {
        addressData.firstname   = get_element('firstname');
        addressData.surname	 	= get_element('surname');
        addressData.house	   	= get_element('house');
        addressData.street	  	= get_element('street');
        addressData.town		= get_element('town');
        addressData.postcode	= get_element('postcode');
        addressData.country	 	= get_element('country');
        addressData.region	  	= Cookies.get('booking_form_region');
        addressData.tel_mobile  = get_element('tel_mobile');
        addressData.email	   	= get_element('email');
    }

    function toLocaleUTCDateString(date, locales, options) {
        const timeDiff = date.getTimezoneOffset() * 60000;
        const adjustedDate = new Date(date.valueOf() + timeDiff);
        return adjustedDate.toLocaleDateString(locales, options);
    }

    $('#firstname').change(function() {
        let val = $('#firstname').val();
        Cookies.set('booking_form_firstname', val , { expires: 7 , sameSite: 'strict' } );
    });
    $('#surname').change(function() {
        let val = $('#surname').val();
        Cookies.set('booking_form_surname', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#house').change(function() {
        let val = $('#house').val();
        Cookies.set('booking_form_house', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#street').change(function() {
        let val = $('#street').val();
        Cookies.set('booking_form_street', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#town').change(function() {
        let val = $('#town').val();
        Cookies.set('booking_form_town', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#postcode').change(function() {
        let val = $('#postcode').val();
        Cookies.set('booking_form_postcode', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#country').change(function() {
        let val = $('#country').val();
        Cookies.set('booking_form_country', val , { expires: 7 , sameSite: 'strict'  } );
        selected_country = val;
        populateRegions();
    });
    $('#region').change(function() {
        let val = $('#region').val();
        Cookies.set('booking_form_region', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#tel_mobile').change(function() {
        let val = $('#tel_mobile').val();
        Cookies.set('booking_form_tel_mobile', val , { expires: 7 , sameSite: 'strict'  } );
    });
    $('#email').change(function() {
        let val = $('#email').val();
        Cookies.set('booking_form_email', val , { expires: 7 , sameSite: 'strict'  } );
    });

    $('#roomSelectionModal').on('hidden.bs.modal', function () {
        sendRoomSelection();
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script src="https://cdn.jomres.net/easypicker/v1/index.umd.min.js"></script>


</html>
