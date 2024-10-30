
/*
* Title                   : Ajax Booking Calendar Pro
* Version                 : 1.1
* File                    : jquery.dop.BookingCalendar.js
* File Version            : 1.1
* Created / Last Modified : 24 May 2011
* Author                  : Marius-Cristian Donea
* Copyright               : © 2011 Marius-Cristian Donea
* Website                 : http://www.mariuscristiandonea.com
* Description             : Booking Calendar jQuery plugin.
*/

(function($)
{
    $.fn.DOPBookingCalendar = function(options)
    {
        var Data = {'Type':'BackEnd',
                    'DataURL':'BookingCalendar/php/load.php',
                    'SaveURL':'BookingCalendar/php/save.php',
                    'DayNames':['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                    'MonthNames':['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    'AvailableText':'AVAILABLE', // The available text.
                    'BookedText':'BOOKED', // The Booked text.
                    'UnavailableText':'NOT AVAILABLE', // The unavailable text.
                    'DateType':1, // 1: american style; 2: european style;
                    'PopupDisplayTime':300, // The time for the Pop-Up to Show/Hide
                    'StatusLabel':'Status', // The text for Availability label.
                    'PriceLabel':'Price', // The text for Price label.
                    'Currency':'$', // The currency.
                    'SubmitBtnText':'Submit', // The text for Submit button.
                    'ResetBtnText':'Reset', // The text for Reset button.
                    'ExitBtnText':'Exit', // The text for Exit button.
                    'InvalidPriceText':'Error! Please enter a number for the price.' // The text for Invalid Price Warning.
                   },

        UniqueID,
        Container = this,

        Content = new Array(),
		oldContent = new Array(),

        StartDate = new Date(),
        StartYear = StartDate.getFullYear(),
        StartMonth = StartDate.getMonth()+1,
        StartDay = StartDate.getDate(),
        CurrYear = StartYear,
        CurrMonth = StartMonth,
		tmpYear = StartYear,
		tmpMonth = StartMonth,

        dayNames = new Array(),
        monthNames = new Array(),
        availableText,
        bookedText,
        unavailableText,
        dateType,
        popupDisplayTime,
        statusLabel,
        priceLabel,
        currency,
        submitBtnText,
        resetBtnText,
        exitBtnText,
        invalidPriceText,

        startSelection,
        endSelection,
        firstSelected = false,

        methods = {
                    init:function( ){// Init Plugin.
                        UniqueID = prototypes.randomString(16);
                        return this.each(function(){
                            if (options){
                                $.extend(Data, options);
                            }
                            methods.parseData();
                        });
                    },
                    parseData:function(){
                        dayNames = Data['DayNames'];
                        monthNames = Data['MonthNames'];
                        availableText = Data['AvailableText'];
                        bookedText = Data['BookedText'];
                        unavailableText = Data['UnavailableText'];
                        dateType = Data['DateType'];
                        popupDisplayTime = Data['PopupDisplayTime'];
                        statusLabel = Data['StatusLabel'];
                        priceLabel = Data['PriceLabel'];
                        currency = Data['Currency'];
                        submitBtnText = Data['SubmitBtnText'];
                        resetBtnText = Data['ResetBtnText'];
                        exitBtnText = Data['ExitBtnText'];
                        invalidPriceText = Data['InvalidPriceText'];
                        
                        $.get(Data['DataURL'], {}, function(data){
                            if (data != ''){
                                Content = data.split(',');
                            }
                            if (Data['Type'] == 'BackEnd'){
                                methods.initBackendBookingCalendar();
                            }
                            else{
                                methods.initFrontendBookingCalendar();
                            }
							methods.reloadMonth();
                        });
                    },

                    initBackendBookingCalendar:function(){// Init Backend Calendar
					
                        var HTML = new Array();
						
						
						
                        HTML.push('<div class="DOP_BackendBookingCalendar_Container">');
                        HTML.push('   <div class="DOP_BackendBookingCalendar_PopUp">');
                        HTML.push('       <div class="bg"></div>');
                        HTML.push('       <div class="window">');
                        HTML.push('           <span class="start-date"></span>');
                        HTML.push('           <span class="end-date"></span>');
						
                        HTML.push('           <br style="clear:both;" />');
                        HTML.push('           <label class="label" for="'+UniqueID+'-availability">'+statusLabel+'</label>');
                        HTML.push('           <select name="'+UniqueID+'-status" id="'+UniqueID+'-status" class="select-style">');
                        HTML.push('               <option value="0" id="'+UniqueID+'-no-status"></option>');
                        HTML.push('               <option value="1">'+availableText+'</option>');
                        HTML.push('               <option value="2">'+bookedText+'</option>');
                        HTML.push('               <option value="3">'+unavailableText+'</option>');
                        HTML.push('           </select>');
                        HTML.push('           <label class="label" for="'+UniqueID+'-price">'+priceLabel+' ('+currency+')</label>');
                        HTML.push('           <input type="text" name="'+UniqueID+'-price" id="'+UniqueID+'-price" class="input-style" value="" />');
                        HTML.push('           <span class="buttons_container">');
                        HTML.push('               <input type="button" name="'+UniqueID+'-submit" id="'+UniqueID+'-submit" class="button-style" value="'+submitBtnText+'" />');
                        HTML.push('               <input type="button" name="'+UniqueID+'-reset" id="'+UniqueID+'-reset" class="button-style" value="'+resetBtnText+'" />');
                        HTML.push('               <input type="button" name="'+UniqueID+'-exit" id="'+UniqueID+'-exit" class="button-style" value="'+exitBtnText+'" />');
                        HTML.push('               <span class="loader"></span>');
                        HTML.push('           </span>');
                        HTML.push('       </div>');
                        HTML.push('   </div>');
                        HTML.push('   <div class="DOP_BackendBookingCalendar_Navigation ui-widget-header">');
                        HTML.push('       <div class="previous_btn disabled"><div class="icon"></div></div>');
                        HTML.push('       <div class="next_btn"><div class="icon"></div></div>');
                        HTML.push('       <div class="month_year" style="text-align:center"></div>');
                        HTML.push('       <div class="week">');
                        HTML.push('         <div class="day">'+dayNames[1]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[2]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[3]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[4]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[5]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[6]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[0]+'</div><br style="clear:both;" />');
                        HTML.push('       </div>');
                        HTML.push('   </div>');
                        HTML.push('   <div class="DOP_BackendBookingCalendar_Calendar"></div>');
                        HTML.push('</div>');

                        Container.html(HTML.join(''));
                        methods.initBackendSettings();
                    },
                    initBackendSettings:function(){// Init Backend Settings
                        methods.initBackendContainer();
                        methods.initBackendNavigation();
                        methods.initBackendCalendar();
                        methods.initBackendPopUp();
                    },
                    initBackendContainer:function(){// Init Backend Container
                        $('.DOP_BackendBookingCalendar_Container', Container).width(Container.width());
                        $('.DOP_BackendBookingCalendar_Container', Container).height(Container.height());
                    },
                    initBackendNavigation:function(){// Init Navigation
                        $('.DOP_BackendBookingCalendar_Navigation .week .day', Container).width(parseInt((Container.width()-(parseInt($('.DOP_BackendBookingCalendar_Navigation .week .day', Container).css('margin-left'))+parseInt($('.DOP_BackendBookingCalendar_Navigation .week .day', Container).css('margin-right')))*7)/7));
                        $('.DOP_BackendBookingCalendar_Navigation .previous_btn', Container).click(function(){
                            var item = $(this);
                            if (!item.hasClass('disabled')){
                                $('.DOP_BackendBookingCalendar_Calendar', Container).html('');
								if (tmpYear != StartYear)
                                	methods.initBackendMonth(tmpYear, CurrMonth-1);
								else
									methods.initBackendMonth(StartYear, CurrMonth-1);
                                if (CurrMonth == StartMonth){
                                    item.addClass('disabled');
                                }
                            }
                        });
                        $('.DOP_BackendBookingCalendar_Navigation .next_btn', Container).click(function(){
                            $('.DOP_BackendBookingCalendar_Calendar', Container).html('');
							if (tmpYear != StartYear)
                            	methods.initBackendMonth(tmpYear, CurrMonth+1);
							else
								methods.initBackendMonth(StartYear, CurrMonth+1);
                            $('.DOP_BackendBookingCalendar_Navigation .previous_btn', Container).removeClass('disabled');
                        });
                    },
                    initBackendCalendar:function(){// Init Calendar
                        methods.initBackendMonth(StartYear, StartMonth);
                    },
                    initBackendMonth:function(year, month){// Init Month
                        var i, j, d, cyear, cmonth, cday, start, totalDays = 0,
                        noDays = new Date(year, month, 0).getDate(),
                        noDaysPreviousMonth = new Date(year, month-1, 0).getDate(),
                        firstDay = new Date(year, month-1, 1).getDay(),
                        lastDay = new Date(year, month-1, noDays).getDay(),
                        sText, pText;

                        CurrYear = new Date(year, month, 0).getFullYear();
                        CurrMonth = month;
                        $('.DOP_BackendBookingCalendar_Navigation .month_year', Container).html(monthNames[new Date(year, month, 0).getMonth()]+' '+CurrYear);
                        $('.DOP_BackendBookingCalendar_Calendar', Container).html('<div class="DOP_BackendBookingCalendar_Month"></div>');

                        if (firstDay == 0){
                            start = 7;
                        }
                        else{
                            start = firstDay;
                        }
                        
                        for (i=start-1; i>=1; i--){
                            totalDays++;
                            d = new Date(year, month-2, noDaysPreviousMonth-i+1);
                            cyear = d.getFullYear();
                            cmonth = prototypes.longMonth(d.getMonth()+1);
                            cday = prototypes.longDay(d.getDate());
                            sText = '';
                            pText = '';
                            for (j=0; j<Content.length; j++){
                                if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                    sText = Content[j].split(';;')[1];
                                    pText = Content[j].split(';;')[2];
                                }
                            }

                            if (StartMonth == month){
                                $('.DOP_BackendBookingCalendar_Month', Container).append(methods.initBackendDay('past_day', cyear, cmonth, cday, d.getDate(), '', ''));
                            }
                            else{
                                $('.DOP_BackendBookingCalendar_Month', Container).append(methods.initBackendDay('last_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }
                        
                        for (i=1; i<=noDays; i++){
                            totalDays++;
                            d = new Date(year, month-1, i);
                            cyear = d.getFullYear();
                            cmonth = prototypes.longMonth(d.getMonth()+1);
                            cday = prototypes.longDay(d.getDate());
                            sText = '';
                            pText = '';
                            for (j=0; j<Content.length; j++){
                                if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                    sText = Content[j].split(';;')[1];
                                    pText = Content[j].split(';;')[2];
                                }
                            }
                            
                            if (StartMonth == month && StartDay > d.getDate()){
                                $('.DOP_BackendBookingCalendar_Month', Container).append(methods.initBackendDay('past_day', cyear, cmonth, cday, d.getDate(), '', ''));
                            }
                            else{
                                $('.DOP_BackendBookingCalendar_Month', Container).append(methods.initBackendDay('curr_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }

                        if (totalDays+7 < 42){
                            for (i=1; i<=14-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.longMonth(d.getMonth()+1);
                                cday = prototypes.longDay(d.getDate());
                                sText = '';
                                pText = '';
                                for (j=0; j<Content.length; j++){
                                    if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                        sText = Content[j].split(';;')[1];
                                        pText = Content[j].split(';;')[2];
                                    }
                                }
                                $('.DOP_BackendBookingCalendar_Month', Container).append(methods.initBackendDay('next_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }
                        else{
                            for (i=1; i<=7-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.longMonth(d.getMonth()+1);
                                cday = prototypes.longDay(d.getDate());
                                sText = '';
                                pText = '';
                                for (j=0; j<Content.length; j++){
                                    if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                        sText = Content[j].split(';;')[1];
                                        pText = Content[j].split(';;')[2];
                                    }
                                }
                                $('.DOP_BackendBookingCalendar_Month', Container).append(methods.initBackendDay('next_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }

                        $('.DOP_BackendBookingCalendar_Month', Container).width(Container.width());
                        $('.DOP_BackendBookingCalendar_Month', Container).height(Container.height());
                        $('.DOP_BackendBookingCalendar_Day', Container).width(parseInt((Container.width()-(parseInt($('.DOP_BackendBookingCalendar_Day', Container).css('margin-left'))+parseInt($('.DOP_BackendBookingCalendar_Day', Container).css('margin-right')))*7)/7));
                        $('.DOP_BackendBookingCalendar_Day', Container).height(parseInt((Container.height()-$('.DOP_BackendBookingCalendar_Navigation', Container).height()-(parseInt($('.DOP_BackendBookingCalendar_Day', Container).css('margin-top'))+parseInt($('.DOP_BackendBookingCalendar_Day', Container).css('margin-bottom')))*6)/6));
                        $('.content', '.DOP_BackendBookingCalendar_Day', Container).css('line-height', ($('.DOP_BackendBookingCalendar_Day', Container).height()-$('.header', '.DOP_BackendBookingCalendar_Day', Container).height()-parseInt($('.header', '.DOP_BackendBookingCalendar_Day', Container).css('padding-top'))-parseInt($('.header', '.DOP_BackendBookingCalendar_Day', Container).css('padding-bottom')))+'px');
                        $('.content', '.DOP_BackendBookingCalendar_Day', Container).height($('.DOP_BackendBookingCalendar_Day', Container).height()-$('.header', '.DOP_BackendBookingCalendar_Day', Container).height()-parseInt($('.header', '.DOP_BackendBookingCalendar_Day', Container).css('padding-top'))-parseInt($('.header', '.DOP_BackendBookingCalendar_Day', Container).css('padding-bottom')));
                        methods.initBackendEvents();
                    },
                    initBackendDay:function(type, cyear, cmonth, cday, d, status, price){// Init Day
                        var dayHTML = Array(),
						

                        sText = '&nbsp;', pText;
						if (type == 'past_day'){
							sText = '';
							}
						else {
							if (status == 1){
								sText = availableText;
								type += ' available';
							}
							else if (status == 2){
								sText = bookedText;
								type += ' booked';
							}
							else if (status == 3){
								sText = unavailableText;
								type += ' unavailable';
							}
							
							/* Vince added */
							if (status == 10 || status==''){
								sText = availableText;
								type += ' ';
							}
							if (status == 20){
								sText = quarterText;
								type += ' calendar_background_quarter';
							}
							else if (status == 30){
								sText = halfText;
								type += ' calendar_background_half';
							}
							else if (status == 40){
								sText = threequarterText;
								type += ' calendar_background_threequarter';
							}
							
							else if (status == 50){
								sText = fullText;
								type += ' calendar_background_full';
							}

							/* end */
							
							if (price == ''){
								pText = '';
							}
							else{
								pText = currency+' '+price;
							}
						}

						
                        dayHTML.push('<div class="DOP_BackendBookingCalendar_Day '+type+'" id="'+UniqueID+'_'+cyear+'-'+cmonth+'-'+cday+'">');
                        dayHTML.push('    <span class="header ui-widget-header"><span class="day">'+d+'</span><br style="clear:both;" /></span>');
                        dayHTML.push('    <span class="content '+type+'">'+sText+'</span>');
                        dayHTML.push('    </span>');
                        dayHTML.push('</div>');

                        return dayHTML.join('');
                    },
                    initBackendEvents:function(){// Init Events for the days of the Calendar.
                        $('.DOP_BackendBookingCalendar_Day', Container).click(function(){
                            var day = $(this);
                            if (!day.hasClass('past_day')){
                                if (!firstSelected){
                                    firstSelected = true;
                                    startSelection = day.attr('id');
                                }
                                else{
                                    firstSelected = false;
                                    endSelection = day.attr('id');
                                    //methods.showBackendPopUp();
									methods.setBackendData();
                                }
                                methods.initBackendSelection(day.attr('id'));
                            }
                        });

                        $('.DOP_BackendBookingCalendar_Day', Container).hover(function(){
                            var day = $(this);
                            if (firstSelected){
                                methods.initBackendSelection(day.attr('id'));
                            }
                        });
                    },
                    initBackendSelection:function(id){
                        $('.DOP_BackendBookingCalendar_Day', Container).removeClass('selected');
                        if (id < startSelection){
                            $('.DOP_BackendBookingCalendar_Day', Container).each(function(){
                               var day = $(this);
                               if (day.attr('id') >= id && day.attr('id') <= startSelection && !day.hasClass('past_day')){
                                   day.addClass('selected');
                               }
                            });
                        }
                        else{
                            $('.DOP_BackendBookingCalendar_Day', Container).each(function(){
                               var day = $(this);   
                               if (day.attr('id') >= startSelection && day.attr('id') <= id && !day.hasClass('past_day')){
                                   day.addClass('selected');
                               }
                            });
                        }
                    },
                    initBackendPopUp:function(){// Init Pop-Up
                        $('.DOP_BackendBookingCalendar_PopUp', Container).css('display', 'block');
                        $('.DOP_BackendBookingCalendar_PopUp', Container).width(Container.width());
                        $('.DOP_BackendBookingCalendar_PopUp', Container).height(Container.height());
                        $('.DOP_BackendBookingCalendar_PopUp .bg', Container).width($('.DOP_BackendBookingCalendar_PopUp', Container).width());
                        $('.DOP_BackendBookingCalendar_PopUp .bg', Container).height($('.DOP_BackendBookingCalendar_PopUp', Container).height());
                        $('.DOP_BackendBookingCalendar_PopUp .window', Container).css('margin-left', ($('.DOP_BackendBookingCalendar_PopUp', Container).width()-$('.DOP_BackendBookingCalendar_PopUp .window', Container).width())/2);
                        $('.DOP_BackendBookingCalendar_PopUp .window', Container).css('margin-top', ($('.DOP_BackendBookingCalendar_PopUp', Container).height()-$('.DOP_BackendBookingCalendar_PopUp .window', Container).height())/2);
                        $('.DOP_BackendBookingCalendar_PopUp', Container).css('display', 'none');

                        $('#'+UniqueID+'-submit').click(function(){
                            if (prototypes.validateCharacters($('#'+UniqueID+'-price').val(), '0123456789')){
                                methods.setBackendData();
                            }
                            else{
                                alert(invalidPriceText);
                            }
                        });

                        $('#'+UniqueID+'-reset').click(function(){
                            methods.resetBackendPopUp();
                        });

                        $('#'+UniqueID+'-exit').click(function(){
                            methods.hideBackendPopUp();
                        });
                    },
                    showBackendPopUp:function(){// Show Pop-Up after the dates are selected.
                        var startDate, sYear, sMonth, sMonthText, sDay,
                        endDate, eYear, eMonth, eMonthText, eDay;

                        if (startSelection > endSelection){
                            endDate = startSelection.split('_')[1];
                            startDate = endSelection.split('_')[1];
                        }
                        else{
                            startDate = startSelection.split('_')[1];
                            endDate = endSelection.split('_')[1];
                        }

                        sYear = startDate.split('-')[0],
                        sMonth = startDate.split('-')[1],
                        sMonthText = monthNames[parseInt(sMonth, 10)-1],
                        sDay = startDate.split('-')[2];

                        eYear = endDate.split('-')[0],
                        eMonth = endDate.split('-')[1],
                        eMonthText = monthNames[parseInt(eMonth, 10)-1],
                        eDay = endDate.split('-')[2];

                        if (dateType == 1){
                            $('.DOP_BackendBookingCalendar_PopUp .window .start-date', Container).html(sMonthText+' '+sDay+', '+sYear);
                        }
                        else{
                            $('.DOP_BackendBookingCalendar_PopUp .window .start-date', Container).html(sDay+' '+sMonthText+' '+sYear);
                        }

                        if (startSelection != endSelection){
                            if (dateType == 1){
                                $('.DOP_BackendBookingCalendar_PopUp .window .end-date', Container).html(eMonthText+' '+eDay+', '+eYear);
                            }
                            else{
                                $('.DOP_BackendBookingCalendar_PopUp .window .end-date', Container).html(eDay+' '+eMonthText+' '+eYear);
                            }
                        }
                        else{
                            $('.DOP_BackendBookingCalendar_PopUp .window .end-date', Container).html('');
                        }

                        $('.DOP_BackendBookingCalendar_PopUp', Container).stop(true, true).fadeIn(popupDisplayTime, function(){
                            
                        });
                    },
                    setBackendData:function(){// Set submited data.
						rooms = jomresJquery('#rooms').val();
						if (rooms == null ) {
							alert (mustSelectARoom);
							return;
							};
							
                        $('.DOP_BackendBookingCalendar_PopUp .window .loader', Container).css('display', 'block');
                        var newContent = new Array(),
                        firstContent = new Array,
                        lastContent = new Array(),
                        oldContent = Content, i, y, m, d, noDays, firstDay = StartYear+'-'+prototypes.longMonth(StartMonth)+'-'+prototypes.longDay(StartDay),
                        startDate, sYear, sMonth, sDay,
                        endDate, eYear, eMonth, eDay,
                        fromMonth, toMonth, fromDay, toDay,
                        price;

                        if ($('#'+UniqueID+'-price').val() == ''){
                            price = 0;
                        }
                        else{
                            price = parseInt($('#'+UniqueID+'-price').val(), 10);
                        }

                        if (startSelection > endSelection){
                            endDate = startSelection.split('_')[1];
                            startDate = endSelection.split('_')[1];
                        }
                        else{
                            startDate = startSelection.split('_')[1];
                            endDate = endSelection.split('_')[1];
                        }
                        
                        sYear = parseInt(startDate.split('-')[0], 10);
                        sMonth = parseInt(startDate.split('-')[1], 10);
                        sDay = parseInt(startDate.split('-')[2], 10);

                        eYear = parseInt(endDate.split('-')[0], 10);
                        eMonth = parseInt(endDate.split('-')[1], 10);
                        eDay = parseInt(endDate.split('-')[2], 10);
                        
                        for (i=0; i<oldContent.length; i++){
                            if (oldContent[i].split(';;')[0] >= firstDay){
                                if (oldContent[i].split(';;')[0] < startDate){
                                    firstContent.push(oldContent[i]);
                                }
                                else if (oldContent[i].split(';;')[0] > endDate){
                                    lastContent.push(oldContent[i]);
                                }
                            }
                        }
                        
                        for (y=sYear; y<=eYear; y++){
                            fromMonth = 1;
                            if (y == sYear){
                                fromMonth = sMonth;
                            }

                            toMonth = 12;
                            if (y == eYear){
                                toMonth = eMonth;
                            }
                            
                            for (m=fromMonth; m<=toMonth; m++){
                                noDays = new Date(y, m, 0).getDate();
                                fromDay = 1;
                                if (y == sYear && m == sMonth){
                                    fromDay = sDay;
                                }

                                toDay = noDays;
                                if (y == eYear && m == eMonth){
                                    toDay = eDay;
                                }

                                for (d=fromDay; d<=toDay; d++){
                                    if ($('#'+UniqueID+'-status').val() != 0){
                                        newContent.push(y+'-'+prototypes.longMonth(m)+'-'+prototypes.longDay(d)+';;'+$('#'+UniqueID+'-status').val()+';;'+price);
                                    }
                                }
                            }
                        }
                        
/*                         Content = [];
                        if (firstContent.length > 0){
                            Content = firstContent.concat(newContent, lastContent);
                        }
                        else{
                            Content = newContent.concat(lastContent);
                        }
						 */
						 
						Content = [];
                        if (startDate == endDate){
							Content[0]=startDate;
							}
						else {
							Content[0]=startDate;
							Content[1]=endDate;
							}
						
						
                         $('.DOP_BackendBookingCalendar_Day', Container).each(function(){
                            var day = $(this);

                            if (day.hasClass('selected')){
                                day.removeClass('available').removeClass('booked').removeClass('unavailable');
                                
                                if ($('#'+UniqueID+'-status').val() == 1){
                                    day.addClass('available');
                                    $('.price', this).html(currency+' '+price);
                                    $('.content', this).html(availableText);
                                }
                                else if ($('#'+UniqueID+'-status').val() == 2){
                                    day.addClass('booked');
                                    $('.price', this).html(currency+' '+price);
                                    $('.content', this).html(bookedText);
                                }
                                else if ($('#'+UniqueID+'-status').val() == 3){
                                    day.addClass('unavailable');
                                    $('.price', this).html(currency+' '+price);
                                    $('.content', this).html(unavailableText);
                                }
                                else{
                                    $('.price', this).html('');
                                    $('.content', this).html('&nbsp;');
                                }
                            }
                        }); 

                        methods.saveBackendData();
                    },
                    saveBackendData:function(){// Save data.
						rooms = jomresJquery('#rooms').val();
						if (!is_srp)
							var selected_rooms = rooms.join(',');
						else
							var selected_rooms = rooms;
							
						var dates = Content.join(',');
						
						
                        $.post(Data['SaveURL'], {dop_booking_calendar:Content.join(','),rooms:selected_rooms}, function(data){
							populateDiv("responses",data);
                           // methods.hideBackendPopUp();
							//
							oldContent = Content;
							
							if ( typeof oldContent === 'undefined')
								return;
							tmpDate = oldContent[0];
							if(typeof tmpDate === 'undefined')
								{
								return;
								}
	
							tmpYear = parseInt(tmpDate.split('-')[0], 10);
							tmpMonth = parseInt(tmpDate.split('-')[1], 10);
							methods.parseData(); // We'll completely reload the calendar
							});
                    },
					reloadMonth:function(){
						if ( typeof oldContent === 'undefined')
							return;
						startDate = oldContent[0];
						if(typeof startDate === 'undefined')
							{
							return;
							}

						sYear = parseInt(startDate.split('-')[0], 10);
						sMonth = parseInt(startDate.split('-')[1], 10);
						$('.DOP_BackendBookingCalendar_Calendar', Container).html('');
						methods.initBackendMonth(sYear, sMonth);
						$('.DOP_BackendBookingCalendar_Navigation .previous_btn', Container).removeClass('disabled');
					},
                    resetBackendPopUp:function(){// Reset Pop-Up.
                        $('#'+UniqueID+'-no-status').attr('selected', 'selected');
                        $('#'+UniqueID+'-price').val('');
                        methods.setBackendData();
                    },
                    hideBackendPopUp:function(){// Close Pop-Up.
                        $('.DOP_BackendBookingCalendar_PopUp .window .loader', Container).css('display', 'none');
                        $('.DOP_BackendBookingCalendar_Day', Container).removeClass('selected');
                        $('.DOP_BackendBookingCalendar_PopUp', Container).stop(true, true).fadeOut(popupDisplayTime, function(){

                        });
                    },

                    initFrontendBookingCalendar:function(){// Init Backend Calendar
                        var HTML = new Array();

                        HTML.push('<div class="DOP_FrontendBookingCalendar_Container">');
                        HTML.push('   <div class="DOP_FrontendBookingCalendar_Navigation">');
                        HTML.push('       <div class="previous_btn disabled"><div class="icon"></div></div>');
                        HTML.push('       <div class="next_btn"><div class="icon"></div></div>');
                        HTML.push('       <div class="month_year"></div>');
                        HTML.push('       <div class="week">');
                        HTML.push('         <div class="day">'+dayNames[1]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[2]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[3]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[4]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[5]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[6]+'</div>');
                        HTML.push('         <div class="day">'+dayNames[0]+'</div><br style="clear:both;" />');
                        HTML.push('       </div>');
                        HTML.push('   </div>');
                        HTML.push('   <div class="DOP_FrontendBookingCalendar_Calendar"></div>');
                        HTML.push('</div>');

                        Container.html(HTML.join(''));
                        methods.initFrontendSettings();
                    },
                    initFrontendSettings:function(){// Init Backend Settings
                        methods.initFrontendContainer();
                        methods.initFrontendNavigation();
                        methods.initFrontendCalendar();
                    },
                    initFrontendContainer:function(){// Init Backend Container
                        $('.DOP_FrontendBookingCalendar_Container', Container).width(Container.width());
                        $('.DOP_FrontendBookingCalendar_Container', Container).height(Container.height());
                    },
                    initFrontendNavigation:function(){// Init Navigation
                        $('.DOP_FrontendBookingCalendar_Navigation .week .day', Container).width(parseInt((Container.width()-(parseInt($('.DOP_FrontendBookingCalendar_Navigation .week .day', Container).css('margin-left'))+parseInt($('.DOP_FrontendBookingCalendar_Navigation .week .day', Container).css('margin-right')))*7)/7));
                        $('.DOP_FrontendBookingCalendar_Navigation .previous_btn', Container).click(function(){
                            var item = $(this);
                            if (!item.hasClass('disabled')){
                                $('.DOP_FrontendBookingCalendar_Calendar', Container).html('');
                                methods.initFrontendMonth(StartYear, CurrMonth-1);
                                if (CurrMonth == StartMonth){
                                    item.addClass('disabled');
                                }
                            }
                        });
                        $('.DOP_FrontendBookingCalendar_Navigation .next_btn', Container).click(function(){
                            $('.DOP_FrontendBookingCalendar_Calendar', Container).html('');
                            methods.initFrontendMonth(StartYear, CurrMonth+1);
                            $('.DOP_FrontendBookingCalendar_Navigation .previous_btn', Container).removeClass('disabled');
                        });
                    },
                    initFrontendCalendar:function(){// Init Calendar
                        methods.initFrontendMonth(StartYear, StartMonth);
                    },
                    initFrontendMonth:function(year, month){// Init Month
                        var i, j, d, cyear, cmonth, cday, start, totalDays = 0,
                        noDays = new Date(year, month, 0).getDate(),
                        noDaysPreviousMonth = new Date(year, month-1, 0).getDate(),
                        firstDay = new Date(year, month-1, 1).getDay(),
                        lastDay = new Date(year, month-1, noDays).getDay(),
                        sText, pText;

                        CurrYear = new Date(year, month, 0).getFullYear();
                        CurrMonth = month;
                        $('.DOP_FrontendBookingCalendar_Navigation .month_year', Container).html(monthNames[new Date(year, month, 0).getMonth()]+' '+CurrYear);
                        $('.DOP_FrontendBookingCalendar_Calendar', Container).html('<div class="DOP_FrontendBookingCalendar_Month"></div>');

                        if (firstDay == 0){
                            start = 7;
                        }
                        else{
                            start = firstDay;
                        }

                        for (i=start-1; i>=1; i--){
                            totalDays++;
                            d = new Date(year, month-2, noDaysPreviousMonth-i+1);
                            cyear = d.getFullYear();
                            cmonth = prototypes.longMonth(d.getMonth()+1);
                            cday = prototypes.longDay(d.getDate());
                            sText = '';
                            pText = '';
                            for (j=0; j<Content.length; j++){
                                if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                    sText = Content[j].split(';;')[1];
                                    pText = Content[j].split(';;')[2];
                                }
                            }

                            if (StartMonth == month){
                                $('.DOP_FrontendBookingCalendar_Month', Container).append(methods.initFrontendDay('past_day', cyear, cmonth, cday, d.getDate(), '', ''));
                            }
                            else{
                                $('.DOP_FrontendBookingCalendar_Month', Container).append(methods.initFrontendDay('last_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }

                        for (i=1; i<=noDays; i++){
                            totalDays++;
                            d = new Date(year, month-1, i);
                            cyear = d.getFullYear();
                            cmonth = prototypes.longMonth(d.getMonth()+1);
                            cday = prototypes.longDay(d.getDate());
                            sText = '';
                            pText = '';
                            for (j=0; j<Content.length; j++){
                                if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                    sText = Content[j].split(';;')[1];
                                    pText = Content[j].split(';;')[2];
                                }
                            }

                            if (StartMonth == month && StartDay > d.getDate()){
                                $('.DOP_FrontendBookingCalendar_Month', Container).append(methods.initFrontendDay('past_day', cyear, cmonth, cday, d.getDate(), '', ''));
                            }
                            else{
                                $('.DOP_FrontendBookingCalendar_Month', Container).append(methods.initFrontendDay('curr_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }

                        if (totalDays+7 < 42){
                            for (i=1; i<=14-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.longMonth(d.getMonth()+1);
                                cday = prototypes.longDay(d.getDate());
                                sText = '';
                                pText = '';
                                for (j=0; j<Content.length; j++){
                                    if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                        sText = Content[j].split(';;')[1];
                                        pText = Content[j].split(';;')[2];
                                    }
                                }
                                $('.DOP_FrontendBookingCalendar_Month', Container).append(methods.initFrontendDay('next_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }
                        else{
                            for (i=1; i<=7-lastDay; i++){
                                d = new Date(year, month, i);
                                cyear = d.getFullYear();
                                cmonth = prototypes.longMonth(d.getMonth()+1);
                                cday = prototypes.longDay(d.getDate());
                                sText = '';
                                pText = '';
                                for (j=0; j<Content.length; j++){
                                    if (Content[j].split(';;')[0] == cyear+'-'+cmonth+'-'+cday){
                                        sText = Content[j].split(';;')[1];
                                        pText = Content[j].split(';;')[2];
                                    }
                                }
                                $('.DOP_FrontendBookingCalendar_Month', Container).append(methods.initFrontendDay('next_month', cyear, cmonth, cday, d.getDate(), sText, pText));
                            }
                        }

                        $('.DOP_FrontendBookingCalendar_Month', Container).width(Container.width());
                        $('.DOP_FrontendBookingCalendar_Month', Container).height(Container.height());
                        $('.DOP_FrontendBookingCalendar_Day', Container).width(parseInt((Container.width()-(parseInt($('.DOP_FrontendBookingCalendar_Day', Container).css('margin-left'))+parseInt($('.DOP_FrontendBookingCalendar_Day', Container).css('margin-right')))*7)/7));
                        $('.DOP_FrontendBookingCalendar_Day', Container).height(parseInt((Container.height()-$('.DOP_FrontendBookingCalendar_Navigation', Container).height()-(parseInt($('.DOP_FrontendBookingCalendar_Day', Container).css('margin-top'))+parseInt($('.DOP_FrontendBookingCalendar_Day', Container).css('margin-bottom')))*6)/6));
                        $('.content', '.DOP_FrontendBookingCalendar_Day', Container).css('line-height', ($('.DOP_FrontendBookingCalendar_Day', Container).height()-$('.header', '.DOP_FrontendBookingCalendar_Day', Container).height()-parseInt($('.header', '.DOP_FrontendBookingCalendar_Day', Container).css('padding-top'))-parseInt($('.header', '.DOP_FrontendBookingCalendar_Day', Container).css('padding-bottom')))+'px');
                        $('.content', '.DOP_FrontendBookingCalendar_Day', Container).height($('.DOP_FrontendBookingCalendar_Day', Container).height()-$('.header', '.DOP_FrontendBookingCalendar_Day', Container).height()-parseInt($('.header', '.DOP_FrontendBookingCalendar_Day', Container).css('padding-top'))-parseInt($('.header', '.DOP_FrontendBookingCalendar_Day', Container).css('padding-bottom')));
                    },
                    initFrontendDay:function(type, cyear, cmonth, cday, d, status, price){// Init Day
                        var dayHTML = Array(),
                        sText = '&nbsp;', pText;

                        if (status == 1){
                            sText = availableText;
                            type += ' available';
                        }
                        else if (status == 2){
                            sText = bookedText;
                            type += ' booked';
                        }
                        else if (status == 3){
                            sText = unavailableText;
                            type += ' unavailable';
                        }
						
						/* Vince added */
                        if (status == 10){
                            sText = availableText;
                            type += ' calendar_background_quarter';
                        }
                        if (status == 20){
                            sText = unavailableText;
                            type += ' calendar_background_quarter';
                        }
                        else if (status == 30){
                            sText = unavailableText;
                            type += ' calendar_background_half';
                        }
                        else if (status == 40){
                            sText = unavailableText;
                            type += ' calendar_background_threequarter';
                        }
						
                        else if (status == 50){
                            sText = unavailableText;
                            type += ' calendar_background_full';
                        }
						/* end */
						
                        if (price == ''){
                            pText = '';
                        }
                        else{
                            pText = currency+' '+price;
                        }

                        dayHTML.push('<div class="DOP_FrontendBookingCalendar_Day '+type+'" id="'+UniqueID+'_'+cyear+'-'+cmonth+'-'+cday+'">');
                        dayHTML.push('    <span class="header"><span class="day">'+d+'</span><span class="price">'+pText+'</span><br style="clear:both;" /></span>');
                        dayHTML.push('    <span class="content">'+sText+'</span>');
                        dayHTML.push('    </span>');
                        dayHTML.push('</div>');

                        return dayHTML.join('');
                    }
                  },

        prototypes = {
                        resizeItem:function(parent, child, cw, ch, dw, dh, pos){// Resize & Position an Item (the item is 100% visible)
                            var currW = 0, currH = 0;

                            if (dw <= cw && dh <= ch){
                                currW = dw;
                                currH = dh;
                            }
                            else{
                                currH = ch;
                                currW = (dw*ch)/dh;

                                if (currW > cw){
                                    currW = cw;
                                    currH = (dh*cw)/dw;
                                }
                            }

                            child.width(currW);
                            child.height(currH);
                            switch(pos.toLowerCase()){
                                case 'top':
                                    prototypes.topItem(parent, child, ch);
                                    break;
                                case 'bottom':
                                    prototypes.bottomItem(parent, child, ch);
                                    break;
                                case 'left':
                                    prototypes.leftItem(parent, child, cw);
                                    break;
                                case 'right':
                                    prototypes.rightItem(parent, child, cw);
                                    break;
                                case 'horizontal-center':
                                    prototypes.hCenterItem(parent, child, cw);
                                    break;
                                case 'vertical-center':
                                    prototypes.vCenterItem(parent, child, ch);
                                    break;
                                case 'center':
                                    prototypes.centerItem(parent, child, cw, ch);
                                    break;
                                case 'top-left':
                                    prototypes.tlItem(parent, child, cw, ch);
                                    break;
                                case 'top-center':
                                    prototypes.tcItem(parent, child, cw, ch);
                                    break;
                                case 'top-right':
                                    prototypes.trItem(parent, child, cw, ch);
                                    break;
                                case 'middle-left':
                                    prototypes.mlItem(parent, child, cw, ch);
                                    break;
                                case 'middle-right':
                                    prototypes.mrItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-left':
                                    prototypes.blItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-center':
                                    prototypes.bcItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-right':
                                    prototypes.brItem(parent, child, cw, ch);
                                    break;
                            }
                        },
                        resizeItem2:function(parent, child, cw, ch, dw, dh, pos){// Resize & Position an Item (the item covers all the container)
                            var currW = 0, currH = 0;

                            currH = ch;
                            currW = (dw*ch)/dh;

                            if (currW < cw){
                                currW = cw;
                                currH = (dh*cw)/dw;
                            }

                            child.width(currW);
                            child.height(currH);

                            switch(pos.toLowerCase()){
                                case 'top':
                                    prototypes.topItem(parent, child, ch);
                                    break;
                                case 'bottom':
                                    prototypes.bottomItem(parent, child, ch);
                                    break;
                                case 'left':
                                    prototypes.leftItem(parent, child, cw);
                                    break;
                                case 'right':
                                    prototypes.rightItem(parent, child, cw);
                                    break;
                                case 'horizontal-center':
                                    prototypes.hCenterItem(parent, child, cw);
                                    break;
                                case 'vertical-center':
                                    prototypes.vCenterItem(parent, child, ch);
                                    break;
                                case 'center':
                                    prototypes.centerItem(parent, child, cw, ch);
                                    break;
                                case 'top-left':
                                    prototypes.tlItem(parent, child, cw, ch);
                                    break;
                                case 'top-center':
                                    prototypes.tcItem(parent, child, cw, ch);
                                    break;
                                case 'top-right':
                                    prototypes.trItem(parent, child, cw, ch);
                                    break;
                                case 'middle-left':
                                    prototypes.mlItem(parent, child, cw, ch);
                                    break;
                                case 'middle-right':
                                    prototypes.mrItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-left':
                                    prototypes.blItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-center':
                                    prototypes.bcItem(parent, child, cw, ch);
                                    break;
                                case 'bottom-right':
                                    prototypes.brItem(parent, child, cw, ch);
                                    break;
                            }
                        },

                        topItem:function(parent, child, ch){// Position Item on Top
                            parent.height(ch);
                            child.css('margin-top', 0);
                        },
                        bottomItem:function(parent, child, ch){// Position Item on Bottom
                            parent.height(ch);
                            child.css('margin-top', ch-child.height());
                        },
                        leftItem:function(parent, child, cw){// Position Item on Left
                            parent.width(cw);
                            child.css('margin-left', 0);
                        },
                        rightItem:function(parent, child, cw){// Position Item on Right
                            parent.width(cw);
                            child.css('margin-left', parent.width()-child.width());
                        },
                        hCenterItem:function(parent, child, cw){// Position Item on Horizontal Center
                            parent.width(cw);
                            child.css('margin-left', (cw-child.width())/2);
                        },
                        vCenterItem:function(parent, child, ch){// Position Item on Vertical Center
                            parent.height(ch);
                            child.css('margin-top', (ch-child.height())/2);
                        },
                        centerItem:function(parent, child, cw, ch){// Position Item on Center
                            prototypes.hCenterItem(parent, child, cw);
                            prototypes.vCenterItem(parent, child, ch);
                        },
                        tlItem:function(parent, child, cw, ch){// Position Item on Top-Left
                            prototypes.topItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        tcItem:function(parent, child, cw, ch){// Position Item on Top-Center
                            prototypes.topItem(parent, child, ch);
                            prototypes.hCenterItem(parent, child, cw);
                        },
                        trItem:function(parent, child, cw, ch){// Position Item on Top-Right
                            prototypes.topItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        mlItem:function(parent, child, cw, ch){// Position Item on Middle-Left
                            prototypes.vCenterItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        mrItem:function(parent, child, cw, ch){// Position Item on Middle-Right
                            prototypes.vCenterItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },
                        blItem:function(parent, child, cw, ch){// Position Item on Bottom-Left
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.leftItem(parent, child, cw);
                        },
                        bcItem:function(parent, child, cw, ch){// Position Item on Bottom-Center
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.hCenterItem(parent, child, cw);
                        },
                        brItem:function(parent, child, cw, ch){// Position Item on Bottom-Right
                            prototypes.bottomItem(parent, child, ch);
                            prototypes.rightItem(parent, child, cw);
                        },

                        longMonth:function(month){// Return month with 0 in front if smaller then 10.
                            if (month < 10){
                                return '0'+month;
                            }
                            else{
                                return month;
                            }

                        },
                        longDay:function(day){// Return day with 0 in front if smaller then 10.
                            if (day < 10){
                                return '0'+day;
                            }
                            else{
                                return day;
                            }
                        },

                        randomize:function(theArray){// Randomize the items of an array
                            theArray.sort(function(){
                                return 0.5-Math.random();
                            });
                            return theArray;
                        },
                        randomString:function(string_length){// Create a string with random elements
                            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz",
                            random_string = '';

                            for (var i=0; i<string_length; i++){
                                var rnum = Math.floor(Math.random()*chars.length);
                                random_string += chars.substring(rnum,rnum+1);
                            }
                            return random_string;
                        },

                        isIE8Browser:function(){// Detect the browser IE8
                            var isIE8 = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('msie 8') != -1){
                                isIE8 = true;
                            }
                            return isIE8;
                        },
                        isTouchDevice:function(){// Detect Touchscreen devices
                            var isTouch = false,
                            agent = navigator.userAgent.toLowerCase();

                            if (agent.indexOf('android') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('blackberry') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('ipad') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('iphone') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('ipod') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('palm') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('series60') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('symbian') != -1){
                                isTouch = true;
                            }
                            if (agent.indexOf('windows ce') != -1){
                                isTouch = true;
                            }

                            return isTouch;
                        },

                        openLink:function(url, target){// Open a link.
                            if (target.toLowerCase() == '_blank'){
                                window.open(url);
                            }
                            else{
                                window.location = url;
                            }
                        },

                        validateCharacters:function(str, allowedCharacters){
                            var characters = str.split('');

                            for (var i=0; i<characters.length; i++)
                                if (allowedCharacters.indexOf(characters[i]) == -1) return false;
                            return true;
                        }
                     };

        return methods.init.apply(this);
    }
})(jQuery);