<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.24.0
 *
 * @copyright	2005-2021 Vince Wooll
 * Jomres is currently available for use in all personal or commercial projects under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/
//#################################################################
defined('_JOMRES_INITCHECK') or die('');
//#################################################################

jr_define('_JINTOUR_TITLE',"Tour/Activity management");

jr_define('_JINTOUR_PROFILES_TITLE',"Tour/Activity profiles");
jr_define('_JINTOUR_PROFILES_NEW',"New tour/activity profile");
jr_define('_JINTOUR_PROFILES_DELETE',"Delete tour/activity profile");

jr_define('_JINTOUR_PROFILE_TITLE',"Profile title");
jr_define('_JINTOUR_PROFILE_DESCRIPTION',"Description");
jr_define('_JINTOUR_PROFILE_DESCRIPTION_INFO',"Enter a description of your tour/activity, including it's itinerary.");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK',"Days of week");
jr_define('_JINTOUR_PROFILE_DAYS_OF_WEEK_INFO',"");
jr_define('_JINTOUR_PROFILE_PRICE_ADULTS',"Adult price");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS',"Child price");
jr_define('_JINTOUR_PROFILE_PRICE_KIDS_INFO',"To exclude an option from appearing in the booking form, leave the price as 0 (zero)");
jr_define('_JINTOUR_PROFILE_SPACES_ADULTS',"Adult spaces");
jr_define('_JINTOUR_PROFILE_SPACES_KIDS',"Child spaces");
jr_define('_JINTOUR_PROFILE_SPACES_INFO',"The number of spaces available on the tour/activity");
jr_define('_JINTOUR_PROFILE_START_DATE',"Season start");
jr_define('_JINTOUR_PROFILE_END_DATE',"Season ends");

jr_define('_JINTOUR_PROFILE_GENERATE_INFO',"Once you have created a tour/activity profile you will then need to generate tours/actvities based on that profile's settings. Create the tour/activity, then click the Green arrow icon next to that profile to create the tours/actvities themselves. Once the tours/actvities have been created you will be able to delete individual tours/activities if you wish.");
jr_define('_JINTOUR_PROFILE_GENERATE',"Generate tours/activities");

jr_define('_JINTOUR_TOUR_TITLE',"Activity title");
jr_define('_JINTOUR_TOUR_DATE',"Date");
jr_define('_JINTOUR_TOUR_ADULTS',"Adults");
jr_define('_JINTOUR_TOUR_KIDS',"Children");
jr_define('_JINTOUR_TOUR_ITINERY',"Itinerary");

jr_define('_JINTOUR_TOUR_SAVE_AUDIT',"Generated new tours");
jr_define('_JINTOUR_TOUR_CANCEL_AUDIT',"Tour booking cancelled");
jr_define('_JINTOUR_TOUR_SAVE_MESSAGE',"New tours generated");
jr_define('_JINTOUR_TOUR_SPACES_CURRENTLY_AVAILABLE',"Spaces currently available");

jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_SUBJECT',"New Booking for tour/resource id ");
jr_define('_JINTOUR_TOUR_EMAIL_ADMIN_MESSAGE',"A new booking for an administrator tour/resource has been made. Please view the following link to view that tour's administrator area page ");

jr_define('_JINTOUR_TITLE_CONFIG',"Jomres Integrated Tours Configuration");
jr_define('_JINTOUR_TITLE_WHOLESITE',"Is the entire installation a Jintour installation?");
jr_define('_JINTOUR_TITLE_WHOLESITE_DESC',"If you set this to Yes, then all properties will be tour properties. If you set it to No, then when new properties are created you will be able to have both Tour and Hotel/Apartment type properties.");

jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS',"Tours");
jr_define('_JINTOUR_REGPROP_MANAGEMENTPROCESS_TOURS_DESC',"Choose the tours option if you are offering bookings for items that are available on certain dates (eg. tours, tickets to a concert.)");
jr_define('_JINTOUR_SHOWDEPARTURE',"Show the departure input field?");
jr_define('_JINTOUR_SHOWDEPARTURE_DESC',"Set this to Yes if you want to show both an arrival and a departure date. This would be useful if you're offering bus trips, airplane tickets etc where you need to know both incoming and outgoing dates, showing the departure date allows you to offer resources over multiple dates, whereas with the setting set to No, only bookings for one date can be accepted.");

jr_define('_JINTOUR_PROFILES_TITLE_LIST',"Tours List");