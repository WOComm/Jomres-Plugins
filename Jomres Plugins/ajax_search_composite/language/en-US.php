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

jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TITLE',"Ajax Search Composite");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYSTARS',"Search by stars");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPRICES',"Search by prices");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYFEATURES',"Search by features");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYCOUNTRY',"Search by country");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYREGION',"Search by region");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYTOWN',"Search by town");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYROOMTYPE',"Search by room type");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYPROPERTYTYPE',"Search by property type");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYGUESTNUMBER',"Search by guest numbers");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_BYDATES',"Search by dates");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_TITLE',"Template Style");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_DESC',"Default : Mostly simple checkboxes or buttons if in Bootstrap. Modals : Buttons open to allow users to select search filters. Accordion designed for top of the page, areas slide down to reveal filters. Multiselect : Buttons dropdown to reveal filters.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_BUTTONS',"Buttons (vertical orientation)");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MODALS',"Modals (vertical orientation) Bootstrap only.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_ACCORDION',"Accordion (horizontal orientation) Bootstrap only.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_TEMPLATE_MULTISELECT',"Multiselect (horizontal orientation) Bootstrap only.");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_SHOWFILTERS',"Show filters");
jr_define('_JOMRES_AJAX_SEARCH_COMPOSITE_HIDEFILTERS',"Hide filters");


jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_INFO',"Uses the ajax search framework. Allows you to place a search module that offers searching on availability, price range, features, property type, room type, guest numbers, stars, country, region and town in a sidebar or top bar. Please note that the example shown here will not work as some of the arguments cancel each other out, choose just what you need from the available arguments (except for the required argument). This shortcode is a little different to most other shortcodes as it must be accompanied by a special div after the shortcode declaration with an id of asamodule_search_results which is where the plugin places the returned list of properties.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_AJS_PLUGIN',"Required. Argument must be 'ajax_search_composite'");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_STYLE',"Search fields style. Options are buttons modals accordion multiselect If not set then the plugin will use the option cofigured in Site Configuration. Multiselect/Accordion are ideal for horizontal display, the other two options are best for placement in a sidebar.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PROPERTY_DETAILS',"Show the search form on the if the page task is set to viewproperty ( the property details page ). 0 for No, 1 for Yes.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PROPERTY_UIDS',"Prefiltering is where you choose only those properties that satisfy the prefilter condition can be shown in the search results. Pre-filter by property uid, so only certain properties can be shown in the search results. Arguments are a comma separated list of property uids");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_PTYPES',"Pre-filter by property type, so only properties of this/these types can be shown in the search results. Arguments are a comma separated list of property type ids.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_COUNTRY',"Pre-filter by country code, so only properties in these countries can be shown in the search results. Arguments are a comma separated list of ISO country codes.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_PRE_FILTER_REGION',"Pre-filter by region name, , so only properties in these regions can be shown in the search results. Arguments are a comma separated list of region names and has to match regions as stored in the database. If you set the country to, for example, Germany (DE) then properties from other countries with similar region names will not be shown.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_STARS',"Enable/Disable the Stars input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_stars' in the arguments list will have no effect.");

jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PRICE',"Enable/Disable the Stars input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_price' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_FEATURES',"Enable/Disable the Property features input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_features' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_COUNTRY',"Enable/Disable the Country input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_country' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_REGION',"Enable/Disable the Region input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_region' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_TOWN',"Enable/Disable the Town input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_town' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_ROOMTYPE',"Enable/Disable the Room type input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_roomtype' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_PROPERTY_TYPE',"Enable/Disable the Property type input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_propertytype' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_GUESTNUMBER',"Enable/Disable the Guest numbers input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_guestnumber' in the arguments list will have no effect.");
jr_define('_JOMRES_SHORTCODES_06000AJSCOMPOSITE_ARG_SHOW_DATE',"Enable/Disable the Date input in the form. Be aware that if you have set an option via the Ajax search composite settings tab in Site Configuration to No then setting 'asc_by_date' in the arguments list will have no effect.");

