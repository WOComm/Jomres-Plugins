<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################


jr_define( '_JOMRES_ICAL_EVENT', 'iCal Event' );
jr_define( '_JOMRES_ICAL_FEED', 'iCal Feed' );
jr_define( '_JOMRES_ICAL_FEED_LINK', 'iCal Feed URL' );
jr_define( '_JOMRES_ICAL_FEEDS', 'iCal Feed/s' );
jr_define( '_JOMRES_ICAL_FEEDS_DESC', 'Your iCal feed/s can display upcoming bookings in a remote calendar including your mobile device, Google Calendar, Apple Calendar, Thunderbird, Outlook and more. Use the following URL/s to subscribe to feed/s in your calendar software.' );
jr_define( '_JOMRES_ICAL_ANON', 'Anonymised iCal Feed URL' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON', 'Allow anonymous access to iCal feed/s?' );
jr_define( '_JOMRES_ICAL_ALLOW_ANON_DESC', 'If this option is enabled your iCal events feed will be available to everybody, but without booking or guest details.' );
jr_define( '_JOMRES_ICAL_IMPORT', 'iCal Import' );
jr_define( '_JOMRES_ICAL_SELECT', 'Select file to import' );
jr_define( '_JOMRES_ICAL_NO_FILE_UPLOADED', 'Error, no file was uploaded.' );
jr_define( '_JOMRES_ICAL_IMPORT_INFO', "When importing an iCal file, the Event end date should be the departure date of the guest. The Summary should be the Guest's name. Event description can contain all other details." );

jr_define( '_JOMRES_ICAL_ERROR_BOOKING_NUMBER_EXISTS', 'This booking number already exists in the system.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_ROOMS', 'No rooms are available on the selected dates.' );
jr_define( '_JOMRES_ICAL_ERROR_NO_EVENTS', 'No events were found in the ics file.' );
jr_define( '_JOMRES_ICAL_SUCCESS', 'Event imported successfully' );
jr_define( '_JOMRES_ICAL_FAILURE', 'Event could not be imported' );

jr_define( '_JOMRES_ICAL_RESULT_HEADER_SUMMARY', 'Guest name' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_DESCRIPTION', 'Event description' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_START', 'Start' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_END', 'End' );
jr_define( '_JOMRES_ICAL_RESULT_HEADER_RESULT', 'Result' );
jr_define( '_JOMRES_ICAL_WITHHELD', 'Withheld' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS_DESC', 'Your iCal feed/s can display upcoming bookings in a remote calendar including your mobile device, Google Calendar, Apple Calendar, Thunderbird, Outlook and more.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS_DESC', 'This feature allows you to sync bookings from sites like Airbnb, Homeway and others to Jomres. You`ll have to enter your property`s iCal feed url for each site you want to sync with. If somebody will book your property on Airbnb for example, those dates will be shown as blocked (black bookings) on this Jomres site too, so nobody can also book those dates here. This won`t sync booking details between sites (like guest details, prices, invoices, etc) but it`s a nice and easy way to avoid double bookings by syncing just the availability.' );
jr_define( '_JOMRES_ICAL_SYNC_SETTINGS', 'iCal Sync Settings' );
jr_define( '_JOMRES_ICAL_FEED_SETTINGS', 'iCal Feed Settings' );
jr_define( '_JOMRES_ICAL_SYNC_URL1', 'External iCal URL' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES', 'Also include booking enquiries?' );
jr_define( '_JOMRES_ICAL_FEED_INCLUDE_ENQUIRIES_DESC', 'If enabled, it will also include bookings that are not approved yet (if the bookings approval feature is enabled). Keeping this option disabled is a great way to hide bookings from the calendar that are maybe awaiting confirmation in an unapproved/enquiry status. If bookings don`t require approval (the bookings approval feature is disabled), all bookings will be exported.' );

jr_define( '_JOMRES_ICAL_REMOTE_FEED', 'iCal Remote Feeds' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_URL', 'Remote URL' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_UID', 'Room UID' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_ROOM_NAME', 'Room Name/number' );
jr_define( '_JOMRES_ICAL_REMOTE_INFO', "Select the room that this feed will affect, and the remote site's url. When importing an iCal file, the Event end date should be the departure date of the guest. The Summary should be the Guest's name. Event description can contain all other details." );

jr_define( '_JOMRES_ICAL_REMOTE_FEED_SAVED', 'Ical remote feed created' );
jr_define( '_JOMRES_ICAL_REMOTE_FEED_DELETED', 'Ical remote feed deleted' );